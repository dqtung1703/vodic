@extends('layouts.app')

@section('title', 'Chỉnh sửa bài viết')

@section('content')
<div class="container" style="padding: 3rem 1.5rem; max-width: 900px;">
    <h1 style="font-size: 2rem; font-weight: 700; color: var(--text-primary); margin-bottom: 2rem;">✏️ Chỉnh sửa bài viết</h1>

    <div style="background: #fef3c7; border-left: 4px solid #f59e0b; padding: 1rem; border-radius: 8px; margin-bottom: 2rem;">
        <p style="color: #92400e; font-weight: 600;">ℹ️ Bạn chỉ có thể chỉnh sửa bài viết khi ở trạng thái <strong>Bản nháp</strong>.</p>
    </div>

    <form action="{{ route('user.posts.update', $post) }}" method="POST" enctype="multipart/form-data" style="background: white; padding: 2rem; border-radius: 12px; box-shadow: 0 2px 8px rgba(0,0,0,0.1);">
        @csrf
        @method('PUT')

        <div style="margin-bottom: 1.5rem;">
            <label style="display: block; font-weight: 600; color: var(--text-primary); margin-bottom: 0.5rem;">
                Tiêu đề bài viết <span style="color: #ef4444;">*</span>
            </label>
            <input type="text" name="title" id="title" value="{{ old('title', $post->title) }}" required
                   style="width: 100%; padding: 0.75rem 1rem; border: 2px solid #e5e7eb; border-radius: 8px; font-size: 1rem;">
            @error('title')
                <span style="color: #ef4444; font-size: 0.875rem; margin-top: 0.25rem; display: block;">{{ $message }}</span>
            @enderror
        </div>

        <div style="margin-bottom: 1.5rem;">
            <label style="display: block; font-weight: 600; color: var(--text-primary); margin-bottom: 0.5rem;">
                Slug (URL thân thiện)
            </label>
            <input type="text" name="slug" id="slug" value="{{ old('slug', $post->slug) }}"
                   style="width: 100%; padding: 0.75rem 1rem; border: 2px solid #e5e7eb; border-radius: 8px; font-size: 1rem;">
            <span style="color: var(--text-secondary); font-size: 0.875rem; margin-top: 0.25rem; display: block;">URL hiện tại: <strong>{{ $post->slug }}</strong></span>
        </div>

        <div style="margin-bottom: 1.5rem;">
            <label style="display: block; font-weight: 600; color: var(--text-primary); margin-bottom: 0.5rem;">
                Danh mục <span style="color: #ef4444;">*</span>
            </label>
            <select name="category_id" required
                    style="width: 100%; padding: 0.75rem 1rem; border: 2px solid #e5e7eb; border-radius: 8px; font-size: 1rem;">
                <option value="">Chọn danh mục</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id', $post->category_id) == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div style="margin-bottom: 1.5rem;">
            <label style="display: block; font-weight: 600; color: var(--text-primary); margin-bottom: 0.5rem;">
                Tóm tắt
            </label>
            <textarea name="excerpt" rows="3"
                      style="width: 100%; padding: 0.75rem 1rem; border: 2px solid #e5e7eb; border-radius: 8px; font-size: 1rem; font-family: inherit;">{{ old('excerpt', $post->excerpt) }}</textarea>
        </div>

        <div style="margin-bottom: 1.5rem;">
            <label style="display: block; font-weight: 600; color: var(--text-primary); margin-bottom: 0.5rem;">
                Nội dung <span style="color: #ef4444;">*</span>
            </label>
            <textarea name="content" rows="15" required
                      style="width: 100%; padding: 0.75rem 1rem; border: 2px solid #e5e7eb; border-radius: 8px; font-size: 1rem; font-family: inherit;">{{ old('content', $post->content) }}</textarea>
        </div>

        @if($post->featured_image)
        <div style="margin-bottom: 1.5rem;">
            <label style="display: block; font-weight: 600; color: var(--text-primary); margin-bottom: 0.5rem;">
                Ảnh đại diện hiện tại
            </label>
            <div id="current-featured" style="position: relative; display: inline-block;">
                <img src="{{ asset('storage/' . $post->featured_image) }}" alt="Featured Image" 
                     style="max-width: 300px; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.1);">
                <button type="button" onclick="removeFeaturedImage()" 
                        style="position: absolute; top: 0.5rem; right: 0.5rem; background: #ef4444; color: white; border: none; width: 32px; height: 32px; border-radius: 50%; cursor: pointer; font-size: 1.25rem; line-height: 1;">
                    ×
                </button>
            </div>
            <input type="hidden" name="remove_featured_image" id="remove_featured_image" value="0">
        </div>
        @endif

        <div style="margin-bottom: 1.5rem;">
            <label style="display: block; font-weight: 600; color: var(--text-primary); margin-bottom: 0.5rem;">
                @if($post->featured_image) Thay đổi ảnh đại diện @else Ảnh đại diện @endif
            </label>
            <input type="file" name="featured_image" id="featured_image" accept="image/*"
                   style="width: 100%; padding: 0.75rem 1rem; border: 2px solid #e5e7eb; border-radius: 8px;">
            <div id="featuredPreview" style="margin-top: 1rem;"></div>
        </div>

        @if($post->images->count() > 0)
        <div style="margin-bottom: 1.5rem;">
            <label style="display: block; font-weight: 600; color: var(--text-primary); margin-bottom: 0.5rem;">
                Hình ảnh bổ sung ({{ $post->images->count() }})
            </label>
            <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(120px, 1fr)); gap: 1rem; margin-bottom: 1rem;">
                @foreach($post->images as $image)
                <div id="image-{{ $image->id }}" style="position: relative;">
                    <img src="{{ asset('storage/' . $image->image_path) }}" alt="Image" 
                         style="width: 100%; aspect-ratio: 1; object-fit: cover; border-radius: 8px;">
                    <button type="button" onclick="deleteImage({{ $image->id }})" 
                            style="position: absolute; top: 0.25rem; right: 0.25rem; background: #ef4444; color: white; border: none; width: 24px; height: 24px; border-radius: 50%; cursor: pointer; font-size: 1rem; line-height: 1;">
                        ×
                    </button>
                </div>
                @endforeach
            </div>
        </div>
        @endif

        <div style="margin-bottom: 2rem;">
            <label style="display: block; font-weight: 600; color: var(--text-primary); margin-bottom: 0.5rem;">
                Thêm hình ảnh bổ sung mới
            </label>
            <input type="file" name="images[]" id="images" multiple accept="image/*"
                   style="width: 100%; padding: 0.75rem 1rem; border: 2px solid #e5e7eb; border-radius: 8px;">
            <div id="imagesPreview" style="margin-top: 1rem; display: grid; grid-template-columns: repeat(auto-fill, minmax(120px, 1fr)); gap: 1rem;"></div>
        </div>

        <div style="display: flex; gap: 1rem;">
            <button type="submit" style="background: var(--ocean-blue); color: white; padding: 0.875rem 2rem; border-radius: 8px; border: none; font-weight: 600; cursor: pointer; font-size: 1rem;">
                💾 Cập nhật bài viết
            </button>
            <a href="{{ route('user.posts.index') }}" style="background: #e5e7eb; color: var(--text-primary); padding: 0.875rem 2rem; border-radius: 8px; text-decoration: none; font-weight: 600; display: inline-block;">
                ❌ Hủy
            </a>
        </div>
    </form>
</div>

<script>
// Auto-generate slug
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

// Remove featured image
function removeFeaturedImage() {
    if (!confirm('Bạn có chắc muốn xóa ảnh đại diện?')) return;
    
    document.getElementById('remove_featured_image').value = '1';
    const currentFeatured = document.getElementById('current-featured');
    if (currentFeatured) {
        currentFeatured.style.opacity = '0.3';
    }
    alert('⚠️ Ảnh đại diện sẽ bị xóa khi lưu bài viết');
}

// Delete gallery image
function deleteImage(imageId) {
    if (!confirm('Bạn có chắc muốn xóa hình ảnh này?')) return;

    fetch(`{{ url('admin/posts/images') }}/${imageId}`, {
        method: 'DELETE',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Accept': 'application/json'
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            const imageElement = document.getElementById(`image-${imageId}`);
            if (imageElement) imageElement.remove();
            alert('✅ Đã xóa hình ảnh thành công!');
        } else {
            alert('❌ Có lỗi xảy ra khi xóa hình ảnh');
        }
    })
    .catch(error => {
        console.error(error);
        alert('❌ Có lỗi xảy ra khi xóa hình ảnh');
    });
}

// Preview featured image
document.getElementById('featured_image').addEventListener('change', function(e) {
    const file = e.target.files[0];
    const preview = document.getElementById('featuredPreview');
    preview.innerHTML = '';
    
    if (file) {
        const reader = new FileReader();
        reader.onload = function(event) {
            preview.innerHTML = `
                <img src="${event.target.result}" alt="Preview" 
                     style="max-width: 300px; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.1);">
            `;
            document.getElementById('remove_featured_image').value = '0';
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
            div.innerHTML = `
                <img src="${event.target.result}" alt="Preview" 
                     style="width: 100%; aspect-ratio: 1; object-fit: cover; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.1);">
            `;
            preview.appendChild(div);
        };
        reader.readAsDataURL(file);
    });
});
</script>
@endsection
