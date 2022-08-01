<x-layouts.base title="Видео">
    <a href="{{ route('video.all') }}">Назад</a>
    <hr>
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
</x-layouts.base>