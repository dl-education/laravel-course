<x-layouts.base title="Наш блог">
    <a href="{{ route('posts.create') }}">Добавить запись</a>
    <hr>
    @foreach($posts as $post)
        <h2>{{ $post->title }}</h2>
        <em>{{ $post->created_at }}</em><br>
        <a href="{{ route('posts.show', [ $post->id ] ) }}">more...</a>
        <div>commets: {{ $post->comments_count }}</div>
        <hr>
    @endforeach
    <hr>
    {{ $posts->links() }}
</x-layouts.base>