<div class="navbar navbar-expand-xl p-0 d-block">
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
                        <li class="header-top__menu__item">
                            <a class="header-top__menu__link text-uppercase" href="{{ Helpers::gpu(11) }}">ИНСТАЛЛЯЦИЯ</a>
                        </li>
                        <li class="header-top__menu__item">
                            <a class="header-top__menu__link text-uppercase" href="{{ route('news.index') }}">НОВОСТИ</a>
                        </li>
                        <li class="header-top__menu__item">
                            <a class="header-top__menu__link text-uppercase" href="{{ route('warranty') }}">ГАРАНТИЯ И СЕРВИС</a>
                        </li>
                        <li class="header-top__menu__item">
                            <a class="header-top__menu__link text-uppercase" href="{{ route('delivery') }}">ДОСТАВКА И ОПЛАТА</a>
                        </li>
                        <li class="header-top__menu__item">
                            <a class="header-top__menu__link text-uppercase" href="{{ route('contacts') }}">
                                <i class="fas fa-map-marker-alt mr-1"></i>КОНТАКТЫ
                            </a>
                        </li>
                    </ul>
                    <div class="header-top__contacts">
                        <p>{!! Helpers::config('phone_shop') !!}</p>
                        <p>{!! Helpers::config('phone_service') !!}</p>
                    </div>
                    <div class="header-top__contacts">
                        <p class="hide-lg-text"><i class="far fa-clock mr-1"></i>{!! Helpers::config('schedule') !!}</p>
                        <p>
                            <a class="color-broun" href="mailto:{!! Helpers::config('email') !!}">
                                <i class="fas fa-envelope mr-1"></i><span class="hide-lg-text">{{ \Route::currentRouteName() == 'front' ? Helpers::config('email') : 'Напишите нам' }}</span>
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <header class="header">
        <div class="container">
            <div class="d-flex w-100 flex-column flex-xl-row align-items-center">
                <nav class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="header-top__menu list-unstyled mb-0 mr-0 d-xl-none">
                        <li class="header-top__menu__item">
                            <a class="header-top__menu__link text-uppercase" href="{{ Helpers::gpu(11) }}">ИНСТАЛЛЯЦИЯ</a>
                        </li>
                        <li class="header-top__menu__item">
                            <a class="header-top__menu__link text-uppercase" href="{{ route('news.index') }}">НОВОСТИ</a>
                        </li>
                        <li class="header-top__menu__item">
                            <a class="header-top__menu__link text-uppercase" href="{{ route('warranty') }}">ГАРАНТИЯ И СЕРВИС</a>
                        </li>
                        <li class="header-top__menu__item">
                            <a class="header-top__menu__link text-uppercase" href="{{ route('delivery') }}">ДОСТАВКА И ОПЛАТА</a>
                        </li>
                        <li class="header-top__menu__item">
                            <a class="header-top__menu__link text-uppercase" href="{{ route('contacts') }}">
                                <i class="fas fa-map-marker-alt mr-1"></i>КОНТАКТЫ
                            </a>
                        </li>
                    </ul>
                    <ul class="header__menu list-unstyled d-flex align-items-center flex-column flex-xl-row mb-0 ml-auto">
                        @foreach (\Catalog::getCategories()->whereNull('parent_id') as $parent)
                        <li class="header__menu__item position-relative">
                            <a class="header__menu__link text-uppercase {{ Request::is($parent->getPath().'*') ? 'current' : '' }}"
                                href="{{ $parent->getUrl() }}"
                                @if ($parent->childs_count)
                                    id="header__menu__link-{{ $parent->id }}"
                                    data-toggle="dropdown"
                                    aria-haspopup="true"
                                    aria-expanded="false"
                                @endif>
                                {!! $parent->getTitle() !!}
                            </a>
                            @if ($parent->childs_count)
                            <div class="dropdown-menu" aria-labelledby="header__menu__link-{{ $parent->id }}">
                                <ul class="dropdown-menu__list list-unstyled">
                                    @foreach ($parent->childs->where('status',1)->sortBy('order') as $child)
                                    <li class="dropdown-menu__item">
                                        <a class="dropdown-menu__link text-uppercase {{ Request::is($child->getPath().'*') ? 'current' : '' }}" href="{{ $child->getUrl() }}">{{ $child->title }}</a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                        </li>
                        @endforeach
                        {{-- @if ($cat = \Catalog::getCategory(21))
                        <li class="header__menu__item">
                            <a class="header__menu__link text-uppercase {{ Request::is($cat->getPath().'*') ? 'current' : '' }}" href="{{ $cat->getUrl() }}">{!! $cat->getTitle() !!}</a>
                        </li>
                        @endif
                        @if ($cat = \Catalog::getCategory(20))
                        <li class="header__menu__item">
                            <a class="header__menu__link text-uppercase {{ Request::is($cat->getPath().'*') ? 'current' : '' }}" href="{{ $cat->getUrl() }}">{!! $cat->getTitle() !!}</a>
                        </li>
                        @endif --}}
                        <li class="header__menu__item">
                            <a class="header__menu__link text-uppercase {{ Request::is('promo*') ? 'current' : '' }}" href="{{ route('promo.index') }}"><i class="fas fa-bullhorn mr-1"></i> АКЦИИ</a>
                        </li>
                        <li class="header__menu__item search position-relative">
                            <form action="{{ route('search') }}" method="GET">
                                <input class="form-control" type="text" name="find" value="{{ request()->find }}" placeholder="Поиск...">
                            </form>
                            <span class="icon position-absolute"><i class="fas fa-search"></i></span>
                        </li>
                    </ul>
                </nav>
                <div class="mobile-menu d-flex align-items-center ml-auto">
                    <div class="mobile-menu__item__wrapper position-relative d-xl-none order-2">
                        <a class="mobile-menu__item" href="#" id="mobile-phones__link" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-phone-alt"></i>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="mobile-phones__link">
                            <ul class="dropdown-menu__list list-unstyled mb-0">
                                <li class="dropdown-menu__item">
                                    <a class="dropdown-menu__link" href="tel:{!! Helpers::config('phone_shop') !!}"><span class="caption">Магазин</span>{!! Helpers::config('phone_shop') !!}</a>
                                </li>
                                <li class="dropdown-menu__item">
                                    <a class="dropdown-menu__link" href="tel:{!! Helpers::config('phone_service') !!}"><span class="caption">Сервис</span>{!! Helpers::config('phone_service') !!}</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <a class="mobile-menu__item d-xl-none order-3" href="mailto:shop.denon@mail.ru">
                        <i class="fas fa-envelope"></i>
                    </a>
                    @if (Helpers::config('whatsapp_link'))
                    <a target="_blank" class="mobile-menu__item whatsapp-icon order-1" href="{!! Helpers::config('whatsapp_link') !!}">@svg('images/svg/whatsapp.svg')</a>
                    @endif
                    <div class="cart-block d-flex align-items-center align-self-center order-4 js-cart-informer">
                        @include('shared.cart.informer')
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- header end-->
</div>


