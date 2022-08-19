<x-layouts.base title="Новые комментарии">
    <x-admin.base-layout>
        <ol>
            @forelse($comments as $comment)
            <x-admin.comment-item :comment="$comment"> 
                <div class="btn-group gap-1">
                    <x-form method='put' action="{{ route('accept.comment', $comment->id) }}">
                        <button class='btn btn-success btn-sm'>Принять</button>
                    </x-form>
                    <x-form method='put' action="{{ route('decline.comment', $comment->id) }}">
                        <button class='btn btn-primary btn-sm'>Отклонить</button>
                    </x-form>
                    <x-form class="text-end" method="delete" action="{{ route('comments.destroy', $comment->id) }}">
                        <button class="btn btn-danger btn-sm">X</button>
                    </x-form>
                </div>
            </x-admin.comment-item>
                <hr>
            @empty
                <p>Нет новых коментариев</p>
            @endforelse
            {{ $comments->links() }}
        </ol>
        @if($checkCommentsDeclined > 0)
            <h2><a href="{{ route('comment.declined') }}">Отклоненные коментарии</a></h2>
        @endif
        @if($checkCommentsAccepted > 0)
            <h2><a href="{{ route('comment.accepted') }}">Одобренные коментарии</a></h2>
        @endif
    </x-admin.base-layout>
</x-layouts.base>
    
                             
