<x-layouts.base title="Пользователи">
    <!-- <a href="{{ route('users.create') }}">Добавить запись</a> -->
    <hr>
    @foreach($users as $user)
        <h2>{{ $user->name }}</h2>
        <div>{{ $user->email }}</div>
        <em>{{ $user->created_at }}</em><br>
        <a href="{{ route('users.show', [ $user->id ] ) }}">more...</a>
        <hr>
    @endforeach
    <hr>
    {{ $users->links() }}
</x-layouts.base>