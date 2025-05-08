@extends('layouts.customer')

@section('title', 'Thanh toán')

@section('content')
<div class="container py-4">
    <h2 class="fw-bold mb-4">Thanh toán</h2>
    <div class="row g-4">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="fw-bold mb-3">Thông tin khách hàng</h5>
                    <form action="{{ route('checkout.process') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Họ và tên</label>
                            <input type="text" class="form-control" name="name" placeholder="Nhập họ tên" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Số điện thoại</label>
                            <input type="tel" class="form-control" name="phone" placeholder="Nhập số điện thoại" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" placeholder="Nhập email" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Địa chỉ nhận xe</label>
                            <textarea class="form-control" name="address" rows="2" placeholder="Nhập địa chỉ" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-success w-100 py-2 fw-bold">Xác nhận đặt hàng</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card shadow-sm mb-3">
                <div class="card-body">
                    <h5 class="fw-bold mb-3">Đơn hàng của bạn</h5>
                    <table class="table align-middle text-center mb-0">
                        <thead class="bg-light">
                            <tr>
                                <th>Sản phẩm</th>
                                <th>Giá</th>
                                <th>Số lượng</th>
                                <th>Tổng</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cart as $item)
                            <tr>
                                <td class="d-flex align-items-center gap-2" style="min-width:140px;">
                                    <img src="{{ asset('storage/' . $item->attributes->image) }}" alt="{{ $item->name }}" style="width:40px;height:30px;object-fit:cover;">
                                    <span>{{ $item->name }}</span>
                                </td>
                                <td>{{ number_format($item->price,0,',','.') }}đ</td>
                                <td>{{ $item->quantity }}</td>
                                <td>{{ number_format($item->price * $item->quantity,0,',','.') }}đ</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="text-end mt-3">
                        <span class="fw-bold fs-5 text-danger">Tổng tiền: {{ number_format($total,0,',','.') }}đ</span>
                    </div>
                </div>
            </div>
            <div class="alert alert-info">Sau khi đặt hàng, nhân viên VinFast sẽ liên hệ xác nhận và hướng dẫn nhận xe.</div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .table th, .table td { vertical-align: middle !important; }
</style>
@endpush 