@extends('layouts.app')
@section('content')
    <div class="delivery-page contact-page bg-light">
        <!-- begin page-title -->
        <section class="page-title d-flex align-items-center">
            <div class="container">
                <div class="col-xl-10 mx-auto px-0">
                    
                    <h1 class="page-title__title text-uppercase mb-0"><strong>{{ $values['pay_title'] ?? '' }}</strong></h1>
                </div>
            </div>
        </section>
        <!-- end page-title -->
        <!-- begin slogan -->
        <section class="slogan">
            <div class="container">
                <h2 class="slogan__title text-uppercase text-center">{{ $values["slogan"]?? '' }}</h2>
                <div class="slogan__text text-uppercase text-center mx-auto">{{ $values["description"]?? '' }}</div>
        </div>
    </section>
    <!-- end slogan -->
    <section class="breadcrumb__line position-relative">
        <div class="container h-100">
            <div class="col-xl-10 mx-auto px-0 h-100">
                <div class="breadcrumb__line__in d-flex align-items-center position-relative h-100">
                    <nav aria-label="breadcrumb" class="breadcrumb__wrapper">
                        <ol class="breadcrumb text-uppercase p-0 m-0">
                            <li class="breadcrumb-item"><a href="/">DENON</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $values['pay_title'] ?? '' }}</li>
                        </ol>
                    </nav>
                    <div class="page-title__small text-uppercase">
                        <strong>{{ $values['paysubtitle'] ?? '' }}</strong>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- begin contacts -->
    <div class="container">
        <div class="col-xl-10 mx-auto px-0">
            <div class="contact-page__content">
                <div class="section-title d-flex">
                    <div class="section-title__icon flex-shrink-0 d-flex align-items-center">
                        <img src="/images/icons/delivery.png" alt="">
                    </div>
                    <div class="section-title__content d-flex flex-column justify-content-between">
                        <h2 class="section-title__title text-uppercase">{{ $values['paysubtitle'] ?? '' }}</h2>
                        <div class="section-title__subtitle text-justify">
                            {!! $values['pay_text'] ?? '' !!}
                        </div>
                    </div>
                </div>
                {{-- здесь классы скопированы из корзины, не изменять --}}
                <div class="cart-page__content__text text-justify">
                    {!! $values['shop_cart_text'] ?? '' !!}
                </div>
                <div class="contact-page__content__separator"></div>
                <h2 class="section-title__title text-uppercase color-broun mb-4">{{ $values['deliverytitle'] ?? '' }}</h2>
                <div class="delivery-page__text text-justify">
                    {!! $values['deliverytext'] ?? '' !!}
                </div>
            </div>
        </div>
    </div>
    <!-- end contacts -->
</div>
@endsection

