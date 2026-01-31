@extends('layouts.auth')

@section('title', 'Đặt lại mật khẩu - VODIC')

@push('styles')
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
    
    body {
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
        background: linear-gradient(135deg, #0066cc 0%, #003d7a 50%, #001f3f 100%);
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 2rem 1rem;
        position: relative;
        overflow: hidden;
    }
    
    body::before {
        content: '';
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: radial-gradient(circle, rgba(255,255,255,0.1) 1px, transparent 1px);
        background-size: 50px 50px;
        animation: backgroundMove 20s linear infinite;
        pointer-events: none;
    }
    
    @keyframes backgroundMove {
        0% { transform: translate(0, 0); }
        100% { transform: translate(50px, 50px); }
    }
    
    .reset-container {
        width: 100%;
        max-width: 420px;
        position: relative;
        z-index: 1;
    }
    
    .reset-card {
        background: rgba(255, 255, 255, 0.98);
        backdrop-filter: blur(20px);
        border-radius: 20px;
        box-shadow: 
            0 20px 60px rgba(0, 0, 0, 0.3),
            0 0 0 1px rgba(255, 255, 255, 0.1) inset;
        padding: 2rem 2rem;
        animation: slideUp 0.6s cubic-bezier(0.16, 1, 0.3, 1);
        position: relative;
        overflow: hidden;
    }
    
    .reset-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, #0066cc, #00a8ff, #0066cc);
        background-size: 200% 100%;
        animation: shimmer 3s linear infinite;
    }
    
    @keyframes shimmer {
        0% { background-position: -200% 0; }
        100% { background-position: 200% 0; }
    }
    
    @keyframes slideUp {
        from {
            opacity: 0;
            transform: translateY(40px) scale(0.95);
        }
        to {
            opacity: 1;
            transform: translateY(0) scale(1);
        }
    }
    
    .reset-header {
        text-align: center;
        margin-bottom: 2rem;
    }
    
    .reset-icon {
        width: 70px;
        height: 70px;
        margin: 0 auto 1rem;
        background: linear-gradient(135deg, #10b981 0%, #059669 100%);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 8px 24px rgba(16, 185, 129, 0.3);
    }
    
    .reset-icon svg {
        width: 35px;
        height: 35px;
        color: white;
    }
    
    .reset-title {
        font-size: 1.5rem;
        font-weight: 700;
        color: #1a1a1a;
        margin-bottom: 0.5rem;
    }
    
    .reset-description {
        color: #64748b;
        font-size: 0.875rem;
        line-height: 1.6;
    }
    
    .form-group {
        margin-bottom: 1.25rem;
    }
    
    .form-label {
        display: block;
        font-size: 0.8125rem;
        font-weight: 600;
        color: #334155;
        margin-bottom: 0.4rem;
    }
    
    .input-wrapper {
        position: relative;
    }
    
    .input-icon {
        position: absolute;
        left: 1rem;
        top: 50%;
        transform: translateY(-50%);
        color: #94a3b8;
        transition: color 0.3s;
        pointer-events: none;
    }
    
    .form-input {
        width: 100%;
        padding: 0.75rem 1rem 0.75rem 2.75rem;
        border: 2px solid #e2e8f0;
        border-radius: 10px;
        font-size: 0.9rem;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        background: #f8fafc;
        color: #1e293b;
    }
    
    .form-input:focus {
        outline: none;
        border-color: #0066cc;
        background: white;
        box-shadow: 
            0 0 0 4px rgba(0, 102, 204, 0.1),
            0 4px 12px rgba(0, 102, 204, 0.15);
        transform: translateY(-1px);
    }
    
    .form-input:focus + .input-icon {
        color: #0066cc;
    }
    
    .form-input.error {
        border-color: #ef4444;
        background: #fef2f2;
    }
    
    .error-message {
        color: #ef4444;
        font-size: 0.875rem;
        margin-top: 0.5rem;
        display: flex;
        align-items: center;
        gap: 0.375rem;
        animation: shake 0.4s;
    }
    
    @keyframes shake {
        0%, 100% { transform: translateX(0); }
        25% { transform: translateX(-8px); }
        75% { transform: translateX(8px); }
    }
    
    .submit-button {
        width: 100%;
        padding: 0.875rem;
        background: linear-gradient(135deg, #10b981 0%, #059669 100%);
        color: white;
        border: none;
        border-radius: 10px;
        font-size: 0.95rem;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        box-shadow: 0 4px 12px rgba(16, 185, 129, 0.3);
        position: relative;
        overflow: hidden;
    }
    
    .submit-button::before {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        width: 0;
        height: 0;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.2);
        transform: translate(-50%, -50%);
        transition: width 0.6s, height 0.6s;
    }
    
    .submit-button:hover::before {
        width: 300px;
        height: 300px;
    }
    
    .submit-button:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 24px rgba(16, 185, 129, 0.4);
    }
    
    .submit-button span {
        position: relative;
        z-index: 1;
    }
    
    .alert {
        padding: 1rem 1.25rem;
        border-radius: 12px;
        margin-bottom: 1.5rem;
        display: flex;
        align-items: flex-start;
        gap: 0.75rem;
        animation: slideDown 0.4s ease;
    }
    
    @keyframes slideDown {
        from {
            opacity: 0;
            transform: translateY(-10px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    .alert-error {
        background: linear-gradient(135deg, #fee2e2 0%, #fecaca 100%);
        color: #991b1b;
        border: 1px solid #fca5a5;
    }
    
    @media (max-width: 480px) {
        .reset-card {
            padding: 1.75rem 1.5rem;
        }
    }
</style>
@endpush

@section('content')
<div class="reset-container">
    <div class="reset-card">
        <div class="reset-header">
            <div class="reset-icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
                </svg>
            </div>
            <h1 class="reset-title">Đặt lại mật khẩu</h1>
            <p class="reset-description">
                Nhập mật khẩu mới cho tài khoản của bạn.
            </p>
        </div>

        @if ($errors->any())
        <div class="alert alert-error">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <circle cx="12" cy="12" r="10"/>
                <line x1="12" y1="8" x2="12" y2="12"/>
                <line x1="12" y1="16" x2="12.01" y2="16"/>
            </svg>
            <div>
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        </div>
        @endif

        <form method="POST" action="{{ route('password.update') }}">
            @csrf
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <div class="form-group">
                <label for="email" class="form-label">Email</label>
                <div class="input-wrapper">
                    <input 
                        id="email" 
                        type="email" 
                        name="email" 
                        class="form-input @error('email') error @enderror" 
                        value="{{ old('email', $request->email) }}" 
                        required 
                        autofocus
                        placeholder="admin@vodic.vn">
                    <svg class="input-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/>
                        <polyline points="22,6 12,13 2,6"/>
                    </svg>
                </div>
                @error('email')
                    <div class="error-message">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="12" cy="12" r="10"/>
                            <line x1="12" y1="8" x2="12" y2="12"/>
                            <line x1="12" y1="16" x2="12.01" y2="16"/>
                        </svg>
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="password" class="form-label">Mật khẩu mới</label>
                <div class="input-wrapper">
                    <input 
                        id="password" 
                        type="password" 
                        name="password" 
                        class="form-input @error('password') error @enderror" 
                        required
                        placeholder="••••••••">
                    <svg class="input-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <rect x="3" y="11" width="18" height="11" rx="2" ry="2"/>
                        <path d="M7 11V7a5 5 0 0 1 10 0v4"/>
                    </svg>
                </div>
                @error('password')
                    <div class="error-message">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="12" cy="12" r="10"/>
                            <line x1="12" y1="8" x2="12" y2="12"/>
                            <line x1="12" y1="16" x2="12.01" y2="16"/>
                        </svg>
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="password_confirmation" class="form-label">Xác nhận mật khẩu</label>
                <div class="input-wrapper">
                    <input 
                        id="password_confirmation" 
                        type="password" 
                        name="password_confirmation" 
                        class="form-input" 
                        required
                        placeholder="••••••••">
                    <svg class="input-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <rect x="3" y="11" width="18" height="11" rx="2" ry="2"/>
                        <path d="M7 11V7a5 5 0 0 1 10 0v4"/>
                    </svg>
                </div>
            </div>

            <button type="submit" class="submit-button">
                <span>Đặt lại mật khẩu</span>
            </button>
        </form>
    </div>
</div>
@endsection
