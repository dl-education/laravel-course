<x-layouts.base title="Настройка роли для {{ $user->name }}">
    @bind($user)
        <x-form method="put" action="{{ route('users.roles.update', [ $user->id ]) }}">
            @include('users.form-fields')
            <button>Send</button>
        </x-form>
    @endbind
</x-layouts.base>