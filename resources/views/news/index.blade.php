@extends('layouts.app')

@section('title', 'Tin tức - VODIC')

@section('content')
<!-- Page Header -->
<div style="background: linear-gradient(135deg, var(--ocean-dark), var(--ocean-blue)); padding: 3rem 1.5rem; color: white;">
    <div class="container" style="max-width: 1400px; margin: 0 auto;">
        <!-- Breadcrumb -->
        <nav class="breadcrumb" style="color: rgba(255,255,255,0.8); margin-bottom: 1.5rem;">
            <a href="{{ route('home') }}" style="color: rgba(255,255,255,0.9);">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="display: inline-block; vertical-align: middle;">
                    <path d="M3 9l9-7 9 7v11a2 2 0 01-2 2H5a2 2 0 01-2-2z"/>
                </svg>
                Trang chủ
            </a>
            <span style="margin: 0 0.5rem;">/</span>
            <span style="color: white;">Tin tức</span>
        </nav>
        
        <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 1rem;">
            <div>
                <h1 style="font-size: 2.5rem; font-weight: 800; margin-bottom: 0.5rem; color: white;">Tin tức</h1>
                <p style="font-size: 1.125rem; opacity: 0.9;">Cập nhật thông tin mới nhất từ VODIC</p>
            </div>
            
            <!-- Search Box -->
            <div style="display: flex; background: white; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 12px rgba(0,0,0,0.15);">
                <form action="{{ route('news.index') }}" method="GET" style="display: flex;">
                    <input type="text" 
                           name="search" 
                           placeholder="Tìm kiếm tin tức..." 
                           value="{{ request('search') }}"
                           style="border: none; padding: 0.75rem 1.25rem; font-size: 0.9375rem; width: 280px; outline: none;">
                    <button type="submit" style="background: var(--ocean-blue); border: none; padding: 0.75rem 1.5rem; color: white; cursor: pointer; font-weight: 600; transition: background 0.25s;">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="11" cy="11" r="8"/>
                            <path d="M21 21l-4.35-4.35"/>
                        </svg>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="container" style="max-width: 1400px; margin: 0 auto; padding: 2rem 1.5rem;">
    <!-- Filter Section -->
    <div style="background: white; padding: 1.5rem; border-radius: 12px; margin-bottom: 2rem; box-shadow: 0 1px 3px rgba(0,0,0,0.1);">
        <div style="display: flex; align-items: center; gap: 1rem; flex-wrap: wrap;">
            <div style="display: flex; align-items: center; gap: 0.5rem; color: var(--gray-700); font-weight: 600;">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"/>
                </svg>
                Lọc theo danh mục:
            </div>
            
            <div style="display: flex; gap: 0.75rem; flex-wrap: wrap; flex: 1;">
                <a href="{{ route('news.index') }}" 
                   class="badge {{ !request('category') ? 'badge-primary' : '' }}"
                   style="padding: 0.5rem 1rem; border-radius: 20px; font-size: 0.875rem; font-weight: 600; transition: all 0.25s; 
                          {{ !request('category') ? 'background: var(--ocean-blue); color: white;' : 'background: var(--gray-200); color: var(--gray-700);' }}">
                    Tất cả
                </a>
                
                @foreach($categories as $cat)
                    <a href="{{ route('news.index', ['category' => $cat->slug]) }}" 
                       class="badge {{ request('category') == $cat->slug ? 'badge-primary' : '' }}"
                       style="padding: 0.5rem 1rem; border-radius: 20px; font-size: 0.875rem; font-weight: 600; transition: all 0.25s;
                              {{ request('category') == $cat->slug ? 'background: var(--ocean-blue); color: white;' : 'background: var(--gray-200); color: var(--gray-700);' }}">
                        {{ $cat->name }}
                        <span style="opacity: 0.8;">({{ $cat->posts_count ?? 0 }})</span>
                    </a>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Posts Grid -->
    <div class="news-grid" style="margin-bottom: 3rem;">
        @forelse($posts as $post)
            <article class="news-card">
                <div class="news-badge">
                    <span class="badge-category">{{ $post->category->name }}</span>
                </div>
                
                @if($post->images->first())
                    <a href="{{ route('news.show', $post->slug) }}" class="news-image-link">
                        <img src="{{ asset('storage/' . $post->images->first()->image_path) }}" 
                             alt="{{ $post->title }}"
                             class="news-image"
                             loading="lazy">
                    </a>
                @else
                    <a href="{{ route('news.show', $post->slug) }}" class="news-image-link">
                        <div style="width: 100%; height: 220px; background: linear-gradient(135deg, var(--ocean-blue), var(--ocean-light)); display: flex; align-items: center; justify-content: center;">
                            <svg width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="1.5">
                                <rect x="3" y="3" width="18" height="18" rx="2" ry="2"/>
                                <circle cx="8.5" cy="8.5" r="1.5"/>
                                <polyline points="21 15 16 10 5 21"/>
                            </svg>
                        </div>
                    </a>
                @endif
                
                <div class="news-content">
                    <h2 class="news-title">
                        <a href="{{ route('news.show', $post->slug) }}">{{ $post->title }}</a>
                    </h2>
                    
                    @if($post->excerpt)
                        <p class="news-excerpt">{{ Str::limit($post->excerpt, 120) }}</p>
                    @endif
                    
                    <div class="news-meta">
                        <span class="news-date">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <rect x="3" y="4" width="18" height="18" rx="2" ry="2"/>
                                <line x1="16" y1="2" x2="16" y2="6"/>
                                <line x1="8" y1="2" x2="8" y2="6"/>
                                <line x1="3" y1="10" x2="21" y2="10"/>
                            </svg>
                            {{ $post->published_at->format('d/m/Y') }}
                        </span>
                        <span class="news-views">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/>
                                <circle cx="12" cy="12" r="3"/>
                            </svg>
                            {{ number_format($post->views) }}
                        </span>
                    </div>
                </div>
            </article>
        @empty
            <div style="grid-column: 1/-1; text-align: center; padding: 5rem 2rem; background: white; border-radius: 12px;">
                <svg width="80" height="80" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" style="margin: 0 auto 1.5rem; color: var(--gray-300);">
                    <path d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9.5a2 2 0 00-2-2h-2"/>
                </svg>
                <h3 style="font-size: 1.5rem; font-weight: 700; color: var(--gray-900); margin-bottom: 0.5rem;">
                    @if(request('search'))
                        Không tìm thấy kết quả
                    @elseif(request('category'))
                        Danh mục này chưa có bài viết
                    @else
                        Chưa có bài viết nào
                    @endif
                </h3>
                <p style="color: var(--gray-600); margin-bottom: 1.5rem;">
                    @if(request('search'))
                        Không tìm thấy bài viết nào với từ khóa "{{ request('search') }}"
                    @else
                        Vui lòng quay lại sau hoặc xem các danh mục khác
                    @endif
                </p>
                
                @if(request('search') || request('category'))
                    <a href="{{ route('news.index') }}" class="btn btn-primary">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M3 9l9-7 9 7v11a2 2 0 01-2 2H5a2 2 0 01-2-2z"/>
                        </svg>
                        Xem tất cả tin tức
                    </a>
                @endif
            </div>
        @endforelse
    </div>

    <!-- Pagination -->
    @if($posts->hasPages())
        <div class="pagination">
            {{-- Previous Page Link --}}
            @if ($posts->onFirstPage())
                <span class="disabled">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <polyline points="15 18 9 12 15 6"/>
                    </svg>
                </span>
            @else
                <a href="{{ $posts->previousPageUrl() }}">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <polyline points="15 18 9 12 15 6"/>
                    </svg>
                </a>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($posts->links()->elements[0] as $page => $url)
                @if ($page == $posts->currentPage())
                    <span class="active">{{ $page }}</span>
                @else
                    <a href="{{ $url }}">{{ $page }}</a>
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($posts->hasMorePages())
                <a href="{{ $posts->nextPageUrl() }}">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <polyline points="9 18 15 12 9 6"/>
                    </svg>
                </a>
            @else
                <span class="disabled">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <polyline points="9 18 15 12 9 6"/>
                    </svg>
                </span>
            @endif
        </div>
    @endif
</div>
@endsection

<style>
.badge:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
}
</style>