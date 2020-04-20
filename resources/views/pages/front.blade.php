@extends('layouts.app')
@section('content')
    @include('blocks.slider')
    <x-slogan :title="$values['slogan'] ?? ''">{!! $values['description'] ?? '' !!}</x-slogan>
    <section>
        @include('blocks.filter')
        @include('blocks.catalog')
    </section>
    @include('blocks.news')
@endsection
