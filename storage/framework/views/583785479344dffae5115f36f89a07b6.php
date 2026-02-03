<!-- Enhanced Footer -->
<footer class="footer">
    <div class="footer-main">
        <div class="footer-container">
            <div class="footer-brand">
                <img src="<?php echo e(asset('images/vodic_ico.gif')); ?>" alt="VODIC Logo" class="footer-logo" style="max-width: 80px;">
                <div class="footer-brand-text">
                    <span class="footer-title">Trung tâm Thông tin, dữ liệu biển và hải đảo quốc gia</span>
                    <span class="footer-subtitle">Vietnam Ocean Data and Information Center</span>
                    
                    <div style="margin-top: 1.5rem; display: flex; flex-direction: column; gap: 0.75rem; font-size: 0.9375rem; color: rgba(255,255,255,0.85);">
                        <div style="display: flex; align-items: center; gap: 0.5rem;">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/>
                                <circle cx="12" cy="10" r="3"/>
                            </svg>
                            <span>Số 83 Nguyễn Chí Thanh, Quận Đống Đa, Thành phố Hà Nội</span>
                        </div>
                        <div style="display: flex; align-items: center; gap: 0.5rem;">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07 19.5 19.5 0 01-6-6 19.79 19.79 0 01-3.07-8.67A2 2 0 014.11 2h3a2 2 0 012 1.72 12.84 12.84 0 00.7 2.81 2 2 0 01-.45 2.11L8.09 9.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45 12.84 12.84 0 002.81.7A2 2 0 0122 16.92z"/>
                            </svg>
                            <a href="tel:+842437618118" style="color: rgba(255,255,255,0.85); transition: color 0.25s;">+84 24 3761 8118</a>
                        </div>
                        <div style="display: flex; align-items: center; gap: 0.5rem;">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/>
                                <polyline points="22,6 12,13 2,6"/>
                            </svg>
                            <a href="mailto:vohung@vodic.vn" style="color: rgba(255,255,255,0.85); transition: color 0.25s;">vohung@vodic.vn</a>
                        </div>
                    </div>
                    
                    <div class="social-links" style="margin-top: 1.5rem;">
                        <a href="https://www.facebook.com/vodic.vn/?locale=vi_VN" class="social-link" aria-label="Facebook" title="Facebook" target="_blank">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"/>
                            </svg>
                        </a>
                        <a href="#" class="social-link" aria-label="Twitter" title="Twitter">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z"/>
                            </svg>
                        </a>
                        <a href="#" class="social-link" aria-label="YouTube" title="YouTube">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M22.54 6.42a2.78 2.78 0 00-1.94-2C18.88 4 12 4 12 4s-6.88 0-8.6.46a2.78 2.78 0 00-1.94 2A29 29 0 001 11.75a29 29 0 00.46 5.33A2.78 2.78 0 003.4 19c1.72.46 8.6.46 8.6.46s6.88 0 8.6-.46a2.78 2.78 0 001.94-2 29 29 0 00.46-5.25 29 29 0 00-.46-5.33z"/>
                                <polygon points="9.75,15.02 15.5,11.75 9.75,8.48" fill="white"/>
                            </svg>
                        </a>
                        <a href="#" class="social-link" aria-label="LinkedIn" title="LinkedIn">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6zM2 9h4v12H2z"/>
                                <circle cx="4" cy="4" r="2"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
            
            <div class="footer-links">
                <div class="footer-column">
                    <h4>Về VODIC</h4>
                    <ul>
                        <li><a href="<?php echo e(route('about')); ?>">Giới thiệu</a></li>
                        <li><a href="#">Chức năng nhiệm vụ</a></li>
                        <li><a href="#">Cơ cấu tổ chức</a></li>
                        <li><a href="#">Ban lãnh đạo</a></li>
                        <li><a href="<?php echo e(route('contact')); ?>">Liên hệ</a></li>
                    </ul>
                </div>
                
                <div class="footer-column">
                    <h4>Dịch vụ</h4>
                    <ul>
                        <li><a href="https://bienvietnam.gov.vn/vi" target="_blank">Dữ liệu biển</a></li>
                        <li><a href="https://nchmf.gov.vn/kttv/" target="_blank">Dự báo thời tiết biển</a></li>
                        <li><a href="https://nodc.gov.vn/" target="_blank">Bản đồ biển</a></li>
                        <li><a href="https://thuvien.vodic.vn/" target="_blank">Thư viện số</a></li>
                    </ul>
                </div>
                
                <div class="footer-column">
                    <h4>Hỗ trợ</h4>
                    <ul>
                        <li><a href="#">Hướng dẫn sử dụng</a></li>
                        <li><a href="#">Góp ý - Phản hồi</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    
    <div class="footer-bottom">
        <div class="footer-container">
            <p>&copy; <?php echo e(date('Y')); ?> Trung tâm Thông tin, dữ liệu biển và hải đảo quốc gia - VODIC. Bản quyền thuộc về VODIC.</p>
            <div class="footer-legal">
                <a href="#">Chính sách bảo mật</a>
                <a href="#">Điều khoản sử dụng</a>
                <a href="#">Accessibility</a>
                <a href="#">Bản đồ trang</a>
            </div>
        </div>
    </div>
</footer>

<style>
.footer-brand-text a:hover {
    color: var(--white);
}

.social-link {
    position: relative;
}

.social-link::before {
    content: attr(title);
    position: absolute;
    bottom: 100%;
    left: 50%;
    transform: translateX(-50%) translateY(-0.5rem);
    background: rgba(0, 0, 0, 0.8);
    color: white;
    padding: 0.375rem 0.75rem;
    border-radius: 4px;
    font-size: 0.75rem;
    white-space: nowrap;
    opacity: 0;
    pointer-events: none;
    transition: all 0.25s;
}

.social-link:hover::before {
    opacity: 1;
    transform: translateX(-50%) translateY(-0.75rem);
}
</style><?php /**PATH D:\2251172552_Tung\vodic\resources\views/partials/footer.blade.php ENDPATH**/ ?>