<x-layouts.base title="Edit video">
    @bind($video)
        <x-form method="put" action="{{ route('videos.update', [ $video->id ]) }}">
            @include('videos.form-fields')
            <button>Send</button>
        </x-form>
    @endbind
</x-layouts.base>