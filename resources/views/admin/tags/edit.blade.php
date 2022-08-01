<x-layouts.base title="Редактирование тега - {{ $tag->title }}">
    <x-admin.base-layout>
        @bind($tag)
            <x-form method="put" action="{{ route('tags.update', [ $tag->id ]) }}">
                @include('admin.tags.form-fields')
                <button class="btn btn-primary mb-2">Сохранить</button>
            </x-form>
        @endbind
        <a href="{{ route('tags.index') }}"><button class="btn btn-primary">Назад</button></a>
    </x-admin.base-layout>
</x-layouts.base>