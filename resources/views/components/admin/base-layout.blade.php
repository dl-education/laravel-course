  <ul class="nav nav-tabs">
      <x-nav.navlink route-name="categories.index">Категории</x-nav.navlink>
      <x-nav.navlink route-name="tags.index" >Теги</x-nav.navlink>
      <x-nav.navlink route-name="posts.index" >Посты</x-nav.navlink>
      <x-nav.navlink route-name="video.index" >Видео</x-nav.navlink>
      <x-nav.navlink route-name="comment.new" >Комментарии</x-nav.navlink>
        @if(!$checkTrash)
            <a href="{{ route('trush') }}"><button class="btn btn-success">Корзина</button></a>
        @endif
  </ul>
    <div class="mt-3">
      {{ $slot }}
  </div>
  
