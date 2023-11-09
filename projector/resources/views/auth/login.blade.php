@extends('layouts.auth')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body p-5">
                <h2 class="mb-5">Login</h2>
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email / Username</label>
                        <input type="text" id="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" autocomplete="off" required>
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror" required>
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="remember_me" name="remember">
                        <label class="form-check-label" for="remember_me">Remember me</label>
                    </div>

                    <button type="submit" class="btn btn-primary">Login</button>
                </form>

                <div class="mt-3">
                    <a href="{{ route('password.request') }}">Forgot your password?</a><br>
                    New user? <a href="{{ route('register') }}">Create an account!</a>
                </div>
            </div>
        </div>
    </div>
@endsection
