<head>
	<title>Login | DaTim Project</title>
	<meta charset = "UTF-8">
	<meta name = "author" content = "DaTim (Dave & Timothy)">
	<meta name = "viewport" content = "width=device-width, initial-scale=1.0">
	<link rel="icon" type="image/png" href="../../images/icons/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="../../vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../../fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../../fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="../../vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="../../vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="../../vendor/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="../../css/util.css">
	<link rel="stylesheet" type="text/css" href="../../css/main.css">
	<style>
		#remember{
			font-family: Montserrat-Bold;
			font-size: 15px;
			line-height: 1.2;
			color:#fff;
		}
	</style>
</head>
<body>
	<?php
		if (!isset($_SESSION)) {
			session_start();	
		}
		if(isset($_COOKIE['login'])){
			$_SESSION['login'] = $_COOKIE['login'];
			$_SESSION['username'] = $_COOKIE['username'];
			$_SESSION['password'] = $_COOKIE['password'];
			$_SESSION['type'] = $_COOKIE['type'];
		}
		if(isset($_COOKIE['login'])){
			header('Location:../welcome.php');
		}else{
	?>
	<div class="limiter">
		<div class="container-login100" style="background-image: url('../../images/login/img-01.jpg');">
			<div class="wrap-login100 p-t-190 p-b-30">
				<form class="login100-form validate-form" method="POST" action="login_cookie.php">
					<div class="login100-form-avatar">
						<img src="../../images/login/Cyber.jpg" alt="AVATAR">
					</div>

					<span class="login100-form-title p-t-20 p-b-45">
						Welcome to "The Game"!
					</span>

					<div class="wrap-input100 validate-input m-b-10" data-validate = "Username is required">
						<input class="input100" type="text" name="username" placeholder="Username">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input m-b-10" data-validate = "Password is required">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock"></i>
						</span>
					</div>

					<div>
						<table>
							<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;</td><td style="width:30px"><input type="checkbox" name="remember" value="yes"></td>
							<td><p id="remember">Remember me</p></td></tr>
						</table>
					</div>

					<div class="container-login100-form-btn p-t-10">
						<input type="submit" value="login" class="login100-form-btn">
					</div>

					<div class="text-center w-full">
						<a class="txt1" href="signIn.php">
							Create new account
							<i class="fa fa-long-arrow-right"></i>						
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	
	<!--===============================================================================================-->	
		<script src="../../vendor/jquery/jquery-3.2.1.min.js"></script>
	<!--===============================================================================================-->
		<script src="../../vendor/bootstrap/js/popper.js"></script>
		<script src="../../vendor/bootstrap/js/bootstrap.min.js"></script>
	<!--===============================================================================================-->
		<script src="../../vendor/select2/select2.min.js"></script>
	<!--===============================================================================================-->
		<script src="../../js/main.js"></script>

	<?php } ?>
</body>