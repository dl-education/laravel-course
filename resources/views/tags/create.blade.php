<x-layouts.base title="Create new tag">
    <x-form method="post" action="{{ route('tags.store') }}">
        @include('tags.form-fields')
        <button>Send</button>
    </x-form>
</x-layouts.base>