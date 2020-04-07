@extends('layouts.app')
@section('content')
<div class="product-page bg-light">
    <section class="breadcrumb__line position-relative">
        <div class="container h-100">
            <div class="col-xl-10 mx-auto px-0 h-100">
                <div class="breadcrumb__line__in d-flex align-items-center position-relative h-100">
                    <nav aria-label="breadcrumb" class="breadcrumb__wrapper">
                        <ol class="breadcrumb text-uppercase p-0 m-0">
                            <li class="breadcrumb-item"><a href="/">DENON</a></li>
                            <li class="breadcrumb-item"><a href="#">HI-FI КОМПОНЕНТЫ</a></li>
                            <li class="breadcrumb-item active" aria-current="page">виниловые проигрыватели</li>
                        </ol>
                    </nav>
                    <div class="page-title__small text-uppercase">
                        <strong>AVR-S650H</strong>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- begin product-card -->
    <div class="container">
        <div class="col-xl-10 mx-auto px-0">
            <div class="product-card">
                <div class="catalog__item__top d-flex align-items-baseline position-relative">
                    <div class="sale text-uppercase">
                        <img class="mr-2 pb-2" src="/images/icons/sale.png" alt="">Sale
                    </div>
                    <div class="in-stock text-uppercase ml-auto">в наличии</div>
                    <div class="sticker position-absolute text-uppercase">new</div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="photo-big">
                            <a href="#" class="photo-big__item d-flex h-100" data-lightbox="product-00001">
                                <img class="m-auto img-fluid" src="/images/project/product-1.jpg">
                            </a>
                        </div>
                        <div class="photo-small photo-small-slick">
                            <div class="photo-small__item d-flex">
                                <img class="align-self-center m-auto" src="/images/project/prod-sm-1.jpg" alt="">
                            </div>
                            <div class="photo-small__item d-flex">
                                <img class="align-self-center m-auto" src="/images/project/prod-sm-2.jpg" alt="">
                            </div>
                            <div class="photo-small__item d-flex">
                                <img class="align-self-center m-auto" src="/images/project/prod-sm-3.jpg" alt="">
                            </div>
                            <div class="photo-small__item d-flex">
                                <img class="align-self-center m-auto" src="/images/project/prod-sm-4.jpg" alt="">
                            </div>
                            <div class="photo-small__item d-flex">
                                <img class="align-self-center m-auto" src="/images/project/prod-sm-1.jpg" alt="">
                            </div>
                            <div class="photo-small__item d-flex">
                                <img class="align-self-center m-auto" src="/images/project/prod-sm-2.jpg" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h1 class="product-card__title">AVR-S650H</h1>
                                <h2 class="product-card__subtitle">5.2 канальный 4K AV-ресивер с HEOS</h2>
                            </div>
                            <div class="vendor-code">AZ21173</div>
                        </div>
                        <div class="color-check d-flex">
                            <div class="color-check__caption">Цвет:</div>
                            <div class="color-check__icon" style="background-color: #000;"></div>
                            <div class="color-check__icon" style="background-color: #fff; border-color: #000"></div>
                            <div class="color-check__icon" style="background-color: rgb(125, 80, 36);;"></div>
                        </div>
                        <div class="product-card__description d-flex flex-column">
                            <div class="product-card__description__caption text-uppercase">ОПИСАНИЕ</div>
                            <div class="product-card__description__text text-justify">
                                Новый AV-ресивер Denon AVR-S650H предлагает самые современные технологии изображения и звука. Впервые
                                в 5 канальном AV-ресивере предлагаются технологии старших линеек - встроенная технология HEOS предоставляет
                                быстрый доступ к тысячам музыкальных радиостанций в сети Интернет и музыкальным сервисам Spotify, Deezer и Tidal,
                                а программа автоматической настройки акустики Audyssey, с помощью входящего в комплект микрофона, поможет быстро
                                и правильно настроить звук всей системы.
                            </div>
                            <div class="product-card__description__footnote my-auto text-lg-right">
                                При покупке данного товара Вам начисляется бонус 1 500 РУБ.,<br>
                                Бонус можно использовать при последующих покупках в магазинах Денон.рф и Кинодом.рф
                            </div>
                        </div>
                        <form action="/" method="post" class="product-card__form js-form__to-cart">
                            {{ csrf_field() }}
                            <input type="hidden" name="id" value="product-id">
                            <div class="d-flex justify-content-between">
                                <div class="price__wrapper">
                                    <div class="old-price text-right">39 990 РУБ</div>
                                    <div class="price-sum"><strong class="js-product-sum">29 990 </strong>РУБ</div>
                                </div>
                                <div class="plusminus d-flex align-items-center js-plusminus">
                                    <span class="minus js-minus">-</span>
                                    <input type="hidden" name="id" value="product-id">
                                    <input type="text" name="count" class="js-product-count" data-price="product-price" data-old_price="product-oldprice" id="" value="1" readonly>
                                    <span class="plus js-plus">+</span>
                                </div>
                                <div class="d-flex product-card__form__buttons justify-content-between flex-wrap">
                                    <button class="btn btn-triangle" type="submit">
                                        В корзину
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
