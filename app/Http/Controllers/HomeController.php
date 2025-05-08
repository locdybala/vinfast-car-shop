<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::query()
            ->select(['id', 'name', 'image', 'price'])
            ->orderByDesc('id')
            ->paginate(3);
        // Giả lập màu sắc cho mỗi sản phẩm (nếu chưa có trường colors)
        foreach ($products as $product) {
            $product->colors = ['#222', '#d03ec7', '#f00'];
        }
        return view('home', compact('products'));
    }
} 