@php
// class component
$message = session()->get('notification');
$hasMessage = $message !== null;
$messages = $hasMessage ? config('app-notifications') : [];

@endphp

@if($hasMessage)
<div class="mb-4 alert alert-{{ $messages[$message]['type'] }} ">
    {{ $messages[$message]['text'] }}
</div>
@endif