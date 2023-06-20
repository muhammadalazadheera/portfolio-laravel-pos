@extends('layouts.auth-layout')

@section('title', 'Login')

@section('form')
@if (session('status'))
<div class="alert alert-primary" role="alert">
    {{ session('status') }}
</div>
@endif

<form action="{{ route('password.email') }}" method="POST">
    @csrf
    <div class="form-group mb-3">
        <input type="email" class="form-control @error('email') is-invalid @enderror" id=" Email"
            placeholder="Email address" value="{{ old('email') }}" required autocomplete="email" name="email" autofocus>

        @error('email')
        <p class="text-danger"> {{ $message }} </p>
        @enderror

    </div>
    <button class="btn btn-block btn-primary mb-4">Send Reset Link</button>
</form>
<hr>
<p class="mb-2 text-muted">
    <a href="{{ route('login') }}" class="f-w-400">Signin</a>
</p>
@endsection