@extends('layouts.app')
@section('content')
<div class="cart-page bg-light">
    <section class="breadcrumb__line position-relative">
        <div class="container h-100">
            <div class="col-xl-10 mx-auto px-0 h-100">
                <div class="breadcrumb__line__in d-flex align-items-center position-relative h-100">
                    <nav aria-label="breadcrumb" class="breadcrumb__wrapper">
                        <ol class="breadcrumb text-uppercase p-0 m-0">
                            <li class="breadcrumb-item"><a href="/">DENON</a></li>
                            <li class="breadcrumb-item active" aria-current="page">КОРЗИНА</li>
                        </ol>
                    </nav>
                    <div class="page-title__small text-uppercase">
                        <strong>ВАШ заказ</strong>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="container">
        <div class="col-xl-10 mx-auto px-0">
            <div class="cart-page__content">
                <div class="row">
                    @if (Cart::get()->positions)
                        <div class="col-lg-6 pr-xl-4">
                            <h2 class="cart-page__content__title text-uppercase">ВАШ ЗАКАЗ</h2>
                            @include('shared.cart.content')
                        </div>
                        <div class="col-lg-6 pl-xl-4">
                            <h2 class="cart-page__content__title text-uppercase">ОФОРМЛЕНИЕ ЗАКАЗА</h2>
                            @include('shared.cart.order')
                        </div>
                    @else
                        <div class="cart-empty text-center">
                            <h2 class="cart-empty__title">Ваша корзина пуста</strong></h2>
                            <a class="btn mx-auto" href="/">На главную</a>
                        </div>
                    @endif
                </div>
                <div class="section-title d-flex">
                    <div class="section-title__icon flex-shrink-0 d-flex align-items-center">
                        <img src="/images/icons/delivery.png" alt="">
                    </div>
                    <div class="section-title__content d-flex flex-column justify-content-between">
                        <h2 class="section-title__title text-uppercase">ДОСТАВКА И ОПЛАТА</h2>
                        <div class="section-title__subtitle text-justify">
                            Юридическим лицом магазина «Денон.рф» является ООО «ПРАЙ», через которое осуществляются платежи и страхование
                            приобретённого оборудования (если в этой услуге заинтересован клиент).
                        </div>
                    </div>
                </div>
                <div class="cart-page__content__text text-justify">
                    <p></p>
                    <ul>
                        <li>При наличных расчётах, оплата происходит при получении товара вместе с гарантийным талоном.</li>
                        <li>При безналичной форме оплаты, товар вместе с гарантийным талоном и накладной доставляется заказчику
                            после поступления денег на расчётный счёт ООО "ПРАЙ"</li>
                    </ul>
                    <p>Мы работаем ежедневно с 10 до 22 часов. В субботу, воскресенье и праздничные дни производится доставка только тех заказов,
                        которые были оформлены в будние дни во время работы оптового склада.</p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
