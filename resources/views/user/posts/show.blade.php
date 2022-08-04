<x-layouts.base title="{{ $post->title }}">
    @foreach ($post->tags as $tag)
        #<a href="{{ route('tag.posts', [ $tag->url ]) }}">{{ $tag->title }}</a>
    @endforeach
    <hr>
    <em>{{ $post->created_at }}</em>
    <div>{{ $post->content }}</div>
    
    <h2>Комментарии</h2>
        <x-nav.show-comments :model="$post"/>
    @auth
        <hr class="mb-5">
        <x-nav.send-comment :model="$post"/>
    @else
    <div class="text-center">
        <b><em >Зарегистрируйтесь что бы коментировать</em></b>
    </div>
    @endauth
    <hr>
    <b>Категория</b> <em>{{ $post->category->name }}</em>
   
</x-layouts.base>