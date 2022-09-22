@if ($paginator->hasPages())
        <ul class="p-bread__list">
            {{-- Previous Page Link --}}
            @if (!$paginator->onFirstPage())
                <li class="bread__list__item">
                    <a href="{{ $paginator->previousPageUrl() }}" class="p-bread__list__item__button" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a>
                </li>
            @endif
            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="p-bread__list__item disabled" aria-disabled="true"><a class="p-bread__list__item__button p-bread__list__item__static disabled">{{ $element }}</a></li>
                @endif
                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="p-bread__list__item" aria-current="page"><a class="p-bread__list__item__button p-bread__list__item__button--current p-bread__list__item__static">{{ $page }}</a></li>
                        @else
                            <li class="p-bread__list__item"><a href="{{ $url }}" class="p-bread__list__item__button">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach
            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="p-bread__list__item">
                    <a href="{{ $paginator->nextPageUrl() }}" class="p-bread__list__item__button" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>
                </li>
            @else
                <li class="p-bread__list__item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <a class="p-bread__list__item__button p-bread__list__item__static" aria-hidden="true">&rsaquo;</a>
                </li>
            @endif
        </ul>
@endif
