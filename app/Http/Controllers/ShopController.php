<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::query()
            ->select(['id', 'name', 'image', 'price'])
            ->orderByDesc('id')
            ->paginate(6);
        foreach ($products as $product) {
            $product->colors = ['#222', '#d03ec7', '#f00'];
        }
        return view('shop', compact('products'));
    }

    public function show($id)
    {
        $product = Product::where('id', $id)->orWhere('slug', $id)->firstOrFail();
        // Demo: Thêm thuộc tính colors nếu muốn
        $product->colors = ['#222', '#d03ec7', '#f00'];
        // Demo: Thêm thuộc tính specs giả lập (có thể lấy từ DB nếu có)
        $product->specs = [
            'Động cơ' => '01 Motor Điện 44 Hp',
            'Hộp số' => 'Tự động',
            'Quãng đường' => '210 km',
            'Thời gian sạc pin 10%-70%' => '36 phút',
            'Vành' => 'Thép 16 inch',
            'Đèn' => 'Halogen projector',
            'Chìa khoá' => 'Smartkey',
            'Ghế' => 'Bọc nỉ, Chỉnh cơ',
            'Điều hoà' => 'Chỉnh cơ',
            'Màn hình' => '10 inch 2 loa',
            'Sạc điện thoại' => 'Thường',
            'An toàn' => '1 túi khí, ABS, TRC, Cam lùi, Cảm biến lùi',
        ];
        return view('product_detail', compact('product'));
    }
} 