<x-layouts.base title="Регистрация на сайте">
    <div class="card">
		<div class="card-body">
			<div class="card-text">
				<x-form method="post" action="{{ route('register') }}">
                    <div class="mb-3">
                        <x-form-input name="name" label="Имя" />
                    </div>
					<div class="mb-3">
                        <x-form-input name="email" label="Email" />
                    </div>
					<div class="mb-3">
                        <x-form-input name="password" label="Пароль" type="password" />
                    </div>
					<div class="mb-3">
                        <x-form-checkbox name="remember" label="Запомнить авторизацию" checked />
                    </div>
					<button class="btn btn-primary">Регистрация</button>
				</x-form>
			</div>
		</div>
	</div>
</x-layouts.base>
