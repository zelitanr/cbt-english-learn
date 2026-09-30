<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') - EnglishLearn</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="{{ asset('css/auth.css') }}" rel="stylesheet">
</head>
<body>
    <div class="blob blob-1"></div>
    <div class="blob blob-2"></div>

    <header class="brand">
        <span class="brand-icon"><i class="bi bi-book-half"></i></span>
        EnglishLearn
    </header>

    <main class="auth-wrapper">
        <div class="auth-card">
            @yield('content')
        </div>
    </main>

    <script>
        document.querySelectorAll('[data-toggle-password]').forEach(btn => {
            btn.addEventListener('click', () => {
                const input = document.getElementById(btn.dataset.togglePassword);
                const icon = btn.querySelector('i');
                const show = input.type === 'password';
                input.type = show ? 'text' : 'password';
                icon.className = show ? 'bi bi-eye-slash' : 'bi bi-eye';
            });
        });
    </script>
</body>
</html>