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
                        <p class="mt-1 text-sm text-gray-500">URL hiện tại: <strong>{{ $post->slug }}</strong></p>
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

                    <!-- Featured Image hiện tại -->
                    @if($post->featured_image)
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Ảnh đại diện hiện tại
                        </label>
                        <div class="relative inline-block">
                            <img src="{{ asset('storage/' . $post->featured_image) }}" 
                                 alt="Featured Image" 
                                 class="w-64 h-48 object-cover rounded-lg border-2 border-gray-200"
                                 id="current-featured-image">
                            <button type="button" 
                                    onclick="removeFeaturedImage()"
                                    class="absolute top-2 right-2 bg-red-600 hover:bg-red-700 text-white p-2 rounded-full transition">
                                🗑️
                            </button>
                        </div>
                        <input type="hidden" name="remove_featured_image" id="remove_featured_image" value="0">
                    </div>
                    @endif

                    <!-- Upload ảnh đại diện mới -->
                    <div class="mb-6">
                        <label for="featured_image" class="block text-sm font-medium text-gray-700 mb-2">
                            @if($post->featured_image)
                                Thay đổi ảnh đại diện
                            @else
                                Ảnh đại diện
                            @endif
                        </label>
                        <input type="file" name="featured_image" id="featured_image" accept="image/*"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 @error('featured_image') border-red-500 @enderror">
                        <p class="mt-1 text-sm text-gray-500">Upload ảnh mới để thay thế ảnh hiện tại</p>
                        @error('featured_image')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Existing Images -->
                    @if($post->images->count() > 0)
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Hình ảnh bổ sung hiện tại ({{ $post->images->count() }})
                        </label>
                        <div class="grid grid-cols-3 gap-4">
                            @foreach($post->images as $image)
                            <div class="relative group" id="image-{{ $image->id }}">
                                <img src="{{ asset('storage/' . $image->image_path) }}" 
                                     alt="Image {{ $loop->iteration }}" 
                                     class="w-full h-32 object-cover rounded-lg">
                                <button type="button" 
                                        onclick="deleteImage({{ $image->id }})"
                                        class="absolute top-2 right-2 bg-red-600 text-white p-2 rounded-full opacity-0 group-hover:opacity-100 transition">
                                    🗑️
                                </button>
                                <span class="absolute bottom-2 left-2 bg-black bg-opacity-50 text-white text-xs px-2 py-1 rounded">
                                    #{{ $loop->iteration }}
                                </span>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endif

                    <div class="mb-6">
                        <label for="images" class="block text-sm font-medium text-gray-700 mb-2">
                            Thêm hình ảnh bổ sung mới
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

                        <!-- Status Field -->
                        <div class="mb-4">
                            <label for="status" class="block text-sm font-medium text-gray-700 mb-2">
                                Trạng thái <span class="text-red-500">*</span>
                            </label>
                            <select name="status" id="status" 
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 @error('status') border-red-500 @enderror" required>
                                <option value="draft" {{ old('status', $post->status) == 'draft' ? 'selected' : '' }}>
                                    📝 Bản nháp
                                </option>
                                <option value="published" {{ old('status', $post->status) == 'published' ? 'selected' : '' }}>
                                    ✅ Xuất bản
                                </option>
                                <option value="archived" {{ old('status', $post->status) == 'archived' ? 'selected' : '' }}>
                                    📦 Lưu trữ
                                </option>
                            </select>
                            @error('status')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

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
                                @if($post->user)
                                <p>👤 Tác giả: <strong>{{ $post->user->name }}</strong></p>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="flex gap-3 mb-3">
                        <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg font-medium transition">
                            💾 Cập nhật
                        </button>
                        <a href="{{ route('admin.posts.index') }}" class="w-full bg-gray-200 hover:bg-gray-300 text-gray-700 px-4 py-2 rounded-lg font-medium text-center transition">
                            ❌ Hủy
                        </a>
                    </div>

                    <!-- Nút xem trước -->
                    <a href="{{ route('news.show', $post->slug) }}" target="_blank" 
                       class="block w-full bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg font-medium text-center transition">
                        👁️ Xem trước
                    </a>
                </div>
            </div>
        </form>
    </div>
</div>

@push('scripts')
<script>
    // Auto-generate slug from title
    document.getElementById('title').addEventListener('input', function(e) {
        const slugInput = document.getElementById('slug');
        if (slugInput.dataset.auto !== 'false') {
            const title = e.target.value;
            const slug = title.toLowerCase()
                .normalize('NFD')
                .replace(/[\u0300-\u036f]/g, '')
                .replace(/đ/g, 'd')
                .replace(/[^a-z0-9]+/g, '-')
                .replace(/(^-|-$)/g, '');
            slugInput.value = slug;
        }
    });

    document.getElementById('slug').addEventListener('input', function() {
        this.dataset.auto = 'false';
    });

    // Delete gallery image
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
                // Remove image element from DOM
                const imageElement = document.getElementById(`image-${imageId}`);
                if (imageElement) {
                    imageElement.remove();
                }
                
                // Show success message
                alert('Đã xóa hình ảnh thành công!');
            } else {
                alert('Có lỗi xảy ra khi xóa hình ảnh');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Có lỗi xảy ra khi xóa hình ảnh');
        });
    }

    // Remove featured image (mark for deletion)
    function removeFeaturedImage() {
        if (!confirm('Bạn có chắc muốn xóa ảnh đại diện?')) return;
        
        document.getElementById('remove_featured_image').value = '1';
        document.getElementById('current-featured-image').style.opacity = '0.3';
        
        // Show notification
        const notification = document.createElement('p');
        notification.className = 'mt-2 text-sm text-red-600 font-medium';
        notification.textContent = '⚠️ Ảnh đại diện sẽ bị xóa khi lưu bài viết';
        document.getElementById('current-featured-image').parentElement.appendChild(notification);
    }

    // Preview new featured image
    document.getElementById('featured_image').addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(event) {
                const currentImage = document.getElementById('current-featured-image');
                if (currentImage) {
                    currentImage.src = event.target.result;
                    currentImage.style.opacity = '1';
                    document.getElementById('remove_featured_image').value = '0';
                }
            };
            reader.readAsDataURL(file);
        }
    });

    // Show selected images count
    document.getElementById('images').addEventListener('change', function(e) {
        const files = e.target.files;
        if (files.length > 0) {
            const label = this.previousElementSibling;
            const originalText = label.textContent;
            label.textContent = `${originalText} (${files.length} ảnh được chọn)`;
            
            setTimeout(() => {
                label.textContent = originalText;
            }, 3000);
        }
    });

    // Auto set published_at when changing status to published
    document.getElementById('status').addEventListener('change', function() {
        const publishedAtInput = document.getElementById('published_at');
        if (this.value === 'published' && !publishedAtInput.value) {
            const now = new Date();
            const year = now.getFullYear();
            const month = String(now.getMonth() + 1).padStart(2, '0');
            const day = String(now.getDate()).padStart(2, '0');
            const hours = String(now.getHours()).padStart(2, '0');
            const minutes = String(now.getMinutes()).padStart(2, '0');
            publishedAtInput.value = `${year}-${month}-${day}T${hours}:${minutes}`;
        }
    });
</script>
@endpush
@endsection