@extends('layouts.app')
@section('content')
<div class="row">
    @if (Cart::get()->positions)
        <div class="col-md-6">
            @include('shared.cart.content')
        </div>
        <div class="col-md-6">
            @include('shared.cart.order')
        </div>
    @else
        <div class="cart-empty text-center">
            <h2 class="cart-empty__title">Ваша корзина пуста</strong></h2>
            <a class="btn mx-auto" href="{{ route('catalog.show') }}">В каталог</a>
        </div>
    @endif
</div>
@endsection
