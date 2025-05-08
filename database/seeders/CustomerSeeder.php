<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class CustomerSeeder extends Seeder
{
    public function run(): void
    {
        // Tạo tài khoản mẫu
        Customer::create([
            'name' => 'Nguyễn Văn A',
            'email' => 'customer@example.com',
            'password' => Hash::make('password'),
            'phone' => '0123456789',
            'address' => '123 Đường ABC, Quận 1, TP.HCM',
        ]);

        // Tạo thêm một số tài khoản khách hàng mẫu
        for ($i = 1; $i <= 10; $i++) {
            Customer::create([
                'name' => 'Khách hàng ' . $i,
                'email' => 'customer' . $i . '@example.com',
                'password' => Hash::make('password'),
                'phone' => '0' . rand(100000000, 999999999),
                'address' => rand(1, 100) . ' Đường ' . rand(1, 50) . ', Quận ' . rand(1, 12) . ', TP.HCM',
            ]);
        }
    }
} 