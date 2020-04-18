@props(['icon' => '', 'title' => '', 'subtitle' => ''])
@if ($title)
<div class="section-title d-flex">
    @if ($icon)
    <div class="section-title__icon flex-shrink-0 d-flex align-items-center">
        <img src="{{ asset($icon) }}" alt="{{ $title }}">
    </div>
    @endif
    <div class="section-title__content d-flex flex-column justify-content-between">
        <h2 class="section-title__title text-uppercase">{!! $title !!}</h2>
        @if ($subtitle)
        <div class="section-title__subtitle text-justify">
            {!! $subtitle !!}
        </div>
        @endif
    </div>
</div>
@endif
