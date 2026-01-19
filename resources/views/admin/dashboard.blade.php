@extends('layouts.app')

@section('title', 'Admin Dashboard - VODIC')

@section('content')
<div class="container" style="padding: 3rem 1.5rem;">
    <h1>Admin Dashboard</h1>
    
    <div style="margin-top: 2rem;">
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 1.5rem;">
            
            <div style="background: white; padding: 1.5rem; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
                <h3>Tổng bài viết</h3>
                <p style="font-size: 2rem; font-weight: bold; color: #0066cc;">{{ $stats['total_posts'] }}</p>
            </div>
            
            <div style="background: white; padding: 1.5rem; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
                <h3>Đã xuất bản</h3>
                <p style="font-size: 2rem; font-weight: bold; color: #10b981;">{{ $stats['published_posts'] }}</p>
            </div>
            
            <div style="background: white; padding: 1.5rem; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
                <h3>Bản nháp</h3>
                <p style="font-size: 2rem; font-weight: bold; color: #f59e0b;">{{ $stats['draft_posts'] }}</p>
            </div>
            
            <div style="background: white; padding: 1.5rem; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
                <h3>Danh mục</h3>
                <p style="font-size: 2rem; font-weight: bold; color: #8b5cf6;">{{ $stats['total_categories'] }}</p>
            </div>
            
            <div style="background: white; padding: 1.5rem; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
                <h3>Người dùng</h3>
                <p style="font-size: 2rem; font-weight: bold; color: #ec4899;">{{ $stats['total_users'] }}</p>
                <p style="font-size: 0.875rem; color: #6b7280; margin-top: 0.5rem;">
                    <span style="color: #10b981;">✅ {{ $stats['active_users'] }} hoạt động</span> • 
                    <span style="color: #ef4444;">🔒 {{ $stats['locked_users'] }} bị khóa</span>
                </p>
            </div>
            
        </div>
        
        <div style="margin-top: 2rem;">
            <a href="{{ route('admin.posts.index') }}" class="btn btn-primary" style="display: inline-block; padding: 0.75rem 1.5rem; background: #0066cc; color: white; border-radius: 6px; text-decoration: none; font-weight: 600;">
                Quản lý bài viết
            </a>
            
            <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary" style="display: inline-block; padding: 0.75rem 1.5rem; background: #6b7280; color: white; border-radius: 6px; text-decoration: none; font-weight: 600; margin-left: 1rem;">
                Quản lý danh mục
            </a>
            
            <a href="{{ route('admin.users.index') }}" class="btn btn-secondary" style="display: inline-block; padding: 0.75rem 1.5rem; background: #ec4899; color: white; border-radius: 6px; text-decoration: none; font-weight: 600; margin-left: 1rem;">
                Quản lý người dùng
            </a>
        </div>
    </div>
</div>
@endsection
