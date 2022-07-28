<x-layouts.base :title="$post->title">
    <div>{{ $post->status->text() }}</div>
    <a href="/posts">Back</a>
    <hr>
    <em>{{ $post->created_at }}</em>
    <div>{{ $post->content }}</div>
    <a href="{{ route('posts.edit', [ $post->id ]) }}">Edit</a>
    <hr>
    <h2>Comments</h2>
    <x-comments.form for="post" :id="$post->id" />
    <hr>
    <x-comments.list :comments="$post->comments" />
</x-layouts.base>