<!-- Login Modal -->
<div id="loginModal" class="modal-overlay" style="display: none;">
    <div class="modal-container">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h2 class="modal-title">Đăng nhập</h2>
                <button class="modal-close" onclick="closeLoginModal()">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </button>
            </div>

            <!-- Modal Body -->
            <form method="POST" action="{{ route('login') }}" class="modal-form">
                @csrf

                <!-- Email -->
                <div class="form-group">
                    <label for="modal-email" class="form-label">Email</label>
                    <input id="modal-email" 
                           type="email" 
                           name="email" 
                           class="form-input" 
                           value="{{ old('email') }}" 
                           required 
                           autofocus 
                           autocomplete="username"
                           placeholder="admin@vodic.vn">
                    @error('email')
                        <span class="form-error">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Password -->
                <div class="form-group">
                    <label for="modal-password" class="form-label">Mật khẩu</label>
                    <input id="modal-password" 
                           type="password" 
                           name="password" 
                           class="form-input" 
                           required 
                           autocomplete="current-password"
                           placeholder="••••••••">
                    @error('password')
                        <span class="form-error">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Remember Me -->
                <div class="form-checkbox">
                    <label class="checkbox-label">
                        <input type="checkbox" name="remember" class="checkbox-input">
                        <span>Ghi nhớ đăng nhập</span>
                    </label>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn btn-primary btn-block">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M15 3h4a2 2 0 012 2v14a2 2 0 01-2 2h-4M10 17l5-5-5-5M15 12H3"></path>
                    </svg>
                    Đăng nhập
                </button>

                <!-- Register Link -->
                <div class="form-footer" style="text-align: center; margin-top: 1rem; padding-top: 1rem; border-top: 1px solid #e5e7eb;">
                    <span style="color: var(--text-secondary); font-size: 0.9375rem;">Chưa có tài khoản? </span>
                    <a href="#" onclick="switchToRegister(); return false;" class="register-link" style="color: var(--ocean-blue); font-weight: 600; text-decoration: none; transition: color 0.2s;" onmouseover="this.style.color='var(--ocean-dark)'" onmouseout="this.style.color='var(--ocean-blue)'">
                        Đăng ký ngay
                    </a>
                </div>

                <!-- Forgot Password -->
                @if (Route::has('password.request'))
                    <div class="form-footer">
                        <a href="{{ route('password.request') }}" class="forgot-password">
                            Quên mật khẩu?
                        </a>
                    </div>
                @endif
            </form>
        </div>
    </div>
</div>

<script>
function switchToRegister() {
    closeLoginModal();
    openRegisterModal();
}
</script>
