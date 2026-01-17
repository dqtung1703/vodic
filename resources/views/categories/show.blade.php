@extends('layouts.app')

@section('title', $category->name)

@section('content')
<div class="container mx-auto px-4 py-8">
    <!-- Breadcrumb -->
    <nav class="mb-6 text-sm text-gray-600">
        <a href="{{ route('home') }}" class="hover:text-blue-600">Trang chủ</a>
        <span class="mx-2">/</span>
        <a href="{{ route('categories.index') }}" class="hover:text-blue-600">Danh mục</a>
        <span class="mx-2">/</span>
        <span class="text-gray-900">{{ $category->name }}</span>
    </nav>

    <!-- Category Header -->
    <div class="bg-white rounded-lg shadow-md p-6 mb-8">
        <div class="flex items-center mb-4">
            <div class="w-16 h-16 bg-blue-100 rounded-lg flex items-center justify-center text-3xl mr-4">
                📁
            </div>
            <div>
                <h1 class="text-3xl font-bold text-gray-900">{{ $category->name }}</h1>
                <p class="text-gray-600">{{ $posts->total() }} bài viết</p>
            </div>
        </div>
        
        @if($category->description)
        <p class="text-gray-700">{{ $category->description }}</p>
        @endif
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
            <p class="text-gray-500 text-lg">Danh mục này chưa có bài viết nào.</p>
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
