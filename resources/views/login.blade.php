@extends('layouts.customer')

@section('title', 'Đăng nhập khách hàng')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
            <div class="card shadow-sm p-4">
                <h2 class="text-center mb-4" style="font-family: 'Gentium Book Plus', serif; font-weight: bold;">Đăng nhập</h2>
                @if(session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif
                <form method="POST" action="{{ route('customer.login') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required autofocus>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Mật khẩu</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required>
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary w-100 py-2">Đăng nhập</button>
                </form>
                <div class="mt-3 text-center">
                    <a href="{{ route('customer.register') }}">Chưa có tài khoản? Đăng ký</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 