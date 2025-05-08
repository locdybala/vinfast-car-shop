@extends('layouts.customer')

@section('title', 'Trang chủ')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <div class="fw-bold">Trang chủ</div>
        <div>
            <select class="form-select form-select-sm" style="width:auto;display:inline-block;">
                <option>Sắp xếp: Mới nhất</option>
                <option>Giá tăng dần</option>
                <option>Giá giảm dần</option>
            </select>
        </div>
    </div>
    <div class="row g-4 product-card">
        @foreach($products as $product)
        <div class="col-12 col-md-4">
            <div class="card h-100 product-hover-card position-relative overflow-hidden">
                <div class="position-absolute top-0 start-0 m-2">
                    <span class="badge badge-new">NEW</span>
                </div>
                <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}" style="height:305px;object-fit:cover;width:100%;">
                <div class="card-body">
                    <div class="mb-2">
                        @foreach($product->colors as $color)
                            <span class="color-dot" style="background:{{ $color }}"></span>
                        @endforeach
                    </div>
                    <h6 class="card-title mb-1">{{ $product->name }}</h6>
                    <div class="mb-1">
                        <span class="text-warning">
                            @for($i=0;$i<5;$i++)<i class="fas fa-star"></i>@endfor
                        </span>
                        <span class="text-muted small">32</span>
                    </div>
                    <div class="fw-bold text-danger mb-2" style="font-size:1.1rem;">
                        {{ number_format($product->price,0,',','.') }} VND
                    </div>
                </div>
                <div class="product-overlay position-absolute top-0 start-0 w-100 h-100 d-flex flex-column justify-content-center align-items-center" style="display:none;">
                    <a href="#" class="btn btn-buy-now">Mua ngay</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="d-flex justify-content-center mt-4">
        {{ $products->links() }}
    </div>
</div>
@endsection

@push('styles')
<style>
.product-hover-card { transition: box-shadow 0.2s; }
.product-hover-card:hover { box-shadow: 0 8px 32px #d03ec74d; }
.product-hover-card:hover .product-overlay { display: flex !important; animation: fadeInUp 0.25s; }
.product-overlay { display: none !important; }
.btn-buy-now {
    background: #d03ec7;
    color: #fff;
    border-radius: 18px;
    font-family: 'Gentium Book Plus', serif;
    font-weight: 700;
    font-size: 1.08rem;
    padding: 14px 38px;
    text-align: center;
    border: none;
    box-shadow: 0 2px 8px #d03ec74d;
    transition: background 0.2s;
    z-index: 4;
}
.btn-buy-now:hover { background: #b02ba3; color: #fff; }
@keyframes fadeInUp {
    from { opacity: 0; transform: translateY(30px); }
    to { opacity: 1; transform: translateY(0); }
}
</style>
@endpush 