<!-- Header -->
<header class="header">
    <div class="header-top">
        <div class="header-container">
            <!-- Weather Search -->
            <div class="weather-search">
                <span class="weather-label">Tìm kiếm dữ liệu biển</span>
                <form action="{{ route('search') }}" method="GET" class="search-input-wrapper">
                    <input type="text" name="location" placeholder="Nhập khu vực hoặc loại dữ liệu" class="weather-input">
                    <button type="submit" class="search-btn">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            ircle cx="11" cy="11" r="8"/>
                            <path d="M21 21l-4.35-4.35"/>
                        </svg>
                    </button>
                </form>
            </div>

            <!-- Navigation -->
            <nav class="main-nav">
                <a href="{{ route('news.index') }}" class="nav-link">Tin tức</a>
                <a href="{{ route('about') }}" class="nav-link">Giới thiệu</a>
                @auth
                    <a href="{{ route('dashboard') }}" class="nav-link">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="nav-link">Đăng nhập</a>
                @endauth
            </nav>

            <!-- Mobile Menu Button -->
            <button class="mobile-menu-btn" onclick="toggleMobileMenu()">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M3 12h18M3 6h18M3 18h18"/>
                </svg>
            </button>
        </div>
    </div>

    <div class="header-main">
        <div class="header-container">
            <a href="{{ route('home') }}" class="logo-wrapper">
                <img src="{{ asset('images/vodic-logo.png') }}" alt="VODIC Logo" class="noaa-logo">
                <div class="logo-text">
                    <span class="logo-title">Trung tâm Dữ liệu và Thông tin Đại dương Việt Nam</span>
                    <span class="logo-subtitle">Vietnam Oceanic Data and Information Center</span>
                </div>
            </a>

            <form action="{{ route('search') }}" method="GET" class="header-search">
                <input type="text" name="q" placeholder="Tìm kiếm..." class="header-search-input">
                <button type="submit" class="header-search-btn">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        ircle cx="11" cy="11" r="8"/>
                        <path d="M21 21l-4.35-4.35"/>
                    </svg>
                </button>
            </form>
        </div>
    </div>
</header>

<!-- Mobile Menu -->
<div class="mobile-menu" id="mobileMenu">
    <div class="mobile-menu-content">
        <form action="{{ route('search') }}" method="GET">
            <input type="text" name="location" placeholder="Tìm kiếm..." class="mobile-weather-input">
        </form>
        <nav class="mobile-nav">
            <a href="{{ route('news.index') }}">Tin tức</a>
            <a href="{{ route('about') }}">Giới thiệu</a>
            @auth
                <a href="{{ route('dashboard') }}">Dashboard</a>
            @else
                <a href="{{ route('login') }}">Đăng nhập</a>
            @endauth
        </nav>
    </div>
</div>
