<?php
$host = "localhost";
$username = "root";
$password = "";
$dbname = "inf_sv";

$conn = new mysqli($host, $username, $password, $dbname);

if($conn->connect_error){
    die("Kết nối thất bại". $conn->connect_error);
}
// echo "Kết nối thành công";

$sql = "SELECT id, uid, fullname, classes, mssv, email, phoneNumber, dayBirthday, address, gender FROM tbl_users";
$result = $conn->query($sql);
if ($result->num_rows > 0){
	while($row = $result->fetch_assoc()){
		echo "id: ".$row["id"]."UID: ".$row["uid"]."-Tên: ".$row["fullname"]."Lớp: ".$row["classes"]."MSSV: ".$row["mssv"]."Email: ".$row["email"]."-SĐT: ".$row["phoneNumber"]."Năm sinh: ".$row["dayBirthday"]."Giới tính: ".$row["gender"]."<br>";
	}
}
else{
	echo "0 result";
}
$conn->close();
?>