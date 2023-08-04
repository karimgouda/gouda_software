<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>{{translate('login')}}</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- LINEARICONS -->
		<link rel="stylesheet" href="{{asset('frontend')}}/auth/fonts/linearicons/style.css">

		<!-- STYLE CSS -->
		<link rel="stylesheet" href="{{asset('frontend')}}/auth/css/style.css">
	</head>

	<body>

		<div class="wrapper">
			<div class="inner">
				<img src="{{asset('frontend')}}/auth/images/image-1.png" alt="" class="image-1">
				<form action="{{route('signIn')}}" method="post">
                    @csrf
					<h3>{{translate('signIn')}}</h3>

					<div class="form-holder">
						<span class="lnr lnr-envelope"></span>
						<input type="text" class="form-control" name="email" placeholder="Mail">
                        @error('email')
                        <p style="color: tomato">{{$message}}</p>
                        @enderror
					</div>
					<div class="form-holder">
						<span class="lnr lnr-lock"></span>
						<input type="password" class="form-control" name="password" placeholder="Password">
                        @error('password')
                        <p style="color: tomato">{{$message}}</p>
                        @enderror
					</div>

					<button>
						<span>{{translate('login')}}</span>
					</button>
                    <a href="{{route('register')}}" >create Account</a>

				</form>

				<img src="{{asset('frontend')}}/auth/images/image-2.png" alt="" class="image-2">
			</div>

		</div>

		<script src="{{asset('frontend')}}/auth/js/jquery-3.3.1.min.js"></script>
		<script src="{{asset('frontend')}}/auth/js/main.js"></script>
        @include('backend.layouts.assets._alerts')
	</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>
