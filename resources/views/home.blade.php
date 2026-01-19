@extends('layouts.app')

@section('title', 'VODIC - Trang chủ')

@section('content')
<!-- Hero Slider -->
<section class="hero" style="background-image: linear-gradient(rgba(0, 61, 130, 0.4), rgba(0, 102, 204, 0.5)), url('{{ asset('images/ocean-banner.jpg') }}');">
    <div class="hero-overlay"></div>
    <div class="hero-content">
        <h1 class="hero-title" style="animation: fadeInUp 0.8s ease;">
            <a href="#" style="display: inline-flex; align-items: center; gap: 0.75rem;">
                <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="flex-shrink: 0;">
                    <path d="M21 16V8a2 2 0 00-1-1.73l-7-4a2 2 0 00-2 0l-7 4A2 2 0 003 8v8a2 2 0 001 1.73l7 4a2 2 0 002 0l7-4A2 2 0 0021 16z"/>
                    <polyline points="3.27 6.96 12 12.01 20.73 6.96"/>
                    <line x1="12" y1="22.08" x2="12" y2="12"/>
                </svg>
                Nền tảng Dữ liệu Biển Quốc gia
            </a>
        </h1>
        <p class="hero-subtitle" style="animation: fadeInUp 0.8s ease 0.2s both; max-width: 700px; font-size: 1.125rem; margin-bottom: 2rem; color: white;">
            Cung cấp dữ liệu, thông tin chính xác và kịp thời về biển, đại dương Việt Nam, phục vụ nghiên cứu khoa học và phát triển bền vững
        </p>
        <div style="display: flex; gap: 1rem; flex-wrap: wrap; animation: fadeInUp 0.8s ease 0.4s both;">
            <a href="{{ route('news.index') }}" class="btn btn-primary" style="background: var(--gov-gold); color: var(--gray-900);">
                Khám phá dữ liệu
            </a>
            <a href="{{ route('about') }}" class="btn" style="background: rgba(255,255,255,0.15); color: white; border: 2px solid rgba(255,255,255,0.3); backdrop-filter: blur(10px);">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <circle cx="12" cy="12" r="10"/>
                    <path d="M12 16v-4M12 8h.01"/>
                </svg>
                Tìm hiểu thêm
            </a>
        </div>
    </div>
</section>

<!-- Quick Access Section -->
<section class="explore-section">
    <div class="explore-header">
        <h2>Dịch vụ nổi bật</h2>
    </div>
    <div class="explore-grid">
        <a href="https://bienvietnam.gov.vn/vi" class="explore-item" target="_blank" >
            <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" style="color: var(--white);">
                <path d="M3 15v4c0 1.1.9 2 2 2h14a2 2 0 002-2v-4M7 10l5 5 5-5M12 3v12"/>
            </svg>
            <span>Dữ liệu biển Việt Nam</span>
        </a>
        
        <a href="https://nchmf.gov.vn/kttv/" class="explore-item" target="_blank">
            <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" style="color: var(--white);">
                <path d="M12 2v2M12 20v2M4.93 4.93l1.41 1.41M17.66 17.66l1.41 1.41M2 12h2M20 12h2M6.34 17.66l-1.41 1.41M19.07 4.93l-1.41 1.41"/>
                <circle cx="12" cy="12" r="5"/>
            </svg>
            <span>Dự báo thời tiết biển</span>
        </a>
        
        <a href="https://nodc.gov.vn/" class="explore-item" target="_blank">
            <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" style="color: var(--white);">
                <circle cx="12" cy="12" r="10"/>
                <path d="M12 2a15.3 15.3 0 014 10 15.3 15.3 0 01-4 10 15.3 15.3 0 01-4-10 15.3 15.3 0 014-10z"/>
                <path d="M2 12h20"/>
            </svg>
            <span>Bản đồ biển</span>
        </a>
        
        <a href="https://thuvien.vodic.vn/" class="explore-item" target="_blank">
            <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" style="color: var(--white);">
                <path d="M4 19.5A2.5 2.5 0 016.5 17H20"/>
                <path d="M6.5 2H20v20H6.5A2.5 2.5 0 014 19.5v-15A2.5 2.5 0 016.5 2z"/>
            </svg>
            <span>Thư viện số</span>
        </a>
    </div>
    <div class="explore-footer">
        <a href="{{ route('news.index') }}" class="more-link">Xem tất cả dịch vụ</a>
    </div>
</section>

<!-- News Section -->
<section class="news-section">
    <div class="container">
        <h2 class="section-title">Tin tức mới nhất</h2>
        
        @if(session('error'))
            <div class="alert alert-error" style="margin-bottom: 2rem;">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <circle cx="12" cy="12" r="10"/>
                    <line x1="12" y1="8" x2="12" y2="12"/>
                    <line x1="12" y1="16" x2="12.01" y2="16"/>
                </svg>
                {{ session('error') }}
            </div>
        @endif
        
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
                                 class="news-image"
                                 loading="lazy">
                        </a>
                    @else
                        <a href="{{ route('news.show', $post->slug) }}" class="news-image-link">
                            <img src="{{ asset('images/placeholder-ocean.jpg') }}" 
                                 alt="{{ $post->title }}" 
                                 class="news-image"
                                 loading="lazy"
                                 onerror="this.src='https://images.unsplash.com/photo-1505142468610-359e7d316be0?w=400&h=300&fit=crop'">
                        </a>
                    @endif
                    
                    <div class="news-content">
                        <h3 class="news-title">
                            <a href="{{ route('news.show', $post->slug) }}">{{ $post->title }}</a>
                        </h3>
                        
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
                <div class="no-posts" style="grid-column: 1/-1; text-align: center; padding: 4rem 2rem;">
                    <svg width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" style="margin: 0 auto 1rem; color: var(--gray-400);">
                        <path d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                    <p style="color: var(--gray-600); font-size: 1.125rem; margin-bottom: 1rem;">Chưa có bài viết nào được xuất bản.</p>
                    @auth
                        @if(auth()->user()->isAdmin())
                            <a href="{{ route('admin.posts.create') }}" class="btn btn-primary">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <line x1="12" y1="5" x2="12" y2="19"/>
                                    <line x1="5" y1="12" x2="19" y2="12"/>
                                </svg>
                                Tạo bài viết đầu tiên
                            </a>
                        @endif
                    @endauth
                </div>
            @endforelse
        </div>
        
        @if($featured_posts->count() > 0)
            <div style="text-align: center; margin-top: 3rem;">
                <a href="{{ route('news.index') }}" class="btn btn-primary">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1"/>
                    </svg>
                    Xem tất cả tin tức
                </a>
            </div>
        @endif
    </div>
</section>

<!-- Statistics Section -->
<section style="background: linear-gradient(135deg, var(--ocean-blue), var(--ocean-dark)); padding: 4rem 1.5rem; color: white;">
    <div class="container" style="max-width: 1400px; margin: 0 auto;">
        <h2 style="text-align: center; font-size: 2rem; font-weight: 700; margin-bottom: 3rem; color: white;">VODIC trong số liệu</h2>
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 2rem;">
            <div style="text-align: center; padding: 2rem; background: rgba(255,255,255,0.1); border-radius: 12px; backdrop-filter: blur(10px);">
                <div style="font-size: 3rem; font-weight: 800; margin-bottom: 0.5rem; color: var(--gov-gold);">15+</div>
                <div style="font-size: 1.125rem; opacity: 0.9;">Năm hoạt động</div>
            </div>
            <div style="text-align: center; padding: 2rem; background: rgba(255,255,255,0.1); border-radius: 12px; backdrop-filter: blur(10px);">
                <div style="font-size: 3rem; font-weight: 800; margin-bottom: 0.5rem; color: var(--gov-gold);">1000+</div>
                <div style="font-size: 1.125rem; opacity: 0.9;">Bộ dữ liệu</div>
            </div>
            <div style="text-align: center; padding: 2rem; background: rgba(255,255,255,0.1); border-radius: 12px; backdrop-filter: blur(10px);">
                <div style="font-size: 3rem; font-weight: 800; margin-bottom: 0.5rem; color: var(--gov-gold);">50+</div>
                <div style="font-size: 1.125rem; opacity: 0.9;">Đối tác</div>
            </div>
            <div style="text-align: center; padding: 2rem; background: rgba(255,255,255,0.1); border-radius: 12px; backdrop-filter: blur(10px);">
                <div style="font-size: 3rem; font-weight: 800; margin-bottom: 0.5rem; color: var(--gov-gold);">100+</div>
                <div style="font-size: 1.125rem; opacity: 0.9;">Dự án nghiên cứu</div>
            </div>
        </div>
    </div>
</section>
@endsection

<style>
@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}
</style>