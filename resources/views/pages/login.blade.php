<!DOCTYPE html>
<html lang="en">
<head>
	<title>Đăng nhập - Comic Shop</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
<link rel="shortcut icon" href="images/logo-comic.png" type="image/x-icon">
<link rel="apple-touch-icon" href="images/apple-touch-icon.png">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background: linear-gradient(-135deg, #b0b435, #404108) !important;">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<a href="{{ route('home') }}">
                        <img src="images/logo-comic.png" alt="IMG">
                    </a>
				</div>

				<form class="login100-form validate-form" action="{{ route('login') }}" method="post">
					<span class="login100-form-title">
						COMIC SHOP
					</span>

                    @csrf

					<div class="wrap-input100 validate-input @error('email') field-input @enderror" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="email" placeholder="Email" >
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>
                    @error('email')
                        <span class="field-error">{{$message}}</span>
                    @enderror

					<div class="wrap-input100 validate-input @error('password') field-input @enderror" data-validate = "Password is required">
						<input class="input100" type="password" name="password" placeholder="Mật khẩu" >
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
                    @error('password')
                        <span class="field-error">{{$message}}</span>
                    @enderror

                    <style>
                        .field-error{
                            color: red;
                            font-size: 13px;
                            margin-left: 20px;
                        }
                        .field-input{
                            margin-bottom: 0px;
                        }
                    </style>
					
					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Đăng nhập
						</button>
					</div>

					<div class="text-center p-t-12">
						<span class="txt1" style="font-family: sans-serif; font-size: 14px;">
							Quên
						</span>
						<a class="txt2" href="#">
							Tài khoản / Mật khẩu?
						</a>
					</div>

					<div class="text-center p-t-136">
						<a class="txt2" href="{{ route('register') }}">
							Tạo một tài khoản mới
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	<style>
	.txt2 {
			font-family: sans-serif;
			font-size: 14px;
			font-weight: bold !important;
		}
		.input100{
			font-family: sans-serif;
    		font-size: 14px;
		}
	</style>
	

	
<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>