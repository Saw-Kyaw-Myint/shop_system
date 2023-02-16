<!DOCTYPE html>
<html>
<head>
	<title>{{ $title ?? "" }} login</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('css/authcss/register.css') }}">
<link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
</head>
<body>
	<div class="container">
		@if (session('status'))
		<div class="alert-box">
			<span class="alert-message">{{ session('status') }}</span>
		</div>
	@endif
	@if (session('error'))
	<div class="alert-box">
		<span class="alert-fail">{{ session('error') }}</span>
	</div>
	@endif
	<div class="main">  	
		<a href="{{ route('login.create') }}" class="crop">X</a>  	
		<input type="checkbox" id="chk" aria-hidden="true">
			<div class="signup">
				<center>
					@isset($route)
					<form method="POST" action="{{ $route }}">
				@else
					<form method="POST" action="{{ route('login.store') }}">
				@endisset
				
					@csrf
					<label for="chk" aria-hidden="true">Sign in</label>
					<input type="email" name="email" placeholder="Email" value="{{ old('email') }}">
					@error('email')
					<span class="error-message">{{ $message }}</span>
					@enderror
					<input type="password"  name="password" placeholder="Password" value="{{ old('password') }}">
					@error('password')
				   <span class="error-message">{{ $message }}</span>
					@enderror
					<button>Sign in</button>
				</form>
			</center>
			</div>

			<div class="login register">
					<label for="chk" aria-hidden="true"><a href="{{ route('register.create') }}"> Sign up</a></label>
			</div>
	</div>
</body>
</html>