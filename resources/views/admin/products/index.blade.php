@extends('admin.layouts.app')

@section('title', 'Quản lý sản phẩm')

@section('content')
<style>
    .color-dot {
        width: 32px !important;
        height: 32px !important;
        border-radius: 50% !important;
        border: 2px solid #333 !important;
        display: inline-block !important;
        vertical-align: middle;
    }
    </style>
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Danh sách sản phẩm</h5>
        <a href="{{ route('admin.products.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Thêm sản phẩm
        </a>
    </div>
    <div class="card-body">
        <!-- Search and Filter Form -->
        <form action="{{ route('admin.products.index') }}" method="GET" class="mb-4">
            <div class="row">
                <div class="col-md-6">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control"
                               placeholder="Tìm kiếm sản phẩm..." value="{{ $search }}">
                        <button class="btn btn-outline-secondary" type="submit">
                            <i class="fas fa-search"></i> Tìm kiếm
                        </button>
                    </div>
                </div>
                <div class="col-md-4">
                    <select name="category_id" class="form-select" onchange="this.form.submit()">
                        <option value="">Tất cả danh mục</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ $category_id == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </form>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        @php
            function fixedColorName($hex) {
                $map = [
                    '#ff0000' => 'Đỏ',
                    '#fe2a2a' => 'Đỏ',
                    '#00ff00' => 'Xanh lá',
                    '#008000' => 'Xanh lá',
                    '#0000ff' => 'Xanh dương',
                    '#ffff00' => 'Vàng',
                    '#ff69b4' => 'Hồng',
                    '#ffc0cb' => 'Hồng',
                    '#808080' => 'Xám',
                    '#c0c0c0' => 'Xám',
                    '#ffffff' => 'Trắng',
                    '#000000' => 'Đen',
                    '#ffa500' => 'Cam',
                    '#800080' => 'Tím',
                ];
                $hex = strtolower($hex);
                return $map[$hex] ?? 'Khác';
            }
        @endphp

        <!-- Products Table -->
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Hình ảnh</th>
                        <th>Tên sản phẩm</th>
                        <th>Danh mục</th>
                        <th>Giá</th>
                        <th>Màu sắc</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>
                                @if($product->image)
                                    <img src="{{ asset('storage/' . $product->image) }}"
                                         alt="{{ $product->name }}"
                                         class="img-thumbnail"
                                         style="max-height: 50px;">
                                @else
                                    <span class="text-muted">Không có ảnh</span>
                                @endif
                            </td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->category->name }}</td>
                            <td>{{ number_format($product->price, 0, ',', '.') }} VND</td>
                            <td>
                                @if($product->color)
                                    <div class="color-dot" style="background-color: {{ $product->color }}"></div>
                                    <span class="ms-2">{{ fixedColorName($product->color) }}</span>
                                @else
                                    <span class="text-muted">Không có màu</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('admin.products.edit', $product) }}"
                                   class="btn btn-sm btn-info">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.products.destroy', $product) }}"
                                      method="POST"
                                      class="d-inline"
                                      onsubmit="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?')">
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
                            <td colspan="7" class="text-center">Không có sản phẩm nào.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="mt-4">
            @if($products instanceof \Illuminate\Pagination\LengthAwarePaginator)
                {{ $products->links() }}
            @endif
        </div>
    </div>
</div>
@endsection