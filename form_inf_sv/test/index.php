	<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Quản lý sinh viên</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.1.0.js"></script>
	<script lang="javascript" src="../dist/xlsx.full.min.js"></script>
	<script src="table2excel.js"></script>
	<script type="text/javascript" src="js/index.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

	<style>
		#btn-edit{
			width: 50px;
			height: 40px;
			margin: none;
			padding: none;
			margin-right: -5px;
		}
		#btn-delete{
			width: 50px;
			height: 40px;
			margin: none;
			padding: none;
			margin-right: -5px;
		}
	</style>
</head>
<body>
	<script type="text/javascript" src="index.js"></script>
	<div id="wrapper">
		<div class="form-student">
			<form action="reg.php" class="col-md-6 bg-light p-3 my-3" method="post">
				<h1 class="text-center text-uppercase h3 py-3">Thông tin sinh viên</h1>
				<div class="form-group">
					<label for="uid">UID</label>
					<input type="text" id="uid" name="uid">
					<br>
				</div>
				<div class="form-group">
					<label for="fullname">Họ và tên</label>
					<input type="text" id="fullname" name="fullname">
					<br>
				</div>
				<div class="form-group">                        
					<label for="classes">Lớp</label>
					<input type="text" id="classes" name="classes">
					<br>
				</div>
				<div class="form-group">
					<label for="mssv">MSSV</label>
					<input type="text" id="mssv" name="mssv">
					<br>
				</div>
				<div class="form-group">
					<label for="email">Email</label>
					<input type="text" id="email" name="email">
					<br>
				</div>
				<div class="form-group">
					<label for="phoneNumber">Số điện thoại</label>
					<input type="text" id="phoneNumber" name="phoneNumber" >
					<br>    
				</div>
				<div class="form-group">
					<label for="dayBirthday">Năm sinh</label>
					<input type="text" id="dayBirthday" name="dayBirthday" >
					<br>
				</div>
				<div class="form-group">
					<label for="address">Quê Quán</label>
					<input type="text" id="address" name="address" >
					<br>    
				</div>
				<div class="form-group">
					<label for="gender">Giới Tính</label>
					<input type="radio" name="gender" id="male" value="1" checked="checked" />Nam
					<input type="radio" name="gender" id="famale" value="2"/>Nữ
					<br>   
				</div>
				<label>&nbsp;</label>
				<input type="submit" value="Lưu lại" name="btn-reg" class="btn-primary btn btn-block"> 
			</form> 
		</div>
	<div class="list-student" id="list-student">
		<h1>Danh sách sinh viên</h1>
		<table id="grid-students" class="grid-students" width="950" border="1" cellpadding="0" cellspacing="0">
			<tr>
				<th>STT</th>
				<th>UID</th>
				<th>Họ và tên</th>
				<th>Lớp</th>
				<th>MSSV</th>
				<th>Email1</th>
				<th>SĐT</th>
				<th>Năm sinh</th>
				<th>Quê Quán</th>
				<th>Giới tính</th>
				<th>Ngày tạo</th>
				<th>Sữa</th>
				<th>Xóa</th>
			</tr>
			<?php
				$conn = new mysqli('localhost', 'root', '', 'inf_sv');
				$sql = "SELECT * FROM tbl_users";
				$result = $conn->query($sql);
				$stt = 1;
				while($row = $result -> fetch_assoc()){                 
					echo
					"<tr>
						<td>".$stt++."</td>
						<td>".$row['uid']."</td>
						<td>".$row['fullname']."</td>
						<td>".$row['classes']."</td>
						<td>".$row['mssv']."</td>
						<td>".$row['email']."</td>
						<td>".$row['phoneNumber']."</td>
						<td>".$row['dayBirthday']."</td>
						<td>".$row['address']."</td>
						<td>".$row['gender']."</td>
						<td>".$row['date_create']."</td>
						<td><form action='./index.php' method='get'>
						<input type='hidden' name='status' value='1'>
						<button type='submit' class='btn btn btn-info' id='btn-edit' name='id' value=".$row['id']."'>Sửa</button>
						</form></td>";

						echo "<td><button type='button' class='btn btn-danger' id='btn-delete'><a style='text-decoration: none' href='./config/delete.php/?id=".$row['id']."'>Xóa</a></button></td>
						
					</tr>";
				}

				$conn->close();
			?>
		</table>   
		<button name="btn-import-excel" id="import-excel">Xuất Excel</button>
	</div>
	<div class="popup-form" id="popup-form" href="#">
	<?php 
	$status = isset($_GET['status']) ? $_GET['status'] : 0;	
	if($status == '1'){ 
		$id = (int)$_GET['id'];
		$conn =  mysqli_connect('localhost','root','','inf_sv');
		$sql = "SELECT * FROM tbl_users WHERE id = $id";
		$result = mysqli_query($conn,$sql);
		while($row = $result-> fetch_assoc()){
		echo "<div class='modal-content' id='edit-content'>
				<div class='modal_header'>
					<h3 class='text-primary'>Sữa thông tin SV</h3>
					<button type='button' class='btn btn-danger' data-dismiss='modal' id='btn-close'>&times;</button>
				</div>
				<div class='modal-body'>
					<form action='config/edit.php' method='post'>
						<div class='form-edit'>
							<label><i class='fa-solid fa-user'></i> ID: </label>
							<input type='text' class='form-control' name='id' value='".$row ['id']."' readonly='readonly'>
						</div>
						<div class='form-edit'>
							<label><i class='fa-solid fa-user'></i> UID: </label>
							<input type='text' class='form-control' name='uid' value='".$row ['uid']."' readonly='readonly'>
						</div>
						<div class='form-edit'>
							<label><i class='fa-solid fa-user'></i> User name: </label>
							<input type='text' class='form-control' name='fullname' value='".$row ['fullname']."'>
						</div>	
						<div class='form-edit'>
							<label><i class='fas fa-archive'></i> Lớp: </label>
							<input type='text' class='form-control' name='classes' value='".$row ['classes']."'>
						</div>
						<div class='form-edit'>
							<label><i class='fas fa-list-alt'></i> MSSV: </label>
							<input type='text' class='form-control' name='mssv' value='".$row ['mssv']."'>
						</div>
						<div class='form-edit'>
							<label><i class='fa-solid fa-envelope'></i> Email: </label>
							<input type='text' class='form-control' name='email' value='".$row ['email']."'>
						</div>
						<div class='form-edit'>
							<label><i class='fas fa-phone-alt'></i> SĐT: </label>
							<input type='text' class='form-control' name='phoneNumber' value='".$row ['phoneNumber']."'>
						</div>
						<div class='form-edit'>
							<label><i class='fas fa-calendar-alt'></i> Năm sinh: </label>
							<input type='text' class='form-control' name='dayBirthday' value='".$row ['dayBirthday']."'>
						</div>
						<div class='form-edit'>
							<label><i class='fas fa-map-marker-alt'></i> Quê quán: </label>
							<input type='text' class='form-control' name='address' value='".$row ['address']."'>
						</div>
						<div class='form-edit'>
							<label for='gender'><i class='fas fa-venus-mars'></i> Giới Tính: </label>
							<input type='radio' name='gender' id='male' value='".$row ['gender']."' checked='checked' />Nam
							<input type='radio' name='gender' id='famale' value='".$row ['gender']."' />Nữ
							<br>   
						</div>
						<div class='modal-footer justify-content-center'>
							<button type='submit' name='btn-reg' class='btn-primary btn btn-block' data-dismiss='modal'>Lưu lại</button>
						</div>
					</form>
				</div>
			</div>";
		}
	}
	?>
	</div>
	<script src='https://cdn.jsdelivr.net/g/lodash@4(lodash.min.js+lodash.fp.min.js)'></script>
	<script>
		document.getElementById('import-excel').addEventListener('click',function(){
		var table2excel = new Table2Excel();
		table2excel.export(document.querySelectorAll("#grid-students"));
		});
	</script>
</body>
</html>
