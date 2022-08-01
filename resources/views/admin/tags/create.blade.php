<x-layouts.base title="Новый тег">
    <x-admin.base-layout>
        <x-form method="post" action="{{ route('tags.store') }}">
            @include('admin.tags.form-fields')
            <button class="btn btn-primary mb-2">Отправить</button>
        </x-form>
        <a href="{{ route('tags.index') }}"><button class="btn btn-primary">Назад</button></a>
    </x-admin.base-layout>
</x-layouts.base>