<!DOCTYPE html>
<html lang="en">

<head>
	<title>Đăng Nhập</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="{{asset('assets/login/images/icons/favicon.ico')}}" />
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('assets/login/vendor/bootstrap/css/bootstrap.min.css')}}">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('assets/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('assets/login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css')}}">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('assets/login/vendor/animate/animate.css')}}">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('assets/login/vendor/css-hamburgers/hamburgers.min.css')}}">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('assets/login/vendor/animsition/css/animsition.min.css')}}">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('assets/login/vendor/select2/select2.min.css')}}">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('assets/login/vendor/daterangepicker/daterangepicker.css')}}">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('assets/login/css/util.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('assets/login/css/main.css')}}">
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/ jquery-validation@1.19.2 /dist/jquery.validate.min.js">
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/ jquery-validation@1.19.2 /dist/jquery.validate.min.js">
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
	<!--===============================================================================================-->
</head>

<body>

 <?php

	// var_dump($errors->all());
?>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="">
					<img style="width:70%;height:70%;margin-left:100px;margin-bottom:-50px" src="{{asset('assets/login/images/logovascara.jpg')}}" alt="">
				</div>
				<form class="login100-form validate-form" action="" method="post">
					@csrf
					@foreach($errs as $e)
					<p style="color: red">
						@if(is_array($e))
						{{implode('<br>',$e)}}
						@else
						{{$e}}
						@endif
					</p>
					@endforeach
					<div class="wrap-input100 validate-input m-b-26" data-validate="Hãy nhập tài khoản">
						<span class="label-input100">Tài Khoản</span>
						<input class="input100" type="text" name="txt_username" value="{{old('txt_username')}}" placeholder="">
					</div>

					<div class="wrap-input100 validate-input m-b-18" data-validate="Hãy nhập mật khẩu">
						<span class="label-input100">Mật Khẩu</span>
						<input class="input100" type="password" name="txt_password" value="{{old('txt_password')}}" placeholder="">
					</div>

					<div class="flex-sb-m w-full p-b-30">
						<div class="contact100-form-checkbox">
							<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
							<label class="label-checkbox100" for="ckb1">
								Nhớ Tài Khoản
							</label>
						</div>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Đăng Nhập
						</button>
						<a name="" id="" style="margin-left:50px;color:white" class="login100-form-btn" href="{{route('front-home')}}" role="button">Trang chủ</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	
	<!--===============================================================================================-->
	<script src="{{asset('assets/login/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
	<!--===============================================================================================-->
	<script src="{{asset('assets/login/vendor/animsition/js/animsition.min.js')}}"></script>
	<!--===============================================================================================-->
	<script src="{{asset('assets/login/vendor/bootstrap/js/popper.js')}}"></script>
	<script src="{{asset('assets/login/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
	<!--===============================================================================================-->
	<script src="{{asset('assets/login/vendor/select2/select2.min.js')}}"></script>
	<!--===============================================================================================-->
	<script src="{{asset('assets/login/vendor/daterangepicker/moment.min.js')}}"></script>
	<script src="{{asset('assets/login/vendor/daterangepicker/daterangepicker.js')}}"></script>
	<!--==============================================================================================-->
	<script src="{{asset('assets/login/vendor/countdowntime/countdowntime.js')}}"></script>
	<!--===============================================================================================-->
	<script src="{{asset('assets/login/js/main.js')}}"></script>
	<script>
    @if(Session::get('msg'))
    Swal.fire({
        position: 'bottom-end',
        icon: 'success',
        title: '{{Session::get('msg')}}',
        showConfirmButton: false,
        timer: 1500
    })
    @endif
</script>
</body>

</html>