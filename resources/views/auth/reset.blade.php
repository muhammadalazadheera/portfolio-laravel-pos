@extends('layouts.auth-layout')

@section('title', 'Login')

@section('form')

@if ($errors->any())
@foreach ($errors->all() as $error)
<div class="alert alert-primary" role="alert">
    {{ $error }}
</div>
@endforeach
@endif

<form action="{{ route('password.update') }}" method="POST">
    @csrf
    <div class="form-group mb-3">
        <input type="email" class="form-control @error('email') is-invalid @enderror" id=" Email"
            placeholder="Email address" value="{{ old('email') }}" required autocomplete="email" name="email" autofocus>
        @error('email')
        <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>
    <div class="form-group mb-4">
        <input type="password" class="form-control @error('password') is-invalid @enderror" id="Password"
            placeholder="Password" name="password" required autocomplete="current-password">
    </div>
    <div class="form-group mb-4">
        <input type="password" class="form-control @error('password') is-invalid @enderror" id="Password"
            placeholder="Confirm Password" name="password_confirmation" required autocomplete="current-password">
    </div>
    <input name="token" type="hidden" value="{{ request()->route('token') }}">
    <button class="btn btn-block btn-primary mb-4">Reset</button>
</form>
<hr>
<p class="mb-2 text-muted">
    <a href="{{ route('password.request') }}" class="f-w-400">Login</a>
</p>
@endsection