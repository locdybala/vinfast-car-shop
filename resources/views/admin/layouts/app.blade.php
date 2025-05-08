<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} - Admin</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        .sidebar {
            min-height: 100vh;
            background: #23272b;
            color: #fff;
            box-shadow: 2px 0 8px rgba(0,0,0,0.04);
        }
        .sidebar .admin-logo {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 32px 0 24px 0;
        }
        .sidebar .admin-logo img {
            width: 48px;
            height: 48px;
            border-radius: 50%;
            margin-right: 10px;
        }
        .sidebar .admin-logo span {
            font-size: 1.3rem;
            font-weight: bold;
            letter-spacing: 1px;
        }
        .sidebar .nav {
            margin-top: 10px;
        }
        .sidebar .nav-link {
            color: #bfc9d1;
            padding: 12px 24px;
            border-radius: 8px;
            margin: 4px 8px;
            display: flex;
            align-items: center;
            font-size: 1.05rem;
            transition: background 0.2s, color 0.2s;
        }
        .sidebar .nav-link i {
            font-size: 1.2rem;
            margin-right: 12px;
        }
        .sidebar .nav-link.active, .sidebar .nav-link:focus, .sidebar .nav-link:hover {
            background: #0d6efd;
            color: #fff;
            box-shadow: 0 2px 8px rgba(13,110,253,0.08);
        }
        .sidebar .nav-link p {
            margin: 0;
        }
        .sidebar .nav-item.mt-3 {
            margin-top: 2.5rem !important;
        }
        .sidebar .nav-link[disabled] {
            opacity: 0.5;
            pointer-events: none;
        }
        .main-content {
            min-height: 100vh;
            background: #f8f9fa;
        }
        .login-page {
            min-height: 100vh;
            display: flex;
            align-items: center;
            background-color: #f8f9fa;
        }
    </style>
</head>
<body>
    @if (Route::is('admin.login'))
        <div class="login-page">
            @yield('content')
        </div>
    @else
        <div class="container-fluid">
            <div class="row">
                <!-- Sidebar -->
                <div class="col-md-3 col-lg-2 px-0 sidebar">
                    <div class="admin-logo">
                        <img src="https://cdn-icons-png.flaticon.com/512/743/743007.png" alt="Admin">
                        <span>VinFast Admin</span>
                    </div>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}"
                               href="{{ route('admin.dashboard') }}">
                                <i class="fas fa-tachometer-alt"></i> Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.categories.index') }}" class="nav-link {{ request()->routeIs('admin.categories.*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-list"></i>
                                <span>Danh mục</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.products.index') }}" class="nav-link {{ request()->routeIs('admin.products.*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-car"></i>
                                <span>Sản phẩm</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.orders.index') }}" class="nav-link {{ request()->routeIs('admin.orders.*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-shopping-cart"></i>
                                <span>Đơn hàng</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.customers.index') }}" class="nav-link {{ request()->routeIs('admin.customers.*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-users"></i>
                                <span>Khách hàng</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.users.index') }}" class="nav-link {{ request()->routeIs('admin.users.*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-user-shield"></i>
                                <span>Tài khoản</span>
                            </a>
                        </li>
                        <li class="nav-item mt-3">
                            <form action="{{ route('admin.logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="nav-link border-0 bg-transparent text-white">
                                    <i class="fas fa-sign-out-alt"></i> Đăng xuất
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>

                <!-- Main Content -->
                <div class="col-md-9 col-lg-10 main-content">
                    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
                        <div class="container-fluid">
                            <span class="navbar-brand">@yield('title')</span>
                        </div>
                    </nav>

                    <div class="container-fluid p-4">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    @endif

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>