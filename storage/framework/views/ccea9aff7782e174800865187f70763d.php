

<?php $__env->startSection('title', 'Tạo bài viết mới'); ?>

<?php $__env->startSection('content'); ?>
<div class="container" style="padding: 3rem 1.5rem; max-width: 900px;">
    <h1 style="font-size: 2rem; font-weight: 700; color: var(--text-primary); margin-bottom: 2rem;">✍️ Tạo bài viết mới</h1>

    <div style="background: #fef3c7; border-left: 4px solid #f59e0b; padding: 1rem; border-radius: 8px; margin-bottom: 2rem;">
        <p style="color: #92400e; font-weight: 600;">ℹ️ Bài viết của bạn sẽ ở trạng thái <strong>Bản nháp</strong> và cần được Admin duyệt trước khi xuất bản.</p>
    </div>

    <form action="<?php echo e(route('user.posts.store')); ?>" method="POST" enctype="multipart/form-data" style="background: white; padding: 2rem; border-radius: 12px; box-shadow: 0 2px 8px rgba(0,0,0,0.1);">
        <?php echo csrf_field(); ?>

        <div style="margin-bottom: 1.5rem;">
            <label style="display: block; font-weight: 600; color: var(--text-primary); margin-bottom: 0.5rem;">
                Tiêu đề bài viết <span style="color: #ef4444;">*</span>
            </label>
            <input type="text" name="title" id="title" value="<?php echo e(old('title')); ?>" required
                   style="width: 100%; padding: 0.75rem 1rem; border: 2px solid #e5e7eb; border-radius: 8px; font-size: 1rem; transition: border-color 0.2s;"
                   onfocus="this.style.borderColor='var(--ocean-blue)'" onblur="this.style.borderColor='#e5e7eb'"
                   placeholder="Nhập tiêu đề bài viết...">
            <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <span style="color: #ef4444; font-size: 0.875rem; margin-top: 0.25rem; display: block;"><?php echo e($message); ?></span>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <div style="margin-bottom: 1.5rem;">
            <label style="display: block; font-weight: 600; color: var(--text-primary); margin-bottom: 0.5rem;">
                Slug (URL thân thiện)
            </label>
            <input type="text" name="slug" id="slug" value="<?php echo e(old('slug')); ?>"
                   style="width: 100%; padding: 0.75rem 1rem; border: 2px solid #e5e7eb; border-radius: 8px; font-size: 1rem;"
                   placeholder="tu-dong-tao-tu-tieu-de">
            <span style="color: var(--text-secondary); font-size: 0.875rem; margin-top: 0.25rem; display: block;">Để trống để tự động tạo từ tiêu đề</span>
        </div>

        <div style="margin-bottom: 1.5rem;">
            <label style="display: block; font-weight: 600; color: var(--text-primary); margin-bottom: 0.5rem;">
                Danh mục <span style="color: #ef4444;">*</span>
            </label>
            <select name="category_id" required
                    style="width: 100%; padding: 0.75rem 1rem; border: 2px solid #e5e7eb; border-radius: 8px; font-size: 1rem;">
                <option value="">Chọn danh mục</option>
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($category->id); ?>" <?php echo e(old('category_id') == $category->id ? 'selected' : ''); ?>>
                        <?php echo e($category->name); ?>

                    </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            <?php $__errorArgs = ['category_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <span style="color: #ef4444; font-size: 0.875rem; margin-top: 0.25rem; display: block;"><?php echo e($message); ?></span>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <div style="margin-bottom: 1.5rem;">
            <label style="display: block; font-weight: 600; color: var(--text-primary); margin-bottom: 0.5rem;">
                Tóm tắt
            </label>
            <textarea name="excerpt" rows="3"
                      style="width: 100%; padding: 0.75rem 1rem; border: 2px solid #e5e7eb; border-radius: 8px; font-size: 1rem; font-family: inherit;"
                      placeholder="Mô tả ngắn về bài viết..."><?php echo e(old('excerpt')); ?></textarea>
        </div>

        <div style="margin-bottom: 1.5rem;">
            <label style="display: block; font-weight: 600; color: var(--text-primary); margin-bottom: 0.5rem;">
                Nội dung <span style="color: #ef4444;">*</span>
            </label>
            <textarea name="content" id="content" rows="15" required
                      style="width: 100%; padding: 0.75rem 1rem; border: 2px solid #e5e7eb; border-radius: 8px; font-size: 1rem; font-family: inherit;"
                      placeholder="Viết nội dung bài viết của bạn..."><?php echo e(old('content')); ?></textarea>
            <?php $__errorArgs = ['content'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <span style="color: #ef4444; font-size: 0.875rem; margin-top: 0.25rem; display: block;"><?php echo e($message); ?></span>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <div style="margin-bottom: 1.5rem;">
            <label style="display: block; font-weight: 600; color: var(--text-primary); margin-bottom: 0.5rem;">
                Ảnh đại diện
            </label>
            <input type="file" name="featured_image" id="featured_image" accept="image/*"
                   style="width: 100%; padding: 0.75rem 1rem; border: 2px solid #e5e7eb; border-radius: 8px;">
            <div id="featuredPreview" style="margin-top: 1rem;"></div>
        </div>

        <div style="margin-bottom: 2rem;">
            <label style="display: block; font-weight: 600; color: var(--text-primary); margin-bottom: 0.5rem;">
                Hình ảnh bổ sung
            </label>
            <input type="file" name="images[]" id="images" multiple accept="image/*"
                   style="width: 100%; padding: 0.75rem 1rem; border: 2px solid #e5e7eb; border-radius: 8px;">
            <span style="color: var(--text-secondary); font-size: 0.875rem; margin-top: 0.25rem; display: block;">Có thể chọn nhiều hình ảnh</span>
            <div id="imagesPreview" style="margin-top: 1rem; display: grid; grid-template-columns: repeat(auto-fill, minmax(120px, 1fr)); gap: 1rem;"></div>
        </div>

        <div style="display: flex; gap: 1rem;">
            <button type="submit" style="background: var(--ocean-blue); color: white; padding: 0.875rem 2rem; border-radius: 8px; border: none; font-weight: 600; cursor: pointer; font-size: 1rem;">
                📝 Tạo bài viết
            </button>
            <a href="<?php echo e(route('user.posts.index')); ?>" style="background: #e5e7eb; color: var(--text-primary); padding: 0.875rem 2rem; border-radius: 8px; text-decoration: none; font-weight: 600; display: inline-block;">
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\2251172552_Tung\vodic\resources\views/user/posts/create.blade.php ENDPATH**/ ?>