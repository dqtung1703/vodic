<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        // Kiểm tra xem admin đã tồn tại chưa
        if (!User::where('email', 'admin@vodic.vn')->exists()) {
            User::create([
                'name' => 'Admin VODIC',
                'email' => 'admin@vodic.vn',
                'password' => Hash::make('Admin@2026'),
                'is_admin' => true,
                'email_verified_at' => now(),
            ]);
            
            echo "✅ Đã tạo tài khoản admin: admin@vodic.vn / Admin@2026\n";
        } else {
            echo "ℹ️ Tài khoản admin đã tồn tại\n";
        }
    }
}