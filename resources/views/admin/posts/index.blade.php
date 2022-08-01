<x-layouts.base title="Наш блог">
    <x-admin.base-layout>
        <a href="{{ route('posts.create') }}">Добавить запись</a>
        <hr>
        @foreach($posts as $post)
            <h2>{{ $post->title }}</h2>
            <em>{{ $post->created_at }}</em><br>
            <a href="{{ route('posts.show', $post->id) }}">подробнее...</a>
            <hr>
        @endforeach
        {{ $posts->links() }}
    </x-admin.base-layout>
</x-layouts.base>