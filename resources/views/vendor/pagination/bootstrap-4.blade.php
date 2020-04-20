
@if ($paginator->hasPages())
<nav aria-label="Page navigation example">
    <ul class="pagination">
        <li class="page-item ">
            @if ($paginator->onFirstPage())
                <a class="page-link" aria-label="Previous">
                    <span aria-hidden="true"><</span>
                </a>
            @else
                <a class="page-link" href="{{ $paginator->previousPageUrl() }}" aria-label="Previous">
                    <span aria-hidden="true"><</span>
                </a>
            @endif
        </li>
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="page-item"><a class="page-link">{{ $element }}</a></li>
            @endif
            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    <li class="page-item {{ $page == $paginator->currentPage() ? 'active' : ''}}">
                        <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                    </li>
                @endforeach
            @endif
        @endforeach
        @if ($paginator->hasMorePages())
        <li class="page-item">
            <a class="page-link" href="{{ $paginator->nextPageUrl() }}" aria-label="Next">
                <span aria-hidden="true">></span>
            </a>
        </li>
        @else
            <li class="page-item">
                <a class="page-link" aria-label="Next">
                    <span aria-hidden="true">></span>
                </a>
            </li>
        @endif
    </ul>
</nav>
@endif
