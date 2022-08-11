<x-layouts.base title="Адрес">
    <x-form method="post" action="{{ route('address.parse') }}">
        <div class="mt-3">
            <x-form-input name="address" label="Адрес для анализа" />
        </div>
        <button class="btn btn-success mt-3">Send</button>
    </x-form>
</x-layouts.base>