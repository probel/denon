<div class="d-flex justify-content-between align-items-center mb-1">
    <strong>Заголовок</strong>
    @if ($model->$titleField)
        <span class="label label-success">Да</span>
    @else
        <span class="label label-danger">Нет</span>
    @endif
</div>
<div class="d-flex justify-content-between align-items-center mb-1">
    <strong>Описание</strong>
    @if ($model->$descriptionField)
        <span class="label label-success">Да</span>
    @else
        <span class="label label-danger">Нет</span>
    @endif
</div>
<div class="d-flex justify-content-between align-items-center">
    <strong>Ключи</strong>
    @if ($model->$keywordsField)
        <span class="label label-success">Да</span>
    @else
        <span class="label label-danger">Нет</span>
    @endif
</div>
