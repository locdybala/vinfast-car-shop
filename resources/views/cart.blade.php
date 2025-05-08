@extends('layouts.customer')

@section('title', 'Giỏ hàng')

@section('content')
@php
// Demo: Dữ liệu mẫu, sau này sẽ lấy từ session
$cart = [
    [
        'id' => 1,
        'name' => 'VF3',
        'image' => 'products/vf3.jpg',
        'price' => 299000000,
        'qty' => 1,
    ],
    [
        'id' => 2,
        'name' => 'VF5',
        'image' => 'products/vf5.jpg',
        'price' => 529000000,
        'qty' => 2,
    ],
];
$total = 0;
foreach ($cart as $item) {
    $total += $item['price'] * $item['qty'];
}
@endphp
<div class="container py-4">
    <h2 class="fw-bold mb-4">Giỏ hàng</h2>
    <div class="table-responsive">
        <table class="table align-middle text-center" style="border:1px solid #ccc;">
            <thead class="bg-light" style="background:#ddd;">
                <tr>
                    <th>Sản phẩm</th>
                    <th>Giá</th>
                    <th>Số lượng</th>
                    <th>Tổng</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($cart as $item)
                <tr style="border-top:2px solid #2196f3;">
                    <td class="d-flex align-items-center gap-2" style="min-width:180px;">
                        <img src="{{ asset('storage/' . $item['image']) }}" alt="{{ $item['name'] }}" style="width:60px;height:40px;object-fit:cover;">
                        <span class="fw-bold">{{ $item['name'] }}</span>
                    </td>
                    <td class="fw-bold" style="font-size:20px;">{{ number_format($item['price'],0,',','.') }}đ</td>
                    <td style="width:120px;">
                        <input type="number" min="1" value="{{ $item['qty'] }}" class="form-control text-center" style="max-width:70px;display:inline-block;">
                    </td>
                    <td class="fw-bold" style="font-size:20px;">{{ number_format($item['price'] * $item['qty'],0,',','.') }}đ</td>
                    <td>
                        <button class="btn btn-link text-danger p-0" title="Xóa"><i class="fas fa-trash"></i></button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="d-flex justify-content-between align-items-center mt-3">
        <div class="fs-5 fw-bold text-danger">Tổng tiền: <span style="font-size:22px;">{{ number_format($total,0,',','.') }}đ</span></div>
        <a href="#" class="btn btn-primary px-4 py-2" style="font-size:18px;">Thanh toán</a>
    </div>
</div>
@endsection

@push('styles')
<style>
    .table th, .table td { vertical-align: middle !important; }
    .table input[type=number]::-webkit-inner-spin-button,
    .table input[type=number]::-webkit-outer-spin-button { -webkit-appearance: none; margin: 0; }
</style>
@endpush 