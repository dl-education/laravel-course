<x-layouts.base title="Новый пост">
    <x-admin.base-layout>
        <x-form method="post" action="{{ route('posts.store') }}">
            @include('admin.posts.form-fields')
            <button class="btn btn-primary mb-2">Отправить</button>
        </x-form>
        <a href="{{ route('posts.index') }}"><button class="btn btn-primary">Назад</button></a>
    </x-admin.base-layout>
</x-layouts.base>