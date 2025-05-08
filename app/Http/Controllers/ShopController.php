<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::query()->select(['id', 'name', 'image', 'price', 'color']);
        // Tìm kiếm theo tên
        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }
        // Lọc theo giá
        if ($request->filled('price_min')) {
            $query->where('price', '>=', $request->price_min);
        }
        if ($request->filled('price_max')) {
            $query->where('price', '<=', $request->price_max);
        }
        // Lọc theo màu sắc
        if ($request->filled('color')) {
            $colors = $request->color;
            $query->whereIn('color', $colors);
        }
        // Sắp xếp
        $sort = $request->get('sort', 'new');
        if ($sort === 'price_asc') {
            $query->orderBy('price', 'asc');
        } elseif ($sort === 'price_desc') {
            $query->orderBy('price', 'desc');
        } else {
            $query->orderByDesc('id');
        }
        $products = $query->paginate(6)->withQueryString();
        return view('shop', compact('products'));
    }

    public function show($id)
    {
        $category = \App\Models\Category::with('products')->findOrFail($id);
        $product = $category->products->sortByDesc('created_at')->first();
        return view('product_detail', compact('category', 'product'));
    }
}
