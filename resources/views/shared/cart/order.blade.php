<div class="cart-form">
    <div class="container">
        <div class="cart-form__title text-center">Оформление заказа</div>
        <form   action="{{ route('order.set') }}/"
                method="post"
                class="cart-form__form js-form__cart-submit">
            <div class="">
                <div class="form-group position-relative">
                    <label class="form-label" for="cart-recal-form-name">Ваше имя <span class="color-red">*</span></label>
                    <div class="form-control__wrapper">
                        <input class="form-control" id="cart-recal-form-name" type="text" name="name" placeholder="Введите имя" required="required">
                    </div>
                    <span class="icon position-absolute">
                        @svg('images/svg/user.svg')
                    </span>
                </div>
            </div>
            @csrf
            <div class="d-flex buttons__wrapper flex-wrap justify-content-center">
                <a class="btn btn-light m-md-3 mt-3 order-2 order-md-1" href="/">Вернуться на сайт</a>
                <button type="submit" class="btn m-md-3 order-1 order-md-2">Оформить заказ</button>
            </div>
        </form>
    </div>
</div>
