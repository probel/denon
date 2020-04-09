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
    <div class="container">
        <div class="col-xl-10 mx-auto px-0">
            <!-- begin product-card -->
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
                        <div class="product-card__sliders">
                            <div class="photo-big">
                                <a href="#" class="photo-big__item d-flex h-100" data-lightbox="product-00001">
                                    <img class="m-auto img-fluid" src="/images/project/product-1.jpg">
                                </a>
                            </div>
                            <div class="photo-small photo-small-slick">
                                <div class="photo-small__item d-flex mx-auto">
                                    <img class="align-self-center m-auto" src="/images/project/prod-sm-1.jpg" alt="">
                                </div>
                                <div class="photo-small__item d-flex mx-auto">
                                    <img class="align-self-center m-auto" src="/images/project/prod-sm-2.jpg" alt="">
                                </div>
                                <div class="photo-small__item d-flex mx-auto">
                                    <img class="align-self-center m-auto" src="/images/project/prod-sm-3.jpg" alt="">
                                </div>
                                <div class="photo-small__item d-flex mx-auto">
                                    <img class="align-self-center m-auto" src="/images/project/prod-sm-4.jpg" alt="">
                                </div>
                                <div class="photo-small__item d-flex mx-auto">
                                    <img class="align-self-center m-auto" src="/images/project/prod-sm-1.jpg" alt="">
                                </div>
                                <div class="photo-small__item d-flex mx-auto">
                                    <img class="align-self-center m-auto" src="/images/project/prod-sm-2.jpg" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="product-card__info">
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
                            <div class="product-card__description d-flex flex-column position-relative">
                                <div class="product-card__description__caption text-uppercase">ОПИСАНИЕ</div>
                                <div class="product-card__description__text text-justify">
                                    Новый AV-ресивер Denon AVR-S650H предлагает самые современные технологии изображения и звука. Впервые
                                    в 5 канальном AV-ресивере предлагаются технологии старших линеек - встроенная технология HEOS предоставляет
                                    быстрый доступ к тысячам музыкальных радиостанций в сети Интернет и музыкальным сервисам Spotify, Deezer и Tidal,
                                    а программа автоматической настройки акустики Audyssey, с помощью входящего в комплект микрофона, поможет быстро
                                    и правильно настроить звук всей системы.
                                </div>
                                <div class="product-card__description__footnote mt-auto text-lg-right">
                                    При покупке данного товара Вам начисляется бонус 1 500 РУБ.,<br>
                                    Бонус можно использовать при последующих покупках в магазинах Денон.рф и Кинодом.рф
                                </div>
                            </div>
                            <form action="/" method="post" class="product-card__form js-form__to-cart">
                                {{ csrf_field() }}
                                <input type="hidden" name="id" value="product-id">
                                <div class="d-flex justify-content-between align-items-end">
                                    <div class="price__wrapper">
                                        <div class="old-price">39 990 РУБ</div>
                                        <div class="price-sum"><strong class="js-product-sum">29 990 </strong>РУБ</div>
                                    </div>
                                    <div class="d-flex align-items-end">
                                        <div class="plusminus d-flex align-items-center js-plusminus">
                                            <div class="plusminus__caption text-uppercase">Количество:</div>
                                            <span class="minus js-minus">-</span>
                                            <input type="hidden" name="id" value="product-id">
                                            <input type="text" name="count" class="js-product-count" data-price="product-price" data-old_price="product-oldprice" id="" value="1" readonly>
                                            <span class="plus js-plus">+</span>
                                        </div>
                                        <button class="btn btn-triangle btn-broun" type="submit">
                                            В корзину
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="product-description">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs d-flex nav-fill nav-tabs__custom">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#" data-target="#product-desc-01">Описание</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#"
                           data-target="#product-desc-02">Характеристики</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"
                           data-toggle="tab" href="#" data-target="#product-desc-03">ЗАГРУЗКИ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#" data-target="#product-desc-04">ОБЗОРЫ</a>
                    </li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane active" id="product-desc-01">
                        <p>Новый AV-ресивер Denon AVR-S650H предлагает самые современные технологии изображения и звука. Впервые в 5 канальном
                            AV-ресивере предлагаются технологии старших линеек - встроенная технология HEOS предоставляет быстрый доступ к тысячам
                            музыкальных радиостанций в сети Интернет и музыкальным сервисам Spotify, Deezer и Tidal, а программа автоматической
                            настройки акустики Audyssey, с помощью входящего в комплект микрофона, поможет быстро и правильно настроить звук всей
                            системы.
                        </p>
                        <p>Смотрите свои любимые фильмы и телевизионные шоу с потрясающим качеством изображения благодаря поддержке технологий
                            Dolby Vision and HDR. Совместимость с Apple AirPlay 2, Amazon Alexa и Google Assistant также делает пользование этим
                            ресивером простым и удобным.</p>
                        <img src="/images/project/product-desc-1.jpg" alt="">
                        <ul>
                            <li>Высококачественный 5-канальный усилитель: мощный и динамичный звук с мощностью 135 Вт на канал</li>
                            <li>Поддержка новейших видеоформатов: великолепное качество изображения в формате 4K Ultra HD / 60 Гц благодаря технологиям HDR10, Dolby Vision и HLG</li>
                            <li>Широкие возможности подключения: 5 входов HDMI  и 1 выход с поддержкой HDCP 2.3 на всех портах</li>
                            <li>Программа ассистент по настройке и графический интерфейс пользователя: быстрая и правильная настройка всех функций</li>
                            <li>Встроенная сетевая технология HEOS: быстрый и простой доступ к музыкальным онлайн-сервисам Spotify, Tidal, TuneIn, Deezer и другим в сети Интернет через бесплатное приложение HEOS для смартфонов или через AirPlay2.</li>
                            <li>Подключение к Smart TV: удобное управление AV-ресивером через пульт телевизора через HDMI-CEC</li>
                            <li>Поддержка eARC (Enhanced Audio Return Channel): Позволяет передавать многоканальный звук в формате Dolby True HD и DTS HA Master Audio напрямую с телевизора на AV-ресивер через подключенный кабель HDMI</li>
                            <li>Порт USB на фронтальной панели: воспроизведение аудио в форматах MP3, WAV, FLAC, ALAC и DSD</li>
                            <li>Четыре кнопки быстрого выбора источника: сохраните ваши предпочтительные настройки звука для каждого источника</li>
                            <li>Программа настройки звука Audyssey MultEQ: Возможность точно настроить звук с учетом акустических особенностей вашей комнаты</li>
                        </ul>
                        <img src="/images/project/product-desc-2.jpg" alt="">
                    </div>
                    <div class="tab-pane" id="product-desc-02">
                        <div class="accordion features" id="features-accordion">
                            <div class="features__caption d-flex align-items-end">
                                <h2 class="features__caption__title mb-0">Предлагаем Вам сравнить модели по параметрам:</h2>
                                <div class="features__caption__item product">Denon AVR-S650H</div>
                                <div class="features__caption__item">
                                    <select>
                                        <option selected>Выбрать модель</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                </div>
                                <div class="features__caption__item">
                                    <select>
                                        <option selected>Выбрать модель</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                </div>
                            </div>
                            <div class="features__item">
                                {{-- надо дописать класс js чтобы при раскрытии пункта появлялся -is-open --}}
                                <div class="features__item__header d-flex align-items-center -is-open" id="features-item-header-1"
                                            role="button" data-toggle="collapse"
                                            data-target="#features-item-content-1"
                                            aria-expanded="true"
                                            aria-controls="collapseOne">
                                    <div class="icon position-relative"></div>
                                    <h2 class="title text-uppercase">ОСНОВНЫЕ ХАРАКТЕРИСТКИ</h2>
                                </div>

                                <div id="features-item-content-1" class="collapse show" aria-labelledby="features-item-header-1" data-parent="#features-accordion">
                                    <table class="features__table">
                                        <tbody>
                                            <tr>
                                                <td class="caption">Диапазон частот</td>
                                                <td>
                                                    <span class="circle"></span>
                                                    <span class="circle"></span>
                                                    <span class="circle"></span>
                                                </td>
                                                <td>
                                                    <span class="circle"></span>
                                                </td>
                                                <td>-</td>
                                            </tr>
                                            <tr>
                                                <td class="caption">Прибор подавляет цифровые сигналы</td>
                                                <td>GPS L1, GPS L2, Глонасс</td>
                                                <td>GPS L1, GPS L2, Глонасс</td>
                                                <td>-</td>
                                            </tr>
                                            <tr>
                                                <td class="caption">Радиус действия</td>
                                                <td><span class="circle"></span></td>
                                                <td><span class="circle"></span></td>
                                                <td><span class="circle"></span></td>
                                            </tr>
                                            <tr>
                                                <td class="caption">Источник питания</td>
                                                <td>12 В</td>
                                                <td>15 В</td>
                                                <td>17 В</td>
                                            </tr>
                                            <tr>
                                                <td class="caption">Питание</td>
                                                <td>от сети 220 В</td>
                                                <td>от сети 220 В</td>
                                                <td>от сети 220 В</td>
                                            </tr>
                                            <tr>
                                                <td class="caption">Условия эксплуатации прибора</td>
                                                <td>температура</td>
                                                <td>температура</td>
                                                <td>температура</td>
                                            </tr>
                                            <tr>
                                                <td class="caption">Габариты, мм</td>
                                                <td>85.7 х 20.5 х 20.5</td>
                                                <td>85.7 х 20.5 х 20.5</td>
                                                <td>85.7 х 20.5 х 20.5</td>
                                            </tr>
                                            <tr>
                                                <td class="caption">Вес, г</td>
                                                <td>25</td>
                                                <td>25</td>
                                                <td>25</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="features__item">
                                <div class="features__item__header d-flex align-items-center" id="features-item-header-2" role="button" data-toggle="collapse"
                                data-target="#features-item-content-2" aria-expanded="false" aria-controls="collapseOne">
                                <div class="icon position-relative"></div>
                                    <h2 class="title text-uppercase">СПЕЦИФИКАЦИИ</h2>
                                </div>

                                <div id="features-item-content-2" class="collapse" aria-labelledby="features-item-header-2" data-parent="#features-accordion">
                                    <div class="card-body">
                                       таблица
                                    </div>
                                </div>
                            </div>
                            <div class="features__item">
                                <div class="features__item__header d-flex align-items-center" id="features-item-header-3" role="button" data-toggle="collapse"
                                data-target="#features-item-content-3" aria-expanded="false" aria-controls="collapseOne">
                                <div class="icon position-relative"></div>
                                    <h2 class="title text-uppercase">ОБЩИЕ</h2>
                                </div>

                                <div id="features-item-content-3" class="collapse" aria-labelledby="features-item-header-3" data-parent="#features-accordion">
                                    <div class="card-body">
                                        таблица
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="product-desc-03">
                        <div class="downloads text-uppercase">
                            {{-- здесь класс .title (у первого downloads__row) --}}
                            <div class="row downloads__row title align-items-lg-center">
                                <div class="col-sm-4"></div>
                                <div class="col-sm-2">Дата</div>
                                <div class="col-sm-2">ВЕС</div>
                                <div class="col-sm-2">ТИП ФАЙЛА</div>
                                <div class="col-sm-2"></div>
                            </div>
                            {{-- здесь класс .item (у этого и следующих downloads__row) --}}
                            <div class="row downloads__row item align-items-lg-center">
                                <div class="col-sm-4">Инструкция ПО ЭКСПЛУАТАЦИИ</div>
                                <div class="col-sm-2">12.02.2020</div>
                                <div class="col-sm-2">-</div>
                                <div class="col-sm-2">WEBSITE</div>
                                <div class="col-sm-2"><a class="btn" href="#">Просмотр</a></div>
                            </div>
                            <div class="row downloads__row item align-items-lg-center">
                                <div class="col-sm-4">Информация о продукте</div>
                                <div class="col-sm-2">06.12.2019</div>
                                <div class="col-sm-2">1.2MB</div>
                                <div class="col-sm-2">PDF</div>
                                <div class="col-sm-2"><a class="btn" href="#">СКАЧАТЬ</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="product-desc-04">
                         Текст и картинки
                    </div>
                </div>
                <!-- bottom line -->
                <div class="product-description__bottom">
                    <form action="" class="product-card__form d-flex h-100 align-items-end justify-content-end">
                        <div class="price__wrapper">
                            <div class="old-price">39 990 РУБ</div>
                            <div class="price-sum"><strong class="js-product-sum">29 990 </strong>РУБ</div>
                        </div>
                        <div class="plusminus d-flex align-items-center js-plusminus">
                            <div class="plusminus__caption text-uppercase">Количество:</div>
                            <span class="minus js-minus">-</span>
                            <input type="hidden" name="id" value="product-id">
                            <input type="text" name="count" class="js-product-count" data-price="product-price" data-old_price="product-oldprice" id="" value="1" readonly="">
                            <span class="plus js-plus">+</span>
                        </div>
                        <button class="btn btn-triangle btn-broun" type="submit">
                            В корзину
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
