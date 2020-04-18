@extends('layouts.app')
@section('content')
<div class="catalog-page bg-light">
    {{-- здесь добавляется класс .blue (только на этой странице) --}}
    <section class="breadcrumb__line blue position-relative">
        <div class="container h-100">
            <div class="col-xl-10 mx-auto px-0 h-100">
                <div class="breadcrumb__line__in d-flex align-items-center position-relative h-100">
                    <nav aria-label="breadcrumb" class="breadcrumb__wrapper">
                        <ol class="breadcrumb text-uppercase p-0 m-0">
                            <li class="breadcrumb-item"><a href="/">DENON</a></li>
                            <li class="breadcrumb-item active" aria-current="page">HI-FI КОМПОНЕНТЫ</li>
                        </ol>
                    </nav>
                    <div class="page-title__small text-uppercase">
                        <strong>HI-FI КОМПОНЕНТЫ</strong>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- begin category -->
    <section class="catalog-page__category">
        <div class="catalog-page__category__row d-flex justify-content-between">
            <div class="catalog-page__category__item left text-right"
                 style="background-image: url(../images/project/category-1.jpg);">
                <h2 class="title text-uppercase">УСИЛИТЕЛИ</h2>
                <div class="description">
                    <h3 class="description__title text-uppercase">ТОЧНОСТЬ. МАСТЕРСТВО. ИННОВАЦИИ.</h3>
                    <p>Благодаря квинтэссенции традиционных и новейших технологий усиления от Denon,
                        усилители гарантируют роскошный звук от различных источников
                        и отличаются богатейшей музыкальной выразительностью в своем классе.</p>
                </div>
            </div>
            <div class="catalog-page__category__item right"
                 style="background-image: url(../images/project/category-2.jpg);">
                <h2 class="title text-uppercase">SADC/CD ПРОИГРЫВАТЕЛИ</h2>
                <div class="description">
                    <h3 class="description__title text-uppercase">ТОЧНОСТЬ - КЛЮЧЕВОЙ АСПЕКТ ПРИ ВОСПРОИЗВЕДЕНИИ МУЗЫКИ</h3>
                    <p>Уникальные технологии Denon для воспроизведения CD/SACD дисков,
                        строгий отбор комплектующих и мастерство схемотехники помогают
                        воспроизводить звук, максимально приближенный к оригиналу.</p>
                </div>
            </div>
        </div>
        <div class="catalog-page__category__row d-flex justify-content-between">
            <div class="catalog-page__category__item left text-right"
                 style="background-image: url(../images/project/category-3.jpg);">
                <h2 class="title text-uppercase">СЕТЕВЫЕ ПРОИГРЫВАТЕЛИ</h2>
                <div class="description">
                    <h3 class="description__title text-uppercase">УНИВЕРСАЛЬНОСТЬ. КАЧЕСТВО</h3>
                    <p>Новое поколение сетевых проигрывателей Denon теперь позволяет
                        воспроизводить музыку с абсолютно любого носителя или сетевого источника:
                        смартфон или планшет, персональный компьютер или ноутбук
                        - слушайте любимую музыку через Wi-Fi, Ethernet, Airplay 2, Bluetooth, или подключив USB-накопитель.</p>
                </div>
            </div>
            <div class="catalog-page__category__item right"
                 style="background-image: url(../images/project/category-1.jpg);">
                <h2 class="title text-uppercase">ВИНИЛОВЫЕ ПРОИГРЫВАТЕЛИ</h2>
                <div class="description">
                    <h3 class="description__title text-uppercase">МАГИЯ ВИНИЛОВЫХ ПЛАСТИНОК</h3>
                    <p>Виниловые пластинки сегодня - это философия, предмет коллекционирования
                        и выбор энтузиастов хорошего звука.
                        Проигрыватель виниловых дисков стал знаковым элементом современного интерьера.
                        </p>
                </div>
            </div>
        </div>
    </section>
    <!-- end category -->
</div>
<!-- begin news -->
<section class="news">
    <div class="news__title__wrapper icon-center position-relative">
        <h2 class="news__title text-uppercase text-center">ОБЗОРЫ НОВИНОК DENON</h2>
    </div>
    <div class="row position-relative">
        <div class="col-md-6">
            <div class="news__item__image" style="background-image: url(../images/project/new-1.jpg)"></div>
        </div>
        <div class="col-md-6 position-static">
            <div class="container position-absolute container-absolute h-100">
                <div class="col-xl-10 mx-auto h-100">
                    <div class="col-md-6 offset-md-6 pr-0 pl-0 pl-md-3 h-100 d-flex">
                        <div class="news__item py-3 my-auto">
                            <div class="news__item__height overflow-hidden">
                                <div class="news__item__date text-right">12.02.2020</div>
                                <h3 class="news__item__title text-uppercase">
                                    <a href="#">ВИНИЛОВЫЕ ПРОИГРЫВАТЕЛИ</a>
                                </h3>
                                <div class="news__item__text text-justify">
                                    <p>Виниловые пластинки сегодня - это философия, предмет коллекционирования и выбор
                                        энтузиастов хорошего звука.
                                        Проигрыватель виниловых дисков стал знаковым элементом современного интерьера.
                                        Появившись в квартире, он
                                        формирует вокруг себя своеобразную атмосферу. А коллекция дисков становится
                                        культурным центром всего дома,
                                        добавляя магии в ритуал прослушивания музыки.
                                    </p>
                                    <p>Виниловые пластинки сегодня - это философия, предмет коллекционирования и выбор
                                        энтузиастов хорошего звука.
                                        Проигрыватель виниловых дисков стал знаковым элементом современного интерьера.
                                    </p>
                                    <p>Виниловые пластинки сегодня - это философия, предмет коллекционирования и выбор
                                        энтузиастов хорошего звука.
                                        Проигрыватель виниловых дисков стал знаковым элементом современного интерьера.
                                        Появившись в квартире, он
                                        формирует вокруг себя своеобразную атмосферу. А коллекция дисков становится
                                        культурным центром всего дома,
                                        добавляя магии в ритуал прослушивания музыки.
                                    </p>
                                    <p>Виниловые пластинки сегодня - это философия, предмет коллекционирования и выбор
                                        энтузиастов хорошего звука.
                                        Проигрыватель виниловых дисков стал знаковым элементом современного интерьера.
                                        Появившись в квартире, он
                                        формирует вокруг себя своеобразную атмосферу. А коллекция дисков становится
                                        культурным центром всего дома,
                                        добавляя магии в ритуал прослушивания музыки.
                                    </p>
                                </div>
                            </div>
                            <div class="text-right">
                                <a class="news__item__more text-uppercase " href="#">ЧИТАТЬ ДАЛЬШЕ</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="news__row-separator"></div>
    <div class="row row-second position-relative">
        <div class="col-xl-6 ml-15">
            <div class="d-flex row-second__wrapper">
                <div class="row-second__image flex-shrink-0">
                    <div class="news__item__image" style="background-image: url(../images/project/new-2.jpg)"></div>
                </div>
                <div class="first news__item row-second__news__item py-3 my-auto">
                    <div class="news__item__height overflow-hidden">
                        <div class="news__item__date text-right">12.02.2020</div>
                        <h3 class="news__item__title text-uppercase">
                            <a href="#">ВИНИЛОВЫЕ ПРОИГРЫВАТЕЛИ</a>
                        </h3>
                        <div class="news__item__text text-justify">
                            <p>Виниловые пластинки сегодня - это философия, предмет коллекционирования и выбор
                                энтузиастов хорошего звука.
                                Проигрыватель виниловых дисков стал знаковым элементом современного интерьера.
                                Появившись в квартире, он
                                формирует вокруг себя своеобразную атмосферу. А коллекция дисков становится культурным
                                центром всего дома,
                                добавляя магии в ритуал прослушивания музыки.
                            </p>
                            <p>Виниловые пластинки сегодня - это философия, предмет коллекционирования и выбор
                                энтузиастов хорошего звука.
                                Проигрыватель виниловых дисков стал знаковым элементом современного интерьера.
                            </p>
                        </div>
                    </div>
                    <div class="text-right">
                        <a class="news__item__more text-uppercase " href="#">ЧИТАТЬ ДАЛЬШЕ</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6 position-static">
            <div class="container position-absolute container-absolute">
                <div class="col-xl-10 mx-auto h-100 px-0">
                    <div class="col-xl-6 offset-xl-6 px-0">
                        <div class="d-flex row-second__wrapper">
                            <div class="row-second__image__second flex-shrink-0">
                                <div class="news__item__image"
                                    style="background-image: url(../images/project/new-3.jpg)"></div>
                            </div>
                            <div class="second news__item row-second__news__item py-3 my-auto">
                                <div class="news__item__height overflow-hidden">
                                    <div class="news__item__date text-right">12.02.2020</div>
                                    <h3 class="news__item__title text-uppercase">
                                        <a href="#">ВИНИЛОВЫЕ ПРОИГРЫВАТЕЛИ</a>
                                    </h3>
                                    <div class="news__item__text text-justify">
                                        <p>Виниловые пластинки сегодня - это философия, предмет коллекционирования и
                                            выбор энтузиастов хорошего звука.
                                            Проигрыватель виниловых дисков стал знаковым элементом современного
                                            интерьера. Появившись в квартире, он
                                            формирует вокруг себя своеобразную атмосферу. А коллекция дисков становится
                                            культурным центром всего дома,
                                            добавляя магии в ритуал прослушивания музыки.
                                        </p>
                                        <p>Виниловые пластинки сегодня - это философия, предмет коллекционирования и
                                            выбор энтузиастов хорошего звука.
                                            Проигрыватель виниловых дисков стал знаковым элементом современного
                                            интерьера.
                                        </p>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <a class="news__item__more text-uppercase " href="#">ЧИТАТЬ ДАЛЬШЕ</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <a class="news__show-all w-100 text-center d-block text-uppercase" href="#">УЗНАТЬ БОЛЬШЕ</a>


</section>
<!-- end news -->
@endsection
