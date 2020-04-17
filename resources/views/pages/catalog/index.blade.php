@extends('layouts.app')
@section('content')
<section class="catalog catalog-page position-relative pt-0">
    <div class="container">
        @include('shared.breadcrumb')
        <h1 class="main-title text-center">{{-- rv($pageTitle) --}}</h1>
        <ul class="nav nav-tabs nav-tabs__custom nav-justified catalog__tabs mx-auto">
            <li class="nav-item">
                <a class="nav-link {{ request()->accessories ? '' : 'active' }}" data-toggle="tab" href="#" data-target="#catalog-page-01">GSM сигнализации</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->accessories ? 'active' : '' }}" data-toggle="tab" href="#" data-target="#catalog-page-02">Аксессуары</a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane {{ request()->accessories ? '' : 'active' }}" id="catalog-page-01">
                <div class="d-none d-sm-block filter js-filter">
                    <ul class="filter__list list-unstyled d-flex mb-0">
                        {{-- @foreach (Main::categoriesMain() as $ct) --}}
                        <li data-id="{{--  $ct->id --}}" class="filter__list__item js-filter__item">
                            <a class="filter__list__item__link icon-center {{-- $ct->id == ($category->id ?? null) ? '-is-active' : '' --}}" href="{{-- $ct->getUrl() --}}">{{-- $ct->name --}}</a>
                        </li>
                        {{-- @endforeach --}}
                        <li class="filter__list__more">
                            <a class="filter__list__more__link icon-center js-filter-more" href="#">
                                <i class="fa fa-plus"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="filter d-block d-sm-none position-relative">
                    <ul data-scroll="0" class="filter__list filter__list-mobile d-flex list-unstyled mb-0 js-filter-mobile">
                        {{-- @foreach (Main::categories()->where('show_catalog',1) as $ct) --}}
                        <li data-id="{{-- $ct->id --}}" class="filter__list__item js-mobile-filter__item">
                            <a class="filter__list__item__link {{--  $ct->id == ($category->id ?? null) ? '-is-active' : '' --}}" href="{{-- $ct->getUrl() --}}">{{--  $ct->name --}}</a>
                        </li>
                        {{-- @endforeach --}}
                    </ul>
                    <div class="js-filter-mobile-prev filter-mobile-arrow prev position-absolute">
                        <svg width="9" height="14" viewBox="0 0 9 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M7 2L2 7L7 12" stroke="#F4364C" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                    <div class="js-filter-mobile-next filter-mobile-arrow next position-absolute">
                        <svg width="9" height="14" viewBox="0 0 9 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M2 12L7 7L2 2" stroke="#F4364C" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                </div>
                <div class="row no-gutters-custom catalog__list js-catalog-list">
                    @include('shared.product.teasers')
                </div>
                @if (request()->page != 'all' && ($showAllLink ?? null))
                    <a href="?page=all" class="show-all btn btn-sm btn-light mx-auto">Посмотреть все GSM сигнализации</a>
                @endif
            </div>
            <div class="tab-pane {{ request()->accessories ? 'active' : '' }}" id="catalog-page-02">
                <div class="d-none d-sm-block filter js-filter">
                    <ul class="filter__list list-unstyled d-flex mb-0">
                        {{-- @foreach (Main::categoriesAccessory() as $ct) --}}
                        <li data-id="{{--  $ct->id --}}" class="filter__list__item js-filter__item">
                            <a class="filter__list__item__link icon-center {{--  $ct->id == ($category->id ?? null) ? '-is-active' : '' --}}" href="{{-- $ct->getUrl() --}}?accessories=1">{{--  $ct->name --}}</a>
                        </li>
                        {{-- @endforeach --}}
                        <li class="filter__list__more">
                            <a class="filter__list__more__link icon-center js-filter-more" href="#">
                                <i class="fa fa-plus"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="filter d-block d-sm-none position-relative">
                    <ul data-scroll="0" class="filter__list filter__list-mobile d-flex list-unstyled mb-0 js-filter-mobile">
                        {{-- @foreach (Main::categoriesAccessory()->where('show_catalog',1) as $ct) --}}
                        <li data-id="{{-- $ct->id --}}" class="filter__list__item js-mobile-filter__item">
                            <a class="filter__list__item__link {{-- $ct->id == ($category->id ?? null) ? '-is-active' : '' --}}" href="{{--  $ct->getUrl() --}}">{{-- $ct->name --}}</a>
                        </li>
                        {{-- @endforeach --}}
                    </ul>
                    <div class="js-filter-mobile-prev filter-mobile-arrow prev position-absolute">
                        <svg width="9" height="14" viewBox="0 0 9 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M7 2L2 7L7 12" stroke="#F4364C" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                    <div class="js-filter-mobile-next filter-mobile-arrow next position-absolute">
                        <svg width="9" height="14" viewBox="0 0 9 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M2 12L7 7L2 2" stroke="#F4364C" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                </div>
                <div class="row no-gutters-custom catalog__list js-catalog-list">
                    @include('shared.product.teasers',['products' => $accessories])
                </div>
                @if (request()->page != 'all' && ($showAllAccessoriesLink ?? null))
                    <a href="?accessories=1&page=all" class="show-all btn btn-sm btn-light mx-auto">Посмотреть все Аксессуары</a>
                @endif
            </div>
        </div>
    </div>
</section>
<div class="catalog-selection position-relative">
    <div class="container">
        <h2 class="main-title text-center">Подборки</h2>
        <div class="catalog-selection__list d-flex justify-content-center flex-wrap">
            {{--  @foreach ($sets as $set) --}}
            <a class="catalog-selection__link"  href="{{--  $set->getUrl() --}}">{{-- $set->name --}}</a>
            {{--  @endforeach --}}
        </div> 
    </div>
</div>
@endsection
