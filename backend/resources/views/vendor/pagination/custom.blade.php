@if($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation">
        <ul class="pagination">
            {{-- Previous Page Link --}}
            @if($paginator->onFirstPage())
                <li class="disabled" aria-disabled="true">
                    <span class="px-3 py-2 rounded-lg bg-bg-tertiary text-muted cursor-not-allowed">
                        &laquo;
                    </span>
                </li>
            @else
                <li>
                    <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="px-3 py-2 rounded-lg bg-bg-secondary text-primary hover:bg-accent-color hover:text-white transition-colors">
                        &laquo;
                    </a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if(is_string($element))
                    <li class="disabled" aria-disabled="true">
                        <span class="px-3 py-2 rounded-lg bg-bg-tertiary text-muted">{{ $element }}</span>
                    </li>
                @endif

                {{-- Array Of Links --}}
                @if(is_array($element))
                    @foreach($element as $page => $url)
                        @if($page == $paginator->currentPage())
                            <li class="active" aria-current="page">
                                <span class="px-3 py-2 rounded-lg bg-accent-color text-white">{{ $page }}</span>
                            </li>
                        @else
                            <li>
                                <a href="{{ $url }}" class="px-3 py-2 rounded-lg bg-bg-secondary text-primary hover:bg-accent-color hover:text-white transition-colors">
                                    {{ $page }}
                                </a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if($paginator->hasMorePages())
                <li>
                    <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="px-3 py-2 rounded-lg bg-bg-secondary text-primary hover:bg-accent-color hover:text-white transition-colors">
                        &raquo;
                    </a>
                </li>
            @else
                <li class="disabled" aria-disabled="true">
                    <span class="px-3 py-2 rounded-lg bg-bg-tertiary text-muted cursor-not-allowed">
                        &raquo;
                    </span>
                </li>
            @endif
        </ul>
    </nav>
@endif
