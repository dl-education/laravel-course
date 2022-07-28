<div class="mb-3">
    <x-form-input name="title" label="Заголовок" /> 
</div>
<div class="mb-3">
    <x-form-textarea name="content" label="Текст" />
</div>
<div class="mb-3">
    <x-form-select name="tags[]" label="Теги" :options="$tags" multiple many-relation /> 
</div>