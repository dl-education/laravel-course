<x-layouts.base title="Все видео">
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
                <a href="{{ route('video.one', $video->slug) }}">подробнее...</a>
            </div>
        </div>
    @endforeach
    {{ $videos->links() }}
</x-layouts.base>