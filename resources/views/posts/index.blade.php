<x-layouts.base title="Наш блог">
    <a href="{{ route('posts.create') }}">Добавить запись</a>
    <hr>
    @foreach($posts as $post)
        <h2>{{ $post->title }}</h2>
        <em>{{ $post->created_at }}</em><br>
        <a href="/posts/{{ $post->id }}">more...</a>
        <div>commets: {{ $post->comments_count }}</div>
        <x-tags :tags="$post->tags"/>
        <hr>
    @endforeach
</x-layouts.base>
