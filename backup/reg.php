<?php
    if(isset($_POST['btn-reg'])&&($_POST['btn-reg'])){
    $uid = $_POST['uid'];
    $fullname = $_POST['fullname'];
    $classes = $_POST['classes'];
    $mssv = $_POST['mssv'];
    $email = $_POST['email'];
    $dayBirthday = $_POST['dayBirthday'];
    $phoneNumber = $_POST['phoneNumber'];
    $address = $_POST['address'];
    $gender = $_POST['gender'];

    $imag = (($_FILES['image_upload']['name']));
    $image_upload_tmp = $_FILES['image_upload']['tmp_name'];
    $image_upload_dir = "uploads/";
    $image_upload = $image_upload_dir . $imag; // đường dẫn thư mục
    $conn = new mysqli('localhost', 'root', '', 'inf_sv');
    if($uid&&$fullname&&$classes&&$mssv&&$email&&$phoneNumber&&$dayBirthday&&$address&&$gender&&$image_upload){
        $sql = "INSERT INTO `tbl_users` (`uid`, `fullname`, `classes`, `mssv`, `email`, `phoneNumber`, `dayBirthday`, `address`, `gender`,`image_upload`) VALUES('$uid','$fullname','$classes','$mssv','$email','$phoneNumber','$dayBirthday','$address','$gender','$image_upload')";
        $result = $conn->query($sql);
        if($result){
            // echo "thêm thành công";
            move_uploaded_file($image_upload_tmp,$image_upload );
            header("Location: ./index.php");
        } 
        else{
            echo "k thêm được";
        }
    }
    else{
        // echo "vui lòng nhập tt";
        header("Location: ./index.php");
    }

    $conn->close();
}
?>
