<x-layouts.base title="Подтвердите выход">
    <div class="card">
		<div class="card-body">
			<div class="card-text">
				<x-form method="delete" action="{{ route('login.destroy') }}">
					<button class="btn btn-danger">Выйти</button>
				</x-form>
			</div>
		</div>
	</div>
</x-layouts.base>