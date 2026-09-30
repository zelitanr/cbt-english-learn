@extends('layouts.guest')
@section('title', 'Daftar')

@section('content')
<div class="card-icon"><i class="bi bi-mortarboard"></i></div>
<h1 class="auth-title">Daftar Akun Siswa</h1>
<p class="auth-subtitle">Lengkapi data diri untuk memulai pembelajaran<br>Bahasa Inggris.</p>

<form method="POST" action="{{ route('register') }}">
    @csrf

    <div class="form-group">
        <label for="name">Nama Lengkap</label>
        <div class="input-icon @error('name') is-invalid @enderror">
            <i class="bi bi-person"></i>
            <input type="text" id="name" name="name" value="{{ old('name') }}" placeholder="Nama Lengkap">
        </div>
        @error('name')<div class="error-text">{{ $message }}</div>@enderror
    </div>

    <div class="form-row">
        <div class="form-group">
            <label for="nis">NIS (Nomor Induk Siswa)</label>
            <div class="input-icon @error('nis') is-invalid @enderror">
                <i class="bi bi-person-vcard"></i>
                <input type="text" id="nis" name="nis" value="{{ old('nis') }}" placeholder="12511421">
            </div>
            @error('nis')<div class="error-text">{{ $message }}</div>@enderror
        </div>

        <div class="form-group">
            <label for="rombel">Rombel / Jurusan</label>
            <div class="input-icon @error('rombel') is-invalid @enderror">
                <i class="bi bi-journal"></i>
                <select id="rombel" name="rombel">
                    <option value="">Pilih Rombel</option>
                    @foreach ($daftarRombel as $r)
                        <option value="{{ $r }}" @selected(old('rombel') === $r)>{{ $r }}</option>
                    @endforeach
                </select>
                <i class="bi bi-chevron-down select-caret"></i>
            </div>
            @error('rombel')<div class="error-text">{{ $message }}</div>@enderror
        </div>
    </div>

    <div class="form-group">
        <label for="email">Email</label>
        <div class="input-icon @error('email') is-invalid @enderror">
            <i class="bi bi-envelope"></i>
            <input type="email" id="email" name="email" value="{{ old('email') }}"
                   placeholder="nama@smkwikrama.sch.id">
        </div>
        @error('email')<div class="error-text">{{ $message }}</div>@enderror
    </div>

    <div class="form-group">
        <label for="password">Password</label>
        <div class="input-icon @error('password') is-invalid @enderror">
            <i class="bi bi-lock"></i>
            <input type="password" id="password" name="password" placeholder="8-15 karakter">
            <button type="button" class="toggle-eye" data-toggle-password="password">
                <i class="bi bi-eye"></i>
            </button>
        </div>
        @error('password')<div class="error-text">{{ $message }}</div>@enderror
    </div>

    <div class="check-row">
        <input type="checkbox" name="terms" id="terms">
        <label for="terms" style="font-weight:400; margin:0;">
            Saya menyetujui <a href="#">syarat &amp; ketentuan</a> serta kebijakan privasi pengguna.
        </label>
    </div>
    @error('terms')<div class="error-text" style="margin-top:-12px; margin-bottom:12px;">{{ $message }}</div>@enderror

    <button type="submit" class="btn-primary">Daftar Sekarang <i class="bi bi-arrow-right"></i></button>
</form>

<p class="auth-footer">Sudah punya akun? <a href="{{ route('login') }}">Sign In</a></p>
@endsection