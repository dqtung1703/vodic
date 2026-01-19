@extends('layouts.app')

@section('title', 'Thông tin cá nhân')

@section('content')
<div class="container" style="padding: 3rem 1.5rem; max-width: 800px;">
    <h1 style="font-size: 2rem; font-weight: 700; color: var(--text-primary); margin-bottom: 2rem;">👤 Thông tin cá nhân</h1>

    @if(session('status') === 'profile-updated')
        <div style="background: #d1fae5; border-left: 4px solid #10b981; padding: 1rem; border-radius: 8px; margin-bottom: 2rem;">
            <p style="color: #065f46; font-weight: 600;">✅ Thông tin đã được cập nhật thành công!</p>
        </div>
    @endif

    <!-- Profile Information -->
    <div style="background: white; padding: 2rem; border-radius: 12px; box-shadow: 0 2px 8px rgba(0,0,0,0.1); margin-bottom: 2rem;">
        <h2 style="font-size: 1.25rem; font-weight: 700; color: var(--text-primary); margin-bottom: 1.5rem;">📝 Thông tin tài khoản</h2>
        
        <form method="POST" action="{{ route('profile.update') }}">
            @csrf
            @method('PATCH')

            <div style="margin-bottom: 1.5rem;">
                <label style="display: block; font-weight: 600; color: var(--text-primary); margin-bottom: 0.5rem;">
                    Tên hiển thị <span style="color: #ef4444;">*</span>
                </label>
                <input type="text" name="name" value="{{ old('name', $user->name) }}" required
                       style="width: 100%; padding: 0.75rem 1rem; border: 2px solid #e5e7eb; border-radius: 8px; font-size: 1rem;">
                @error('name')
                    <span style="color: #ef4444; font-size: 0.875rem; margin-top: 0.25rem; display: block;">{{ $message }}</span>
                @enderror
            </div>

            <div style="margin-bottom: 1.5rem;">
                <label style="display: block; font-weight: 600; color: var(--text-primary); margin-bottom: 0.5rem;">
                    Email <span style="color: #ef4444;">*</span>
                </label>
                <input type="email" name="email" value="{{ old('email', $user->email) }}" required
                       style="width: 100%; padding: 0.75rem 1rem; border: 2px solid #e5e7eb; border-radius: 8px; font-size: 1rem;">
                @error('email')
                    <span style="color: #ef4444; font-size: 0.875rem; margin-top: 0.25rem; display: block;">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" style="background: var(--ocean-blue); color: white; padding: 0.75rem 1.5rem; border-radius: 8px; border: none; font-weight: 600; cursor: pointer; font-size: 1rem;">
                💾 Lưu thay đổi
            </button>
        </form>
    </div>

    <!-- Update Password -->
    <div style="background: white; padding: 2rem; border-radius: 12px; box-shadow: 0 2px 8px rgba(0,0,0,0.1); margin-bottom: 2rem;">
        <h2 style="font-size: 1.25rem; font-weight: 700; color: var(--text-primary); margin-bottom: 1.5rem;">🔒 Đổi mật khẩu</h2>
        
        <form method="POST" action="{{ route('password.update') }}">
            @csrf
            @method('PUT')

            <div style="margin-bottom: 1.5rem;">
                <label style="display: block; font-weight: 600; color: var(--text-primary); margin-bottom: 0.5rem;">
                    Mật khẩu hiện tại <span style="color: #ef4444;">*</span>
                </label>
                <input type="password" name="current_password" required
                       style="width: 100%; padding: 0.75rem 1rem; border: 2px solid #e5e7eb; border-radius: 8px; font-size: 1rem;">
                @error('current_password')
                    <span style="color: #ef4444; font-size: 0.875rem; margin-top: 0.25rem; display: block;">{{ $message }}</span>
                @enderror
            </div>

            <div style="margin-bottom: 1.5rem;">
                <label style="display: block; font-weight: 600; color: var(--text-primary); margin-bottom: 0.5rem;">
                    Mật khẩu mới <span style="color: #ef4444;">*</span>
                </label>
                <input type="password" name="password" required
                       style="width: 100%; padding: 0.75rem 1rem; border: 2px solid #e5e7eb; border-radius: 8px; font-size: 1rem;">
                @error('password')
                    <span style="color: #ef4444; font-size: 0.875rem; margin-top: 0.25rem; display: block;">{{ $message }}</span>
                @enderror
            </div>

            <div style="margin-bottom: 1.5rem;">
                <label style="display: block; font-weight: 600; color: var(--text-primary); margin-bottom: 0.5rem;">
                    Xác nhận mật khẩu mới <span style="color: #ef4444;">*</span>
                </label>
                <input type="password" name="password_confirmation" required
                       style="width: 100%; padding: 0.75rem 1rem; border: 2px solid #e5e7eb; border-radius: 8px; font-size: 1rem;">
            </div>

            <button type="submit" style="background: var(--ocean-blue); color: white; padding: 0.75rem 1.5rem; border-radius: 8px; border: none; font-weight: 600; cursor: pointer; font-size: 1rem;">
                🔐 Đổi mật khẩu
            </button>
        </form>
    </div>

    <!-- Account Stats -->
    <div style="background: white; padding: 2rem; border-radius: 12px; box-shadow: 0 2px 8px rgba(0,0,0,0.1);">
        <h2 style="font-size: 1.25rem; font-weight: 700; color: var(--text-primary); margin-bottom: 1.5rem;">📊 Thống kê tài khoản</h2>
        
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1.5rem;">
            <div style="text-align: center; padding: 1.5rem; background: linear-gradient(135deg, #e0e7ff, #c7d2fe); border-radius: 8px;">
                <div style="font-size: 2rem; font-weight: 700; color: #3730a3; margin-bottom: 0.5rem;">
                    {{ $user->posts()->count() }}
                </div>
                <div style="color: #4c1d95; font-weight: 600;">Tổng bài viết</div>
            </div>

            <div style="text-align: center; padding: 1.5rem; background: linear-gradient(135deg, #d1fae5, #a7f3d0); border-radius: 8px;">
                <div style="font-size: 2rem; font-weight: 700; color: #065f46; margin-bottom: 0.5rem;">
                    {{ $user->posts()->where('status', 'published')->count() }}
                </div>
                <div style="color: #064e3b; font-weight: 600;">Đã xuất bản</div>
            </div>

            <div style="text-align: center; padding: 1.5rem; background: linear-gradient(135deg, #fef3c7, #fde68a); border-radius: 8px;">
                <div style="font-size: 2rem; font-weight: 700; color: #92400e; margin-bottom: 0.5rem;">
                    {{ $user->posts()->where('status', 'draft')->count() }}
                </div>
                <div style="color: #78350f; font-weight: 600;">Bản nháp</div>
            </div>
        </div>

        <div style="margin-top: 1.5rem; padding-top: 1.5rem; border-top: 1px solid #e5e7eb;">
            <p style="color: var(--text-secondary); font-size: 0.875rem;">
                <strong>Ngày tham gia:</strong> {{ $user->created_at->format('d/m/Y') }}
            </p>
            <p style="color: var(--text-secondary); font-size: 0.875rem; margin-top: 0.5rem;">
                <strong>Vai trò:</strong> 
                @if($user->is_admin)
                    <span style="color: #dc2626; font-weight: 600;">👑 Quản trị viên</span>
                @else
                    <span style="color: #0066cc; font-weight: 600;">👤 Người dùng</span>
                @endif
            </p>
        </div>
    </div>
</div>
@endsection
