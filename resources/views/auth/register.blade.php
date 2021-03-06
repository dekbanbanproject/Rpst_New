{{-- @extends('layouts.clinic_main_login')

@section('content') --}}

<!DOCTYPE html>
<html lang="en">
<head>
	<title>{{ config('app.name', 'Project || Bannok') }}</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="{{ asset('images/icons/favicon.ico') }}"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('vendor/animate/animate.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('vendor/css-hamburgers/hamburgers.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('vendor/select2/select2.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('css/util.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/main_login.css') }}">
<!--===============================================================================================-->
</head>
<body>

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
                    <center>
                    <img src="img/logo/rpst.jpg" alt="IMG"><br><br>
                        <h5>?????????????????????????????????????????????????????????????????????????????????</h5><br>
                        {{-- <h4>?????????????????????????????????</h4> --}}
                    </center>

				</div>

				<form class="login100-form validate-form" method="POST" action="{{ route('login') }}">
                        @csrf
                    <span class="login100-form-title">
						REGISTER
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Valid Name">
                        <input id="name" type="text" placeholder="????????????-?????????????????????" class="input100 @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                        <span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user-md" style="font-size:24px;color:red" aria-hidden="true"></i>
						</span>
                    </div>
                    <div class="wrap-input100 validate-input" data-validate = "Valid email is required: info@projectbannok">
                        <input id="email" type="email" placeholder="??????????????????" class="input100 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                        <span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" style="font-size:20px;color:rgb(255, 145, 0)" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
                        <input id="password" type="password" placeholder="????????????????????????" class="input100 @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" style="font-size:28px;color:rgb(15, 144, 250)" aria-hidden="true"></i>
						</span>
					</div>

					<div class="container-login100-form-btn">
						{{-- <button class="login100-form-btn">
							Login
                        </button> --}}
                        <button type="submit" class="login100-form-btn">???????????????????????????
                            <!-- {{ __('Login') }} -->
                        </button>
					</div>

					<div class="text-center p-t-12">
						{{-- <span class="txt1">
							Forgot
						</span> --}}
						<a class="txt2" href="#">
                            {{-- Username / Password? --}}
                            @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
						</a>
					</div>

					<div class="text-center p-t-50">
						<a class="txt2" href="{{ route('login')}}">
							Login
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>




<!--===============================================================================================-->
	<script src="{{ asset('vendor/jquery/jquery-3.2.1.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('vendor/bootstrap/js/popper.js') }}"></script>
	<script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('vendor/select2/select2.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('vendor/tilt/tilt.jquery.min.js') }}"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="{{ asset('js/main_login.js') }}"></script>

</body>
</html>



{{-- @endsection --}}
