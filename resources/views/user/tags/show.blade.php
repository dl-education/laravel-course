<x-layouts.base title="{{ $tag->title }}">
        <p>{{ $tag->description }}</p>
        <hr>
        @forelse($tag->posts as $post)
            <h2>{{ $post->title }}</h2>
            <em>{{ $post->created_at }}</em><br>
            <a href="{{ route('post.one', $post->slug) }}">подбробнее...</a>
            <hr>
        @empty
        <em>Пока постов нет</em>
        @endforelse
</x-layouts.base>