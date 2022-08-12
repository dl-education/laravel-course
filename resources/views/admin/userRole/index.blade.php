<x-layouts.base>
    <x-admin.base-layout>
        <h1>Список всех зарегистрированых пользователей</h1>
        <table class="table table-bordered text-center">
            <thead>
                <th>Имя</th>
                <th>Дата регистрации</th>
                <th>Email</th>
                <th>Роль</th>
                <th>Назанчить роль</th>
            </thead>
            <tbody>
                @foreach ($users as $user) 
                    <tr>
                        <td>
                            {{ $user->name }}
                        </td>
                        <td>
                            {{ $user->created_at }}
                        </td>
                        <td>
                            {{ $user->email }}
                        </td>
                        <td>
                            @foreach ($user->roles as $role) 
                               {{ $role->name->text() }}, 
                            @endforeach
                        </td>
                        <td>
                            <a href="{{ route('user.role.edit', [ $user->id ] ) }}">Изменить роль</a>
                        </td>
                    </tr>
                @endforeach
                    <tr>
                        <td class='text-center' colspan=8>
                            {{ $users->links() }}
                        </td>
                    </tr>
            </tbody>
        </table>
    </x-admin.base-layout>
</x-layouts.base>