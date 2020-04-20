
@foreach ($articles->chunk(3) as $group)
@php
    $group = $group->values();
    $first = $group->first();
    $second = $group[1] ?? null;
    $last = $group[2] ?? null;
@endphp
<div class="row position-relative">
    <div class="col-6">
        <div class="news__item__image" style="background-image: url({{ asset($first->image) }})"></div>
    </div>
    <div class="col-6 position-static">
        <div class="container position-absolute container-absolute h-100">
            <div class="col-xl-10 mx-auto h-100">
                <div class="col-md-6 offset-6 pr-0 h-100 d-flex">
                    <div class="news__item py-3 my-auto">
                        <div class="news__item__height overflow-hidden">
                            <div class="news__item__date text-right">
                                {{ $first->created_at->format('d.m.Y') }}
                            </div>
                            <h3 class="news__item__title text-uppercase">
                                <a href="{{ $first->getUrl() }}">{{ $first->title }}</a>
                            </h3>
                            <div class="news__item__text text-justify">
                                {!! $first->description !!}
                            </div>
                        </div>
                        <div class="text-right">
                            <a class="news__item__more text-uppercase " href="{{ $first->getUrl() }}">ЧИТАТЬ ДАЛЬШЕ</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@if ($second)
<div class="news__row-separator"></div>
<div class="row row-second position-relative">
    <div class="col-6 ml-15">
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
    @if ($last)
    <div class="col-6 position-static">
        <div class="container position-absolute container-absolute">
            <div class="col-xl-10 mx-auto h-100 px-0">
                <div class="col-md-6 offset-6 px-0">
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
@endif
<div class="news__row-separator"></div>
@endforeach
