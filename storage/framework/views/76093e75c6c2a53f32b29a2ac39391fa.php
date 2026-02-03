<?php $__env->startSection('title', 'Thông tin cá nhân'); ?>

<?php $__env->startSection('content'); ?>
<div class="container" style="padding: 3rem 1.5rem; max-width: 800px;">
    <h1 style="font-size: 2rem; font-weight: 700; color: var(--text-primary); margin-bottom: 2rem;">👤 Thông tin cá nhân</h1>

    <?php if(session('status') === 'profile-updated'): ?>
        <div style="background: #d1fae5; border-left: 4px solid #10b981; padding: 1rem; border-radius: 8px; margin-bottom: 2rem;">
            <p style="color: #065f46; font-weight: 600;">✅ Thông tin đã được cập nhật thành công!</p>
        </div>
    <?php endif; ?>

    <?php if(session('status') === 'avatar-deleted'): ?>
        <div style="background: #d1fae5; border-left: 4px solid #10b981; padding: 1rem; border-radius: 8px; margin-bottom: 2rem;">
            <p style="color: #065f46; font-weight: 600;">✅ Ảnh đại diện đã được xóa thành công!</p>
        </div>
    <?php endif; ?>

    <!-- Avatar Section -->
    <div style="background: white; padding: 2rem; border-radius: 12px; box-shadow: 0 2px 8px rgba(0,0,0,0.1); margin-bottom: 2rem;">
        <h2 style="font-size: 1.25rem; font-weight: 700; color: var(--text-primary); margin-bottom: 1.5rem;">📸 Ảnh đại diện</h2>
        
        <div style="display: flex; align-items: center; gap: 2rem; flex-wrap: wrap;">
            <!-- Avatar Preview -->
            <div style="position: relative;">
                <?php if($user->hasAvatar()): ?>
                    <img id="avatar-preview" src="<?php echo e($user->getAvatarUrl()); ?>" alt="Avatar" 
                         style="width: 120px; height: 120px; border-radius: 50%; object-fit: cover; border: 4px solid #e5e7eb;">
                <?php else: ?>
                    <div id="avatar-preview" style="width: 120px; height: 120px; border-radius: 50%; background: linear-gradient(135deg, #0066cc, #0052a3); color: white; display: flex; align-items: center; justify-content: center; font-size: 3rem; font-weight: 700; border: 4px solid #e5e7eb;">
                        <?php echo e(strtoupper(substr($user->name, 0, 1))); ?>

                    </div>
                <?php endif; ?>
            </div>

            <!-- Upload Form -->
            <div style="flex: 1; min-width: 250px;">
                <form method="POST" action="<?php echo e(route('profile.update')); ?>" enctype="multipart/form-data" id="avatar-form">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PATCH'); ?>
                    
                    <input type="hidden" name="name" value="<?php echo e($user->name); ?>">
                    <input type="hidden" name="email" value="<?php echo e($user->email); ?>">
                    
                    <div style="margin-bottom: 1rem;">
                        <label for="avatar" style="display: inline-block; background: var(--ocean-blue); color: white; padding: 0.75rem 1.5rem; border-radius: 8px; cursor: pointer; font-weight: 600; font-size: 0.9rem;">
                            📤 Chọn ảnh mới
                        </label>
                        <input type="file" id="avatar" name="avatar" accept="image/*" style="display: none;" onchange="previewAvatar(this); this.form.submit();">
                        <?php $__errorArgs = ['avatar'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span style="color: #ef4444; font-size: 0.875rem; margin-top: 0.5rem; display: block;"><?php echo e($message); ?></span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    
                    <p style="font-size: 0.875rem; color: #666; margin-bottom: 0.5rem;">
                        Định dạng: JPG, JPEG, PNG, GIF
                    </p>
                    <p style="font-size: 0.875rem; color: #666;">
                        Kích thước tối đa: 2MB
                    </p>
                </form>

                <?php if($user->hasAvatar()): ?>
                <form method="POST" action="<?php echo e(route('profile.avatar.delete')); ?>" style="margin-top: 1rem;" onsubmit="return confirm('Bạn có chắc chắn muốn xóa ảnh đại diện?')">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <button type="submit" style="background: #ef4444; color: white; padding: 0.625rem 1.25rem; border-radius: 8px; border: none; font-weight: 600; cursor: pointer; font-size: 0.875rem;">
                        🗑️ Xóa ảnh đại diện
                    </button>
                </form>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <!-- Profile Information -->
    <div style="background: white; padding: 2rem; border-radius: 12px; box-shadow: 0 2px 8px rgba(0,0,0,0.1); margin-bottom: 2rem;">
        <h2 style="font-size: 1.25rem; font-weight: 700; color: var(--text-primary); margin-bottom: 1.5rem;">📝 Thông tin tài khoản</h2>
        
        <form method="POST" action="<?php echo e(route('profile.update')); ?>">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PATCH'); ?>

            <div style="margin-bottom: 1.5rem;">
                <label style="display: block; font-weight: 600; color: var(--text-primary); margin-bottom: 0.5rem;">
                    Tên hiển thị <span style="color: #ef4444;">*</span>
                </label>
                <input type="text" name="name" value="<?php echo e(old('name', $user->name)); ?>" required
                       style="width: 100%; padding: 0.75rem 1rem; border: 2px solid #e5e7eb; border-radius: 8px; font-size: 1rem;">
                <?php $__errorArgs = ['name'];
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
                    Email <span style="color: #ef4444;">*</span>
                </label>
                <input type="email" name="email" value="<?php echo e(old('email', $user->email)); ?>" required
                       style="width: 100%; padding: 0.75rem 1rem; border: 2px solid #e5e7eb; border-radius: 8px; font-size: 1rem;">
                <?php $__errorArgs = ['email'];
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

            <button type="submit" style="background: var(--ocean-blue); color: white; padding: 0.75rem 1.5rem; border-radius: 8px; border: none; font-weight: 600; cursor: pointer; font-size: 1rem;">
                💾 Lưu thay đổi
            </button>
        </form>
    </div>

    <!-- Update Password -->
    <div style="background: white; padding: 2rem; border-radius: 12px; box-shadow: 0 2px 8px rgba(0,0,0,0.1); margin-bottom: 2rem;">
        <h2 style="font-size: 1.25rem; font-weight: 700; color: var(--text-primary); margin-bottom: 1.5rem;">🔒 Đổi mật khẩu</h2>
        
        <form method="POST" action="<?php echo e(route('password.update')); ?>">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>

            <div style="margin-bottom: 1.5rem;">
                <label style="display: block; font-weight: 600; color: var(--text-primary); margin-bottom: 0.5rem;">
                    Mật khẩu hiện tại <span style="color: #ef4444;">*</span>
                </label>
                <input type="password" name="current_password" required
                       style="width: 100%; padding: 0.75rem 1rem; border: 2px solid #e5e7eb; border-radius: 8px; font-size: 1rem;">
                <?php $__errorArgs = ['current_password'];
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
                    Mật khẩu mới <span style="color: #ef4444;">*</span>
                </label>
                <input type="password" name="password" required
                       style="width: 100%; padding: 0.75rem 1rem; border: 2px solid #e5e7eb; border-radius: 8px; font-size: 1rem;">
                <?php $__errorArgs = ['password'];
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
                    Xác nhận mật khẩu mới <span style="color: #ef4444;">*</span>
                </label>
                <input type="password" name="password_confirmation" required
                       style="width: 100%; padding: 0.75rem 1rem; border: 2px solid #e5e7eb; border-radius: 8px; font-size: 1rem;">
            </div>

            <button type="submit" style="background: var(--ocean-blue); color: white; padding: 0.75rem 1.5rem; border-radius: 8px; border: none; font-weight: 600; cursor: pointer; font-size: 1rem;">
                🔐 Đổi mật khẩu
            </button>
        </form>
    </div>

    <!-- Account Stats -->
    <div style="background: white; padding: 2rem; border-radius: 12px; box-shadow: 0 2px 8px rgba(0,0,0,0.1);">
        <h2 style="font-size: 1.25rem; font-weight: 700; color: var(--text-primary); margin-bottom: 1.5rem;">📊 Thống kê tài khoản</h2>
        
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1.5rem;">
            <div style="text-align: center; padding: 1.5rem; background: linear-gradient(135deg, #e0e7ff, #c7d2fe); border-radius: 8px;">
                <div style="font-size: 2rem; font-weight: 700; color: #3730a3; margin-bottom: 0.5rem;">
                    <?php echo e($user->posts()->count()); ?>

                </div>
                <div style="color: #4c1d95; font-weight: 600;">Tổng bài viết</div>
            </div>

            <div style="text-align: center; padding: 1.5rem; background: linear-gradient(135deg, #d1fae5, #a7f3d0); border-radius: 8px;">
                <div style="font-size: 2rem; font-weight: 700; color: #065f46; margin-bottom: 0.5rem;">
                    <?php echo e($user->posts()->where('status', 'published')->count()); ?>

                </div>
                <div style="color: #064e3b; font-weight: 600;">Đã xuất bản</div>
            </div>

            <div style="text-align: center; padding: 1.5rem; background: linear-gradient(135deg, #fef3c7, #fde68a); border-radius: 8px;">
                <div style="font-size: 2rem; font-weight: 700; color: #92400e; margin-bottom: 0.5rem;">
                    <?php echo e($user->posts()->where('status', 'draft')->count()); ?>

                </div>
                <div style="color: #78350f; font-weight: 600;">Bản nháp</div>
            </div>
        </div>

        <div style="margin-top: 1.5rem; padding-top: 1.5rem; border-top: 1px solid #e5e7eb;">
            <p style="color: var(--text-secondary); font-size: 0.875rem;">
                <strong>Ngày tham gia:</strong> <?php echo e($user->created_at->format('d/m/Y')); ?>

            </p>
            <p style="color: var(--text-secondary); font-size: 0.875rem; margin-top: 0.5rem;">
                <strong>Vai trò:</strong> 
                <?php if($user->is_admin): ?>
                    <span style="color: #dc2626; font-weight: 600;">👑 Quản trị viên</span>
                <?php else: ?>
                    <span style="color: #0066cc; font-weight: 600;">👤 Người dùng</span>
                <?php endif; ?>
            </p>
        </div>
    </div>
</div>

<script>
function previewAvatar(input) {
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        
        reader.onload = function(e) {
            const preview = document.getElementById('avatar-preview');
            if (preview.tagName === 'IMG') {
                preview.src = e.target.result;
            } else {
                // Replace div with img
                const img = document.createElement('img');
                img.id = 'avatar-preview';
                img.src = e.target.result;
                img.alt = 'Avatar';
                img.style.cssText = 'width: 120px; height: 120px; border-radius: 50%; object-fit: cover; border: 4px solid #e5e7eb;';
                preview.parentNode.replaceChild(img, preview);
            }
        }
        
        reader.readAsDataURL(input.files[0]);
    }
}
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\2251172552_Tung\vodic\resources\views/profile/edit.blade.php ENDPATH**/ ?>