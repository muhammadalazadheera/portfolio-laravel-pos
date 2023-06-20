@extends('layouts.auth-layout')

@section('title', 'Login')

@section('form')
@if (session('status'))
<div class="mb-4 font-medium text-sm text-green-600">
    {{ session('status') }}
</div>
@endif
<form action="{{ route('login') }}" method="POST">
    @csrf
    <div class="form-group mb-3">
        <input type="email" class="form-control @error('email') is-invalid @enderror" id=" Email"
            placeholder="Email address" value="{{ old('email') }}" required autocomplete="email" name="email" autofocus>
        @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="form-group mb-4">
        <input type="password" class="form-control @error('password') is-invalid @enderror" id="Password"
            placeholder="Password" name="password" required autocomplete="current-password">
    </div>
    <div class="custom-control custom-checkbox text-left mb-4 mt-2">
        <input type="checkbox" class="custom-control-input" id="customCheck1" name="remember">
        <label class="custom-control-label" for="customCheck1">Save credentials.</label>
    </div>
    <button class="btn btn-block btn-primary mb-4">Signin</button>
</form>
<hr>
<p class="mb-2 text-muted">
    Forgot password?
    <a href="{{ route('password.request') }}" class="f-w-400">Reset</a>
</p>
@endsection