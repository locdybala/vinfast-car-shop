@extends('layouts.customer')

@section('title', 'Giỏ hàng')

@section('content')
<div class="container py-4">
    <h2 class="fw-bold mb-4">Giỏ hàng</h2>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if($cart->isEmpty())
        <div class="alert alert-info">Giỏ hàng của bạn đang trống.</div>
    @else
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
                        <img src="{{ asset('storage/' . $item->attributes->image) }}" alt="{{ $item->name }}" style="width:60px;height:40px;object-fit:cover;">
                        <span class="fw-bold">{{ $item->name }}</span>
                    </td>
                    <td class="fw-bold" style="font-size:20px;">{{ number_format($item->price,0,',','.') }}đ</td>
                    <td style="width:120px;">
                        <form action="{{ route('cart.update') }}" method="POST" class="d-inline">
                            @csrf
                            <input type="hidden" name="id" value="{{ $item->id }}">
                            <input type="number" min="1" name="qty" value="{{ $item->quantity }}" class="form-control text-center d-inline" style="max-width:70px;display:inline-block;">
                            <button type="submit" class="btn btn-sm btn-outline-primary ms-1">Cập nhật</button>
                        </form>
                    </td>
                    <td class="fw-bold" style="font-size:20px;">{{ number_format($item->price * $item->quantity,0,',','.') }}đ</td>
                    <td>
                        <form action="{{ route('cart.remove') }}" method="POST" class="d-inline">
                            @csrf
                            <input type="hidden" name="id" value="{{ $item->id }}">
                            <button class="btn btn-link text-danger p-0" title="Xóa"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="d-flex justify-content-between align-items-center mt-3">
        <div class="fs-5 fw-bold text-danger">Tổng tiền: <span style="font-size:22px;">{{ number_format($total,0,',','.') }}đ</span></div>
        <a href="{{ route('checkout.index') }}" class="btn btn-primary px-4 py-2" style="font-size:18px;">Thanh toán</a>
    </div>
    @endif
</div>
@endsection

@push('styles')
<style>
    .table th, .table td { vertical-align: middle !important; }
    .table input[type=number]::-webkit-inner-spin-button,
    .table input[type=number]::-webkit-outer-spin-button { -webkit-appearance: none; margin: 0; }
</style>
@endpush 