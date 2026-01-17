@extends('layouts.app')

@section('title', 'Tin tức')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-900 mb-2">Tin tức</h1>
        <p class="text-gray-600">Cập nhật thông tin mới nhất từ VODIC</p>
    </div>

    <!-- Filter -->
    <div class="mb-6 flex gap-4 flex-wrap">
        <a href="{{ route('news.index') }}" class="px-4 py-2 rounded-lg {{ !request('category') ? 'bg-blue-600 text-white' : 'bg-gray-200 text-gray-700' }}">
            Tất cả
        </a>
        @foreach($categories as $cat)
        <a href="{{ route('news.index', ['category' => $cat->slug]) }}" 
           class="px-4 py-2 rounded-lg {{ request('category') == $cat->slug ? 'bg-blue-600 text-white' : 'bg-gray-200 text-gray-700' }}">
            {{ $cat->name }}
        </a>
        @endforeach
    </div>

    <!-- Posts Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($posts as $post)
        <article class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition">
            @if($post->images->first())
            <a href="{{ route('news.show', $post->slug) }}">
                <img src="{{ asset('storage/' . $post->images->first()->image_path) }}" 
                     alt="{{ $post->title }}"
                     class="w-full h-48 object-cover">
            </a>
            @endif
            
            <div class="p-5">
                <div class="flex items-center text-sm text-gray-500 mb-2">
                    <span class="bg-blue-100 text-blue-800 px-2 py-1 rounded text-xs font-semibold mr-2">
                        {{ $post->category->name }}
                    </span>
                    <span>📅 {{ $post->published_at->format('d/m/Y') }}</span>
                    <span class="ml-auto">👁️ {{ number_format($post->views) }}</span>
                </div>
                
                <h2 class="text-xl font-bold text-gray-900 mb-2 hover:text-blue-600">
                    <a href="{{ route('news.show', $post->slug) }}">
                        {{ $post->title }}
                    </a>
                </h2>
                
                @if($post->excerpt)
                <p class="text-gray-600 text-sm mb-4">
                    {{ Str::limit($post->excerpt, 100) }}
                </p>
                @endif
                
                <a href="{{ route('news.show', $post->slug) }}" 
                   class="text-blue-600 hover:text-blue-800 font-semibold text-sm">
                    Đọc thêm →
                </a>
            </div>
        </article>
        @empty
        <div class="col-span-full text-center py-12">
            <p class="text-gray-500 text-lg">Chưa có bài viết nào.</p>
        </div>
        @endforelse
    </div>

    <!-- Pagination -->
    @if($posts->hasPages())
    <div class="mt-8">
        {{ $posts->links() }}
    </div>
    @endif
</div>
@endsection
