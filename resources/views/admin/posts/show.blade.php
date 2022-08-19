<x-layouts.base :title="$post->title">
    <x-admin.base-layout>
        <div>{{ $post->status->text() }}</div>
        <a href="{{ route('posts.index')}}">Назад</a>
        <hr>
        <em>{{ $post->created_at }}-{{ $post->user->name }}</em>
        <div>{{ $post->content }}</div>
        @can('edit',$post)
        <a href="{{ route('posts.edit', [ $post->id ]) }}">Редактировать</a>
        @endcan
        <x-form method="delete" action="{{ route('posts.destroy', [ $post->id ]) }}">
            <button class="btn btn-danger btn-sm">X</button>
        </x-form>
        <hr>
        <h2>Комментарии</h2>
            <x-nav.show-comments :model="$post"/>
        <hr class="mb-5">
            <x-nav.send-comment :model="$post"/>
        <b>Категория</b> <em>{{ $post->category->name }}</em>
    </x-admin.base-layout>
</x-layouts.base>