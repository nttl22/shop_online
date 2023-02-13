<?php
include 'connect.php';
$mess = $me = '';
$name = $user = '';
if ($_SERVER["REQUEST_METHOD"] ==  "POST") {
	$name = $_POST["name"];
	$user = $_POST["username"];
	$pass = $_POST["password"];
	$passrr = $_POST["confirmPassword"];

	if ($pass != $passrr) {
		$mess = 'Mật khẩu xác nhận phải giống mật khẩu';
	} else {
		$sql = "SELECT * FROM user WHERE username='$user'";
		$kq = $connect->query($sql);
		if ($kq->num_rows > 0) {
			$me = "Tên đăng nhập đã có";
		} else {
			$sqll = "INSERT INTO user(`username`, `name`, `password`, `role`) VALUES('$user', '$name', '$pass','khachhang')";
			if ($connect->query($sqll)) {
				header('location:login.php');
			}
		}
	}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Đăng kí</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="styles/util.css">
	<link rel="stylesheet" type="text/css" href="styles/main.css">
	<!--===============================================================================================-->
</head>

<body>

	<div class="limiter">
		<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
				<form id="form" class="login100-form validate-form" action="" method="post">
					<span class="login100-form-title p-b-49">
						Đăng kí
					</span>

					<div class="wrap-input100 validate-input" data-validate="Username is required">
						<span class="label-input100">Tên người dùng</span>
						<input class="input100" type="text" id="name" name="name" placeholder="Nhập họ và tên" value="<?php echo $name ?>">
						<span class="focus-input100" data-symbol="&#xf206;"></span>

					</div>

					<div class="wrap-input100 validate-input m-t-23" data-validate="Username is required">
						<span class="label-input100">Tên đăng nhập</span>
						<input class="input100" type="text" name="username" placeholder="Nhập tên đăng nhập" value="<?php echo $user ?>">
						<span class="focus-input100" data-symbol="&#xf206;"></span>
					</div>
					<span style="color: red;"><?php echo $me ?></span>
					<div class="wrap-input100 validate-input m-t-23" data-validate="Password is required">
						<span class="label-input100">Mật khẩu</span>
						<input class="input100" id="password" type="password" name="password" placeholder="Nhập mật khẩu">
						<span class="focus-input100" data-symbol="&#xf190;"></span>
					</div>

					<div class="wrap-input100 validate-input m-t-23" data-validate="Password is required">
						<span class="label-input100">Xác nhận mật khẩu</span>
						<input class="input100" id="confirmPassword" type="password" name="confirmPassword" placeholder="Nhập lại mật khẩu">
						<span class="focus-input100" data-symbol="&#xf190;"></span>
					</div>
					<span style="color: red;"><?php echo $mess ?></span>

					<div class="container-login100-form-btn m-t-40">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn">
								Đăng kí
							</button>
						</div>
					</div>

					<div class="txt1 text-center p-t-54 p-b-20">
						<span>
							Hoặc đăng nhập bằng
						</span>
					</div>

					<div class="flex-c-m">
						<a href="#" class="login100-social-item bg1">
							<i class="fa fa-facebook"></i>
						</a>

						<a href="#" class="login100-social-item bg2">
							<i class="fa fa-twitter"></i>
						</a>

						<a href="#" class="login100-social-item bg3">
							<i class="fa fa-google"></i>
						</a>
					</div>

					<div class="flex-col-c p-t-50">
						<span class="txt1 p-b-17">
							Bạn đã có tài khoản?
						</span>

						<a href="login.php" class="txt2">
							Đăng nhập
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>


	<div id="dropDownSelect1"></div>
	<!--===============================================================================================-->

	<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
	<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>


</html>