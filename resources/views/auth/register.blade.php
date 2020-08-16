@extends('layouts.app')

@section('title', 'Registration')

@section('content')
<div class="wrapper">
		<form class="form" method="POST" action="{{ route('register') }}">
		@csrf
            <h1 class="login-title">Registration form</h1>
            <div class="ajax-validation">This login already exists</div>
			<input class="input-text" type="text" name="name" required placeholder="Your login" autofocus>
			@error('name')
				<span class="invalid-data">
					<strong>{{ $message }}</strong>
				</span>
			@enderror
			<input class="input-text" type="password" name="password" placeholder="Password" required>
			@error('password')
				<span class="invalid-data">
					<strong>{{ $message }}</strong>
				</span>
			@enderror
            <input class="input-text" type="password" name="password_confirmation" placeholder="Conform Password" required>
            
			<input class="btn" type="submit" value="Register">
		</form>
	</div>
@endsection
