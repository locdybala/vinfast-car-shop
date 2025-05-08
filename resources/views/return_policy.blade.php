@extends('layouts.customer')

@section('title', 'Chính sách đổi trả')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-10 col-lg-8">
            <div class="card shadow-sm p-4">
                <h2 class="text-center mb-4" style="font-family: 'Gentium Book Plus', serif; font-weight: bold;">Chính sách đổi trả</h2>
                <ul class="fs-5 mb-4">
                    <li><b>1. Thời gian đổi trả:</b> Đổi trả trong vòng <b>7 ngày</b> kể từ ngày nhận xe.</li>
                    <li><b>2. Điều kiện đổi trả:</b>
                        <ul>
                            <li>Xe chưa đăng ký, chưa sử dụng, còn nguyên tem niêm phong.</li>
                            <li>Không bị trầy xước, móp méo, hư hỏng do tác động bên ngoài.</li>
                            <li>Đầy đủ giấy tờ, phụ kiện, hóa đơn mua hàng.</li>
                        </ul>
                    </li>
                    <li><b>3. Quy trình đổi trả:</b>
                        <ul>
                            <li>Liên hệ hotline <a href="tel:0348888937">0348 888 937</a> hoặc đến trực tiếp đại lý.</li>
                            <li>Nhân viên kiểm tra tình trạng xe và xác nhận điều kiện đổi trả.</li>
                            <li>Hoàn tiền hoặc đổi xe mới theo thỏa thuận.</li>
                        </ul>
                    </li>
                    <li><b>4. Lưu ý:</b> Không áp dụng đổi trả với xe đã đăng ký, đã sử dụng hoặc bị hư hỏng do lỗi của khách hàng.</li>
                </ul>
                <div class="alert alert-info text-center">Mọi thắc mắc vui lòng liên hệ đại lý VinFast NAM ANH AUTO để được hỗ trợ tốt nhất!</div>
            </div>
        </div>
    </div>
</div>
@endsection
