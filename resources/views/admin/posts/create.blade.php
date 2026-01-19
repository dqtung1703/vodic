@extends('admin.admin')

@section('title', 'Thêm Bài viết mới')
@section('page-title', 'Thêm Bài viết mới')

@section('content')
<div class="form-container">
    <div class="form-card">
        <div class="form-header">
            <h2>✍️ Tạo Bài viết mới</h2>
        </div>

        <form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-body">
                <div class="form-grid">
                    <!-- Main Content -->
                    <div>
                        <div class="form-group">
                            <label for="title" class="form-label">
                                Tiêu đề bài viết <span class="required">*</span>
                            </label>
                            <input type="text" name="title" id="title" value="{{ old('title') }}" 
                                class="form-input @error('title') error @enderror"
                                placeholder="Nhập tiêu đề bài viết" required>
                            @error('title')
                                <span class="form-error">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="slug" class="form-label">Slug (URL thân thiện)</label>
                            <input type="text" name="slug" id="slug" value="{{ old('slug') }}" 
                                class="form-input @error('slug') error @enderror"
                                placeholder="tu-dong-tao-tu-tieu-de">
                            <span class="form-hint">Để trống để tự động tạo từ tiêu đề</span>
                            @error('slug')
                                <span class="form-error">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="excerpt" class="form-label">Tóm tắt</label>
                            <textarea name="excerpt" id="excerpt" rows="3" 
                                class="form-textarea @error('excerpt') error @enderror"
                                placeholder="Nhập tóm tắt ngắn gọn về bài viết">{{ old('excerpt') }}</textarea>
                            @error('excerpt')
                                <span class="form-error">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="content" class="form-label">
                                Nội dung <span class="required">*</span>
                            </label>
                            <textarea name="content" id="content" rows="15" 
                                class="form-textarea @error('content') error @enderror"
                                placeholder="Nhập nội dung bài viết" required>{{ old('content') }}</textarea>
                            @error('content')
                                <span class="form-error">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="featured_image" class="form-label">Ảnh đại diện</label>
                            <input type="file" name="featured_image" id="featured_image" accept="image/*"
                                class="form-input @error('featured_image') error @enderror">
                            <span class="form-hint">Ảnh đại diện sẽ hiển thị ở danh sách tin tức</span>
                            @error('featured_image')
                                <span class="form-error">{{ $message }}</span>
                            @enderror
                            <div id="featuredPreview" class="image-preview"></div>
                        </div>

                        <div class="form-group">
                            <label for="images" class="form-label">Hình ảnh bổ sung</label>
                            <input type="file" name="images[]" id="images" multiple accept="image/*"
                                class="form-input @error('images.*') error @enderror">
                            <span class="form-hint">Có thể chọn nhiều hình ảnh cùng lúc</span>
                            @error('images.*')
                                <span class="form-error">{{ $message }}</span>
                            @enderror
                            <div id="imagesPreview" class="image-preview"></div>
                        </div>
                    </div>

                    <!-- Sidebar -->
                    <div>
                        <div class="form-sidebar">
                            <div class="sidebar-section">
                                <h3 class="sidebar-title">⚙️ Thiết lập</h3>

                                <div class="form-group">
                                    <label for="status" class="form-label">
                                        Trạng thái <span class="required">*</span>
                                    </label>
                                    <select name="status" id="status" 
                                        class="form-select @error('status') error @enderror" required>
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
                                    @error('status')
                                        <span class="form-error">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="category_id" class="form-label">
                                        Danh mục <span class="required">*</span>
                                    </label>
                                    <select name="category_id" id="category_id" 
                                        class="form-select @error('category_id') error @enderror" required>
                                        <option value="">Chọn danh mục</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <span class="form-error">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="published_at" class="form-label">Ngày xuất bản</label>
                                    <input type="datetime-local" name="published_at" id="published_at" 
                                        value="{{ old('published_at', now()->format('Y-m-d\TH:i')) }}"
                                        class="form-input">
                                    <span class="form-hint">Tự động lấy thời gian hiện tại</span>
                                </div>
                            </div>

                            <div class="form-actions">
                                <button type="submit" class="btn-form-primary">
                                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path d="M19 21H5a2 2 0 01-2-2V5a2 2 0 012-2h11l5 5v11a2 2 0 01-2 2z"></path>
                                        <polyline points="17 21 17 13 7 13 7 21"></polyline>
                                        <polyline points="7 3 7 8 15 8"></polyline>
                                    </svg>
                                    Đăng bài
                                </button>
                                <a href="{{ route('admin.posts.index') }}" class="btn-form-secondary">
                                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <line x1="18" y1="6" x2="6" y2="18"></line>
                                        <line x1="6" y1="6" x2="18" y2="18"></line>
                                    </svg>
                                    Hủy
                                </a>
                            </div>
                        </div>
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
        const preview = document.getElementById('featuredPreview');
        preview.innerHTML = '';
        
        if (file) {
            const reader = new FileReader();
            reader.onload = function(event) {
                preview.innerHTML = `
                    <div class="preview-item">
                        <img src="${event.target.result}" alt="Preview">
                    </div>
                `;
            };
            reader.readAsDataURL(file);
        }
    });

    // Preview multiple images
    document.getElementById('images').addEventListener('change', function(e) {
        const files = e.target.files;
        const preview = document.getElementById('imagesPreview');
        preview.innerHTML = '';
        
        Array.from(files).forEach(file => {
            const reader = new FileReader();
            reader.onload = function(event) {
                const div = document.createElement('div');
                div.className = 'preview-item';
                div.innerHTML = `<img src="${event.target.result}" alt="Preview">`;
                preview.appendChild(div);
            };
            reader.readAsDataURL(file);
        });
    });

    // Auto set published_at when status changes to published
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