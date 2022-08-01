<x-layouts.base title="Изменить видео">
    <x-admin.base-layout>
        @bind($video)
            <x-form method="put" action="{{ route('video.update', [ $video->id ]) }}">
                @include('admin.videos.form-fields')
                <button class="btn btn-primary mb-2">Сохранить изменения</button>
            </x-form>
        @endbind
        <a href="{{ route('video.show', [ $video->id ]) }}"><button class="btn btn-primary">Назад</button></a>
    </x-admin.base-layout>
</x-layouts.base>