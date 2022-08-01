@foreach ($model->comments as $comment)
        <hr>
        <div class="alert @if($checkCommentStatus($comment->status))alert-success @else alert-danger @endif }}">
            <em>{{ $comment->created_at }}</em>
                @if(!$checkCommentStatus($comment->status)) 
                    <x-form method='get' action="{{ route('accept.comment', $comment->id) }}">
                        <b>Неодобрен</b>
                        <button class='btn btn-success btn-sm'>Принять</button>
                    </x-form>
                @endif
            <div class="mt-2">{{ $comment->text }}</div>
            <a href="{{ route('comments.edit', [ $comment->id ]) }}">Исправить</a>
        </div>
@endforeach