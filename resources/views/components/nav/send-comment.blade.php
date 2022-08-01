<x-form class="text-end" action="{{ route('comments.store') }}">
  <input type="hidden" name="for" value="{{ $modelName }}">
  <input type="hidden" name="id" value="{{ $model->id }}">
  <x-form-textarea name="text" placeholder="Оставить комментарий"/>
  <button class="btn btn-primary mt-2">Отправить</button>
</x-form>
