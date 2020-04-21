@extends('layouts.app')
@section('content')
<x-header :bg-image="$bgImage ?? ''">{!! $title !!}</x-header>
<x-slogan :title="$values['slogan'] ?? ''">{!! $values['description'] ?? '' !!}</x-slogan>
<div class="product-page search-page bg-light">

    @include('shared.breadcrumb')
    <div class="container">
        <div class="col-xl-10 mx-auto px-0">
            <div class="article-page__content">
                <form action="{{ route('search') }}" method="GET" class="search-page__form position-relative">
                    <input class="form-control" type="search" name="find" value="{{ $find }}">
                    <small class="ml-3">Введите необходимый запрос</small>
                    <span class="icon position-absolute"><i class="fas fa-search"></i></span>
                </form>
                @if ($results->count())
                <h3 class="results__title text-uppercase">Результаты поиска</h3>
                <div class="results">
                    @foreach ($results as $product)
                    <div class="buy-item d-flex align-items-center buy-item__wrapper h-100">
                        <div class="d-flex align-items-center buy-item__product">
                            <div class="buy-item__image flex-shrink-0">
                                <a class="d-block buy-item__image__link" href="{{ $product->getUrl() }}">
                                    <img class="mw-100 mh-100" src="{{ asset($product->getImage()['path']) }}" alt="{{ $product->getImage()['alt'] }}">
                                </a>
                            </div>
                            <div class="buy-item__info">
                                <a class="buy-item__name" href="{{ $product->getUrl() }}" >{!! $product->name !!}</a>
                                @if (count($product->variations ?? []))
                                <div class="color-check d-flex align-items-center">
                                    <div class="color-check__caption">Цвет:</div>
                                    @foreach ($product->variations as $variant)
                                    <div class="color-check__icon" title="{{ $variant['title'] ?? '' }}" style="background-color: {{ $variant['color'] ?? '' }}"></div>
                                    @endforeach
                                </div>
                                @endif
                            </div>
                        </div>
                        <div class="d-flex align-items-center buy-item__option justify-content-between flex-grow-1 {{ $product->available ? 'color-blue' : ''}}">
                            {!! $product->short_description !!}
                        </div>
                        <div class="in-stock text-uppercase text-right">
                            <div class="in-stock__title">
                                @if ($product->available)
                                <div class="color-blue">В наличии</div>
                                @else
                                <div class="color-broun">Нет наличии</div>
                                @endif
                            </div>
                            <div class="price">
                                @if ($product->price)
                                <strong>{{ number_format($product->price,0,'.',' ') }}</strong> РУБ
                                @endif
                            </div>
                        </div>
                    </div>
                    @endforeach
                    {{ $results->appends(['find'=>$find])->links() }}
                </div>
                @else
                <h3 class="results__title text-uppercase">{{ $text }}</h3>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
