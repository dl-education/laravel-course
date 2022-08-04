<x-layouts.base title="Подтвердите выход">
    <x-form method="delete" action="{{ route('login.destroy') }}">
        <div class="mb-2">
            <button class="btn btn-danger">ОК</button>
        </div>
    </x-form>
    <div class="mb-2">
        <a href="{{ route('home') }}"><button class="btn btn-primary">Отмена</button></a>
    </div>
</x-layouts.base>