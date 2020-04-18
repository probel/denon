
<section class="news">
    <div class="news__title__wrapper icon-center position-relative">
        <h2 class="news__title text-uppercase text-center">ОБЗОРЫ НОВИНОК DENON</h2>
    </div>
    <div class="row position-relative">
        <div class="col-6">
            <div class="news__item__image" style="background-image: url(../{{ $productNews[0]->images[0] ?? '' }})"></div>
        </div>
        <div class="col-6 position-static">
            <div class="container position-absolute container-absolute h-100">
                <div class="col-xl-10 mx-auto h-100">
                    <div class="col-md-6 offset-6 pr-0 h-100 d-flex">
                        <div class="news__item py-3 my-auto">
                            <div class="news__item__height overflow-hidden">
                                <div class="news__item__date text-right">
                                    {{  date('d.m.Y', strtotime($productNews[0]['created_at'])) }}</div>
                                <h3 class="news__item__title text-uppercase">
                                    <a href="{{ $productNews[0]->getUrl() }}">{{ $productNews[0]['name'] ?? '' }}</a>
                                </h3>
                                <div class="news__item__text text-justify">
                                    {!! $productNews[0]['description'] ?? '' !!}
                                </div>
                            </div>
                            <div class="text-right">
                                <a class="news__item__more text-uppercase " href="{{ $productNews[0]->getUrl() }}">ЧИТАТЬ ДАЛЬШЕ</a>
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
                    <div class="news__item__image" style="background-image: url(../{{ $productNews[1]->images[0] ?? '' }})"></div>
                </div>
                <div class="first news__item row-second__news__item py-3 my-auto">
                    <div class="news__item__height overflow-hidden">
                        <div class="news__item__date text-right">
                            {{  date('d.m.Y', strtotime($productNews[1]['created_at'])) }}</div>
                        <h3 class="news__item__title text-uppercase">
                            <a href="{{ $productNews[1]->getUrl() }}">{{ $productNews[1]['name'] ?? '' }}</a>
                        </h3>
                        <div class="news__item__text text-justify">
                            {!! $productNews[1]['description'] ?? '' !!}
                        </div>
                    </div>
                    <div class="text-right">
                        <a class="news__item__more text-uppercase " href="{{ $productNews[1]->getUrl() }}">ЧИТАТЬ ДАЛЬШЕ</a>
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
                                     style="background-image: url(../{{ $productNews[2]->images[0] ?? '' }})"></div>
                            </div>
                            <div class="news__item row-second__news__item py-3 my-auto">
                                <div class="news__item__height overflow-hidden">
                                    <div class="news__item__date text-right">
                                        {{  date('d.m.Y', strtotime($productNews[2]['created_at'])) }}</div>
                                    <h3 class="news__item__title text-uppercase">
                                        <a href="{{ $productNews[2]->getUrl() }}">{{ $productNews[2]['name'] ?? '' }}</a>
                                    </h3>
                                    <div class="news__item__text text-justify">
                                        {!! $productNews[2]['description'] ?? '' !!} 
                                    </div>
                                </div>
                                <div class="text-right">
                                    <a class="news__item__more text-uppercase " href="{{ $productNews[2]->getUrl() }}">ЧИТАТЬ ДАЛЬШЕ</a>
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

    

    

 
