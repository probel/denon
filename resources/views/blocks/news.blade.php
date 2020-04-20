@php
    $news = Catalog::getNews();
@endphp
@if ($news->count())
<section class="news">
    <div class="news__title__wrapper icon-center position-relative">
        <h2 class="news__title text-uppercase text-center">ОБЗОРЫ НОВИНОК DENON</h2>
    </div>
    @include('shared.article.teasers',['articles'=> $news])
    <a class="news__show-all w-100 text-center d-block text-uppercase" href="{{ route('news.index') }}">УЗНАТЬ БОЛЬШЕ</a>
</section>
@endif





