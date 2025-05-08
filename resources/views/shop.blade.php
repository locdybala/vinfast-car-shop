@extends('layouts.customer')

@section('title', 'Sản phẩm')

@section('head')
<link rel="stylesheet" href="{{ asset('css/custom.css') }}">
@endsection

@section('content')
<div class="container">
    <div class="row">
        <!-- Sidebar Filter -->
        <form method="GET" class="col-lg-3 mb-4" id="filterForm">
            <div class="card p-3 mb-3 shop-sidebar">
                <h6 class="mb-2" style="font-weight:500;font-size:15px;">Tìm kiếm</h6>
                <div class="mb-3">
                    <input type="text" name="search" class="form-control form-control-sm" placeholder="Tìm theo tên sản phẩm" style="border-radius:16px;" value="{{ request('search') }}">
                </div>
                <div class="mb-3">
                    <label class="form-label">Giá từ</label>
                    <input type="number" name="price_min" class="form-control form-control-sm mb-2" placeholder="Tối thiểu" value="{{ request('price_min') }}">
                    <label class="form-label">đến</label>
                    <input type="number" name="price_max" class="form-control form-control-sm" placeholder="Tối đa" value="{{ request('price_max') }}">
                </div>
                <div class="mb-3">
                    <label class="form-label">Màu sắc</label>
                    @php $colors = \App\Models\Product::query()->distinct()->pluck('color')->filter()->unique(); @endphp
                    @foreach($colors as $color)
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="color[]" value="{{ $color }}" id="color_{{ $loop->index }}" {{ collect(request('color'))->contains($color) ? 'checked' : '' }}>
                            <label class="form-check-label" for="color_{{ $loop->index }}">{{ $color }}</label>
                        </div>
                    @endforeach
                </div>
                <button type="submit" class="btn btn-primary btn-sm w-100">Lọc</button>
            </div>
        </form>
        <!-- Product List -->
        <div class="col-lg-9">
            <div class="d-flex flex-wrap align-items-center justify-content-between mb-3 gap-2 shop-filter-bar">
                <form method="GET" class="flex-grow-1 me-2" style="max-width:300px;">
                    <input type="text" name="search" class="form-control form-control-sm" style="border-radius: 16px;" placeholder="Tìm kiếm" value="{{ request('search') }}">
                </form>
                <div class="btn-group me-2">
                    <button type="submit" form="filterForm" name="sort" value="new" class="btn btn-dark btn-sm {{ request('sort', 'new') == 'new' ? 'active' : '' }}">Mới nhất</button>
                    <button type="submit" form="filterForm" name="sort" value="price_asc" class="btn btn-outline-dark btn-sm {{ request('sort') == 'price_asc' ? 'active' : '' }}">Giá tăng dần</button>
                    <button type="submit" form="filterForm" name="sort" value="price_desc" class="btn btn-outline-dark btn-sm {{ request('sort') == 'price_desc' ? 'active' : '' }}">Giá giảm dần</button>
                </div>
            </div>
            <div class="row g-4">
                @foreach($products as $product)
                <div class="col-12 col-md-6 shop-product-col">
                    <div class="card h-100 product-hover-card position-relative overflow-hidden">
                        <a href="{{ route('shop.show', $product->id) }}">
                            <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}">
                        </a>
                        <div class="card-body p-2">
                            <h6 class="card-title" style="font-size: 25px; font-weight: 1000 !important;">
                                <a href="{{ route('shop.show', $product->id) }}" class="text-dark text-decoration-none">{{ $product->name }}</a>
                            </h6>
                            <div style="font-size: 20px; font-weight: 500 !important;" class="product-price">
                                {{ number_format($product->price,0,',','.') }} VND
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="d-flex justify-content-center mt-4">
                {{ $products->links() }}
            </div>
        </div>
    </div>
</div>
@endsection