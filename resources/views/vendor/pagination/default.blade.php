@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation" class="admin-pagination">
        <div class="admin-pagination-container">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <span class="admin-pagination-btn disabled">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <polyline points="15 18 9 12 15 6"/>
                    </svg>
                    <span class="admin-pagination-text">Trang trước</span>
                </span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="admin-pagination-btn">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <polyline points="15 18 9 12 15 6"/>
                    </svg>
                    <span class="admin-pagination-text">Trang trước</span>
                </a>
            @endif

            {{-- Pagination Elements --}}
            <div class="admin-pagination-numbers">
                @foreach ($elements as $element)
                    {{-- "Three Dots" Separator --}}
                    @if (is_string($element))
                        <span class="admin-pagination-dots">{{ $element }}</span>
                    @endif

                    {{-- Array Of Links --}}
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <span class="admin-pagination-number active" aria-current="page">{{ $page }}</span>
                            @else
                                <a href="{{ $url }}" class="admin-pagination-number">{{ $page }}</a>
                            @endif
                        @endforeach
                    @endif
                @endforeach
            </div>

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="admin-pagination-btn">
                    <span class="admin-pagination-text">Trang sau</span>
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <polyline points="9 18 15 12 9 6"/>
                    </svg>
                </a>
            @else
                <span class="admin-pagination-btn disabled">
                    <span class="admin-pagination-text">Trang sau</span>
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <polyline points="9 18 15 12 9 6"/>
                    </svg>
                </span>
            @endif
        </div>

        {{-- Results Info --}}
        <div class="admin-pagination-info">
            Hiển thị <strong>{{ $paginator->firstItem() }}</strong> đến <strong>{{ $paginator->lastItem() }}</strong> 
            trong tổng số <strong>{{ $paginator->total() }}</strong> kết quả
        </div>
    </nav>
@endif
