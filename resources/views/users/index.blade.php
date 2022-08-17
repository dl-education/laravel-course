@php
    $title = 'Пользователи "блога"';
@endphp
<x-layouts.base :title="$title">
    <table class="table table-bordered">
        <tbody>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Actions</th>
            </tr>
            @foreach($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    <a href="{{ route('users.roles', [ $user->id ]) }}">Настроить права</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</x-layouts.base>