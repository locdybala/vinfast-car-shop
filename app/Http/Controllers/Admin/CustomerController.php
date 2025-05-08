<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $customers = Customer::when($search, function ($query, $search) {
                $query->where('name', 'like', "%$search%")
                      ->orWhere('email', 'like', "%$search%")
                      ->orWhere('phone', 'like', "%$search%")
                      ->orWhere('address', 'like', "%$search%") ;
            })
            ->orderByDesc('id')
            ->paginate(10);
        return view('admin.customers.index', compact('customers', 'search'));
    }

    public function create()
    {
        return view('admin.customers.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:customers,email',
            'password' => 'required|string|min:6',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
        ]);
        $validated['password'] = bcrypt($validated['password']);
        Customer::create($validated);
        return redirect()->route('admin.customers.index')->with('success', 'Thêm khách hàng thành công!');
    }

    public function edit(Customer $customer)
    {
        return view('admin.customers.edit', compact('customer'));
    }

    public function update(Request $request, Customer $customer)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:customers,email,' . $customer->id,
            'password' => 'nullable|string|min:6',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
        ]);
        if ($validated['password']) {
            $validated['password'] = bcrypt($validated['password']);
        } else {
            unset($validated['password']);
        }
        $customer->update($validated);
        return redirect()->route('admin.customers.index')->with('success', 'Cập nhật khách hàng thành công!');
    }

    public function destroy(Customer $customer)
    {
        $customer->delete();
        return redirect()->route('admin.customers.index')->with('success', 'Xóa khách hàng thành công!');
    }
} 