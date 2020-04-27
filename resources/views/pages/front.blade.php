@extends('layouts.app')
@section('content')
    @include('blocks.slider')
    <x-slogan :title="$values['slogan'] ?? ''">{!! $values['description'] ?? '' !!}</x-slogan>
    <section>
        @include('blocks.filter')
        <div class="catalog__in js-front-caltalog-content">
            @include('blocks.catalog',['category' => Catalog::getFrontCategory()])
        </div>
    </section>
    @include('blocks.news')
@endsection
