<x-layouts.base title="Create new post">
    @bind($tag)
        <x-form method="put" action="{{ route('tags.update', [ $tag->id ]) }}">
            @include('tags.form-fields')
            <button>Send</button>
        </x-form>
    @endbind
</x-layouts.base>