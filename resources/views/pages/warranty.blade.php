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
                        :title="$values['warranty_title'] ?? ''"
                        :icon="$values['warranty_icon'] ?? ''"
                        :subtitle="$values['warranty_subtitle'] ?? ''"/>
                    {!! $values['warranty_text'] ?? '' !!}
                    <x-title
                        :title="$values['service_title'] ?? ''"
                        :icon="$values['service_icon'] ?? ''"
                        :subtitle="$values['service_subtitle'] ?? ''"/>
                    @foreach ($values['service_addresses'] ?? [] as $address )
                        <h2 class="section-title__title text-uppercase">{!!  $address['title'] ?? '' !!}</h2>
                        <p>{!!  $address['text'] ?? '' !!}</p>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection


