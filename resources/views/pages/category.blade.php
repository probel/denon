@extends('layouts.app')
@section('content')
<div class="category-page bg-light">
    <!-- begin page-title -->
    <section class="page-title d-flex align-items-center">
        <div class="container">
            <div class="col-xl-10 mx-auto px-0">
                <h1 class="page-title__title text-uppercase mb-0"><strong>SADC/CD </strong>ПРОИГРЫВАТЕЛИ</h1>
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
    <section class="breadcrumb__line position-relative d-flex align-items-center">
        <div class="container">
            <div class="col-xl-10 mx-auto px-0">
                <div class="breadcrumb__line__in d-flex align-items-center position-relative">
                    <nav aria-label="breadcrumb" class="breadcrumb__wrapper">
                        <ol class="breadcrumb text-uppercase p-0 m-0">
                            <li class="breadcrumb-item"><a href="/">DENON</a></li>
                            <li class="breadcrumb-item"><a href="#">HI-FI КОМПОНЕНТЫ</a></li>
                            <li class="breadcrumb-item active" aria-current="page">SACD/CD Проигрыватели</li>
                        </ol>
                    </nav>
                    <div class="page-title__small text-uppercase">
                        <strong>SACD/CD</strong> Проигрыватели
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- end slogan -->
    <!-- begin catalog -->
    <section class="catalog">
        <div class="catalog__in">
            <div class="container">
                <div class="col-xl-10 mx-auto px-0">
                    <div class="row">
                        <div class="col-lg-9">
                            <div class="row">
                                <div class="col-lg-4 col-md-6 mb-4">
                                    <div class="catalog__item d-flex flex-column justify-content-between h-100 js-catalog__item">
                                        <div>
                                            <div class="catalog__item__top d-flex align-items-baseline position-relative">
                                                <div class="sale text-uppercase">
                                                    <img class="mr-2 pb-2" src="/images/icons/sale.png" alt="">Sale
                                                </div>
                                                <div class="in-stock text-uppercase ml-auto">в наличии</div>
                                                <div class="sticker position-absolute text-uppercase">new</div>
                                            </div>
                                            <div class="photo">
                                                <a class="photo__link h-100 d-flex justify-content-center"
                                                    href="/catalog/glushilka-svyazi-jyt-1280c-portativnaya-gsm3ggps4g-ltewi-fi/">
                                                    <img class="photo__image mw-100 mh-100 align-self-center"
                                                        src="/images/uploads/IMG_4552.png"
                                                        alt="Глушилка связи JYT-1280C портативная (GSM/3G/GPS/4G LTE/Wi-Fi)">
                                                </a>
                                            </div>

                                            <div class="vendor-code text-uppercase text-right">AZ21170</div>
                                            <div class="name text-center">
                                                <a
                                                    href="/catalog/glushilka-svyazi-jyt-1280c-portativnaya-gsm3ggps4g-ltewi-fi/">DCD-1600NE</a>
                                            </div>
                                            <div class="catalog__item__description">
                                                Super Audio CD плеер возносящий воспроизведение дисков на новую высоту
                                            </div>
                                        </div>
                                        <div>
                                            <div class="price__wrapper text-right">

                                                <div class="expected text-uppercase">поставка ожидается<br>12.04.2020</div>
                                            </div>
                                            <div class="catalog__item__bottom d-flex justify-content-between">
                                                <form action="/quick/" method="post" class="form">
                                                    <input type="hidden" name="_token"
                                                        value="OwyMvhMQN52zmHkIbt9Fn0LdbQarRsXXi0rlebBB">
                                                    <input type="hidden" name="id" value="86">
                                                    <input type="hidden" name="count" class="js-product-count" value="1">
                                                    <button type="submit" class="btn ">Купить в 1 клик</button>
                                                </form>
                                                <form action="/cart/set/" method="post"
                                                    class="js-form__to-cart form">
                                                    <input type="hidden" name="_token"
                                                        value="OwyMvhMQN52zmHkIbt9Fn0LdbQarRsXXi0rlebBB">
                                                    <input type="hidden" name="id" value="86">
                                                    <input type="hidden" name="count" value="1">
                                                    <button type="submit" class="btn btn-triangle">ПОДРОБНЕЕ</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 mb-4">
                                    <div class="catalog__item d-flex flex-column justify-content-between h-100 js-catalog__item">

                                        <div>
                                            <div class="catalog__item__top d-flex align-items-baseline position-relative">
                                                <div class="sale text-uppercase">
                                                    <img class="mr-2 pb-2" src="/images/icons/sale.png" alt="">Sale
                                                </div>
                                                <div class="in-stock text-uppercase ml-auto">в наличии</div>
                                                <div class="sticker position-absolute text-uppercase">new</div>
                                            </div>
                                            <div class="photo">
                                                <a class="photo__link h-100 d-flex justify-content-center"
                                                    href="/catalog/glushilka-svyazi-jyt-2000-gsm3g4g-ltewi-fi/">
                                                    <img class="photo__image mw-100 mh-100 align-self-center"
                                                        src="/images/uploads/IMG_4564.png"
                                                        alt="Глушилка связи JYT-2000 (GSM/3G/4G LTE/Wi-Fi)">
                                                </a>
                                            </div>

                                            <div class="vendor-code text-uppercase text-right">AZ21170</div>
                                            <div class="name text-center">
                                                <a
                                                    href="/catalog/glushilka-svyazi-jyt-2000-gsm3g4g-ltewi-fi/">DCD-100</a>
                                            </div>
                                            <div class="catalog__item__description">
                                                Компактный CD-плеер.

                                                Идеальная пара к сетевому усилителю PMA-150H.

                                                Настоящий Hi-Fi для современного образа жизни.
                                            </div>
                                        </div>
                                        <div>
                                            <div class="price__wrapper text-right">

                                                <div class="expected text-uppercase">поставка ожидается<br>12.04.2020</div>
                                            </div>
                                            <div class="catalog__item__bottom d-flex justify-content-between">
                                                <form action="/quick/" method="post" class="form">
                                                    <input type="hidden" name="_token"
                                                        value="OwyMvhMQN52zmHkIbt9Fn0LdbQarRsXXi0rlebBB">
                                                    <input type="hidden" name="id" value="87">
                                                    <input type="hidden" name="count" class="js-product-count" value="1">
                                                    <button type="submit" class="btn ">Купить в 1 клик</button>
                                                </form>
                                                <form action="/cart/set/" method="post"
                                                    class="js-form__to-cart form">
                                                    <input type="hidden" name="_token"
                                                        value="OwyMvhMQN52zmHkIbt9Fn0LdbQarRsXXi0rlebBB">
                                                    <input type="hidden" name="id" value="87">
                                                    <input type="hidden" name="count" value="1">
                                                    <button type="submit" class="btn btn-triangle">ПОДРОБНЕЕ</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 mb-4">
                                    <div class="catalog__item d-flex flex-column justify-content-between h-100 js-catalog__item">

                                        <div>
                                            <div class="catalog__item__top d-flex align-items-baseline position-relative">
                                                <div class="sale text-uppercase">
                                                    <img class="mr-2 pb-2" src="/images/icons/sale.png" alt="">Sale
                                                </div>
                                                <div class="in-stock text-uppercase ml-auto">в наличии</div>
                                                <div class="sticker position-absolute text-uppercase">new</div>
                                            </div>
                                            <div class="photo">
                                                <a class="photo__link h-100 d-flex justify-content-center"
                                                    href="/catalog/glushilka-svyazi-berkut-12/">
                                                    <img class="photo__image mw-100 mh-100 align-self-center"
                                                        src="/images/uploads/DSC_3221.png"
                                                        alt="Глушилка связи Беркут 12">
                                                </a>
                                            </div>

                                            <div class="vendor-code text-uppercase text-right">AZ21170</div>
                                            <div class="name text-center">
                                                <a
                                                    href="/catalog/glushilka-svyazi-berkut-12/">DCD-600NE</a>
                                            </div>
                                            <div class="catalog__item__description">

                                                Воспроизведение дисков CD и CD-R/RW
                                                Технология улучшения звука &nbsp;AL32 Processing
                                                Поддержка форматов MP3 и WMA
                                                Режим Pure Direct
                                                Оптический выход

                                            </div>
                                        </div>
                                        <div>
                                            <div class="price__wrapper text-right">

                                                <div class="expected text-uppercase">поставка ожидается<br>12.04.2020</div>
                                            </div>
                                            <div class="catalog__item__bottom d-flex justify-content-between">
                                                <form action="/quick/" method="post" class="form">
                                                    <input type="hidden" name="_token"
                                                        value="OwyMvhMQN52zmHkIbt9Fn0LdbQarRsXXi0rlebBB">
                                                    <input type="hidden" name="id" value="89">
                                                    <input type="hidden" name="count" class="js-product-count" value="1">
                                                    <button type="submit" class="btn ">Купить в 1 клик</button>
                                                </form>
                                                <form action="/cart/set/" method="post"
                                                    class="js-form__to-cart form">
                                                    <input type="hidden" name="_token"
                                                        value="OwyMvhMQN52zmHkIbt9Fn0LdbQarRsXXi0rlebBB">
                                                    <input type="hidden" name="id" value="89">
                                                    <input type="hidden" name="count" value="1">
                                                    <button type="submit" class="btn btn-triangle">ПОДРОБНЕЕ</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 mb-4">
                                    <div class="catalog__item d-flex flex-column justify-content-between h-100 js-catalog__item">

                                        <div>
                                            <div class="catalog__item__top d-flex align-items-baseline position-relative">
                                                <div class="sale text-uppercase">
                                                    <img class="mr-2 pb-2" src="/images/icons/sale.png" alt="">Sale
                                                </div>
                                                <div class="in-stock text-uppercase ml-auto">в наличии</div>
                                                <div class="sticker position-absolute text-uppercase">new</div>
                                            </div>
                                            <div class="photo">
                                                <a class="photo__link h-100 d-flex justify-content-center"
                                                    href="/catalog/glushilka-svyazi-kokon/">
                                                    <img class="photo__image mw-100 mh-100 align-self-center"
                                                        src="/images/uploads/DSC_4625.png"
                                                        alt="Глушилка связи Кокон">
                                                </a>
                                            </div>

                                            <div class="vendor-code text-uppercase text-right">AZ21170</div>
                                            <div class="name text-center">
                                                <a href="/catalog/glushilka-svyazi-kokon/">DCD-800NE</a>
                                            </div>
                                            <div class="catalog__item__description">
                                                Наслаждайтесь точным и эмоциональным воспроизведением музыкальных дисков и файлов с
                                                помощью CD-проигрывателя Denon DCD-800NE со встроенным USB-портом.
                                            </div>
                                        </div>
                                        <div>
                                            <div class="price__wrapper text-right">

                                                <div class="expected text-uppercase">поставка ожидается<br>12.04.2020</div>
                                            </div>
                                            <div class="catalog__item__bottom d-flex justify-content-between">
                                                <form action="/quick/" method="post" class="form">
                                                    <input type="hidden" name="_token"
                                                        value="OwyMvhMQN52zmHkIbt9Fn0LdbQarRsXXi0rlebBB">
                                                    <input type="hidden" name="id" value="90">
                                                    <input type="hidden" name="count" class="js-product-count" value="1">
                                                    <button type="submit" class="btn ">Купить в 1 клик</button>
                                                </form>
                                                <form action="/cart/set/" method="post"
                                                    class="js-form__to-cart form">
                                                    <input type="hidden" name="_token"
                                                        value="OwyMvhMQN52zmHkIbt9Fn0LdbQarRsXXi0rlebBB">
                                                    <input type="hidden" name="id" value="90">
                                                    <input type="hidden" name="count" value="1">
                                                    <button type="submit" class="btn btn-triangle">ПОДРОБНЕЕ</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 mb-4">
                                    <div class="catalog__item d-flex flex-column justify-content-between h-100 js-catalog__item">

                                        <div>
                                            <div class="catalog__item__top d-flex align-items-baseline position-relative">
                                                <div class="sale text-uppercase">
                                                    <img class="mr-2 pb-2" src="/images/icons/sale.png" alt="">Sale
                                                </div>
                                                <div class="in-stock text-uppercase ml-auto">в наличии</div>
                                                <div class="sticker position-absolute text-uppercase">new</div>
                                            </div>
                                            <div class="photo">
                                                <a class="photo__link h-100 d-flex justify-content-center"
                                                    href="/catalog/statsionarnaya-glushilka-6-antenn-gsm-3g-wi-fi-4g-lte-bluetooth-i-besprovodnykh-kamer/">
                                                    <img class="photo__image mw-100 mh-100 align-self-center"
                                                        src="/images/uploads/DSC_4707.png"
                                                        alt="Стационарная глушилка 6 антенн (GSM 3G Wi-Fi 4G (LTE) Bluetooth и беспроводных камер)">
                                                </a>
                                            </div>

                                            <div class="vendor-code text-uppercase text-right">AZ21170</div>
                                            <div class="name text-center">
                                                <a
                                                    href="/catalog/statsionarnaya-glushilka-6-antenn-gsm-3g-wi-fi-4g-lte-bluetooth-i-besprovodnykh-kamer/">DCD-50</a>
                                            </div>
                                            <div class="catalog__item__description">
                                                Настоящий Hi-Fi для современного образа жизни. Идеальная пара к цифровым усилителям
                                                PMA-30 и PMA-60 .&nbsp;
                                            </div>
                                        </div>
                                        <div>
                                            <div class="price__wrapper text-right">

                                                <div class="expected text-uppercase">поставка ожидается<br>12.04.2020</div>
                                            </div>
                                            <div class="catalog__item__bottom d-flex justify-content-between">
                                                <form action="/quick/" method="post" class="form">
                                                    <input type="hidden" name="_token"
                                                        value="OwyMvhMQN52zmHkIbt9Fn0LdbQarRsXXi0rlebBB">
                                                    <input type="hidden" name="id" value="91">
                                                    <input type="hidden" name="count" class="js-product-count" value="1">
                                                    <button type="submit" class="btn ">Купить в 1 клик</button>
                                                </form>
                                                <form action="/cart/set/" method="post"
                                                    class="js-form__to-cart form">
                                                    <input type="hidden" name="_token"
                                                        value="OwyMvhMQN52zmHkIbt9Fn0LdbQarRsXXi0rlebBB">
                                                    <input type="hidden" name="id" value="91">
                                                    <input type="hidden" name="count" value="1">
                                                    <button type="submit" class="btn btn-triangle">ПОДРОБНЕЕ</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="category-page__filter">
                                <div class="category-page__filter__block">
                                    <a class="category-page__filter__title" data-toggle="collapse" href="#category-page-filter-1" aria-expanded="true">
                                        Наличие
                                    </a>
                                    <div class="collapse show" id="category-page-filter-1">
                                        <label class="checkbox">
                                            <input type="radio" name="category-page-filter-1" value="1" checked="checked">
                                            <span class="checkbox__text">В наличии</span>
                                        </label>
                                        <label class="checkbox">
                                            <input type="radio" name="category-page-filter-1" value="2">
                                            <span class="checkbox__text">Нет в наличии</span>
                                        </label>
                                        <label class="checkbox ">
                                            <input type="radio" name="category-page-filter-1" value="3" >
                                            <span class="checkbox__text">В наличии, включая отсутсвующие</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <a class="show-all w-100 text-center d-block text-uppercase"
                href="/catalog/">ПОКАЗАТЬ ВСЮ КАТЕГОРИЮ</a>
        </div>
    </section>
    <!-- end catalog -->
</div>
@endsection
