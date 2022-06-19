<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <title>Trang đăng ký tài khoản</title>
</head>
<body>
    <div id="wrapperr">
        <div class="container">
            <div class="row justify-content-around">
                <form action="reg.php" class="col-md-6 bg-light p-3 my-3" id="form-reg" method="post">
                    <h1 class="text-center text-uppercase h3 py-3">Đăng ký tài khoản</h1>
                    <div class="form-group">
                        <label for="fullname">Họ và tên</label>
                        <input type="text" name="fullname" id="fullname" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="username">Tên đăng nhập</label>
                        <input type="text" name="username" id="username" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="password">Mật khẩu</label>
                        <input type="password" name="password" id="password" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="gender">Giới tính</label>
                        <div>
                            <div class="form-check form-check-inline">
                                <input type="radio" name="gender" id="male" value="male" class="form-check-input" checked>
                                <label for="male" class="form-check-label">Nam</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="radio" name="gender" id="female" value="female" class="form-check-input">
                                <label for="female" class="form-check-label">Nữ</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="address">Địa chỉ</label>
                        <input type="text" name="address" id="address" class="form-control" > 
                    </div>
                    <input type="submit" value="Đăng ký" name="btn-reg" class="btn-primary btn btn-block">
                </form>
            </div>
        </div>
    </div>
</body>
</html>