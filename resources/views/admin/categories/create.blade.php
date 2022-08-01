<x-layouts.base title="Создать новую категорию">
    <x-admin.base-layout>
        <x-form method="post" action="{{ route('categories.store') }}">
            @include('admin.categories.form-fields')
            <button class="btn btn-primary">Отправить</button>
        </x-form>
    </x-admin.base-layout>
</x-layouts.base>

