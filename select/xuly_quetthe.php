<?php
	$conn = new mysqli('localhost', 'root', '', 'inf_sv');
	// $sql = "SELECT * FROM tbl_new_uid ";
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	$sql = "UPDATE tbl_select SET cd='1'  ";
	$result = mysqli_query($conn, $sql);
	if ($result === TRUE) {
		echo "Record updated successfully";
		header("Location: ../form_inf_sv/display.php");
	} else {
		echo "Error updating record: " . $conn->error;
}
	$conn->close();
?>