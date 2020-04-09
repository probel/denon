
<div class="buy-list">
    @foreach (Cart::get()->items as $item)
    <form action="{{ route('cart.set') }}/" method="post" class="js-form__to-cart buy-item position-relative">
        <input type="hidden" name="cart" value="1">
        @csrf
        <div class="d-flex align-items-center h-100">
            <div class="d-flex align-items-center flex-wrap buy-item__product flex-grow-1">
                <div class="buy-item__image">
                    <a class="d-block buy-item__image__link" href="#">
                        <img class="mw-100 mh-100" src="{{ asset($item->product->getImage()) }}" alt="{{ $item->product->name }}">
                    </a>
                </div>
                <div class="buy-item__info">
                    <a class="buy-item__name" href="{{ $item->product->getUrl() }}" >{!! $item->product->name !!}</a>
                    <div class="color-check d-flex align-items-center">
                        <div class="color-check__caption">Цвет:</div>
                        <div class="color-check__icon" style="background-color: #000;"></div>
                    </div>
                    <div class="vendor-code">AZ21172</div>
                </div>
            </div>
            <div class="price-wrapper">
                <div class="plusminus d-flex align-items-center ml-auto js-plusminus">
                    <span class="minus js-minus js-up">-</span>
                    <input type="hidden" name="id" value="{{ $item->product->id }}">
                    <input type="text" name="count" id="" value="{{ $item->qty }}" readonly>
                    <span class="plus js-plus js-up ">+</span>
                </div>
                <div class="price-sum">
                    <strong>{{ number_format($item->total,0,'.',' ') }} </strong>РУБ
                </div>
            </div>
            <div class="remove js-cart-remove">
                <img src="/images/icons/remove.png" alt="remove">
            </div>
        </div>

    </form>
    @endforeach
</div>
<div class="total-price d-flex justify-content-between align-items-center">
    <a class="btn btn-triangle btn-broun" href="#">ОЧИСТИТЬ</a>
    <div class="text-uppercase">
        СУММА ЗАКАЗА: <strong class="total-price__sum js-cart-total-format">{{ number_format(Cart::get()->total,0,'.',' ') }} </strong>РУБ
    </div>
</div>

