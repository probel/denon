<div class="catalog__item d-flex flex-column justify-content-between h-100 js-catalog__item">
    <div>

        <div class="catalog__item__top d-flex align-items-baseline position-relative">

            <div class="sale text-uppercase">
                @if ($product->gift)
                <img class="mr-2 pb-2" src="{{ asset('/images/icons/sale.png') }}" alt="Подарок">
                @endif
                @if ($product->old_price) Sale @endif
            </div>
            <div class="in-stock text-uppercase ml-auto align-self-center">
                {{ $product->available ? 'в наличии' : 'нет в наличии'}}
            </div>
            @if ($product->new)
            <div class="sticker position-absolute text-uppercase">new</div>
            @endif
        </div>
        <div class="photo">
            <a class="photo__link h-100 d-flex justify-content-center" href="{{ $product->getUrl() }}">
                <img class="photo__image mw-100 mh-100 align-self-center"
                    src="{{ asset($product->getImage()['path'] ?? 'images/no-image.jpg') }}"
                    alt="{{ $product->getImage()['alt'] ?? '' }}">
            </a>
        </div>
        <div class="vendor-code text-uppercase text-right">{{ $product->article }}</div>
        <div class="name text-center">
            <a href="{{ $product->getUrl() }}">{!! $product->name !!}</a>
        </div>
        <div class="catalog__item__description">
            {!! $product->short_description !!}
        </div>
    </div>
    <div>
        <div class="price__wrapper text-right">
            @if ($product->available)
                @if ($product->old_price)
                <div class="old-price">
                    {{ number_format($product->old_price,0,'.',' ') }}
                    <span class="currency"> РУБ</span>
                </div>
                @endif
                @if ($product->price)
                <div class="new-price">
                    {{ number_format($product->price,0,'.',' ') }}
                    <span class="currency"> РУБ</span>
                </div>
                @endif
            @else
                @if ($product->available_date)
                <div class="expected text-uppercase">
                    поставка ожидается<br>
                    {{ $product->available_date->format('d.m.Y') }}
                </div>
                @endif
            @endif
        </div>
        <div class="catalog__item__bottom d-flex justify-content-between">
            @if ($product->available)
                <form action="{{ route('cart.set') }}" method="post" class="form">
                    {{ csrf_field() }}
                    <input type="hidden" name="pid" value="{{ $product->id }}">
                    <input type="hidden" name="count" value="1">
                    <button type="submit" class="btn ">Купить в 1 клик</button>
                </form>
            @else
                <div></div>
            @endif
            <a href="{{ $product->getUrl() }}" class="btn btn-triangle">ПОДРОБНЕЕ</a>
        </div>
    </div>
</div>
