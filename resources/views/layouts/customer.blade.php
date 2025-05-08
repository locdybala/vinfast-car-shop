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
            background: #fff0f5;
            border-radius: 30px;
            box-shadow: none;
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
        @media (max-width: 991.98px) {
            .main-header .main-menu { display: none; }
            .main-header .hamburger { display: block; }
            .banner-section { display: none !important; }
            .main-header .main-menu.show { display: block; background: #222; padding: 16px 0; }
            .main-header .main-menu .nav { flex-direction: column; align-items: flex-start; }
            .main-header .main-menu .nav-link { margin: 8px 0; font-size: 1.15rem; }
            .header-logo { display: none !important; }
            .mobile-hide { display: none !important; }
            .header-actions .btn, .header-actions a { font-size: 0 !important; }
            .header-actions .fa-user, .header-actions .fa-shopping-cart { font-size: 20px !important; }
        }
        @media (min-width: 992px) {
            .main-header .hamburger { display: none; }
        }
    </style>
    @stack('styles')
</head>
<body>
    <!-- Header -->
    <header class="main-header shadow-sm pb-2">
        <div class="container pt-3">
            <div class="d-flex align-items-center justify-content-between flex-wrap">
                <div class="header-logo">
                    <div class="logo">Nam Anh</div>
                    <span class="logo-auto">Auto</span>
                </div>
                <button class="hamburger" onclick="toggleMenu()"><i class="fas fa-bars"></i></button>
                <div class="header-actions d-flex align-items-center">
                    @if(auth('customer')->check())
                        <span class="text-white me-2"><i class="fas fa-user"></i></span>
                        <form action="{{ route('customer.logout') }}" method="POST" class="d-inline mobile-hide">
                            @csrf
                            <button type="submit" class="btn btn-link text-white" style="text-decoration:none;">Đăng xuất</button>
                        </form>
                    @else
                        <a href="{{ route('customer.login') }}" class="d-inline-block"><i class="fas fa-user"></i></a>
                        <a href="{{ route('customer.register') }}" class="mobile-hide"><i class="fas fa-user-plus"></i> Đăng kí</a>
                    @endif
                    <a href="{{ route('contact') }}" class="mobile-hide"><i class="fas fa-phone"></i> Liên hệ</a>
                    <a href="{{ auth('customer')->check() ? route('cart.index') : route('login') }}" class="d-inline-block ms-2"><i class="fas fa-shopping-cart"></i></a>
                </div>
            </div>
            <div class="row justify-content-center mt-3">
                <div class="col-12 col-md-10 col-lg-8">
                    <form class="search-bar" action="#">
                        <input type="text" class="form-control shadow-none" placeholder="Tìm kiếm">
                        <button class="btn btn-search" type="submit"><i class="fas fa-search"></i></button>
                    </form>
                </div>
            </div>
            <nav class="main-menu mt-3" id="mainMenu">
                <ul class="nav justify-content-center">
                    <li class="nav-item"><a class="nav-link @if(request()->routeIs('home')) active @endif" href="{{ route('home') }}">Trang chủ</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle @if(request()->routeIs('shop.index')) active @endif" href="{{ route('shop.index') }}" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" onclick="window.location='{{ route('shop.index') }}'">
                            Sản phẩm
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            @foreach($categories as $cat)
                                <li><a class="dropdown-item" href="{{ route('shop.show', $cat->id) }}">{{ $cat->name }}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('promotions') }}">Khuyến mại</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('return.policy') }}">Chính sách đổi trả</a></li>
                    <li class="nav-item">
                        @if(auth('customer')->check())
                            <a class="nav-link @if(request()->routeIs('cart.index')) active @endif" href="{{ route('cart.index') }}"><i class="fas fa-shopping-cart"></i> Giỏ hàng</a>
                        @else
                            <a class="nav-link" href="{{ route('login') }}"><i class="fas fa-shopping-cart"></i> Giỏ hàng</a>
                        @endif
                    </li>
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
    <footer class="footer mt-5" style="border-top:1px solid #eee; padding-top:24px;">
        <div class="container">
            <div class="row justify-content-center align-items-start">
                <div class="col-12  mb-4 text-md-start text-center d-flex align-items-center" style="gap:20px;">
                    <a href="https://twitter.com/" target="_blank" style="color:#222;font-size:22px;"><i class="fab fa-x-twitter"></i></a>
                    <a href="https://instagram.com/" target="_blank" style="color:#222;font-size:22px;"><i class="fab fa-instagram"></i></a>
                    <a href="https://youtube.com/" target="_blank" style="color:#222;font-size:22px;"><i class="fab fa-youtube"></i></a>
                    <a href="https://linkedin.com/" target="_blank" style="color:#222;font-size:22px;"><i class="fab fa-linkedin"></i></a>
                </div>
                <div class="col-12 text-center">
                    <div style="font-weight:600;">VINFAST TIỀN GIANG</div>
                    Đại lý ủy quyền chính hãng VinFast Việt Nam<br>
                    Km1954 Quốc lộ 1A, Ấp Long Thành, Xã Long An, Huyện Châu Thành, Tỉnh Tiền Giang<br>
                    HỖ TRỢ KHÁCH HÀNG<br>
                    Hotline: <a href="tel:0939382384">0939 382 384</a><br>
                    Email: pharmavilen85@gmail.com
                </div>
            </div>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
    function toggleMenu() {
        var menu = document.getElementById('mainMenu');
        menu.classList.toggle('show');
    }
    </script>
    @stack('scripts')
</body>
</html>