@extends('layouts.app')
@section('content')
    <div class="delivery-page contact-page bg-light">
        <x-header :bg-image="$bgImage">{!! $title !!}</x-header>
        <x-slogan :title="$values['slogan']">{!! $values['description'] ?? '' !!}</x-slogan>
        @include('shared.breadcrumb')
        <div class="container">
            <div class="col-xl-10 mx-auto px-0">
                <div class="contact-page__content">
                    <x-title
                        :title="$values['pay_title'] ?? ''"
                        :icon="$values['pay_icon'] ?? ''"
                        :subtitle="$values['pay_subtitle'] ?? ''"/>
                    {{-- здесь классы скопированы из корзины, не изменять --}}
                    <div class="cart-page__content__text text-justify">
                        {!! $values['pay_text'] ?? '' !!}
                    </div>
                    <div class="contact-page__content__separator"></div>
                    <h2 class="section-title__title text-uppercase color-broun mb-4">{{ $values['delivery_title'] ?? '' }}</h2>
                    <div class="delivery-page__text text-justify">
                        {!! $values['delivery_text'] ?? '' !!}
                    </div>
                </div>
            </div>
        </div>
</div>
@endsection

