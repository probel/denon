<div class="accordion features" id="features-accordion">
    @if ($product->category->compare)
    <div class="features__caption d-flex align-items-end">
        <h2 class="features__caption__title mb-0">Предлагаем Вам сравнить модели по параметрам:</h2>
        <div class="features__caption__item product">{!! $product->name !!}</div>

        <div class="features__caption__item">
            <select class="form-control js-change-similar" data-row="2" data-pid="{{ $product->id }}">
                <option selected>Выбрать модель</option>
                @foreach ($product->similar()->where('id','<>',$product->id) as $item)
                <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="features__caption__item">
            <select class="form-control js-change-similar" data-row="3" data-pid="{{ $product->id }}">
                <option selected>Выбрать модель</option>
                @foreach ($product->similar()->where('id','<>',$product->id) as $item)
                <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>
        </div>

    </div>
    @endif
    @if (count($product->params['main'] ?? []))
    <div class="features__item">
        <div class="features__item__header d-flex align-items-center" id="features-item-header-main"
                    role="button" data-toggle="collapse"
                    data-target="#features-item-main"
                    aria-expanded="true"
                    aria-controls="collapseOne">
            <div class="icon position-relative"></div>
            <h2 class="title text-uppercase">ОСНОВНЫЕ ХАРАКТЕРИСТКИ</h2>
        </div>
        <div id="features-item-main" class="js-features__item collapse" data-header="#features-item-header-main" data-parent="#features-accordion">
            <table class="features__table">
                <tbody>
                    @foreach ($product->params['main'] ?? [] as $item)
                    <tr data-title="{{ $item['title'] ?? '' }}">
                        <td class="caption param-row-0">{!! $item['title'] ?? '' !!}</td>
                        <td class="param-row-1">
                            @if ($item['dot'] ?? null)
                            @for ($i = 0; $i < ((int) ($item['value'] ?? 0)); $i++)
                            <span class="circle"></span>
                            @endfor
                            @else
                            {!! $item['value'] !!}
                            @endif
                        </td>
                        @if ($product->category->compare)
                        <td class="param-row-2"></td>
                        <td class="param-row-3"></td>
                        @endif
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endif
    @if (count($product->params['spec'] ?? []))
    <div class="features__item">
        <div class="features__item__header d-flex align-items-center" id="features-item-header-spec"
                    role="button" data-toggle="collapse"
                    data-target="#features-item-spec"
                    aria-expanded="true"
                    aria-controls="collapseOne">
            <div class="icon position-relative"></div>
            <h2 class="title text-uppercase">СПЕЦИФИКАЦИИ</h2>
        </div>
        <div id="features-item-spec" class="js-features__item collapse" data-header="#features-item-header-spec" data-parent="#features-accordion">
            <table class="features__table">
                <tbody>
                    @foreach ($product->params['spec'] ?? [] as $item)
                    <tr data-title="{{ $item['title'] ?? '' }}">
                        <td class="caption param-row-0">{!! $item['title'] ?? '' !!}</td>
                        <td class="param-row-1">
                            @if ($item['dot'] ?? null)
                            @for ($i = 0; $i < ((int) ($item['value'] ?? 0)); $i++)
                            <span class="circle"></span>
                            @endfor
                            @else
                            {!! $item['value'] !!}
                            @endif
                        </td>
                        @if ($product->category->compare)
                        <td class="param-row-2"></td>
                        <td class="param-row-3"></td>
                        @endif
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endif
    @if (count($product->params['common'] ?? []))
    <div class="features__item">
        <div class="features__item__header d-flex align-items-center" id="features-item-header-common"
                    role="button" data-toggle="collapse"
                    data-target="#features-item-common"
                    aria-expanded="true"
                    aria-controls="collapseOne">
            <div class="icon position-relative"></div>
            <h2 class="title text-uppercase">ОБЩИЕ</h2>
        </div>
        <div id="features-item-common" class="js-features__item collapse" data-header="#features-item-header-common" data-parent="#features-accordion">
            <table class="features__table">
                <tbody>
                    @foreach ($product->params['common'] ?? [] as $item)
                    <tr data-title="{{ $item['title'] ?? '' }}">
                        <td class="caption param-row-0">{!! $item['title'] ?? '' !!}</td>
                        <td class="param-row-1">
                            @if ($item['dot'] ?? null)
                            @for ($i = 0; $i < ((int) ($item['value'] ?? 0)); $i++)
                            <span class="circle"></span>
                            @endfor
                            @else
                            {!! $item['value'] !!}
                            @endif
                        </td>
                        @if ($product->category->compare)
                        <td class="param-row-2"></td>
                        <td class="param-row-3"></td>
                        @endif
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endif
</div>
