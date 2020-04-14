<section class="first-screen position-relative">
    <div class="first-screen__slider first-screen-slick">
    @foreach($values["slider"] as $key => $item)
            <div class="first-screen__slider__item" style="background-image: url('../{{ $item['image'] ?? '' }}' );">
                <div class="container d-flex position-relative">
                    <div class="offset-lg-1 my-auto">
                        <div
                            class="first-screen__slider__item__in position-relative d-flex flex-column justify-content-between">
                            <h1 class="title text-uppercase">{{ $item['title'] ?? '' }}</h1>
                        <div>
                            <h2 class="subtitle text-uppercase">{{ $item['subtitle'] ?? '' }}</h2>
                            <div class="text">{{ $item['description'] ?? '' }}</div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <a class="btn" href="{{ $item['path'] ?? '#' }}">ПОДРОБНЕЕ</a>
                            <div class="footnote text-uppercase align-self-end">  {{ $item['help'] ?? '' }}</div>
                        </div>
                        </div>
                    </div>
                    <img class="award position-absolute d-none d-md-block" src="{{ $item['award'] ?? '' }}" alt="">
                </div>
            </div>
    @endforeach
    </div>
</section>
