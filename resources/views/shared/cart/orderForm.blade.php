@if (count(cartGet()))
    <div class="cart-form">
        <div class="container">
            <div class="cart-form__title text-center">Или заполните форму заказа:</div>
            <div class="cart-form__footnote text-center"><span class="color-red">*</span> Обязательные поля для заполнения</div>
            <form onsubmit="yaCounterTemp.reachGoal('buy');"
                    action="{{ route('order.set') }}/"
                    method="post"
                    class="cart-form__form js-form__cart-submit1 col-xl-9 col-lg-10 mx-auto px-0">
                <div class="row">
                    <div class="delivery-block js-delivery col-lg-4 col-md-6">
                        <h2 class="delivery-block__title">Способ доставки</h2>
                        <div class="delivery-block__item js-depended-address">
                            <label class="checkbox d-inline-block">
                                <input type="radio" name="cart_delivery" value="pickup" checked="checked"><span class="checkbox__text">Самовывоз</span>
                            </label>
                        </div>
                        <div class="delivery-block__item js-depended-address">
                            <label class="checkbox">
                                <input type="radio" name="cart_delivery" class="js-depended-status" value="address" >
                                <span class="checkbox__text">Доставка курьером</span>
                            </label>

                        </div>
                        <div class="delivery-block__item js-depended-address">
                            <label class="checkbox js-check">
                                <input type="radio" name="cart_delivery"  class="js-depended-status" value="post">
                                <span class="checkbox__text">Доставка по области / краю</span>
                            </label>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 d-flex flex-column justify-content-between">
                        <div class="city-block">

                            <a href="#" class="city-block__link"
                                data-toggle="modal" data-target="#city-list">
                                <span class="arrow lazy">@svg('images/svg/select-arrow.svg')</span>
                            </a>
                        </div>
                        <div class="form-group position-relative address">
                            <label class="form-label" for="cart-adress">Адрес доставки</label>
                            <div class="form-control__wrapper">
                                <input disabled="disabled" class="form-control adress" id="cart-adress" type="text" name="address" placeholder="Адрес">
                            </div>
                            <span class="icon position-absolute">
                                @svg('images/svg/search-pointer.svg')
                            </span>
                        </div>
                    </div>
                    <div class=" col-lg-4 contact-block">
                        <div class="form-group position-relative">
                            <label class="form-label" for="cart-recal-form-name">Ваше имя <span class="color-red">*</span></label>
                            <div class="form-control__wrapper">
                                <input class="form-control" id="cart-recal-form-name" type="text" name="name" placeholder="Введите имя" required="required">
                            </div>
                            <span class="icon position-absolute">
                                @svg('images/svg/user.svg')
                            </span>
                        </div>
                        <div class="form-group position-relative">
                            <label class="form-label" for="cart-recal-form-tel">Ваш телефон <span class="color-red">*</span></label>
                            <div class="form-control__wrapper">
                                <input class="form-control" id="cart-recal-form-tel" type="tel" name="phone" placeholder="+7" required="required">
                            </div>
                            <span class="icon position-absolute">
                                @svg('images/svg/call-answer.svg')
                            </span>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group position-relative textarea">
                            <label class="form-label "
                                    for="cart-form-message">Примечание
                            </label>
                            <div class="form-control__wrapper">
                                <textarea class="form-control"
                                        id="cart-form-message"
                                        name="message"
                                        placeholder="Введите текст вашего примечания"
                                        rows="3"></textarea>
                            </div>
                        </div>
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
@else
    @include('shared.blocks.more-info2', ['data' => [
        'title' => 'Вы все еще не можете <strong>определиться</strong> с выбором глушилки?',
        'description' => 'Наши опытные специалисты Вас проконсультируют'
        ]])
@endif
