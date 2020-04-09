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
                    <div class="col-lg-6">
                        <h2 class="text-uppercase">ВАШ ЗАКАЗ</h2>
                    </div>
                    <div class="col-lg-6">
                        <h2 class="text-uppercase">ОФОРМЛЕНИЕ ЗАКАЗА</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
