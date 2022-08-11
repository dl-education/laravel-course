@props([
    'title'
])

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    @vite(['resources/css\app.css', 'resources/js/app.js'])
</head>
<body class="app-grid">
    <header>
        <div class="container py-3 mb-4 border-bottom">
            header
            @auth
                <a href="{{ route('login.exit') }}">Logout</a>
            @else
                <a href="{{ route('login') }}">Login</a>
            @endif
        </div>
    </header>
    <div>
        <div class="container">
            <div class="row">
                <div class="col col-12 col-md-3">
                    <ul class="nav nav-pills flex-column mb-auto">
                        @auth
                        <li class="nav-item">
                            <a href="{{ route('home') }}" class="nav-link link-dark">Главная</a>
                        </li>
                        @can('admin-tags')
                        <li class="nav-item">
                            <a href="{{ route('tags.index') }}" class="nav-link link-dark">Теги</a>
                        </li>
                        @endif
                        <li class="nav-item">
                            <a href="{{ route('posts.index') }}" class="nav-link link-dark">Блог</a>
                        </li>
                        <li>
                            <a href="{{ route('videos.index') }}" class="nav-link link-dark">Видео</a>
                        </li>
                        <li>
                            <a href="{{ route('profile.password.edit') }}" class="nav-link link-dark">Смена пароля</a>
                        </li>
                        <li>
                            <a href="{{ route('address.form') }}" class="nav-link link-dark">Анализ адреса</a>
                        </li>
                        @else
                        <li>
                            <a href="{{ '/' }}" class="nav-link link-dark">Блог</a>
                        </li>
                        @endif
                    </ul>
                </div>
                <main class="col col-12 col-md-9">
                    @if(!auth()->user()->email_verified_at)
                        <div class="alert alert-danger">Подтверди почту!!!!</div>
                    @endif
                    <x-notifications />
                    <h1 class="h3 mb-4">{{ $title }}</h1>
                    {{ $slot }}
                </main>
            </div>
        </div>
    </div>
    <footer class="py-3 m4-3 border-top">
        <div class="container">
            footer
        </div>
    </footer>
</body>
</html>