@extends('layouts.app')
@section('content')
<div class="article-page bg-light">
    @include('shared.breadcrumb')
    <div class="container">
        <div class="col-xl-10 mx-auto px-0">
            <div class="article-page__content">
                <div class="article-page__content__title__wrapper d-flex align-items-baseline justify-content-between">
                    <h1 class="article-page__content__title text-uppercase">{{ $title }}</h1>
                </div>
                <div class="article-page__content__text">
                    {!! $values['body'] ?? '' !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
