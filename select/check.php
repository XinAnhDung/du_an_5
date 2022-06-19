<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>Thông tin UID mới</title>
		<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>

<!-- Popper JS -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
<script
  src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"
></script>
<style>
	tr, td, th{
		border: 1px solid black;
		padding: 20px;
		text-align: center;
	}
</style>
</head>
<body>
	<div class="container">
		<div class="wrapper" id="form-inf">
			<h3>Thông tin thẻ mới</h3>
			<a href="../form_inf_sv/index.php" class="btn btn-info" role="button">Nhập UID</a>
			<a href="./index.php" class="btn btn-secondary" role="button">Chọn chế độ</a>
			<table style="width:100%" class="form-main-table">
				<tr>
					<th>STT</th>
					<th>Mã UID mới</th>
					<th>Ngày tạo</th>
					<th>Thao tác</th>
				</tr>
				<?php
					$conn = new mysqli('localhost', 'root', '', 'inf_sv');
					// $sql = "SELECT * FROM catagory";
					$sql = "DELETE FROM tbl_new_uid WHERE cd_del=1";
					if ($conn->query($sql) === TRUE) {
					  echo "";
					} else {
					  echo "Error deleting record: " . $conn->error;
					}
					$sql = "SELECT * FROM tbl_new_uid ORDER BY date_create DESC";
					$result = $conn->query($sql) or die($conn->error);
					$stt = 1; 
					while($row = $result -> fetch_assoc()){	
						?>				
						<tr>
							<td><?=$stt++?></td>
							<td id="inf_text"><?=$row['uid_new']?></td>
							<td><?=$row['date_create']?></td>
							<td><a href='#' class="btn btn-info" style="width: 100px;">Sửa</a>
							<a href='./config/delete.php/?id=<?=$row['id']?>' class="btn btn-success" style="width: 100px;">Xóa</a>
							<button class="btn btn-warning" style="width: 100px;" onclick="copyToClipboard('#inf_text')">Copy</button></td>
						</tr>	
				<?php	}
					$conn->close();
				?> 
			</table>
		</div>
	</div>
	<script>
		setTimeout('window.location.reload();',3000);
	</script>
	<script>
		function copyToClipboard(element) {
		var $temp = $("<input>");
			$("body").append($temp);
			$temp.val($(element).html()).select();
			document.execCommand("copy");
			$temp.remove();
		var elem = document.getElementById("inf_text");
		elem.style.background = "yellow";
		elem.style.fontWeight = "bold";
		}
	</script>
</body>
</html>