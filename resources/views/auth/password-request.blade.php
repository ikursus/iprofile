@extends('auth.layout')

@section('title', 'Forgot Password')

@section('card-title', 'Forgot Password')

@section('content')
@if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
@endif
<form method="POST" action="">
    @csrf
    <div class="mb-3">
        <label for="email" class="form-label">Email address</label>
        <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required autofocus>
        @error('email')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="d-grid">
        <button type="submit" class="btn btn-primary">Send Password Reset Link</button>
    </div>
    <div class="mt-3 text-center">
        <p><a href="{{ route('login') }}">Kembali ke Login</a></p>
    </div>
</form>
@endsection