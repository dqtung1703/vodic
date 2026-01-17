<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin Dashboard') - VODIC</title>
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <style>
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            width: 250px;
            background: #1e293b;
            color: white;
            overflow-y: auto;
        }
        .main-content {
            margin-left: 250px;
            min-height: 100vh;
            background: #f1f5f9;
        }
        .sidebar a {
            display: block;
            padding: 12px 20px;
            color: #94a3b8;
            text-decoration: none;
            transition: all 0.3s;
        }
        .sidebar a:hover, .sidebar a.active {
            background: #334155;
            color: white;
        }
    </style>
    
    @stack('styles')
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="p-6">
            <h2 class="text-xl font-bold text-white">VODIC Admin</h2>
        </div>
        
        <nav class="mt-6">
            <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                📊 Dashboard
            </a>
            <a href="{{ route('admin.categories.index') }}" class="{{ request()->routeIs('admin.categories.*') ? 'active' : '' }}">
                📁 Quản lý Danh mục
            </a>
            <a href="{{ route('admin.posts.index') }}" class="{{ request()->routeIs('admin.posts.*') ? 'active' : '' }}">
                📝 Quản lý Bài viết
            </a>
            <hr class="my-4 border-gray-700">
            <a href="{{ route('home') }}" target="_blank">
                🌐 Xem website
            </a>
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                🚪 Đăng xuất
            </a>
        </nav>
        
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
            @csrf
        </form>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Top Bar -->
        <header class="bg-white shadow-sm">
            <div class="px-6 py-4">
                <div class="flex justify-between items-center">
                    <h1 class="text-2xl font-bold text-gray-800">@yield('page-title', 'Dashboard')</h1>
                    <div class="text-sm text-gray-600">
                        Xin chào, <strong>{{ auth()->user()->name }}</strong>
                    </div>
                </div>
            </div>
        </header>

        <!-- Page Content -->
        <main class="p-6">
            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                    {{ session('error') }}
                </div>
            @endif

            @yield('content')
        </main>
    </div>

    @stack('scripts')
</body>
</html>
