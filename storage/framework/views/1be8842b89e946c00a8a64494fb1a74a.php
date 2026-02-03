

<?php $__env->startSection('title', 'Bài viết của tôi'); ?>

<?php $__env->startSection('content'); ?>
<div class="container" style="padding: 3rem 1.5rem; max-width: 1200px;">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem;">
        <h1 style="font-size: 2rem; font-weight: 700; color: var(--text-primary);">📝 Bài viết của tôi</h1>
        <a href="<?php echo e(route('user.posts.create')); ?>" style="background: var(--ocean-blue); color: white; padding: 0.75rem 1.5rem; border-radius: 8px; text-decoration: none; font-weight: 600; display: inline-flex; align-items: center; gap: 0.5rem;">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <line x1="12" y1="5" x2="12" y2="19"></line>
                <line x1="5" y1="12" x2="19" y2="12"></line>
            </svg>
            Tạo bài viết mới
        </a>
    </div>

    <?php if(session('success')): ?>
        <div style="background: #d1fae5; border-left: 4px solid #10b981; padding: 1rem; border-radius: 8px; margin-bottom: 1.5rem;">
            <p style="color: #065f46; font-weight: 600;">✅ <?php echo e(session('success')); ?></p>
        </div>
    <?php endif; ?>

    <?php if(session('error')): ?>
        <div style="background: #fee2e2; border-left: 4px solid #ef4444; padding: 1rem; border-radius: 8px; margin-bottom: 1.5rem;">
            <p style="color: #991b1b; font-weight: 600;">❌ <?php echo e(session('error')); ?></p>
        </div>
    <?php endif; ?>

    <?php if($posts->count() > 0): ?>
        <div style="background: white; border-radius: 12px; box-shadow: 0 2px 8px rgba(0,0,0,0.1); overflow: hidden;">
            <table style="width: 100%; border-collapse: collapse;">
                <thead style="background: #f9fafb;">
                    <tr>
                        <th style="padding: 1rem; text-align: left; font-weight: 600; color: var(--text-secondary);">Tiêu đề</th>
                        <th style="padding: 1rem; text-align: left; font-weight: 600; color: var(--text-secondary);">Danh mục</th>
                        <th style="padding: 1rem; text-align: left; font-weight: 600; color: var(--text-secondary);">Trạng thái</th>
                        <th style="padding: 1rem; text-align: left; font-weight: 600; color: var(--text-secondary);">Lượt xem</th>
                        <th style="padding: 1rem; text-align: left; font-weight: 600; color: var(--text-secondary);">Ngày tạo</th>
                        <th style="padding: 1rem; text-align: left; font-weight: 600; color: var(--text-secondary);">Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr style="border-top: 1px solid #e5e7eb;">
                        <td style="padding: 1rem;">
                            <div style="display: flex; align-items: center; gap: 1rem;">
                                <?php if($post->featured_image): ?>
                                    <img src="<?php echo e(asset('storage/' . $post->featured_image)); ?>" alt="<?php echo e($post->title); ?>" 
                                         style="width: 60px; height: 60px; object-fit: cover; border-radius: 8px;">
                                <?php else: ?>
                                    <div style="width: 60px; height: 60px; background: linear-gradient(135deg, #e0e7ff, #c7d2fe); border-radius: 8px; display: flex; align-items: center; justify-content: center;">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#6366f1" stroke-width="2">
                                            <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                                            <circle cx="8.5" cy="8.5" r="1.5"></circle>
                                            <polyline points="21 15 16 10 5 21"></polyline>
                                        </svg>
                                    </div>
                                <?php endif; ?>
                                <div>
                                    <strong style="color: var(--text-primary); display: block; margin-bottom: 0.25rem;"><?php echo e($post->title); ?></strong>
                                    <span style="color: var(--text-secondary); font-size: 0.875rem;"><?php echo e(Str::limit($post->excerpt, 60)); ?></span>
                                </div>
                            </div>
                        </td>
                        <td style="padding: 1rem;">
                            <span style="background: #e0e7ff; color: #3730a3; padding: 0.375rem 0.75rem; border-radius: 6px; font-size: 0.875rem; font-weight: 600;">
                                <?php echo e($post->category->name); ?>

                            </span>
                        </td>
                        <td style="padding: 1rem;">
                            <?php if($post->status === 'published'): ?>
                                <span style="background: #d1fae5; color: #065f46; padding: 0.375rem 0.75rem; border-radius: 6px; font-size: 0.875rem; font-weight: 600;">
                                    ✅ Đã xuất bản
                                </span>
                            <?php elseif($post->status === 'draft'): ?>
                                <span style="background: #fef3c7; color: #92400e; padding: 0.375rem 0.75rem; border-radius: 6px; font-size: 0.875rem; font-weight: 600;">
                                    📝 Bản nháp
                                </span>
                            <?php else: ?>
                                <span style="background: #e5e7eb; color: #374151; padding: 0.375rem 0.75rem; border-radius: 6px; font-size: 0.875rem; font-weight: 600;">
                                    📦 Lưu trữ
                                </span>
                            <?php endif; ?>
                        </td>
                        <td style="padding: 1rem;">
                            <strong style="color: var(--ocean-blue);"><?php echo e(number_format($post->views)); ?></strong>
                        </td>
                        <td style="padding: 1rem; color: var(--text-secondary);">
                            <?php echo e($post->created_at->format('d/m/Y')); ?>

                        </td>
                        <td style="padding: 1rem;">
                            <div style="display: flex; gap: 0.5rem;">
                                <?php if($post->status === 'published'): ?>
                                    <a href="<?php echo e(route('news.show', $post->slug)); ?>" target="_blank" 
                                       style="background: #e0e7ff; color: #3730a3; padding: 0.5rem 0.75rem; border-radius: 6px; text-decoration: none; font-size: 0.875rem; font-weight: 600;">
                                        👁️ Xem
                                    </a>
                                <?php endif; ?>
                                
                                <?php if($post->status === 'draft'): ?>
                                    <a href="<?php echo e(route('user.posts.edit', $post)); ?>" 
                                       style="background: #dbeafe; color: #1e40af; padding: 0.5rem 0.75rem; border-radius: 6px; text-decoration: none; font-size: 0.875rem; font-weight: 600;">
                                        ✏️ Sửa
                                    </a>
                                    <form action="<?php echo e(route('user.posts.destroy', $post)); ?>" method="POST" style="display: inline;">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button type="submit" onclick="return confirm('Bạn có chắc muốn xóa bài viết này?')"
                                                style="background: #fee2e2; color: #991b1b; padding: 0.5rem 0.75rem; border-radius: 6px; border: none; cursor: pointer; font-size: 0.875rem; font-weight: 600;">
                                            🗑️ Xóa
                                        </button>
                                    </form>
                                <?php else: ?>
                                    <span style="color: var(--text-secondary); font-size: 0.875rem; font-style: italic;">
                                        Không thể sửa
                                    </span>
                                <?php endif; ?>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>

        <div style="margin-top: 2rem;">
            <?php echo e($posts->links()); ?>

        </div>
    <?php else: ?>
        <div style="background: white; border-radius: 12px; padding: 4rem 2rem; text-align: center; box-shadow: 0 2px 8px rgba(0,0,0,0.1);">
            <svg width="80" height="80" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" style="margin: 0 auto 1.5rem; color: var(--gray-400);">
                <path d="M11 4H4a2 2 0 00-2 2v14a2 2 0 002 2h14a2 2 0 002-2v-7"></path>
                <path d="M18.5 2.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 9.5-9.5z"></path>
            </svg>
            <h3 style="font-size: 1.5rem; font-weight: 700; color: var(--text-primary); margin-bottom: 0.5rem;">Chưa có bài viết nào</h3>
            <p style="color: var(--text-secondary); margin-bottom: 2rem;">Hãy tạo bài viết đầu tiên của bạn!</p>
            <a href="<?php echo e(route('user.posts.create')); ?>" style="background: var(--ocean-blue); color: white; padding: 0.875rem 2rem; border-radius: 8px; text-decoration: none; font-weight: 600; display: inline-flex; align-items: center; gap: 0.5rem;">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <line x1="12" y1="5" x2="12" y2="19"></line>
                    <line x1="5" y1="12" x2="19" y2="12"></line>
                </svg>
                Tạo bài viết mới
            </a>
        </div>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\2251172552_Tung\vodic\resources\views/user/posts/index.blade.php ENDPATH**/ ?>