@extends('layouts.app')

@section('title', 'VODIC - Trang chủ')

@section('content')
<!-- Hero Section -->
<section class="hero" style="background-image: url('{{ asset('images/hero-background.jpg') }}')">
    <div class="hero-overlay"></div>
    <div class="hero-content">
        <h1 class="hero-title">
            <a href="#">Trung tâm Dữ liệu và Thông tin Đại dương Việt Nam</a>
        </h1>
    </div>
</section>

<!-- Explore Section -->
<section class="explore-section">
    <div class="explore-header">
        <h2>Khám phá VODIC</h2>
    </div>
    <div class="explore-grid">
        <a href="#" class="explore-item">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                ircle cx="12" cy="12" r="10"/>
                <path d="M2 12h20M12 2a15.3 15.3 0 014 10 15.3 15.3 0 01-4 10 15.3 15.3 0 01-4-10 15.3 15.3 0 014-10z"/>
            </svg>
            <span>Dữ liệu biển Việt Nam</span>
        </a>
        
        <a href="#" class="explore-item">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                <path d="M12 2v2M12 20v2M4.93 4.93l1.41 1.41M17.66 17.66l1.41 1.41M2 12h2M20 12h2"/>
                ircle cx="12" cy="12" r="4"/>
            </svg>
            <span>Dự báo thời tiết biển</span>
        </a>
        
        <a href="#" class="explore-item">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                <path d="M2 12c2-4 6-7 10-7s8 3 10 7c-2 4-6 7-10 7s-8-3-10-7z"/>
                ircle cx="12" cy="12" r="3"/>
            </svg>
            <span>Quan trắc môi trường biển</span>
        </a>
    </div>
    <div class="explore-footer">
        <a href="{{ route('news.index') }}" class="more-link">Xem thêm tin tức và tính năng</a>
    </div>
</section>

<!-- News Grid -->
<section class="news-section">
    <div class="container">
        <h2 class="section-title">Tin tức mới nhất</h2>
        
        <div class="news-grid">
            @forelse($featured_posts as $post)
                <article class="news-card">
                    <div class="news-badge">
                        <span class="badge-category">{{ $post->category->name }}</span>
                    </div>
                    
                    @if($post->featured_image)
                        <a href="{{ route('news.show', $post->slug) }}" class="news-image-link">
                            <img src="{{ asset('storage/' . $post->featured_image) }}" 
                                 alt="{{ $post->title }}" 
                                 class="news-image">
                        </a>
                    @else
                        <a href="{{ route('news.show', $post->slug) }}" class="news-image-link">
                            <img src="{{ asset('images/placeholder-ocean.jpg') }}" 
                                 alt="{{ $post->title }}" 
                                 class="news-image">
                        </a>
                    @endif
                    
                    <div class="news-content">
                        <h3 class="news-title">
                            <a href="{{ route('news.show', $post->slug) }}">{{ $post->title }}</a>
                        </h3>
                        
                        @if($post->excerpt)
                            <p class="news-excerpt">{{ Str::limit($post->excerpt, 100) }}</p>
                        @endif
                        
                        <div class="news-meta">
                            <span class="news-date">{{ $post->published_at->format('d/m/Y') }}</span>
                            <span class="news-views">{{ $post->views }} lượt xem</span>
                        </div>
                    </div>
                </article>
            @empty
                <div class="no-posts">
                    <p>Chưa có bài viết nào được xuất bản.</p>
                </div>
            @endforelse
        </div>
        
        <div class="text-center mt-4">
            <a href="{{ route('news.index') }}" class="btn btn-primary">Xem tất cả tin tức</a>
        </div>
    </div>
</section>
@endsection
