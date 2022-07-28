<x-layouts.base :title="$video->code">
    <a href="{{ route('videos.index') }}">Back</a>
    <hr>
    <em>{{ $video->created_at }}</em>
    <div>
        <iframe width="560" height="315" 
            src="https://www.youtube.com/embed/{{ $video->code }}" 
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
            allowfullscreen>
        </iframe>
    </div>
    <a href="{{ route('videos.edit', [ $video->id ]) }}">Edit</a>
    <hr>
    <h2>Comments</h2>
    <x-comments.form for="video" :id="$video->id" />
    <hr>
    <x-comments.list :comments="$video->comments" />
</x-layouts.base>