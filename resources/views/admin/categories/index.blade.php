<x-layouts.base title="Админ">
    <x-admin.base-layout>
        <h4>Категории</h4>
        <a href="{{ route('categories.create') }}">Создать категорию</a>
        <hr>
            @forelse($categories as $category)
                <h2>{{ $category->name }} 
                    <x-form method="delete" action="{{ route('categories.destroy', $category->id) }}">
                        <button class="btn btn-danger btn-sm">X</button>
                    </x-form>
                </h2>
                <em>{{ $category->description }}</em><br>
                <em>{{ $category->created_at }}</em><br>
                <a href="{{ route('categories.show', $category->id) }}">побробнее..</a>
                <hr>      
        @empty
            <p>Нет категорий</p>
        @endforelse
        {{ $categories->links() }}
    </x-admin.base-layout>
</x-layouts.base>

    
