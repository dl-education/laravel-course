<x-layouts.base title="Edit comment">
    <x-form method="put" action="{{ route('comments.update', [ $comment->id ]) }}">
        @bind($comment)
            <x-form-textarea name="text" />
            <button class="btn btn-primary mt-3">Сохранить</button>
        @endbind
    </x-form>
</x-layouts.base>