<x-layouts.base :title="$tag->title">
    <a href="{{ route('tags.index') }}">Back</a>
    <hr>
    <em>{{ $tag->created_at }}</em>
    <div>{{ $tag->description }}</div>
    <a href="{{ route('tags.edit', [ $tag->id ]) }}">Edit</a>
</x-layouts.base>