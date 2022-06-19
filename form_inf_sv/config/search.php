<?php
	$conn = mysqli_connect("localhost", "root", "", "inf_sv");
	if(isset($_GET["search"])&&!empty($_GET["search"])){
		$key = $_GET["search"];
		$sql = "SELECT * FROM tbl_users WHERE uid LIKE '%$key%' OR gender LIKE '%$key%' OR fullname LIKE '%$key%' OR classes LIKE '%$key%' OR mssv LIKE '%$key%' OR email LIKE '%$key%' OR phoneNumber LIKE '%$key%' OR dayBirthday LIKE '%$key%' OR address LIKE '%$key%' "
	}
	else{
		$sql = "SELECT * FROM tbl_users"
	}
	$result = mysql_query($conn,$sql);
?>