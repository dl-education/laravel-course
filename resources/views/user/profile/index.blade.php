<x-layouts.base title="Личный кабинет">
    <div class="alert alert-info">
        Добро пожаловать  <b>{{ $user->name }} !!!</b>
        <a href="{{ route('password.edit') }}"><button type="button" class="btn btn-success">Сменить пароль</button></a>
    </div>
    <div class="form-control p-2 ">
        <x-form>
            @bind($user)
            <div class=" mb-2 w-50">
                <x-form-input name="name" label="Имя пользователя"/>
            </div>
            <div class="mb-2 w-50">
                <x-form-input name="email" label="Почта пользователя"/>
            </div>
            <div class="mb-2 w-50">
                <button class="btn btn-primary">Изменить данные</button>
            </div>
           
            @endbind
        </x-form>
        Зарегистрирован<em> {{ $user->created_at }}</em>
    </div>
</x-layouts.base>