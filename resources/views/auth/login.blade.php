<x-layouts.base title="Залогиниться">
    <x-form action="{{ route('login.store') }}">
        <div class="mb-3">
            <x-form-input name="email" label="Введите email" />
        </div>
        <div class="mb-3">
            <x-form-input name="password" label="Введите пароль" />
        </div>
        <div class="mb-3">
            <x-form-checkbox name="remember" label="Запомнить пользователя" checked/>
        </div>
        <button class="btn btn-primary">Войти</button>
    </x-form>
</x-layouts.base>