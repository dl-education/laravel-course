<x-layouts.base title="Форма регистрации">
    <div class="card p-5">
        <x-form action="{{ route('register.store') }}">
            <div class="mb-3">
                <x-form-input name="name" label="Введите имя"/>
            </div>
            <div class="mb-3">
                <x-form-input name="email" label="Введите email" type="email"/>
            </div>
            <div class="mb-3">
                <x-form-input name="password" label="Введите пароль" type="password"/>
            </div>
            <div class="mb-3">
                <x-form-input name="password_confirmation" label="Повторите пароль" type="password"/>
            </div>
            <button class="btn btn-primary">Зарегистрироваться</button>
        </div>
    </x-form>
</x-layouts.base>