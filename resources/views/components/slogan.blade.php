@props(['title' => ''])
@if ($title ?? null)
<section class="slogan">
    <div class="container">
        <h2 class="slogan__title text-uppercase text-center">{!! $title !!}</h2>
        <div class="slogan__text text-uppercase text-center mx-auto">{!! $slot !!}</div>
    </div>
</section>
@endif
