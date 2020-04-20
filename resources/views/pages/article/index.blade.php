@extends('layouts.app')
@section('content')
<div class="news-page bg-light">
    @include('shared.breadcrumb')
</div>
<section class="news">
    @include('shared.article.teasers')
    <div class="news__row-separator">{{ $articles->links() }}</div>

        {{-- @foreach($news as $key => $item)
            <div class="row position-relative">
                <div class="col-6">
                    <div class="news__item__image" style="background-image: url(../{{ $item[0]['image'] ?? '' }})"></div>
                </div>
                <div class="col-6 position-static">
                    <div class="container position-absolute container-absolute h-100">
                        <div class="col-xl-10 mx-auto h-100">
                            <div class="col-md-6 offset-6 pr-0 h-100 d-flex">
                                <div class="news__item py-3 my-auto">

                                    <div class="news__item__height overflow-hidden">
                                        <div class="news__item__date text-right">{{ date('d.m.Y', strtotime($item[0]['created_at'])) }}</div>
                                        <h3 class="news__item__title text-uppercase">
                                            <a href="#">{{ $item[0]['title'] ?? '' }}</a>
                                        </h3>
                                        <div class="news__item__text text-justify">
                                            <p> {{ $item[0]['description'] ?? '' }} </p>
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <a class="news__item__more text-uppercase " href="/{{$item[0]['slug'] }}">ЧИТАТЬ ДАЛЬШЕ</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <div class="news__row-separator"></div>
            <div class="row row-second position-relative">
                <div class="col-6 ml-15">
                    <div class="d-flex row-second__wrapper">
                        <div class="row-second__image flex-shrink-0">
                            <div class="news__item__image" style="background-image: url(../{{ $item[1]['image'] ?? '' }})"></div>
                        </div>
                        <div class="first news__item row-second__news__item py-3 my-auto">
                            <div class="news__item__height overflow-hidden">
                                <div class="news__item__date text-right">{{ date('d.m.Y', strtotime($item[1]['created_at'])) }}</div>
                                <h3 class="news__item__title text-uppercase">
                                    <a href="#">{{ $item[1]['title'] ?? '' }}</a>
                                </h3>
                                <div class="news__item__text text-justify">
                                    {{ $item[1]['description'] ?? '' }}
                                </div>
                            </div>
                            <div class="text-right">
                                <a class="news__item__more text-uppercase " href="/{{$item[1]['slug'] }}">ЧИТАТЬ ДАЛЬШЕ</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 position-static">
                    <div class="container position-absolute container-absolute">
                        <div class="col-xl-10 mx-auto h-100 px-0">
                            <div class="col-md-6 offset-6 px-0">
                                <div class="d-flex row-second__wrapper">
                                    <div class="row-second__image__second flex-shrink-0">
                                        <div class="news__item__image" style="background-image: url(../{{ $item[2]['image'] ?? '' }})"></div>
                                    </div>
                                    <div class="news__item row-second__news__item py-3 my-auto">
                                        <div class="news__item__height overflow-hidden">
                                            <div class="news__item__date text-right">{{ date('d.m.Y', strtotime($item[2]['created_at'])) }}</div>
                                            <h3 class="news__item__title text-uppercase">
                                                <a href="#">{{ $item[2]['title'] ?? '' }}</a>
                                            </h3>
                                            <div class="news__item__text text-justify">
                                                {{ $item[2]['description'] ?? '' }}
                                             </div>
                                        </div>
                                        <div class="text-right">
                                            <a class="news__item__more text-uppercase " href="/{{$item[2]['slug'] }}">ЧИТАТЬ ДАЛЬШЕ</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="news__row-separator"></div>
        @endforeach --}}
</section>
@endsection
