<?php
include "conn.php";
session_start();
if (!empty($_SESSION['username']) and !empty($_SESSION['password'])) {
    header('location:index.php');
} else {
    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password =md5($_POST['password']);

        $query = mysqli_query($con, " SELECT * FROM user WHERE email='$username' OR username='$username' AND password='$password'");
        $data = mysqli_fetch_array($query);

        if (empty($data['username'])) {
            echo "<script>alert('gagal login');
                    window.location='login.php';
                 </script>";
        } else {
            $_SESSION['id_user'] = $data['id_user'];
            $_SESSION['email'] = $data['email'];
            $_SESSION['username'] = $data['username'];
            $_SESSION['level'] = $data['level'];
            echo "<script>alert('Berhasil Login');
            window.location='dashboard.php';</script>";
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Login</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="assets/img/icon.ico" type="image/x-icon" />

	<!-- Fonts and icons -->
	<script src="assets/js/plugin/webfont/webfont.min.js"></script>
	<script>
		WebFont.load({
			google: {
				"families": ["Open+Sans:300,400,600,700"]
			},
			custom: {
				"families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands"],
				urls: ['../assets/css/fonts.css']
			},
			active: function() {
				sessionStorage.fonts = true;
			}
		});


	</script>

	<!-- CSS Files -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/azzara.min.css">
</head>

<body class="login">
	<div class="wrapper wrapper-login">
		<div class="container container-login animated fadeIn">
			<h3 class="text-center">Sign In </h3>
			<form action="" method="post">
			<div class="login-form">
				<div class="form-group form-floating-label">
					<input id="username" name="username" type="text" class="form-control input-border-bottom" required>
					<label for="username" class="placeholder">Username or email</label>
				</div>
				<div class="form-group form-floating-label">
					<input id="password" name="password" type="password" class="form-control input-border-bottom" required>
					<label for="password" class="placeholder">Password</label>
					<div class="show-password">
						<i class="flaticon-interface"></i>
					</div>
				</div>
				<div class="row form-sub m-0">
					<div class="custom-control custom-checkbox">
						<input type="checkbox" class="custom-control-input" id="rememberme">
						<label class="custom-control-label" for="rememberme">Remember Me</label>
					</div>

				</div>
				<div class="form-action mb-3">
					<button type="submit" name="login" class="btn btn-primary btn-rounded btn-login">Sign In</button>
				</div>
			</form>
				<div class="login-account">
					<span class="msg">Don't have an account yet ?</span>
					<a href="#" id="show-signup" class="link">Sign Up</a>
				</div>
			</div>
		</div>

		<div class="container container-signup animated fadeIn">
			<h3 class="text-center">Sign Up</h3>
			<form  action="registrasi.php" method="post">
					<div class="form-group form-floating-label">
						<input id="fullname" name="username" type="text" class="form-control input-border-bottom" required>
						<label for="fullname" class="placeholder">Username</label>
					</div>
					<div class="form-group form-floating-label">
						<input id="email" name="email" type="email" class="form-control input-border-bottom" required>
						<label for="email" class="placeholder">Email</label>
					</div>
					<div class="form-group form-floating-label">
						<input id="password" name="password" type="password" class="form-control input-border-bottom" required>
						<label for="passwordsignin" class="placeholder">Password</label>
						<div class="show-password">
							<i class="flaticon-interface"></i>
						</div>
					</div>
					<div class="form-group form-floating-label">
						<input id="confirm_password" name="confirm_password" type="password" class="form-control input-border-bottom" required>
						<label for="confirmpassword" class="placeholder">Confirm Password</label>
						<div class="show-password">
							<i class="flaticon-interface"></i>
						</div>
					</div>
					
					<div class="form-action">
						<a href="#" id="show-signin" class="btn btn-danger btn-rounded btn-login mr-3">Cancel</a>
						<button type="submit" class="btn btn-primary btn-rounded btn-login">Sign Up</button>
					</div>
				</div>
			</form>
		</div>
	</div>
	<script src="assets/js/core/jquery.3.2.1.min.js"></script>
	<script src="assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
	<script src="assets/js/core/popper.min.js"></script>
	<script src="assets/js/core/bootstrap.min.js"></script>
	<script src="assets/js/ready.js"></script>

	<!-- validasi password  -->
	
</body>
</html>