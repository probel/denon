@extends('layouts.app')
@section('content')
<div class="article-page bg-light">
    @include('shared.breadcrumb')
    <div class="container">
        <div class="col-xl-10 mx-auto px-0">
            <div class="article-page__content">
                <div class="article-page__content__title__wrapper d-flex align-items-baseline justify-content-between">
                    <h1 class="article-page__content__title text-uppercase">{{ $title }}</h1>
                    <div class="article-page__content__date">{{ $article->created_at->format('d.m.Y') }}</div>
                </div>
                <div class="article-page__content__text">
                    {!! $article->body !!}
                </div>
                @if ($article->values['link_path'] ?? null)
                <a href="{{ $article->values['link_path'] }}" class="article-page__content__big-link text-center text-uppercase">{{ $article->values['link_text'] ?? '' }}</a>
                @endif
            </div>
        </div>
    </div>
</div>
<section class="news">
    <div class="row row-second position-relative">
        @if ($second = $article->getPrev())
        <div class="col-xl-6 ml-15">
            <div class="d-flex row-second__wrapper">
                <div class="row-second__image flex-shrink-0">
                    <div class="news__item__image" style="background-image: url({{ asset($second->image) }})"></div>
                </div>
                <div class="first news__item row-second__news__item py-3 my-auto">
                    <div class="news__item__height overflow-hidden">
                        <div class="news__item__date text-right">
                            {{ $second->created_at->format('d.m.Y') }}
                        </div>
                        <h3 class="news__item__title text-uppercase">
                            <a href="{{ $second->getUrl() }}">{{ $second->title }}</a>
                        </h3>
                        <div class="news__item__text text-justify">
                            {!! $second->description !!}
                        </div>
                    </div>
                    <div class="text-right">
                        <a class="news__item__more text-uppercase " href="{{ $second->getUrl() }}">ЧИТАТЬ ДАЛЬШЕ</a>
                    </div>
                </div>
            </div>
        </div>
        @endif
        @if ($last = $article->getNext())
        <div class="col-xl-6 position-static">
            <div class="container position-absolute container-absolute">
                <div class="col-xl-10 mx-auto h-100 px-0">
                    <div class="col-xl-6 offset-xl-6 px-0">
                        <div class="d-flex row-second__wrapper">
                            <div class="row-second__image__second flex-shrink-0">
                                <div class="news__item__image" style="background-image: url({{ asset($last->image) }})"></div>
                            </div>
                            <div class="news__item row-second__news__item py-3 my-auto">
                                <div class="news__item__height overflow-hidden">
                                    <div class="news__item__date text-right">
                                        {{ $last->created_at->format('d.m.Y') }}
                                    </div>
                                    <h3 class="news__item__title text-uppercase">
                                        <a href="{{ $last->getUrl() }}">{{ $last->title }}</a>
                                    </h3>
                                    <div class="news__item__text text-justify">
                                        {!! $last->description !!}
                                    </div>
                                </div>
                                <div class="text-right">
                                    <a class="news__item__more text-uppercase " href="{{ $last->getUrl() }}">ЧИТАТЬ ДАЛЬШЕ</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
    {{-- <div class="row row-second position-relative">
        @if ($art = $article->getPrev())
        <div class="col-6 ml-15">
            <div class="d-flex row-second__wrapper">
                <div class="row-second__image flex-shrink-0">
                    <div class="news__item__image" style="background-image: url({{ asset($art->image) }})"></div>
                </div>
                <div class="first news__item row-second__news__item py-3 my-auto">
                    <div class="news__item__height overflow-hidden">
                        <div class="news__item__date text-right">{{ $art->created_at->format('d.m.Y') }}</div>
                        <h3 class="news__item__title text-uppercase">
                            <a href="{{ $art->getUrl() }}">{{ $art->title }}</a>
                        </h3>
                        <div class="news__item__text text-justify">
                            {!! $art->description !!}
                        </div>
                    </div>
                    <div class="text-right">
                        <a class="news__item__more text-uppercase " href="{{ $art->getUrl() }}">ЧИТАТЬ ДАЛЬШЕ</a>
                    </div>
                </div>
            </div>
        </div>
        @endif
        @if ($art = $article->getNext())
        <div class="col-6 position-static">
            <div class="container position-absolute container-absolute">
                <div class="col-xl-10 mx-auto h-100 px-0">
                    <div class="col-md-6 offset-6 px-0">
                        <div class="d-flex row-second__wrapper">
                            <div class="row-second__image__second flex-shrink-0">
                                <div class="news__item__image"
                                    style="background-image: url({{ asset($art->image) }})"></div>
                            </div>
                            <div class="news__item row-second__news__item py-3 my-auto">
                                <div class="news__item__height overflow-hidden">
                                <div class="news__item__date text-right">{{ $art->created_at->format('d.m.Y') }}</div>
                                    <h3 class="news__item__title text-uppercase">
                                        <a href="{{ $art->getUrl() }}">{{ $art->title }}</a>
                                    </h3>
                                    <div class="news__item__text text-justify">
                                        {!! $art->description !!}
                                    </div>
                                </div>
                                <div class="text-right">
                                    <a class="news__item__more text-uppercase " href="{{ $art->getUrl() }}">ЧИТАТЬ ДАЛЬШЕ</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div> --}}
    <div class="news__row-separator"></div>
</section>
@endsection
