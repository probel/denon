@isset($breadcrumbs)
<nav aria-label="breadcrumb">
    <ol class="breadcrumb d-none d-sm-flex">
        @foreach ($breadcrumbs as $link)
        <li class="breadcrumb-item @if ($loop->last)active @endif">
            @if ($loop->first)
                <a href="{{  $link['href'] }}">@svg('images/svg/house.svg')</a>
            @elseif ($loop->last)
                {{  $link['name'] }}
            @else
            <a href="{{  $link['href'] }}">{{  $link['name'] }}</a>

            @endif
        </li>
        @endforeach
    </ol>
</nav>
@endisset


