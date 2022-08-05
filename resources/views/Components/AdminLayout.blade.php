<!DOCTYPE html>
<!-- beautify ignore:start -->
<html lang="en" class="light-style customizer-hide" dir="ltr" data-theme="theme-semi-dark" data-assets-path="{{url('public/assets/')}}/" data-template="vertical-menu-template-semi-dark">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>@yield('title')</title>

    <meta name="description" content="Start your development with a Dashboard for Bootstrap 5" />
    <meta name="keywords" content="dashboard, bootstrap 5 dashboard, bootstrap 5 admin, bootstrap 5 design, bootstrap 5">

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{url('public/favicon.ico')}}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&amp;family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&amp;display=swap" rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" href="{{url('public/assets/vendor/fonts/boxicons.css')}}" />
    <link rel="stylesheet" href="{{url('public/assets/vendor/fonts/fontawesome.css')}}" />
    <link rel="stylesheet" href="{{url('public/assets/vendor/fonts/flag-icons.css')}}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{url('public/assets/vendor/css/rtl/core.css')}}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{url('public/assets/vendor/css/rtl/theme-semi-dark.css')}}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{url('public/assets/css/demo.css')}}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{url('public/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css')}}" />
    <link rel="stylesheet" href="{{url('public/assets/vendor/libs/typeahead-js/typeahead.css')}}" />
    <link rel="stylesheet" href="{{url('public/assets/vendor/libs/swiper/swiper.css')}}" />
    <link rel="stylesheet" href="{{url('public/assets/vendor/css/pages/ui-carousel.css')}}" />
    <!-- Vendor -->
    <link rel="stylesheet" href="{{url('public/assets/vendor/libs/formvalidation/dist/css/formValidation.min.css')}}" />
    <link type="text/css" rel="stylesheet" href="{{url('public/css/cropper.css')}}">

    <!-- Page CSS -->
    <!-- Page -->
    <link rel="stylesheet" href="{{url('public/assets/vendor/css/pages/page-auth.css')}}">
    <!-- Helpers -->
    <script src="{{url('public/assets/vendor/js/helpers.js')}}"></script>

    <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
    <script src="{{url('public/assets/vendor/js/template-customizer.js')}}"></script>
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{url('public/assets/js/config.js')}}"></script>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async="async" src="https://www.googletagmanager.com/gtag/js?id=GA_MEASUREMENT_ID"></script>
    <!-- Custom notification for demo -->
    <!-- beautify ignore:end -->

<style>
text {
    display: none;
}
.swal2-container{
 z-index: 99999!important;
}
</style>
<script src="{{url('public/assets/vendor/libs/jquery/jquery.js')}}"></script>
</head>
<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar  ">
        <div class="layout-container">
            <!-- Menu -->
            <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
                <div class="app-brand demo">
                    <a href="{{route('Dashboard')}}" class="app-brand-link">
                        <img src="{{url('public/images/cc_white_logo.png')}}" alt="" width="136"  style="margin-left: -5.5px;">
                    </a>
                    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
                        <i class="bx menu-toggle-icon d-none d-xl-block fs-4 align-middle"></i>
                        <i class="bx bx-x d-block d-xl-none bx-sm align-middle"></i>
                    </a>
                </div>
                <div class="menu-divider mt-0  ">
                </div>
                <div class="menu-inner-shadow"></div>
                <ul class="menu-inner py-1">
                    <!-- Dashboards -->
                    <li class="menu-item {{Request::is('Admin/Dashboard') ? 'active' : ''}}">
                        <a href="{{route('Dashboard')}}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-home-circle"></i>
                            <div>Dashboards</div>
                        </a>
                    </li>
                    <!-- Apps & Pages -->
                    <li class="menu-item {{Request::is('Admin/SchoolsApprovals') || Request::is('Admin/SchoolDetails/'.Session::get('school_token')) ? 'active' : ''}}">
                        <a href="{{route('SchoolsApprovals')}}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-collection"></i>
                            <div data-i18n="Schools Approvals">Schools Approvals</div>
                        </a>
                    </li>
                    <li class="menu-item {{Request::is('Admin/BlogsApprovals') ? 'active' : ''}}">
                        <a href="{{route('BlogsApprovals')}}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-news"></i>
                            <div data-i18n="Schools Blog">Schools Blog</div>
                        </a>
                    </li>
                    <li class="menu-item {{Request::is('Admin/Scholarships') ? 'active' : ''}}">
                        <a href="{{route('Scholarships')}}" class="menu-link">
                            <i class="menu-icon tf-icons bx bxs-graduation"></i>
                            <div data-i18n="Scholarships">Scholarships</div>
                        </a>
                    </li>
                    <li class="menu-item {{Request::is('Admin/Merchandise') ? 'active' : ''}}">
                        <a href="{{route('Merchandise')}}" class="menu-link">
                            <i class="menu-icon tf-icons bx bxs-backpack"></i>
                            <div data-i18n="Merchandise">Merchandise</div>
                        </a>
                    </li>
                </ul>
            </aside>
            <!-- / Menu -->
            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->
                <nav class="layout-navbar navbar navbar-expand-xl align-items-center bg-navbar-theme"
                    id="layout-navbar">
                    <div class="container-fluid">
                        <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0   d-xl-none ">
                            <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                                <i class="bx bx-menu bx-sm"></i>
                            </a>
                        </div>
                        <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
                            <!-- Search -->
                          {{--   <div class="navbar-nav align-items-center">
                                <div class="nav-item navbar-search-wrapper mb-0">
                                    <a class="nav-item nav-link search-toggler px-0" href="javascript:void(0);">
                                        <i class="bx bx-search-alt bx-sm"></i>
                                        <span class="d-none d-md-inline-block text-muted">Search (Ctrl+/)</span>
                                    </a>
                                </div>
                            </div> --}}
                            <!-- /Search -->
                            <ul class="navbar-nav flex-row align-items-center ms-auto">
                                <!-- User -->
                                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                                    <a class="nav-link dropdown-toggle hide-arrow" title="Profile"
                                        data-bs-toggle="dropdown">
                                        <div class="avatar avatar-online">
                                            <i class="fa-regular fa-user profile-icon"></i>
                                        </div>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li>
                                            <a class="dropdown-item">
                                                <div class="d-flex">
                                                    <div class="flex-grow-1">
                                                        <span
                                                            class="fw-semibold d-block lh-1">{{Session::get('admin_name')}}</span>
                                                        <small>Admin</small>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <div class="dropdown-divider"></div>
                                        </li>
                                      {{--   <li>
                                            <a class="dropdown-item" href="javascript:void(0)">
                                                <i class="bx bx-user me-2"></i>
                                                <span class="align-middle">My Profile</span>
                                            </a>
                                        <li> --}}
                                            <a class="dropdown-item" href="{{url('AdminLogout')}}">
                                                <i class="bx bx-power-off me-2"></i>
                                                <span class="align-middle">Log Out</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <!--/ User -->
                            </ul>
                        </div>
                        <!-- Search Small Screens -->
                        <div class="navbar-search-wrapper search-input-wrapper  d-none">
                            <input type="text" class="form-control search-input container-fluid border-0"
                                placeholder="Search..." aria-label="Search...">
                            <i class="bx bx-x bx-sm search-toggler cursor-pointer"></i>
                        </div>
                    </div>
                </nav>
                <!-- / Navbar -->

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->
                    <div class="container-xxl flex-grow-1 container-p-y">
                        <div class="row">
                            <!-- === Main Content === -->
                            @yield('content')
                            <!-- === Main Content === -->
                        </div>
                    </div>
                    <!-- / Content -->
                    <!-- Footer -->
                    <footer class="content-footer footer bg-footer-theme">
                        <div
                            class="container-fluid d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">

                        </div>
                    </footer>
                    <!-- / Footer -->
                    <div class="content-backdrop fade"></div>
                </div>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>
        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>
        <!-- Drag Target Area To SlideIn Menu On Small Screens -->
        <div class="drag-target"></div>
    </div>
    <!-- / Layout wrapper -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="{{url('public/assets/vendor/libs/datatables/jquery.dataTables.js')}}"></script>
    <script src="{{url('public/assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js')}}"></script>
    <script src="{{url('public/assets/vendor/libs/datatables-responsive/datatables.responsive.js')}}"></script>
    <script src="{{url('public/assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.js')}}"></script>
    <script src="{{url('public/assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.js')}}"></script>
    <script src="{{url('public/assets/vendor/libs/datatables-buttons/datatables-buttons.js')}}"></script>
    <script src="{{url('public/assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.js')}}"></script>
    <script src="{{url('public/assets/vendor/libs/jszip/jszip.js')}}"></script>
    <script src="{{url('public/assets/vendor/libs/pdfmake/pdfmake.js')}}"></script>
    <script src="{{url('public/assets/vendor/libs/datatables-buttons/buttons.html5.js')}}"></script>
    <script src="{{url('public/assets/vendor/libs/datatables-buttons/buttons.print.js')}}"></script>
    <script src="{{url('public/assets/vendor/libs/popper/popper.js')}}"></script>
    <script src="{{url('public/assets/vendor/js/bootstrap.js')}}"></script>
    <script src="{{url('public/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
    <script src="{{url('public/assets/js/extended-ui-perfect-scrollbar.js')}}"></script>
    <script src="{{url('public/assets/vendor/libs/swiper/swiper.js')}}"></script>
    <script src="{{url('public/assets/js/cards-actions.js')}}"></script>
    <script src="{{url('public/assets/js/ui-carousel.js')}}"></script>
    <script src="{{url('public/assets/js/ui-popover.js')}}"></script>
    <script>$(function () {$('body').tooltip({selector: '[data-toggle="tooltip"]'});})</script>
    <script src="{{url('public/assets/vendor/libs/hammer/hammer.js')}}"></script>
    <script src="{{url('public/assets/vendor/libs/i18n/i18n.js')}}"></script>
    <script src="{{url('public/assets/vendor/libs/typeahead-js/typeahead.js')}}"></script>
    <script src="{{url('public/assets/vendor/js/menu.js')}}"></script>
    <!-- endbuild -->
    <!-- Vendors JS -->
    <script src="{{url('public/assets/vendor/libs/formvalidation/dist/js/FormValidation.min.js')}}"></script>
    <script src="{{url('public/assets/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js')}}"></script>
    <script src="{{url('public/assets/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js')}}"></script>
    <!-- Main JS -->
    <script src="{{url('public/assets/js/main.js')}}"></script>
    <!-- Toastr JS -->
    <script src="{{url('public/js/sweetalert2.js')}}"></script>
    <!-- Toastr JS -->
    <!-- Cropper JS -->
    <script src="{{url('public/js/cropper.js')}}"></script>
    <!-- Cropper JS -->
    <!-- Page JS -->
    <script src="{{url('public/assets/js/pages-auth.js')}}"></script>
</body>
</html>
