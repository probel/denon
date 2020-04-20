<section class="first-screen position-relative">
    <div class="first-screen__slider first-screen-slick">
        @foreach($values["slider"] ?? [] as $key => $item)
            <div class="first-screen__slider__item" style="background-image: url({{ asset($item['image'] ?? '') }});">
                <div class="container d-flex position-relative">
                    <div class="offset-lg-1 my-auto">
                        <div class="first-screen__slider__item__in position-relative d-flex flex-column justify-content-between">
                            <h2 class="title text-uppercase">{{ $item['title'] ?? '' }}</h2>
                        <div>
                            @if ($item['subtitle'] ?? null)
                            <h2 class="subtitle text-uppercase">{{ $item['subtitle'] ?? '' }}</h2>
                            @endif
                            @if ($item['description'] ?? null)
                            <div class="text">{{ $item['description'] ?? '' }}</div>
                            @endif
                        </div>
                        <div class="d-flex justify-content-between">
                            @if ($item['path'] ?? null)
                            <a class="btn" href="{{ $item['path'] }}">ПОДРОБНЕЕ</a>
                            @endif
                            @if ($item['help'] ?? null)
                            <div class="footnote text-uppercase align-self-end">  {{ $item['help'] }}</div>
                            @endif
                        </div>
                        </div>
                    </div>
                    @if ($item['award'] ?? null)
                    <img class="award position-absolute d-none d-md-block" src="{{ asset($item['award']) }}" alt="">
                    @endif
                </div>
            </div>
        @endforeach
    </div>
</section>
