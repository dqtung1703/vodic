<!-- Enhanced Government Banner -->
<div class="gov-banner">
    <div class="gov-banner-inner">
        <div class="flag-icon">🇻🇳</div>
        <p>Cổng Thông tin Điện tử - Trung tâm Thông tin, dữ liệu biển và hải đảo quốc gia</p>
        <button class="gov-banner-toggle" onclick="toggleGovInfo()" aria-label="Xem thêm thông tin">
            <span>Xem thêm</span>
            <svg class="chevron-icon" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M6 9l6 6 6-6"/>
            </svg>
        </button>
    </div>
    
    <div class="gov-banner-info" id="govInfo">
        <div class="gov-info-grid">
            <div class="gov-info-item">
                <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" style="flex-shrink: 0; color: var(--ocean-blue);">
                    <path d="M3 21h18M3 7v14M21 7v14M6 11h.01M6 15h.01M12 11h.01M12 15h.01M18 11h.01M18 15h.01M12 3l9 4-9 4-9-4 9-4z"/>
                </svg>
                <div>
                    <strong>Trang web chính thức sử dụng .gov.vn</strong>
                    <p>Trang web có đuôi <strong>.gov.vn</strong> thuộc cơ quan chính phủ Việt Nam. Thông tin trên trang web này là chính thống và đáng tin cậy.</p>
                </div>
            </div>
            
            <div class="gov-info-item">
                <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" style="flex-shrink: 0; color: var(--accent-success);">
                    <rect x="3" y="11" width="18" height="11" rx="2" ry="2"/>
                    <path d="M7 11V7a5 5 0 0110 0v4"/>
                </svg>
                <div>
                    <strong>Trang web an toàn sử dụng HTTPS</strong>
                    <p>Biểu tượng <strong>khóa (🔒)</strong> hoặc <strong>https://</strong> có nghĩa bạn đã kết nối an toàn với trang web chính thức. Mọi thông tin trao đổi được mã hóa.</p>
                </div>
            </div>
            
            <div class="gov-info-item">
                <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" style="flex-shrink: 0; color: var(--accent-info);">
                    <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                <div>
                    <strong>Thông tin chính thống và cập nhật</strong>
                    <p>Tất cả thông tin, dữ liệu trên trang web được cập nhật thường xuyên và kiểm duyệt bởi chuyên gia của VODIC.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.gov-banner-info {
    background: linear-gradient(to bottom, #ffffff, #f9fafb);
    box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.1);
}

.gov-info-item:hover svg {
    transform: scale(1.1);
    transition: transform 0.3s ease;
}
</style>