@extends('layouts.customer')

@section('title', 'Đặt hàng thành công')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="border rounded p-5 text-center" style="border:2px solid #f44336;min-height:300px;">
                <h2 class="text-danger mb-4" style="font-size:2.5rem;">Bạn đã đặt hoàn tất đơn hàng</h2>
            </div>
            <div class="text-center mt-5">
                <a href="{{ route('home') }}" class="btn btn-primary btn-lg px-5">Quay về trang chủ</a>
            </div>
        </div>
    </div>
</div>
@endsection 