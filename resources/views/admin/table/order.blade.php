<span class="hidden">{{ $model->order }}</span>
<div class="d-flex align-items-center justify-content-between">
    @if ($model->order > $class::min('order'))
        <form action="{{ $basePath.$model->id.'/up' }}" method="POST" style="display:inline-block;">
            @csrf
            <button class="btn btn-info btn-xs" data-toggle="tooltip" title="" data-original-title="Подвинуть вверх">
                ↑
            </button>
        </form>
    @else
    <div style="width: 20px"></div>
    @endif
    <form action="{{ route('admin.order') }}" class="order-form" method="POST" style="display:inline-block;">
        @csrf
        <input type="hidden" name="old" value="'.$model->order.'">
        <input type="hidden" name="model" value="{{ $class }}">
        <input type="hidden" name="id" value="{{ $model->id }}">
        <input class="form-control field-order text-center" type="number" name="new" value="{{ $model->order }}">
    </form>
    @if ($model->order < $class::max('order'))
        <form action="{{ $basePath.$model->id.'/down' }}" method="POST" style="display:inline-block;">
            @csrf
            <button class="btn btn-danger btn-xs" data-toggle="tooltip" title="" data-original-title="Подвинуть вниз">
                ↓
            </button>
        </form>
    @else
        <div style="width: 20px"></div>
    @endif
</div>
