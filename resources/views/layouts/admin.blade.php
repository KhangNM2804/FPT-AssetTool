<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!--Select2-->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css">
    <!-- AdminLTE CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.1.0/dist/css/adminlte.min.css">

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!--Data Table-->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" />

    <!--Toastr-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" rel="stylesheet">

    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.39.0/css/tempusdominus-bootstrap-4.min.css">

    <!-- iCheck -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/icheck-bootstrap/3.0.1/icheck-bootstrap.min.css">

    <!-- JQVMap -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqvmap/1.5.1/jqvmap.min.css">

    <!-- overlayScrollbars -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/overlayscrollbars/1.13.0/css/OverlayScrollbars.min.css">

    <!-- Daterange picker -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/3.0.5/daterangepicker.css">

    <!-- Summernote -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.css">
    <!-- SweetAlert2 v9.17.1 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.1/dist/sweetalert2.min.css">
    </link>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

</head>
<style>
    .select2-dropdown {
        z-index: 1061;
    }

    .file-upload {
        margin: 0 auto;
        padding: 20px;
    }

    .file-upload-btn {
        width: 100%;
        margin: 0;
        color: #5e5e5e;
        border: none;
        padding: 10px;
        border-radius: 4px;
        transition: all .2s ease;
        outline: none;
        text-transform: uppercase;
        font-weight: 700;
    }

    .file-upload-btn:hover {

        color: #ffffff;
        transition: all .2s ease;
        cursor: pointer;
    }

    .file-upload-btn:active {
        border: 0;
        transition: all .2s ease;
    }

    .file-upload-content {
        display: none;
        text-align: center;
    }

    .file-upload-input {
        position: absolute;
        margin: 0;
        padding: 0;
        width: 100%;
        height: 100%;
        outline: none;
        opacity: 0;
        cursor: pointer;
    }

    .image-upload-wrap {
        margin-top: 20px;

        position: relative;
    }

    .image-dropping,
    .image-upload-wrap:hover {

        border: 4px dashed #ffffff;
    }

    .image-title-wrap {
        padding: 0 15px 15px 15px;
        color: #222;
    }

    .drag-text {
        text-align: center;
    }

    .drag-text h3 {
        font-weight: 100;
        text-transform: uppercase;

        padding: 60px 0;
    }

    .file-upload-image {
        max-height: 200px;
        max-width: 200px;
        margin: auto;
        padding: 20px;
    }

    .remove-image {
        width: 200px;
        margin: 0;
        color: #fff;
        background: #cd4535;
        border: none;
        padding: 10px;
        border-radius: 4px;
        border-bottom: 4px solid #b02818;
        transition: all .2s ease;
        outline: none;
        text-transform: uppercase;
        font-weight: 700;
    }

    .remove-image:hover {
        background: #c13b2a;
        color: #ffffff;
        transition: all .2s ease;
        cursor: pointer;
    }

    .remove-image:active {
        border: 0;
        transition: all .2s ease;
    }
</style>

<body
    class="dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed animate__animated animate__fadeIn animate__slow"
    style="height: auto;">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center" style="height: 0px;">
            <img class="animation__wobble" src="{{ asset('storage/uploads/FPT.png') }}" alt="FPTLogo" height="60" width="60"
                style="display: none;">
        </div>

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-dark">

            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>

            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->
                <li class="nav-item">
                    <a class="nav-link" title="Trang đăng ký mượn tài sản"
                        href="{{ route('client.borrow.borrows-client') }}">
                        <i class="fas fa-user"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="{{ route('staff.dashboard.indexExpenseRoom') }}" class="brand-link">
                <img src="{{ asset('storage/uploads/FPT.png') }}" alt="AdminLTE Logo"
                    class="brand-image img-circle elevation-2" style="opacity: .8">
                <span class="brand-text font-weight-light">FPT Asset</span>
            </a>

            <!-- Sidebar -->
            <div
                class="sidebar os-host os-theme-light os-host-overflow os-host-overflow-y os-host-resize-disabled os-host-scrollbar-horizontal-hidden os-host-transition">
                <div class="os-resize-observer-host observed">
                    <div class="os-resize-observer" style="left: 0px; right: auto;"></div>
                </div>
                <div class="os-size-auto-observer observed" style="height: calc(100% + 1px); float: left;">
                    <div class="os-resize-observer"></div>
                </div>

                <div class="os-padding">
                    <div class="os-viewport os-viewport-native-scrollbars-invisible os-viewport-native-scrollbars-overlaid"
                        style="overflow-y: scroll;">
                        <div class="os-content" style="padding: 10px 8px; height: 100%; width: 100%;">
                            <!-- SidebarSearch Form -->
                            <div class="form-inline">
                                <div class="input-group" data-widget="sidebar-search">
                                    <input class="form-control form-control-sidebar" type="search"
                                        placeholder="Search" aria-label="Search">
                                    <div class="input-group-append">
                                        <button class="btn btn-sidebar">
                                            <i class="fas fa-search fa-fw"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="sidebar-search-results">
                                    <div class="list-group"><a href="#" class="list-group-item">
                                            <div class="search-title"><strong class="text-light"></strong>N<strong
                                                    class="text-light"></strong>o<strong class="text-light"></strong>
                                                <strong class="text-light"></strong>e<strong
                                                    class="text-light"></strong>l<strong
                                                    class="text-light"></strong>e<strong
                                                    class="text-light"></strong>m<strong
                                                    class="text-light"></strong>e<strong
                                                    class="text-light"></strong>n<strong
                                                    class="text-light"></strong>t<strong class="text-light"></strong>
                                                <strong class="text-light"></strong>f<strong
                                                    class="text-light"></strong>o<strong
                                                    class="text-light"></strong>u<strong
                                                    class="text-light"></strong>n<strong
                                                    class="text-light"></strong>d<strong
                                                    class="text-light"></strong>!<strong class="text-light"></strong>
                                            </div>
                                            <div class="search-path"></div>
                                        </a></div>
                                </div>
                            </div>

                            <!-- Sidebar Menu -->
                            <nav class="mt-2">
                                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview"
                                    role="menu" data-accordion="false">

                                    <li class="nav-item menu-{{ request()->is('staff/dashboard*') ? 'open' : '' }}">
                                        <a href="#"
                                            class="nav-link {{ request()->is('staff/dashboard*') ? 'active' : '' }}">
                                            <i class="nav-icon fas fa-tachometer-alt"></i>
                                            <p>
                                                Báo cáo
                                                <i class="fas fa-angle-left right"></i>
                                            </p>
                                        </a>
                                        <ul class="nav nav-treeview">
                                            <li class="nav-item">
                                                <a href="{{ route('staff.dashboard.indexExpenseRoom') }}"
                                                    class="nav-link {{ request()->is('staff/dashboard/dashboardExpenseRoom*') ? 'active' : '' }}">
                                                    <i class="far fa-circle nav-icon"></i>
                                                    <p>Báo cáo chi tiêu</p>
                                                </a>
                                            </li>


                                            <li class="nav-item">
                                                <a href="{{ route('staff.dashboard.indexSellAsset') }}"
                                                    class="nav-link {{ request()->is('staff/dashboard/dashboardSellAsset*') ? 'active' : '' }}">
                                                    <i class="far fa-circle nav-icon"></i>
                                                    <p>Báo cáo thanh lý</p>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    {{-- <li class="nav-item ">
                                        <a href="#" class="nav-link">
                                            <i class="nav-icon fas fa-tachometer-alt"></i>
                                            <p>
                                                Dashboard
                                                <i class="right fas fa-angle-left"></i>
                                            </p>
                                        </a>
                                        <ul class="nav nav-treeview">
                                            <li class="nav-item">
                                                <a href="./index.html" class="nav-link">
                                                    <i class="far fa-circle nav-icon"></i>
                                                    <p>Dashboard v1</p>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="./index2.html" class="nav-link">
                                                    <i class="far fa-circle nav-icon"></i>
                                                    <p>Dashboard v2</p>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="./index3.html" class="nav-link">
                                                    <i class="far fa-circle nav-icon"></i>
                                                    <p>Dashboard v3</p>
                                                </a>
                                            </li>
                                        </ul>
                                    </li> --}}
                                    @can('viewAny', App\Models\Borrow::class)
                                        <li class="nav-item ">
                                            <a href="{{ route('staff.borrow.borrows.index') }}"
                                                class="nav-link {{ request()->is('staff/borrow*') ? 'active' : '' }}">
                                                <i class="nav-icon fab fa-wpforms"></i>
                                                <p>
                                                    Đăng ký mượn tài sản
                                                    <span id="countPendding" class="right badge badge-danger"></span>
                                                </p>
                                            </a>
                                        </li>
                                    @endcan
                                    @can('viewAny', App\Models\Semester::class)
                                        <li class="nav-item">
                                            <a href="{{ route('staff.semester.semesters.index') }}"
                                                class="nav-link {{ request()->is('staff/semesters*') ? 'active' : '' }}">
                                                <i class="nav-icon fas fa-university"></i>
                                                <p>
                                                    Học kỳ
                                                </p>
                                            </a>
                                        </li>
                                    @endcan
                                    @if (Gate::check('viewAny', App\Models\CategoryAsset::class) || Gate::check('viewAny', App\Models\Room::class))
                                        <li class="nav-item menu-{{ request()->is('staff/locate*') ? 'open' : '' }}">
                                            <a href="#"
                                                class="nav-link {{ request()->is('staff/locate*') ? 'active' : '' }}">
                                                <i class="nav-icon fas fa-map-marker-alt"></i>
                                                <p>
                                                    Vị trí
                                                    <i class="fas fa-angle-left right"></i>
                                                </p>
                                            </a>
                                            <ul class="nav nav-treeview">
                                                @can('viewAny', App\Models\CategoryAsset::class)
                                                    <li class="nav-item">
                                                        <a href="{{ route('staff.locate.categoryrooms.index') }}"
                                                            class="nav-link {{ request()->is('staff/locate/categoryrooms*') ? 'active' : '' }}">
                                                            <i class="far fa-circle nav-icon"></i>
                                                            <p>Danh mục phòng</p>
                                                        </a>
                                                    </li>
                                                @endcan
                                                @can('viewAny', App\Models\Room::class)
                                                    <li class="nav-item">
                                                        <a href="{{ route('staff.locate.rooms.index') }}"
                                                            class="nav-link {{ request()->is('staff/locate/rooms*') ? 'active' : '' }}">
                                                            <i class="far fa-circle nav-icon"></i>
                                                            <p>Phòng</p>
                                                        </a>
                                                    </li>
                                                @endcan
                                            </ul>
                                        </li>
                                    @endif
                                    <li class="nav-item menu-{{ request()->is('staff/asset/*') ? 'open' : 'close' }}">
                                        <a href="#"
                                            class="nav-link {{ request()->is('staff/asset/*') ? 'active' : '' }}">
                                            <i class="nav-icon fas fa-coins"></i>
                                            <p>
                                                Tài sản
                                                <i class="right fas fa-angle-left"></i>
                                            </p>
                                        </a>
                                        <ul class="nav nav-treeview">
                                            @can('viewAny', App\Models\GroupAsset::class)
                                                <li class="nav-item ">
                                                    <a href="{{ route('staff.asset.group-assets.index') }}"
                                                        class="nav-link {{ request()->is('staff/asset/group-assets*') ? 'active' : '' }}">
                                                        <i class="far fa-circle nav-icon"></i>
                                                        <p>Nhóm tài sản</p>
                                                    </a>
                                                </li>
                                            @endcan
                                            @can('viewAny', App\Models\CategoryAsset::class)
                                                <li class="nav-item">
                                                    <a href="{{ route('staff.asset.category-assets.index') }}"
                                                        class="nav-link {{ request()->is('staff/asset/category-assets*') ? 'active' : '' }}">
                                                        <i class="far fa-circle nav-icon"></i>
                                                        <p>Danh mục tài sản</p>
                                                    </a>
                                                </li>
                                            @endcan
                                            @can('viewAny', App\Models\Asset::class)
                                                <li class="nav-item">
                                                    <a href="{{ route('staff.asset.invoices.index') }}"
                                                        class="nav-link {{ request()->is('staff/asset/invoices*') ? 'active' : '' }}">
                                                        <i class="far fa-circle nav-icon"></i>
                                                        <p>Hóa đơn</p>
                                                    </a>
                                                </li>
                                            @endcan
                                            @can('viewAny', App\Models\Asset::class)
                                                <li class="nav-item">
                                                    <a href="{{ route('staff.asset.asset.index') }}"
                                                        class="nav-link {{ request()->is('staff/asset/asset*') ? 'active' : '' }}">
                                                        <i class="far fa-circle nav-icon"></i>
                                                        <p>Tài sản</p>
                                                    </a>
                                                </li>
                                            @endcan
                                            @can('viewAny', App\Models\Borrow::class)
                                                <li class="nav-item">
                                                    <a href="{{ route('staff.asset.borrowed-asset.index') }}"
                                                        class="nav-link {{ request()->is('staff/asset/borrowed-asset*') ? 'active' : '' }}">
                                                        <i class="far fa-circle nav-icon"></i>
                                                        <p>Tài sản được phép mượn</p>
                                                    </a>
                                                </li>
                                            @endcan
                                            @can('viewAny', App\Models\Handover::class)
                                                <li class="nav-item">
                                                    <a href="{{ route('staff.asset.handover.index') }}"
                                                        class="nav-link {{ request()->is('staff/asset/handover*') ? 'active' : '' }}">
                                                        <i class="far fa-circle nav-icon"></i>
                                                        <p>Bàn giao <span id="countHandover"
                                                                class="right badge badge-danger"></span></p>
                                                    </a>
                                                </li>
                                            @endcan

                                        </ul>
                                    </li>
                                    @can('viewAny', App\Models\User::class)
                                        <li class="nav-item menu-{{ request()->is('staff/users/*') ? 'open' : 'close' }}">
                                            <a href="#" class="nav-link">
                                                <i class="nav-icon fas fa-user-edit"></i>
                                                <p>
                                                    Người dùng
                                                    <i class="fas fa-angle-left right"></i>
                                                </p>
                                            </a>
                                            <ul class="nav nav-treeview">
                                                <li class="nav-item">
                                                    <a href="{{ route('staff.users.users.index') }}"
                                                        class="nav-link {{ request()->is('staff/users/users*') ? 'active' : '' }}">
                                                        <i class="far fa-circle nav-icon"></i>
                                                        <p>Phân quyền</p>
                                                    </a>
                                                </li>
                                                {{-- <li class="nav-item">
                                                <a href="pages/UI/icons.html" class="nav-link">
                                                    <i class="far fa-circle nav-icon"></i>
                                                    <p>Icons</p>
                                                </a>
                                            </li> --}}

                                            </ul>
                                        </li>
                                    @endcan



                                </ul>
                            </nav>
                            <!-- /.sidebar-menu -->
                        </div>
                    </div>
                </div>
                <div class="os-scrollbar os-scrollbar-horizontal os-scrollbar-unusable os-scrollbar-auto-hidden">
                    <div class="os-scrollbar-track">
                        <div class="os-scrollbar-handle" style="width: 100%; transform: translate(0px);"></div>
                    </div>
                </div>
                <div class="os-scrollbar os-scrollbar-vertical os-scrollbar-auto-hidden">
                    <div class="os-scrollbar-track">
                        <div class="os-scrollbar-handle" style="height: 20.0147%; transform: translate(0px);"></div>
                    </div>
                </div>
                <div class="os-scrollbar-corner"></div>
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper" style="min-height: 272.2px;">
            <!-- Content Header (Page header) -->

            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <strong>Copyright © KhangNM6 .</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 1.0.0
            </div>
        </footer>
        <div id="sidebar-overlay"></div>
    </div>

    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Numeral.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/numeral.js/2.0.6/numeral.min.js"></script>
    <!-- select2 -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
    <!--Toastr-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <!-- SweetAlert JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.1/dist/sweetalert2.min.js"></script>
    <!-- Bootstrap -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- AdminLTE App -->
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
    <!-- Data Table-->
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>

    <!-- SheetJS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.3/xlsx.full.min.js"></script>
    @include('layouts._adminscript')
    @yield('js')

</body>

</html>
