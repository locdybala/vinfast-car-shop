<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Nam Anh Auto')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Gentium+Book+Plus:wght@400;700&family=Pacifico&display=swap" rel="stylesheet">
    <style>
        html, body, input, button, select, textarea, .nav, .navbar, .form-control {
            font-family: 'Gentium Book Plus', serif !important;
        }
        body { background: #f8f8f8; }
        .main-header { background: #3f3c3c; color: #fff; }
        .main-header .logo {
            font-family: 'Gentium Book Plus', serif;
            font-size: 2.5rem;
            color: #d03ec7;
            font-weight: bold;
            letter-spacing: 1px;
            line-height: 1;
        }
        .main-header .logo-auto {
            font-family: 'Pacifico', cursive;
            color: #fff;
            font-size: 2rem;
            margin-top: -8px;
            margin-left: 2px;
            display: block;
            font-style: italic;
        }
        .main-header .header-actions {
            font-size: 1.08rem;
        }
        .main-header .header-actions a {
            color: #fff;
            margin-left: 18px;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.2s;
        }
        .main-header .header-actions a:hover {
            color: #d03ec7;
        }
        .main-header .header-actions i {
            margin-right: 5px;
        }
        .main-header .search-bar {
            background: #fff;
            border-radius: 30px;
            box-shadow: 0 6px 16px 0 #d03ec74d;
            display: flex;
            align-items: center;
            margin: 0 auto;
            max-width: 700px;
            height: 50px;
        }
        .main-header .search-bar input {
            border: none;
            outline: none;
            background: transparent;
            font-size: 1.1rem;
            width: 100%;
            box-shadow: none;
        }
        .main-header .search-bar input::placeholder {
            color: #aaa;
            font-size: 1.08rem;
        }
        .main-header .search-bar .btn-search {
            background: #d03ec7;
            color: #fff;
            border: none;
            border-radius: 0 30px 30px 0;
            padding: 0 28px;
            font-weight: 500;
            box-shadow: none;
            font-size: 1.08rem;
            height: 50px;
            line-height: 48px;
            white-space: nowrap;
            display: inline-block;
        }
        .main-header .search-bar .btn-search:hover {
            background: #b02ba3;
        }
        .main-header .main-menu {
            border-top: 1px solid #4d4a4a;
            margin-top: 18px;
            padding-top: 8px;
        }
        .main-header .main-menu .nav-link {
            color: #fff !important;
            font-size: 1.08rem;
            margin-right: 28px;
            transition: color 0.2s;
            letter-spacing: 0.2px;
        }
        .main-header .main-menu .nav-link.active, .main-header .main-menu .nav-link:hover {
            color: #d03ec7 !important;
        }
        .main-header .main-menu .fa-shopping-cart {
            margin-right: 4px;
        }
        @media (max-width: 768px) {
            .main-header .logo { font-size: 1.5rem; }
            .main-header .logo-auto { font-size: 1.1rem; }
            .main-header .search-bar { max-width: 100%; }
            .main-header .main-menu .nav-link { margin-right: 10px; }
        }
        .banner-section {
            background: #ECEBEB;
            min-height: 400px;
            height: 400px;
            display: flex;
            align-items: center;
            margin-bottom: 0;
        }
        .banner-title {
            color: #D03EC7;
            font-family: 'Pacifico', cursive;
            font-size: 2.6rem;
            font-weight: bold;
            margin-bottom: 18px;
        }
        .banner-sub {
            color: #D03EC7;
            font-size: 2.1rem;
            font-weight: 700;
            margin-bottom: 32px;
        }
        .banner-btn {
            background: #ECB2E8;
            color: #fff;
            border-radius: 12px;
            padding: 10px 32px;
            border: none;
            font-family: 'Gentium Book Plus', serif;
            font-size: 1.15rem;
            font-weight: 700;
            box-shadow: 0 2px 8px #d03ec74d;
            transition: background 0.2s;
        }
        .banner-btn:hover {
            background: #d03ec7;
            color: #fff;
        }
        @media (max-width: 768px) {
            .banner-section { height: auto; min-height: 260px; padding: 32px 0; }
            .banner-title { font-size: 1.5rem; }
            .banner-sub { font-size: 1.1rem; }
        }
    </style>
    @stack('styles')
</head>
<body>
    <!-- Header -->
    <header class="main-header shadow-sm pb-2">
        <div class="container pt-3">
            <div class="d-flex align-items-center justify-content-between flex-wrap">
                <div>
                    <div class="logo">Nam Anh</div>
                    <span class="logo-auto">Auto</span>
                </div>
                <div class="header-actions d-flex align-items-center">
                    <a href="#"><i class="fas fa-user"></i> Đăng nhập</a>
                    <a href="#"><i class="fas fa-user-plus"></i> Đăng kí</a>
                    <a href="#"><i class="fas fa-phone"></i> Liên hệ</a>
                </div>
            </div>
            <div class="row justify-content-center mt-3">
                <div class="col-12 col-md-10 col-lg-8">
                    <form class="search-bar" action="#">
                        <input type="text" class="form-control shadow-none" placeholder="Tìm kiếm">
                        <button class="btn btn-search" type="submit">Tìm kiếm</button>
                    </form>
                </div>
            </div>
            <nav class="main-menu mt-3">
                <ul class="nav justify-content-center">
                    <li class="nav-item"><a class="nav-link @if(request()->routeIs('home')) active @endif" href="{{ route('home') }}">Trang chủ</a></li>
                    <li class="nav-item"><a class="nav-link @if(request()->routeIs('shop.index')) active @endif" href="{{ route('shop.index') }}">Sản phẩm</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Khuyến mại</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Chính sách đổi trả</a></li>
                    <li class="nav-item"><a class="nav-link @if(request()->routeIs('cart.index')) active @endif" href="{{ route('cart.index') }}"><i class="fas fa-shopping-cart"></i> Giỏ hàng</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <!-- Banner -->
    <div class="banner-section">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-md-6 d-flex flex-column justify-content-center align-items-start h-100">
                    <div class="banner-title">Balack Friday</div>
                    <div class="banner-sub">up to 80%</div>
                    <a href="#" class="banner-btn mt-2">Mua ngay</a>
                </div>
                <div class="col-md-6 text-center">
                    <img src="{{ asset('images/banner.png') }}" alt="VinFast Banner" class="img-fluid" style="max-height:260px;">
                </div>
            </div>
        </div>
    </div>
    <!-- Main Content -->
    <main class="py-3">
        @yield('content')
    </main>
    <!-- Footer -->
    <footer class="footer mt-5">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-8">
                    <strong>Đại Lý VinFast NAM ANH AUTO</strong><br>
                    Địa Chỉ: Số 8 Đường Phạm Hùng, P. Mai Dịch, Q. Cầu Giấy, Hà Nội<br>
                    Email: hoangdinhthylh@gmail.com<br>
                    Hotline: <a href="tel:0348888937">0348 888 937</a>
                </div>
            </div>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html> 