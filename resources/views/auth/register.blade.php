<!DOCTYPE html>
<html>
<head>
	<title>Slide Navbar</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('css/authcss/register.css') }}">
<link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
</head>
<body>
	<div class="main">
		<a href="{{ route('register.create') }}" class="crop">X</a>  	
		<input type="checkbox" id="chk" aria-hidden="true">
	<center>
			<div class="signup">
				<div class="card-body">
                    @isset($route)
                        <form method="POST" action="{{ $route }}">
                    @else
                        <form method="POST" action="{{ route('register.store') }}">
                    @endisset
					@csrf
					<label for="chk" aria-hidden="true">Sign up</label>
					<input type="text" name="name" placeholder="User name" value="{{ old('name') }}">
					@error('name')
					<span class="error-message">{{$message}}</span>	
					@enderror
					<input type="email" name="email" placeholder="Email" value="{{ old('email') }}">
					@error('email')
                   <span class="error-message">{{ $message }}</span>
					@enderror
					<input type="password" name="password" placeholder="Password" value="{{ old('password') }}" >
					@error('password')
					<span class="error-message">{{ $message }}</span>
					@enderror
                    <input type="password" name="confirm_password" value="{{ old('comfirm_password') }}" placeholder="comfirm Password">
					@error('confirm_password')
					<span class="error-message">{{ $message }}</span>
					@enderror
					<button>Sign up</button>
				</form>
			
			</div>
			<div class="login">
					<label for="chk" aria-hidden="true"><a href="{{ route('login.create') }}">Login</a></label>
			</div>
	</div>
</center>
</body>
</html>