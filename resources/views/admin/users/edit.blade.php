@extends('admin.admin')

@section('title', 'Chỉnh sửa Người dùng')
@section('page-title', 'Chỉnh sửa Người dùng')

@section('content')
<div class="form-container" style="max-width: 800px;">
    <div class="form-card">
        <div class="form-header">
            <h2>✏️ Chỉnh sửa Người dùng</h2>
        </div>

        <form action="{{ route('admin.users.update', $user) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="form-body">
                <div class="form-group">
                    <label for="name" class="form-label">
                        Tên người dùng <span class="required">*</span>
                    </label>
                    <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" 
                        class="form-input @error('name') error @enderror" required>
                    @error('name')
                        <span class="form-error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email" class="form-label">
                        Email <span class="required">*</span>
                    </label>
                    <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" 
                        class="form-input @error('email') error @enderror" required>
                    @error('email')
                        <span class="form-error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password" class="form-label">
                        Mật khẩu mới
                    </label>
                    <input type="password" name="password" id="password" 
                        class="form-input @error('password') error @enderror"
                        placeholder="Để trống nếu không đổi mật khẩu">
                    <span class="form-hint">Chỉ nhập nếu muốn thay đổi mật khẩu</span>
                    @error('password')
                        <span class="form-error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password_confirmation" class="form-label">
                        Xác nhận mật khẩu mới
                    </label>
                    <input type="password" name="password_confirmation" id="password_confirmation" 
                        class="form-input"
                        placeholder="Nhập lại mật khẩu mới">
                </div>

                <div class="form-group">
                    <label style="display: flex; align-items: center; gap: 0.75rem; cursor: pointer;">
                        <input type="checkbox" name="is_admin" value="1" 
                               {{ old('is_admin', $user->is_admin) ? 'checked' : '' }}
                               style="width: 20px; height: 20px; cursor: pointer;"
                               {{ $user->id === auth()->id() ? 'disabled' : '' }}>
                        <span class="form-label" style="margin: 0;">
                            👑 Cấp quyền Admin
                        </span>
                    </label>
                    @if($user->id === auth()->id())
                        <span class="form-hint" style="color: #ef4444;">Bạn không thể thay đổi quyền của chính mình</span>
                    @else
                        <span class="form-hint">Admin có toàn quyền quản lý hệ thống</span>
                    @endif
                </div>

                <div style="background: #f9fafb; padding: 1rem; border-radius: 8px; margin-bottom: 1.5rem;">
                    <h4 style="font-size: 0.875rem; font-weight: 600; color: #374151; margin-bottom: 0.5rem;">📊 Thông tin</h4>
                    <div style="font-size: 0.875rem; color: #6b7280; line-height: 1.8;">
                        <p><strong>📝 Số bài viết:</strong> {{ $user->posts->count() }}</p>
                        <p><strong>📅 Tạo:</strong> {{ $user->created_at->format('d/m/Y H:i') }}</p>
                        <p><strong>🔄 Cập nhật:</strong> {{ $user->updated_at->format('d/m/Y H:i') }}</p>
                        <p><strong>🔒 Trạng thái:</strong> 
                            @if($user->is_locked)
                                <span style="color: #ef4444;">Đã khóa</span>
                            @else
                                <span style="color: #10b981;">Hoạt động</span>
                            @endif
                        </p>
                    </div>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn-form-primary">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M19 21H5a2 2 0 01-2-2V5a2 2 0 012-2h11l5 5v11a2 2 0 01-2 2z"></path>
                            <polyline points="17 21 17 13 7 13 7 21"></polyline>
                            <polyline points="7 3 7 8 15 8"></polyline>
                        </svg>
                        Cập nhật
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
