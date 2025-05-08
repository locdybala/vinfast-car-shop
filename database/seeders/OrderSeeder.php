<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\Product;
use App\Models\Customer;
use App\Models\OrderDetail;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    public function run(): void
    {
        $statuses = ['pending', 'processing', 'completed', 'cancelled'];
        $products = Product::all();
        $customers = Customer::all();

        for ($i = 1; $i <= 20; $i++) {
            $order = Order::create([
                'order_number' => 'ORD-' . str_pad($i, 6, '0', STR_PAD_LEFT),
                'customer_id' => $customers->random()->id,
                'name' => 'Khách hàng ' . $i,
                'phone' => '0' . rand(100000000, 999999999),
                'address' => rand(1, 100) . ' Đường ' . rand(1, 50) . ', Quận ' . rand(1, 12) . ', TP.HCM',
                'notes' => rand(0, 1) ? 'Ghi chú cho đơn hàng ' . $i : null,
                'total_amount' => 0,
                'status' => $statuses[array_rand($statuses)],
            ]);

            $total = 0;
            $orderProducts = $products->random(rand(1, 3));

            foreach ($orderProducts as $product) {
                $quantity = rand(1, 3);
                $subtotal = $product->price * $quantity;
                $total += $subtotal;

                OrderDetail::create([
                    'order_id' => $order->id,
                    'product_id' => $product->id,
                    'product_name' => $product->name,
                    'price' => $product->price,
                    'quantity' => $quantity,
                    'subtotal' => $subtotal,
                ]);
            }

            $order->update(['total_amount' => $total]);
        }
    }
} 