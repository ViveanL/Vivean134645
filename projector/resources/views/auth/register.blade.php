@extends('layouts.auth')

@section('content')
<div class="container">
    <div id="dashboard">
        <a href="/register">Sign Up</a> |
        <a href="/login">Login</a>
    </div>
    <h2>Register</h2>
    <form action="{{ route('register') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="name">Full Name:</label>
            <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" required>
            @error('name')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-3">
            <label for="email">Email Address:</label>
            <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" required>
            @error('email')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-3">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror" required>
            @error('password')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-3">
            <label for="password_confirmation">Confirm Password:</label>
            <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required>
        </div>

        <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" id="checkTerms" name="checkTerms" required>
            <label class="form-check-label" for="checkTerms">
                I accept the <a href="#">terms & conditions</a>.
            </label>
        </div>

        <button type="submit" class="btn btn-primary">Register</button>
    </form>

    <div class="mt-8">
        <p>Already have an account? <a href="/login" class="text">Login</a></p>
    </div>
</div>
@endsection
