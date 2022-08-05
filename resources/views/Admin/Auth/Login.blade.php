<!DOCTYPE html>
<!-- beautify ignore:start -->
<html lang="en" class="light-style  customizer-hide" dir="ltr" data-theme="theme-semi-dark" data-assets-path="{{url('public/assets/')}}/" data-template="vertical-menu-template-semi-dark">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Campus Connect Admin Login</title>

    <meta name="description" content="Start your development with a Dashboard for Bootstrap 5" />
    <meta name="keywords" content="dashboard, bootstrap 5 dashboard, bootstrap 5 admin, bootstrap 5 design, bootstrap 5">
    <!-- Canonical SEO -->
    <!-- <link rel="canonical" href="https://1.envato.market/frest_admin"> -->

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{url('public/assets/img/favicon/favicon.ico')}}" />

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
    <!-- Vendor -->
<link rel="stylesheet" href="{{url('public/assets/vendor/libs/formvalidation/dist/css/formValidation.min.css')}}" />

    <!-- Page CSS -->
    <!-- Page -->
<link rel="stylesheet" href="{{url('public/assets/vendor/css/pages/page-auth.css')}}">
    <!-- Helpers -->
    <script src="{{url('public/assets/vendor/js/helpers.js')}}"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
    <script src="{{url('public/assets/vendor/js/template-customizer.js')}}"></script>
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{url('public/assets/js/config.js')}}"></script>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async="async" src="https://www.googletagmanager.com/gtag/js?id=GA_MEASUREMENT_ID"></script>

</head>

<body>

    <!-- Content -->

    <div class="authentication-wrapper authentication-cover">
        <div class="authentication-inner row m-0">
            <!-- /Left Text -->
            <div class="d-none d-lg-flex col-lg-7 col-xl-8 align-items-center">
                <div class="flex-row text-center mx-auto">
                    <img src="{{url('public/assets/img/pages/cc-log-bg.png')}}" alt="Auth Cover Bg color" width=" 520"
                        class="img-fluid authentication-cover-img" data-app-light-img="pages/cc-log-bg.png"
                        data-app-dark-img="pages/cc-log-bg.png">
                    <div class="mx-auto">
                        <h3>Campus Connect Admin Login</h3>
                    </div>
                </div>
            </div>
            <!-- /Left Text -->

            <!-- Login -->
            <div class="d-flex col-12 col-lg-5 col-xl-4 align-items-center authentication-bg p-sm-5 p-4">
                <div class="w-px-400 mx-auto">
                    <!-- Logo -->
                    <div class="app-brand custom-login mb-4">
                        <a href="index-2.html" class="app-brand-link gap-2 mb-2">
                            <span class="app-brand-logo demo text-center">
                                <img src="{{url('public/images/cc_color_logo.png')}}" alt="" width="200">
                            </span>
                            <!-- <span class="app-brand-text demo h3 mb-0 fw-bold">Frest</span> -->
                        </a>
                    </div>
                    <!-- /Logo -->
                    <h4 class="mb-2">Campus Connect Admin Login</h4>
                    <p class="mb-4">Please sign-in to your account and start the admin</p>

                    <form id="AdminLoginForm" class="mb-3">
                        @csrf
                        <div class="mb-3">
                            <label for="admin_email" class="form-label">Email</label>
                            <input type="text" class="form-control required" id="admin_email" name="admin_email"
                                placeholder="Enter your email " autofocus>
                        </div>
                        <div class="mb-3 form-password-toggle">
                            <div class="d-flex justify-content-between">
                                <label class="form-label" for="admin_password">Password</label>
                            </div>
                            <div class="input-group input-group-merge">
                                <input type="password" id="admin_password" class="form-control required"
                                    name="admin_password"
                                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                    aria-describedby="password" />
                                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                            </div>
                        </div>
                        <div class="text-center">
                            <div id="error"></div>
                        </div>
                        <!-- <button type="button" class="btn btn-primary d-grid w-100" onclick="AdminLogin()">
                            Login
                        </button> -->
                        <button class="btn btn-primary login-btn" type="button" onclick="AdminLogin()">
                            <span class="spinner-border d-none" role="status" aria-hidden="true"></span>
                            Sign In
                        </button>
                    </form>


                    <!-- <div class="divider my-4">
                        <div class="divider-text">or</div>
                    </div> -->

                    <!-- <div class="d-flex justify-content-center">
                        <a href="javascript:;" class="btn btn-icon btn-label-facebook me-3">
                            <i class="tf-icons bx bxl-facebook"></i>
                        </a>

                        <a href="javascript:;" class="btn btn-icon btn-label-google-plus me-3">
                            <i class="tf-icons bx bxl-google-plus"></i>
                        </a>

                        <a href="javascript:;" class="btn btn-icon btn-label-twitter">
                            <i class="tf-icons bx bxl-twitter"></i>
                        </a>
                    </div> -->
                </div>
            </div>
            <!-- /Login -->
        </div>
    </div>

    <!-- / Content -->


    <!-- <div class="buy-now">
        <a href="https://1.envato.market/frest_admin" target="_blank" class="btn btn-danger btn-buy-now">Buy Now</a>
    </div> -->




    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="{{url('public/assets/vendor/libs/jquery/jquery.js')}}"></script>
    <script src="{{url('public/assets/vendor/libs/popper/popper.js')}}"></script>
    <script src="{{url('public/assets/vendor/js/bootstrap.js')}}"></script>
    <script src="{{url('public/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')}}"></script>

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

    <!-- Page JS -->
    <script src="{{url('public/assets/js/pages-auth.js')}}"></script>


    <!-- === Main Script === -->
    <script>
    function AdminLogin() {

        // --- === Front End Validation === --- \\
        var fields = $("input[class*='required']");
        for (let i = 0; i <= fields.length; i++) {
            if ($(fields[i]).val() === '') {
                var currentElement = $(fields[i]).attr('id');
                var value = currentElement.replaceAll('_', ' ');
                $("#error").show().addClass('alert alert-danger').html('The ' + value + ' field is required.');
                return false;
            } else {
                $("#error").hide().removeClass().html('');
            }
        }
        // --- === Front End Validation === --- \\

        $.ajax({
            type: "POST",
            url: "{{url('AdminSignIn')}}",
            data: $("#AdminLoginForm").serialize(),
            beforeSend: function() {
                $(".login-btn").prop('disabled', true)
                $(".spinner-border").removeClass('d-none')
            },
            success: function(data) {
                $(".login-btn").prop('disabled', false)
                $(".spinner-border").addClass('d-none')
                if (data['success'] == true) {
                    $("#error").show().addClass('alert alert-success').html(data['message']);
                    window.location.href = "{{route('Dashboard')}}";
                } else if (data['validate'] == true) {
                    $("#error").show().addClass('alert alert-danger').html(data['message'][0]);
                } else {
                    $("#error").show().addClass('alert alert-danger').html(data['message']);
                }
            }

        })
    }
    </script>
    <!-- === Main Script === -->
</body>

</html>