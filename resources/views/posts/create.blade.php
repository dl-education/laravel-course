<x-layouts.base title="Create new post">
    <x-form method="post" action="{{ route('posts.store') }}">
        @include('posts.form-fields')
        <button>Send</button>
    </x-form>
</x-layouts.base>