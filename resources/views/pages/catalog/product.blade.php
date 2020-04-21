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
                    @if ($product->isDescription())
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#" data-target="#product-desc-01">Описание</a>
                    </li>
                    @endif
                    @if ($product->isParams())
                    <li class="nav-item">
                        <a class="nav-link {{ $product->isDescription() ? '' : 'active' }}" data-toggle="tab" href="#"
                           data-target="#params">Характеристики</a>
                    </li>
                    @endif
                    @if ($product->isUploads())
                    <li class="nav-item">
                        <a class="nav-link {{ ($product->isDescription() && $product->isParams()) ? '' : 'active' }}"
                            data-toggle="tab" href="#" data-target="#product-desc-03">ЗАГРУЗКИ</a>
                    </li>
                    @endif
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#" data-target="#product-desc-04">ОБЗОРЫ</a>
                    </li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                    @if ($product->isDescription())
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
                    @endif
                    @if ($product->isParams())
                    <div class="tab-pane {{ $product->isDescription() ? '' : 'active' }}" id="params">
                        @include('shared.product.params')
                    </div>
                    @endif
                    @if ($product->isUploads())
                    <div class="tab-pane {{ ($product->isDescription() && $product->isParams()) ? '' : 'active' }}" id="product-desc-03">
                        @include('shared.product.uploads');
                    </div>
                    @endif
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
        window.similar = @json($product->similar());
        window.defaultImages = @json($product->images);
        window.variations = @json($product->variations);
    </script>
@endsection
