<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $categoryList = Category::with(['latestProduct'])->paginate(3);
        return view('home', compact('categoryList'));
    }
}
