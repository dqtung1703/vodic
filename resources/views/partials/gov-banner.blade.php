<!-- Government Banner -->
<div class="gov-banner">
    <div class="gov-banner-inner">
        <img src="{{ asset('images/us-flag.png') }}" alt="Vietnam flag" class="flag-icon">
        <p>Trang web chính thức của Trung tâm Dữ liệu và Thông tin Đại dương Việt Nam</p>
        <button class="gov-banner-toggle" onclick="toggleGovInfo()">
            Xem thêm
            <svg class="chevron-icon" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M6 9l6 6 6-6"/>
            </svg>
        </button>
    </div>
    <div class="gov-banner-info" id="govInfo">
        <div class="gov-info-grid">
            <div class="gov-info-item">
                <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="#005ea2" stroke-width="1.5">
                    <path d="M3 21h18M3 7v14M21 7v14M6 11h.01M6 15h.01M12 11h.01M12 15h.01M18 11h.01M18 15h.01M12 3l9 4-9 4-9-4 9-4z"/>
                </svg>
                <div>
                    <strong>Trang web chính thức sử dụng .gov.vn</strong>
                    <p>Trang web có đuôi <strong>.gov.vn</strong> thuộc cơ quan chính phủ Việt Nam.</p>
                </div>
            </div>
            <div class="gov-info-item">
                <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="#005ea2" stroke-width="1.5">
                    <rect x="3" y="11" width="18" height="11" rx="2" ry="2"/>
                    <path d="M7 11V7a5 5 0 0110 0v4"/>
                </svg>
                <div>
                    <strong>Trang web an toàn sử dụng HTTPS</strong>
                    <p>Biểu tượng <strong>khóa</strong> hoặc <strong>https://</strong> có nghĩa bạn đã kết nối an toàn với trang web chính thức.</p>
                </div>
            </div>
        </div>
    </div>
</div>
