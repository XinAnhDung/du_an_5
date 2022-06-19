<?php
	$id = $_POST['id'];
	$up_uid = $_POST['uid'];
	$up_fullname = $_POST['fullname'];
	$up_classes = $_POST['classes'];
	$up_mssv = $_POST['mssv'];
	$up_email = $_POST['email'];
	$up_dayBirthday = $_POST['dayBirthday'];
	$up_phoneNumber = $_POST['phoneNumber'];
	$up_address = $_POST['address'];
	$up_gender = $_POST['gender'];
	// $up_image_upload = $_POST['image_upload'];

	$up_imag = basename($_FILES['image_upload']['name']);
	$up_image_upload_tmp = $_FILES['image_upload']['tmp_name'];
	$up_image_upload_dir = "uploads/";
	$up_image_upload = $up_image_upload_dir.$up_imag; // đường dẫn thư mục

	$conn = new mysqli('localhost','root','','inf_sv');
	$sql = "UPDATE tbl_users SET uid='$up_uid', fullname='$up_fullname', classes='$up_classes', mssv='$up_mssv', email='$up_email', phoneNumber='$up_phoneNumber', dayBirthday='$up_dayBirthday', address='$up_address', gender='$up_gender' ,image_upload='$up_image_upload' WHERE id=$id";
	$result = $conn->query($sql);
	echo $sql;
	echo "<br>";
	echo $result;
	if($result){
		move_uploaded_file($up_image_upload_tmp,"$up_image_upload_dir/$up_imag"); // bb phải có
		header("Location: ../index.php");	
	}
	else{
		echo 'Đã có lỗi';
	}
	$conn->close();
?>
