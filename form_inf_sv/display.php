<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
	<title>Bootstrap 5 Modal</title>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<link rel="stylesheet" href="style.css">
	<style>
		.modal-header {
			background: #F7941E;
			color: #fff;
		}
		
		.required:after {
			content: "*";
			color: red;
		}
		.form-hidden{
			box-sizing: border-box;
			font-family: Arial, Helvetica, sans-serif;
			line-height: 1.3;
		}
		h3,p {
			text-align: center;
			margin-top: 200px;
		}
		p{
			margin-top: 0px;
		}
	</style>
</head>

<body>
	<div class="form-hidden">
		<h3>Không có thông tin cụ thể</h3>
		<p><i class="fa-solid fa-face-smile"></i></p>
	</div>
	<div class="container mt-7" id="form-container">
	<?php
	$conn = new mysqli('localhost', 'root', '', 'inf_sv');
	// $sql = "SELECT * FROM catagory";
	$sql = "SELECT * FROM tbl_users WHERE tt=1 ORDER BY date_create DESC";
	$result = $conn->query($sql);
	$stt = 1; 
	while($row = $result -> fetch_assoc()){	
		?>				
		<div class="modal" id="myModal">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Thông tin sinh viên</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
					</div>
					<div class="modal-body">
						<form action="" method='' enctype="">
							<div class="mb-3">
								<label><i class='fa-solid fa-user'></i> Họ và tên: </label>
								<input type='text' class='form-control' name='fullname' value= '<?= $row ['fullname'] ?>' readonly='readonly'>
							</div>
							<div class="mb-3">
								<label><i class='fas fa-archive'></i> Lớp: </label>
								<input type='text' class='form-control' name='classes' value='<?= $row ['classes'] ?>' readonly='readonly'>
							</div>
							<div class="mb-3">
								<label><i class='fas fa-list-alt'></i> MSSV: </label>
								<input type='text' class='form-control' name='mssv' value='<?= $row ['mssv'] ?>' readonly='readonly'>
							</div>
							<div class="mb-3">
								<label for='image'><i class='fa-solid fa-images'></i> Hình ảnh: </label>
								<img style='width: 200px; height: 200px;' src='<?=$row['image_upload']?>'>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	<?php	}
		$conn->close();
	?>
	</div>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
	<script type="text/javascript">	
		setTimeout('window.location.reload();',3000);
		$(window).on('load',function(){
			$('#myModal').modal('show');
		});
	</script>
</body>
</html>