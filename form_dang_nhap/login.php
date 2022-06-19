<?php
require 'connect.php';
if(isset($_POST['btn-login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    if(!empty($password)&&!empty($username)){
        echo "<pre>";
        // print_r($_POST);

        $sql = "select * from tbl_admin where username =  '".$username."' and password ='".$password."'"; 

        $result = mysqli_query($conn, $sql);
  
    if(mysqli_fetch_assoc($result))
        {
            echo "Lưu dữ liệu thành công";
            // Trỏ đến trang đăng nhập inf sv
            header("Location: ../select/check.php"); 
            exit();
       }
        else{
            // echo "Lỗi {$sql}".$conn->error;
            echo "Tài khoản hoặc mật khẩu không chính xác";
        }
    }
    else{
        echo "Bạn cần nhập đầy đủ thông tin trươc khi đăng ký!!!";
    }
}
?>
<br>
<a href="index.php">Quay lại trang đăng nhập</a>