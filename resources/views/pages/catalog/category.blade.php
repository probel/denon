@extends('layouts.app')
@section('content')
<div class="catalog-page bg-light">
    {{-- здесь добавляется класс .blue (только на этой странице) --}}
    @include('shared.breadcrumb', ['class' => 'blue'])
    <section class="catalog-page__category">
        @foreach ($category->childs()->active()->orderBy('order')->get()->chunk(2) as $group)
        <div class="catalog-page__category__row d-flex justify-content-between">
            @if ($first = $group->first())
            <a href="{{ $first->getUrl() }}" class="catalog-page__category__item left text-right"
                 style="background-image: url({{ asset($first->values["bg_image"] ?? '') }});">
                <h2 class="title text-uppercase">{{ $first->title }}</h2>
                <div class="description">
                    <h3 class="description__title text-uppercase">{!! $first->teaser_title !!}</h3>
                    {!! $first->teaser_description !!}
                </div>
            </a>
            @endif
            @if ($second = $group->last())
            <a href="{{ $second->getUrl() }}" class="catalog-page__category__item right"
                 style="background-image: url({{ asset($second->values["bg_image"]) }});">
                <h2 class="title text-uppercase">{{ $second->title }}</h2>
                <div class="description">
                    <h3 class="description__title text-uppercase">{!! $second->teaser_title !!}</h3>
                    {!! $second->teaser_description !!}
                </div>
            </a>
            @endif
        </div>
        @endforeach
    </section>
</div>
@include('blocks.news')
@endsection
