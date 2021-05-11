<?php
session_start(); 
require_once "../db.php";
if (isset($_POST["submit"])) {

	$email = $_POST["email"];
	$password_input = $_POST["password"];
	if (empty($email) || empty($password_input)) {
		echo "Bạn phải nhập email và password";
	}
	else{ 

		$sql ="SELECT * FROM `users` WHERE email ='{$email}'";
		$result = mysqli_query($conn,$sql);
		foreach ($result as $value) {
			$password = $value["password"];
		}
		$dem = mysqli_num_rows($result);
		if ($dem>0) {
			if ($password_input==$password) { 
				$_SESSION["users"] = $email; //= là gán == sosanh || và-
				header("location:sanpham/list-sanpham.php");
			}
			else{

				echo "Sai mật khẩu or tài khoản";
			}
		}
		else{
			echo "tài khoản không tồn tại";
		}
	}

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>AdminLTE 3 | Log in</title>

	<!-- Google Font: Source Sans Pro -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
	<!-- icheck bootstrap -->
	<link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
	<div class="login-box">
		<div class="login-logo">
			<a href="../../index2.html"><b>Admin</b>LTE</a>
		</div>
		<!-- /.login-logo -->
		<div class="card">
			<div class="card-body login-card-body">
				<p class="login-box-msg">Sign in to start your session</p>

				<form action="login.php" method="post">
					<div class="input-group mb-3">
						<input type="email" class="form-control" name="email" placeholder="Email">

						<div class="input-group-text">

						</div>

					</div>
					<div class="input-group mb-3">
						<input type="password" class="form-control" name="password" placeholder="Password">

						<div class="input-group-text">

						</div>

					</div>
					<div class="row">

						<!-- /.col -->
						<div class="col-4">
							<button type="submit" style="margin-left:100px" name="submit" class="btn btn-primary btn-block">Đăngnhập</button>
						</div>
						<!-- /.col -->
					</div>
				</form>


				<!-- /.social-auth-links -->


			</div>
			<!-- /.login-card-body -->
		</div>
	</div>
	<!-- /.login-box -->

	<!-- jQuery -->
	<script src="plugins/jquery/jquery.min.js"></script>
	<!-- Bootstrap 4 -->
	<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	<!-- AdminLTE App -->
	<script src="dist/js/adminlte.min.js"></script>
</body>
</html>
