@extends('layouts.customer')

@section('title', $product->name)

@section('content')
<div class="container py-4">
    <div class="row g-4 align-items-start">
        <div class="col-md-6 text-center">
            <img id="product-image" src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="img-fluid" style="max-width: 600px; height: auto; display: block; margin: 0 auto;">
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <b>Các màu của dòng {{ $category->name }}:</b>
                @php
                    $maxShow = 3;
                    $allProducts = $category->products->sortByDesc('created_at')->values();
                    $allColors = $allProducts->pluck('color')->filter()->unique()->values();
                @endphp
                @foreach($allColors->take($maxShow) as $color)
                    @php
                        $prod = $allProducts->firstWhere('color', $color);
                    @endphp
                    <span class="color-dot color-select {{ $color == $product->color ? 'selected' : '' }}" data-id="{{ $prod->id }}" data-image="{{ asset('storage/' . $prod->image) }}" data-name="{{ $prod->name }}" data-price="{{ number_format($prod->price, 0, ',', '.') }}" data-color="{{ $prod->color }}" style="background:{{ $color }};cursor:pointer;"></span>
                @endforeach
                @if($allColors->count() > $maxShow)
                    <span class="ms-2">+{{ $allColors->count() - $maxShow }} Colors</span>
                @endif
            </div>
            <h2 class="fw-bold mb-2" id="product-name">{{ $product->name }}</h2>
            <span class="badge bg-success mb-2" style="font-size:1.2rem;padding:10px 22px;">{{ $category->name ?? 'VinFast' }}</span>
            <div class="fs-4 fw-bold text-danger mb-3" id="product-price">VND {{ number_format($product->price, 0, ',', '.') }}</div>
            <div class="mb-2">
                <b>Màu:</b> <span id="product-color">{{ $product->color }}</span>
            </div>
            @if(auth('customer')->check())
                <form action="{{ route('cart.add') }}" method="POST" class="mb-3">
                    @csrf
                    <input type="hidden" name="id" id="product-id" value="{{ $product->id }}">
                    <input type="hidden" name="qty" value="1">
                    <button type="submit" class="btn btn-dark w-100" style="max-width: 300px;">Mua ngay</button>
                </form>
            @else
                <a href="{{ route('customer.login') }}" class="btn btn-dark w-100 mb-3" style="max-width: 300px;">Mua ngay</a>
            @endif
            <div class="card mt-3">
                <div class="card-body">
                    <h5 class="card-title mb-2">Thông tin nhanh</h5>
                    <ul class="list-unstyled mb-0">
                        <li><b>Tồn kho:</b> <span id="product-stock">{{ $product->stock }}</span></li>
                        <li><b>Trạng thái:</b> <span class="badge bg-{{ $product->status ? 'success' : 'danger' }}" id="product-status">{{ $product->status ? 'Hiển thị' : 'Ẩn' }}</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-12">
            <h4 class="fw-bold mb-3">Chi tiết</h4>
            <ul class="fs-5" id="product-specs">
            </ul>
            <div class="mt-4">
                <h5 class="fw-bold">Mô tả sản phẩm</h5>
                <div id="product-description">{{ $product->description }}</div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .color-dot { width: 24px; height: 24px; border-radius: 50%; display: inline-block; margin-right: 4px; border: 2px solid #eee; }
    .color-dot.selected { border: 3px solid #d03ec7; }
</style>
@endpush

@push('scripts')
<script>
    const products = @json($allProducts->keyBy('id'));
    document.querySelectorAll('.color-select').forEach(dot => {
        dot.addEventListener('click', function() {
            document.querySelectorAll('.color-dot').forEach(d => d.classList.remove('selected'));
            this.classList.add('selected');
            const id = this.getAttribute('data-id');
            const prod = products[id];
            if(prod) {
                document.getElementById('product-image').src = this.getAttribute('data-image');
                document.getElementById('product-name').textContent = this.getAttribute('data-name');
                document.getElementById('product-price').textContent = 'VND ' + this.getAttribute('data-price');
                document.getElementById('product-color').textContent = this.getAttribute('data-color');
                document.getElementById('product-id').value = prod.id;
                document.getElementById('product-stock').textContent = prod.stock;
                document.getElementById('product-status').textContent = prod.status ? 'Hiển thị' : 'Ẩn';
                document.getElementById('product-status').className = 'badge bg-' + (prod.status ? 'success' : 'danger');
                document.getElementById('product-description').textContent = prod.description;
                // Nếu có specs dạng object, bạn có thể cập nhật thêm ở đây
                // document.getElementById('product-specs').innerHTML = ...
            }
        });
    });
</script>
@endpush
