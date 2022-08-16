<x-layouts.base :title="$user->name">
    <a href="{{ route('users.index') }}">Back</a>
    <hr>
    <em>{{ $user->created_at }}</em>
    <div>{{ $user->email }}</div>
    <a href="{{ route('users.edit', [ $user->id ]) }}">Edit</a>
    <hr>
</x-layouts.base>