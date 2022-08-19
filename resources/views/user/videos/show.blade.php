<x-layouts.base title="Видео">
    <a href="{{ route('video.all') }}">Назад</a>
    <hr>
    <p><em>{{ $video->user->name }}</em></p>
    <iframe width="630" height="400"
            src="https://www.youtube.com/embed/{{ $video->code }}"
            fs="0"
            frameborder="0"
            allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
            allowfullscreen>
    </iframe>
    <h2>Комментарии</h2>
        <x-nav.show-comments :model="$video"/>
    @auth
        <hr class="mb-5">
        <x-nav.send-comment :model="$video"/>
    @else
    <div class="text-center mb-2">
        <b><em>Зарегистрируйтесь что бы коментировать</em></b>
    </div>
    @endauth
</x-layouts.base>