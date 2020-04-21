@php
    $breadcrumbs = [
        ['href'=>'/','name' => 'Denon'],
        ['href'=> '','name' => 500],
    ];
    $title = 'Ошибка сервера';
@endphp
@extends('layouts.app')
@section('content')
<div class="article-page bg-light">
    @include('shared.breadcrumb')
    <div class="container">
        <div class="col-xl-10 mx-auto px-0">
            <div class="article-page__content">
                <div class="text-center">
                    <h1 class="article-page__content__title text-uppercase">Ошибка сервера</h1>
                </div>
                <div class="article-page__content__text">
                    <div class="text-center mt-5">
                        <a href="/" class="btn">На главную</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
