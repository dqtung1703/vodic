<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialAuthController extends Controller
{
    /**
     * Redirect to Google OAuth page
     */
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Handle Google OAuth callback
     */
    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();
            
            \Log::info('Google OAuth callback', [
                'google_id' => $googleUser->id,
                'email' => $googleUser->email,
                'name' => $googleUser->name,
            ]);
            
            // Tìm user theo google_id hoặc email
            $user = User::where('google_id', $googleUser->id)
                ->orWhere('email', $googleUser->email)
                ->first();

            if ($user) {
                \Log::info('User found', ['user_id' => $user->id, 'is_locked' => $user->is_locked]);
                
                // Kiểm tra user có bị khóa không
                if ($user->is_locked) {
                    return redirect()->route('login')
                        ->with('error', 'Tài khoản của bạn đã bị khóa. Vui lòng liên hệ quản trị viên.');
                }
                
                // Cập nhật google_id nếu chưa có
                if (!$user->google_id) {
                    $user->update(['google_id' => $googleUser->id]);
                }
            } else {
                \Log::info('Creating new user');
                
                // Tạo user mới
                $user = User::create([
                    'name' => $googleUser->name,
                    'email' => $googleUser->email,
                    'google_id' => $googleUser->id,
                    'password' => bcrypt(str()->random(16)),
                    'is_admin' => false,
                    'is_locked' => false,
                ]);
                
                \Log::info('New user created', ['user_id' => $user->id]);
            }

            // Đăng nhập user
            Auth::login($user, true);
            
            \Log::info('User logged in', ['user_id' => $user->id, 'auth_check' => Auth::check()]);

            return redirect()->intended('/');
            
        } catch (\Exception $e) {
            \Log::error('Google OAuth error', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            
            return redirect()->route('login')
                ->with('error', 'Đăng nhập Google thất bại: ' . $e->getMessage());
        }
    }
}
