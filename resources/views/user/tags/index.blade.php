<x-layouts.base title="Все теги">
        <hr>
        @foreach($tags as $tag)
        <a href="{{ route('tag.posts', [ $tag->url ]) }}"><h2>{{ $tag->title }}</h2></a>
            <em>{{ $tag->url }}</em><br>
            <p>{{ $tag->description }}</p>
            <hr>
        @endforeach
        {{ $tags->links() }}
</x-layouts.base>