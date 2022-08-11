<x-layouts.base title="Сменить пароль">
    <div class="card p-5">
        <x-form method='PUT' action="{{ route('password.update') }}">
            <div class="mb-3">
                <x-form-input name="current" label="Введите текущий пароль" type="password"/>
            </div>
            <div class="mb-3">
                <x-form-input name="password" label="Введите новый пароль" type="password"/>
            </div>
            <div class="mb-3">
                <x-form-input name="password_confirmation" label="Повторите новый пароль" type="password"/>
            </div>
            <button class="btn btn-primary">Сменить пароль</button>
        </div>
    </x-form>
</x-layouts.base>