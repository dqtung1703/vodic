<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Môi trường biển',
                'slug' => 'moi-truong-bien',
                'description' => 'Tin tức về môi trường biển Việt Nam',
                'is_active' => true,
            ],
            [
                'name' => 'Dữ liệu biển',
                'slug' => 'du-lieu-bien',
                'description' => 'Thông tin dữ liệu và khảo sát biển',
                'is_active' => true,
            ],
            [
                'name' => 'Dự báo thời tiết biển',
                'slug' => 'du-bao-thoi-tiet-bien',
                'description' => 'Dự báo và cảnh báo thời tiết biển',
                'is_active' => true,
            ],
            [
                'name' => 'Nghiên cứu khoa học',
                'slug' => 'nghien-cuu-khoa-hoc',
                'description' => 'Các nghiên cứu khoa học về biển',
                'is_active' => true,
            ],
            [
                'name' => 'Sự kiện',
                'slug' => 'su-kien',
                'description' => 'Các sự kiện và hội nghị',
                'is_active' => true,
            ],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
