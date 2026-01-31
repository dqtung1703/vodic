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

                <!-- Divider -->
                <div style="display: flex; align-items: center; margin: 1.25rem 0; color: #94a3b8; font-size: 0.875rem;">
                    <div style="flex: 1; border-bottom: 1px solid #e2e8f0;"></div>
                    <span style="padding: 0 1rem; font-weight: 500;">Hoặc</span>
                    <div style="flex: 1; border-bottom: 1px solid #e2e8f0;"></div>
                </div>

                <!-- Google Login Button -->
                <a href="{{ route('auth.google') }}" class="btn btn-google btn-block" style="background: white; color: #1e293b; border: 2px solid #e2e8f0; display: flex; align-items: center; justify-content: center; gap: 0.75rem; text-decoration: none; transition: all 0.3s;">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none">
                        <path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"/>
                        <path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/>
                        <path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" fill="#FBBC05"/>
                        <path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"/>
                    </svg>
                    <span>Đăng nhập bằng Google</span>
                </a>

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
