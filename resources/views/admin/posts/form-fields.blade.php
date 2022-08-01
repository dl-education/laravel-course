<div class="mb-3">
    <x-form-input name="title" label="Заголовок" /> 
</div>
<div class="mb-3">
    <x-form-input name="slug" label="Идентификатор поста" /> 
</div>
<div class="mb-3">
    <x-form-textarea name="content" label="Текст" />
</div>
<div class="mb-3">
    <x-form-select name="category_id" placeholder="Выберите категорию" :options="$categories"  label="Выберите категорию"/>
</div>
<div class="mb-3">
    <x-form-select name="tags[]" placeholder="Выберите теги" :options="$tags"  label="Выберите теги" multiple many-relation/>
</div>
