@props(['bgImage' => ''])
<section class="page-title d-flex align-items-center"
        @if ($bgImage) style="background-image: url({{ asset($bgImage) }})" @endif>
    <div class="container">
        <div class="col-xl-10 mx-auto px-0">
            <h1 class="page-title__title text-uppercase mb-0"><strong>{!! $slot !!}</strong></h1>
        </div>
    </div>
</section>
