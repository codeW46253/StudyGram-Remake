@extends('layouts.auth')

@section('title', 'login')

@section('content')

<div class="container mt-5">
    <h2>Login</h2>
    <form method="POST" action="{{ url('/login') }}">
        @csrf
        <!-- Email -->
	<div class="mb-3">
            <label for="email" class="form-label">Email:</label>
            <input type="email" id="email" name="email" class="form-control" required autofocus>
        </div>

        <!-- Password -->
	<div class="mb-3">
            <label for="password" class="form-label">Password:</label>
            <input type="password" id="password" name="password" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Login</button>
    </form>
    <a class="text-primary" href="{{ url('/register') }}">Don't have account? Create one</a>
</div>

@endsection
