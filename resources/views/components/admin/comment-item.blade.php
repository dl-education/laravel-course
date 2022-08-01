<li>{{ $comment->text }}
  <em> 
      <b>-</b> 
      {{ $comment->created_at }}
      {{ $slot }}
   </em>
  <p>Пост - {{ $comment->commentable->title }}</p>
</li>