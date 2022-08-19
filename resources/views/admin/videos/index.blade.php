<x-layouts.base title="Все видео">
    <x-admin.base-layout>
        <a href="{{ route('video.create') }}">Добавить видео</a>
            <hr>
            @foreach($videos as $video)
                <div class="card mb-2" style="width: 18rem;">
                    <div class="card-body row">
                        <iframe
                            src="https://www.youtube.com/embed/{{ $video->code }}"
                            fs="0"
                            frameborder="0"
                            allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen>
                        </iframe>
                        <span><a href="{{ route('video.show', $video->id) }}">подробнее...</a> - <em>{{ $video->user->name }}</em></span>
                    </div>
                </div>
            @endforeach
            {{ $videos->links() }}
    </x-admin.base-layout>
</x-layouts.base>