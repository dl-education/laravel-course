@if($hasMessage)
  <div class="mb-4 alert alert-{{ $messages[$message]['type'] }}">
    {{ $messages[$message]['text'] }}
  </div>
@endif