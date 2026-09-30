@extends('layouts.guest')
@section('title', 'Login')

@section('content')
<div class="card-icon"><i class="bi bi-mortarboard"></i></div>
<h1 class="auth-title">Selamat Datang Kembali!</h1>
<p class="auth-subtitle">Masuk ke akun belajar EnglishLearn Anda.</p>

<form method="POST" action="{{ route('login') }}">
    @csrf

    <div class="form-group">
        <label for="email">Email</label>
        <div class="input-icon @error('email') is-invalid @enderror">
            <i class="bi bi-building"></i>
            <input type="email" id="email" name="email" value="{{ old('email') }}"
                   placeholder="nama@smkwikrama.sch.id" autofocus>
        </div>
        @error('email')<div class="error-text">{{ $message }}</div>@enderror
    </div>

    <div class="form-group">
        <label for="password">Password</label>
        <div class="input-icon @error('password') is-invalid @enderror">
            <i class="bi bi-lock"></i>
            <input type="password" id="password" name="password" placeholder="Masukkan password Anda">
            <button type="button" class="toggle-eye" data-toggle-password="password">
                <i class="bi bi-eye"></i>
            </button>
        </div>
        @error('password')<div class="error-text">{{ $message }}</div>@enderror
    </div>

    <div class="between">
        <label><input type="checkbox" name="remember"> Ingat saya</label>
        <a href="#" style="font-size: 11px;">Lupa Password?</a>
    </div>

    <button type="submit" class="btn-primary">Sign In <i class="bi bi-arrow-right"></i></button>
</form>

<p class="auth-footer">Belum punya akun? <a href="{{ route('register') }}">Daftar</a></p>
@endsection