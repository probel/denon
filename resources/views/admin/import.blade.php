<div class="row">
    <div class="col-md-12">
        <div class="card card-success">
            <div class="card-body">
                @php
                    $rows = [
                        0 => 'A',
                        1 => 'B',
                        2 => 'C',
                        3 => 'D',
                        4 => 'E',
                        5 => 'F',
                        6 => 'G',
                        7 => 'H',
                        8 => 'I',
                        9 => 'J',
                        10 => 'K',
                        11 => 'L',
                        12 => 'M',
                        13 => 'N',
                        14 => 'O',
                    ];
                @endphp
                <form action="{{ route('import.store') }}" method="post" enctype="multipart/form-data">
                    <div class="row" >
                        <div class="col-md-4 mb-3">
                            <label for="price">Файл</label>
                            <div class="custom-file">
                                <input type="file" name="price" class="custom-file-input" id="price" required>
                                <label class="custom-file-label" for="price">Выбрать файл</label>
                                <small class="text-muted">
                                    Документ в формате xls, xlsx, csv, ods
                                </small>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="article_col">Колонка Артикул</label>
                                <select name="article_col" id="article_col" required class="form-control">
                                    @foreach ($rows as $key => $item)
                                    <option {{ $key == 1 ? 'selected' : '' }} value="{{ $key }}">{{ $item }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="price_col">Колонка с ценой</label>
                                <select name="price_col" id="price_col" required class="form-control">
                                    @foreach ($rows as $key => $item)
                                        <option {{ $key == 7 ? 'selected' : '' }} value="{{ $key }}">{{ $item }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="available">Колонка с наличием</label>
                                <select name="available_col" id="available" required class="form-control">
                                    @foreach ($rows as $key => $item)
                                        <option {{ $key == 9 ? 'selected' : '' }} value="{{ $key }}">{{ $item }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="date">Колонка с датой поставки</label>
                                <select name="date_col" id="date" required class="form-control">
                                    @foreach ($rows as $key => $item)
                                        <option {{ $key == 10 ? 'selected' : '' }} value="{{ $key }}">{{ $item }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="multiplier">Множитель цены</label>
                                <input type="number" step="0.1" class="form-control" name="multiplier" id="multiplier" value="1">
                                <small class="text-muted">Что бы увеличить цены на 10% - укажите 1.1</small>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-success">Импортировать</button>
                </form>
            </div>
        </div>
    </div>
</div>
