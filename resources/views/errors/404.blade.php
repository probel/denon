@php
    $meta = \App\Models\Meta::find(14);
    $meta = [
            'title' =>  rv($meta->title),
            'description' => rv($meta->description),
            'keywords' => rv($meta->keywords),
        ];
@endphp
@extends('layouts.app')
@section('content')
<div class="error404 d-flex align-items-center position-relative">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb d-none d-sm-flex">
                <li class="breadcrumb-item ">
                    <a href="/">@svg('images/svg/house.svg')</a>
                </li>
                <li class="breadcrumb-item active ">
                    404
                </li>
            </ol>
        </nav>
        <div class="row">
            <div class="col-lg-6">
                <img class="error404__image img-fluid d-block mx-auto" src="/images/project/boy-5.png" alt="Ошибка 404">
            </div>

            <div class="col-lg-6 d-flex">
                <div class="error404__in my-auto">
                    <h1 class="title"><strong>404</strong> ошибка</h1>
                    <div class="success__info d-flex align-items-center">
                        <div class="icon icon-center flex-shrink-0">
                            @svg('images/svg/error-icon.svg')
                        </div>
                        <div class="success__info__text">
                            Страница, которую Вы ищете, не существует либо устарела.
                        </div>
                    </div>
                    <div class="d-flex flex-wrap justify-content-center justify-content-lg-start">
                        <a class="btn btn-light mb-3" href="{{url()->previous()}}">Вернуться назад</a>
                        <a class="btn mb-3" href="/">На главную</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
