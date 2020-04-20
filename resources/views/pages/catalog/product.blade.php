@extends('layouts.app')
@section('content')
<div class="product-page bg-light">
    @include('shared.breadcrumb')
    <div class="container">
        <div class="col-xl-10 mx-auto px-0">
            <!-- begin product-card -->
            <div class="product-card">
                <div class="catalog__item__top d-flex align-items-baseline position-relative">
                    <div class="sale text-uppercase">
                        @if ($product->gift)
                        <img class="mr-2 pb-2" src="/images/icons/sale.png" alt="Подарок">
                        @endif
                        @if ($product->old_price)
                        Sale
                        @endif
                    </div>
                    <div class="in-stock text-uppercase ml-auto">
                        {{ $product->available ? 'в наличии' : 'нет в наличии'}}
                    </div>
                    @if ($product->new)
                    <div class="sticker position-absolute text-uppercase">new</div>
                    @endif
                </div>
                <div class="row">
                    <div class="col-xl-6">
                        <div class="product-card__sliders">
                            <div class="photo-big">
                                <a href="{{ asset($product->getImage()['path']) }}" data-key="0" class="photo-big__item d-flex h-100 js-big-image">
                                    <img class="m-auto img-fluid" alt="{{ $product->getImage()['alt'] }}" src="{{ asset($product->getImage()['path']) }}">
                                </a>
                            </div>
                            <div class="vendor-code d-xl-none text-right">{{ $product->article }}</div>
                            <div class="photo-small photo-small-slick">
                                @foreach ($product->getImages() as $imageKey => $image)
                                <img class="photo-small__item d-flex mx-auto js-small-image align-self-center m-auto" data-key="{{ $imageKey }}" src="{{ asset($image['path']) }}" alt="{{ asset($image['alt']) }}">
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="product-card__info">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h1 class="product-card__title">{{ $product->name }}</h1>
                                    <h2 class="product-card__subtitle">{!! $product->short_description !!}</h2>
                                </div>
                                <div class="vendor-code d-none d-xl-block">{{ $product->article }}</div>
                            </div>
                            @if (count($product->variations ?? []))
                            <div class="color-check d-flex">
                                <div class="color-check__caption">Цвет:</div>
                                @foreach ($product->variations as $key => $variant)
                                <div class="color-check__icon__wrapper js-change-color-wrapper {{ $loop->first ? 'active' : '' }}">
                                    <div class="color-check__icon js-change-color" data-key="{{ $key }}" data-toggle="tooltip" title="{{ $variant['title'] ?? '' }}" style="background-color: {{ $variant['color'] ?? '' }};"></div>
                                </div>
                                @endforeach
                            </div>
                            @endif
                            @if ($product->description)
                            <div class="product-card__description d-flex flex-column position-relative">
                                <div class="product-card__description__caption text-uppercase">ОПИСАНИЕ</div>
                                <div class="product-card__description__text text-justify">
                                    {!! $product->description !!}
                                </div>
                                @if ($product->footnote)
                                <div class="product-card__description__footnote mt-auto text-lg-right">
                                    {!! $product->footnote !!}
                                </div>
                                @endif
                            </div>
                            @endif
                            <form action="{{ route('cart.set') }}" method="post" class="product-card__form js-form__to-cart">
                                {{ csrf_field() }}
                                <div class="d-flex justify-content-between align-items-end flex-wrap">
                                    <div class="price__wrapper">
                                        @if ($product->old_price)
                                        <div class="old-price"><span class="js-product-old_sum">{{ number_format($product->old_price, 0, '.', ' ') }}</span> РУБ</div>
                                        @endif
                                        <div class="price-sum"><strong class="js-product-sum">{{ number_format($product->price, 0, '.', ' ') }} </strong> РУБ</div>
                                    </div>
                                    <div class="d-flex align-items-end count__wrapper">
                                        <div class="plusminus d-flex align-items-center js-plusminus">
                                            <div class="plusminus__caption text-uppercase">Количество:</div>
                                            <span class="minus js-minus">-</span>
                                            <input type="hidden" name="pid" value="{{ $product->id }}">
                                            <input type="hidden" name="vid" value="0">
                                            <input type="hidden" name="confirm" value="1">
                                            <input
                                                type="text"
                                                name="count"
                                                class="text-center js-product-count"
                                                data-price="{{ $product->price }}"
                                                data-old_price="{{ $product->old_price }}"
                                                value="1" readonly>
                                            <span class="plus js-plus">+</span>
                                        </div>
                                        <button class="btn btn-triangle btn-broun" type="submit">
                                            В корзину
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="product-description">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs d-flex nav-fill nav-tabs__custom">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#" data-target="#product-desc-01">Описание</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#"
                           data-target="#product-desc-02">Характеристики</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"
                           data-toggle="tab" href="#" data-target="#product-desc-03">ЗАГРУЗКИ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#" data-target="#product-desc-04">ОБЗОРЫ</a>
                    </li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane active" id="product-desc-01">
                        <div class="product-description__desc">
                            {!! $product->long_description !!}
                        </div>
                        @if (count($product->icons ?? []))
                        <div class="product-description__icons d-flex flex-wrap align-items-center justify-content-between">
                            @foreach ($product->icons as $icon)
                            <img src="{{ asset($icon['path'] ?? '') }}" alt="{{ $icon['alt'] ?? '' }}">
                            @endforeach
                        </div>
                        @endif
                    </div>
                    <div class="tab-pane" id="product-desc-02">
                        <div class="accordion features" id="features-accordion">
                            <div class="features__caption d-flex align-items-end">
                                <h2 class="features__caption__title mb-0">Предлагаем Вам сравнить модели по параметрам:</h2>
                                <div class="features__caption__item product">Denon AVR-S650H</div>
                                <div class="features__caption__item">
                                    <select>
                                        <option selected>Выбрать модель</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                </div>
                                <div class="features__caption__item">
                                    <select>
                                        <option selected>Выбрать модель</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                </div>
                            </div>
                            <div class="features__item">
                                {{-- надо дописать класс js чтобы при раскрытии пункта появлялся -is-open --}}
                                <div class="features__item__header d-flex align-items-center -is-open" id="features-item-header-1"
                                            role="button" data-toggle="collapse"
                                            data-target="#features-item-content-1"
                                            aria-expanded="true"
                                            aria-controls="collapseOne">
                                    <div class="icon position-relative"></div>
                                    <h2 class="title text-uppercase">ОСНОВНЫЕ ХАРАКТЕРИСТКИ</h2>
                                </div>

                                <div id="features-item-content-1" class="collapse show" aria-labelledby="features-item-header-1" data-parent="#features-accordion">
                                    <table class="features__table">
                                        <tbody>
                                            <tr>
                                                <td class="caption">Диапазон частот</td>
                                                <td>
                                                    <span class="circle"></span>
                                                    <span class="circle"></span>
                                                    <span class="circle"></span>
                                                </td>
                                                <td>
                                                    <span class="circle"></span>
                                                </td>
                                                <td>-</td>
                                            </tr>
                                            <tr>
                                                <td class="caption">Прибор подавляет цифровые сигналы</td>
                                                <td>GPS L1, GPS L2, Глонасс</td>
                                                <td>GPS L1, GPS L2, Глонасс</td>
                                                <td>-</td>
                                            </tr>
                                            <tr>
                                                <td class="caption">Радиус действия</td>
                                                <td><span class="circle"></span></td>
                                                <td><span class="circle"></span></td>
                                                <td><span class="circle"></span></td>
                                            </tr>
                                            <tr>
                                                <td class="caption">Источник питания</td>
                                                <td>12 В</td>
                                                <td>15 В</td>
                                                <td>17 В</td>
                                            </tr>
                                            <tr>
                                                <td class="caption">Питание</td>
                                                <td>от сети 220 В</td>
                                                <td>от сети 220 В</td>
                                                <td>от сети 220 В</td>
                                            </tr>
                                            <tr>
                                                <td class="caption">Условия эксплуатации прибора</td>
                                                <td>температура</td>
                                                <td>температура</td>
                                                <td>температура</td>
                                            </tr>
                                            <tr>
                                                <td class="caption">Габариты, мм</td>
                                                <td>85.7 х 20.5 х 20.5</td>
                                                <td>85.7 х 20.5 х 20.5</td>
                                                <td>85.7 х 20.5 х 20.5</td>
                                            </tr>
                                            <tr>
                                                <td class="caption">Вес, г</td>
                                                <td>25</td>
                                                <td>25</td>
                                                <td>25</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="features__item">
                                <div class="features__item__header d-flex align-items-center" id="features-item-header-2" role="button" data-toggle="collapse"
                                data-target="#features-item-content-2" aria-expanded="false" aria-controls="collapseOne">
                                <div class="icon position-relative"></div>
                                    <h2 class="title text-uppercase">СПЕЦИФИКАЦИИ</h2>
                                </div>

                                <div id="features-item-content-2" class="collapse" aria-labelledby="features-item-header-2" data-parent="#features-accordion">
                                    <div class="card-body">
                                       таблица
                                    </div>
                                </div>
                            </div>
                            <div class="features__item">
                                <div class="features__item__header d-flex align-items-center" id="features-item-header-3" role="button" data-toggle="collapse"
                                data-target="#features-item-content-3" aria-expanded="false" aria-controls="collapseOne">
                                <div class="icon position-relative"></div>
                                    <h2 class="title text-uppercase">ОБЩИЕ</h2>
                                </div>

                                <div id="features-item-content-3" class="collapse" aria-labelledby="features-item-header-3" data-parent="#features-accordion">
                                    <div class="card-body">
                                        таблица
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="product-desc-03">
                        <div class="downloads text-uppercase">
                            {{-- здесь класс .title (у первого downloads__row) --}}
                            <div class="row downloads__row title align-items-center">
                                <div class="col-lg-4 col-12"></div>
                                <div class="col-lg-2 col-sm-3">Дата</div>
                                <div class="col-lg-2 col-sm-3">ВЕС</div>
                                <div class="col-lg-2 col-sm-3">ТИП ФАЙЛА</div>
                                <div class="col-lg-2 col-sm-3"></div>
                            </div>
                            {{-- здесь класс .item (у этого и следующих downloads__row) --}}
                            <div class="row downloads__row item align-items-center">
                                <div class="col-lg-4 col-12">Инструкция ПО ЭКСПЛУАТАЦИИ</div>
                                <div class="col-lg-2 col-sm-3">12.02.2020</div>
                                <div class="col-lg-2 col-sm-3">-</div>
                                <div class="col-lg-2 col-sm-3">WEBSITE</div>
                                <div class="col-lg-2 col-sm-3"><a class="btn" href="#">Просмотр</a></div>
                            </div>
                            <div class="row downloads__row item align-items-center">
                                <div class="col-lg-4 col-12">Информация о продукте</div>
                                <div class="col-lg-2 col-sm-3">06.12.2019</div>
                                <div class="col-lg-2 col-sm-3">1.2MB</div>
                                <div class="col-lg-2 col-sm-3">PDF</div>
                                <div class="col-lg-2 col-sm-3"><a class="btn" href="#">СКАЧАТЬ</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="product-desc-04">
                        <div class="downloads text-uppercase">
                            <div class="row downloads__row item align-items-center">
                                <div class="col-lg-10 col-sm-9">Инструкция ПО ЭКСПЛУАТАЦИИ</div>
                                <div class="col-lg-2 col-sm-3"><a class="btn" href="#">Просмотр</a></div>
                            </div>
                            <div class="row downloads__row item align-items-center">
                                <div class="col-lg-10 col-sm-9">Инструкция ПО ЭКСПЛУАТАЦИИ</div>
                                <div class="col-lg-2 col-sm-3"><a class="btn" href="#">Просмотр</a></div>
                            </div>
                            <div class="row downloads__row item align-items-center">
                                <div class="col-lg-10 col-sm-9">Инструкция ПО ЭКСПЛУАТАЦИИ</div>
                                <div class="col-lg-2 col-sm-3"><a class="btn" href="#">Просмотр</a></div>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- bottom line -->
                <div class="product-description__bottom">
                    <form action="{{ route('cart.set') }}" class="product-card__form d-flex h-100 align-items-end justify-content-end flex-wrap js-form__to-cart">
                        <div class="price__wrapper">
                            <div class="old-price"><span class="js-product-old_sum">{{ number_format($product->old_price, 0, '.', ' ') }}</span> РУБ</div>
                            <div class="price-sum"><strong class="js-product-sum">{{ number_format($product->price, 0, '.', ' ') }}</strong> РУБ</div>
                        </div>
                        <div class="plusminus d-flex align-items-center js-plusminus">
                            <div class="plusminus__caption text-uppercase">Количество:</div>
                            <span class="minus js-minus">-</span>
                            <input type="hidden" name="pid" value="{{ $product->id }}">
                            <input type="hidden" name="vid" value="0">
                            <input type="hidden" name="confirm" value="1">
                            @csrf
                            <input type="text" name="count" data-price="{{ $product->price }}"
                                data-old_price="{{ $product->old_price }}" class="text-center js-product-count" data-price="product-price" data-old_price="product-oldprice" id="" value="1" readonly="">
                            <span class="plus js-plus">+</span>
                        </div>
                        <button class="btn btn-triangle btn-broun" type="submit">
                            В корзину
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('sctipts')
    <script>
        window.defaultImages = @json($product->images);
        window.variations = @json($product->variations);
    </script>
@endsection
