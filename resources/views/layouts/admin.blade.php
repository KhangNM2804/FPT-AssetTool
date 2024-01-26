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
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.1/dist/sweetalert2.min.css"></link>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
</head>


<body class="dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed animate__animated animate__fadeIn animate__slow" style="height: auto;">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center" style="height: 0px;">
            <img class="animation__wobble" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60"
                width="60" style="display: none;">
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
                    <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                        <i class="fas fa-search"></i>
                    </a>
                    <div class="navbar-search-block">
                        <form class="form-inline">
                            <div class="input-group input-group-sm">
                                <input class="form-control form-control-navbar" type="search" placeholder="Search"
                                    aria-label="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-navbar" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                    <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li>

                <!-- Messages Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-comments"></i>
                        <span class="badge badge-danger navbar-badge"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="dist/img/user1-128x128.jpg" alt="User Avatar"
                                    class="img-size-50 mr-3 img-circle">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        Brad Diesel
                                        <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">Call me whenever you can...</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="dist/img/user8-128x128.jpg" alt="User Avatar"
                                    class="img-size-50 img-circle mr-3">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        John Pierce
                                        <span class="float-right text-sm text-muted"><i
                                                class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">I got your message bro</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="dist/img/user3-128x128.jpg" alt="User Avatar"
                                    class="img-size-50 img-circle mr-3">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        Nora Silvester
                                        <span class="float-right text-sm text-warning"><i
                                                class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">The subject goes here</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
                    </div>
                </li>
                <!-- Notifications Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-bell"></i>
                        <span class="badge badge-warning navbar-badge"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-item dropdown-header">15 Notifications</span>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-envelope mr-2"></i> 4 new messages
                            <span class="float-right text-muted text-sm">3 mins</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-users mr-2"></i> 8 friend requests
                            <span class="float-right text-muted text-sm">12 hours</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-file mr-2"></i> 3 new reports
                            <span class="float-right text-muted text-sm">2 days</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
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
            <a href="index3.html" class="brand-link">
                <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                    style="opacity: .8">
                <span class="brand-text font-weight-light">AdminLTE 3</span>
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
                                    <li class="nav-item ">
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
                                    </li>
                                    <li class="nav-item">
                                        <a href="pages/widgets.html" class="nav-link">
                                            <i class="nav-icon fas fa-th"></i>
                                            <p>
                                                Widgets
                                                <span class="right badge badge-danger">New</span>
                                            </p>
                                        </a>
                                    </li>
                                    <li class="nav-item menu-{{ request()->is('staff/locate*') ? 'open' : '' }}">
                                        <a href="#"
                                            class="nav-link {{ request()->is('staff/locate*') ? 'active' : '' }}">
                                            <i class="nav-icon fas fa-copy"></i>
                                            <p>
                                                Vị trí
                                                <i class="fas fa-angle-left right"></i>
                                            </p>
                                        </a>
                                        <ul class="nav nav-treeview">
                                            <li class="nav-item">
                                                <a href="{{ route('staff.locate.categoryrooms.index') }}"
                                                    class="nav-link {{ request()->is('staff/locate/categoryrooms*') ? 'active' : '' }}">
                                                    <i class="far fa-circle nav-icon"></i>
                                                    <p>Danh mục phòng</p>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="{{ route('staff.locate.rooms.index') }}"
                                                    class="nav-link {{ request()->is('staff/locate/rooms*') ? 'active' : '' }}">
                                                    <i class="far fa-circle nav-icon"></i>
                                                    <p>Phòng</p>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="nav-item menu-{{ request()->is('staff/asset/*') ? 'open' : 'close' }}">
                                        <a href="#"
                                            class="nav-link {{ request()->is('staff/asset/*') ? 'active' : '' }}">
                                            <i class="nav-icon fas fa-chart-pie"></i>
                                            <p>
                                                Tài sản
                                                <i class="right fas fa-angle-left"></i>
                                            </p>
                                        </a>
                                        <ul class="nav nav-treeview">
                                            <li class="nav-item ">
                                                <a href="{{ route('staff.asset.group-assets.index') }}"
                                                    class="nav-link {{ request()->is('staff/asset/group-assets*') ? 'active' : '' }}">
                                                    <i class="far fa-circle nav-icon"></i>
                                                    <p>Nhóm tài sản</p>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="{{ route('staff.asset.category-assets.index') }}"
                                                    class="nav-link {{ request()->is('staff/asset/category-assets*') ? 'active' : '' }}">
                                                    <i class="far fa-circle nav-icon"></i>
                                                    <p>Danh mục tài sản</p>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="{{ route('staff.asset.asset.index') }}"
                                                    class="nav-link {{ request()->is('staff/asset/asset*') ? 'active' : '' }}">
                                                    <i class="far fa-circle nav-icon"></i>
                                                    <p>Tài sản</p>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="pages/charts/uplot.html" class="nav-link">
                                                    <i class="far fa-circle nav-icon"></i>
                                                    <p>uPlot</p>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                            <i class="nav-icon fas fa-tree"></i>
                                            <p>
                                                UI Elements
                                                <i class="fas fa-angle-left right"></i>
                                            </p>
                                        </a>
                                        <ul class="nav nav-treeview">
                                            <li class="nav-item">
                                                <a href="pages/UI/general.html" class="nav-link">
                                                    <i class="far fa-circle nav-icon"></i>
                                                    <p>General</p>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="pages/UI/icons.html" class="nav-link">
                                                    <i class="far fa-circle nav-icon"></i>
                                                    <p>Icons</p>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="pages/UI/buttons.html" class="nav-link">
                                                    <i class="far fa-circle nav-icon"></i>
                                                    <p>Buttons</p>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="pages/UI/sliders.html" class="nav-link">
                                                    <i class="far fa-circle nav-icon"></i>
                                                    <p>Sliders</p>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="pages/UI/modals.html" class="nav-link">
                                                    <i class="far fa-circle nav-icon"></i>
                                                    <p>Modals &amp; Alerts</p>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="pages/UI/navbar.html" class="nav-link">
                                                    <i class="far fa-circle nav-icon"></i>
                                                    <p>Navbar &amp; Tabs</p>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="pages/UI/timeline.html" class="nav-link">
                                                    <i class="far fa-circle nav-icon"></i>
                                                    <p>Timeline</p>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="pages/UI/ribbons.html" class="nav-link">
                                                    <i class="far fa-circle nav-icon"></i>
                                                    <p>Ribbons</p>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                            <i class="nav-icon fas fa-edit"></i>
                                            <p>
                                                Forms
                                                <i class="fas fa-angle-left right"></i>
                                            </p>
                                        </a>
                                        <ul class="nav nav-treeview">
                                            <li class="nav-item">
                                                <a href="pages/forms/general.html" class="nav-link">
                                                    <i class="far fa-circle nav-icon"></i>
                                                    <p>General Elements</p>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="pages/forms/advanced.html" class="nav-link">
                                                    <i class="far fa-circle nav-icon"></i>
                                                    <p>Advanced Elements</p>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="pages/forms/editors.html" class="nav-link">
                                                    <i class="far fa-circle nav-icon"></i>
                                                    <p>Editors</p>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="pages/forms/validation.html" class="nav-link">
                                                    <i class="far fa-circle nav-icon"></i>
                                                    <p>Validation</p>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                            <i class="nav-icon fas fa-table"></i>
                                            <p>
                                                Tables
                                                <i class="fas fa-angle-left right"></i>
                                            </p>
                                        </a>
                                        <ul class="nav nav-treeview">
                                            <li class="nav-item">
                                                <a href="pages/tables/simple.html" class="nav-link">
                                                    <i class="far fa-circle nav-icon"></i>
                                                    <p>Simple Tables</p>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="pages/tables/data.html" class="nav-link">
                                                    <i class="far fa-circle nav-icon"></i>
                                                    <p>DataTables</p>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="pages/tables/jsgrid.html" class="nav-link">
                                                    <i class="far fa-circle nav-icon"></i>
                                                    <p>jsGrid</p>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    
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
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Dashboard v2</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Dashboard v2</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
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
            <strong>Copyright © 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 3.2.0
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

    <!-- PAGE PLUGINS -->

    @yield('js')
    
</body>

</html>
