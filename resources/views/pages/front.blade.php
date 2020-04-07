@extends('layouts.app')
@section('content')
<!-- begin first-screen -->
<section class="first-screen position-relative">
    <div class="first-screen__slider first-screen-slick">
        <div class="first-screen__slider__item" style="background-image: url(../images/project/fs-slide.png);">
            <div class="container d-flex position-relative">
                <div class="offset-lg-1 my-auto">
                    <div
                        class="first-screen__slider__item__in position-relative d-flex flex-column justify-content-between">
                        <h1 class="title text-uppercase">ALL IN ONE!*</h1>
                        <div>
                            <h2 class="subtitle text-uppercase">НОВЫЙ CEOL</h2>
                            <div class="text">стильный, мощный, компактный, универсальный</div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <a class="btn" href="#">ПОДРОБНЕЕ</a>
                            <div class="footnote text-uppercase align-self-end">*ОДИН ЗА ВСЕХ</div>
                        </div>
                    </div>
                </div>
                <img class="award position-absolute d-none d-md-block" src="/images/project/award.png" alt="">
            </div>
        </div>
        <div class="first-screen__slider__item" style="background-image: url(../images/project/fs-slide.png);">
        </div>
        <div class="first-screen__slider__item" style="background-image: url(../images/project/fs-slide.png);">
        </div>
    </div>
</section>
<!-- end first-screen -->
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
<!-- begin catalog -->
<section class="catalog">
    <a id="catalog"></a>
    <div class="catalog__filter">
        <div class="container">
            <div class="catalog__filter__slider catalog-filter-slick slick-initialized slick-slider"><button
                    type="button" class="slick-prev slick-arrow" style=""></button>
                <div class="slick-list draggable">
                    <div class="slick-track"
                        style="opacity: 1; width: 3968px; transform: translate3d(-1152px, 0px, 0px);">
                        <div class="catalog__filter__slider__item slick-slide slick-cloned" data-slick-index="-9"
                            aria-hidden="true" style="width: 128px;" tabindex="-1">
                            <a class="catalog__filter__slider__link text-uppercase text-center" href="#" tabindex="-1">
                                <div class="image__wrapper icon-center">
                                    <img class="catalog__filter__slider__image d-block"
                                        src="/images/project/catalog-slide-3.png" alt="">
                                </div>
                                АКУСТИЧЕСКИЕ СИСТЕМЫ ДЛЯ ТВ
                            </a>
                        </div>
                        <div class="catalog__filter__slider__item slick-slide slick-cloned" data-slick-index="-8"
                            aria-hidden="true" style="width: 128px;" tabindex="-1">
                            <a class="catalog__filter__slider__link text-uppercase text-center" href="#" tabindex="-1">
                                <div class="image__wrapper icon-center">
                                    <img class="catalog__filter__slider__image d-block"
                                        src="/images/project/catalog-slide-4.png" alt="">
                                </div>
                                УСИЛИТЕЛИ
                            </a>
                        </div>
                        <div class="catalog__filter__slider__item slick-slide slick-cloned" data-slick-index="-7"
                            aria-hidden="true" style="width: 128px;" tabindex="-1">
                            <a class="catalog__filter__slider__link text-uppercase text-center" href="#" tabindex="-1">
                                <div class="image__wrapper icon-center">
                                    <img class="catalog__filter__slider__image d-block"
                                        src="/images/project/catalog-slide-5.png" alt="">
                                </div>
                                SACD/CD<br>ПРОИГРЫВАТЕЛИ
                            </a>
                        </div>
                        <div class="catalog__filter__slider__item slick-slide slick-cloned" data-slick-index="-6"
                            aria-hidden="true" style="width: 128px;" tabindex="-1">
                            <a class="catalog__filter__slider__link text-uppercase text-center" href="#" tabindex="-1">
                                <div class="image__wrapper icon-center">
                                    <img class="catalog__filter__slider__image d-block"
                                        src="/images/project/catalog-slide-6.png" alt="">
                                </div>
                                СЕТЕВЫЕ<br>ПРОИГРЫВАТЕЛИ
                            </a>
                        </div>
                        <div class="catalog__filter__slider__item slick-slide slick-cloned" data-slick-index="-5"
                            aria-hidden="true" style="width: 128px;" tabindex="-1">
                            <a class="catalog__filter__slider__link text-uppercase text-center" href="#" tabindex="-1">
                                <div class="image__wrapper icon-center">
                                    <img class="catalog__filter__slider__image d-block"
                                        src="/images/project/catalog-slide-7.png" alt="">
                                </div>
                                ВИНИЛОВЫЕ<br>ПРОИГРЫВАТЕЛИ
                            </a>
                        </div>
                        <div class="catalog__filter__slider__item slick-slide slick-cloned" data-slick-index="-4"
                            aria-hidden="true" style="width: 128px;" tabindex="-1">
                            <a class="catalog__filter__slider__link text-uppercase text-center" href="#" tabindex="-1">
                                <div class="image__wrapper icon-center">
                                    <img class="catalog__filter__slider__image d-block"
                                        src="/images/project/catalog-slide-8.png" alt="">
                                </div>
                                МИНИ СИСТЕМЫ
                            </a>
                        </div>
                        <div class="catalog__filter__slider__item slick-slide slick-cloned" data-slick-index="-3"
                            aria-hidden="true" style="width: 128px;" tabindex="-1">
                            <a class="catalog__filter__slider__link text-uppercase text-center" href="#" tabindex="-1">
                                <div class="image__wrapper icon-center">
                                    <img class="catalog__filter__slider__image d-block"
                                        src="/images/project/catalog-slide-9.png" alt="">
                                </div>
                                НАУШНИКИ
                            </a>
                        </div>
                        <div class="catalog__filter__slider__item slick-slide slick-cloned" data-slick-index="-2"
                            aria-hidden="true" style="width: 128px;" tabindex="-1">
                            <a class="catalog__filter__slider__link text-uppercase text-center" href="#" tabindex="-1">
                                <div class="image__wrapper icon-center">
                                    <img class="catalog__filter__slider__image d-block"
                                        src="/images/project/catalog-slide-1.png" alt="">
                                </div>
                                АКЦИИ
                            </a>
                        </div>
                        <div class="catalog__filter__slider__item slick-slide slick-cloned" data-slick-index="-1"
                            aria-hidden="true" style="width: 128px;" tabindex="-1">
                            <a class="catalog__filter__slider__link text-uppercase text-center" href="#" tabindex="-1">
                                <div class="image__wrapper icon-center">
                                    <img class="catalog__filter__slider__image d-block"
                                        src="/images/project/catalog-slide-2.png" alt="">
                                </div>
                                AV РЕСИВЕРЫ
                            </a>
                        </div>
                        <div class="catalog__filter__slider__item slick-slide slick-current slick-active"
                            data-slick-index="0" aria-hidden="false" style="width: 128px;" tabindex="0">
                            <a class="catalog__filter__slider__link text-uppercase text-center" href="#" tabindex="0">
                                <div class="image__wrapper icon-center">
                                    <img class="catalog__filter__slider__image d-block"
                                        src="/images/project/catalog-slide-1.png" alt="">
                                </div>
                                АКЦИИ
                            </a>
                        </div>
                        <div class="catalog__filter__slider__item slick-slide slick-active" data-slick-index="1"
                            aria-hidden="false" style="width: 128px;" tabindex="0">
                            <a class="catalog__filter__slider__link text-uppercase text-center" href="#" tabindex="0">
                                <div class="image__wrapper icon-center">
                                    <img class="catalog__filter__slider__image d-block"
                                        src="/images/project/catalog-slide-2.png" alt="">
                                </div>
                                AV РЕСИВЕРЫ
                            </a>
                        </div>
                        <div class="catalog__filter__slider__item slick-slide slick-active" data-slick-index="2"
                            aria-hidden="false" style="width: 128px;" tabindex="0">
                            <a class="catalog__filter__slider__link text-uppercase text-center" href="#" tabindex="0">
                                <div class="image__wrapper icon-center">
                                    <img class="catalog__filter__slider__image d-block"
                                        src="/images/project/catalog-slide-3.png" alt="">
                                </div>
                                АКУСТИЧЕСКИЕ СИСТЕМЫ ДЛЯ ТВ
                            </a>
                        </div>
                        <div class="catalog__filter__slider__item slick-slide slick-active" data-slick-index="3"
                            aria-hidden="false" style="width: 128px;" tabindex="0">
                            <a class="catalog__filter__slider__link text-uppercase text-center" href="#" tabindex="0">
                                <div class="image__wrapper icon-center">
                                    <img class="catalog__filter__slider__image d-block"
                                        src="/images/project/catalog-slide-4.png" alt="">
                                </div>
                                УСИЛИТЕЛИ
                            </a>
                        </div>
                        <div class="catalog__filter__slider__item slick-slide slick-active" data-slick-index="4"
                            aria-hidden="false" style="width: 128px;" tabindex="0">
                            <a class="catalog__filter__slider__link text-uppercase text-center" href="#" tabindex="0">
                                <div class="image__wrapper icon-center">
                                    <img class="catalog__filter__slider__image d-block"
                                        src="/images/project/catalog-slide-5.png" alt="">
                                </div>
                                SACD/CD<br>ПРОИГРЫВАТЕЛИ
                            </a>
                        </div>
                        <div class="catalog__filter__slider__item slick-slide slick-active" data-slick-index="5"
                            aria-hidden="false" style="width: 128px;" tabindex="0">
                            <a class="catalog__filter__slider__link text-uppercase text-center" href="#" tabindex="0">
                                <div class="image__wrapper icon-center">
                                    <img class="catalog__filter__slider__image d-block"
                                        src="/images/project/catalog-slide-6.png" alt="">
                                </div>
                                СЕТЕВЫЕ<br>ПРОИГРЫВАТЕЛИ
                            </a>
                        </div>
                        <div class="catalog__filter__slider__item slick-slide slick-active" data-slick-index="6"
                            aria-hidden="false" style="width: 128px;" tabindex="0">
                            <a class="catalog__filter__slider__link text-uppercase text-center" href="#" tabindex="0">
                                <div class="image__wrapper icon-center">
                                    <img class="catalog__filter__slider__image d-block"
                                        src="/images/project/catalog-slide-7.png" alt="">
                                </div>
                                ВИНИЛОВЫЕ<br>ПРОИГРЫВАТЕЛИ
                            </a>
                        </div>
                        <div class="catalog__filter__slider__item slick-slide slick-active" data-slick-index="7"
                            aria-hidden="false" style="width: 128px;" tabindex="0">
                            <a class="catalog__filter__slider__link text-uppercase text-center" href="#" tabindex="0">
                                <div class="image__wrapper icon-center">
                                    <img class="catalog__filter__slider__image d-block"
                                        src="/images/project/catalog-slide-8.png" alt="">
                                </div>
                                МИНИ СИСТЕМЫ
                            </a>
                        </div>
                        <div class="catalog__filter__slider__item slick-slide slick-active" data-slick-index="8"
                            aria-hidden="false" style="width: 128px;" tabindex="0">
                            <a class="catalog__filter__slider__link text-uppercase text-center" href="#" tabindex="0">
                                <div class="image__wrapper icon-center">
                                    <img class="catalog__filter__slider__image d-block"
                                        src="/images/project/catalog-slide-9.png" alt="">
                                </div>
                                НАУШНИКИ
                            </a>
                        </div>
                        <div class="catalog__filter__slider__item slick-slide" data-slick-index="9" aria-hidden="true"
                            style="width: 128px;" tabindex="-1">
                            <a class="catalog__filter__slider__link text-uppercase text-center" href="#" tabindex="-1">
                                <div class="image__wrapper icon-center">
                                    <img class="catalog__filter__slider__image d-block"
                                        src="/images/project/catalog-slide-1.png" alt="">
                                </div>
                                АКЦИИ
                            </a>
                        </div>
                        <div class="catalog__filter__slider__item slick-slide" data-slick-index="10" aria-hidden="true"
                            style="width: 128px;" tabindex="-1">
                            <a class="catalog__filter__slider__link text-uppercase text-center" href="#" tabindex="-1">
                                <div class="image__wrapper icon-center">
                                    <img class="catalog__filter__slider__image d-block"
                                        src="/images/project/catalog-slide-2.png" alt="">
                                </div>
                                AV РЕСИВЕРЫ
                            </a>
                        </div>
                        <div class="catalog__filter__slider__item slick-slide slick-cloned" data-slick-index="11"
                            aria-hidden="true" style="width: 128px;" tabindex="-1">
                            <a class="catalog__filter__slider__link text-uppercase text-center" href="#" tabindex="-1">
                                <div class="image__wrapper icon-center">
                                    <img class="catalog__filter__slider__image d-block"
                                        src="/images/project/catalog-slide-1.png" alt="">
                                </div>
                                АКЦИИ
                            </a>
                        </div>
                        <div class="catalog__filter__slider__item slick-slide slick-cloned" data-slick-index="12"
                            aria-hidden="true" style="width: 128px;" tabindex="-1">
                            <a class="catalog__filter__slider__link text-uppercase text-center" href="#" tabindex="-1">
                                <div class="image__wrapper icon-center">
                                    <img class="catalog__filter__slider__image d-block"
                                        src="/images/project/catalog-slide-2.png" alt="">
                                </div>
                                AV РЕСИВЕРЫ
                            </a>
                        </div>
                        <div class="catalog__filter__slider__item slick-slide slick-cloned" data-slick-index="13"
                            aria-hidden="true" style="width: 128px;" tabindex="-1">
                            <a class="catalog__filter__slider__link text-uppercase text-center" href="#" tabindex="-1">
                                <div class="image__wrapper icon-center">
                                    <img class="catalog__filter__slider__image d-block"
                                        src="/images/project/catalog-slide-3.png" alt="">
                                </div>
                                АКУСТИЧЕСКИЕ СИСТЕМЫ ДЛЯ ТВ
                            </a>
                        </div>
                        <div class="catalog__filter__slider__item slick-slide slick-cloned" data-slick-index="14"
                            aria-hidden="true" style="width: 128px;" tabindex="-1">
                            <a class="catalog__filter__slider__link text-uppercase text-center" href="#" tabindex="-1">
                                <div class="image__wrapper icon-center">
                                    <img class="catalog__filter__slider__image d-block"
                                        src="/images/project/catalog-slide-4.png" alt="">
                                </div>
                                УСИЛИТЕЛИ
                            </a>
                        </div>
                        <div class="catalog__filter__slider__item slick-slide slick-cloned" data-slick-index="15"
                            aria-hidden="true" style="width: 128px;" tabindex="-1">
                            <a class="catalog__filter__slider__link text-uppercase text-center" href="#" tabindex="-1">
                                <div class="image__wrapper icon-center">
                                    <img class="catalog__filter__slider__image d-block"
                                        src="/images/project/catalog-slide-5.png" alt="">
                                </div>
                                SACD/CD<br>ПРОИГРЫВАТЕЛИ
                            </a>
                        </div>
                        <div class="catalog__filter__slider__item slick-slide slick-cloned" data-slick-index="16"
                            aria-hidden="true" style="width: 128px;" tabindex="-1">
                            <a class="catalog__filter__slider__link text-uppercase text-center" href="#" tabindex="-1">
                                <div class="image__wrapper icon-center">
                                    <img class="catalog__filter__slider__image d-block"
                                        src="/images/project/catalog-slide-6.png" alt="">
                                </div>
                                СЕТЕВЫЕ<br>ПРОИГРЫВАТЕЛИ
                            </a>
                        </div>
                        <div class="catalog__filter__slider__item slick-slide slick-cloned" data-slick-index="17"
                            aria-hidden="true" style="width: 128px;" tabindex="-1">
                            <a class="catalog__filter__slider__link text-uppercase text-center" href="#" tabindex="-1">
                                <div class="image__wrapper icon-center">
                                    <img class="catalog__filter__slider__image d-block"
                                        src="/images/project/catalog-slide-7.png" alt="">
                                </div>
                                ВИНИЛОВЫЕ<br>ПРОИГРЫВАТЕЛИ
                            </a>
                        </div>
                        <div class="catalog__filter__slider__item slick-slide slick-cloned" data-slick-index="18"
                            aria-hidden="true" style="width: 128px;" tabindex="-1">
                            <a class="catalog__filter__slider__link text-uppercase text-center" href="#" tabindex="-1">
                                <div class="image__wrapper icon-center">
                                    <img class="catalog__filter__slider__image d-block"
                                        src="/images/project/catalog-slide-8.png" alt="">
                                </div>
                                МИНИ СИСТЕМЫ
                            </a>
                        </div>
                        <div class="catalog__filter__slider__item slick-slide slick-cloned" data-slick-index="19"
                            aria-hidden="true" style="width: 128px;" tabindex="-1">
                            <a class="catalog__filter__slider__link text-uppercase text-center" href="#" tabindex="-1">
                                <div class="image__wrapper icon-center">
                                    <img class="catalog__filter__slider__image d-block"
                                        src="/images/project/catalog-slide-9.png" alt="">
                                </div>
                                НАУШНИКИ
                            </a>
                        </div>
                        <div class="catalog__filter__slider__item slick-slide slick-cloned" data-slick-index="20"
                            aria-hidden="true" style="width: 128px;" tabindex="-1">
                            <a class="catalog__filter__slider__link text-uppercase text-center" href="#" tabindex="-1">
                                <div class="image__wrapper icon-center">
                                    <img class="catalog__filter__slider__image d-block"
                                        src="/images/project/catalog-slide-1.png" alt="">
                                </div>
                                АКЦИИ
                            </a>
                        </div>
                        <div class="catalog__filter__slider__item slick-slide slick-cloned" data-slick-index="21"
                            aria-hidden="true" style="width: 128px;" tabindex="-1">
                            <a class="catalog__filter__slider__link text-uppercase text-center" href="#" tabindex="-1">
                                <div class="image__wrapper icon-center">
                                    <img class="catalog__filter__slider__image d-block"
                                        src="/images/project/catalog-slide-2.png" alt="">
                                </div>
                                AV РЕСИВЕРЫ
                            </a>
                        </div>
                    </div>
                </div>










                <button type="button" class="slick-next slick-arrow" style=""></button>
            </div>
        </div>
    </div>
    <div class="catalog__in">
        <div class="container">
            <div class="col-xl-10 mx-auto px-0 px-lg-3">
                <div class="row">
                    <div class="col-xl-3 col-lg-4 col-md-6 mb-4">
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
                    <div class="col-xl-3 col-lg-4 col-md-6 mb-4">
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
                    <div class="col-xl-3 col-lg-4 col-md-6 mb-4">
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
                    <div class="col-xl-3 col-lg-4 col-md-6 mb-4">
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
                    <div class="col-xl-3 col-lg-4 col-md-6 mb-4">
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
        </div>
        <a class="show-all w-100 text-center d-block text-uppercase"
            href="/catalog/">ПОКАЗАТЬ ВСЮ КАТЕГОРИЮ</a>
    </div>
</section>
<!-- end catalog -->
<!-- box-08 begin news -->
<section class="news">
    <div class="news__title__wrapper icon-center position-relative">
        <h2 class="news__title text-uppercase text-center">ОБЗОРЫ НОВИНОК DENON</h2>
    </div>
    <div class="row position-relative">
        <div class="col-6">
            <div class="news__item__image" style="background-image: url(../images/project/new-1.jpg)"></div>
        </div>
        <div class="col-6 position-static">
            <div class="container position-absolute container-absolute h-100">
                <div class="col-xl-10 mx-auto h-100">
                    <div class="col-md-6 offset-6 pr-0 h-100 d-flex">
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
        <div class="col-6 ml-15">
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
        <div class="col-6 position-static">
            <div class="container position-absolute container-absolute">
                <div class="col-xl-10 mx-auto h-100 px-0">
                    <div class="col-md-6 offset-6 px-0">
                        <div class="d-flex row-second__wrapper">
                            <div class="row-second__image__second flex-shrink-0">
                                <div class="news__item__image"
                                    style="background-image: url(../images/project/new-3.jpg)"></div>
                            </div>
                            <div class="news__item row-second__news__item py-3 my-auto">
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
<!-- box-08 end news -->
@endsection
