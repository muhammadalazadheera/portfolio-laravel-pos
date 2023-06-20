@extends('layouts.auth-layout')

@section('title', 'Login')

@section('form')
<form action="{{ route('password.email') }}" method="POST">
    @csrf
    <div class="form-group mb-3">
        <input type="email" class="form-control @error('email') is-invalid @enderror" id=" Email"
            placeholder="Email address" value="{{ old('email') }}" required autocomplete="email" name="email" autofocus>
        @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        @if (session('status'))
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ session('status') }}
        </div>
        @endif
    </div>
    <button class="btn btn-block btn-primary mb-4">Signin</button>
</form>
<hr>
<p class="mb-2 text-muted">
    Forgot password?
    <a href="{{ route('login') }}" class="f-w-400">Login</a>
</p>
@endsection