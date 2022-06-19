<?php
	$id = $_GET['id'];
	$conn = new mysqli('localhost', 'root', '', 'inf_sv');
	$sql = "DELETE FROM tbl_new_uid WHERE id = $id";
	$result = $conn->query($sql);
	if($result){
		// echo "Đã xóa";
		header("Location: ../../check.php");
	}
	else{
		echo "Không xóa được";
	}
	$conn->close();
?>