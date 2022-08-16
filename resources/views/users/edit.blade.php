<x-layouts.base title="Edit user">
    @bind($user)
        <x-form method="put" action="{{ route('users.update', [ $user->id ]) }}">
            @include('users.form-fields')
            <button>Send</button>
        </x-form>
    @endbind
</x-layouts.base>