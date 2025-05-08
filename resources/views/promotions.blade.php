@extends('layouts.customer')

@section('title', 'Khuyến mại')

@section('content')
<div class="container py-5">
    <h2 class="text-center mb-5" style="font-family: 'Gentium Book Plus', serif; font-weight: bold;">Chương trình khuyến mại nổi bật</h2>
    <div class="row g-4">
        <div class="col-md-6">
            <div class="card h-100 shadow-sm">
                <img src="https://vinfastauto.com/themes/porto/img/vf5plus.jpg" class="card-img-top" alt="Khuyến mại VF5">
                <div class="card-body">
                    <h5 class="card-title">Tặng 100% lệ phí trước bạ cho khách mua xe VF5</h5>
                    <p class="card-text">Áp dụng từ <b>01/06/2024</b> đến <b>15/06/2024</b> tại đại lý Nam Anh Auto. Số lượng có hạn!</p>
                    <ul>
                        <li>Áp dụng cho khách hàng ký hợp đồng và nhận xe trong thời gian khuyến mại.</li>
                        <li>Không áp dụng đồng thời với các chương trình khác.</li>
                    </ul>
                    <a href="{{ route('contact') }}" class="btn btn-primary mt-2">Nhận ưu đãi</a>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card h-100 shadow-sm">
                <img src="https://vinfastauto.com/themes/porto/img/vf8plus.jpg" class="card-img-top" alt="Khuyến mại VF8">
                <div class="card-body">
                    <h5 class="card-title">Mua xe VinFast VF8 - Nhận ngay gói bảo dưỡng miễn phí 2 năm!</h5>
                    <p class="card-text">Thời gian: <b>01/06/2024</b> - <b>30/06/2024</b>. Áp dụng cho 50 khách hàng đầu tiên.</p>
                    <ul>
                        <li>Gói bảo dưỡng miễn phí 2 năm hoặc 20.000km (tùy điều kiện nào đến trước).</li>
                        <li>Liên hệ đại lý để biết thêm chi tiết.</li>
                    </ul>
                    <a href="{{ route('contact') }}" class="btn btn-primary mt-2">Đăng ký nhận ưu đãi</a>
                </div>
            </div>
        </div>
    </div>
    <div class="alert alert-info mt-5 text-center">Các chương trình khuyến mại có thể kết thúc sớm khi hết quà tặng hoặc theo thông báo của đại lý. Vui lòng liên hệ để được tư vấn chi tiết!</div>
</div>
@endsection 