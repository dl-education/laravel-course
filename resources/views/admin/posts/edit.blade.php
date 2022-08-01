<x-layouts.base title="Редактирование поста - {{ $post->title }}">
    <x-admin.base-layout>
        @bind($post)
            <x-form method="put" action="{{ route('posts.update', [ $post->id ]) }}">
                @include('admin.posts.form-fields')
                <button class="btn btn-primary mb-2">Сохранить</button>
            </x-form>
            <a href="{{ route('posts.show', [ $post->id ]) }}"><button class="btn btn-primary">Назад</button></a>
        @endbind
    </x-admin.base-layout>
</x-layouts.base>