<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') - Document Tracking System | PSDMBP</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <!-- Font Awesome Icons -->
    {{-- <link rel="stylesheet" href="{{ asset('assets/FontAwesome/6.2.1/css/all.min.css') }}"> --}}
    <!-- Sweetalert2 -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('assets/adminLTE/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('assets/adminLTE/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,600,700,800,900&display=swap"
        rel="stylesheet" />
    <!--end::Fonts--><!--begin::Third Party Plugin(OverlayScrollbars)-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.3.0/styles/overlayscrollbars.min.css"
        integrity="sha256-dSokZseQNT08wYEWiz5iLI8QPlKxG+TswNRD8k35cpg=" crossorigin="anonymous">
    <!--end::Third Party Plugin(OverlayScrollbars)--><!--begin::Third Party Plugin(Bootstrap Icons)-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.min.css"
        integrity="sha256-Qsx5lrStHZyR9REqhUF8iQt73X06c8LGIUPzpOhwRrI=" crossorigin="anonymous">
    <!--end::Third Party Plugin(Bootstrap Icons)--><!--begin::Required Plugin(AdminLTE)-->
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('assets/AdminLTE/dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.css"
        integrity="sha256-4MX+61mt9NVvvuPjUWdUdyfZfxSB1/Rf9WtqRHgG5S0=" crossorigin="anonymous"><!-- jsvectormap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/jsvectormap@1.5.3/dist/css/jsvectormap.min.css"
        integrity="sha256-+uGLJmmTKOqBr+2E6KDYs/NRsHxSkONXFHUL0fy2O/4=" crossorigin="anonymous">
    <!-- Our style -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    @stack('css')
</head>

<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
    <div class="app-wrapper">
        <nav class="app-header navbar navbar-expand" data-bs-theme="light">
            <div class="container-fluid">
                <ul class="navbar-nav">
                    <li class="nav-item"> <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button">
                            <i class="bi bi-list"></i> </a> </li>
                    {{-- <li class="nav-item d-none d-md-block"> <a href="#" class="nav-link">Home</a> </li> --}}
                </ul>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown user-menu"> <a href="" class="nav-link dropdown-toggle"
                            data-bs-toggle="dropdown"> <img src="{{ asset('assets/img/profile/default.png') }}"
                                class="user-image rounded-circle shadow" alt="User Image"> <span
                                class="d-none d-md-inline">{{ Auth::user()->name }}</span> </a>
                        <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
                            <li class="user-header text-bg-warning"> <img
                                    src="{{ asset('assets/img/profile/default.png') }}" class="rounded-circle shadow"
                                    alt="User Image">
                                <p>
                                    {{ Auth::user()->name }} - {{ auth()->user()->position->name }}
                                    {{ auth()->user()->department->name }}
                                    {{-- <small>Member since Nov. 2023</small> --}}
                                </p>
                            </li>
                            {{-- <li class="user-body">
                                <div class="row">
                                    <div class="col-4 text-center"> <a href="#">Followers</a> </div>
                                    <div class="col-4 text-center"> <a href="#">Sales</a> </div>
                                    <div class="col-4 text-center"> <a href="#">Friends</a> </div>
                                </div>
                            </li> --}}
                            <li class="user-footer">
                                <a href="#" class="btn btn-light btn-flat">Profile</a>
                                <a href="{{ route('logout') }}" class="btn btn-danger btn-flat float-end"
                                    onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Logout</a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
        <aside class="app-sidebar bg-dark shadow" data-bs-theme="dark">
            <div class="sidebar-brand">
                <a href="{{ route('dashboard') }}" class="brand-link">
                    <img src="{{ asset('assets/img/logo/PSDMBP.png') }}" alt="Logo PSDMBP" class="brand-image shadow">
            </div>
            <div class="sidebar-wrapper">
                <nav class="mt-2">
                    @auth
                        <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu"
                            data-accordion="false">
                            <li class="nav-item">
                                <a href="{{ route('dashboard') }}"
                                    class="nav-link {{ Request::is('dashboard*') ? 'active' : '' }}"> <i
                                        class="nav-icon bi bi-speedometer"></i>
                                    <p>Dashboard</p>
                                </a>
                            </li>
                            <li class="nav-item {{ Request::is('document*') ? 'menu-open' : '' }}"> <a href="#"
                                    class="nav-link"> <i class="nav-icon bi bi-file-earmark-text"></i>
                                    <p>
                                        Document
                                        <i class="nav-arrow bi bi-chevron-right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="#"
                                            class="nav-link {{ Request::is('document.all') ? 'active' : '' }}">
                                            <i class="nav-icon bi bi-circle"></i>
                                            <p>All Document</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#"
                                            class="nav-link {{ Request::is('document.user') ? 'active' : '' }}">
                                            <i class="nav-icon bi bi-circle "></i>
                                            <p>My Document</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#"
                                            class="nav-link {{ Request::is('document.waiting') ? 'active' : '' }}">
                                            <i class="nav-icon bi bi-circle text-danger"></i>
                                            <p>Review</p>
                                            <span class="nav-badge badge text-bg-danger me-3">6</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li class="nav-header">Admin Menu</li>
                            <li class="nav-item">
                                <a href="{{ route('department.index') }}"
                                    class="nav-link {{ Request::is('department*') ? 'active' : '' }}"> <i
                                        class="nav-icon bi bi-building-fill-gear"></i>
                                    <p>Department</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('position.index') }}"
                                    class="nav-link {{ Request::is('position*') ? 'active' : '' }}"> <i
                                        class="nav-icon bi bi-geo-alt"></i>
                                    <p>Position</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('user.index') }}"
                                    class="nav-link {{ Request::is('user*') ? 'active' : '' }}"> <i
                                        class="nav-icon bi bi-person"></i>
                                    <p>User</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('tag.index') }}"
                                    class="nav-link {{ Request::is('rfid*') ? 'active' : '' }}"> <i
                                        class="nav-icon bi bi-speedometer"></i>
                                    <p>RFID Menu</p>
                                </a>
                            </li>

                            @if (auth()->user()->role_id != 1)
                                <li class="nav-header">Settings</li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link {{ Request::is('profile*') ? 'active' : '' }}">
                                        <i class="nav-icon bi bi-person-circle"></i>
                                        <p>My Profile</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link {{ Request::is('settings*') ? 'active' : '' }}">
                                        <i class="nav-icon bi bi-gear"></i>
                                        <p>Settings</p>
                                    </a>
                                </li>
                                <li class="nav-header">Documentation</li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link"> <i class="nav-icon bi bi-journals"></i>
                                        <p>Manual Book</p>
                                    </a>
                                </li>
                            @endif
                        </ul>
                    @endauth
                </nav>
            </div>
        </aside>
        <main class="app-main">
            @yield('content')
        </main>
        <footer class="app-footer">
            <div class="float-end d-none d-sm-inline">Your Solution Partner</div>
            <strong>
                Copyright &copy; 2024&nbsp;
                <a href="https://partnership.co.id" class="text-decoration-none text-warning">Partnership</a>.
            </strong>
            All rights reserved.
        </footer>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.3.0/browser/overlayscrollbars.browser.es6.min.js"
        integrity="sha256-H2VM7BKda+v2Z4+DRy69uknwxjyDRhszjXFhsL4gD3w=" crossorigin="anonymous"></script>
    <!--end::Third Party Plugin(OverlayScrollbars)--><!--begin::Required Plugin(popperjs for Bootstrap 5)-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha256-whL0tQWoY1Ku1iskqPFvmZ+CHsvmRWx/PIoEvIeWh4I=" crossorigin="anonymous"></script>
    <!--end::Required Plugin(popperjs for Bootstrap 5)--><!--begin::Required Plugin(Bootstrap 5)-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha256-YMa+wAM6QkVyz999odX7lPRxkoYAan8suedu4k2Zur8=" crossorigin="anonymous"></script> <!--end::Required Plugin(Bootstrap 5)--><!--begin::Required Plugin(AdminLTE)-->
    <!-- jQuery -->
    <script src="{{ asset('assets/AdminLTE/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Select2 -->
    <script src="{{ asset('assets/adminLTE/plugins/select2/js/select2.full.min.js') }}"></script>


    <!-- AdminLTE App -->
    <script src="{{ asset('assets/AdminLTE/dist/js/adminlte.min.js') }}"></script>

    <script>
        const SELECTOR_SIDEBAR_WRAPPER = ".sidebar-wrapper";
        const Default = {
            scrollbarTheme: "os-theme-light",
            scrollbarAutoHide: "leave",
            scrollbarClickScroll: true,
        };
        document.addEventListener("DOMContentLoaded", function() {
            const sidebarWrapper = document.querySelector(SELECTOR_SIDEBAR_WRAPPER);
            if (
                sidebarWrapper &&
                typeof OverlayScrollbarsGlobal?.OverlayScrollbars !== "undefined"
            ) {
                OverlayScrollbarsGlobal.OverlayScrollbars(sidebarWrapper, {
                    scrollbars: {
                        theme: Default.scrollbarTheme,
                        autoHide: Default.scrollbarAutoHide,
                        clickScroll: Default.scrollbarClickScroll,
                    },
                });
            }
        });
    </script>

    <!-- Link Active -->
    <script>
        $(document).ready(function() {
            // Get the current URL path
            var url = window.location.href;

            // Add 'active' class to matching sidebar links
            $('ul.nav-sidebar a').filter(function() {
                return this.href && (this.href === url || url.startsWith(this.href));
            }).addClass('active');

            // For nested links inside treeview menus
            $('ul.nav-treeview a').filter(function() {
                return this.href && (this.href === url || url.startsWith(this.href));
            }).closest('.nav-item.has-treeview').addClass('menu-open').children('a.nav-link').addClass('active');
        });
    </script>

    <!-- Sweetalert2 -->
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top',
            iconColor: 'white',
            customClass: {
                popup: 'colored-toast'
            },
            showConfirmButton: false,
            timer: 5000,
            timerProgressBar: true
        })

        @if (session('pesan'))
            @switch(session('level-alert'))
                @case('alert-success')
                Toast.fire({
                    icon: 'success',
                    title: '{{ Session::get('pesan') }}'
                })
                @break

                @case('alert-danger')
                Toast.fire({
                    icon: 'error',
                    title: '{{ Session::get('pesan') }}'
                })
                @break

                @case('alert-warning')
                Toast.fire({
                    icon: 'warning',
                    title: '{{ Session::get('pesan') }}'
                })
                @break

                @case('alert-question')
                Toast.fire({
                    icon: 'question',
                    title: '{{ Session::get('pesan') }}'
                })
                @break

                @default
                Toast.fire({
                    icon: 'info',
                    title: '{{ Session::get('pesan') }}'
                })
            @endswitch
        @endif
        @if (count($errors) > 0)
            @foreach ($errors->all() as $error)
                Toast.fire({
                    icon: 'error',
                    title: '{{ $error }}'
                })
            @endforeach
        @endif
    </script>

    @stack('scripts')

</body>

</html>
