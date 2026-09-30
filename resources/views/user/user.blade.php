<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') - EnglishLearn</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="{{ asset('css/user.css') }}" rel="stylesheet">
</head>
<body>
@php $u = auth()->user(); @endphp

<header class="topbar">
    <div class="topbar-inner">
        <a href="{{ route('user.dashboard') }}" class="brand">
            <span class="brand-icon"><i class="bi bi-book-half"></i></span>
            EnglishLearn
        </a>

        <nav class="nav-pills">
            <a href="{{ route('user.dashboard') }}" class="{{ request()->routeIs('user.dashboard') ? 'active' : '' }}">
                <i class="bi bi-grid"></i> Dashboard
            </a>
            <a href="{{ route('user.materi.index') }}" class="{{ request()->routeIs('user.materi.*') ? 'active' : '' }}">
                <i class="bi bi-journal-text"></i> Materi
            </a>
            {{-- ganti href ke route quiz di Phase 4 --}}
            <a href="#" class="{{ request()->routeIs('user.quiz.*') ? 'active' : '' }}">
                <i class="bi bi-file-earmark-text"></i> Quiz
            </a>
        </nav>

        <div class="user-menu">
            <button type="button" class="user-btn" id="userBtn">
                @if ($u->foto_profil)
                    <img src="{{ asset('storage/' . $u->foto_profil) }}" class="avatar" alt="">
                @else
                    <span class="avatar">{{ strtoupper(substr($u->name, 0, 1)) }}</span>
                @endif
                {{ \Illuminate\Support\Str::before($u->name, ' ') }}
                <i class="bi bi-chevron-down" style="font-size:10px"></i>
            </button>

            <div class="dropdown" id="userDropdown">
                <a href="{{ route('password.edit') }}"><i class="bi bi-key"></i> Ubah Password</a>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit"><i class="bi bi-box-arrow-right"></i> Logout</button>
                </form>
            </div>
        </div>
    </div>
</header>

<main class="container">
    @if (session('success'))
        <div class="alert-success">{{ session('success') }}</div>
    @endif

    @yield('content')
</main>

<script>
    const btn = document.getElementById('userBtn');
    const dd  = document.getElementById('userDropdown');
    btn.addEventListener('click', e => { e.stopPropagation(); dd.classList.toggle('show'); });
    document.addEventListener('click', () => dd.classList.remove('show'));
</script>
</body>
</html>