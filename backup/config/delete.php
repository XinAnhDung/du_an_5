<?php
	$id = $_GET['id'];
	$conn = new mysqli('localhost', 'root', '', 'inf_sv');
	$sql = "DELETE FROM tbl_users WHERE id = $id";
	$result = $conn->query($sql);
	if($result){
		// echo "Đã xóa";
		header("Location: ../../index.php");
	}
	else{
		echo "Không xóa được";
	}
	$conn->close();
?>