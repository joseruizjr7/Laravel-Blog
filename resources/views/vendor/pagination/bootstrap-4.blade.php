@if ($paginator->hasPages())
    <nav>
        <div class="pagination">
            <ul class="list-unstyled container-flex space-center">
                {{-- Previous Page Link --}}
                @if ($paginator->onFirstPage())
                    <li style="display: none;" class="" aria-disabled="true" aria-label="@lang('pagination.previous')">
                        <a class="" aria-hidden="true">&lsaquo;</a>
                    </li>
                @else
                    <li class="">
                        <a class="" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">Anterior</a>
                    </li>
                @endif

                {{-- Pagination Elements --}}
                @foreach ($elements as $element)
                    {{-- "Three Dots" Separator --}}
                    @if (is_string($element))
                        <li class="" aria-disabled="true"><a class="">{{ $element }}</a></li>
                    @endif

                    {{-- Array Of Links --}}
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <li class="" aria-current="page"><a class="pagination-active">{{ $page }}</a></li>
                            @else
                                <li class=""><a class="" href="{{ $url }}">{{ $page }}</a></li>
                            @endif
                        @endforeach
                    @endif
                @endforeach

                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                    <li class="page-item">
                        <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">Siguiente{{-- &rsaquo; --}}</a>
                    </li>
                @else
                    <li style="display: none;" class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                        <a class="page-link" aria-hidden="true">&rsaquo;</a>
                    </li>
                @endif
            </ul>
        </div>
    </nav>
@endif
