@props(['roles'])
<div>
    @foreach ($roles as $role)
        <span class="badge bg-info">
            {{ $role->name }}
        </span>
    @endforeach
</div>
