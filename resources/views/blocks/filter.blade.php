<div class="catalog">
    <div class="catalog__filter">
        <div class="container">
            <div class="catalog__filter__slider catalog-filter-slick slick-slider">
                @foreach(Catalog::getCategories()->whereNotNull('parent_id') as $key => $item)
                <div class="catalog__filter__slider__item">
                    <a class="catalog__filter__slider__link text-uppercase text-center" href="{{ $item->getURL() }}">
                        <div class="image__wrapper icon-center">
                            <img class="catalog__filter__slider__image d-block" src="{{ asset($item->teaser_image ?? '/images/project/catalog-slide-2.png') }}" alt="{{ $item->title }}">
                        </div>
                        {!! $item->title !!}
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>






