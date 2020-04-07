<a href="{{ route('cart_show') }}/" class="cart-circle d-block position-relative">
    <span class="cart-icon position-absolute">
        @svg('images/svg/cart-icon.svg')
    </span>
    <span class="js-cart-count">
        @if (cartCount())
        <span class="items rounded-circle icon-center position-absolute ">{{ cartCount() }}</span>
        @endif
    </span>

    <span class="cart-caption d-none d-xl-inline-block">Корзина</span>
</a>
