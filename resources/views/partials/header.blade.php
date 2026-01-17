<!-- Header -->
<header class="header">
    <div class="header-top">
        <div class="header-container">
            <!-- Weather Search -->
            <div class="weather-search">
                <span class="weather-label">Tìm kiếm thời tiết</span>
                <div class="search-input-wrapper">
                    <input type="text" placeholder="Nhập khu vực hoặc địa điểm" class="weather-input">
                    <button class="search-btn">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            ircle cx="11" cy="11" r="8"></circle>
                            <path d="M21 21l-4.35-4.35"></path>
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Navigation -->
            <nav class="main-nav">
                <a href="{{ route('news.index') }}" class="nav-link">Tin tức</a>
                <a href="/gioi-thieu" class="nav-link">Giới thiệu</a>
                <a href="/lien-he" class="nav-link">Liên hệ</a>
                
                @auth
                    @if(auth()->user()->isAdmin())
                        <a href="{{ route('admin.dashboard') }}" class="nav-link">Admin</a>
                    @endif
                    <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                        @csrf
                        <button type="submit" class="nav-link" style="background: none; border: none; cursor: pointer; color: white; font-size: 0.9375rem; font-weight: 600;">
                            Đăng xuất
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="nav-link">Đăng nhập</a>
                @endauth
            </nav>

            <!-- Mobile Menu Button -->
            <button class="mobile-menu-btn" onclick="toggleMobileMenu()">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M3 12h18M3 6h18M3 18h18"></path>
                </svg>
            </button>
        </div>
    </div>

    <div class="header-main">
        <div class="header-container">
            <a href="{{ route('home') }}" class="logo-wrapper">
                <img src="{{ asset('images/noaa-logo.png') }}" alt="VODIC Logo" class="noaa-logo">
                <div class="logo-text">
                    <span class="logo-title">Trung tâm Dữ liệu và Thông tin Đại dương Việt Nam</span>
                    <span class="logo-subtitle">Vietnam Oceanic Data and Information Center</span>
                </div>
            </a>

            <div class="header-search">
                <form action="{{ route('search') }}" method="GET">
                    <input type="text" name="search" placeholder="Tìm kiếm..." class="header-search-input">
                    <button type="submit" class="header-search-btn">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            ircle cx="11" cy="11" r="8"></circle>
                            <path d="M21 21l-4.35-4.35"></path>
                        </svg>
                    </button>
                </form>
            </div>
        </div>
    </div>
</header>

<!-- Mobile Menu -->
<div class="mobile-menu" id="mobileMenu">
    <div class="mobile-menu-content">
        <input type="text" placeholder="Tìm kiếm..." class="mobile-weather-input">
        <nav class="mobile-nav">
            <a href="{{ route('news.index') }}">Tin tức</a>
            <a href="/gioi-thieu">Giới thiệu</a>
            <a href="/lien-he">Liên hệ</a>
            
            @auth
                @if(auth()->user()->isAdmin())
                    <a href="{{ route('admin.dashboard') }}">Admin</a>
                @endif
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" style="width: 100%; text-align: left; background: none; border: none; color: white; padding: 0.875rem 1rem; font-weight: 600;">
                        Đăng xuất
                    </button>
                </form>
            @else
                <a href="{{ route('login') }}">Đăng nhập</a>
            @endauth
        </nav>
    </div>
</div>
