@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div class="wrapper">
    <form class="form" method="POST" action="{{ route('login') }}">
    @csrf
        <h1 class="login-title">User Login</h1>
        @if($errors->any())
            <span class="invalid-data">
                <strong>{{$errors->first()}}</strong>
            </span>
        @endif 
        <input class="input-text" type="text" name="name" required placeholder="Your login" autofocus>

        <input class="input-text" type="password" name="password" placeholder="Password" required>
       
        <input class="btn" type="submit" value="Login">
    </form>
</div>
@endsection
