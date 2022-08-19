<x-layouts.base title="Главная">
    <div class="alert alert-info">
        Добро пожаловать
        @auth
            <b>{{ auth()->user()->name }} !!!</b>
        @endauth
        @guest
            <a href="{{ route('login') }}"><button type="button" class="btn btn-success">Войти</button></a>
        @endguest
    </div>
</x-layouts.base>