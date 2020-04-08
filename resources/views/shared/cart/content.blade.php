
<div class="buy-list">
    @foreach (Cart::get()->items as $item)
    <form action="{{ route('cart.set') }}/" method="post" class="js-form__to-cart buy-item position-relative">
        <input type="hidden" name="cart" value="1">
        @csrf
        <div class="d-flex align-items-center flex-wrap">
            <div class="d-flex align-items-center flex-wrap buy-item__product">
                <div class="buy-item__image">
                    <a class="d-block buy-item__image__link" href="#">
                        <img class="mw-100 mh-100" src="{{ asset($item->product->getImage()) }}" alt="{{ $item->product->name }}">
                    </a>
                </div>
                <a class="buy-item__name" href="{{ $item->product->getUrl() }}" >{!! $item->product->name !!}</a>
            </div>
            <div class="d-flex align-items-center flex-grow-1 price-wrapper ">
                <div class="plusminus d-flex align-items-center js-plusminus">
                    <span class="minus js-minus js-up">-</span>
                    <input type="hidden" name="id" value="{{ $item->product->id }}">
                    <input type="text" name="count" id="" value="{{ $item->qty }}" readonly>
                    <span class="plus js-plus js-up ">+</span>
                </div>
                <div class="price-sum">
                    {{ number_format($item->total,0,'.',' ') }} <span class="currency">РУБ</span>
                </div>
                <div class="remove ml-lg-auto js-cart-remove">
                    @svg('images/svg/remove.svg')
                </div>
            </div>
        </div>

    </form>
    @endforeach
</div>
<div class="total-price col-lg-10 mx-auto px-0">
    Итого: <span class="summary js-cart-total-format">{{ number_format(Cart::get()->total,0,'.',' ') }} <span class="currency">РУБ</span></span>
</div>

