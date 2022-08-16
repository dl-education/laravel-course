@props([
'tags'
])
<div>
    @foreach($tags as $tag)
        <x-tags.item
            url="{{ $tag->url }}"
            title="{{ $tag->title }}"
        />
    @endforeach
</div>
