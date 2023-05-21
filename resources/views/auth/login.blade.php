<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{ trans('Main_trans.Program_name') }}</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="{{ URL::asset('login/images/icons/favicon.ico') }}"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('login/vendor/bootstrap/css/bootstrap.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('login/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('login/vendor/animate/animate.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('login/vendor/css-hamburgers/hamburgers.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('login/vendor/select2/select2.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('login/css/util.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('login/css/main.css') }}">
<!--===============================================================================================-->
</head>
<body>

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="{{ URL::asset('login/images/img-01.png') }}" alt="IMG">
				</div>

				<form class="login100-form validate-form" method="POST" action="{{ route('login') }}">

                    @csrf

                    @if ($type == 'student')
                        <span class="login100-form-title">{{ trans('Auth.login_2') }} {{ trans('Auth.student') }}</span>
                    @elseif($type == 'parent')
                        <span class="login100-form-title">{{ trans('Auth.login_2') }} {{ trans('Auth.parent') }}</span>
                    @elseif($type == 'teacher')
                        <span class="login100-form-title">{{ trans('Auth.login_2') }} {{ trans('Auth.teacher') }}</span>
                    @else
                        <span class="login100-form-title">{{ trans('Auth.login_2') }} {{ trans('Auth.admin') }}</span>
                    @endif

                    <input type="hidden" value="{{ $type }}" name="type">

					<div class="wrap-input100 validate-input" data-validate = "{{ trans('Auth.v_email_pass') }}">
						<input class="input100" type="text" name="email" value="{{ old('email') }}"
                               required autocomplete="email" placeholder="{{ trans('Auth.email') }}" >
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "{{ trans('Auth.v_email_pass') }}">
						<input class="input100" type="password" name="password"
                               required autocomplete="current-password" placeholder="{{ trans('Auth.password_in') }}">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
                            {{ trans('Auth.login_2') }}
						</button>
					</div>

					<div class="text-center p-t-12">
						<a class="txt2" href="#">
                            {{ trans('Auth.forget_password') }}
						</a>
					</div>

					<div class="text-center p-t-136">

					</div>
				</form>
			</div>
		</div>
	</div>




<!--===============================================================================================-->
	<script src="{{ URL::asset('login/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ URL::asset('login/vendor/bootstrap/js/popper.js') }}"></script>
	<script src="{{ URL::asset('login/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ URL::asset('login/vendor/select2/select2.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ URL::asset('login/vendor/tilt/tilt.jquery.min.js') }}"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="{{ URL::asset('login/js/main.js') }}"></script>

</body>
</html>
