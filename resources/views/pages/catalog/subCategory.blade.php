@extends('layouts.app')
@section('content')
<div class="category-page bg-light">
    <x-header :bg-image="$bgImage">{!! $title !!}</x-header>
    <x-slogan :title="$values['slogan'] ?? ''">{!! $values['description'] ?? '' !!}</x-slogan>
    @include('shared.breadcrumb')
    <section class="catalog">
        {{-- здесь только тизеры товаров совпадают полностью с тизерами на главной, сетка другая --}}
        <div class="catalog__in">
            <div class="container">
                <div class="catalog__in__list col-xl-10 mx-auto px-0">
                    <div class="row">
                        <div class="col-xl-9 order-2 order-xl-1">
                            <div class="row">
                                @forelse ($products as $product)
                                <div class="col-lg-4 col-md-6 mb-4">
                                    @include('shared.product.teaser')
                                </div>
                                @empty
                                <div class="col-md-12">
                                    <div class="cart-empty text-center">
                                        <h2 class="cart-empty__title"><strong>Товары не найдены</strong></h2>
                                    </div>
                                </div>
                                @endforelse
                            </div>
                        </div>
                        <div class="col-xl-3 order-1 order-xl-2">
                            <div class="category-page__filter">
                                <form action="{{ Request::url() }}" method="post" class="form">
                                    <div class="category-page__filter__block">
                                        <a class="category-page__filter__title" data-toggle="collapse" href="#category-page-filter-1" aria-expanded="true">
                                            Наличие
                                        </a>
                                        <div class="category-page__filter__options collapse show" id="category-page-filter-1">
                                            <label class="checkbox">
                                                <input type="radio" name="available" value="1" @if ($filter->available === 1) checked="checked" @endif>
                                                <span class="checkbox__text">В наличии</span>
                                            </label>
                                            <label class="checkbox">
                                                <input type="radio" name="available" value="0" @if ($filter->available === 0) checked="checked" @endif>
                                                <span class="checkbox__text">Нет в наличии</span>
                                            </label>
                                            <label class="checkbox ">
                                                <input type="radio" name="available" value="any" @if ($filter->available === 'any') checked="checked" @endif>
                                                <span class="checkbox__text">В наличии, включая отсутсвующие</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="category-page__filter__block">
                                        <a class="category-page__filter__title" data-toggle="collapse" href="#category-page-filter-2" aria-expanded="true">
                                            Цена
                                        </a>
                                        <div class="category-page__filter__options collapse show" id="category-page-filter-2">
                                            <label class="checkbox">
                                                <input type="radio" name="direction" value="asc" @if ($sort->direction === 'asc') checked="checked" @endif>
                                                <span class="checkbox__text">По возрастанию</span>
                                            </label>
                                            <label class="checkbox">
                                                <input type="radio" name="direction" value="desc" @if ($sort->direction === 'desc') checked="checked" @endif>
                                                <span class="checkbox__text">По убыванию</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="category-page__filter__block">
                                        <a class="category-page__filter__title" data-toggle="collapse" href="#category-page-filter-3" aria-expanded="true">
                                            Акция
                                        </a>
                                        <div class="category-page__filter__options collapse show" id="category-page-filter-3">
                                            <label class="checkbox">
                                                <input type="radio" name="promo" value="sale" @if ($filter->promo === 'sale') checked="checked" @endif>
                                                <span class="checkbox__text">Товары со скидой</span>
                                            </label>
                                            <label class="checkbox">
                                                <input type="radio" name="promo" value="gift" @if ($filter->promo === 'gift') checked="checked" @endif>
                                                <span class="checkbox__text">Подарки при покупке</span>
                                            </label>
                                            <label class="checkbox">
                                                <input type="radio" name="promo" value="any" @if ($filter->promo === 'any') checked="checked" @endif>
                                                <span class="checkbox__text">Все акционные товары</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="catalog__item__bottom d-flex justify-content-between">
                                        <button type="submit" class="btn btn-broun">ПРИМЕНИТЬ</button>
                                        <button type="submit" name="reset" value="1" class="btn btn-triangle btn-broun">СБРОСИТЬ</button>
                                        @csrf
                                    </div>
                                </form>
                                <div class="category-page__filter__block last">
                                    <a class="category-page__filter__title" data-toggle="collapse" href="#category-page-filter-4" aria-expanded="true">
                                        Все товары
                                    </a>
                                    <div class="category-page__filter__options collapse show" id="category-page-filter-4">
                                        <ul class="category-page__filter__list list-unstyled">
                                            @foreach (\Catalog::getCategories()->whereNull('parent_id') as $parent)
                                                @foreach ($parent->childs->where('status',1)->sortBy('order') as $child)
                                                <li class="category-page__filter__list__item">
                                                    <a
                                                        class="category-page__filter__list__link {{$child->id == $category->id ? 'active' : '' }}"
                                                        href="{{ $child->getUrl() }}">
                                                        {{ $child->title }}
                                                    </a>
                                                </li>
                                                @endforeach
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
