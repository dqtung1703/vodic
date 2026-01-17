@extends('admin.admin')


@section('title', 'Chỉnh sửa Bài viết')
@section('page-title', 'Chỉnh sửa Bài viết')

@section('content')
<div class="max-w-5xl">
    <div class="bg-white rounded-lg shadow p-6">
        <form action="{{ route('admin.posts.update', $post) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <!-- Main Content Column -->
                <div class="lg:col-span-2">
                    <div class="mb-6">
                        <label for="title" class="block text-sm font-medium text-gray-700 mb-2">
                            Tiêu đề bài viết <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="title" id="title" value="{{ old('title', $post->title) }}" 
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 @error('title') border-red-500 @enderror"
                            required>
                        @error('title')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="slug" class="block text-sm font-medium text-gray-700 mb-2">
                            Slug (URL thân thiện)
                        </label>
                        <input type="text" name="slug" id="slug" value="{{ old('slug', $post->slug) }}" 
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 @error('slug') border-red-500 @enderror">
                        @error('slug')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="excerpt" class="block text-sm font-medium text-gray-700 mb-2">
                            Tóm tắt
                        </label>
                        <textarea name="excerpt" id="excerpt" rows="3" 
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 @error('excerpt') border-red-500 @enderror">{{ old('excerpt', $post->excerpt) }}</textarea>
                        @error('excerpt')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="content" class="block text-sm font-medium text-gray-700 mb-2">
                            Nội dung <span class="text-red-500">*</span>
                        </label>
                        <textarea name="content" id="content" rows="15" 
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 @error('content') border-red-500 @enderror"
                            required>{{ old('content', $post->content) }}</textarea>
                        @error('content')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Existing Images -->
                    @if($post->images->count() > 0)
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Hình ảnh hiện tại
                        </label>
                        <div class="grid grid-cols-3 gap-4">
                            @foreach($post->images as $image)
                            <div class="relative group">
                                <img src="{{ asset('storage/' . $image->image_path) }}" 
                                     alt="Image" 
                                     class="w-full h-32 object-cover rounded-lg">
                                <button type="button" 
                                        onclick="deleteImage({{ $image->id }})"
                                        class="absolute top-2 right-2 bg-red-600 text-white p-2 rounded-full opacity-0 group-hover:opacity-100 transition">
                                    🗑️
                                </button>
                                @if($loop->first)
                                <span class="absolute bottom-2 left-2 bg-blue-600 text-white text-xs px-2 py-1 rounded">
                                    Ảnh chính
                                </span>
                                @endif
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endif

                    <div class="mb-6">
                        <label for="images" class="block text-sm font-medium text-gray-700 mb-2">
                            Thêm hình ảnh mới
                        </label>
                        <input type="file" name="images[]" id="images" multiple accept="image/*"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                        <p class="mt-1 text-sm text-gray-500">Có thể chọn nhiều hình ảnh cùng lúc</p>
                    </div>
                </div>

                <!-- Sidebar Column -->
                <div class="lg:col-span-1">
                    <div class="bg-gray-50 p-4 rounded-lg mb-4">
                        <h3 class="font-semibold mb-4">Thiết lập</h3>

                        <div class="mb-4">
                            <label for="category_id" class="block text-sm font-medium text-gray-700 mb-2">
                                Danh mục <span class="text-red-500">*</span>
                            </label>
                            <select name="category_id" id="category_id" 
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 @error('category_id') border-red-500 @enderror" required>
                                <option value="">Chọn danh mục</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id', $post->category_id) == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="published_at" class="block text-sm font-medium text-gray-700 mb-2">
                                Ngày xuất bản
                            </label>
                            <input type="datetime-local" name="published_at" id="published_at" 
                                value="{{ old('published_at', $post->published_at ? $post->published_at->format('Y-m-d\TH:i') : '') }}"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Thống kê
                            </label>
                            <div class="text-sm text-gray-600 space-y-1">
                                <p>👁️ Lượt xem: <strong>{{ number_format($post->views) }}</strong></p>
                                <p>📅 Tạo: {{ $post->created_at->format('d/m/Y H:i') }}</p>
                                <p>🔄 Cập nhật: {{ $post->updated_at->format('d/m/Y H:i') }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="flex gap-3">
                        <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg font-medium">
                            💾 Cập nhật
                        </button>
                        <a href="{{ route('admin.posts.index') }}" class="w-full bg-gray-200 hover:bg-gray-300 text-gray-700 px-4 py-2 rounded-lg font-medium text-center">
                            ❌ Hủy
                        </a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

@push('scripts')
<script>
    function deleteImage(imageId) {
        if (!confirm('Bạn có chắc muốn xóa hình ảnh này?')) return;
        
        fetch(`{{ route('admin.posts.images.delete', '') }}/${imageId}`, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Accept': 'application/json'
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                location.reload();
            } else {
                alert('Có lỗi xảy ra khi xóa hình ảnh');
            }
        });
    }
</script>
@endpush
@endsection
