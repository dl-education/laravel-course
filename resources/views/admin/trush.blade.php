<x-layouts.base title="Корзина">
    <x-admin.base-layout>
        @foreach ($posts as $post)
            <hr>
                <h3>{{ $post->title }}</h3>
                <em>{{ $post->content }}</em><br>
                <em>{{ $post->created_at }}</em><br>
                <div class="btn-group gap-1">
                    <x-form method="put" action="{{ route('restoreOne') }}">
                        <input type="hidden" name="id" value="{{ $post->id }}">
                        <button class="btn btn-success">Восстановить запись</button>
                    </x-form>
                    <x-form method="delete" action="{{ route('deleteForever', $post->id) }}">
                        <button class="btn btn-danger">X</button>
                    </x-form>
                </div>
            <hr>
        @endforeach
        <div class="text-end">
            <x-form action="{{ route('restoreAll') }}">
                <button class="btn btn-primary mb-2">Восстановить все</button>
            </x-form>
            <x-form method="delete" action="{{ route('deleteAll') }}">
                <button class="btn btn-danger">Удалить все</button>
            </x-form>
        </div>
    </x-admin.base-layout>
</x-layouts.base>