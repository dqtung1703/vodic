@extends('admin.admin')

@section('title', 'Thêm Người dùng mới')
@section('page-title', 'Thêm Người dùng mới')

@section('content')
<div class="form-container" style="max-width: 800px;">
    <div class="form-card">
        <div class="form-header">
            <h2>👤 Tạo Người dùng mới</h2>
        </div>

        <form action="{{ route('admin.users.store') }}" method="POST">
            @csrf
            <div class="form-body">
                <div class="form-group">
                    <label for="name" class="form-label">
                        Tên người dùng <span class="required">*</span>
                    </label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}" 
                        class="form-input @error('name') error @enderror"
                        placeholder="Nhập tên người dùng" required>
                    @error('name')
                        <span class="form-error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email" class="form-label">
                        Email <span class="required">*</span>
                    </label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}" 
                        class="form-input @error('email') error @enderror"
                        placeholder="example@email.com" required>
                    @error('email')
                        <span class="form-error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password" class="form-label">
                        Mật khẩu <span class="required">*</span>
                    </label>
                    <input type="password" name="password" id="password" 
                        class="form-input @error('password') error @enderror"
                        placeholder="Tối thiểu 8 ký tự" required>
                    @error('password')
                        <span class="form-error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password_confirmation" class="form-label">
                        Xác nhận mật khẩu <span class="required">*</span>
                    </label>
                    <input type="password" name="password_confirmation" id="password_confirmation" 
                        class="form-input"
                        placeholder="Nhập lại mật khẩu" required>
                </div>

                <div class="form-group">
                    <label style="display: flex; align-items: center; gap: 0.75rem; cursor: pointer;">
                        <input type="checkbox" name="is_admin" value="1" {{ old('is_admin') ? 'checked' : '' }}
                               style="width: 20px; height: 20px; cursor: pointer;">
                        <span class="form-label" style="margin: 0;">
                            👑 Cấp quyền Admin
                        </span>
                    </label>
                    <span class="form-hint">Admin có toàn quyền quản lý hệ thống</span>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn-form-primary">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M19 21H5a2 2 0 01-2-2V5a2 2 0 012-2h11l5 5v11a2 2 0 01-2 2z"></path>
                            <polyline points="17 21 17 13 7 13 7 21"></polyline>
                            <polyline points="7 3 7 8 15 8"></polyline>
                        </svg>
                        Tạo người dùng
                    </button>
                    <a href="{{ route('admin.users.index') }}" class="btn-form-secondary">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <line x1="18" y1="6" x2="6" y2="18"></line>
                            <line x1="6" y1="6" x2="18" y2="18"></line>
                        </svg>
                        Hủy
                    </a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
