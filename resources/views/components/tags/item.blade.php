@props([
'url',
'title',
])

<span class="badge bg-info">
    <a href="{{ route('tags.showPosts', [$url]) }}">
        {{ $title }}
    </a>
</span>
