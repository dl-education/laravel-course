<x-layouts.base title="Create new user">
    <x-form method="post" action="{{ route('users.store') }}">
        @include('users.form-fields')
        <button>Send</button>
    </x-form>
</x-layouts.base>