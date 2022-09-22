@if ($paginator->hasPages())
    <div class="pagination">
        <ul >
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <a class="" aria-hidden="true">
                      <i class="arr-prev"></i>
                    </a>
                </li>
            @else
                <li class="page-item">
                    <a class="" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">
                      <i class="arr-prev"></i>
                    </a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="page-item disabled" aria-disabled="true">
                      <a class="">{{ $element }}</a></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-item " aria-current="page">
                              <a class="active  ">{{ $page }}</a>
                            </li>
                        @else
                            <li class="page-item">
                              <a class="" href="{{ $url }}">{{ $page }}
                                </a>
                              </li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li >
                    <a class="" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">
                      <i class="arr-next"></i>
                    </a>
                </li>
            @else
                <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <a class="" aria-hidden="true">
                      <i class="arr-next"></i>
                    </a>
                </li>
            @endif
        </ul>
    </div>
@endif
