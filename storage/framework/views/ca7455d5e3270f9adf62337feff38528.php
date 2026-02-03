

<?php $__env->startSection('title', $post->title . ' - VODIC'); ?>

<?php $__env->startPush('styles'); ?>
<style>
/* Article Page Styling */
.article-page {
    background: #f5f5f5;
    min-height: 100vh;
}

/* Article Container */
.article-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 2rem 1.5rem;
}

/* Article Layout - Two Column */
.article-layout {
    display: flex;
    gap: 2rem;
    align-items: flex-start;
}

.article-main {
    flex: 1;
    min-width: 0;
}

.article-sidebar {
    width: 320px;
    flex-shrink: 0;
}

/* Breadcrumb */
.article-breadcrumb {
    font-size: 14px;
    color: #666;
    margin-bottom: 1.5rem;
}

.article-breadcrumb a {
    color: #0066cc;
    text-decoration: none;
}

.article-breadcrumb a:hover {
    text-decoration: underline;
}

.article-breadcrumb span {
    margin: 0 0.5rem;
    color: #999;
}

/* Category Badge */
.article-category {
    display: inline-block;
    background: #0066cc;
    color: white;
    padding: 0.4rem 1rem;
    border-radius: 4px;
    font-size: 13px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    margin-bottom: 1rem;
}

/* Title */
.article-title {
    font-size: 2.25rem;
    font-weight: 700;
    line-height: 1.3;
    color: #1a1a1a;
    margin: 0 0 1.5rem 0;
}

/* Meta Info */
.article-meta {
    display: flex;
    flex-wrap: wrap;
    gap: 1.5rem;
    font-size: 14px;
    color: #666;
    margin-bottom: 2rem;
    padding-bottom: 1.5rem;
    border-bottom: 1px solid #e0e0e0;
}

.meta-item {
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.meta-item svg {
    color: #999;
}

/* Main Content Card */
.article-content-card {
    background: white;
    border-radius: 8px;
    padding: 2.5rem;
    box-shadow: 0 2px 8px rgba(0,0,0,0.08);
    margin-bottom: 2rem;
}

/* Excerpt */
.article-excerpt {
    font-size: 1.125rem;
    font-weight: 600;
    line-height: 1.7;
    color: #333;
    margin-bottom: 2rem;
    padding: 1.25rem;
    background: #f8f9fa;
    border-left: 4px solid #0066cc;
    border-radius: 4px;
}

/* Featured Image */
.article-featured-image {
    margin: 0 0 2rem 0;
}

.article-featured-image img {
    width: 100%;
    height: auto;
    border-radius: 6px;
    display: block;
}

.article-image-caption {
    margin-top: 0.75rem;
    font-size: 14px;
    color: #666;
    font-style: italic;
    text-align: center;
}

/* Article Content */
.article-content {
    font-size: 17px;
    line-height: 1.8;
    color: #333;
}

.article-content p {
    margin-bottom: 1.5em;
}

.article-content h2 {
    font-size: 1.75rem;
    font-weight: 700;
    margin: 2.5rem 0 1rem;
    color: #1a1a1a;
    line-height: 1.3;
}

.article-content h3 {
    font-size: 1.375rem;
    font-weight: 600;
    margin: 2rem 0 0.75rem;
    color: #1a1a1a;
}

.article-content ul,
.article-content ol {
    margin: 1.5em 0;
    padding-left: 2.5em;
}

.article-content li {
    margin-bottom: 0.75em;
    line-height: 1.8;
}

.article-content blockquote {
    margin: 2rem 0;
    padding: 1.25rem 1.5rem;
    background: #f8f9fa;
    border-left: 4px solid #0066cc;
    border-radius: 4px;
    font-style: italic;
    color: #555;
}

.article-content img {
    max-width: 100%;
    height: auto;
    border-radius: 6px;
    margin: 2rem auto;
    display: block;
}

.article-content a {
    color: #0066cc;
    text-decoration: none;
    border-bottom: 1px solid transparent;
    transition: border-color 0.3s;
}

.article-content a:hover {
    border-bottom-color: #0066cc;
}

.article-content strong {
    font-weight: 700;
    color: #1a1a1a;
}

.article-content code {
    background: #f5f5f5;
    padding: 0.2em 0.5em;
    border-radius: 3px;
    font-family: 'Courier New', monospace;
    font-size: 0.9em;
    color: #e83e8c;
}

/* Additional Images */
.article-gallery {
    margin-top: 2.5rem;
}

.article-gallery h3 {
    font-size: 1.25rem;
    font-weight: 700;
    margin-bottom: 1.25rem;
    color: #1a1a1a;
}

.gallery-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
    gap: 1.25rem;
}

.gallery-item {
    border-radius: 6px;
    overflow: hidden;
}

.gallery-item img {
    width: 100%;
    height: 200px;
    object-fit: cover;
    display: block;
    transition: transform 0.3s;
}

.gallery-item:hover img {
    transform: scale(1.05);
}

/* Tags */
.article-tags {
    margin-top: 2.5rem;
    padding-top: 2rem;
    border-top: 1px solid #e0e0e0;
}

.tags-list {
    display: flex;
    flex-wrap: wrap;
    gap: 0.75rem;
    align-items: center;
}

.tag-item {
    display: inline-block;
    background: #f0f0f0;
    color: #555;
    padding: 0.5rem 1rem;
    border-radius: 20px;
    font-size: 14px;
    text-decoration: none;
    transition: all 0.3s;
}

.tag-item:hover {
    background: #0066cc;
    color: white;
}

/* Article Footer */
.article-footer {
    margin-top: 2.5rem;
    padding-top: 2rem;
    border-top: 1px solid #e0e0e0;
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 1.5rem;
}

.article-updated {
    font-size: 14px;
    color: #666;
}

.article-actions {
    display: flex;
    gap: 1rem;
}

.action-btn {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.625rem 1.25rem;
    border-radius: 4px;
    font-size: 14px;
    font-weight: 500;
    border: none;
    cursor: pointer;
    transition: all 0.3s;
}

.btn-secondary {
    background: #f0f0f0;
    color: #555;
}

.btn-secondary:hover {
    background: #e0e0e0;
}

.btn-primary {
    background: #0066cc;
    color: white;
}

.btn-primary:hover {
    background: #0052a3;
}

/* Author Box */
.author-box {
    margin-top: 2.5rem;
    padding: 1.5rem;
    background: #f8f9fa;
    border-radius: 6px;
    display: flex;
    align-items: center;
    gap: 1.25rem;
}

.author-avatar {
    width: 60px;
    height: 60px;
    border-radius: 50%;
    background: #0066cc;
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 700;
    font-size: 1.5rem;
    flex-shrink: 0;
}

.author-info {
    flex: 1;
}

.author-name {
    font-weight: 600;
    font-size: 16px;
    color: #1a1a1a;
    margin-bottom: 0.25rem;
}

.author-role {
    font-size: 14px;
    color: #666;
}

/* Related Posts */
.related-posts {
    max-width: 1200px;
    margin: 3rem auto 0;
    padding: 0 1.5rem 3rem;
}

.related-title {
    font-size: 1.75rem;
    font-weight: 700;
    color: #1a1a1a;
    margin-bottom: 2rem;
}

.related-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
    gap: 1.5rem;
}

.related-card {
    background: white;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 2px 8px rgba(0,0,0,0.08);
    transition: all 0.3s;
}

.related-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 4px 16px rgba(0,0,0,0.12);
}

.related-image {
    position: relative;
    overflow: hidden;
    height: 180px;
}

.related-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s;
}

.related-card:hover .related-image img {
    transform: scale(1.05);
}

.related-content {
    padding: 1.25rem;
}

.related-meta {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    margin-bottom: 0.75rem;
    font-size: 13px;
    color: #666;
}

.related-category {
    background: #0066cc;
    color: white;
    padding: 0.25rem 0.75rem;
    border-radius: 3px;
    font-weight: 600;
    font-size: 12px;
}

.related-post-title {
    font-size: 1.0625rem;
    font-weight: 600;
    line-height: 1.4;
    margin-bottom: 0.5rem;
}

.related-post-title a {
    color: #1a1a1a;
    text-decoration: none;
    transition: color 0.3s;
}

.related-post-title a:hover {
    color: #0066cc;
}

.related-excerpt {
    font-size: 14px;
    color: #666;
    line-height: 1.6;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

/* Popular Posts Widget */
.popular-posts {
    background: white;
    border-radius: 8px;
    padding: 1.5rem;
    box-shadow: 0 2px 8px rgba(0,0,0,0.08);
    position: sticky;
    top: 2rem;
}

.popular-posts h3 {
    font-size: 1.125rem;
    font-weight: 700;
    margin: 0 0 1.25rem 0;
    color: #1a1a1a;
    padding-bottom: 0.75rem;
    border-bottom: 2px solid #0066cc;
}

.popular-item {
    display: flex;
    gap: 0.75rem;
    margin-bottom: 1rem;
    padding-bottom: 1rem;
    border-bottom: 1px solid #f0f0f0;
}

.popular-item:last-child {
    margin-bottom: 0;
    padding-bottom: 0;
    border-bottom: none;
}

.popular-number {
    width: 28px;
    height: 28px;
    background: linear-gradient(135deg, #0066cc, #0052a3);
    color: white;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 700;
    font-size: 14px;
    flex-shrink: 0;
}

.popular-content {
    flex: 1;
    min-width: 0;
}

.popular-title {
    font-size: 14px;
    font-weight: 600;
    line-height: 1.4;
    margin-bottom: 0.5rem;
}

.popular-title a {
    color: #1a1a1a;
    text-decoration: none;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
    transition: color 0.3s;
}

.popular-title a:hover {
    color: #0066cc;
}

.popular-meta {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    font-size: 12px;
    color: #666;
}

.popular-category {
    background: #f0f0f0;
    color: #555;
    padding: 0.2rem 0.5rem;
    border-radius: 3px;
    font-weight: 500;
}

.popular-views {
    display: flex;
    align-items: center;
    gap: 0.25rem;
}

/* Comments Section */
.comments-section {
    margin-top: 3rem;
    padding-top: 2.5rem;
    border-top: 2px solid #e0e0e0;
}

.comments-title {
    font-size: 1.375rem;
    font-weight: 700;
    color: #1a1a1a;
    margin-bottom: 2rem;
    display: flex;
    align-items: center;
    gap: 0.75rem;
}

.comments-title svg {
    color: #0066cc;
}

/* Comment Form */
.comment-form-wrapper {
    margin-bottom: 2.5rem;
}

.comment-form {
    background: #f8f9fa;
    border-radius: 8px;
    padding: 1.5rem;
    border: 1px solid #e0e0e0;
}

.comment-form-header {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    margin-bottom: 1rem;
}

.comment-user-avatar {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background: linear-gradient(135deg, #0066cc, #0052a3);
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 700;
    font-size: 1.125rem;
    flex-shrink: 0;
}

.comment-user-name {
    font-weight: 600;
    color: #1a1a1a;
    font-size: 15px;
}

.comment-form-body {
    margin-bottom: 1rem;
}

.comment-textarea {
    width: 100%;
    padding: 0.875rem;
    border: 1px solid #d0d0d0;
    border-radius: 6px;
    font-size: 15px;
    font-family: inherit;
    line-height: 1.6;
    resize: vertical;
    transition: border-color 0.3s, box-shadow 0.3s;
}

.comment-textarea:focus {
    outline: none;
    border-color: #0066cc;
    box-shadow: 0 0 0 3px rgba(0, 102, 204, 0.1);
}

.comment-error {
    display: block;
    color: #dc3545;
    font-size: 13px;
    margin-top: 0.5rem;
}

.comment-form-footer {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.comment-hint {
    font-size: 13px;
    color: #666;
}

.comment-submit-btn {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.625rem 1.5rem;
    background: #0066cc;
    color: white;
    border: none;
    border-radius: 6px;
    font-size: 14px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s;
}

.comment-submit-btn:hover {
    background: #0052a3;
    transform: translateY(-1px);
    box-shadow: 0 4px 12px rgba(0, 102, 204, 0.3);
}

.comment-submit-btn:active {
    transform: translateY(0);
}

/* Login Prompt */
.comment-login-prompt {
    background: #f8f9fa;
    border: 1px solid #e0e0e0;
    border-radius: 8px;
    padding: 2rem;
    text-align: center;
    margin-bottom: 2rem;
}

.comment-login-prompt svg {
    color: #999;
    margin-bottom: 1rem;
}

.comment-login-prompt p {
    font-size: 15px;
    color: #666;
    margin: 0;
}

.comment-login-prompt a {
    color: #0066cc;
    text-decoration: none;
    font-weight: 600;
    border-bottom: 1px solid transparent;
    transition: border-color 0.3s;
}

.comment-login-prompt a:hover {
    border-bottom-color: #0066cc;
}

/* Comments List */
.comments-list {
    display: flex;
    flex-direction: column;
    gap: 1.5rem;
}

.comment-item {
    display: flex;
    gap: 1rem;
    padding-bottom: 1.5rem;
    border-bottom: 1px solid #f0f0f0;
}

.comment-item:last-child {
    border-bottom: none;
    padding-bottom: 0;
}

.comment-avatar {
    width: 44px;
    height: 44px;
    border-radius: 50%;
    background: linear-gradient(135deg, #0066cc, #0052a3);
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 700;
    font-size: 1.125rem;
    flex-shrink: 0;
}

.comment-content-wrapper {
    flex: 1;
    min-width: 0;
}

.comment-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 0.5rem;
    gap: 1rem;
}

.comment-user-info {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    flex-wrap: wrap;
}

.comment-user-name {
    font-weight: 600;
    color: #1a1a1a;
    font-size: 15px;
}

.comment-time {
    font-size: 13px;
    color: #999;
}

.comment-delete-form {
    margin: 0;
}

.comment-delete-btn {
    background: transparent;
    border: none;
    color: #dc3545;
    cursor: pointer;
    padding: 0.375rem;
    border-radius: 4px;
    transition: all 0.3s;
    display: flex;
    align-items: center;
    justify-content: center;
}

.comment-delete-btn:hover {
    background: #fff5f5;
    color: #c82333;
}

.comment-text {
    font-size: 15px;
    line-height: 1.7;
    color: #333;
    word-wrap: break-word;
}

/* Empty State */
.comments-empty {
    text-align: center;
    padding: 3rem 1.5rem;
    color: #999;
}

.comments-empty svg {
    margin-bottom: 1rem;
    opacity: 0.5;
}

.comments-empty p {
    font-size: 15px;
    margin: 0;
}

/* Responsive */
@media (max-width: 968px) {
    .article-layout {
        flex-direction: column;
    }
    
    .article-sidebar {
        width: 100%;
        order: -1;
    }
    
    .popular-posts {
        position: static;
    }
}

@media (max-width: 768px) {
    .article-container {
        padding: 1.5rem 1rem;
    }
    
    .article-title {
        font-size: 1.75rem;
    }
    
    .article-content-card {
        padding: 1.5rem;
    }
    
    .article-content {
        font-size: 16px;
    }
    
    .article-meta {
        font-size: 13px;
    }
    
    .related-grid {
        grid-template-columns: 1fr;
    }
}

/* Comment Avatar Images */
.comment-user-avatar-img {
    width: 44px;
    height: 44px;
    border-radius: 50%;
    object-fit: cover;
    flex-shrink: 0;
}

.comment-avatar-img {
    width: 44px;
    height: 44px;
    border-radius: 50%;
    object-fit: cover;
    flex-shrink: 0;
}
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<div class="article-page">
    <div class="article-container">
        <!-- Breadcrumb -->
        <nav class="article-breadcrumb">
            <a href="<?php echo e(route('home')); ?>">Trang chủ</a>
            <span>/</span>
            <a href="<?php echo e(route('news.index')); ?>">Tin tức</a>
            <span>/</span>
            <a href="<?php echo e(route('categories.show', $post->category->slug)); ?>"><?php echo e($post->category->name); ?></a>
        </nav>

        <!-- Category -->
        <div>
            <span class="article-category"><?php echo e($post->category->name); ?></span>
        </div>

        <!-- Title -->
        <h1 class="article-title"><?php echo e($post->title); ?></h1>

        <!-- Meta Info -->
        <div class="article-meta">
            <div class="meta-item">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <rect x="3" y="4" width="18" height="18" rx="2" ry="2"/>
                    <line x1="16" y1="2" x2="16" y2="6"/>
                    <line x1="8" y1="2" x2="8" y2="6"/>
                    <line x1="3" y1="10" x2="21" y2="10"/>
                </svg>
                <?php echo e($post->published_at->format('d/m/Y')); ?>

            </div>
            <div class="meta-item">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/>
                    <circle cx="12" cy="12" r="3"/>
                </svg>
                <?php echo e(number_format($post->views)); ?> lượt xem
            </div>
            <?php if($post->user): ?>
            <div class="meta-item">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"/>
                    <circle cx="12" cy="7" r="4"/>
                </svg>
                <?php echo e($post->user->name); ?>

            </div>
            <?php endif; ?>
        </div>

        <!-- Two Column Layout -->
        <div class="article-layout">
            <!-- Main Content -->
            <div class="article-main">
        <article class="article-content-card">
            
            <!-- Excerpt -->
            <?php if($post->excerpt): ?>
            <div class="article-excerpt">
                <?php echo e($post->excerpt); ?>

            </div>
            <?php endif; ?>

            <!-- Featured Image -->
            <?php if($post->featured_image): ?>
            <figure class="article-featured-image">
                <img src="<?php echo e(asset('storage/' . $post->featured_image)); ?>" 
                     alt="<?php echo e($post->title); ?>"
                     loading="lazy">
            </figure>
            <?php endif; ?>

            <!-- Content -->
            <div class="article-content">
                <?php echo $post->content; ?>

            </div>

            <!-- Additional Images -->
            <?php if($post->images->count() > 0): ?>
            <div class="article-gallery">
                <h3>Hình ảnh liên quan</h3>
                <div class="gallery-grid">
                    <?php $__currentLoopData = $post->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="gallery-item">
                        <img src="<?php echo e(asset('storage/' . $image->image_path)); ?>" 
                             alt="Image <?php echo e($loop->iteration); ?>">
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
            <?php endif; ?>

            <!-- Tags -->
            <?php if($post->tags && $post->tags->count() > 0): ?>
            <div class="article-tags">
                <div class="tags-list">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="color: #999;">
                        <path d="M20.59 13.41l-7.17 7.17a2 2 0 01-2.83 0L2 12V2h10l8.59 8.59a2 2 0 010 2.82z"/>
                        <line x1="7" y1="7" x2="7.01" y2="7"/>
                    </svg>
                    <?php $__currentLoopData = $post->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a href="#" class="tag-item"><?php echo e($tag->name); ?></a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
            <?php endif; ?>

            <!-- Footer -->
            <div class="article-footer">
                <div class="article-updated">
                    Cập nhật: <?php echo e($post->updated_at->format('d/m/Y H:i')); ?>

                </div>
                <div class="article-actions">
                    <button onclick="window.print()" class="action-btn btn-secondary">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <polyline points="6 9 6 2 18 2 18 9"/>
                            <path d="M6 18H4a2 2 0 01-2-2v-5a2 2 0 012-2h16a2 2 0 012 2v5a2 2 0 01-2 2h-2"/>
                            <rect x="6" y="14" width="12" height="8"/>
                        </svg>
                        In bài viết
                    </button>
                    <button onclick="sharePost()" class="action-btn btn-primary">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="18" cy="5" r="3"/>
                            <circle cx="6" cy="12" r="3"/>
                            <circle cx="18" cy="19" r="3"/>
                            <line x1="8.59" y1="13.51" x2="15.42" y2="17.49"/>
                            <line x1="15.41" y1="6.51" x2="8.59" y2="10.49"/>
                        </svg>
                        Chia sẻ
                    </button>
                </div>
            </div>

            <!-- Author Box -->
            <?php if($post->user): ?>
            <div class="author-box">
                <div class="author-avatar">
                    <?php echo e(strtoupper(substr($post->user->name, 0, 1))); ?>

                </div>
                <div class="author-info">
                    <div class="author-name"><?php echo e($post->user->name); ?></div>
                    <div class="author-role">Tác giả</div>
                </div>
            </div>
            <?php endif; ?>

            <!-- Comments Section -->
            <div class="comments-section">
                <h3 class="comments-title">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M21 15a2 2 0 01-2 2H7l-4 4V5a2 2 0 012-2h14a2 2 0 012 2z"/>
                    </svg>
                    Bình luận (<?php echo e($post->comments->count()); ?>)
                </h3>

                <!-- Comment Form -->
                <?php if(auth()->guard()->check()): ?>
                <div class="comment-form-wrapper">
                    <form action="<?php echo e(route('comments.store', $post)); ?>" method="POST" class="comment-form">
                        <?php echo csrf_field(); ?>
                        <div class="comment-form-header">
                            <?php if(auth()->user()->hasAvatar()): ?>
                                <img src="<?php echo e(auth()->user()->getAvatarUrl()); ?>" alt="Avatar" class="comment-user-avatar-img">
                            <?php else: ?>
                                <div class="comment-user-avatar">
                                    <?php echo e(strtoupper(substr(auth()->user()->name, 0, 1))); ?>

                                </div>
                            <?php endif; ?>
                            <div class="comment-user-name"><?php echo e(auth()->user()->name); ?></div>
                        </div>
                        <div class="comment-form-body">
                            <textarea 
                                name="content" 
                                class="comment-textarea" 
                                placeholder="Viết bình luận của bạn..."
                                rows="3"
                                required
                                maxlength="1000"
                            ><?php echo e(old('content')); ?></textarea>
                            <?php $__errorArgs = ['content'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="comment-error"><?php echo e($message); ?></span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="comment-form-footer">
                            <span class="comment-hint">Tối đa 1000 ký tự</span>
                            <button type="submit" class="comment-submit-btn">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <line x1="22" y1="2" x2="11" y2="13"/>
                                    <polygon points="22 2 15 22 11 13 2 9 22 2"/>
                                </svg>
                                Gửi bình luận
                            </button>
                        </div>
                    </form>
                </div>
                <?php else: ?>
                <div class="comment-login-prompt">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"/>
                        <circle cx="12" cy="7" r="4"/>
                    </svg>
                    <p>Vui lòng <a href="#" onclick="event.preventDefault(); document.getElementById('login-modal').style.display='flex';">đăng nhập</a> để bình luận</p>
                </div>
                <?php endif; ?>

                <!-- Comments List -->
                <?php if($post->comments->count() > 0): ?>
                <div class="comments-list">
                    <?php $__currentLoopData = $post->comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="comment-item">
                        <?php if($comment->user->hasAvatar()): ?>
                            <img src="<?php echo e($comment->user->getAvatarUrl()); ?>" alt="Avatar" class="comment-avatar-img">
                        <?php else: ?>
                            <div class="comment-avatar">
                                <?php echo e(strtoupper(substr($comment->user->name, 0, 1))); ?>

                            </div>
                        <?php endif; ?>
                        <div class="comment-content-wrapper">
                            <div class="comment-header">
                                <div class="comment-user-info">
                                    <span class="comment-user-name"><?php echo e($comment->user->name); ?></span>
                                    <span class="comment-time"><?php echo e($comment->created_at->diffForHumans()); ?></span>
                                </div>
                                <?php if(auth()->guard()->check()): ?>
                                    <?php if(auth()->user()->isAdmin() || auth()->id() === $comment->user_id): ?>
                                    <form action="<?php echo e(route('comments.destroy', $comment)); ?>" method="POST" class="comment-delete-form" onsubmit="return confirm('Bạn có chắc chắn muốn xóa bình luận này?')">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button type="submit" class="comment-delete-btn" title="Xóa bình luận">
                                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                <polyline points="3 6 5 6 21 6"/>
                                                <path d="M19 6v14a2 2 0 01-2 2H7a2 2 0 01-2-2V6m3 0V4a2 2 0 012-2h4a2 2 0 012 2v2"/>
                                                <line x1="10" y1="11" x2="10" y2="17"/>
                                                <line x1="14" y1="11" x2="14" y2="17"/>
                                            </svg>
                                        </button>
                                    </form>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </div>
                            <div class="comment-text"><?php echo e($comment->content); ?></div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <?php else: ?>
                <div class="comments-empty">
                    <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                        <path d="M21 15a2 2 0 01-2 2H7l-4 4V5a2 2 0 012-2h14a2 2 0 012 2z"/>
                    </svg>
                    <p>Chưa có bình luận nào. Hãy là người đầu tiên bình luận!</p>
                </div>
                <?php endif; ?>
            </div>
        </article>
            </div><!-- .article-main -->

            <!-- Sidebar -->
            <aside class="article-sidebar">
                <?php if($popularPosts && $popularPosts->count() > 0): ?>
                <div class="popular-posts">
                    <h3>Bài viết xem nhiều</h3>
                    <?php $__currentLoopData = $popularPosts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $popular): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="popular-item">
                        <div class="popular-number"><?php echo e($index + 1); ?></div>
                        <div class="popular-content">
                            <div class="popular-title">
                                <a href="<?php echo e(route('news.show', $popular->slug)); ?>">
                                    <?php echo e($popular->title); ?>

                                </a>
                            </div>
                            <div class="popular-meta">
                                <span class="popular-category"><?php echo e($popular->category->name); ?></span>
                                <span class="popular-views">
                                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/>
                                        <circle cx="12" cy="12" r="3"/>
                                    </svg>
                                    <?php echo e(number_format($popular->views)); ?>

                                </span>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <?php endif; ?>
            </aside>
        </div><!-- .article-layout -->
    </div><!-- .article-container -->

    <!-- Related Posts -->
    <?php if($relatedPosts && $relatedPosts->count() > 0): ?>
    <div class="related-posts">
        <h2 class="related-title">Bài viết liên quan</h2>
        <div class="related-grid">
            <?php $__currentLoopData = $relatedPosts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $related): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <article class="related-card">
                <?php if($related->images->first()): ?>
                <a href="<?php echo e(route('news.show', $related->slug)); ?>">
                    <div class="related-image">
                        <img src="<?php echo e(asset('storage/' . $related->images->first()->image_path)); ?>" 
                             alt="<?php echo e($related->title); ?>">
                    </div>
                </a>
                <?php endif; ?>
                
                <div class="related-content">
                    <div class="related-meta">
                        <span class="related-category"><?php echo e($related->category->name); ?></span>
                        <span><?php echo e($related->published_at->format('d/m/Y')); ?></span>
                    </div>
                    <h3 class="related-post-title">
                        <a href="<?php echo e(route('news.show', $related->slug)); ?>">
                            <?php echo e(Str::limit($related->title, 80)); ?>

                        </a>
                    </h3>
                    <?php if($related->excerpt): ?>
                    <p class="related-excerpt">
                        <?php echo e(Str::limit($related->excerpt, 100)); ?>

                    </p>
                    <?php endif; ?>
                </div>
            </article>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
    <?php endif; ?>
</div>

<?php $__env->startPush('scripts'); ?>
<script>
    function sharePost() {
        if (navigator.share) {
            navigator.share({
                title: '<?php echo e($post->title); ?>',
                text: '<?php echo e($post->excerpt); ?>',
                url: window.location.href
            });
        } else {
            navigator.clipboard.writeText(window.location.href);
            alert('✅ Đã copy link bài viết vào clipboard!');
        }
    }
</script>
<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\2251172552_Tung\vodic\resources\views/news/show.blade.php ENDPATH**/ ?>