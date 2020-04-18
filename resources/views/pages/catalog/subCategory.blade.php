@extends('layouts.app')
@section('content')
<div class="category-page bg-light">
    <x-header :bg-image="$bgImage">{!! $title !!}</x-header>
    <x-slogan :title="$values['slogan'] ?? ''">{!! $values['description'] ?? '' !!}</x-slogan>
    @include('shared.breadcrumb')
    <section class="catalog">
        {{-- здесь только тизеры товаров совпадают полностью с тизерами на главной, сетка другая --}}
        <div class="catalog__in">
            <div class="container">
                <div class="catalog__in__list col-xl-10 mx-auto px-0">
                    <div class="row">
                        <div class="col-xl-9 order-2 order-xl-1">
                            <div class="row">
                                @forelse ($products as $product)
                                <div class="col-lg-4 col-md-6 mb-4">
                                    @include('shared.product.teaser')
                                </div>
                                @empty

                                @endforelse

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
                        <div class="col-xl-3 order-1 order-xl-2">
                            <div class="category-page__filter">
                                <div class="category-page__filter__block">
                                    <a class="category-page__filter__title" data-toggle="collapse" href="#category-page-filter-1" aria-expanded="true">
                                        Наличие
                                    </a>
                                    <div class="category-page__filter__options collapse show" id="category-page-filter-1">
                                        <label class="checkbox">
                                            <input type="checkbox" name="category-page-filter-1" value="1" checked="checked">
                                            <span class="checkbox__text">В наличии</span>
                                        </label>
                                        <label class="checkbox">
                                            <input type="checkbox" name="category-page-filter-1" value="2">
                                            <span class="checkbox__text">Нет в наличии</span>
                                        </label>
                                        <label class="checkbox ">
                                            <input type="checkbox" name="category-page-filter-1" value="3" >
                                            <span class="checkbox__text">В наличии, включая отсутсвующие</span>
                                        </label>
                                    </div>
                                </div>
                                <div class="category-page__filter__block">
                                    <a class="category-page__filter__title" data-toggle="collapse" href="#category-page-filter-2" aria-expanded="true">
                                        Цена
                                    </a>
                                    <div class="category-page__filter__options collapse show" id="category-page-filter-2">
                                        <label class="checkbox">
                                            <input type="radio" name="category-page-filter-2" value="1" checked="checked">
                                            <span class="checkbox__text">По возрастанию</span>
                                        </label>
                                        <label class="checkbox">
                                            <input type="radio" name="category-page-filter-2" value="2">
                                            <span class="checkbox__text">По убыванию</span>
                                        </label>
                                    </div>
                                </div>
                                <div class="category-page__filter__block">
                                    <a class="category-page__filter__title" data-toggle="collapse" href="#category-page-filter-3" aria-expanded="true">
                                        Акция
                                    </a>
                                    <div class="category-page__filter__options collapse show" id="category-page-filter-3">
                                        <label class="checkbox">
                                            <input type="checkbox" name="category-page-filter-3" value="1" checked="checked">
                                            <span class="checkbox__text">Товары со скидой</span>
                                        </label>
                                        <label class="checkbox">
                                            <input type="checkbox" name="category-page-filter-3" value="2">
                                            <span class="checkbox__text">Подарки при покупке</span>
                                        </label>
                                        <label class="checkbox">
                                            <input type="checkbox" name="category-page-filter-3" value="3">
                                            <span class="checkbox__text">Подарки при покупке</span>
                                        </label>
                                    </div>
                                </div>
                                <div class="catalog__item__bottom d-flex justify-content-between">
                                    <form action="" method="post" class="form">
                                        <button type="submit" class="btn btn-broun">ПРИМЕНИТЬ</button>
                                    </form>
                                    <form action="" method="post" class="form">
                                        <button type="submit" class="btn btn-triangle btn-broun">СБРОСИТЬ</button>
                                    </form>
                                </div>
                                <div class="category-page__filter__block last">
                                    <a class="category-page__filter__title" data-toggle="collapse" href="#category-page-filter-4" aria-expanded="true">
                                        Все товары
                                    </a>
                                    <div class="category-page__filter__options collapse show" id="category-page-filter-4">
                                        <ul class="category-page__filter__list list-unstyled">
                                            <li class="category-page__filter__list__item">
                                                <a class="category-page__filter__list__link active" href="#">AV Ресиверы</a>
                                            </li>
                                            <li class="category-page__filter__list__item">
                                                <a class="category-page__filter__list__link" href="#">Акустические системы для ТВ</a>
                                            </li>
                                            <li class="category-page__filter__list__item">
                                                <a class="category-page__filter__list__link" href="#">Усилители</a>
                                            </li>
                                            <li class="category-page__filter__list__item">
                                                <a class="category-page__filter__list__link" href="#">SADС/CD Проигрыватели</a>
                                            </li>
                                            <li class="category-page__filter__list__item">
                                                <a class="category-page__filter__list__link" href="#">Сетевые пригрватели</a>
                                            </li>
                                            <li class="category-page__filter__list__item">
                                                <a class="category-page__filter__list__link" href="#">Виниловые проигрыватели</a>
                                            </li>
                                            <li class="category-page__filter__list__item">
                                                <a class="category-page__filter__list__link" href="#">On Ear Headphone</a>
                                            </li>
                                            <li class="category-page__filter__list__item">
                                                <a class="category-page__filter__list__link" href="#">In Ear Headphone</a>
                                            </li>
                                            <li class="category-page__filter__list__item">
                                                <a class="category-page__filter__list__link" href="#">Наушники с активной системой шумоподавления</a>
                                            </li>
                                            <li class="category-page__filter__list__item">
                                                <a class="category-page__filter__list__link" href="#">Минисистемы</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                          <li class="page-item ">
                            <a class="page-link" href="#" aria-label="Previous">
                              <span aria-hidden="true"><</span>
                            </a>
                          </li>
                          <li class="page-item active"><a class="page-link" href="#">1</a></li>
                          <li class="page-item"><a class="page-link" href="#">2</a></li>
                          <li class="page-item"><a class="page-link" href="#">3</a></li>
                          <li class="page-item">
                            <a class="page-link" href="#" aria-label="Next">
                              <span aria-hidden="true">></span>
                            </a>
                          </li>
                        </ul>
                      </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- end catalog -->
</div>
@endsection
