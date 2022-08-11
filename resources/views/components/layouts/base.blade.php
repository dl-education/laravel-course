<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="app-grid">
    <header>
        <div class="container py-3 mb-2 border-bottom">
            <ul class="nav nav-pills justify-content-end">
                @guest
                    <x-nav.navlink route-name="login">Войти</x-nav.navlink>
                    <x-nav.navlink route-name="register">Регистрация</x-nav.navlink>
                @else
                    <x-nav.navlink route-name="profile.index">Личный кабинет</x-nav.navlink>
                    <x-nav.navlink route-name="login.exit">Выйти</x-nav.navlink>
                @endguest
            </ul>
        </div>
    </header>
    <div>
        <div class="container">
            <div class="row">
                <div class="col col-12 col-md-3">
                    <ul class="nav nav-pills flex-column mb-auto">
                        <x-nav.navlink route-name="home">Главная</x-nav.navlink>
                        @can('admin')
                            <x-nav.navlink route-name="main.admin" >Администрирование</x-nav.navlink>
                        @endcan    
                        <x-nav.navlink route-name="tags.all" >Теги</x-nav.navlink>
                        <x-nav.navlink route-name="post.all" >Посты</x-nav.navlink>
                        <x-nav.navlink route-name="video.all" >Видео</x-nav.navlink>
                    </ul>
                </div>
                <main class="col col-12 col-md-9">
                   @auth
                        @if(!auth()->user()->email_verified_at)
                            <div class="alert alert-info" role="alert">
                                Активируйте учетную запись!
                            </div>
                        @endif
                   @endauth
                    <x-admin.notifications/>
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