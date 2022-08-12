<x-layouts.base>
    <x-admin.base-layout>
        <x-form method="put" action="{{ route('user.role.update',[ $user->id ]) }}">
            @bind($user)
                <div class="mb-3">
                    <x-form-select name="roles[]" placeholder="Выберите роли" :options="$roles"  label="Выберите роли" multiple many-relation/>
                </div>
                <button class="btn btn-primary mb-2">Сохранить</button>
            @endbind
        </x-form>
    </x-admin.base-layout>
</x-layouts.base>