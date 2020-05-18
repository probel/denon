@extends('layouts.app')
@section('content')
<div class="contact-page bg-light">
    <x-header :bg-image="$bgImage">{!! $title !!}</x-header>
    <x-slogan :title="$values['slogan']">{!! $values['description'] ?? '' !!}</x-slogan>
    @include('shared.breadcrumb')
    <div class="container">
        <div class="col-xl-10 mx-auto px-0">
            <div class="contact-page__content">
                <x-title
                    :title="$values['contacts_title'] ?? ''"
                    :icon="$values['contacts_icon'] ?? ''"
                    :subtitle="$values['contacts_subtitle'] ?? ''"/>
                <div class="contact-page__content__text">
                    {!! $values['contacts_text'] ?? '' !!}
                </div>
                <x-title
                    :title="$values['show_title'] ?? ''"
                    :icon="$values['show_icon'] ?? ''"
                    :subtitle="$values['show_subtitle'] ?? ''"/>
                {!! $values['show_text'] !!}

                <div class="contact-page__content__separator"></div>
                <div class="contact-page__content__text d-flex justify-content-between mb-0 ">
                    <div>
                        {!! $values['legal_text'] !!}
                    </div>
                    <img class="d-block align-self-end" src="{{ asset('/images/icons/logo.png') }}" alt="{{ config('app.name') }}">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
