@extends('admin.layouts.app')

@section('title', 'Chỉnh sửa khách hàng')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="mb-0">Chỉnh sửa khách hàng</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.customers.update', $customer) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Họ tên</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $customer->name) }}" required>
                @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $customer->email) }}" required>
                @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Mật khẩu mới (bỏ trống nếu không đổi)</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
                @error('password')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Số điện thoại</label>
                <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone', $customer->phone) }}">
                @error('phone')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Địa chỉ</label>
                <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address" value="{{ old('address', $customer->address) }}">
                @error('address')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="d-flex justify-content-between">
                <a href="{{ route('admin.customers.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Quay lại
                </a>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Lưu khách hàng
                </button>
            </div>
        </form>
    </div>
</div>
@endsection 