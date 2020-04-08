
<div class="navbar navbar-expand-xl p-0 d-block">
    <!-- header top begin -->
    <div class="header-top ">
        <div class="container">
            <div class="d-flex w-100 justify-content-between align-items-center">
                <a href="/" class="logo">
                    <img class="d-block align-self-center lazy" src="{{ asset('/images/icons/logo.png') }}" alt="">
                </a>
                <button class="navbar-toggler collapsed mb-0 p-0" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon icon-center">
                        <img src="/images/icons/burger-icon.png" alt="">
                    </span>
                </button>
                <div class="d-xl-flex d-none align-items-center">
                    <ul class="header-top__menu list-unstyled d-flex mb-0">
                        @foreach ($topMenuTitleList as $k => $v)
                            <li class="header-top__menu__item">
                                <a class="header-top__menu__link text-uppercase" href="{{ $v->getUrl() }}">
                                    @if ( $v['slug'] == 'contacts' )
                                        <i class="fas fa-map-marker-alt mr-1"></i> 
                                    @endif     
                                    {{ $v["title"] }}</a>
                            </li>
                        @endforeach
                    </ul>
                    
                    <div class="header-top__contacts">
                        <p>8 (499) 254-62-97 (магазин)</p>
                        <p>8 (916) 707-5-777 (сервис)</p>
                    </div>
                    <div class="header-top__contacts">
                        <p class="hide-lg-text"><i class="far fa-clock mr-1"></i>ПН-ВС 10:00-22:00</p>
                        <p>
                            <a class="color-broun" href="mailto:shop.denon@mail.ru">
                                <i class="fas fa-envelope mr-1"></i><span class="hide-lg-text">Напишите нам</span>
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- header top end -->
    <!-- header begin-->
    <header class="header">
        <div class="container">
            <div class="d-flex w-100 flex-column flex-xl-row align-items-center">
                <nav class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="header-top__menu list-unstyled mb-0 mr-0 d-xl-none">
                        <li class="header-top__menu__item">
                            <a class="header-top__menu__link text-uppercase" href="#">ИНСТАЛЛЯЦИЯ</a>
                        </li>
                        <li class="header-top__menu__item">
                            <a class="header-top__menu__link text-uppercase" href="#">НОВОСТИ</a>
                        </li>
                        <li class="header-top__menu__item">
                            <a class="header-top__menu__link text-uppercase" href="#">ГАРАНТИЯ И СЕРВИС</a>
                        </li>
                        <li class="header-top__menu__item">
                            <a class="header-top__menu__link text-uppercase" href="#">ДОСТАВКА И ОПЛАТА</a>
                        </li>
                        <li class="header-top__menu__item">
                            <a class="header-top__menu__link text-uppercase" href="#">
                                <i class="fas fa-map-marker-alt mr-1"></i>КОНТАКТЫ
                            </a>
                        </li>
                    </ul>
                    <ul class="header__menu list-unstyled d-flex align-items-center flex-column flex-xl-row mb-0 ml-auto">
                        <li class="header__menu__item position-relative">
                            <a class="header__menu__link text-uppercase" href="#" id="header__menu__link-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Домашний кинотеатр
                            </a>
                            <div class="dropdown-menu" aria-labelledby="header__menu__link-1">
                                <ul class="dropdown-menu__list list-unstyled">
                                    <li class="dropdown-menu__item">
                                        <a class="dropdown-menu__link text-uppercase" href="#">AV РЕСИВЕРЫ</a>
                                    </li>
                                    <li class="dropdown-menu__item">
                                        <a class="dropdown-menu__link text-uppercase" href="#">АКУСТИЧЕСКИЕ СИСТЕМЫ ДЛЯ ТВ</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="header__menu__item">
                            <a class="header__menu__link text-uppercase" href="#">HI-FI компоненты</a>
                        </li>
                        <li class="header__menu__item">
                            <a class="header__menu__link text-uppercase" href="#">Минисистемы</a>
                        </li>
                        <li class="header__menu__item">
                            <a class="header__menu__link text-uppercase" href="#">НАушники</a>
                        </li>
                        <li class="header__menu__item">
                            <a class="header__menu__link text-uppercase" href="#">DENON DJ</a>
                        </li>
                        <li class="header__menu__item">
                            <a class="header__menu__link text-uppercase" href="#">DENON <span class="white">PRO</span></a>
                        </li>
                        <li class="header__menu__item">
                            <a class="header__menu__link text-uppercase" href="#"><i class="fas fa-bullhorn mr-1"></i> АКЦИИ</a>
                        </li>
                    </ul>
                </nav>
                <div class="mobile-menu d-flex align-items-center ml-auto">
                    <div class="mobile-menu__item__wrapper position-relative d-xl-none">
                        <a class="mobile-menu__item" href="#" id="mobile-phones__link" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-phone-alt"></i>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="mobile-phones__link">
                            <ul class="dropdown-menu__list list-unstyled mb-0">
                                <li class="dropdown-menu__item">
                                    <a class="dropdown-menu__link" href="tel:+7(916)707-57-77"><span class="caption">Магазин</span>+7(916)707-57-77</a>
                                </li>
                                <li class="dropdown-menu__item">
                                    <a class="dropdown-menu__link" href="tel:+7(495)651-25-38"><span class="caption">Сервис</span>+7(495)651-25-38</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <a class="mobile-menu__item d-xl-none" href="mailto:shop.denon@mail.ru">
                        <i class="fas fa-envelope"></i>
                    </a>
                    <div class="cart-block d-flex align-items-center align-self-center js-cart-wrapper">
                        @include('shared.cart.informer')
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- header end-->
</div>


