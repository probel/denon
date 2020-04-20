
<form  action="{{ route('order.store') }}" method="post" class="cart-form js-form__cart-submit">
    <div class="form-group">
        <label class="form-label text-uppercase" for="cart-recal-form-name">имя<sup>*</sup></label>
        <input class="form-control" id="cart-recal-form-name" type="text" name="name" placeholder="Введите имя" required="required">
    </div>
    <div class="cart-form__row d-flex justify-content-between flex-wrap">
        <div class="form-group">
            <label class="form-label text-uppercase" for="cart-recal-form-tel">НОМЕР ТЕЛЕФОНА<sup>*</sup></label>
            <input class="form-control" id="cart-recal-form-tel" type="text" name="tel" placeholder="+7" required="required">
        </div>
        <div class="form-group">
            <label class="form-label text-uppercase" for="cart-recal-form-email">ЭЛЕКТРОННАЯ ПОЧТА</label>
            <input class="form-control" id="cart-recal-form-email" type="email" name="email" placeholder="name@domain.ru">
        </div>
    </div>
    <div class="form-group">
        <label class="form-label text-uppercase" for="cart-recal-form-address">АДРЕС ДОСТАВКИ</label>
        <input class="form-control" id="cart-recal-form-address" type="text" name="address" placeholder="г. Москва, ул. Пятницкая, д.4, стр.1, этаж 8, кв. 34" required="required">
    </div>
    <div class="form-group">
        <label class="form-label text-uppercase" for="cart-recal-form-comment">КОММЕНТАРИЙ К ЗАКАЗУ</label>
        <textarea class="form-control textarea" id="cart-recal-form-comment" type="text" name="comment"></textarea>
    </div>
    <label class="checkbox square">
        <input type="checkbox" name="category-page-filter-1" value="1" checked="checked">
    <span class="checkbox__text">Согласен с <a target="blank" href="{{ Helpers::gpu(9) }}">Условиями обработки  персональных данных</a></span>
    </label>
    @csrf
    <div class="d-flex buttons__wrapper flex-wrap justify-content-end">
        <a class="btn m-md-3 mt-3 order-2 order-md-1" href="/">Вернуться на сайт</a>
        <button type="submit" class="btn btn-triangle btn-broun m-md-3 order-1 order-md-2">Оформить заказ</button>
    </div>
</form>
<div class="cart-form__footnote">После оформления заявки, наш менеджер свяжется с Вами для подтверждения заказа.</div>
