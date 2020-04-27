<section class="news">
    @foreach ($product->related() as $article)
    <div class="row position-relative">
        <div class="col-md-6 {{ $loop->odd ? 'order-md-1 pr-0' : 'order-md-2 pl-0' }} p-0">
            <div class="news__item__image" style="background-image: url({{ asset($article->image) }})"></div>
        </div>
        <div class="col-md-6 d-flex {{ $loop->odd ? 'order-md-2' : 'order-md-1' }} p-0">
            <div class="news__item py-3 my-auto {{ $loop->odd ? '' : 'pr-md-4' }} ">
                <div class="news__item__height overflow-hidden">
                    <div class="news__item__date text-right">
                        {{ $article->created_at->format('d.m.Y') }}
                    </div>
                    <h3 class="news__item__title text-uppercase">
                        <a href="{{ $article->getUrl() }}">{{ $article->title }}</a>
                    </h3>
                    <div class="news__item__text text-justify">
                        {!! $article->description !!}
                    </div>
                </div>
                <div class="text-right">
                    <a class="news__item__more text-uppercase " href="{{ $article->getUrl() }}">ЧИТАТЬ ДАЛЬШЕ</a>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</section>
