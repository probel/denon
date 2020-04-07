<div class="catalog__item d-flex flex-column justify-content-between h-100 js-catalog__item">
    {{-- новый блок .catalog__item__top --}}
    <div>
        <div class="catalog__item__top d-flex align-items-baseline position-relative">
            <div class="sale text-uppercase">
                <img class="mr-2 pb-2" src="/images/icons/sale.png" alt="">Sale
            </div>
            <div class="in-stock text-uppercase ml-auto">в наличии</div>
            <div class="sticker position-absolute text-uppercase">new</div>
        </div>
        <div class="photo">
            <a class="photo__link h-100 d-flex justify-content-center" href="{{ $product->getUrl() }}">
                <img class="photo__image mw-100 mh-100 align-self-center"
                    src="{{ asset($product->getImage()) }}"
                    alt="{{ rv(strip_tags($product->getAlt())) }}">
            </a>
        </div>
        {{-- новый блок .vendor-code --}}
        <div class="vendor-code text-uppercase text-right">AZ21170</div>
        <div class="name text-center">
            <a href="{{ $product->getUrl() }}">{!! rv($product->name) !!}</a>
        </div>
        <div class="catalog__item__description">
            {!! rv($product->getDescription()) !!}
        </div>
    </div>
    <div>
        <div class="price__wrapper text-right">
            {{-- @if ($product->getPrice(0))
            <div class="old-price">{{ number_format($product->getPrice(0),0,'.',' ') }}<span class="currency"> {{ currency() }}</span></div>
            @endif
            <div class="new-price">{{ number_format($product->getPrice(1),0,'.',' ') }}<span class="currency"> {{ currency() }}</span></div> --}}
            <div class="expected text-uppercase">поставка ожидается<br>12.04.2020</div>
        </div>
        <div class="catalog__item__bottom d-flex justify-content-between">
            <form action="{{ route('quick') }}/" method="post" class="form">
                {{ csrf_field() }}
                <input type="hidden" name="id" value="{{ $product->id }}">
                <input type="hidden" name="count" class="js-product-count" value="1">
                <button type="submit" class="btn ">Купить в 1 клик</button>
            </form>
            <form action="{{ route('cart.set') }}/" method="post" class="js-form__to-cart form">
                {{ csrf_field() }}
                <input type="hidden" name="id" value="{{ $product->id }}">
                <input type="hidden" name="count" value="1">
                <button type="submit" class="btn btn-triangle">ПОДРОБНЕЕ</button>
            </form>
        </div>
    </div>
</div>
