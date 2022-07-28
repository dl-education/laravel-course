<x-layouts.base title="Теги блога">
    <a href="{{ route('tags.create') }}">Добавить тег</a>
    <hr>
    @foreach($tags as $tag)
        <h2>{{ $tag->title }}</h2>
        <em>{{ $tag->url }}</em><br>
        <a href="{{ route('tags.show', [ $tag->id ]) }}">more...</a>
        <hr>
    @endforeach
</x-layouts.base>