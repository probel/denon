@extends('layouts.app')
@section('content')
<div class="delivery-page">
    <div class="delivery-page__light-bg">
        <div class="container">
            @include('shared.breadcrumb')
            <h1 class="main-title text-center">Доставка и оплата (2)</h1>
            <div class="delivery-page__tabs mx-auto">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs nav-tabs__custom nav-fill">
                    <li class="nav-item">
                        <a class="nav-link js-delivery-tab active" data-id="1" data-toggle="tab" href="#" data-target="#delivery-page__tabs-01">Самовывоз</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-delivery-tab" data-id="2" data-toggle="tab" href="#" data-target="#delivery-page__tabs-02">Курьерская доставка</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-delivery-tab" data-id="3" data-toggle="tab" href="#" data-target="#delivery-page__tabs-03">Доставка по области/краю</a>
                    </li>
                </ul>
            </div>
            <!-- Tab panes -->
            <div class="tab-content mx-auto">
                <div class="tab-pane active" id="delivery-page__tabs-01">
                    <div class="row position-relative">
                        <div class="col-lg-3 col-sm-6">
                            <div class="advantage__item">
                                <div class="image__wraper icon-center mx-auto">
                                    @svg('images/svg/delivery-1.svg')
                                </div>
                                <div class="text-lg text-center">Оплата</div>
                                <div class="text-sm text-center">
                                    Наличными или банковской картой
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <div class="advantage__item">
                                <div class="image__wraper icon-center mx-auto">
                                    @svg('images/svg/delivery-2.svg')
                                </div>
                                <div class="text-lg text-center">Городской номер</div>
                                <div class="text-sm text-center">
                                    <a onclick="yaCounterTemp.reachGoal('call');" href="tel:{{ getPhone()['clear'] }}">{{ getPhone()['format'] }}</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <div class="advantage__item">
                                <div class="image__wraper icon-center mx-auto">
                                    @svg('images/svg/delivery-3.svg')
                                </div>
                                <div class="text-lg text-center">Адрес</div>
                                <div class="text-sm text-center">

                                    {!! rv(getAddress()) !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <div class="advantage__item">
                                <div class="image__wraper icon-center mx-auto">
                                    @svg('images/svg/delivery-4.svg')
                                </div>
                                <div class="text-lg text-center">Режим работы</div>
                                <div class="text-sm text-center">
                                    {!! str_replace("\n","<br>",rv(getSchedule())) !!}
                                </div>
                            </div>
                        </div>
                        <div class="d-none d-lg-block decor-line left position-absolute"></div>
                        <div class="d-none d-lg-block decor-line center position-absolute"></div>
                        <div class="d-none d-lg-block decor-line right position-absolute"></div>
                    </div>
                </div>
                <div class="tab-pane" id="delivery-page__tabs-02">
                    <div class="row position-relative">
                        <div class="col-lg-3 col-sm-6">
                            <div class="advantage__item">
                                <div class="image__wraper icon-center mx-auto">
                                    @svg('images/svg/delivery-21.svg')
                                </div>
                                <div class="text-lg text-center">Оплата</div>
                                <div class="text-sm text-center">
                                    Наличными или банковской картой
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <div class="advantage__item">
                                <div class="image__wraper icon-center mx-auto">
                                    @svg('images/svg/delivery-22.svg')
                                </div>
                                <div class="text-lg text-center">
                                    <a onclick="yaCounterTemp.reachGoal('call');" href="tel:{{ getPhone()['clear'] }}">{{ getPhone()['format'] }}</a>
                                </div>
                                <div class="text-sm text-center">
                                    для расчета стоимости доставки свяжитесь с нашим менеджером
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <div class="advantage__item">
                                <div class="image__wraper icon-center mx-auto">
                                    @svg('images/svg/delivery-23.svg')
                                </div>
                                <div class="text-lg text-center">Оплата производится<br>при получении товара</div>
                                <div class="text-sm text-center">
                                    Вы можете оплатить удобным<br> для себя способом
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <div class="advantage__item">
                                <div class="image__wraper icon-center mx-auto">
                                    @svg('images/svg/delivery-24.svg')
                                </div>
                                <div class="text-lg text-center">Стоимость доставки</div>
                                <div class="text-sm text-center">
                                    {{ cv('delivery_price') }} {{ currency() }}
                                </div>
                            </div>
                        </div>
                        <div class="d-none d-lg-block decor-line left position-absolute"></div>
                        <div class="d-none d-lg-block decor-line center position-absolute"></div>
                        <div class="d-none d-lg-block decor-line right position-absolute"></div>
                    </div>
                </div>
                <div class="tab-pane" id="delivery-page__tabs-03">
                    <div class="row position-relative">
                        <div class="col-lg-3 col-sm-6">
                            <div class="advantage__item">
                                <div class="image__wraper icon-center mx-auto">
                                    @svg('images/svg/delivery-31.svg')
                                </div>
                                <div class="text-lg text-center">Оплата производится при получении товара</div>
                                <div class="text-sm text-center">
                                    Вы можете оплатить удобным для себя способом
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <div class="advantage__item">
                                <div class="image__wraper icon-center mx-auto">
                                    @svg('images/svg/delivery-32.svg')
                                </div>
                                <div class="text-lg text-center">
                                    <a onclick="yaCounterTemp.reachGoal('call');" href="tel:{{ getPhone()['clear'] }}">{{ getPhone()['format'] }}</a>
                                </div>
                                <div class="text-sm text-center">
                                    для расчета стоимости доставки свяжитесь с нашим менеджером
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <div class="advantage__item">
                                <div class="image__wraper icon-center mx-auto">
                                    <img class="lazy img-fluid" alt="Доставка" src="/images/icons/cdek.png">
                                </div>
                                <div class="text-lg text-center">Отправка курьерской службой СДЭК</div>
                                <div class="text-sm text-center px-7">
                                    Мы берем предоплату за<br> доставку.
                                    В среднем {{ cv('cdek_price') }} {{ currency() }}
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <div class="advantage__item">
                                <div class="image__wraper icon-center mx-auto">
                                    <img class="lazy img-fluid" alt="Доставка" src="/images/icons/post-icon.png">
                                </div>
                                <div class="text-lg text-center">При отправке Почтой России</div>
                                <div class="text-sm text-center">
                                    Мы берем фиксированную предоплату за доставку<br>
                                    {{ cv('post_price') }} {{ currency() }}
                                </div>
                            </div>
                        </div>
                        <div class="d-none d-lg-block decor-line left position-absolute"></div>
                        <div class="d-none d-lg-block decor-line center position-absolute"></div>
                        <div class="d-none d-lg-block decor-line right position-absolute"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="info more-info position-relative">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <h2 class="main-title js-delivery-title">Вы можете <strong>забрать заказ</strong> самостоятельно в день заказа, через 15 минут после его оформления</h2>
                    <div class="more-info__text js-delivery-subtitle">Просто заполните форму</div>
                    <img class="more-info__image img-fluid d-block mx-auto d-lg-none" src="/images/project/boy.png" alt="">
                    <div class="more-info__form__wrapper position-relative w-100">
                        <form onsubmit="yaCounterTemp.reachGoal('callback');" action="{{ route('callback.set') }}/" method="post"
                        class="more-info__form js-form--more-info">
                            <div class="form-group position-relative mr-0">
                                <label class="form-label" for="more-form-name">Ваше имя <span class="color-red">*</span></label>
                                <div class="form-control__wrapper">
                                    <input class="form-control" id="more-form-name" type="text" name="name" placeholder="Введите имя" required="">
                                </div>
                                <span class="icon position-absolute">
                                    @svg('images/svg/user.svg')
                                </span>
                            </div>
                            <div class="form-group position-relative mr-0">
                                <label class="form-label" for="more-form-tel">Ваш телефон <span class="color-red">*</span></label>
                                <div class="form-control__wrapper">
                                    <input class="form-control" id="more-form-tel" type="tel" name="phone" placeholder="+7" required="">
                                </div>
                                <span class="icon position-absolute">
                                    @svg('images/svg/call-answer.svg')
                                </span>
                            </div>
                            <div class="first-screen__form__caption">
                                <span class="color-red">*</span> Поле обязательное для заполнения
                            </div>
                            <input type="hidden" name="type" value="Позвоните мне">
                            {{ csrf_field() }}
                            <button type="submit" class="btn w-100">Получить консультацию</button>
                        </form>

                    </div>
                </div>
                <div class="col-lg-6 d-lg-flex align-items-end d-none">
                    <img class="more-info__image img-fluid d-block mx-auto" src="/images/project/boy.png" alt="">
                </div>
            </div>
        </div>
    </div>
    <div class="contacts" >
        @include('shared.mapContacts')
    </div>
</div>
@endsection
