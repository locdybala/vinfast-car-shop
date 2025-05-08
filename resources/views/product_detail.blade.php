@extends('layouts.customer')

@section('title', $product->name)

@section('content')
<div class="container py-4">
    <div class="row g-4 align-items-start">
        <div class="col-md-6 text-center">
            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="img-fluid" style="max-width: 600px; height: auto; display: block; margin: 0 auto;">
        </div>
        <div class="col-md-6">
            <h2 class="fw-bold mb-2">{{ $product->name }}</h2>
            <span class="badge bg-success mb-2" style="font-size:1.2rem;padding:10px 22px;">{{ $product->category->name ?? 'VinFast' }}</span>
            <div class="fs-4 fw-bold text-danger mb-3">VND {{ number_format($product->price, 0, ',', '.') }}</div>
            
            @if(auth('customer')->check())
                <form action="{{ route('cart.add') }}" method="POST" class="mb-3">
                    @csrf
                    <input type="hidden" name="id" value="{{ $product->id }}">
                    <input type="hidden" name="qty" value="1">
                    <button type="submit" class="btn btn-dark w-100" style="max-width: 300px;">Mua ngay</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="btn btn-dark w-100 mb-3" style="max-width: 300px;">Mua ngay</a>
            @endif
            <div class="card mt-3">
                <div class="card-body">
                    <h5 class="card-title mb-2">Thông tin nhanh</h5>
                    <ul class="list-unstyled mb-0">
                        <li><b>Tồn kho:</b> {{ $product->stock }}</li>
                        <li><b>Trạng thái:</b> <span class="badge bg-{{ $product->status ? 'success' : 'danger' }}">{{ $product->status ? 'Hiển thị' : 'Ẩn' }}</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-12">
            <h4 class="fw-bold mb-3">Chi tiết</h4>
            <ul class="fs-5">
                @foreach($product->specs as $label => $value)
                    <li><b>{{ $label }}:</b> {{ $value }}</li>
                @endforeach
            </ul>
            <div class="mt-4">
                <h5 class="fw-bold">Mô tả sản phẩm</h5>
                <div>{{ $product->description }}</div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .color-dot { width: 24px; height: 24px; border-radius: 50%; display: inline-block; margin-right: 4px; border: 2px solid #eee; }
</style>
@endpush 