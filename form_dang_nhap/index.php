<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/reset.css">
	<link rel="stylesheet" href="css/app.css">
	<link rel="stylesheet" type="text/css" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
	<link rel="stylesheet" href="css/animation.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;1,500&display=swap" rel="stylesheet">
	<title>Form Login</title>
</head>
<body>
	<video playsinline autoplay muted loop id="video">
	<source src="https://res.cloudinary.com/dn4nxz7f0/video/upload/v1594348575/Pexels_Videos_1093655_pr26ax.mp4" type="video/mp4">
	</video>

	<div id="wrapper" class="main-form">
		<form action="login.php" id="form-login" method="post" >
			<h1 class="form-heading">Đăng nhập</h1>
			<div class="form-group">
				<i class="far fa-user"></i>	
				<input type="text" class="form-input" name="username" placeholder="Tên đăng nhập" required="">
			</div>
			<div class="form-group">
				<i class="fas fa-key"></i>
				<input type="password" class="form-input" name="password" placeholder="Mật khẩu" required="">
			</div>
			<p class="p-bottom-w3ls">Forgot Password?<a class href="#">  Click here</a></p>
			<p class="p-bottom-w3ls1">New User?<a class href="../data_form_dk_admin/index.php">  Register here</a></p>
			<input type="submit" value="Đăng nhập" name="btn-login" class="form-submit">
			<p class="wthree-w3l">Fast Signup With Your Favourite Social Profile</p>
			<ul class="social-agileinfo wthree2">
				<li><a href="#"><i class="fab fa-facebook"></i></a></li>			
				<li><a href="#"><i class="fab fa-youtube"></i></a></li>
				<li><a href="#"><i class="fab fa-instagram"></i></a></li>
				<li><a href=""><i class="fab fa-google"></i></a></li>
			</ul>
		<div id="copyright">
			<p>&copy; 2022 Classic Login Form. All rights reserved | Design by me <a href="https://www.facebook.com/spring.nguyen.376/"  target="_blank"> XinAnhDung </a></p>
		</div>
		</form>	
		<div id="btn-video">
			<button id="myBtn" onclick="myFunction()">Dừng </button>
		</div>	
	</div>

	<script type="text/javascript" src="./js/animation.js"></script>
</body>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>	
<script type="text/javascript" src="js/app.js"></script>
</html>