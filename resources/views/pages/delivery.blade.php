@extends('layouts.app')
@section('content')
<div class="delivery-page contact-page bg-light">
    <!-- begin page-title -->
    <section class="page-title d-flex align-items-center">
        <div class="container">
            <div class="col-xl-10 mx-auto px-0">
                <h1 class="page-title__title text-uppercase mb-0"><strong>ДОСТАВКА И ОПЛАТА</strong></h1>
            </div>
        </div>
    </section>
    <!-- end page-title -->
    <!-- begin slogan -->
    <section class="slogan">
        <div class="container">
            <h2 class="slogan__title text-uppercase text-center">ТОЧНОСТЬ - КЛЮЧЕВОЙ АСПЕКТ ПРИ ВОСПРОИЗВЕДЕНИИ МУЗЫКИ</h2>
            <div class="slogan__text text-uppercase text-center mx-auto"> Уникальные технологии Denon для воспроизведения
                CD/SACD дисков, строгий отбор комплектующих и мастерство схемотехники помогают воспроизводить звук,
                максимально приближенный к оригиналу.</div>
        </div>
    </section>
    <!-- end slogan -->
    <section class="breadcrumb__line position-relative">
        <div class="container h-100">
            <div class="col-xl-10 mx-auto px-0 h-100">
                <div class="breadcrumb__line__in d-flex align-items-center position-relative h-100">
                    <nav aria-label="breadcrumb" class="breadcrumb__wrapper">
                        <ol class="breadcrumb text-uppercase p-0 m-0">
                            <li class="breadcrumb-item"><a href="/">DENON</a></li>
                            <li class="breadcrumb-item active" aria-current="page">ДОСТАВКА И ОПЛАТА</li>
                        </ol>
                    </nav>
                    <div class="page-title__small text-uppercase">
                        <strong>ДОСТАВКА И ОПЛАТА</strong>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- begin contacts -->
    <div class="container">
        <div class="col-xl-10 mx-auto px-0">
            <div class="contact-page__content">
                <div class="section-title d-flex">
                    <div class="section-title__icon flex-shrink-0 d-flex align-items-center">
                        <img src="/images/icons/delivery.png" alt="">
                    </div>
                    <div class="section-title__content d-flex flex-column justify-content-between">
                        <h2 class="section-title__title text-uppercase">ДОСТАВКА И ОПЛАТА</h2>
                        <div class="section-title__subtitle text-justify">
                            Юридическим лицом магазина «Денон.рф» является ООО «ПРАЙ», через которое осуществляются платежи и страхование
                            приобретённого оборудования (если в этой услуге заинтересован клиент).
                        </div>
                    </div>
                </div>
                {{-- здесь классы скопированы из корзины, не изменять --}}
                <div class="cart-page__content__text text-justify">
                    <ul>
                        <li>При наличных расчётах, оплата происходит при получении товара вместе с гарантийным талоном.</li>
                        <li>При безналичной форме оплаты, товар вместе с гарантийным талоном и накладной доставляется заказчику
                            после поступления денег на расчётный счёт ООО "ПРАЙ"</li>
                    </ul>
                    <p>Мы работаем ежедневно с 10 до 22 часов. В субботу, воскресенье и праздничные дни производится доставка только тех заказов,
                        которые были оформлены в будние дни во время работы оптового склада.</p>
                </div>
                <div class="contact-page__content__separator"></div>
                <h2 class="section-title__title text-uppercase color-broun mb-4">Шоу-рум Denon на Пресне</h2>
                <div class="delivery-page__text text-justify">
                    <p>Магазин «Денон.рф» может взять на себя заботу о бесплатной доставке приобретённой аппаратуры стоимостью свыше 30.000 рублей
                        в города и населённые пункты, расположенные в непосредственной близости от МКАД: Балашиха, Барвиха, Видное, Дзержинский,
                        Долгопрудный, Котельники, Красногорск, Люберцы, Мытищи, Одинцово, Реутов, Солнцево, Химки.</p>
                    <p>Ваш заказ будет оперативно доставлен в любой населённый пункт России по минимальным тарифам. Возможна доставка по СНГ.
                        За более подробной информацией пожалуйста обращайтесь по нашим контактным телефонам, указанным на сайте.</p>
                </div>
            </div>
        </div>
    </div>
    <!-- end contacts -->
</div>
@endsection
