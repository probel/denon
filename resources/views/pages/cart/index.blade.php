@extends('layouts.app')
@section('content')
@php
    $cart = cartGet();
@endphp

<div class="cart-page">
    <div class="grey-bg position-relative">
        <div class="container">
            @include('shared.breadcrumb')
            <h1 class="main-title text-center">Корзина</h1>
            <div class="cart-page__content js-cart_content">
                @include('shared.cart.pageContent')
            </div>
        </div>
    </div>
    <div class="cart-helper">
        <div class="container">
            <h2 class="main-title text-center">
                Чтобы оформить заказ:
            </h2>
            <div class="cart-helper__text d-flex align-items-center mx-auto">
                <div class="icon icon-center">
                    @svg('images/svg/contact-2.svg')
                </div>
                <div class="text">
                    Свяжитесь с нами по бесплатному номеру
                    <a class="color-white" onclick="yaCounter54742531.reachGoal('call');" href="tel:{{ getPhone2()['clear'] }}">
                        <strong>{{ getPhone2()['format'] }}</strong>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="js-cart-form">
        @include('shared.cart.orderForm')
    </div>
    {{-- <div class="d-block d-md-none cart-mobile-contacts">
        @include('shared.contacts')
    </div> --}}
</div>
@endsection

{{--  --}}
