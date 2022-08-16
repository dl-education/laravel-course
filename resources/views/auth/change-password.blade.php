<x-layouts.base title="Изменение пароля">
    <div class="card">
		<div class="card-body">
			<div class="card-text">
				<x-form method="post" action="{{ route('store.password') }}">
					<div class="mb-3">
                        <x-form-input name="old_password" label="Текущий пароль" type="password" />
                    </div>
                    <div class="mb-3">
                        <x-form-input name="new_password" label="Новый пароль" type="password" />
                    </div>
					<button class="btn btn-primary">Сменить пароль</button>
				</x-form>
			</div>
		</div>
	</div>
</x-layouts.base>
