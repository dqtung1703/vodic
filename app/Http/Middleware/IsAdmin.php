<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!auth()->check()) {
            return redirect()->route('login')
                ->with('error', 'Vui lòng đăng nhập để tiếp tục');
        }

        // Check if account is locked
        if (auth()->user()->is_locked) {
            auth()->logout();
            return redirect()->route('login')
                ->with('error', 'Tài khoản của bạn đã bị khóa. Vui lòng liên hệ quản trị viên.');
        }

        if (!auth()->user()->is_admin) {
            abort(403, 'Bạn không có quyền truy cập trang này');
        }

        return $next($request);
    }
}
