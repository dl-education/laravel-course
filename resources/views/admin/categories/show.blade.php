<x-layouts.base title="{{ $category->name }}">
    <x-admin.base-layout>
    <h1>{{ $category->name }}</h1>
        <a href="{{ route('categories.edit', $category->id)}}">Редактировать</a>
        <br>
        <hr>
        <em>{{ $category->created_at }}</em>
        <div>{{ $category->description }}</div>
        <h3 class="text-center">Посты</h3>
        <ol>
            @foreach ($category->posts as $post)
                <li>
                    <h4><a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a></h4>
                    <p><em>{{ $post->created_at }}</em></p>
                </li>
            @endforeach
        </ol>
    </x-admin.base-layout>
</x-layouts.base>