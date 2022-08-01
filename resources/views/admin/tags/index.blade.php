<x-layouts.base title="Теги">
    <x-admin.base-layout>
        <a href="{{ route('tags.create') }}">Добавить тег</a>
        <hr>
        @foreach($tags as $tag)
            <h2>{{ $tag->title }}</h2>
            <em>{{ $tag->url }}</em><br>
            <p>{{ $tag->description }}</p>
            <a href="{{ route('tags.edit', $tag->id) }}">Редактировать</a>
            <hr>
        @endforeach
        {{ $tags->links() }}
    </x-admin.base-layout>
</x-layouts.base>