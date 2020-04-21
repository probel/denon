@extends('layouts.app')
@section('content')
<div class="cart-page bg-light">
    @include('shared.breadcrumb')
    <div class="container">
        <div class="col-xl-10 mx-auto px-0">
            <div class="cart-page__content">
                @if (Cart::get()->positions)
                    <div class="row">
                        <div class="col-xl-6 pr-xl-4">
                            <h2 class="cart-page__content__title text-uppercase">ВАШ ЗАКАЗ</h2>
                            <div class="js-cart-content">
                                @include('shared.cart.content')
                            </div>
                        </div>
                        <div class="col-xl-6 pl-xl-4">
                            <h2 class="cart-page__content__title text-uppercase">ОФОРМЛЕНИЕ ЗАКАЗА</h2>
                            @include('shared.cart.order')
                        </div>

                    </div>
                    <x-title
                        :title="$values['delivery_title'] ?? ''"
                        :icon="$values['delivery_icon'] ?? ''"
                        :subtitle="$values['delivery_subtitle'] ?? ''"/>
                    <div class="cart-page__content__text text-justify">
                        {!! $values['delivery_text'] ?? '' !!}
                    </div>
                @else
                    <div class="cart-empty text-center">
                        <h2 class="cart-empty__title"><strong>{{ $emptyMessage }}</strong></h2>
                        @if ($emptyText)
                        <p class="mb-5">{{ $emptyText }}</p>
                        @endif
                        <a class="btn mx-auto" href="/">На главную</a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

@endsection
