<x-layouts.base title="Видео">
    <x-admin.base-layout>
        @can('update',$video)
        <a href="{{ route('video.edit', [ $video->id ]) }}">Редактировать</a>
        <hr>
        @endcan
        <p><em>{{ $video->user->name }}</em></p>
        <iframe width="630" height="400"
                src="https://www.youtube.com/embed/{{ $video->code }}"
                fs="0"
                frameborder="0"
                allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                allowfullscreen>
        </iframe>
        <h4>Комментарии</h4>
        <x-nav.show-comments :model="$video"/>
        <hr class="mb-5">
        <x-nav.send-comment :model="$video"/>
    </x-admin.base-layout>
</x-layouts.base>