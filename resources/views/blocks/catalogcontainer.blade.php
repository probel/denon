<div class="catalog__in">
    <div class="container">
        <div class="col-xl-10 mx-auto px-0 px-lg-3">
            <div class="row">
                
                @foreach($catalog as $key => $item)
                    <div class="col-xl-3 col-lg-4 col-md-6 mb-4">
                        <div class="catalog__item d-flex flex-column justify-content-between h-100 js-catalog__item">
                            <div>
                                <div class="catalog__item__top d-flex align-items-baseline position-relative">
                                    @if ($item['sale']  == 1)
                                        <div class="sale text-uppercase">
                                            <img class="mr-2 pb-2" src="/images/icons/sale.png" alt="">Sale
                                        </div>
                                    @endif
                                    @if ($item['stock']  == 1)
                                        <div class="in-stock text-uppercase ml-auto">в наличии</div>
                                    @else
                                        <div class="in-stock text-uppercase ml-auto">нет в наличии</div>
                                    @endif
                                    
                                    @if ($item['new']  == 1)
                                        <div class="sticker position-absolute text-uppercase">new</div>
                                    @endif    
                                </div>
                                <div class="photo">
                                    <a class="photo__link h-100 d-flex justify-content-center"
                                       href="{{ $item->getURL() }}" >
                                        <img class="photo__image mw-100 mh-100 align-self-center"
                                             src="{{ asset($item->images[0]) }}"
                                             alt="{{ $item['name']  ?? '' }}">
                                    </a>
                                </div>
                                
                                <div class="vendor-code text-uppercase text-right">{{ $item['article'] ?? '' }}</div>
                                <div class="name text-center"><a href="{{ $item->getURL() }}">{{ $item['name'] ?? ''  }}</a>
                                </div>
                                <div class="catalog__item__description">
                                    {!! $item['description'] ?? '' !!}
                                </div>
                            </div>
                            <div>
                                <div class="price__wrapper text-right">
                                    <div class="expected text-uppercase">поставка ожидается<br>{{  date('d.m.Y', strtotime($item['delivery_expected']))  ?? ''  }}</div>
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
                @endforeach


            </div>
        </div>
    </div>
    <a class="show-all w-100 text-center d-block text-uppercase" href="/catalog/">ПОКАЗАТЬ ВСЮ КАТЕГОРИЮ</a>
</div>
