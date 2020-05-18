<section class="breadcrumb__line position-relative {{ $class ?? '' }}">
    <div class="container h-100">
        <div class="col-xl-10 mx-auto px-0 h-100">
            <div class="breadcrumb__line__in d-flex align-items-center position-relative h-100">
                @isset($breadcrumbs)
                <nav aria-label="breadcrumb" class="breadcrumb__wrapper">
                    <ol class="breadcrumb text-uppercase p-0 m-0">
                        @foreach ($breadcrumbs as $link)
                        <li class="breadcrumb-item @if ($loop->last)active @endif">
                            @if ($link['href'] ?? null)
                            <a href="{{ $link['href'] }}">{{ $link['name'] }}</a>
                            @else
                            {{ $link['name'] }}
                            @endif
                        </li>
                        @endforeach
                    </ol>
                </nav>
                @endisset
                <div class="page-title__small text-uppercase">
                    <strong>{{ $title ?? '' }}</strong>
                </div>
            </div>
        </div>
    </div>
</section>



