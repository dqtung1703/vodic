@extends('layouts.app')

@section('title', $post->title . ' - VODIC')

@section('content')
<!-- Article Header -->
<div style="background: linear-gradient(135deg, var(--ocean-blue), var(--ocean-dark)); padding: 3rem 1.5rem; color: white;">
    <div class="container" style="max-width: 900px; margin: 0 auto;">
        <!-- Breadcrumb -->
        <nav style="margin-bottom: 1.5rem; font-size: 0.875rem; opacity: 0.9;">
            <a href="{{ route('home') }}" style="color: white; text-decoration: none; transition: opacity 0.3s;" onmouseover="this.style.opacity='0.7'" onmouseout="this.style.opacity='1'">Trang chủ</a>
            <span style="margin: 0 0.5rem;">/</span>
            <a href="{{ route('news.index') }}" style="color: white; text-decoration: none; transition: opacity 0.3s;" onmouseover="this.style.opacity='0.7'" onmouseout="this.style.opacity='1'">Tin tức</a>
            <span style="margin: 0 0.5rem;">/</span>
            <a href="{{ route('categories.show', $post->category->slug) }}" style="color: white; text-decoration: none; transition: opacity 0.3s;" onmouseover="this.style.opacity='0.7'" onmouseout="this.style.opacity='1'">
                {{ $post->category->name }}
            </a>
        </nav>

        <!-- Category Badge -->
        <div style="margin-bottom: 1rem;">
            <span style="background: rgba(255,255,255,0.2); backdrop-filter: blur(10px); padding: 0.5rem 1rem; border-radius: 9999px; font-size: 0.875rem; font-weight: 600;">
                {{ $post->category->name }}
            </span>
        </div>

        <!-- Title -->
        <h1 style="font-size: 2.5rem; font-weight: 800; line-height: 1.2; margin-bottom: 1.5rem; text-shadow: 0 2px 8px rgba(0,0,0,0.2);">
            {{ $post->title }}
        </h1>

        <!-- Meta Info -->
        <div style="display: flex; flex-wrap: wrap; gap: 1.5rem; font-size: 0.9375rem; opacity: 0.95;">
            <div style="display: flex; align-items: center; gap: 0.5rem;">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <rect x="3" y="4" width="18" height="18" rx="2" ry="2"/>
                    <line x1="16" y1="2" x2="16" y2="6"/>
                    <line x1="8" y1="2" x2="8" y2="6"/>
                    <line x1="3" y1="10" x2="21" y2="10"/>
                </svg>
                {{ $post->published_at->format('d/m/Y H:i') }}
            </div>
            <div style="display: flex; align-items: center; gap: 0.5rem;">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/>
                    <circle cx="12" cy="12" r="3"/>
                </svg>
                {{ number_format($post->views) }} lượt xem
            </div>
            @if($post->user)
            <div style="display: flex; align-items: center; gap: 0.5rem;">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"/>
                    <circle cx="12" cy="7" r="4"/>
                </svg>
                {{ $post->user->name }}
            </div>
            @endif
        </div>
    </div>
</div>

<!-- Article Content -->
<div style="background: var(--gray-50); padding: 3rem 1.5rem;">
    <div class="container" style="max-width: 900px; margin: 0 auto;">
        <article style="background: white; border-radius: 16px; padding: 3rem; box-shadow: 0 4px 12px rgba(0,0,0,0.08);">
            
            <!-- Excerpt -->
            @if($post->excerpt)
            <div style="font-size: 1.25rem; color: var(--gray-700); line-height: 1.7; margin-bottom: 2rem; padding: 1.5rem; background: var(--gray-50); border-left: 4px solid var(--ocean-blue); border-radius: 8px;">
                {{ $post->excerpt }}
            </div>
            @endif

            <!-- Featured Image -->
            @if($post->images->first())
            <div style="margin-bottom: 2.5rem;">
                <img src="{{ asset('storage/' . $post->images->first()->image_path) }}" 
                     alt="{{ $post->title }}"
                     style="width: 100%; border-radius: 12px; box-shadow: 0 8px 24px rgba(0,0,0,0.12);">
            </div>
            @endif

            <!-- Content -->
            <div style="font-size: 1.0625rem; line-height: 1.8; color: var(--gray-800);">
                {!! $post->content !!}
            </div>

            <!-- Additional Images Gallery -->
            @if($post->images->count() > 1)
            <div style="margin-top: 3rem; padding-top: 3rem; border-top: 2px solid var(--gray-200);">
                <h3 style="font-size: 1.5rem; font-weight: 700; color: var(--gray-900); margin-bottom: 1.5rem;">
                    Hình ảnh liên quan
                </h3>
                <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(250px, 1fr)); gap: 1rem;">
                    @foreach($post->images->skip(1) as $image)
                    <div style="border-radius: 12px; overflow: hidden; box-shadow: 0 4px 12px rgba(0,0,0,0.1); cursor: pointer; transition: all 0.3s ease;" onmouseover="this.style.transform='translateY(-4px)'; this.style.boxShadow='0 8px 20px rgba(0,0,0,0.15)'" onmouseout="this.style.transform=''; this.style.boxShadow='0 4px 12px rgba(0,0,0,0.1)'">
                        <img src="{{ asset('storage/' . $image->image_path) }}" 
                             alt="Image {{ $loop->iteration }}"
                             style="width: 100%; height: 200px; object-fit: cover;">
                    </div>
                    @endforeach
                </div>
            </div>
            @endif

            <!-- Article Footer -->
            <div style="margin-top: 3rem; padding-top: 2rem; border-top: 2px solid var(--gray-200);">
                <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 1rem;">
                    <div style="color: var(--gray-500); font-size: 0.875rem;">
                        Cập nhật: {{ $post->updated_at->format('d/m/Y H:i') }}
                    </div>
                    <div style="display: flex; gap: 0.75rem;">
                        <button onclick="window.print()" class="btn" style="background: var(--gray-200); color: var(--gray-700); padding: 0.75rem 1.5rem; font-size: 0.9375rem;">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <polyline points="6 9 6 2 18 2 18 9"/>
                                <path d="M6 18H4a2 2 0 01-2-2v-5a2 2 0 012-2h16a2 2 0 012 2v5a2 2 0 01-2 2h-2"/>
                                <rect x="6" y="14" width="12" height="8"/>
                            </svg>
                            In bài viết
                        </button>
                        <button onclick="sharePost()" class="btn btn-primary" style="padding: 0.75rem 1.5rem; font-size: 0.9375rem;">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
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
            </div>
        </article>

        <!-- Related Posts -->
        @if($relatedPosts && $relatedPosts->count() > 0)
        <div style="margin-top: 4rem;">
            <h2 style="font-size: 2rem; font-weight: 800; color: var(--gray-900); margin-bottom: 2rem;">
                Bài viết liên quan
            </h2>
            <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap: 2rem;">
                @foreach($relatedPosts as $related)
                <article style="background: white; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 12px rgba(0,0,0,0.08); transition: all 0.3s ease;" onmouseover="this.style.transform='translateY(-8px)'; this.style.boxShadow='0 12px 24px rgba(0,0,0,0.12)'" onmouseout="this.style.transform=''; this.style.boxShadow='0 4px 12px rgba(0,0,0,0.08)'">
                    @if($related->images->first())
                    <a href="{{ route('news.show', $related->slug) }}">
                        <div style="position: relative; overflow: hidden; height: 200px;">
                            <img src="{{ asset('storage/' . $related->images->first()->image_path) }}" 
                                 alt="{{ $related->title }}"
                                 style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.3s ease;"
                                 onmouseover="this.style.transform='scale(1.05)'"
                                 onmouseout="this.style.transform='scale(1)'">
                        </div>
                    </a>
                    @endif
                    
                    <div style="padding: 1.5rem;">
                        <div style="display: flex; align-items: center; gap: 0.75rem; margin-bottom: 0.75rem; font-size: 0.8125rem; color: var(--gray-500);">
                            <span style="background: var(--ocean-blue); color: white; padding: 0.25rem 0.75rem; border-radius: 9999px; font-weight: 600;">
                                {{ $related->category->name }}
                            </span>
                            <span>{{ $related->published_at->format('d/m/Y') }}</span>
                        </div>
                        <h3 style="font-size: 1.125rem; font-weight: 700; color: var(--gray-900); margin-bottom: 0.5rem; line-height: 1.4;">
                            <a href="{{ route('news.show', $related->slug) }}" style="color: inherit; text-decoration: none; transition: color 0.3s;" onmouseover="this.style.color='#0066cc'" onmouseout="this.style.color=''">
                                {{ Str::limit($related->title, 70) }}
                            </a>
                        </h3>
                        @if($related->excerpt)
                        <p style="color: var(--gray-600); font-size: 0.9375rem; line-height: 1.6;">
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
