@extends('layouts.app')

@section('title', $post->title)

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-4xl mx-auto">
        <!-- Breadcrumb -->
        <nav class="mb-6 text-sm text-gray-600">
            <a href="{{ route('home') }}" class="hover:text-blue-600">Trang chủ</a>
            <span class="mx-2">/</span>
            <a href="{{ route('news.index') }}" class="hover:text-blue-600">Tin tức</a>
            <span class="mx-2">/</span>
            <a href="{{ route('categories.show', $post->category->slug) }}" class="hover:text-blue-600">
                {{ $post->category->name }}
            </a>
            <span class="mx-2">/</span>
            <span class="text-gray-900">{{ $post->title }}</span>
        </nav>

        <!-- Article -->
        <article class="bg-white rounded-lg shadow-lg p-8">
            <!-- Header -->
            <header class="mb-6">
                <div class="flex items-center text-sm text-gray-500 mb-4">
                    <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-xs font-semibold mr-3">
                        {{ $post->category->name }}
                    </span>
                    <span>📅 {{ $post->published_at->format('d/m/Y H:i') }}</span>
                    <span class="ml-4">👁️ {{ number_format($post->views) }} lượt xem</span>
                </div>
                
                <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                    {{ $post->title }}
                </h1>
                
                @if($post->excerpt)
                <p class="text-xl text-gray-600 leading-relaxed">
                    {{ $post->excerpt }}
                </p>
                @endif
            </header>

            <!-- Featured Image -->
            @if($post->images->first())
            <div class="mb-6">
                <img src="{{ asset('storage/' . $post->images->first()->image_path) }}" 
                     alt="{{ $post->title }}"
                     class="w-full rounded-lg shadow-md">
            </div>
            @endif

            <!-- Content -->
            <div class="prose prose-lg max-w-none mb-8">
                {!! nl2br(e($post->content)) !!}
            </div>

            <!-- Additional Images -->
            @if($post->images->count() > 1)
            <div class="mb-8">
                <h3 class="text-xl font-bold text-gray-900 mb-4">Hình ảnh liên quan</h3>
                <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                    @foreach($post->images->skip(1) as $image)
                    <div class="rounded-lg overflow-hidden shadow-md">
                        <img src="{{ asset('storage/' . $image->image_path) }}" 
                             alt="Image {{ $loop->iteration }}"
                             class="w-full h-48 object-cover hover:scale-105 transition">
                    </div>
                    @endforeach
                </div>
            </div>
            @endif

            <!-- Footer -->
            <footer class="pt-6 border-t border-gray-200">
                <div class="flex justify-between items-center">
                    <div class="text-sm text-gray-500">
                        Cập nhật lần cuối: {{ $post->updated_at->format('d/m/Y H:i') }}
                    </div>
                    <div class="flex gap-2">
                        <button onclick="window.print()" class="px-4 py-2 bg-gray-200 hover:bg-gray-300 rounded-lg text-sm">
                            🖨️ In bài viết
                        </button>
                        <button onclick="sharePost()" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg text-sm">
                            🔗 Chia sẻ
                        </button>
                    </div>
                </div>
            </footer>
        </article>

        <!-- Related Posts -->
        @if($relatedPosts && $relatedPosts->count() > 0)
        <div class="mt-12">
            <h2 class="text-2xl font-bold text-gray-900 mb-6">Bài viết liên quan</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach($relatedPosts as $related)
                <article class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition">
                    @if($related->images->first())
                    <a href="{{ route('news.show', $related->slug) }}">
                        <img src="{{ asset('storage/' . $related->images->first()->image_path) }}" 
                             alt="{{ $related->title }}"
                             class="w-full h-40 object-cover">
                    </a>
                    @endif
                    
                    <div class="p-4">
                        <h3 class="font-bold text-gray-900 mb-2 hover:text-blue-600">
                            <a href="{{ route('news.show', $related->slug) }}">
                                {{ Str::limit($related->title, 60) }}
                            </a>
                        </h3>
                        <p class="text-sm text-gray-500">
                            {{ $related->published_at->format('d/m/Y') }}
                        </p>
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
                url: window.location.href
            });
        } else {
            // Fallback: copy to clipboard
            navigator.clipboard.writeText(window.location.href);
            alert('Đã copy link bài viết!');
        }
    }
</script>
@endpush
@endsection
