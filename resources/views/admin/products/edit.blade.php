@extends('admin.layouts.app')

@section('title', 'Chỉnh sửa sản phẩm')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="mb-0">Chỉnh sửa sản phẩm</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.products.update', $product) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-8">
                    <div class="mb-3">
                        <label for="name" class="form-label">Tên sản phẩm</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                               id="name" name="name" value="{{ old('name', $product->name) }}" required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Mô tả</label>
                        <textarea class="form-control @error('description') is-invalid @enderror"
                                  id="description" name="description" rows="5" required>{{ old('description', $product->description) }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="price" class="form-label">Giá</label>
                                <div class="input-group">
                                    <input type="number" class="form-control @error('price') is-invalid @enderror"
                                           id="price" name="price" value="{{ old('price', $product->price) }}" required>
                                    <span class="input-group-text">VNĐ</span>
                                </div>
                                @error('price')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="stock" class="form-label">Tồn kho</label>
                                <input type="number" class="form-control @error('stock') is-invalid @enderror"
                                       id="stock" name="stock" value="{{ old('stock', $product->stock) }}" required>
                                @error('stock')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="category_id" class="form-label">Danh mục</label>
                        <select class="form-select @error('category_id') is-invalid @enderror"
                                id="category_id" name="category_id" required>
                            <option value="">Chọn danh mục</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label">Hình ảnh</label>
                        @if($product->image)
                            <div class="mb-2">
                                <img src="{{ Storage::url($product->image) }}"
                                     alt="{{ $product->name }}"
                                     class="img-thumbnail"
                                     style="max-width: 200px;">
                            </div>
                        @endif
                        <input type="file" class="form-control @error('image') is-invalid @enderror"
                               id="image" name="image" accept="image/*">
                        @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="is_featured"
                                   name="is_featured" value="1"
                                   {{ old('is_featured', $product->is_featured) ? 'checked' : '' }}>
                            <label class="form-check-label" for="is_featured">Sản phẩm nổi bật</label>
                        </div>
                    </div>

                    <div class="mb-3">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="status"
                                   name="status" value="1"
                                   {{ old('status', $product->status) ? 'checked' : '' }}>
                            <label class="form-check-label" for="status">Hiển thị</label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label for="color" class="form-label">Màu sắc</label>
                <select class="form-select @error('color') is-invalid @enderror" id="color" name="color" required>
                    <option value="">Chọn màu</option>
                    <option value="#ff0000" {{ old('color', $product->color) == '#ff0000' ? 'selected' : '' }}>Đỏ</option>
                    <option value="#00ff00" {{ old('color', $product->color) == '#00ff00' ? 'selected' : '' }}>Xanh lá</option>
                    <option value="#0000ff" {{ old('color', $product->color) == '#0000ff' ? 'selected' : '' }}>Xanh dương</option>
                    <option value="#ffff00" {{ old('color', $product->color) == '#ffff00' ? 'selected' : '' }}>Vàng</option>
                    <option value="#ff69b4" {{ old('color', $product->color) == '#ff69b4' ? 'selected' : '' }}>Hồng</option>
                    <option value="#808080" {{ old('color', $product->color) == '#808080' ? 'selected' : '' }}>Xám</option>
                    <option value="#ffffff" {{ old('color', $product->color) == '#ffffff' ? 'selected' : '' }}>Trắng</option>
                    <option value="#000000" {{ old('color', $product->color) == '#000000' ? 'selected' : '' }}>Đen</option>
                    <option value="#ffa500" {{ old('color', $product->color) == '#ffa500' ? 'selected' : '' }}>Cam</option>
                    <option value="#800080" {{ old('color', $product->color) == '#800080' ? 'selected' : '' }}>Tím</option>
                </select>
                @error('color')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Quay lại
                </a>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Cập nhật sản phẩm
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const colorsContainer = document.getElementById('colors-container');
    const addColorBtn = document.getElementById('add-color');

    // Thêm màu mới
    addColorBtn.addEventListener('click', function() {
        const colorInput = document.createElement('div');
        colorInput.className = 'input-group mb-2';
        colorInput.innerHTML = `
            <input type="color" class="form-control form-control-color"
                   name="colors[]" value="#000000" required>
            <button type="button" class="btn btn-outline-danger remove-color">
                <i class="fas fa-times"></i>
            </button>
        `;
        colorsContainer.appendChild(colorInput);
    });

    // Xóa màu
    colorsContainer.addEventListener('click', function(e) {
        if (e.target.closest('.remove-color')) {
            const colorGroup = e.target.closest('.input-group');
            if (colorsContainer.children.length > 1) {
                colorGroup.remove();
            }
        }
    });
});
</script>
@endpush
