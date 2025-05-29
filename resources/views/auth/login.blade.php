@extends('auth.layout')

@section('title', 'Login')

@section('card-title', 'Login')

@section('content')
<form method="POST" action="{{ route('login.authenticate') }}">
    @csrf
    <div class="mb-3">
        <label for="email" class="form-label">Email address</label>
        <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required autofocus>
        @error('email')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    
    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="password" required>
        @error('password')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="mb-3 form-check">
        <input type="checkbox" class="form-check-input" id="remember" name="remember">
        <label class="form-check-label" for="remember">Remember me</label>
    </div>
    <div class="d-grid">
        <button type="submit" class="btn btn-primary">Login</button>
    </div>
    <div class="mt-3 text-center">
        <p>Belum punya akaun? <a href="{{ route('register') }}">Daftar di sini</a></p>
        <p><a href="{{ route('password.request') }}">Lupa Password?</a></p>
    </div>
</form>
@endsection