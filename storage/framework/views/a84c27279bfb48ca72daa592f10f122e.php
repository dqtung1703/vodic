

<?php $__env->startSection('title', 'VODIC - Trang chủ'); ?>

<?php $__env->startSection('content'); ?>
<!-- Hero Slider -->
<section class="hero-slider">
    <!-- Slider Container -->
    <div class="slider-container">
        <!-- Slide 1 -->
        <div class="slide active" style="background-image: linear-gradient(rgba(0, 61, 130, 0.4), rgba(0, 102, 204, 0.5)), url('<?php echo e(asset('images/banner_01.png')); ?>');">
            <div class="hero-overlay"></div>
            <div class="hero-content">
                <h1 class="hero-title" style="animation: fadeInUp 0.8s ease;">
                    <a href="#" style="display: inline-flex; align-items: center; gap: 0.75rem;">
                        <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="flex-shrink: 0;">
                            <path d="M21 16V8a2 2 0 00-1-1.73l-7-4a2 2 0 00-2 0l-7 4A2 2 0 003 8v8a2 2 0 001 1.73l7 4a2 2 0 002 0l7-4A2 2 0 0021 16z"/>
                            <polyline points="3.27 6.96 12 12.01 20.73 6.96"/>
                            <line x1="12" y1="22.08" x2="12" y2="12"/>
                        </svg>
                        Nền tảng Dữ liệu Biển Quốc gia
                    </a>
                </h1>
                <p class="hero-subtitle" style="animation: fadeInUp 0.8s ease 0.2s both; max-width: 700px; font-size: 1.125rem; margin-bottom: 2rem; color: white;">
                    Cung cấp dữ liệu, thông tin chính xác và kịp thời về biển, đại dương Việt Nam, phục vụ nghiên cứu khoa học và phát triển bền vững
                </p>
                <div style="display: flex; gap: 1rem; flex-wrap: wrap; animation: fadeInUp 0.8s ease 0.4s both;">
                    <a href="<?php echo e(route('news.index')); ?>" class="btn btn-primary" style="background: var(--gov-gold); color: var(--gray-900);">
                        Khám phá dữ liệu
                    </a>
                    <a href="<?php echo e(route('about')); ?>" class="btn" style="background: rgba(255,255,255,0.15); color: white; border: 2px solid rgba(255,255,255,0.3); backdrop-filter: blur(10px);">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="12" cy="12" r="10"/>
                            <path d="M12 16v-4M12 8h.01"/>
                        </svg>
                        Tìm hiểu thêm
                    </a>
                </div>
            </div>
        </div>

        <!-- Slide 2 -->
        <div class="slide" style="background-image: linear-gradient(rgba(0, 61, 130, 0.4), rgba(0, 102, 204, 0.5)), url('<?php echo e(asset('images/banner_02.png')); ?>');">
            <div class="hero-overlay"></div>
            <div class="hero-content">
                <h1 class="hero-title" style="animation: fadeInUp 0.8s ease;">
                    <a href="#" style="display: inline-flex; align-items: center; gap: 0.75rem;">
                        <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="flex-shrink: 0;">
                            <circle cx="12" cy="12" r="10"/>
                            <path d="M2 12h20M12 2a15.3 15.3 0 014 10 15.3 15.3 0 01-4 10 15.3 15.3 0 01-4-10 15.3 15.3 0 014-10z"/>
                        </svg>
                        Dữ liệu Biển và Hải đảo Việt Nam
                    </a>
                </h1>
                <p class="hero-subtitle" style="animation: fadeInUp 0.8s ease 0.2s both; max-width: 700px; font-size: 1.125rem; margin-bottom: 2rem; color: white;">
                    Kho dữ liệu lớn nhất về tài nguyên, môi trường biển và hải đảo Việt Nam
                </p>
                <div style="display: flex; gap: 1rem; flex-wrap: wrap; animation: fadeInUp 0.8s ease 0.4s both;">
                    <a href="<?php echo e(route('news.index')); ?>" class="btn btn-primary" style="background: var(--gov-gold); color: var(--gray-900);">
                        Khám phá dữ liệu
                    </a>
                    <a href="<?php echo e(route('about')); ?>" class="btn" style="background: rgba(255,255,255,0.15); color: white; border: 2px solid rgba(255,255,255,0.3); backdrop-filter: blur(10px);">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="12" cy="12" r="10"/>
                            <path d="M12 16v-4M12 8h.01"/>
                        </svg>
                        Tìm hiểu thêm
                    </a>
                </div>
            </div>
        </div>

        <!-- Slide 3 -->
        <div class="slide" style="background-image: linear-gradient(rgba(0, 61, 130, 0.4), rgba(0, 102, 204, 0.5)), url('<?php echo e(asset('images/banner_03.png')); ?>');">
            <div class="hero-overlay"></div>
            <div class="hero-content">
                <h1 class="hero-title" style="animation: fadeInUp 0.8s ease;">
                    <a href="#" style="display: inline-flex; align-items: center; gap: 0.75rem;">
                        <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="flex-shrink: 0;">
                            <path d="M4 19.5A2.5 2.5 0 016.5 17H20"/>
                            <path d="M6.5 2H20v20H6.5A2.5 2.5 0 014 19.5v-15A2.5 2.5 0 016.5 2z"/>
                        </svg>
                        Thư viện Dữ liệu Số
                    </a>
                </h1>
                <p class="hero-subtitle" style="animation: fadeInUp 0.8s ease 0.2s both; max-width: 700px; font-size: 1.125rem; margin-bottom: 2rem; color: white;">
                    Truy cập hàng ngàn tài liệu, báo cáo nghiên cứu về biển và hải đảo
                </p>
                <div style="display: flex; gap: 1rem; flex-wrap: wrap; animation: fadeInUp 0.8s ease 0.4s both;">
                    <a href="<?php echo e(route('news.index')); ?>" class="btn btn-primary" style="background: var(--gov-gold); color: var(--gray-900);">
                        Khám phá dữ liệu
                    </a>
                    <a href="<?php echo e(route('about')); ?>" class="btn" style="background: rgba(255,255,255,0.15); color: white; border: 2px solid rgba(255,255,255,0.3); backdrop-filter: blur(10px);">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="12" cy="12" r="10"/>
                            <path d="M12 16v-4M12 8h.01"/>
                        </svg>
                        Tìm hiểu thêm
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Navigation Arrows -->
    <button class="slider-arrow slider-arrow-prev" onclick="changeSlide(-1)" aria-label="Previous slide">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <polyline points="15 18 9 12 15 6"/>
        </svg>
    </button>
    <button class="slider-arrow slider-arrow-next" onclick="changeSlide(1)" aria-label="Next slide">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <polyline points="9 18 15 12 9 6"/>
        </svg>
    </button>

    <!-- Navigation Dots -->
    <div class="slider-dots">
        <button class="slider-dot active" onclick="goToSlide(0)" aria-label="Go to slide 1"></button>
        <button class="slider-dot" onclick="goToSlide(1)" aria-label="Go to slide 2"></button>
        <button class="slider-dot" onclick="goToSlide(2)" aria-label="Go to slide 3"></button>
    </div>
</section>

<!-- Quick Access Section -->
<section class="explore-section">
    <div class="explore-header">
        <h2>Dịch vụ nổi bật</h2>
    </div>
    <div class="explore-grid">
        <a href="https://bienvietnam.gov.vn/vi" class="explore-item" target="_blank" >
            <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" style="color: var(--white);">
                <path d="M3 15v4c0 1.1.9 2 2 2h14a2 2 0 002-2v-4M7 10l5 5 5-5M12 3v12"/>
            </svg>
            <span>Dữ liệu biển Việt Nam</span>
        </a>
        
        <a href="https://nchmf.gov.vn/kttv/" class="explore-item" target="_blank">
            <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" style="color: var(--white);">
                <path d="M12 2v2M12 20v2M4.93 4.93l1.41 1.41M17.66 17.66l1.41 1.41M2 12h2M20 12h2M6.34 17.66l-1.41 1.41M19.07 4.93l-1.41 1.41"/>
                <circle cx="12" cy="12" r="5"/>
            </svg>
            <span>Dự báo thời tiết biển</span>
        </a>
        
        <a href="https://nodc.gov.vn/" class="explore-item" target="_blank">
            <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" style="color: var(--white);">
                <circle cx="12" cy="12" r="10"/>
                <path d="M12 2a15.3 15.3 0 014 10 15.3 15.3 0 01-4 10 15.3 15.3 0 01-4-10 15.3 15.3 0 014-10z"/>
                <path d="M2 12h20"/>
            </svg>
            <span>Bản đồ biển</span>
        </a>
        
        <a href="https://thuvien.vodic.vn/" class="explore-item" target="_blank">
            <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" style="color: var(--white);">
                <path d="M4 19.5A2.5 2.5 0 016.5 17H20"/>
                <path d="M6.5 2H20v20H6.5A2.5 2.5 0 014 19.5v-15A2.5 2.5 0 016.5 2z"/>
            </svg>
            <span>Thư viện số</span>
        </a>
    </div>
    <div class="explore-footer">
        <a href="<?php echo e(route('news.index')); ?>" class="more-link">Xem tất cả dịch vụ</a>
    </div>
</section>

<!-- News Section -->
<section class="news-section">
    <div class="container">
        <h2 class="section-title">Tin tức mới nhất</h2>
        
        <?php if(session('error')): ?>
            <div class="alert alert-error" style="margin-bottom: 2rem;">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <circle cx="12" cy="12" r="10"/>
                    <line x1="12" y1="8" x2="12" y2="12"/>
                    <line x1="12" y1="16" x2="12.01" y2="16"/>
                </svg>
                <?php echo e(session('error')); ?>

            </div>
        <?php endif; ?>
        
        <!-- News Layout: Main + Sidebar -->
        <div class="news-layout">
            <!-- Main Content - Category Sections -->
            <div class="news-main">
            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="category-section">
                    <h3 class="category-heading">
                        <a href="<?php echo e(route('news.index', ['category' => $category->slug])); ?>"><?php echo e($category->name); ?></a>
                    </h3>
                    <div class="news-grid">
                        <?php $__empty_1 = true; $__currentLoopData = $postsByCategory[$category->id] ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
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
                                    <img src="<?php echo e(asset('images/placeholder-ocean.jpg')); ?>" 
                                         alt="<?php echo e($post->title); ?>" 
                                         class="news-image"
                                         loading="lazy"
                                         onerror="this.src='https://images.unsplash.com/photo-1505142468610-359e7d316be0?w=400&h=300&fit=crop'">
                                </a>
                            <?php endif; ?>
                            
                            <div class="news-content">
                                <h3 class="news-title">
                                    <a href="<?php echo e(route('news.show', $post->slug)); ?>"><?php echo e($post->title); ?></a>
                                </h3>
                                
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
                        <div class="no-posts" style="grid-column: 1/-1; text-align: center; padding: 2rem;">
                            <p style="color: var(--gray-600);">Chưa có bài viết nào trong danh mục này.</p>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div><!-- .news-main -->
            
            <!-- Sidebar - Popular Posts -->
            <aside class="news-sidebar">
                <!-- Important News Widget -->
                <?php if(isset($importantPosts) && $importantPosts->count() > 0): ?>
                <div class="important-widget">
                    <h3>
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="display: inline-block; vertical-align: middle; margin-right: 0.5rem;">
                            <path d="M10.29 3.86L1.82 18a2 2 0 001.71 3h16.94a2 2 0 001.71-3L13.71 3.86a2 2 0 00-3.42 0z"/>
                            <line x1="12" y1="9" x2="12" y2="13"/>
                            <line x1="12" y1="17" x2="12.01" y2="17"/>
                        </svg>
                        Tin tức quan trọng
                    </h3>
                    <?php $__currentLoopData = $importantPosts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $important): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="important-item">
                        <div class="important-number"><?php echo e($index + 1); ?></div>
                        <div class="important-content">
                            <div class="important-title">
                                <a href="<?php echo e(route('news.show', $important->slug)); ?>">
                                    <?php echo e($important->title); ?>

                                </a>
                            </div>
                            <div class="important-meta">
                                <span class="important-category"><?php echo e($important->category->name); ?></span>
                                <span class="important-date">
                                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <circle cx="12" cy="12" r="10"/>
                                        <polyline points="12 6 12 12 16 14"/>
                                    </svg>
                                    <?php echo e($important->published_at->format('d/m/Y')); ?>

                                </span>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <?php endif; ?>

                <!-- Popular Posts Widget -->
                <?php if(isset($popularPosts) && $popularPosts->count() > 0): ?>
                <div class="popular-widget">
                    <h3>Xem nhiều nhất</h3>
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
                
                <!-- Windy Weather Map Widget -->
                <div class="weather-widget">
                    <h3>
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="display: inline-block; vertical-align: middle; margin-right: 0.5rem;">
                            <path d="M12 2v2M12 20v2M4.93 4.93l1.41 1.41M17.66 17.66l1.41 1.41M2 12h2M20 12h2M6.34 17.66l-1.41 1.41M19.07 4.93l-1.41 1.41"/>
                            <circle cx="12" cy="12" r="5"/>
                        </svg>
                        Bản đồ thời tiết
                    </h3>
                    <div class="windy-iframe-wrapper">
                        <iframe 
                            width="100%" 
                            height="450" 
                            src="https://embed.windy.com/embed2.html?lat=15.572&lon=106.601&detailLat=15.572&detailLon=106.601&width=650&height=450&zoom=5&level=surface&overlay=wind&product=ecmwf&menu=&message=&marker=&calendar=now&pressure=&type=map&location=coordinates&detail=&metricWind=default&metricTemp=default&radarRange=-1" 
                            frameborder="0">
                        </iframe>
                    </div>
                    <p style="font-size: 12px; color: #666; margin-top: 0.75rem; text-align: center;">
                        Nguồn: <a href="https://www.windy.com" target="_blank" style="color: #0066cc; text-decoration: none;">Windy.com</a>
                    </p>
                </div>
            </aside>
        </div><!-- .news-layout -->
        
        <?php if($featured_posts->count() > 0): ?>
            <div style="text-align: center; margin-top: 3rem;">
                <a href="<?php echo e(route('news.index')); ?>" class="btn btn-primary">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1"/>
                    </svg>
                    Xem tất cả tin tức
                </a>
            </div>
        <?php endif; ?>
    </div>
</section>

<!-- Statistics Section -->
<section style="background: linear-gradient(135deg, var(--ocean-blue), var(--ocean-dark)); padding: 4rem 1.5rem; color: white;">
    <div class="container" style="max-width: 1400px; margin: 0 auto;">
        <h2 style="text-align: center; font-size: 2rem; font-weight: 700; margin-bottom: 3rem; color: white;">VODIC trong số liệu</h2>
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 2rem;">
            <div style="text-align: center; padding: 2rem; background: rgba(255,255,255,0.1); border-radius: 12px; backdrop-filter: blur(10px);">
                <div style="font-size: 3rem; font-weight: 800; margin-bottom: 0.5rem; color: var(--gov-gold);">15+</div>
                <div style="font-size: 1.125rem; opacity: 0.9;">Năm hoạt động</div>
            </div>
            <div style="text-align: center; padding: 2rem; background: rgba(255,255,255,0.1); border-radius: 12px; backdrop-filter: blur(10px);">
                <div style="font-size: 3rem; font-weight: 800; margin-bottom: 0.5rem; color: var(--gov-gold);">1000+</div>
                <div style="font-size: 1.125rem; opacity: 0.9;">Bộ dữ liệu</div>
            </div>
            <div style="text-align: center; padding: 2rem; background: rgba(255,255,255,0.1); border-radius: 12px; backdrop-filter: blur(10px);">
                <div style="font-size: 3rem; font-weight: 800; margin-bottom: 0.5rem; color: var(--gov-gold);">50+</div>
                <div style="font-size: 1.125rem; opacity: 0.9;">Đối tác</div>
            </div>
            <div style="text-align: center; padding: 2rem; background: rgba(255,255,255,0.1); border-radius: 12px; backdrop-filter: blur(10px);">
                <div style="font-size: 3rem; font-weight: 800; margin-bottom: 0.5rem; color: var(--gov-gold);">100+</div>
                <div style="font-size: 1.125rem; opacity: 0.9;">Dự án nghiên cứu</div>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<style>
@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* News Layout - Two Column */
.news-layout {
    display: flex;
    gap: 2rem;
    align-items: flex-start;
}

.news-main {
    flex: 1;
    min-width: 0;
}

.news-sidebar {
    width: 320px;
    flex-shrink: 0;
}

/* Category Section */
.category-section {
    margin-bottom: 3rem;
}

.category-heading {
    font-size: 1.5rem;
    font-weight: 700;
    color: #1a1a1a;
    margin-bottom: 1.5rem;
    padding-bottom: 0.75rem;
    border-bottom: 3px solid #0066cc;
    display: inline-block;
}

.category-heading a {
    color: #1a1a1a;
    text-decoration: none;
    transition: color 0.3s;
}

.category-heading a:hover {
    color: #0066cc;
}

/* Popular Widget */
.popular-widget {
    background: white;
    border-radius: 8px;
    padding: 1.5rem;
    box-shadow: 0 2px 8px rgba(0,0,0,0.08);
}

.popular-widget h3 {
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

/* Important News Widget */
.important-widget {
    background: white;
    border-radius: 8px;
    padding: 1.5rem;
    box-shadow: 0 2px 8px rgba(0,0,0,0.08);
    margin-bottom: 1.5rem;
    border-left: 4px solid #dc2626;
}

.important-widget h3 {
    font-size: 1.125rem;
    font-weight: 700;
    margin: 0 0 1.25rem 0;
    color: #1a1a1a;
    padding-bottom: 0.75rem;
    border-bottom: 2px solid #dc2626;
    display: flex;
    align-items: center;
}

.important-item {
    display: flex;
    gap: 0.75rem;
    margin-bottom: 1rem;
    padding-bottom: 1rem;
    border-bottom: 1px solid #f0f0f0;
}

.important-item:last-child {
    margin-bottom: 0;
    padding-bottom: 0;
    border-bottom: none;
}

.important-number {
    width: 28px;
    height: 28px;
    background: linear-gradient(135deg, #dc2626, #b91c1c);
    color: white;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 700;
    font-size: 14px;
    flex-shrink: 0;
}

.important-content {
    flex: 1;
    min-width: 0;
}

.important-title {
    font-size: 14px;
    font-weight: 600;
    line-height: 1.4;
    margin-bottom: 0.5rem;
}

.important-title a {
    color: #1a1a1a;
    text-decoration: none;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
    transition: color 0.3s;
}

.important-title a:hover {
    color: #dc2626;
}

.important-meta {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    font-size: 12px;
    color: #666;
}

.important-category {
    background: #fee2e2;
    color: #991b1b;
    padding: 0.2rem 0.5rem;
    border-radius: 3px;
    font-weight: 500;
}

.important-date {
    display: flex;
    align-items: center;
    gap: 0.25rem;
}


/* Responsive */
@media (max-width: 968px) {
    .news-layout {
        flex-direction: column;
    }
    
    .news-sidebar {
        width: 100%;
        order: -1;
    }
    
    .popular-widget {
        position: static;
    }
}

/* Weather Widget */
.weather-widget {
    background: white;
    border-radius: 8px;
    padding: 1.5rem;
    box-shadow: 0 2px 8px rgba(0,0,0,0.08);
    margin-top: 1.5rem;
}

.weather-widget h3 {
    font-size: 1.125rem;
    font-weight: 700;
    margin: 0 0 1.25rem 0;
    color: #1a1a1a;
    padding-bottom: 0.75rem;
    border-bottom: 2px solid #0066cc;
    display: flex;
    align-items: center;
}

.windy-iframe-wrapper {
    position: relative;
    width: 100%;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
}

.windy-iframe-wrapper iframe {
    display: block;
    border: none;
}


/* Hero Slider Styles */
.hero-slider {
    position: relative;
    height: 450px;
    overflow: hidden;
}

@media (min-width: 768px) {
    .hero-slider {
        height: 550px;
    }
}

.slider-container {
    position: relative;
    width: 100%;
    height: 100%;
}

.slide {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-size: cover;
    background-position: center;
    opacity: 0;
    transition: opacity 1s ease-in-out;
    pointer-events: none;
}

.slide.active {
    opacity: 1;
    pointer-events: auto;
}

/* Navigation Arrows */
.slider-arrow {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    background: rgba(255, 255, 255, 0.2);
    border: none;
    color: white;
    width: 50px;
    height: 50px;
    border-radius: 50%;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.3s ease;
    z-index: 10;
    backdrop-filter: blur(10px);
}

.slider-arrow:hover {
    background: rgba(255, 255, 255, 0.3);
    transform: translateY(-50%) scale(1.1);
}

.slider-arrow-prev {
    left: 2rem;
}

.slider-arrow-next {
    right: 2rem;
}

@media (max-width: 768px) {
    .slider-arrow {
        width: 40px;
        height: 40px;
    }
    
    .slider-arrow-prev {
        left: 1rem;
    }
    
    .slider-arrow-next {
        right: 1rem;
    }
}

/* Navigation Dots */
.slider-dots {
    position: absolute;
    bottom: 2rem;
    left: 50%;
    transform: translateX(-50%);
    display: flex;
    gap: 0.75rem;
    z-index: 10;
}

.slider-dot {
    width: 12px;
    height: 12px;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.5);
    border: 2px solid rgba(255, 255, 255, 0.8);
    cursor: pointer;
    transition: all 0.3s ease;
    padding: 0;
}

.slider-dot:hover {
    background: rgba(255, 255, 255, 0.7);
    transform: scale(1.2);
}

.slider-dot.active {
    background: var(--gov-gold);
    border-color: var(--gov-gold);
    width: 32px;
    border-radius: 6px;
}

@media (max-width: 768px) {
    .slider-dots {
        bottom: 1.5rem;
    }
    
    .slider-dot {
        width: 10px;
        height: 10px;
    }
    
    .slider-dot.active {
        width: 24px;
    }
}
</style>

<script>
// Wait for DOM to be fully loaded
document.addEventListener('DOMContentLoaded', function() {
    // Banner Slider JavaScript
    let currentSlide = 0;
    const slides = document.querySelectorAll('.slide');
    const dots = document.querySelectorAll('.slider-dot');
    const totalSlides = slides.length;
    
    // Show specific slide
    function showSlide(index) {
        // Remove active class from all slides and dots
        slides.forEach(slide => slide.classList.remove('active'));
        dots.forEach(dot => dot.classList.remove('active'));
        
        // Add active class to current slide and dot
        slides[index].classList.add('active');
        dots[index].classList.add('active');
    }
    
    // Change slide (direction: 1 for next, -1 for previous)
    window.changeSlide = function(direction) {
        currentSlide += direction;
        
        // Loop around
        if (currentSlide >= totalSlides) {
            currentSlide = 0;
        } else if (currentSlide < 0) {
            currentSlide = totalSlides - 1;
        }
        
        showSlide(currentSlide);
    }
    
    // Go to specific slide
    window.goToSlide = function(index) {
        currentSlide = index;
        showSlide(currentSlide);
    }
    
    // Keyboard navigation
    document.addEventListener('keydown', (e) => {
        if (e.key === 'ArrowLeft') {
            window.changeSlide(-1);
        } else if (e.key === 'ArrowRight') {
            window.changeSlide(1);
        }
    });
    
    // Touch swipe support for mobile
    const sliderContainer = document.querySelector('.hero-slider');
    if (sliderContainer) {
        let touchStartX = 0;
        let touchEndX = 0;
        
        sliderContainer.addEventListener('touchstart', (e) => {
            touchStartX = e.changedTouches[0].screenX;
        });
        
        sliderContainer.addEventListener('touchend', (e) => {
            touchEndX = e.changedTouches[0].screenX;
            handleSwipe();
        });
        
        function handleSwipe() {
            const swipeThreshold = 50;
            const diff = touchStartX - touchEndX;
            
            if (Math.abs(diff) > swipeThreshold) {
                if (diff > 0) {
                    // Swipe left - next slide
                    window.changeSlide(1);
                } else {
                    // Swipe right - previous slide
                    window.changeSlide(-1);
                }
            }
        }
    }
});
</script>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\2251172552_Tung\vodic\resources\views/home.blade.php ENDPATH**/ ?>