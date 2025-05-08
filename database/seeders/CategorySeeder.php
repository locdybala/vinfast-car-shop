<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'name' => 'VF3',
                'description' => 'VinFast VF3 - Mẫu xe điện cỡ nhỏ, phù hợp cho đô thị',
            ],
            [
                'name' => 'VF5',
                'description' => 'VinFast VF5 - SUV cỡ nhỏ, thiết kế hiện đại',
            ],
            [
                'name' => 'VF6',
                'description' => 'VinFast VF6 - SUV cỡ trung, không gian rộng rãi',
            ],
            [
                'name' => 'VF7',
                'description' => 'VinFast VF7 - SUV cỡ trung, công nghệ tiên tiến',
            ],
            [
                'name' => 'VF8',
                'description' => 'VinFast VF8 - SUV cỡ lớn, sang trọng',
            ],
            [
                'name' => 'VF9',
                'description' => 'VinFast VF9 - SUV cỡ lớn, 7 chỗ ngồi',
            ],
        ];

        foreach ($categories as $category) {
            Category::create([
                'name' => $category['name'],
                'slug' => Str::slug($category['name']),
                'description' => $category['description'],
            ]);
        }
    }
} 