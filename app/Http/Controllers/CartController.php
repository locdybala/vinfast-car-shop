<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Darryldecode\Cart\Facades\CartFacade as Cart;

class CartController extends Controller
{
    public function index()
    {
        $cart = Cart::getContent();
        $total = Cart::getTotal();
        return view('cart', compact('cart', 'total'));
    }

    public function add(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:products,id',
            'qty' => 'required|integer|min:1',
        ]);
        $product = Product::findOrFail($request->id);
        Cart::add([
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->price,
            'quantity' => $request->qty,
            'attributes' => [
                'image' => $product->image,
            ],
        ]);
        return redirect()->route('cart.index')->with('success', 'Đã thêm vào giỏ hàng!');
    }

    public function update(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'qty' => 'required|integer|min:1',
        ]);
        Cart::update($request->id, [
            'quantity' => [
                'relative' => false,
                'value' => $request->qty,
            ],
        ]);
        return back()->with('success', 'Cập nhật số lượng thành công!');
    }

    public function remove(Request $request)
    {
        $request->validate([
            'id' => 'required',
        ]);
        Cart::remove($request->id);
        return back()->with('success', 'Đã xóa sản phẩm khỏi giỏ hàng!');
    }
} 