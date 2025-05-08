@extends('admin.layouts.app')

@section('title', 'Chi tiết đơn hàng')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Chi tiết đơn hàng #{{ $order->order_number }}</h5>
        <a href="{{ route('admin.orders.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Quay lại
        </a>
    </div>
    <div class="card-body">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="row">
            <div class="col-md-6">
                <h6 class="mb-3">Thông tin khách hàng</h6>
                <table class="table table-bordered">
                    <tr>
                        <th style="width: 200px;">Họ và tên</th>
                        <td>{{ $order->name }}</td>
                    </tr>
                    <tr>
                        <th>Số điện thoại</th>
                        <td>{{ $order->phone }}</td>
                    </tr>
                    <tr>
                        <th>Địa chỉ</th>
                        <td>{{ $order->address }}</td>
                    </tr>
                    @if($order->customer)
                    <tr>
                        <th>Email</th>
                        <td>{{ $order->customer->email }}</td>
                    </tr>
                    @endif
                    <tr>
                        <th>Ghi chú</th>
                        <td>{{ $order->notes ?? 'Không có' }}</td>
                    </tr>
                </table>
            </div>

            <div class="col-md-6">
                <h6 class="mb-3">Thông tin đơn hàng</h6>
                <table class="table table-bordered">
                    <tr>
                        <th style="width: 200px;">Mã đơn hàng</th>
                        <td>{{ $order->order_number }}</td>
                    </tr>
                    <tr>
                        <th>Ngày đặt</th>
                        <td>{{ $order->created_at->format('d/m/Y H:i') }}</td>
                    </tr>
                    <tr>
                        <th>Trạng thái</th>
                        <td>
                            <form action="{{ route('admin.orders.update-status', $order) }}" 
                                  method="POST" 
                                  class="d-inline">
                                @csrf
                                @method('PUT')
                                <select name="status" class="form-select" onchange="this.form.submit()">
                                    <option value="pending" {{ $order->status === 'pending' ? 'selected' : '' }}>
                                        Chờ xử lý
                                    </option>
                                    <option value="processing" {{ $order->status === 'processing' ? 'selected' : '' }}>
                                        Đang xử lý
                                    </option>
                                    <option value="completed" {{ $order->status === 'completed' ? 'selected' : '' }}>
                                        Hoàn thành
                                    </option>
                                    <option value="cancelled" {{ $order->status === 'cancelled' ? 'selected' : '' }}>
                                        Đã hủy
                                    </option>
                                </select>
                            </form>
                        </td>
                    </tr>
                    <tr>
                        <th>Tổng tiền</th>
                        <td>{{ number_format($order->total_amount) }} VNĐ</td>
                    </tr>
                </table>
            </div>
        </div>

        <h6 class="mb-3 mt-4">Chi tiết sản phẩm</h6>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Sản phẩm</th>
                        <th>Giá</th>
                        <th>Số lượng</th>
                        <th>Thành tiền</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($order->orderDetails as $detail)
                        <tr>
                            <td>
                                <div>{{ $detail->product_name }}</div>
                                @if($detail->product)
                                    <small class="text-muted">
                                        Mã sản phẩm: {{ $detail->product->id }}
                                    </small>
                                @endif
                            </td>
                            <td>{{ number_format($detail->price) }} VNĐ</td>
                            <td>{{ $detail->quantity }}</td>
                            <td>{{ number_format($detail->subtotal) }} VNĐ</td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="3" class="text-end">Tổng cộng:</th>
                        <th>{{ number_format($order->total_amount) }} VNĐ</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
@endsection 