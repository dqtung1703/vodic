@extends('admin.admin')

@section('title', 'Thêm Bài viết mới')
@section('page-title', 'Thêm Bài viết mới')

@section('content')
<div class="max-w-5xl">
    <div class="bg-white rounded-lg shadow p-6">
        <form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <!-- Main Content Column -->
                <div class="lg:col-span-2">
                    <div class="mb-6">
                        <label for="title" class="block text-sm font-medium text-gray-700 mb-2">
                            Tiêu đề bài viết <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="title" id="title" value="{{ old('title') }}" 
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 @error('title') border-red-500 @enderror"
                            placeholder="Nhập tiêu đề bài viết" required>
                        @error('title')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="slug" class="block text-sm font-medium text-gray-700 mb-2">
                            Slug (URL thân thiện)
                        </label>
                        <input type="text" name="slug" id="slug" value="{{ old('slug') }}" 
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 @error('slug') border-red-500 @enderror"
                            placeholder="tu-dong-tao-tu-tieu-de">
                        <p class="mt-1 text-sm text-gray-500">Để trống để tự động tạo từ tiêu đề</p>
                        @error('slug')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="excerpt" class="block text-sm font-medium text-gray-700 mb-2">
                            Tóm tắt
                        </label>
                        <textarea name="excerpt" id="excerpt" rows="3" 
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 @error('excerpt') border-red-500 @enderror"
                            placeholder="Nhập tóm tắt ngắn gọn về bài viết">{{ old('excerpt') }}</textarea>
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
                            placeholder="Nhập nội dung bài viết" required>{{ old('content') }}</textarea>
                        @error('content')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- THÊM: Featured Image -->
                    <div class="mb-6">
                        <label for="featured_image" class="block text-sm font-medium text-gray-700 mb-2">
                            Ảnh đại diện
                        </label>
                        <input type="file" name="featured_image" id="featured_image" accept="image/*"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 @error('featured_image') border-red-500 @enderror">
                        <p class="mt-1 text-sm text-gray-500">Ảnh đại diện sẽ hiển thị ở danh sách tin tức</p>
                        @error('featured_image')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="images" class="block text-sm font-medium text-gray-700 mb-2">
                            Hình ảnh bổ sung
                        </label>
                        <input type="file" name="images[]" id="images" multiple accept="image/*"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 @error('images.*') border-red-500 @enderror">
                        <p class="mt-1 text-sm text-gray-500">Có thể chọn nhiều hình ảnh cùng lúc</p>
                        @error('images.*')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Sidebar Column -->
                <div class="lg:col-span-1">
                    <div class="bg-gray-50 p-4 rounded-lg mb-4">
                        <h3 class="font-semibold mb-4">Thiết lập</h3>

                        <!-- THÊM: Status Field -->
                        <div class="mb-4">
                            <label for="status" class="block text-sm font-medium text-gray-700 mb-2">
                                Trạng thái <span class="text-red-500">*</span>
                            </label>
                            <select name="status" id="status" 
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 @error('status') border-red-500 @enderror" required>
                                <option value="draft" {{ old('status', 'draft') == 'draft' ? 'selected' : '' }}>
                                    📝 Bản nháp
                                </option>
                                <option value="published" {{ old('status') == 'published' ? 'selected' : '' }}>
                                    ✅ Xuất bản ngay
                                </option>
                                <option value="archived" {{ old('status') == 'archived' ? 'selected' : '' }}>
                                    📦 Lưu trữ
                                </option>
                            </select>
                            <p class="mt-1 text-sm text-gray-500">Chọn "Bản nháp" để lưu nhưng chưa công khai</p>
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
                                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
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
                                value="{{ old('published_at', now()->format('Y-m-d\TH:i')) }}"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                            <p class="mt-1 text-sm text-gray-500">Tự động lấy thời gian hiện tại nếu xuất bản</p>
                        </div>
                    </div>

                    <div class="flex gap-3">
                        <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg font-medium transition">
                            💾 Đăng bài
                        </button>
                        <a href="{{ route('admin.posts.index') }}" class="w-full bg-gray-200 hover:bg-gray-300 text-gray-700 px-4 py-2 rounded-lg font-medium text-center transition">
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
    // Auto-generate slug from title
    document.getElementById('title').addEventListener('input', function(e) {
        const slugInput = document.getElementById('slug');
        if (!slugInput.value || slugInput.dataset.auto !== 'false') {
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

    // Preview featured image
    document.getElementById('featured_image').addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(event) {
                // Tạo preview nếu muốn
                console.log('Featured image selected:', file.name);
            };
            reader.readAsDataURL(file);
        }
    });

    // Preview multiple images
    document.getElementById('images').addEventListener('change', function(e) {
        const files = e.target.files;
        console.log(`${files.length} images selected`);
    });

    // Auto set published_at when status changes to published
    document.getElementById('status').addEventListener('change', function() {
        const publishedAtInput = document.getElementById('published_at');
        if (this.value === 'published' && !publishedAtInput.value) {
            // Set current datetime if publishing and no date set
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