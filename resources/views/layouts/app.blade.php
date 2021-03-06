<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Styles -->
	<link rel="stylesheet" href="{{ asset('css/main.css') }}" type="text/css">
	
</head>
<body>

	<header>
		<div class="header-left">
			Hello:
			@if( !auth()->check() ) 
				<span class="user-name">Guest</span>
			@else
				<span class="user-name">{{ auth()->user()->name }}</span>
			@endif

		</div>
		<div class="header-right">
			<ul>
			@if( !auth()->check() )
				<li><a href="{{ route('login') }}">Login</a></li>
				<li><a href="{{ route('register') }}">Register</a></li>
			@else
				<li>
					<a href="{{ route('logout') }}"
						onclick="event.preventDefault();
										document.getElementById('logout-form').submit();">
						{{ __('Logout') }}
					</a>
					<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
						@csrf
					</form>
				</li>
			@endif		
			</ul>
		</div>
	</header>
	
	@yield('content')

</body>
</html>