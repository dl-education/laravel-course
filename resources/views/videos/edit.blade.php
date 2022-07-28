<x-layouts.base title="Create new post">
    @bind($post)
        <x-form method="put" action="{{ route('posts.update', [ $post->id ]) }}">
            @include('posts.form-fields')
            <button>Send</button>
        </x-form>
    @endbind
</x-layouts.base>