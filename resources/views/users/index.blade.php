<x-layouts.base title="Пользователи">
    <hr>
    @foreach($users as $user)
        <h2>{{ $user->name }}</h2>
        <div>eamil: {{ $user->email }}</div>
        <x-roles :roles="$user->roles"/>
        <a href="{{ route('users.roles.edit', [ $user->id ] ) }}">Настроить роль</a>
        <hr>
    @endforeach
</x-layouts.base>