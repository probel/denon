@extends('layouts.app')
@section('content')
<div class="thankyou success-page position-relative">
    <div class="container">
        @include('shared.breadcrumb')
        <h1 class="main-title text-center">{!! rv($title) !!}</h1>
        <div class="row">
            <div class="col-lg-6 d-flex">
                <img class="success-page__image img-fluid d-block mx-auto mt-auto" src="/images/project/boy-4.png" alt="">
            </div>
            <div class="col-lg-6 d-flex">
                <div class="my-auto">
                    <div class="success__info d-flex ">
                        <div class="icon icon-center flex-shrink-0">
                            @svg('images/svg/contact-2.svg')
                        </div>
                        <div class="success__info__text">
                            <p><strong>{{ $callback->name }},</strong> спасибо, что выбрали наш интернет-магазин!</p>
                            <p>В ближайшее время мы
                                @if ($callback->phone)
                                свяжемся с Вами по телефону:
                                <strong class="text-nowrap">{{ $callback->phone }}</strong> и поможем выбрать подходящий товар.</p>
                                @else
                                отправим Вам ответ на email: <strong>{{ $callback->email }}</strong>
                                @endif
                        </div>
                    </div>
                    <a class="btn btn-light thankyou__btn" href="/">Вернуться на сайт</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
