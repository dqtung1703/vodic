@extends('layouts.admin')

@section('title', 'Quản lý Bài viết')
@section('page-title', 'Quản lý Bài viết')

@section('content')
<div class="bg-white rounded-lg shadow">
    <div class="p-6 border-b border-gray-200">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-xl font-semibold">Danh sách Bài viết</h2>
            <a href="{{ route('admin.posts.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
                ➕ Thêm bài viết mới
            </a>
        </div>

        <!-- Filter -->
        <form method="GET" class="flex gap-4">
            <select name="category" class="px-4 py-2 border border-gray-300 rounded-lg" onchange="this.form.submit()">
                <option value="">Tất cả danh mục</option>
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}" {{ request('category') == $cat->id ? 'selected' : '' }}>
                        {{ $cat->name }}
                    </option>
                @endforeach
            </select>

            <select name="status" class="px-4 py-2 border border-gray-300 rounded-lg" onchange="this.form.submit()">
                <option value="">Tất cả trạng thái</option>
                <option value="published" {{ request('status') == 'published' ? 'selected' : '' }}>Đã xuất bản</option>
                <option value="draft" {{ request('status') == 'draft' ? 'selected' : '' }}>Bản nháp</option>
            </select>
        </form>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Tiêu đề</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Danh mục</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Lượt xem</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Trạng thái</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Ngày đăng</th>
                    <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase">Thao tác</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @forelse($posts as $post)
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4">
                        <div class="flex items-center">
                            @if($post->images->first())
                                <img src="{{ asset('storage/' . $post->images->first()->image_path) }}" 
                                     alt="{{ $post->title }}" 
                                     class="w-16 h-16 object-cover rounded mr-4">
                            @endif
                            <div>
                                <div class="text-sm font-medium text-gray-900">{{ $post->title }}</div>
                                <div class="text-sm text-gray-500">{{ Str::limit($post->excerpt, 60) }}</div>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                        {{ $post->category->name }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                        {{ number_format($post->views) }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        @if($post->published_at && $post->published_at <= now())
                            <span class="px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">
                                Đã xuất bản
                            </span>
                        @else
                            <span class="px-2 py-1 text-xs font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                Bản nháp
                            </span>
                        @endif
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        {{ $post->published_at ? $post->published_at->format('d/m/Y H:i') : 'Chưa đăng' }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                        <a href="{{ route('admin.posts.edit', $post) }}" class="text-blue-600 hover:text-blue-900 mr-3">
                            ✏️ Sửa
                        </a>
                        <form action="{{ route('admin.posts.destroy', $post) }}" method="POST" class="inline" onsubmit="return confirm('Bạn có chắc muốn xóa bài viết này?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-900">
                                🗑️ Xóa
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-6 py-8 text-center text-gray-500">
                        Chưa có bài viết nào. <a href="{{ route('admin.posts.create') }}" class="text-blue-600">Thêm bài viết đầu tiên</a>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($posts->hasPages())
    <div class="px-6 py-4 border-t border-gray-200">
        {{ $posts->links() }}
    </div>
    @endif
</div>
@endsection
