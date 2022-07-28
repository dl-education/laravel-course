@props([
    'comments'
])

@foreach($comments as $comment)
    <div class="alert alert-success">
        <em>{{ $comment->created_at }}</em>
        <div class="mt-2">{{ $comment->text }}</div>
        <a href="{{ route('comments.edit', [ $comment->id ]) }}">Исправить</a>
    </div>
@endforeach