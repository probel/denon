<div class="catalog">
    <a id="catalog"></a>
    <div class="catalog__filter">
        <div class="container">
            <div class="catalog__filter__slider catalog-filter-slick slick-initialized slick-slider">
                <button type="button" class="slick-prev slick-arrow" style=""></button>
                <div class="slick-list draggable">
                    <div class="slick-track" style="opacity: 1; width: 3968px; transform: translate3d(-115px, 0px, 0px);">
                        @foreach($categories as $key => $item)
                            <div class="catalog__filter__slider__item slick-slide slick-cloned" data-slick-index="@if (($key) < 0 ) {{ ($key) }}   @else {{ ($key) }}  @endif" aria-hidden="true" style="width: 128px;" tabindex="@if (($key) < 0 ) {{ -1 }}  @else {{ 0 }}  @endif">
                                <a class="catalog__filter__slider__link text-uppercase text-center" href="{{ $item->getURL() }}" tabindex="@if (($key) < 0 ) {{ -1 }}  @else {{ 0 }}  @endif">
                                    <div class="image__wrapper icon-center">
                                        <img class="catalog__filter__slider__image d-block" src="{{ asset($item->values["bg_image"]) }}" alt="">
                                    </div>
                                    {!!   $item["title"] ?? '' !!}
                                </a>
                            </div>
                        @endforeach        
                    </div>
                </div>
                <button type="button" class="slick-next slick-arrow" style=""></button>
            </div>
        </div>
    </div>
</div>






