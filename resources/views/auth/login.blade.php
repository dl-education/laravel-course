<x-layouts.base title="Форма входа">
    <div class="card p-5">
    <x-form action="{{ route('login.store') }}">
        <div class="mb-3">
            <x-form-input name="email" label="Введите email" type="email"/>
        </div>
        <div class="mb-3">
            <x-form-input name="password" label="Введите пароль" type="password" />
        </div>
        <div class="mb-3">
            <x-form-checkbox name="remember" label="Запомнить пользователя" checked/>
        </div>
        <button class="btn btn-primary">Войти</button>
    </div>
    </x-form>
</x-layouts.base>