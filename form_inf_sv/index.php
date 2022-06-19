<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="css/table.css">
	<title>QLSV</title>
	<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
	<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
	<script src="table2excel.js"></script>
</head>
<body>
	<style>
		body{
			background-image: url('image/h3.jpg');
			background-size: cover;
		}
		img{
			width:300px;
			height: 300px;
		}
	</style>
	<div class="wrapper">
		<div class="form-student">
			<form action="reg.php" class="col-md-12 bg-light p-12 my-0" method="post" enctype="multipart/form-data">
				<h1 class="text-center text-uppercase h3 py-3">Thông tin sinh viên</h1>
				<div class="form-group">
					<label for="uid"><i class='fa-solid fa-barcode'></i> UID</label>
					<input type="text" id="uid" name="uid">
					<br>
				</div>
				<div class="form-group">
					<label for="fullname"><i class='fa-solid fa-user'></i> Họ và tên</label>
					<input type="text" id="fullname" name="fullname">
					<br>
				</div>
				<div class="form-group">                        
					<label for="classes"><i class='fas fa-archive'></i> Lớp</label>
					<input type="text" id="classes" name="classes">
					<br>
				</div>
				<div class="form-group">
					<label for="mssv"><i class='fas fa-list-alt'></i> MSSV</label>
					<input type="text" id="mssv" name="mssv">
					<br>
				</div>
				<div class="form-group">
					<label for="email"><i class='fa-solid fa-envelope'></i> Email</label>
					<input type="text" id="email" name="email">
					<br>
				</div>
				<div class="form-group">
					<label for="phoneNumber"><i class='fas fa-phone-alt'></i> Số điện thoại</label>
					<input type="text" id="phoneNumber" name="phoneNumber" >
					<br>    
				</div>
				<div class="form-group">
					<label for="dayBirthday"><i class='fas fa-calendar-alt'></i> Năm sinh</label>
					<input type="date" id="dayBirthday" name="dayBirthday" >
					<br>
				</div>
				<div class="form-group">
					<label for="address"><i class='fas fa-map-marker-alt'></i> Quê Quán</label>
					<input type="text" id="address" name="address" >
					<br>    
				</div>
				<div class="form-group">
					<label for="gender"><i class='fas fa-venus-mars'></i> Giới Tính</label>
					<input type="radio" name="gender" id="male" value="1" checked="checked" />Nam
					<input type="radio" name="gender" id="famale" value="2"/>Nữ
					<br>   
				</div>
				<div class="form-group">
					<div class="up-img">
						<label for="image"><i class="fa-solid fa-images"></i>Hình ảnh SV</label>
						<input type="file" name="image_upload">
					</div>
				</div>
				<label>&nbsp;</label>
				<input type="submit" value="Lưu lại" name="btn-reg" class="btn-primary btn btn-block"> 
			</form> 
		</div>
		<div class="list-student" id="list-student-id">
		<h1 class="h1-list">Danh sách sinh viên</h1>
			<button id="btn-open">Chỉnh sửa</button>
			<a href="../select/check.php" class="btn btn-success" role="button">Lấy UID</a>
			<form action="" method="post">
				<input type="text" placeholder="Search" name="noidung" value="<?php if(isset($_POST["noidung"])){echo $_POST["noidung"];} ?>">
					<input type="submit" name="search" value="Tìm Kiếm">
					<input type="button" name="" value="Tât cả" onclick="window.location.href='index.php'">
			</form>	
		<table id="grid-students" width="950" border="1" cellpadding="0" cellspacing="0" data-order="[[ 1, &quot;asc&quot; ]]" data-page-length="25">
			<tr>
				<th class="tbl-header">STT</th>
				<th class="tbl-header">UID</th>
				<th class="tbl-header">Họ và tên</th>
				<th class="tbl-header">Lớp</th>
				<th class="tbl-header">MSSV</th>
				<th class="tbl-header">Email</th>
				<th class="tbl-header">SĐT</th>
				<th class="tbl-header">Năm sinh</th>
				<th class="tbl-header">Quê Quán</th>
				<th class="tbl-header">Giới tính</th>
				<th class="tbl-header">Hình ảnh</th>
				<th class="tbl-header">Ngày tạo</th>
				<th class="tbl-header">Chọn</th>
				<th class="tbl-header">Xóa</th>
			</tr>
			<?php
				$conn = new mysqli('localhost', 'root', '', 'inf_sv');
				if(isset($_POST["search"])&&!empty($_POST["search"])){
					$noidung = $_POST['noidung'];
					$sql = "SELECT * FROM tbl_users WHERE uid LIKE '%$noidung%' OR gender LIKE '%$noidung%' OR fullname LIKE '%$noidung%' OR classes LIKE '%$noidung%' OR mssv LIKE '%$noidung%' OR email LIKE '%$noidung%' OR phoneNumber LIKE '%$noidung%' OR dayBirthday LIKE '%$noidung%' OR address LIKE '%$noidung%' ";
					}
				else {$sql = "SELECT * FROM tbl_users";}
				$result = $conn->query($sql);
				$stt = 1;
				while($row = $result -> fetch_assoc()){   ?>              
					<tr>
						<td class='tbl-header'><?=$stt++?></td>
						<td class='tbl-header'><?=$row['uid']?></td>
						<td class='tbl-header'><?=$row['fullname']?></td>
						<td class='tbl-header'><?=$row['classes']?></td>
						<td class='tbl-header'><?=$row['mssv']?></td>
						<td class='tbl-header'><?=$row['email']?></td>
						<td class='tbl-header'><?=$row['phoneNumber']?></td>
						<td class='tbl-header'><?=$row['dayBirthday']?></td>
						<td class='tbl-header'><?=$row['address']?></td>
						<td class='tbl-header'><?=$row['gender']?></td>
						<td>
							<img style='width: 100px; height: 100px;' src='<?=$row['image_upload']?>'>
							<p hidden><?=$row['image_upload']?></p>
						</td>	
						<td class='tbl-header'><?=$row['date_create']?></td>
						<td class='tbl-header'><form action='./index.php' method='get'>
						<input type='hidden' name='status' value='1'>
						<button type='submit' id='btn-edit' name='id' value='<?=$row['id']?>'>Chọn</button>
						</form></td>
						<td class='tbl-header'><button type='button' id='btn-delete'><a onclick="return confirm('Bạn có chắc muốn xóa sinh viên này: ')" href='./config/delete.php/?id=<?=$row['id']?>' style='text-decoration: none'>Xóa</a></button></td>			
						
				 	</tr>
			<?php	}
				$conn->close();
			?>
		</table>   
		<button name="btn-import-excel" id="import-excel">Xuất Excel</button>
		</div>
		<div id="popup-container" class="">
			<?php
			$status = isset($_GET['status']) ? $_GET['status'] : 0;
			if($status == '1'){
				$id = (int)$_GET['id'];
				$conn =  mysqli_connect('localhost','root','','inf_sv');
				$sql = "SELECT * FROM tbl_users WHERE id = $id";
				$result = mysqli_query($conn,$sql);	
				while($row = $result-> fetch_assoc()){
					?>
			<div id='popup-demo' class='popup'>
				<div class='popup-header'>
					<h3>Sữa thông tin SV</h3>
					<button id='btn-close'><i class='fa-solid fa-xmark'></i></button>
				</div>
				<div class='popup-body'>
					<form action='config/edit.php' method='post' enctype='multipart/form-data'>
						<div class='form-edit'>
							<label><i class='fa-solid fa-id-card'></i> ID: </label>
							<input type='text' class='form-control' name='id' value='<?= $row ['id'] ?>' readonly='readonly'>
						</div>
						<div class='form-edit'>
							<label><i class='fa-solid fa-barcode'></i> UID: </label>
							<input type='text' class='form-control' name='uid' value='<?= $row ['uid'] ?>'  readonly='readonly'>
						</div>
						<div class='form-edit'>
							<label><i class='fa-solid fa-user'></i> User name: </label>
							<input type='text' class='form-control' name='fullname' value= '<?= $row ['fullname'] ?>'>
						</div>	
						<div class='form-edit'>
							<label><i class='fas fa-archive'></i> Lớp: </label>
							<input type='text' class='form-control' name='classes' value='<?= $row ['classes'] ?>'>
						</div>
						<div class='form-edit'>
							<label><i class='fas fa-list-alt'></i> MSSV: </label>
							<input type='text' class='form-control' name='mssv' value='<?= $row ['mssv'] ?>'>
						</div>
						<div class='form-edit'>
							<label><i class='fa-solid fa-envelope'></i> Email: </label>
							<input type='text' class='form-control' name='email' value='<?= $row ['email'] ?>'>
						</div>
						<div class='form-edit'>
							<label><i class='fas fa-phone-alt'></i> SĐT: </label>
							<input type='text' class='form-control' name='phoneNumber' value='<?= $row ['phoneNumber'] ?>'>
						</div>
						<div class='form-edit'>
							<label><i class='fas fa-calendar-alt'></i> Năm sinh: </label>
							<input type='date' class='form-control' name='dayBirthday' value='<?= $row ['dayBirthday'] ?>'>
						</div>
						<div class='form-edit'>
							<label><i class='fas fa-map-marker-alt'></i> Quê quán: </label>
							<input type='text' class='form-control' name='address' value='<?= $row['address'] ?>'>
						</div>
						<div class='form-edit'>
							<label for='gender'><i class='fas fa-venus-mars'></i> Giới Tính: </label>
							<input type='radio' name='gender' id='male' value='1' checked='checked' placeholder='<?= $row ['gender'] ?>'/>Nam
							<input type='radio' name='gender' id='famale' value='2' placeholder='<?= $row ['gender'] ?>'/>Nữ
							<br>   
						</div>
						<div class='form-edit'>
							<div class='up-img'>
								<label for='image'><i class='fa-solid fa-images'></i></label>
								<input type='file' name='image_upload' id='image_upload' value='<?= $row ['image_upload'] ?>'>			
							</div>
						</div>
						<div class='modal-footer justify-content-center'>
							<button type='submit' name='btn-reg' class='btn-primary btn btn-block' data-dismiss='modal'>Lưu lại</button>
						</div>
					</form>
				</div>
			</div><?php }} ?>

		</div>
	</div>
	<script>
		const btn_open = document.getElementById('btn-open');
		const btn_close = document.getElementById('btn-close');
		const popup_container = document.getElementById('popup-container');
		const popup_demo = document.getElementById('popup-demo');
		btn_open.addEventListener('click',()=>{
			//Add class.show
			popup_container.classList.add('show');
		});
		btn_close.addEventListener('click',()=>{
			//Remove class.show
			popup_container.classList.remove('show');
		});
		popup_container.addEventListener('click',(e)=>{
			if(!popup_demo.contains(e.target)){
					btn_close.click();
				};
			});
	</script>
	<script>
		document.getElementById('import-excel').addEventListener('click', function(){
			var table2excel = new Table2Excel();
			table2excel.export(document.querySelectorAll("#grid-students"));
		})
	</script>
	<!-- <script src="js/index.js"></script> -->
</body>
</html>
