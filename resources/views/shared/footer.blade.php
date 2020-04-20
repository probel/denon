<footer class="footer">
    <div class="footer__top">
        <div class="container">
            <div class="col-1 ml-auto text-center position-relative">
                <a href="#" class="slide-to-top icon-center js-to-top"><span class="arrow"></span></a>
            </div>
        </div>
    </div>
    <div class="footer__middle">
        <div class="container">
            <div class="row">
                <div class="col-xl-10 offset-xl-1">
                    <a href="/" class="logo d-block">
                        <img class="d-block align-self-center lazy" src="{{ asset('/images/icons/logo-footer.png') }}" alt="">
                    </a>
                </div>
            </div>
            <div class="row">
                @foreach (Catalog::getCategories()->whereNull('parent_id')->where('id','<>',18) as $parent)
                <div class="col-xl-2 col-sm-4 {{ $loop->first ? 'offset-xl-1' : '' }}">
                    <h3 class="footer__menu__title">
                        <a href="{{ $parent->getUrl() }}">{{ $parent->title }}</a>
                    </h3>
                    <ul class="footer__menu list-unstyled">
                        @foreach ($parent->childs as $child)
                         <li class="footer__menu__item">
                            <a class="footer__menu__link" href="{{ $child->getUrl() }}">{{ $child->title }}</a>
                        </li>
                        @endforeach
                    </ul>
                </div>
                @endforeach
                <div class="col-xl-4 col-sm-12 d-flex justify-content-between px-0 px-xl-3 flex-wrap">
                    @if ($parent = Catalog::getCategory(18))
                    <div class="col-custom">
                        <h3 class="footer__menu__title">
                            <a href="{{ $parent->getUrl() }}">{{ $parent->title }}</a>
                        </h3>
                        <ul class="footer__menu list-unstyled">
                            @foreach ($parent->childs as $child)
                             <li class="footer__menu__item">
                                <a class="footer__menu__link" href="{{ $child->getUrl() }}">{{ $child->title }}</a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    {{-- здесь только второй и третий столбец пунктов меню с классом text-right --}}
                    <div class="col-custom text-xl-right text-left">
                        <h3 class="footer__menu__title"><a href="{{ route('promo.index') }}">Акции</a></h3>
                        <ul class="footer__menu list-unstyled">
                             <li class="footer__menu__item">
                                <a class="footer__menu__link" href="{{ route('installation.index') }}">Инсталляции</a>
                            </li>
                             <li class="footer__menu__item">
                                <a class="footer__menu__link" href="{{ route('news.index') }}">Новости</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-custom text-xl-right text-left">
                        <h3 class="footer__menu__title"><a href="{{ route('contacts') }}">Контакты</a></h3>
                        <ul class="footer__menu list-unstyled">
                            <li class="footer__menu__item">
                                <a class="footer__menu__link" href="{{ route('warranty') }}">Гарантия и сервис</a>
                            </li>
                             <li class="footer__menu__item">
                                 <a class="footer__menu__link" href="{{ route('delivery') }}">Доставка и оплата</a>
                            </li>
                            <li class="footer__menu__item d-xl-none mt-3">
                                <a class="footer__menu__link" href="/sitemap.xml">Карта сайта</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-10 offset-xl-1 d-flex justify-content-between">
                <div class="copyright">{{ Helpers::config('copyright') }}</div>
                    <a class="footer__menu__link d-none d-xl-flex" href="/sitemap.xml">Карта сайта</a>
                </div>
            </div>
        </div>
    </div>
    <div class="footer__bottom">
        <div class="container text-center">
            Сайт разработан в <a >дизайн-бюро Славы Никитина</a>
        </div>
    </div>
</footer>


