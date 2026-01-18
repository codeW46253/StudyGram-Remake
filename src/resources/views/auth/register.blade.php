@extends('layouts.auth')

@section('title', 'Register')

@section('content')

<div class="container mt-5">
    <h2>Register</h2>
    <form method="POST" action="{{ url('/register') }}">
        @csrf

        <!-- Name -->
        <div class="mb-3">
            <label for="name" class="form-label">Username</label>
            <input id="name" type="text" name="name" class="form-control" required autofocus>
        </div>

        <!-- Email -->
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input id="email" type="email" name="email" class="form-control" required>
        </div>

        <!-- Phone -->
        <div class="mb-3">
            <label for="phone" class="form-label">Phone Number</label>
            <input id="phone" type="tel" name="phone" class="form-control" required>
        </div>

        <!-- Password -->
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input id="password" type="password" name="password" class="form-control" required>
        </div>

        <!-- Confirm Password -->
        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Confirm Password</label>
            <input id="password_confirmation" type="password" name="password_confirmation" class="form-control" required>
        </div>

        <!-- Submit -->
        <button type="submit" class="btn btn-success">Register</button>
    </form>
</div>

@endsection
