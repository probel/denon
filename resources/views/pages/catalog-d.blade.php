@extends('layouts.app')
@section('content')
<div class="catalog-page bg-light">
    {{-- здесь добавляется класс .blue (только на этой странице) --}}
    <section class="breadcrumb__line blue position-relative">
        <div class="container h-100">
            <div class="col-xl-10 mx-auto px-0 h-100">
                <div class="breadcrumb__line__in d-flex align-items-center position-relative h-100">
                    <nav aria-label="breadcrumb" class="breadcrumb__wrapper">
                        <ol class="breadcrumb text-uppercase p-0 m-0">
                            <li class="breadcrumb-item"><a href="/">DENON</a></li>
                            <li class="breadcrumb-item active" aria-current="page">HI-FI КОМПОНЕНТЫ</li>
                        </ol>
                    </nav>
                    <div class="page-title__small text-uppercase">
                        <strong>HI-FI КОМПОНЕНТЫ</strong>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="catalog-page__category">
        <div class="catalog-page__category__row d-flex justify-content-between">
            <div class="catalog-page__category__item left text-right"
                 style="background-image: url(../{{ $selectedCategory[0]->values["bg_image"] }});">
                <h2 class="title text-uppercase">{{ $selectedCategory[0]['title'] }}</h2>
                <div class="description">
                    <h3 class="description__title text-uppercase">{!! $selectedCategory[0]['teaser_title'] !!}</h3>
                    {!! $selectedCategory[0]['teaser_description'] !!}
                </div>
            </div>
            <div class="catalog-page__category__item right"
                 style="background-image: url(../{{ $selectedCategory[1]->values["bg_image"] }});">
                <h2 class="title text-uppercase">{{ $selectedCategory[1]['title'] }}</h2>
                <div class="description">
                    <h3 class="description__title text-uppercase">{!! $selectedCategory[1]['teaser_title'] !!}</h3>
                   {!! $selectedCategory[1]['teaser_description'] !!}
                </div>
            </div>
        </div>
        <div class="catalog-page__category__row d-flex justify-content-between">
            <div class="catalog-page__category__item left text-right"
                 style="background-image: url(../{{ $selectedCategory[2]->values["bg_image"] }});">
                <h2 class="title text-uppercase">{{ $selectedCategory[2]['title'] }}</h2>
                <div class="description">
                    <h3 class="description__title text-uppercase">{!! $selectedCategory[2]['teaser_title'] !!}</h3>
                   {!! $selectedCategory[2]['teaser_description'] !!}
                </div>
            </div>

            <div class="catalog-page__category__item right"
                 style="background-image: url(../{{ $selectedCategory[3]->values["bg_image"] }});">
                <h2 class="title text-uppercase">{!! $selectedCategory[3]['title'] !!}</h2>
                <div class="description">
                    <h3 class="description__title text-uppercase">{!! $selectedCategory[3]['teaser_title'] !!}</h3>
                   {!! $selectedCategory[3]['teaser_description'] !!}
                </div>
            </div>
        </div>
    </section>
</div>
@include('blocks.catalognews', array('productNews'=> $productNews))
@endsection
