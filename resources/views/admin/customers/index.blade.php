@extends('admin.layouts.app')

@section('title', 'Quản lý khách hàng')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Danh sách khách hàng</h5>
        <a href="{{ route('admin.customers.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Thêm khách hàng
        </a>
    </div>
    <div class="card-body">
        <!-- Search Form -->
        <form action="{{ route('admin.customers.index') }}" method="GET" class="mb-4">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Tìm kiếm tên, email, SĐT, địa chỉ..." value="{{ $search }}">
                <button class="btn btn-outline-secondary" type="submit">
                    <i class="fas fa-search"></i> Tìm kiếm
                </button>
            </div>
        </form>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if($errors->any())
            <div class="alert alert-danger mb-2">
                @foreach($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif

        <!-- Customers Table -->
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Họ tên</th>
                        <th>Email</th>
                        <th>Số điện thoại</th>
                        <th>Địa chỉ</th>
                        <th>Ngày tạo</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($customers as $customer)
                        <tr>
                            <td>{{ $customer->id }}</td>
                            <td>{{ $customer->name }}</td>
                            <td>{{ $customer->email }}</td>
                            <td>{{ $customer->phone }}</td>
                            <td>{{ $customer->address }}</td>
                            <td>{{ $customer->created_at->format('d/m/Y H:i') }}</td>
                            <td>
                                <a href="{{ route('admin.customers.edit', $customer) }}" class="btn btn-sm btn-info">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.customers.destroy', $customer) }}" method="POST" class="d-inline" onsubmit="return confirm('Bạn có chắc muốn xóa?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">Không có khách hàng nào.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="mt-4">
            {{ $customers->withQueryString()->links() }}
        </div>
    </div>
</div>
@endsection 