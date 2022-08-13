<x-layouts.base title="Change password">
    <x-form method="put" action="{{ route('profile.password.update') }}">
        <div class="mt-3">
            <x-form-input type="password" name="current" label="Текущий пароль" />
        </div>
        <div class="mt-3">
            <x-form-input type="password" name="password" label="Новый пароль" />
        </div>
        <div class="mt-3">
            <x-form-input type="password" name="password_confirmation" label="Повторите новый пароль" />
        </div>
        <button class="btn btn-success mt-3">Send</button>
    </x-form>
</x-layouts.base>