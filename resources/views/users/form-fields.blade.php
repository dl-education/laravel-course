<div class="mb-3">
    <x-form-input name="name" label="Наименование" /> 
</div>
<div class="mb-3">
    <x-form-input name="email" label="Почта" />
</div>
<div class="mb-3">
    <x-form-select name="roles[]" label="Роли" :options="$roles" multiple many-relation /> 
</div>