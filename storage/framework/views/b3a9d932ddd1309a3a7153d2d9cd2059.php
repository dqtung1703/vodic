

<?php $__env->startSection('title', 'Tin tức - VODIC'); ?>

<?php $__env->startSection('content'); ?>
<!-- Page Header -->
<div style="background: linear-gradient(135deg, var(--ocean-dark), var(--ocean-blue)); padding: 3rem 1.5rem; color: white;">
    <div class="container" style="max-width: 1400px; margin: 0 auto;">
        <!-- Breadcrumb -->
        <nav class="breadcrumb" style="color: rgba(255,255,255,0.8); margin-bottom: 1.5rem;">
            <a href="<?php echo e(route('home')); ?>" style="color: rgba(255,255,255,0.9);">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="display: inline-block; vertical-align: middle;">
                    <path d="M3 9l9-7 9 7v11a2 2 0 01-2 2H5a2 2 0 01-2-2z"/>
                </svg>
                Trang chủ
            </a>
            <span style="margin: 0 0.5rem;">/</span>
            <span style="color: white;">Tin tức</span>
        </nav>
        
        <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 1rem;">
            <div>
                <h1 style="font-size: 2.5rem; font-weight: 800; margin-bottom: 0.5rem; color: white;">Tin tức</h1>
                <p style="font-size: 1.125rem; opacity: 0.9;">Cập nhật thông tin mới nhất từ VODIC</p>
            </div>
            
            <!-- Search Box -->
            <div style="display: flex; background: white; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 12px rgba(0,0,0,0.15);">
                <form action="<?php echo e(route('news.index')); ?>" method="GET" style="display: flex;">
                    <input type="text" 
                           name="search" 
                           placeholder="Tìm kiếm tin tức..." 
                           value="<?php echo e(request('search')); ?>"
                           style="border: none; padding: 0.75rem 1.25rem; font-size: 0.9375rem; width: 280px; outline: none;">
                    <button type="submit" style="background: var(--ocean-blue); border: none; padding: 0.75rem 1.5rem; color: white; cursor: pointer; font-weight: 600; transition: background 0.25s;">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="11" cy="11" r="8"/>
                            <path d="M21 21l-4.35-4.35"/>
                        </svg>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="container" style="max-width: 1400px; margin: 0 auto; padding: 2rem 1.5rem;">
    <!-- Filter Section -->
    <div style="background: white; padding: 1.5rem; border-radius: 12px; margin-bottom: 2rem; box-shadow: 0 1px 3px rgba(0,0,0,0.1);">
        <div style="display: flex; align-items: center; gap: 1rem; flex-wrap: wrap;">
            <div style="display: flex; align-items: center; gap: 0.5rem; color: var(--gray-700); font-weight: 600;">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"/>
                </svg>
                Lọc theo danh mục:
            </div>
            
            <div style="display: flex; gap: 0.75rem; flex-wrap: wrap; flex: 1;">
                <a href="<?php echo e(route('news.index')); ?>" 
                   class="badge <?php echo e(!request('category') ? 'badge-primary' : ''); ?>"
                   style="padding: 0.5rem 1rem; border-radius: 20px; font-size: 0.875rem; font-weight: 600; transition: all 0.25s; 
                          <?php echo e(!request('category') ? 'background: var(--ocean-blue); color: white;' : 'background: var(--gray-200); color: var(--gray-700);'); ?>">
                    Tất cả
                </a>
                
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a href="<?php echo e(route('news.index', ['category' => $cat->slug])); ?>" 
                       class="badge <?php echo e(request('category') == $cat->slug ? 'badge-primary' : ''); ?>"
                       style="padding: 0.5rem 1rem; border-radius: 20px; font-size: 0.875rem; font-weight: 600; transition: all 0.25s;
                              <?php echo e(request('category') == $cat->slug ? 'background: var(--ocean-blue); color: white;' : 'background: var(--gray-200); color: var(--gray-700);'); ?>">
                        <?php echo e($cat->name); ?>

                        <span style="opacity: 0.8;">(<?php echo e($cat->posts_count ?? 0); ?>)</span>
                    </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>

    <!-- Posts Grid -->
    <div class="news-grid" style="margin-bottom: 3rem;">
        <?php $__empty_1 = true; $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <article class="news-card">
                <div class="news-badge">
                    <span class="badge-category"><?php echo e($post->category->name); ?></span>
                </div>
                
                <?php if($post->featured_image): ?>
                    <a href="<?php echo e(route('news.show', $post->slug)); ?>" class="news-image-link">
                        <img src="<?php echo e(asset('storage/' . $post->featured_image)); ?>" 
                             alt="<?php echo e($post->title); ?>"
                             class="news-image"
                             loading="lazy">
                    </a>
                <?php else: ?>
                    <a href="<?php echo e(route('news.show', $post->slug)); ?>" class="news-image-link">
                        <div style="width: 100%; height: 220px; background: linear-gradient(135deg, var(--ocean-blue), var(--ocean-light)); display: flex; align-items: center; justify-content: center;">
                            <svg width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="1.5">
                                <rect x="3" y="3" width="18" height="18" rx="2" ry="2"/>
                                <circle cx="8.5" cy="8.5" r="1.5"/>
                                <polyline points="21 15 16 10 5 21"/>
                            </svg>
                        </div>
                    </a>
                <?php endif; ?>
                
                <div class="news-content">
                    <h2 class="news-title">
                        <a href="<?php echo e(route('news.show', $post->slug)); ?>"><?php echo e($post->title); ?></a>
                    </h2>
                    
                    <?php if($post->excerpt): ?>
                        <p class="news-excerpt"><?php echo e(Str::limit($post->excerpt, 120)); ?></p>
                    <?php endif; ?>
                    
                    <div class="news-meta">
                        <span class="news-date">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <rect x="3" y="4" width="18" height="18" rx="2" ry="2"/>
                                <line x1="16" y1="2" x2="16" y2="6"/>
                                <line x1="8" y1="2" x2="8" y2="6"/>
                                <line x1="3" y1="10" x2="21" y2="10"/>
                            </svg>
                            <?php echo e($post->published_at->format('d/m/Y')); ?>

                        </span>
                        <span class="news-views">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/>
                                <circle cx="12" cy="12" r="3"/>
                            </svg>
                            <?php echo e(number_format($post->views)); ?>

                        </span>
                    </div>
                </div>
            </article>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <div style="grid-column: 1/-1; text-align: center; padding: 5rem 2rem; background: white; border-radius: 12px;">
                <svg width="80" height="80" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" style="margin: 0 auto 1.5rem; color: var(--gray-300);">
                    <path d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9.5a2 2 0 00-2-2h-2"/>
                </svg>
                <h3 style="font-size: 1.5rem; font-weight: 700; color: var(--gray-900); margin-bottom: 0.5rem;">
                    <?php if(request('search')): ?>
                        Không tìm thấy kết quả
                    <?php elseif(request('category')): ?>
                        Danh mục này chưa có bài viết
                    <?php else: ?>
                        Chưa có bài viết nào
                    <?php endif; ?>
                </h3>
                <p style="color: var(--gray-600); margin-bottom: 1.5rem;">
                    <?php if(request('search')): ?>
                        Không tìm thấy bài viết nào với từ khóa "<?php echo e(request('search')); ?>"
                    <?php else: ?>
                        Vui lòng quay lại sau hoặc xem các danh mục khác
                    <?php endif; ?>
                </p>
                
                <?php if(request('search') || request('category')): ?>
                    <a href="<?php echo e(route('news.index')); ?>" class="btn btn-primary">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M3 9l9-7 9 7v11a2 2 0 01-2 2H5a2 2 0 01-2-2z"/>
                        </svg>
                        Xem tất cả tin tức
                    </a>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </div>

    <!-- Pagination -->
    <?php if($posts->hasPages()): ?>
        <div class="pagination">
            
            <?php if($posts->onFirstPage()): ?>
                <span class="pagination-btn disabled">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <polyline points="15 18 9 12 15 6"/>
                    </svg>
                    <span>Trang trước</span>
                </span>
            <?php else: ?>
                <a href="<?php echo e($posts->previousPageUrl()); ?>" class="pagination-btn">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <polyline points="15 18 9 12 15 6"/>
                    </svg>
                    <span>Trang trước</span>
                </a>
            <?php endif; ?>

            
            <div class="pagination-numbers">
                <?php $__currentLoopData = $posts->links()->elements[0]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page => $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($page == $posts->currentPage()): ?>
                        <span class="pagination-number active"><?php echo e($page); ?></span>
                    <?php else: ?>
                        <a href="<?php echo e($url); ?>" class="pagination-number"><?php echo e($page); ?></a>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

            
            <?php if($posts->hasMorePages()): ?>
                <a href="<?php echo e($posts->nextPageUrl()); ?>" class="pagination-btn">
                    <span>Trang sau</span>
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <polyline points="9 18 15 12 9 6"/>
                    </svg>
                </a>
            <?php else: ?>
                <span class="pagination-btn disabled">
                    <span>Trang sau</span>
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <polyline points="9 18 15 12 9 6"/>
                    </svg>
                </span>
            <?php endif; ?>
        </div>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<style>
.badge:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
}

/* Enhanced Pagination Styles */
.pagination {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 0.75rem;
    margin-top: 3rem;
    flex-wrap: wrap;
}

.pagination-btn {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.75rem 1.25rem;
    background: white;
    border: 2px solid #e2e8f0;
    border-radius: 10px;
    color: #475569;
    font-weight: 600;
    font-size: 0.9375rem;
    text-decoration: none;
    transition: all 0.3s ease;
    cursor: pointer;
}

.pagination-btn:not(.disabled):hover {
    background: var(--ocean-blue);
    color: white;
    border-color: var(--ocean-blue);
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(0, 102, 204, 0.3);
}

.pagination-btn.disabled {
    opacity: 0.4;
    cursor: not-allowed;
    background: #f8fafc;
}

.pagination-btn svg {
    flex-shrink: 0;
}

.pagination-numbers {
    display: flex;
    gap: 0.5rem;
    align-items: center;
}

.pagination-number {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    min-width: 44px;
    height: 44px;
    padding: 0 0.75rem;
    background: white;
    border: 2px solid #e2e8f0;
    border-radius: 10px;
    color: #475569;
    font-weight: 600;
    font-size: 0.9375rem;
    text-decoration: none;
    transition: all 0.3s ease;
}

.pagination-number:hover {
    background: #f0f9ff;
    border-color: var(--ocean-blue);
    color: var(--ocean-blue);
    transform: translateY(-2px);
}

.pagination-number.active {
    background: linear-gradient(135deg, var(--ocean-blue), var(--ocean-dark));
    color: white;
    border-color: var(--ocean-blue);
    box-shadow: 0 4px 12px rgba(0, 102, 204, 0.3);
}

@media (max-width: 640px) {
    .pagination-btn span {
        display: none;
    }
    
    .pagination-btn {
        padding: 0.75rem;
    }
    
    .pagination-numbers {
        gap: 0.375rem;
    }
    
    .pagination-number {
        min-width: 40px;
        height: 40px;
        font-size: 0.875rem;
    }
}
</style>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\2251172552_Tung\vodic\resources\views/news/index.blade.php ENDPATH**/ ?>