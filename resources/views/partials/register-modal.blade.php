<!-- Register Modal -->
<div id="registerModal" class="modal-overlay" style="display: none;">
    <div class="modal-container">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h2 class="modal-title">✨ Đăng ký tài khoản</h2>
                <button class="modal-close" onclick="closeRegisterModal()">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </button>
            </div>

            <!-- Modal Body -->
            <form method="POST" action="{{ route('register') }}" class="modal-form">
                @csrf

                <!-- Name -->
                <div class="form-group">
                    <label for="modal-name" class="form-label">Họ và tên</label>
                    <input id="modal-name" 
                           type="text" 
                           name="name" 
                           class="form-input" 
                           value="{{ old('name') }}" 
                           required 
                           autofocus 
                           autocomplete="name"
                           placeholder="Nguyễn Văn A">
                    @error('name')
                        <span class="form-error">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Email -->
                <div class="form-group">
                    <label for="modal-register-email" class="form-label">Email</label>
                    <input id="modal-register-email" 
                           type="email" 
                           name="email" 
                           class="form-input" 
                           value="{{ old('email') }}" 
                           required 
                           autocomplete="username"
                           placeholder="email@example.com">
                    @error('email')
                        <span class="form-error">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Password -->
                <div class="form-group">
                    <label for="modal-register-password" class="form-label">Mật khẩu</label>
                    <input id="modal-register-password" 
                           type="password" 
                           name="password" 
                           class="form-input" 
                           required 
                           autocomplete="new-password"
                           placeholder="••••••••">
                    <span class="form-hint">Tối thiểu 8 ký tự</span>
                    @error('password')
                        <span class="form-error">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Confirm Password -->
                <div class="form-group">
                    <label for="modal-password-confirmation" class="form-label">Xác nhận mật khẩu</label>
                    <input id="modal-password-confirmation" 
                           type="password" 
                           name="password_confirmation" 
                           class="form-input" 
                           required 
                           autocomplete="new-password"
                           placeholder="••••••••">
                    @error('password_confirmation')
                        <span class="form-error">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn btn-primary btn-block">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M16 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"></path>
                        <circle cx="8.5" cy="7" r="4"></circle>
                        <line x1="20" y1="8" x2="20" y2="14"></line>
                        <line x1="23" y1="11" x2="17" y2="11"></line>
                    </svg>
                    Đăng ký
                </button>

                <!-- Login Link -->
                <div class="form-footer" style="text-align: center; margin-top: 1rem; padding-top: 1rem; border-top: 1px solid #e5e7eb;">
                    <span style="color: var(--text-secondary); font-size: 0.9375rem;">Đã có tài khoản? </span>
                    <a href="#" onclick="switchToLogin(); return false;" class="login-link" style="color: var(--ocean-blue); font-weight: 600; text-decoration: none; transition: color 0.2s;" onmouseover="this.style.color='var(--ocean-dark)'" onmouseout="this.style.color='var(--ocean-blue)'">
                        Đăng nhập ngay
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
function openRegisterModal() {
    document.getElementById('registerModal').style.display = 'flex';
    document.body.style.overflow = 'hidden';
}

function closeRegisterModal() {
    document.getElementById('registerModal').style.display = 'none';
    document.body.style.overflow = 'auto';
}

function switchToLogin() {
    closeRegisterModal();
    openLoginModal();
}

// Close modal when clicking outside
document.getElementById('registerModal')?.addEventListener('click', function(e) {
    if (e.target === this) {
        closeRegisterModal();
    }
});

// Open register modal if there are validation errors
@if($errors->any() && request()->routeIs('register'))
    document.addEventListener('DOMContentLoaded', function() {
        openRegisterModal();
    });
@endif
</script>

<style>
.form-hint {
    display: block;
    color: var(--text-secondary);
    font-size: 0.8125rem;
    margin-top: 0.25rem;
}
</style>
