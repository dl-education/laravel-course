<x-layouts.base :title="$tag->title">
    <h2>Посты с этим тегом</h2>
    @foreach($tag->posts as $post)
        <h2>{{ $post->title }}</h2>
        <em>{{ $post->created_at }}</em><br>
        <a href="{{ route('posts.show', [$post->id]) }}">more...</a>
        <hr>
    @endforeach
</x-layouts.base>
