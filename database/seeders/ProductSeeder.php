<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            [
                'category_id' => 1, // VF3
                'name' => 'VinFast VF3 Plus',
                'description' => 'VinFast VF3 Plus - Phiên bản nâng cấp của VF3 với nhiều tính năng hiện đại hơn.',
                'price' => 315000000,
                'stock' => 10,
                'is_featured' => true,
                'status' => true,
            ],
            [
                'category_id' => 2, // VF5
                'name' => 'VinFast VF5 Plus',
                'description' => 'VinFast VF5 Plus - SUV cỡ nhỏ với thiết kế hiện đại và công nghệ tiên tiến.',
                'price' => 458000000,
                'stock' => 15,
                'is_featured' => true,
                'status' => true,
            ],
            [
                'category_id' => 3, // VF6
                'name' => 'VinFast VF6 Plus',
                'description' => 'VinFast VF6 Plus - SUV cỡ trung với không gian rộng rãi và tiện nghi cao cấp.',
                'price' => 675000000,
                'stock' => 8,
                'is_featured' => true,
                'status' => true,
            ],
            [
                'category_id' => 4, // VF7
                'name' => 'VinFast VF7 Plus',
                'description' => 'VinFast VF7 Plus - SUV cỡ trung với công nghệ tiên tiến và an toàn vượt trội.',
                'price' => 799000000,
                'stock' => 12,
                'is_featured' => false,
                'status' => true,
            ],
            [
                'category_id' => 5, // VF8
                'name' => 'VinFast VF8 Plus',
                'description' => 'VinFast VF8 Plus - SUV cỡ lớn sang trọng với nhiều tính năng cao cấp.',
                'price' => 999000000,
                'stock' => 6,
                'is_featured' => true,
                'status' => true,
            ],
            [
                'category_id' => 6, // VF9
                'name' => 'VinFast VF9 Plus',
                'description' => 'VinFast VF9 Plus - SUV cỡ lớn 7 chỗ ngồi với không gian rộng rãi và tiện nghi cao cấp.',
                'price' => 1299000000,
                'stock' => 5,
                'is_featured' => true,
                'status' => true,
            ],
        ];

        foreach ($products as $product) {
            Product::create([
                'category_id' => $product['category_id'],
                'name' => $product['name'],
                'slug' => Str::slug($product['name']),
                'description' => $product['description'],
                'price' => $product['price'],
                'stock' => $product['stock'],
                'is_featured' => $product['is_featured'],
                'status' => $product['status'],
            ]);
        }
    }
} 