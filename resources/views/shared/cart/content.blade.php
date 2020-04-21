
<div class="buy-list">
    @foreach (Cart::get()->items as $item)
    <form action="{{ route('cart.set') }}" method="post" class="js-form__to-cart buy-item position-relative">
        <input type="hidden" name="cart" value="1">
        @csrf
        <div class="d-flex align-items-center buy-item__wrapper h-100">
            <div class="d-flex align-items-center buy-item__product flex-grow-1">
                <div class="buy-item__image flex-shrink-0">
                    <a class="d-block buy-item__image__link" href="{{ $item->product->getUrl() }}">
                        <img class="mw-100 mh-100" src="{{ asset($item->product->getImage()['path']) }}" alt="{{ $item->product->getImage()['alt'] }}">
                    </a>
                </div>
                <div class="buy-item__info">
                    <a class="buy-item__name" href="{{ $item->product->getUrl() }}" >{!! $item->product->name !!}</a>
                    @if ($item->variation)
                    <div class="color-check d-flex align-items-center">
                        <div class="color-check__caption">Цвет:</div>
                    <div class="color-check__icon" title="{{ $item->variation['title'] ?? '' }}" style="background-color: {{ $item->variation['color'] ?? '' }}"></div>
                    </div>
                    @endif
                    <div class="vendor-code">{{ $item->product->article }}</div>
                </div>
            </div>
            <div class="d-flex align-items-center buy-item__option justify-content-between">
                <div class="price-wrapper">
                    <div class="plusminus d-flex align-items-center ml-auto js-plusminus">
                        <span class="minus js-minus js-up">-</span>
                        <input type="hidden" name="pid" value="{{ $item->product->id }}">
                        <input type="hidden" name="vid" value="{{ $item->vid }}">
                        <input type="hidden" name="iscart" value="1">
                        <input type="text" class="text-center" name="count" value="{{ $item->qty }}" readonly>
                        <span class="plus js-plus js-up ">+</span>
                    </div>
                    <div class="price-sum">
                        <strong>{{ number_format($item->total,0,'.',' ') }} </strong>РУБ
                    </div>
                </div>
                <a class="remove js-cart-remove" href="{{ route('cart.remove',['key'=>$item->key,'iscart'=>1]) }}">
                    <img src="/images/icons/remove.png" alt="remove">
                </a>
            </div>
        </div>
    </form>
    @endforeach
</div>
<div class="total-price d-flex justify-content-between align-items-center">
    <a class="btn btn-triangle btn-broun js-cart-clear" href="{{ route('cart.clear') }}">ОЧИСТИТЬ</a>
    <div class="total-price__value text-uppercase">
        СУММА ЗАКАЗА: <strong class="total-price__sum js-cart-total-format">{{ number_format(Cart::get()->total,0,'.',' ') }} </strong>РУБ
    </div>
</div>

