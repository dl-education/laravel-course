@props([
'url',
'title',
])

<span class="badge bg-info">
    <a href="{{ $url }}">
        {{ $title }}
    </a>
</span>
