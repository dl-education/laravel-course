<x-layouts.base title="Изменить категорию - {{ $category->name }}">
    <x-admin.base-layout>
        @bind($category)
        <x-form method="put" action="{{ route('categories.update', $category->id) }}">
            @include('admin.categories.form-fields')
            <button class="btn btn-primary">Изменить</button>
        </x-form>
        @endbind
    </x-admin.base-layout>
</x-layouts.base>