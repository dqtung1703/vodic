@extends('admin.admin')

@section('title', 'Thêm Danh mục mới')
@section('page-title', 'Thêm Danh mục mới')

@section('content')
<div class="form-container" style="max-width: 800px;">
    <div class="form-card">
        <div class="form-header">
            <h2>📁 Tạo Danh mục mới</h2>
        </div>

        <form action="{{ route('admin.categories.store') }}" method="POST">
            @csrf
            <div class="form-body">
                <div class="form-group">
                    <label for="name" class="form-label">
                        Tên danh mục <span class="required">*</span>
                    </label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}" 
                        class="form-input @error('name') error @enderror"
                        placeholder="Nhập tên danh mục" required>
                    @error('name')
                        <span class="form-error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="slug" class="form-label">Slug (URL thân thiện)</label>
                    <input type="text" name="slug" id="slug" value="{{ old('slug') }}" 
                        class="form-input @error('slug') error @enderror"
                        placeholder="tu-dong-tao-tu-ten-danh-muc">
                    <span class="form-hint">Để trống để tự động tạo từ tên danh mục</span>
                    @error('slug')
                        <span class="form-error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="description" class="form-label">Mô tả</label>
                    <textarea name="description" id="description" rows="4" 
                        class="form-textarea @error('description') error @enderror"
                        placeholder="Nhập mô tả cho danh mục">{{ old('description') }}</textarea>
                    @error('description')
                        <span class="form-error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn-form-primary">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M19 21H5a2 2 0 01-2-2V5a2 2 0 012-2h11l5 5v11a2 2 0 01-2 2z"></path>
                            <polyline points="17 21 17 13 7 13 7 21"></polyline>
                            <polyline points="7 3 7 8 15 8"></polyline>
                        </svg>
                        Lưu danh mục
                    </button>
                    <a href="{{ route('admin.categories.index') }}" class="btn-form-secondary">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <line x1="18" y1="6" x2="6" y2="18"></line>
                            <line x1="6" y1="6" x2="18" y2="18"></line>
                        </svg>
                        Hủy bỏ
                    </a>
                </div>
            </div>
        </form>
    </div>
</div>

@push('scripts')
<script>
    // Auto-generate slug from name
    document.getElementById('name').addEventListener('input', function(e) {
        const slugInput = document.getElementById('slug');
        if (!slugInput.value || slugInput.dataset.auto !== 'false') {
            const name = e.target.value;
            const slug = name.toLowerCase()
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
</script>
@endpush
@endsection
