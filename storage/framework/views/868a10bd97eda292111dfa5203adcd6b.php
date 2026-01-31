

<?php $__env->startSection('title', 'Quản lý Người dùng'); ?>
<?php $__env->startSection('page-title', 'Quản lý Người dùng'); ?>

<?php $__env->startSection('content'); ?>
<div class="admin-card">
    <div class="card-header">
        <h2 class="card-title">👥 Danh sách Người dùng</h2>
        <a href="<?php echo e(route('admin.users.create')); ?>" class="btn-primary-admin" style="text-decoration: none !important; border-bottom: none !important; box-shadow: 0 2px 8px rgba(0, 102, 204, 0.3) !important; outline: none !important;">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M16 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"></path>
                <circle cx="8.5" cy="7" r="4"></circle>
                <line x1="20" y1="8" x2="20" y2="14"></line>
                <line x1="23" y1="11" x2="17" y2="11"></line>
            </svg>
            <span style="text-decoration: none !important; border-bottom: none !important;">Thêm người dùng</span>
        </a>
    </div>

    <div style="padding: 1.5rem 2rem;">
        <!-- Filters -->
        <form method="GET" class="filters-container">
            <input type="text" name="search" value="<?php echo e(request('search')); ?>" 
                   placeholder="Tìm kiếm theo tên, email..." 
                   class="filter-select" style="min-width: 300px;">
            
            <select name="status" class="filter-select" onchange="this.form.submit()">
                <option value="">Tất cả trạng thái</option>
                <option value="active" <?php echo e(request('status') == 'active' ? 'selected' : ''); ?>>✅ Đang hoạt động</option>
                <option value="locked" <?php echo e(request('status') == 'locked' ? 'selected' : ''); ?>>🔒 Đã khóa</option>
            </select>

            <select name="role" class="filter-select" onchange="this.form.submit()">
                <option value="">Tất cả vai trò</option>
                <option value="admin" <?php echo e(request('role') == 'admin' ? 'selected' : ''); ?>>👑 Admin</option>
                <option value="user" <?php echo e(request('role') == 'user' ? 'selected' : ''); ?>>👤 User</option>
            </select>

            <button type="submit" class="btn-admin btn-secondary-admin">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <circle cx="11" cy="11" r="8"></circle>
                    <path d="M21 21l-4.35-4.35"></path>
                </svg>
                Tìm kiếm
            </button>

            <?php if(request()->hasAny(['search', 'status', 'role'])): ?>
                <a href="<?php echo e(route('admin.users.index')); ?>" class="btn-admin btn-secondary-admin">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                    Xóa bộ lọc
                </a>
            <?php endif; ?>
        </form>

        <!-- Success/Error Messages -->
        <?php if(session('success')): ?>
            <div class="alert-admin alert-success">
                ✅ <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?>

        <?php if(session('error')): ?>
            <div class="alert-admin alert-error">
                ❌ <?php echo e(session('error')); ?>

            </div>
        <?php endif; ?>

        <!-- Users Table -->
        <?php if($users->count() > 0): ?>
            <div style="overflow-x: auto; -webkit-overflow-scrolling: touch; margin: 0 -2rem; padding: 0 2rem;">
                <table class="admin-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên</th>
                            <th>Email</th>
                            <th>Vai trò</th>
                            <th>Bài viết</th>
                            <th>Trạng thái</th>
                            <th>Ngày tạo</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><strong>#<?php echo e($user->id); ?></strong></td>
                            <td>
                                <div style="display: flex; align-items: center; gap: 0.75rem;">
                                    <div style="width: 40px; height: 40px; border-radius: 50%; background: linear-gradient(135deg, #0066cc, #003d82); display: flex; align-items: center; justify-content: center; color: white; font-weight: 700; flex-shrink: 0;">
                                        <?php echo e(strtoupper(substr($user->name, 0, 1))); ?>

                                    </div>
                                    <div style="min-width: 0;">
                                        <strong><?php echo e($user->name); ?></strong>
                                        <?php if($user->id === auth()->id()): ?>
                                            <span style="color: #0066cc; font-size: 0.75rem;">(Bạn)</span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </td>
                            <td><?php echo e($user->email); ?></td>
                            <td>
                                <?php if($user->is_admin): ?>
                                    <span class="status-badge" style="background: #fef3c7; color: #92400e; white-space: nowrap;">
                                        <span style="display: inline-block;">👑</span> <span style="display: inline-block;">Admin</span>
                                    </span>
                                <?php else: ?>
                                    <span class="status-badge" style="background: #e0e7ff; color: #3730a3; white-space: nowrap;">
                                        <span style="display: inline-block;">👤</span> <span style="display: inline-block;">User</span>
                                    </span>
                                <?php endif; ?>
                            </td>
                            <td style="white-space: nowrap;">
                                <strong><?php echo e($user->posts_count); ?></strong> bài viết
                            </td>
                            <td>
                                <?php if($user->is_locked): ?>
                                    <span class="status-badge" style="background: #fee2e2; color: #991b1b; white-space: nowrap;">
                                        <span style="display: inline-block;">🔒</span> <span style="display: inline-block;">Đã khóa</span>
                                    </span>
                                <?php else: ?>
                                    <span class="status-badge status-published" style="white-space: nowrap;">
                                        <span style="display: inline-block;">✅</span> <span style="display: inline-block;">Hoạt động</span>
                                    </span>
                                <?php endif; ?>
                            </td>
                            <td style="white-space: nowrap;"><?php echo e($user->created_at->format('d/m/Y')); ?></td>
                            <td>
                                <div class="action-buttons" style="white-space: nowrap;">
                                    <a href="<?php echo e(route('admin.users.edit', $user)); ?>" class="action-btn action-edit">
                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <path d="M11 4H4a2 2 0 00-2 2v14a2 2 0 002 2h14a2 2 0 002-2v-7"></path>
                                            <path d="M18.5 2.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                        </svg>
                                        Sửa
                                    </a>

                                    <?php if($user->id !== auth()->id()): ?>
                                        <?php if($user->is_locked): ?>
                                            <form action="<?php echo e(route('admin.users.unlock', $user)); ?>" method="POST" style="display: inline;">
                                                <?php echo csrf_field(); ?>
                                                <button type="submit" class="action-btn" style="background: #d1fae5; color: #065f46;">
                                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                        <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                                                        <path d="M7 11V7a5 5 0 0110 0v4"></path>
                                                    </svg>
                                                    Mở khóa
                                                </button>
                                            </form>
                                        <?php else: ?>
                                            <form action="<?php echo e(route('admin.users.lock', $user)); ?>" method="POST" style="display: inline;">
                                                <?php echo csrf_field(); ?>
                                                <button type="submit" class="action-btn" style="background: #fef3c7; color: #92400e;" 
                                                        onclick="return confirm('Bạn có chắc muốn khóa tài khoản này?')">
                                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                        <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                                                        <path d="M7 11V7a5 5 0 019.9-1"></path>
                                                    </svg>
                                                    Khóa
                                                </button>
                                            </form>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div style="margin-top: 1.5rem;">
                <?php echo e($users->links()); ?>

            </div>
        <?php else: ?>
            <div class="empty-state">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"></path>
                    <circle cx="9" cy="7" r="4"></circle>
                    <path d="M23 21v-2a4 4 0 00-3-3.87M16 3.13a4 4 0 010 7.75"></path>
                </svg>
                <h3>Không tìm thấy người dùng</h3>
                <p>Không có người dùng nào phù hợp với bộ lọc của bạn.</p>
            </div>
        <?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\2251172552_Tung\vodic\resources\views/admin/users/index.blade.php ENDPATH**/ ?>