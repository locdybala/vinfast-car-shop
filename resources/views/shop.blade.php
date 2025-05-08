@extends('layouts.customer')

@section('title', 'Sản phẩm')

@section('head')
<link rel="stylesheet" href="{{ asset('css/custom.css') }}">
@endsection

@section('content')
<div class="container">
    <div class="row">
        <!-- Sidebar Filter -->
        <div class="col-lg-3 mb-4">
            <div class="card p-3 mb-3 shop-sidebar">
                <h6 class="mb-2" style="font-weight:500;font-size:15px;">Keywords</h6>
                <div class="mb-2 d-flex flex-wrap">
                    <span class="badge">Spring <span>&times;</span></span>
                    <span class="badge">Smart <span>&times;</span></span>
                    <span class="badge">Modern <span>&times;</span></span>
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control form-control-sm" placeholder="Search" style="border-radius:16px;">
                </div>
                <div class="mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" checked>
                        <label class="form-check-label">Label</label>
                        <span class="desc">Description</span>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" checked>
                        <label class="form-check-label">Label</label>
                        <span class="desc">Description</span>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" checked>
                        <label class="form-check-label">Label</label>
                        <span class="desc">Description</span>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Label <span class="price-range-labels" style="float:right;">Vnd0-2.000.000.000</span></label>
                    <input type="range" class="form-range" min="0" max="2000000000" value="0">
                </div>
                <div class="mb-3">
                    <label class="form-label">Color</label>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" checked>
                        <label class="form-check-label">Label</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" checked>
                        <label class="form-check-label">Label</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" checked>
                        <label class="form-check-label">Label</label>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Size</label>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" checked>
                        <label class="form-check-label">Label</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" checked>
                        <label class="form-check-label">Label</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" checked>
                        <label class="form-check-label">Label</label>
                    </div>
                </div>
            </div>
        </div>
        <!-- Product List -->
        <div class="col-lg-9">
            <div class="d-flex flex-wrap align-items-center justify-content-between mb-3 gap-2 shop-filter-bar">
                <form class="flex-grow-1 me-2" style="max-width:300px;">
                    <input type="text" class="form-control form-control-sm" style="border-radius: 16px;" placeholder="Search">
                </form>
                <div class="btn-group me-2">
                    <button class="btn btn-dark btn-sm active">New</button>
                    <button class="btn btn-outline-dark btn-sm">Price ascending</button>
                    <button class="btn btn-outline-dark btn-sm">Price descending</button>
                    <button class="btn btn-outline-dark btn-sm">Rating</button>
                </div>
            </div>
            <div class="row g-4">
                @foreach($products as $product)
                <div class="col-12 col-md-6 shop-product-col">
                    <div class="card h-100 product-hover-card position-relative overflow-hidden">
                        <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}">
                        <div class="card-body p-2">
                            <h6 class="card-title" style="font-size: 25px;
    font-weight: 1000 !important;">{{ $product->name }}</h6>
                            <div style="font-size: 20px;
    font-weight: 500 !important;" class="product-price">
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