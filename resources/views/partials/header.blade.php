<!-- Enhanced Header -->
<header class="header">
    <!-- Top Row: Logo + Navigation -->
    <div class="header-top">
        <div class="header-container">
            <!-- Logo Section -->
            <a href="{{ route('home') }}" class="logo-wrapper">
                <img src="{{ asset('images/vodic-logo.png') }}" alt="VODIC Logo" class="noaa-logo">
                <div class="logo-text">
                    <span class="logo-title">Trung tâm Dữ liệu và Thông tin Đại dương Việt Nam</span>
                    <span class="logo-subtitle">Vietnam Oceanic Data and Information Center</span>
                </div>
            </a>

            <!-- Navigation -->
            <nav class="main-nav">
                <a href="{{ route('news.index') }}" class="nav-link {{ request()->routeIs('news.*') ? 'active' : '' }}">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                    </svg>
                    Tin tức
                </a>
                
                <!-- Dropdown: Dữ liệu Biển đảo -->
                <div class="nav-dropdown">
                    <a href="#" class="nav-link">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M3 15v4c0 1.1.9 2 2 2h14a2 2 0 002-2v-4M17 8l-5-5-5 5M12 3v12"></path>
                        </svg>
                        Dữ liệu Biển đảo
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="margin-left: 0.25rem;">
                            <polyline points="6 9 12 15 18 9"></polyline>
                        </svg>
                    </a>
                    <div class="dropdown-menu">
                        <a href="https://vodic.gov.vn/open-data" target="_blank" class="dropdown-item">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M21 16V8a2 2 0 00-1-1.73l-7-4a2 2 0 00-2 0l-7 4A2 2 0 003 8v8a2 2 0 001 1.73l7 4a2 2 0 002 0l7-4A2 2 0 0021 16z"></path>
                            </svg>
                            Trang dữ liệu mở
                        </a>
                        <a href="https://vodic.gov.vn/metadata" target="_blank" class="dropdown-item">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z"></path>
                                <polyline points="14 2 14 8 20 8"></polyline>
                            </svg>
                            Thông tin metadata
                        </a>
                        <a href="https://vodic.gov.vn/library" target="_blank" class="dropdown-item">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M4 19.5A2.5 2.5 0 016.5 17H20"></path>
                                <path d="M6.5 2H20v20H6.5A2.5 2.5 0 014 19.5v-15A2.5 2.5 0 016.5 2z"></path>
                            </svg>
                            Trang thông tin thư viện
                        </a>
                        <a href="https://vodic.gov.vn/survey-map" target="_blank" class="dropdown-item">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"></path>
                                <circle cx="12" cy="10" r="3"></circle>
                            </svg>
                            Bản đồ điều tra cơ bản
                        </a>
                        <a href="https://vodic.gov.vn/open-source" target="_blank" class="dropdown-item">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <polyline points="16 18 22 12 16 6"></polyline>
                                <polyline points="8 6 2 12 8 18"></polyline>
                            </svg>
                            Đề tài mã nguồn mở
                        </a>
                    </div>
                </div>
                
                <a href="{{ route('about') }}" class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="12" cy="12" r="10"></circle>
                        <path d="M12 16v-4M12 8h.01"></path>
                    </svg>
                    Giới thiệu
                </a>
                
                @auth
                    <!-- User Avatar Dropdown -->
                    <div class="user-dropdown">
                        <button class="user-avatar-btn">
                            <div class="user-avatar">
                                {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                            </div>
                            <span class="user-name">{{ auth()->user()->name }}</span>
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <polyline points="6 9 12 15 18 9"></polyline>
                            </svg>
                        </button>
                        <div class="user-dropdown-menu">
                            @if(auth()->user()->isAdmin())
                                <a href="{{ route('admin.dashboard') }}" class="dropdown-item">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                                        <line x1="9" y1="9" x2="15" y2="9"></line>
                                        <line x1="9" y1="15" x2="15" y2="15"></line>
                                    </svg>
                                    Admin Dashboard
                                </a>
                                <div class="dropdown-divider"></div>
                            @endif
                            <a href="{{ route('profile.edit') }}" class="dropdown-item">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"></path>
                                    <circle cx="12" cy="7" r="4"></circle>
                                </svg>
                                Thông tin cá nhân
                            </a>
                            @if(!auth()->user()->isAdmin())
                                <a href="{{ route('user.posts.index') }}" class="dropdown-item">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path d="M11 4H4a2 2 0 00-2 2v14a2 2 0 002 2h14a2 2 0 002-2v-7"></path>
                                        <path d="M18.5 2.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                    </svg>
                                    Bài viết của tôi
                                </a>
                            @endif
                            <div class="dropdown-divider"></div>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="dropdown-item logout-btn">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path d="M9 21H5a2 2 0 01-2-2V5a2 2 0 012-2h4M16 17l5-5-5-5M21 12H9"></path>
                                    </svg>
                                    Đăng xuất
                                </button>
                            </form>
                        </div>
                    </div>
                @else
                    <a href="#" onclick="openLoginModal(); return false;" class="nav-link">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M15 3h4a2 2 0 012 2v14a2 2 0 01-2 2h-4M10 17l5-5-5-5M15 12H3"></path>
                        </svg>
                        Đăng nhập
                    </a>
                @endauth
            </nav>

            <!-- Mobile Menu Button -->
            <button class="mobile-menu-btn" onclick="toggleMobileMenu()" aria-label="Menu">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M3 12h18M3 6h18M3 18h18"></path>
                </svg>
            </button>
        </div>
    </div>


</header>

<!-- Mobile Menu -->
<div class="mobile-menu" id="mobileMenu">
    <div class="mobile-menu-content">
        <div style="margin-bottom: 1rem;">
            <input type="text" 
                   placeholder="Tìm kiếm..." 
                   class="mobile-weather-input"
                   id="mobileSearchInput">
        </div>
        
        <nav class="mobile-nav">
            <a href="{{ route('home') }}">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="display: inline-block; vertical-align: middle; margin-right: 0.5rem;">
                    <path d="M3 9l9-7 9 7v11a2 2 0 01-2 2H5a2 2 0 01-2-2z"></path>
                    <polyline points="9 22 9 12 15 12 15 22"></polyline>
                </svg>
                Trang chủ
            </a>
            <a href="{{ route('news.index') }}">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="display: inline-block; vertical-align: middle; margin-right: 0.5rem;">
                    <path d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1"></path>
                </svg>
                Tin tức
            </a>
            <a href="{{ route('categories.index') }}">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="display: inline-block; vertical-align: middle; margin-right: 0.5rem;">
                    <path d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9"></path>
                </svg>
                Danh mục
            </a>
            <a href="{{ route('about') }}">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="display: inline-block; vertical-align: middle; margin-right: 0.5rem;">
                    <circle cx="12" cy="12" r="10"></circle>
                </svg>
                Giới thiệu
            </a>
            <a href="{{ route('contact') }}">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="display: inline-block; vertical-align: middle; margin-right: 0.5rem;">
                    <path d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8"></path>
                </svg>
                Liên hệ
            </a>
            
            @auth
                @if(auth()->user()->isAdmin())
                    <a href="{{ route('admin.dashboard') }}" style="color: var(--gov-red);">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="display: inline-block; vertical-align: middle; margin-right: 0.5rem;">
                            <rect x="3" y="3" width="18" height="18" rx="2"></rect>
                        </svg>
                        Admin Dashboard
                    </a>
                @endif
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" style="width: 100%; text-align: left; background: none; border: none; color: inherit; padding: 0.875rem 1rem; font-weight: 600; cursor: pointer; font-family: inherit; border-radius: 6px; transition: all 0.25s;">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="display: inline-block; vertical-align: middle; margin-right: 0.5rem;">
                            <path d="M9 21H5a2 2 0 01-2-2V5a2 2 0 012-2h4"></path>
                        </svg>
                        Đăng xuất
                    </button>
                </form>
            @else
                <a href="{{ route('login') }}">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="display: inline-block; vertical-align: middle; margin-right: 0.5rem;">
                        <path d="M15 3h4a2 2 0 012 2v14"></path>
                    </svg>
                    Đăng nhập
                </a>
            @endauth
        </nav>
    </div>
</div>

<script>
function performQuickSearch() {
    const input = document.getElementById('quickSearch');
    const query = input.value.trim();
    if (query) {
        window.location.href = `/tim-kiem?search=${encodeURIComponent(query)}`;
    }
}

// Mobile search
document.getElementById('mobileSearchInput')?.addEventListener('keypress', function(e) {
    if (e.key === 'Enter') {
        const query = this.value.trim();
        if (query) {
            window.location.href = `/tim-kiem?search=${encodeURIComponent(query)}`;
        }
    }
});
</script>