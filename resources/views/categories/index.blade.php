@extends('layouts.app')

@section('title', 'Danh mục')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-900 mb-2">Danh mục tin tức</h1>
        <p class="text-gray-600">Khám phá các chủ đề tin tức từ VODIC</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($categories as $category)
        <a href="{{ route('categories.show', $category->slug) }}" 
           class="bg-white rounded-lg shadow-md p-6 hover:shadow-xl transition group">
            <div class="flex items-start justify-between mb-4">
                <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center text-2xl">
                    📁
                </div>
                <span class="bg-blue-600 text-white px-3 py-1 rounded-full text-sm font-semibold">
                    {{ $category->posts_count ?? 0 }}
                </span>
            </div>
            
            <h2 class="text-xl font-bold text-gray-900 mb-2 group-hover:text-blue-600">
                {{ $category->name }}
            </h2>
            
            @if($category->description)
            <p class="text-gray-600 text-sm">
                {{ Str::limit($category->description, 100) }}
            </p>
            @endif
            
            <div class="mt-4 text-blue-600 font-semibold text-sm">
                Xem tất cả →
            </div>
        </a>
        @endforeach
    </div>
</div>
@endsection
