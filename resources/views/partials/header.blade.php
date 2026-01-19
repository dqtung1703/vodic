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
                <a href="{{ route('categories.index') }}" class="nav-link {{ request()->routeIs('categories.*') ? 'active' : '' }}">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"></path>
                    </svg>
                    Danh mục
                </a>
                <a href="{{ route('about') }}" class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="12" cy="12" r="10"></circle>
                        <path d="M12 16v-4M12 8h.01"></path>
                    </svg>
                    Giới thiệu
                </a>
                <a href="{{ route('contact') }}" class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                    </svg>
                    Liên hệ
                </a>
                
                @auth
                    @if(auth()->user()->isAdmin())
                        <a href="{{ route('admin.dashboard') }}" class="nav-link" style="color: var(--gov-red);">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                                <line x1="9" y1="9" x2="15" y2="9"></line>
                                <line x1="9" y1="15" x2="15" y2="15"></line>
                            </svg>
                            Admin
                        </a>
                    @endif
                    <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                        @csrf
                        <button type="submit" class="nav-link" style="background: none; border: none; cursor: pointer; font-family: inherit;">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M9 21H5a2 2 0 01-2-2V5a2 2 0 012-2h4M16 17l5-5-5-5M21 12H9"></path>
                            </svg>
                            Đăng xuất
                        </button>
                    </form>
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

    <!-- Bottom Row: Search Bar -->
    <div class="header-nav">
        <div class="header-container">
            <div class="header-search">
                <form action="{{ route('search') }}" method="GET">
                    <input type="text" 
                           name="search" 
                           placeholder="Tìm kiếm tin tức, dữ liệu..." 
                           class="header-search-input"
                           value="{{ request('search') }}">
                    <button type="submit" class="header-search-btn">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="11" cy="11" r="8"></circle>
                            <path d="M21 21l-4.35-4.35"></path>
                        </svg>
                        <span style="margin-left: 0.5rem;">Tìm kiếm</span>
                    </button>
                </form>
            </div>
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