<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $totalProducts = Product::count();
        $totalCategories = Category::count();
        $totalOrders = Order::count();
        $recentOrders = Order::with('customer')
            ->latest()
            ->take(5)
            ->get();

        return view('admin.dashboard', compact(
            'totalProducts',
            'totalCategories',
            'totalOrders',
            'recentOrders'
        ));
    }
} 