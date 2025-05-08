@extends('layouts.customer')

@section('title', 'Liên hệ')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card shadow-sm p-4 mb-4">
                <h2 class="text-center mb-4" style="font-family: 'Gentium Book Plus', serif; font-weight: bold;">Liên hệ với chúng tôi</h2>
                <form method="POST" action="#">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Họ và tên</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Số điện thoại</label>
                        <input type="text" class="form-control" id="phone" name="phone" required>
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label">Nội dung liên hệ</label>
                        <textarea class="form-control" id="message" name="message" rows="4" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary w-100 py-2">Gửi liên hệ</button>
                </form>
            </div>
        </div>
        <div class="col-md-5">
            <div class="card shadow-sm p-4 mb-4">
                <h5 class="fw-bold mb-3">Thông tin đại lý</h5>
                <p><strong>Đại Lý VinFast NAM ANH AUTO</strong><br>
                Địa Chỉ: Số 8 Đường Phạm Hùng, P. Mai Dịch, Q. Cầu Giấy, Hà Nội<br>
                Email: hoangdinhthylh@gmail.com<br>
                Hotline: <a href="tel:0348888937">0348 888 937</a></p>
            </div>
        </div>
    </div>
</div>
@endsection 