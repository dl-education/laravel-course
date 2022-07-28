<x-layouts.base title="Create new video">
    <x-form method="post" action="{{ route('videos.store') }}">
        @include('videos.form-fields')
        <button>Send</button>
    </x-form>
</x-layouts.base>