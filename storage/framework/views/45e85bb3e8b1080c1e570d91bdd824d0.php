

<?php $__env->startSection('title', 'Chỉnh sửa Bài viết'); ?>
<?php $__env->startSection('page-title', 'Chỉnh sửa Bài viết'); ?>

<?php $__env->startSection('content'); ?>
<div class="form-container">
    <div class="form-card">
        <div class="form-header">
            <h2>✏️ Chỉnh sửa Bài viết</h2>
        </div>

        <form action="<?php echo e(route('admin.posts.update', $post)); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>
            
            <div class="form-body">
                <div class="form-grid">
                    <!-- Main Content -->
                    <div>
                        <div class="form-group">
                            <label for="title" class="form-label">
                                Tiêu đề bài viết <span class="required">*</span>
                            </label>
                            <input type="text" name="title" id="title" value="<?php echo e(old('title', $post->title)); ?>" 
                                class="form-input <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required>
                            <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="form-error"><?php echo e($message); ?></span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="form-group">
                            <label for="slug" class="form-label">Slug (URL thân thiện)</label>
                            <input type="text" name="slug" id="slug" value="<?php echo e(old('slug', $post->slug)); ?>" 
                                class="form-input <?php $__errorArgs = ['slug'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                            <span class="form-hint">URL hiện tại: <strong><?php echo e($post->slug); ?></strong></span>
                            <?php $__errorArgs = ['slug'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="form-error"><?php echo e($message); ?></span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="form-group">
                            <label for="excerpt" class="form-label">Tóm tắt</label>
                            <textarea name="excerpt" id="excerpt" rows="3" 
                                class="form-textarea <?php $__errorArgs = ['excerpt'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"><?php echo e(old('excerpt', $post->excerpt)); ?></textarea>
                            <?php $__errorArgs = ['excerpt'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="form-error"><?php echo e($message); ?></span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="form-group">
                            <label for="content" class="form-label">
                                Nội dung <span class="required">*</span>
                            </label>
                            <textarea name="content" id="content" rows="15" 
                                class="form-textarea <?php $__errorArgs = ['content'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required><?php echo e(old('content', $post->content)); ?></textarea>
                            <?php $__errorArgs = ['content'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="form-error"><?php echo e($message); ?></span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <!-- Current Featured Image -->
                        <?php if($post->featured_image): ?>
                        <div class="form-group">
                            <label class="form-label">Ảnh đại diện hiện tại</label>
                            <div class="image-preview">
                                <div class="preview-item" id="current-featured">
                                    <img src="<?php echo e(asset('storage/' . $post->featured_image)); ?>" alt="Featured Image">
                                    <button type="button" onclick="removeFeaturedImage()" class="preview-remove">×</button>
                                </div>
                            </div>
                            <input type="hidden" name="remove_featured_image" id="remove_featured_image" value="0">
                        </div>
                        <?php endif; ?>

                        <!-- Upload New Featured Image -->
                        <div class="form-group">
                            <label for="featured_image" class="form-label">
                                <?php if($post->featured_image): ?> Thay đổi ảnh đại diện <?php else: ?> Ảnh đại diện <?php endif; ?>
                            </label>
                            <input type="file" name="featured_image" id="featured_image" accept="image/*"
                                class="form-input <?php $__errorArgs = ['featured_image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                            <span class="form-hint">Upload ảnh mới để thay thế</span>
                            <?php $__errorArgs = ['featured_image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="form-error"><?php echo e($message); ?></span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            <div id="featuredPreview" class="image-preview"></div>
                        </div>

                        <!-- Existing Gallery Images -->
                        <?php if($post->images->count() > 0): ?>
                        <div class="form-group">
                            <label class="form-label">Hình ảnh bổ sung (<?php echo e($post->images->count()); ?>)</label>
                            <div class="image-preview">
                                <?php $__currentLoopData = $post->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="preview-item" id="image-<?php echo e($image->id); ?>">
                                    <img src="<?php echo e(asset('storage/' . $image->image_path)); ?>" alt="Image <?php echo e($loop->iteration); ?>">
                                    <button type="button" onclick="deleteImage(<?php echo e($image->id); ?>)" class="preview-remove">×</button>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                        <?php endif; ?>

                        <!-- Add New Gallery Images -->
                        <div class="form-group">
                            <label for="images" class="form-label">Thêm hình ảnh bổ sung mới</label>
                            <input type="file" name="images[]" id="images" multiple accept="image/*"
                                class="form-input">
                            <span class="form-hint">Có thể chọn nhiều hình ảnh cùng lúc</span>
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
                                        class="form-select <?php $__errorArgs = ['status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required>
                                        <option value="draft" <?php echo e(old('status', $post->status) == 'draft' ? 'selected' : ''); ?>>
                                            📝 Bản nháp
                                        </option>
                                        <option value="published" <?php echo e(old('status', $post->status) == 'published' ? 'selected' : ''); ?>>
                                            ✅ Xuất bản
                                        </option>
                                        <option value="archived" <?php echo e(old('status', $post->status) == 'archived' ? 'selected' : ''); ?>>
                                            📦 Lưu trữ
                                        </option>
                                    </select>
                                    <?php $__errorArgs = ['status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="form-error"><?php echo e($message); ?></span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>

                                <div class="form-group">
                                    <label for="category_id" class="form-label">
                                        Danh mục <span class="required">*</span>
                                    </label>
                                    <select name="category_id" id="category_id" 
                                        class="form-select <?php $__errorArgs = ['category_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required>
                                        <option value="">Chọn danh mục</option>
                                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($category->id); ?>" <?php echo e(old('category_id', $post->category_id) == $category->id ? 'selected' : ''); ?>>
                                                <?php echo e($category->name); ?>

                                            </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php $__errorArgs = ['category_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="form-error"><?php echo e($message); ?></span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>

                                <div class="form-group">
                                    <label for="published_at" class="form-label">Ngày xuất bản</label>
                                    <input type="datetime-local" name="published_at" id="published_at" 
                                        value="<?php echo e(old('published_at', $post->published_at ? $post->published_at->format('Y-m-d\TH:i') : '')); ?>"
                                        class="form-input">
                                </div>

                                <div class="form-group">
                                    <label class="checkbox-label">
                                        <input type="checkbox" name="is_important" value="1" 
                                            <?php echo e(old('is_important', $post->is_important) ? 'checked' : ''); ?>>
                                        <span>⭐ Đánh dấu là tin quan trọng</span>
                                    </label>
                                    <span class="form-hint">Tin quan trọng sẽ hiển thị ở widget riêng trên trang chủ</span>
                                </div>
                            </div>

                            <div class="sidebar-section">
                                <h3 class="sidebar-title">📊 Thống kê</h3>
                                <div style="font-size: 0.875rem; color: #6b7280; line-height: 1.8;">
                                    <p><strong>👁️ Lượt xem:</strong> <?php echo e(number_format($post->views)); ?></p>
                                    <p><strong>📅 Tạo:</strong> <?php echo e($post->created_at->format('d/m/Y H:i')); ?></p>
                                    <p><strong>🔄 Cập nhật:</strong> <?php echo e($post->updated_at->format('d/m/Y H:i')); ?></p>
                                    <?php if($post->user): ?>
                                    <p><strong>👤 Tác giả:</strong> <?php echo e($post->user->name); ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-actions">
                                <button type="submit" class="btn-form-primary">
                                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path d="M19 21H5a2 2 0 01-2-2V5a2 2 0 012-2h11l5 5v11a2 2 0 01-2 2z"></path>
                                        <polyline points="17 21 17 13 7 13 7 21"></polyline>
                                        <polyline points="7 3 7 8 15 8"></polyline>
                                    </svg>
                                    Cập nhật
                                </button>
                                <a href="<?php echo e(route('admin.posts.index')); ?>" class="btn-form-secondary">
                                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <line x1="18" y1="6" x2="6" y2="18"></line>
                                        <line x1="6" y1="6" x2="18" y2="18"></line>
                                    </svg>
                                    Hủy
                                </a>
                            </div>

                            <a href="<?php echo e(route('news.show', $post->slug)); ?>" target="_blank" 
                               class="btn-form-primary" style="background: #10b981; margin-top: 0.75rem;">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                    <circle cx="12" cy="12" r="3"></circle>
                                </svg>
                                Xem trước
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<?php $__env->startPush('scripts'); ?>
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

        fetch(`<?php echo e(url('admin/posts/images')); ?>/${imageId}`, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>',
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

    // Preview new featured image
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
                div.className = 'preview-item';
                div.innerHTML = `<img src="${event.target.result}" alt="Preview">`;
                preview.appendChild(div);
            };
            reader.readAsDataURL(file);
        });
    });
</script>
<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\2251172552_Tung\vodic\resources\views/admin/posts/edit.blade.php ENDPATH**/ ?>