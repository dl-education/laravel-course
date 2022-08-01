<x-layouts.base title="Добавить видео">
    <x-admin.base-layout>
        <x-form method="post" action="{{ route('video.store') }}">
            @include('admin.videos.form-fields')
            <button class="btn btn-primary mb-2">Добавить</button>
        </x-form>
        <a href="{{ route('video.index') }}"><button class="btn btn-primary">Назад</button></a>
    </x-admin.base-layout>
</x-layouts.base>