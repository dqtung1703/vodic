@extends('layouts.app')

@section('title', $post->title . ' - VODIC')

@push('styles')
<style>
/* Article Page Styling */
.article-page {
    background: #f5f5f5;
    min-height: 100vh;
}

/* Article Container */
.article-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 2rem 1.5rem;
}

/* Article Layout - Two Column */
.article-layout {
    display: flex;
    gap: 2rem;
    align-items: flex-start;
}

.article-main {
    flex: 1;
    min-width: 0;
}

.article-sidebar {
    width: 320px;
    flex-shrink: 0;
}

/* Breadcrumb */
.article-breadcrumb {
    font-size: 14px;
    color: #666;
    margin-bottom: 1.5rem;
}

.article-breadcrumb a {
    color: #0066cc;
    text-decoration: none;
}

.article-breadcrumb a:hover {
    text-decoration: underline;
}

.article-breadcrumb span {
    margin: 0 0.5rem;
    color: #999;
}

/* Category Badge */
.article-category {
    display: inline-block;
    background: #0066cc;
    color: white;
    padding: 0.4rem 1rem;
    border-radius: 4px;
    font-size: 13px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    margin-bottom: 1rem;
}

/* Title */
.article-title {
    font-size: 2.25rem;
    font-weight: 700;
    line-height: 1.3;
    color: #1a1a1a;
    margin: 0 0 1.5rem 0;
}

/* Meta Info */
.article-meta {
    display: flex;
    flex-wrap: wrap;
    gap: 1.5rem;
    font-size: 14px;
    color: #666;
    margin-bottom: 2rem;
    padding-bottom: 1.5rem;
    border-bottom: 1px solid #e0e0e0;
}

.meta-item {
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.meta-item svg {
    color: #999;
}

/* Main Content Card */
.article-content-card {
    background: white;
    border-radius: 8px;
    padding: 2.5rem;
    box-shadow: 0 2px 8px rgba(0,0,0,0.08);
    margin-bottom: 2rem;
}

/* Excerpt */
.article-excerpt {
    font-size: 1.125rem;
    font-weight: 600;
    line-height: 1.7;
    color: #333;
    margin-bottom: 2rem;
    padding: 1.25rem;
    background: #f8f9fa;
    border-left: 4px solid #0066cc;
    border-radius: 4px;
}

/* Featured Image */
.article-featured-image {
    margin: 0 0 2rem 0;
}

.article-featured-image img {
    width: 100%;
    height: auto;
    border-radius: 6px;
    display: block;
}

.article-image-caption {
    margin-top: 0.75rem;
    font-size: 14px;
    color: #666;
    font-style: italic;
    text-align: center;
}

/* Article Content */
.article-content {
    font-size: 17px;
    line-height: 1.8;
    color: #333;
}

.article-content p {
    margin-bottom: 1.5em;
}

.article-content h2 {
    font-size: 1.75rem;
    font-weight: 700;
    margin: 2.5rem 0 1rem;
    color: #1a1a1a;
    line-height: 1.3;
}

.article-content h3 {
    font-size: 1.375rem;
    font-weight: 600;
    margin: 2rem 0 0.75rem;
    color: #1a1a1a;
}

.article-content ul,
.article-content ol {
    margin: 1.5em 0;
    padding-left: 2.5em;
}

.article-content li {
    margin-bottom: 0.75em;
    line-height: 1.8;
}

.article-content blockquote {
    margin: 2rem 0;
    padding: 1.25rem 1.5rem;
    background: #f8f9fa;
    border-left: 4px solid #0066cc;
    border-radius: 4px;
    font-style: italic;
    color: #555;
}

.article-content img {
    max-width: 100%;
    height: auto;
    border-radius: 6px;
    margin: 2rem auto;
    display: block;
}

.article-content a {
    color: #0066cc;
    text-decoration: none;
    border-bottom: 1px solid transparent;
    transition: border-color 0.3s;
}

.article-content a:hover {
    border-bottom-color: #0066cc;
}

.article-content strong {
    font-weight: 700;
    color: #1a1a1a;
}

.article-content code {
    background: #f5f5f5;
    padding: 0.2em 0.5em;
    border-radius: 3px;
    font-family: 'Courier New', monospace;
    font-size: 0.9em;
    color: #e83e8c;
}

/* Additional Images */
.article-gallery {
    margin-top: 2.5rem;
}

.article-gallery h3 {
    font-size: 1.25rem;
    font-weight: 700;
    margin-bottom: 1.25rem;
    color: #1a1a1a;
}

.gallery-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
    gap: 1.25rem;
}

.gallery-item {
    border-radius: 6px;
    overflow: hidden;
}

.gallery-item img {
    width: 100%;
    height: 200px;
    object-fit: cover;
    display: block;
    transition: transform 0.3s;
}

.gallery-item:hover img {
    transform: scale(1.05);
}

/* Tags */
.article-tags {
    margin-top: 2.5rem;
    padding-top: 2rem;
    border-top: 1px solid #e0e0e0;
}

.tags-list {
    display: flex;
    flex-wrap: wrap;
    gap: 0.75rem;
    align-items: center;
}

.tag-item {
    display: inline-block;
    background: #f0f0f0;
    color: #555;
    padding: 0.5rem 1rem;
    border-radius: 20px;
    font-size: 14px;
    text-decoration: none;
    transition: all 0.3s;
}

.tag-item:hover {
    background: #0066cc;
    color: white;
}

/* Article Footer */
.article-footer {
    margin-top: 2.5rem;
    padding-top: 2rem;
    border-top: 1px solid #e0e0e0;
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 1.5rem;
}

.article-updated {
    font-size: 14px;
    color: #666;
}

.article-actions {
    display: flex;
    gap: 1rem;
}

.action-btn {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.625rem 1.25rem;
    border-radius: 4px;
    font-size: 14px;
    font-weight: 500;
    border: none;
    cursor: pointer;
    transition: all 0.3s;
}

.btn-secondary {
    background: #f0f0f0;
    color: #555;
}

.btn-secondary:hover {
    background: #e0e0e0;
}

.btn-primary {
    background: #0066cc;
    color: white;
}

.btn-primary:hover {
    background: #0052a3;
}

/* Author Box */
.author-box {
    margin-top: 2.5rem;
    padding: 1.5rem;
    background: #f8f9fa;
    border-radius: 6px;
    display: flex;
    align-items: center;
    gap: 1.25rem;
}

.author-avatar {
    width: 60px;
    height: 60px;
    border-radius: 50%;
    background: #0066cc;
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 700;
    font-size: 1.5rem;
    flex-shrink: 0;
}

.author-info {
    flex: 1;
}

.author-name {
    font-weight: 600;
    font-size: 16px;
    color: #1a1a1a;
    margin-bottom: 0.25rem;
}

.author-role {
    font-size: 14px;
    color: #666;
}

/* Related Posts */
.related-posts {
    max-width: 1200px;
    margin: 3rem auto 0;
    padding: 0 1.5rem 3rem;
}

.related-title {
    font-size: 1.75rem;
    font-weight: 700;
    color: #1a1a1a;
    margin-bottom: 2rem;
}

.related-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
    gap: 1.5rem;
}

.related-card {
    background: white;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 2px 8px rgba(0,0,0,0.08);
    transition: all 0.3s;
}

.related-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 4px 16px rgba(0,0,0,0.12);
}

.related-image {
    position: relative;
    overflow: hidden;
    height: 180px;
}

.related-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s;
}

.related-card:hover .related-image img {
    transform: scale(1.05);
}

.related-content {
    padding: 1.25rem;
}

.related-meta {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    margin-bottom: 0.75rem;
    font-size: 13px;
    color: #666;
}

.related-category {
    background: #0066cc;
    color: white;
    padding: 0.25rem 0.75rem;
    border-radius: 3px;
    font-weight: 600;
    font-size: 12px;
}

.related-post-title {
    font-size: 1.0625rem;
    font-weight: 600;
    line-height: 1.4;
    margin-bottom: 0.5rem;
}

.related-post-title a {
    color: #1a1a1a;
    text-decoration: none;
    transition: color 0.3s;
}

.related-post-title a:hover {
    color: #0066cc;
}

.related-excerpt {
    font-size: 14px;
    color: #666;
    line-height: 1.6;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

/* Popular Posts Widget */
.popular-posts {
    background: white;
    border-radius: 8px;
    padding: 1.5rem;
    box-shadow: 0 2px 8px rgba(0,0,0,0.08);
    position: sticky;
    top: 2rem;
}

.popular-posts h3 {
    font-size: 1.125rem;
    font-weight: 700;
    margin: 0 0 1.25rem 0;
    color: #1a1a1a;
    padding-bottom: 0.75rem;
    border-bottom: 2px solid #0066cc;
}

.popular-item {
    display: flex;
    gap: 0.75rem;
    margin-bottom: 1rem;
    padding-bottom: 1rem;
    border-bottom: 1px solid #f0f0f0;
}

.popular-item:last-child {
    margin-bottom: 0;
    padding-bottom: 0;
    border-bottom: none;
}

.popular-number {
    width: 28px;
    height: 28px;
    background: linear-gradient(135deg, #0066cc, #0052a3);
    color: white;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 700;
    font-size: 14px;
    flex-shrink: 0;
}

.popular-content {
    flex: 1;
    min-width: 0;
}

.popular-title {
    font-size: 14px;
    font-weight: 600;
    line-height: 1.4;
    margin-bottom: 0.5rem;
}

.popular-title a {
    color: #1a1a1a;
    text-decoration: none;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
    transition: color 0.3s;
}

.popular-title a:hover {
    color: #0066cc;
}

.popular-meta {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    font-size: 12px;
    color: #666;
}

.popular-category {
    background: #f0f0f0;
    color: #555;
    padding: 0.2rem 0.5rem;
    border-radius: 3px;
    font-weight: 500;
}

.popular-views {
    display: flex;
    align-items: center;
    gap: 0.25rem;
}

/* Responsive */
@media (max-width: 968px) {
    .article-layout {
        flex-direction: column;
    }
    
    .article-sidebar {
        width: 100%;
        order: -1;
    }
    
    .popular-posts {
        position: static;
    }
}

@media (max-width: 768px) {
    .article-container {
        padding: 1.5rem 1rem;
    }
    
    .article-title {
        font-size: 1.75rem;
    }
    
    .article-content-card {
        padding: 1.5rem;
    }
    
    .article-content {
        font-size: 16px;
    }
    
    .article-meta {
        font-size: 13px;
    }
    
    .related-grid {
        grid-template-columns: 1fr;
    }
}
</style>
@endpush

@section('content')
<div class="article-page">
    <div class="article-container">
        <!-- Breadcrumb -->
        <nav class="article-breadcrumb">
            <a href="{{ route('home') }}">Trang chủ</a>
            <span>/</span>
            <a href="{{ route('news.index') }}">Tin tức</a>
            <span>/</span>
            <a href="{{ route('categories.show', $post->category->slug) }}">{{ $post->category->name }}</a>
        </nav>

        <!-- Category -->
        <div>
            <span class="article-category">{{ $post->category->name }}</span>
        </div>

        <!-- Title -->
        <h1 class="article-title">{{ $post->title }}</h1>

        <!-- Meta Info -->
        <div class="article-meta">
            <div class="meta-item">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <rect x="3" y="4" width="18" height="18" rx="2" ry="2"/>
                    <line x1="16" y1="2" x2="16" y2="6"/>
                    <line x1="8" y1="2" x2="8" y2="6"/>
                    <line x1="3" y1="10" x2="21" y2="10"/>
                </svg>
                {{ $post->published_at->format('d/m/Y') }}
            </div>
            <div class="meta-item">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/>
                    <circle cx="12" cy="12" r="3"/>
                </svg>
                {{ number_format($post->views) }} lượt xem
            </div>
            @if($post->user)
            <div class="meta-item">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"/>
                    <circle cx="12" cy="7" r="4"/>
                </svg>
                {{ $post->user->name }}
            </div>
            @endif
        </div>

        <!-- Two Column Layout -->
        <div class="article-layout">
            <!-- Main Content -->
            <div class="article-main">
        <article class="article-content-card">
            
            <!-- Excerpt -->
            @if($post->excerpt)
            <div class="article-excerpt">
                {{ $post->excerpt }}
            </div>
            @endif

            <!-- Featured Image -->
            @if($post->images->first())
            <figure class="article-featured-image">
                <img src="{{ asset('storage/' . $post->images->first()->image_path) }}" 
                     alt="{{ $post->title }}">
                @if($post->images->first()->caption)
                <figcaption class="article-image-caption">
                    {{ $post->images->first()->caption }}
                </figcaption>
                @endif
            </figure>
            @endif

            <!-- Content -->
            <div class="article-content">
                {!! $post->content !!}
            </div>

            <!-- Additional Images -->
            @if($post->images->count() > 1)
            <div class="article-gallery">
                <h3>Hình ảnh liên quan</h3>
                <div class="gallery-grid">
                    @foreach($post->images->skip(1) as $image)
                    <div class="gallery-item">
                        <img src="{{ asset('storage/' . $image->image_path) }}" 
                             alt="Image {{ $loop->iteration }}">
                    </div>
                    @endforeach
                </div>
            </div>
            @endif

            <!-- Tags -->
            @if($post->tags && $post->tags->count() > 0)
            <div class="article-tags">
                <div class="tags-list">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="color: #999;">
                        <path d="M20.59 13.41l-7.17 7.17a2 2 0 01-2.83 0L2 12V2h10l8.59 8.59a2 2 0 010 2.82z"/>
                        <line x1="7" y1="7" x2="7.01" y2="7"/>
                    </svg>
                    @foreach($post->tags as $tag)
                    <a href="#" class="tag-item">{{ $tag->name }}</a>
                    @endforeach
                </div>
            </div>
            @endif

            <!-- Footer -->
            <div class="article-footer">
                <div class="article-updated">
                    Cập nhật: {{ $post->updated_at->format('d/m/Y H:i') }}
                </div>
                <div class="article-actions">
                    <button onclick="window.print()" class="action-btn btn-secondary">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <polyline points="6 9 6 2 18 2 18 9"/>
                            <path d="M6 18H4a2 2 0 01-2-2v-5a2 2 0 012-2h16a2 2 0 012 2v5a2 2 0 01-2 2h-2"/>
                            <rect x="6" y="14" width="12" height="8"/>
                        </svg>
                        In bài viết
                    </button>
                    <button onclick="sharePost()" class="action-btn btn-primary">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="18" cy="5" r="3"/>
                            <circle cx="6" cy="12" r="3"/>
                            <circle cx="18" cy="19" r="3"/>
                            <line x1="8.59" y1="13.51" x2="15.42" y2="17.49"/>
                            <line x1="15.41" y1="6.51" x2="8.59" y2="10.49"/>
                        </svg>
                        Chia sẻ
                    </button>
                </div>
            </div>

            <!-- Author Box -->
            @if($post->user)
            <div class="author-box">
                <div class="author-avatar">
                    {{ strtoupper(substr($post->user->name, 0, 1)) }}
                </div>
                <div class="author-info">
                    <div class="author-name">{{ $post->user->name }}</div>
                    <div class="author-role">Tác giả</div>
                </div>
            </div>
            @endif
        </article>
            </div><!-- .article-main -->

            <!-- Sidebar -->
            <aside class="article-sidebar">
                @if($popularPosts && $popularPosts->count() > 0)
                <div class="popular-posts">
                    <h3>Bài viết xem nhiều</h3>
                    @foreach($popularPosts as $index => $popular)
                    <div class="popular-item">
                        <div class="popular-number">{{ $index + 1 }}</div>
                        <div class="popular-content">
                            <div class="popular-title">
                                <a href="{{ route('news.show', $popular->slug) }}">
                                    {{ $popular->title }}
                                </a>
                            </div>
                            <div class="popular-meta">
                                <span class="popular-category">{{ $popular->category->name }}</span>
                                <span class="popular-views">
                                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/>
                                        <circle cx="12" cy="12" r="3"/>
                                    </svg>
                                    {{ number_format($popular->views) }}
                                </span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                @endif
            </aside>
        </div><!-- .article-layout -->
    </div><!-- .article-container -->

    <!-- Related Posts -->
    @if($relatedPosts && $relatedPosts->count() > 0)
    <div class="related-posts">
        <h2 class="related-title">Bài viết liên quan</h2>
        <div class="related-grid">
            @foreach($relatedPosts as $related)
            <article class="related-card">
                @if($related->images->first())
                <a href="{{ route('news.show', $related->slug) }}">
                    <div class="related-image">
                        <img src="{{ asset('storage/' . $related->images->first()->image_path) }}" 
                             alt="{{ $related->title }}">
                    </div>
                </a>
                @endif
                
                <div class="related-content">
                    <div class="related-meta">
                        <span class="related-category">{{ $related->category->name }}</span>
                        <span>{{ $related->published_at->format('d/m/Y') }}</span>
                    </div>
                    <h3 class="related-post-title">
                        <a href="{{ route('news.show', $related->slug) }}">
                            {{ Str::limit($related->title, 80) }}
                        </a>
                    </h3>
                    @if($related->excerpt)
                    <p class="related-excerpt">
                        {{ Str::limit($related->excerpt, 100) }}
                    </p>
                    @endif
                </div>
            </article>
            @endforeach
        </div>
    </div>
    @endif
</div>

@push('scripts')
<script>
    function sharePost() {
        if (navigator.share) {
            navigator.share({
                title: '{{ $post->title }}',
                text: '{{ $post->excerpt }}',
                url: window.location.href
            });
        } else {
            navigator.clipboard.writeText(window.location.href);
            alert('✅ Đã copy link bài viết vào clipboard!');
        }
    }
</script>
@endpush
@endsection
