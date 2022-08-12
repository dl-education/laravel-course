  <h1>{{ $title }}</h1>
  <ul class="nav nav-tabs">
      @can('admin-main')
        <x-nav.navlink route-name="categories.index">Категории</x-nav.navlink>
        <x-nav.navlink route-name="tags.index" >Теги</x-nav.navlink>
        <x-nav.navlink route-name="users.index" >Пользователи</x-nav.navlink>
      @endcan
      @can('admin-writer')
      <x-nav.navlink route-name="posts.index" >Посты</x-nav.navlink>
      <x-nav.navlink route-name="video.index" >Видео</x-nav.navlink>
      @endcan
      @can('admin-moderator')
        <x-nav.navlink route-name="comment.new" >Комментарии</x-nav.navlink>
      @endcan
      @can('admin-main')
        @if(!$checkTrash)
            <a href="{{ route('trush') }}"><button class="btn btn-success">Корзина</button></a>
        @endif
      @endcan
  </ul>
    <div class="mt-3">
      {{ $slot }}
  </div>
  
