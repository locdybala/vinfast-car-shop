@extends('admin.layouts.app')

@section('title', 'Quản lý đơn hàng')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="mb-0">Danh sách đơn hàng</h5>
    </div>
    <div class="card-body">
        <!-- Search and Filter Form -->
        <form action="{{ route('admin.orders.index') }}" method="GET" class="mb-4">
            <div class="row">
                <div class="col-md-6">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control" 
                               placeholder="Tìm kiếm đơn hàng..." value="{{ $search }}">
                        <button class="btn btn-outline-secondary" type="submit">
                            <i class="fas fa-search"></i> Tìm kiếm
                        </button>
                    </div>
                </div>
                <div class="col-md-4">
                    <select name="status" class="form-select" onchange="this.form.submit()">
                        <option value="">Tất cả trạng thái</option>
                        <option value="pending" {{ $status === 'pending' ? 'selected' : '' }}>Chờ xử lý</option>
                        <option value="processing" {{ $status === 'processing' ? 'selected' : '' }}>Đang xử lý</option>
                        <option value="completed" {{ $status === 'completed' ? 'selected' : '' }}>Hoàn thành</option>
                        <option value="cancelled" {{ $status === 'cancelled' ? 'selected' : '' }}>Đã hủy</option>
                    </select>
                </div>
            </div>
        </form>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Orders Table -->
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Mã đơn hàng</th>
                        <th>Khách hàng</th>
                        <th>Tổng tiền</th>
                        <th>Trạng thái</th>
                        <th>Ngày đặt</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($orders as $order)
                        <tr>
                            <td>{{ $order->order_number }}</td>
                            <td>
                                <div>{{ $order->name }}</div>
                                <small class="text-muted">{{ $order->phone }}</small>
                            </td>
                            <td>{{ number_format($order->total_amount) }} VNĐ</td>
                            <td>
                                <span class="badge bg-{{ $order->status === 'completed' ? 'success' : 
                                    ($order->status === 'cancelled' ? 'danger' : 
                                    ($order->status === 'processing' ? 'warning' : 'info')) }}">
                                    {{ $order->status === 'pending' ? 'Chờ xử lý' : 
                                        ($order->status === 'processing' ? 'Đang xử lý' : 
                                        ($order->status === 'completed' ? 'Hoàn thành' : 'Đã hủy')) }}
                                </span>
                            </td>
                            <td>{{ $order->created_at->format('d/m/Y H:i') }}</td>
                            <td>
                                <a href="{{ route('admin.orders.show', $order) }}" 
                                   class="btn btn-sm btn-info">
                                    <i class="fas fa-eye"></i>
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">Không có đơn hàng nào.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="mt-4">
            {{ $orders->links() }}
        </div>
    </div>
</div>
@endsection 