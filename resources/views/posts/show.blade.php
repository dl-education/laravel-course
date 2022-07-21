<x-layouts.base :title="$post->title">
    <div>{{ $post->status->text() }}</div>
    <a href="/posts">Back</a>
    <hr>
    <em>{{ $post->created_at }}</em>
    <div>{{ $post->content }}</div>
    <a href="{{ route('posts.edit', [ $post->id ]) }}">Edit</a>
    <hr>
    <h2>Comments</h2>
    <x-form action="{{ route('comments.store') }}">
        <input type="hidden" name="for" value="post">
        <input type="hidden" name="id" value="{{ $post->id }}">
        <x-form-textarea name="text" />
        <button>Send</button>
    </x-form>
    <hr>
    @foreach($post->comments as $comment)
        <div class="alert alert-success">
            <em>{{ $comment->created_at }}</em>
            <div class="mt-2">{{ $comment->text }}</div>
            <a href="{{ route('comments.edit', [ $comment->id ]) }}">Исправить</a>
        </div>
    @endforeach
</x-layouts.base>