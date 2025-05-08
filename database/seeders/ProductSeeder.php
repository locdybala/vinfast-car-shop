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
            // VF3
            [
                'category_id' => 1,
                'name' => 'VinFast VF3 Plus Đỏ',
                'description' => 'VinFast VF3 Plus màu Đỏ - Năng động, cá tính.',
                'price' => 315000000,
                'stock' => 10,
                'is_featured' => true,
                'status' => true,
                'color' => '#ff0000',
                'image' => 'products/vf3-red.jpg',
            ],
            [
                'category_id' => 1,
                'name' => 'VinFast VF3 Plus Đen',
                'description' => 'VinFast VF3 Plus màu Đen - Sang trọng, mạnh mẽ.',
                'price' => 315000000,
                'stock' => 8,
                'is_featured' => false,
                'status' => true,
                'color' => '#000000',
                'image' => 'products/vf3-black.jpg',
            ],
            // VF5
            [
                'category_id' => 2,
                'name' => 'VinFast VF5 Plus Vàng',
                'description' => 'VinFast VF5 Plus màu Vàng - Trẻ trung, nổi bật.',
                'price' => 458000000,
                'stock' => 12,
                'is_featured' => true,
                'status' => true,
                'color' => '#ffff00',
                'image' => 'products/vf5-yellow.jpg',
            ],
            [
                'category_id' => 2,
                'name' => 'VinFast VF5 Plus Xanh Dương',
                'description' => 'VinFast VF5 Plus màu Xanh Dương - Hiện đại, cá tính.',
                'price' => 458000000,
                'stock' => 7,
                'is_featured' => false,
                'status' => true,
                'color' => '#0000ff',
                'image' => 'products/vf5-blue.jpg',
            ],
            // VF6
            [
                'category_id' => 3,
                'name' => 'VinFast VF6 Plus Hồng',
                'description' => 'VinFast VF6 Plus màu Hồng - Ngọt ngào, nữ tính.',
                'price' => 675000000,
                'stock' => 9,
                'is_featured' => true,
                'status' => true,
                'color' => '#ff69b4',
                'image' => 'products/vf6-pink.jpg',
            ],
            [
                'category_id' => 3,
                'name' => 'VinFast VF6 Plus Xám',
                'description' => 'VinFast VF6 Plus màu Xám - Lịch lãm, hiện đại.',
                'price' => 675000000,
                'stock' => 6,
                'is_featured' => false,
                'status' => true,
                'color' => '#808080',
                'image' => 'products/vf6-gray.jpg',
            ],
            // VF7
            [
                'category_id' => 4,
                'name' => 'VinFast VF7 Plus Cam',
                'description' => 'VinFast VF7 Plus màu Cam - Nổi bật, cá tính.',
                'price' => 799000000,
                'stock' => 11,
                'is_featured' => true,
                'status' => true,
                'color' => '#ffa500',
                'image' => 'products/vf7-orange.jpg',
            ],
            [
                'category_id' => 4,
                'name' => 'VinFast VF7 Plus Xanh Lá',
                'description' => 'VinFast VF7 Plus màu Xanh Lá - Tươi mới, trẻ trung.',
                'price' => 799000000,
                'stock' => 5,
                'is_featured' => false,
                'status' => true,
                'color' => '#00ff00',
                'image' => 'products/vf7-green.jpg',
            ],
            // VF8
            [
                'category_id' => 5,
                'name' => 'VinFast VF8 Plus Trắng',
                'description' => 'VinFast VF8 Plus màu Trắng - Thanh lịch, tinh tế.',
                'price' => 999000000,
                'stock' => 7,
                'is_featured' => true,
                'status' => true,
                'color' => '#ffffff',
                'image' => 'products/vf8-white.jpg',
            ],
            [
                'category_id' => 5,
                'name' => 'VinFast VF8 Plus Tím',
                'description' => 'VinFast VF8 Plus màu Tím - Cá tính, độc đáo.',
                'price' => 999000000,
                'stock' => 4,
                'is_featured' => false,
                'status' => true,
                'color' => '#800080',
                'image' => 'products/vf8-purple.jpg',
            ],
            // VF9
            [
                'category_id' => 6,
                'name' => 'VinFast VF9 Plus Đỏ',
                'description' => 'VinFast VF9 Plus màu Đỏ - Mạnh mẽ, sang trọng.',
                'price' => 1299000000,
                'stock' => 3,
                'is_featured' => true,
                'status' => true,
                'color' => '#ff0000',
                'image' => 'products/vf9-red.jpg',
            ],
            [
                'category_id' => 6,
                'name' => 'VinFast VF9 Plus Đen',
                'description' => 'VinFast VF9 Plus màu Đen - Đẳng cấp, quyền lực.',
                'price' => 1299000000,
                'stock' => 2,
                'is_featured' => false,
                'status' => true,
                'color' => '#000000',
                'image' => 'products/vf9-black.jpg',
            ],
        ];

        foreach ($products as $product) {
            $product['slug'] = Str::slug($product['name']);
            Product::create($product);
        }
    }
}
