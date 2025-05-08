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
        $category = \App\Models\Category::with('products')->findOrFail($id);
        $product = $category->products->sortByDesc('created_at')->first();
        return view('product_detail', compact('category', 'product'));
    }
}