<?php
require 'db/connect.php';
if(isset($_POST['btn-reg'])){
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $gender = $_POST['gender'];
    if(!empty($fullname)&&!empty($username)&&!empty($password)&&!empty($email)
    &&!empty($address)&&!empty($gender)){
        echo "<pre>";       
        // print_r($_POST);

        $sql = "INSERT INTO `tbl_admin` (`fullname`, `username`, `password`, `email`, `address`, 
        `gender`) VALUES('$fullname','$username','$password','$email','$address','$gender')"; 

        if($conn->query($sql)==TRUE)
        {
            echo "Lưu dữ liệu thành công";
            header("Location: ../form_dang_nhap/index.php"); 
            exit();
        }
        else{
            echo "Lỗi {$sql}".$conn->error;
        }
    }
    else{
        echo "Bạn cần nhập đầy đủ thông tin trươc khi đăng ký!!!";
    }
}
?>
<br>
<a href="index.php">Quay lại trang đăng ký</a>