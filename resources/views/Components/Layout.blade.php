<!DOCTYPE HTML>
<html lang="en">

<head>
    <!--=============== basic  ===============-->
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="robots" content="index, follow" />
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <!--=============== css  ===============-->
    <link type="text/css" rel="stylesheet" href="{{url('public/css/reset.css')}}">
    <link type="text/css" rel="stylesheet" href="{{url('public/css/plugins.css')}}">
    <link type="text/css" rel="stylesheet" href="{{url('public/css/toastr.min.css')}}">
    <link type="text/css" rel="stylesheet" href="{{url('public/css/style.css')}}">
    <link type="text/css" rel="stylesheet" href="{{url('public/css/color.css')}}">
    <link type="text/css" rel="stylesheet" href="{{url('public/css/cropper.css')}}">
    <!--=============== favicons ===============-->
    <link rel="shortcut icon" href="{{url('public/images/favicon.ico')}}">

    <!--=============== Jquery ===============-->
    <script src="{{url('public/js/jquery.min.js')}}"></script>
    <!--=============== Jquery ===============-->

    <script>
    // --- Toaster Option --- \\
    $(document).ready(function() {
        toastr.options = {
            "closeButton": false,
            "debug": false,
            "newestOnTop": false,
            "progressBar": true,
            "positionClass": "toast-top-left",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
    })
    // --- Toaster Option --- \\
    </script>
</head>

<body>
    <!--loader-->
    <div class="loader-wrap">
        <div class="loader-inner">
            <div class="loader-inner-cirle"></div>
        </div>
    </div>
    <!--loader end-->

    <!-- main start  -->
    <div id="main">
        <!-- header -->
        <header class="main-header">
            <!-- logo-->
            <a href="{{url('/')}}" class="logo-holder"><img src="{{url('public/images/cc_color_logo.png')}}" alt="" class="custom-logo-design"></a>
            <!-- logo end-->
            <!-- header opt -->
            @if(!Session::has('token'))
            <a href="{{url('SchoolRegistration')}}" class="add-list color-bg">School Registeration / Login<span><i
                        class="fal fa-layer-plus"></i></span></a>
            @else
            <div class="header-user-menu">
                <div class="header-user-name">
                    <i class="fal fa-user"></i> {{Str::limit(Session::get('school_name'),13,'...')}}
                </div>
                <ul>
                    <li><a href="{{url('Schools/SchoolProfile')}}/{{Session::get('token')}}"> Edit profile</a></li>
                    <li><a href="{{url ('UserLogout')}}">Log Out</a></li>
                </ul>
            </div>
            @endif

            @if(!Session::has('token'))
            @if(!request()->is('SchoolRegistration'))
            @if(!Session::has('user_id'))
            <div class="userslogin show-reg-form modal-open avatar-img" data-srcav="{{url('public/images/avatar/3.jpg')}}"><i class="fal fa-user"></i>Sign In</div>
            @else
            <div class="header-user-menu">
                <div class="header-user-name">
                    <i class="fal fa-user"></i> {{Str::limit(Session::get('user_name'),13,'...')}}
                </div>
                <ul>
                    <!-- <li><a href="dashboard-myprofile.html"> Edit profile</a></li> -->
                    <li><a href="{{url ('UserLogout')}}">Log Out</a></li>
                </ul>
            </div>
            @endif
            @endif
            @endif
            <div class="nav-button-wrap color-bg">
                <div class="nav-button">
                    <span></span><span></span><span></span>
                </div>
            </div>
            <!-- nav-button-wrap end-->
            <!--  navigation -->
            <div class="nav-holder main-menu">
                <nav>
                    <ul class="no-list-style">
                        <li><a href="{{url('/')}}">Home </a></li>
                        <li><a href="{{url('/AboutUs')}}">About</a></li>
                        <li><a href="{{url('AllSchoolList')}}">Schools </a></li>
                        <li><a href="{{url('AllMerchandise')}}">Merchandisers</a></li>
                        <li><a href="{{url('AllScholarship')}}">Scholarship</a></li>
                        <li><a href="{{url('AllBlogs')}}">Blogs</a></li>
                        <li><a href="javascript:void(0)">Contact</a></li>
                  
                        
                        @if(!Session::has('token'))
                        <li class="dropdownsignin"><a href="{{url('SchoolRegistration')}}" class="color-bg">School Registeration / Login<span><i class="fal fa-layer-plus"></i></span></a></li>
                        @else
                                <i class="fal fa-user"></i> {{Str::limit(Session::get('school_name'),13,'...')}}
                           
                            <ul>
                                <li class="dropdownsignin"><a href="{{url('Schools/SchoolProfile')}}/{{Session::get('token')}}"> Edit profile</a></li>
                                <li class="dropdownsignin"><a href="{{url ('UserLogout')}}">Log Out</a></li>
                            </ul>
                       
                        @endif
            
                        @if(!Session::has('token'))
                        @if(!request()->is('SchoolRegistration'))
                        @if(!Session::has('user_id'))
                       {{--  <li class="dropdownsignin">
                        <div class="show-reg-form modal-open avatar-img" data-srcav="{{url('public/images/avatar/3.jpg')}}"><i class="fal fa-user"></i>Sign In</div></li> --}}

                  {{--       <li class="dropdownsignin"><div class="modal-open show-reg-form avatar-img" style="display: unset" data-srcav="{{url('public/images/avatar/3.jpg')}}"><i class="fal fa-user"></i>Sign In</div></li> --}}

                        <li class="dropdownsignin modal-open" data-srcav="{{url('public/images/avatar/3.jpg')}}"><i class="fal fa-user"></i>Sign In</li>

                        @else
                    <li class="dropdownsignin">
                        <div class="header-user-menu">
                            <div class="header-user-name">
                                <i class="fal fa-user"></i> {{Str::limit(Session::get('user_name'),13,'...')}}
                            </div>
                            <ul>
                                <!-- <li><a href="dashboard-myprofile.html"> Edit profile</a></li> -->
                                <li><a href="{{url ('UserLogout')}}">Log Out</a></li>
                            </ul>
                        </div>
                    </li>
                        @endif
                        @endif
                        @endif
                       
                    </ul>
                </nav>
            </div>
            <!-- navigation  end -->

            <!-- wishlist-wrap-->
            <div class="header-modal novis_wishlist">
                <!-- header-modal-container-->
                <div class="header-modal-container scrollbar-inner fl-wrap" data-simplebar>
                    <!--widget-posts-->
                    <div class="widget-posts  fl-wrap">
                        <ul class="no-list-style">
                            <li>
                                <div class="widget-posts-img"><a href="listing-single.html"><img
                                            src="{{url('public/images/gallery/thumbnail/1.png')}}" alt=""></a>
                                </div>
                                <div class="widget-posts-descr">
                                    <h4><a href="listing-single.html">Iconic Cafe</a></h4>
                                    <div class="geodir-category-location fl-wrap"><a href="#"><i
                                                class="fas fa-map-marker-alt"></i> 40 Journal Square Plaza, NJ, USA</a>
                                    </div>
                                    <div class="widget-posts-descr-link"><a href="listing.html">Restaurants </a> <a
                                            href="listing.html">Cafe</a></div>
                                    <div class="widget-posts-descr-score">4.1</div>
                                    <div class="clear-wishlist"><i class="fal fa-times-circle"></i></div>
                                </div>
                            </li>
                            <li>
                                <div class="widget-posts-img"><a href="listing-single.html"><img
                                            src="{{url('public/images/gallery/thumbnail/2.png')}}" alt=""></a>
                                </div>
                                <div class="widget-posts-descr">
                                    <h4><a href="listing-single.html">MontePlaza Hotel</a></h4>
                                    <div class="geodir-category-location fl-wrap"><a href="#"><i
                                                class="fas fa-map-marker-alt"></i> 70 Bright St New York, USA </a></div>
                                    <div class="widget-posts-descr-link"><a href="listing.html">Hotels </a> </div>
                                    <div class="widget-posts-descr-score">5.0</div>
                                    <div class="clear-wishlist"><i class="fal fa-times-circle"></i></div>
                                </div>
                            </li>
                            <li>
                                <div class="widget-posts-img"><a href="listing-single.html"><img
                                            src="{{url('public/images/gallery/thumbnail/3.png')}}" alt=""></a>
                                </div>
                                <div class="widget-posts-descr">
                                    <h4><a href="listing-single.html">Rocko Band in Marquee Club</a></h4>
                                    <div class="geodir-category-location fl-wrap"><a href="#"><i
                                                class="fas fa-map-marker-alt"></i>75 Prince St, NY, USA</a></div>
                                    <div class="widget-posts-descr-link"><a href="listing.html">Events</a> </div>
                                    <div class="widget-posts-descr-score">4.2</div>
                                    <div class="clear-wishlist"><i class="fal fa-times-circle"></i></div>
                                </div>
                            </li>
                            <li>
                                <div class="widget-posts-img"><a href="listing-single.html"><img
                                            src="{{url('public/images/gallery/thumbnail/4.png')}}" alt=""></a>
                                </div>
                                <div class="widget-posts-descr">
                                    <h4><a href="listing-single.html">Premium Fitness Gym</a></h4>
                                    <div class="geodir-category-location fl-wrap"><a href="#"><i
                                                class="fas fa-map-marker-alt"></i> W 85th St, New York, USA</a></div>
                                    <div class="widget-posts-descr-link"><a href="listing.html">Fitness</a> <a
                                            href="listing.html">Gym</a> </div>
                                    <div class="widget-posts-descr-score">5.0</div>
                                    <div class="clear-wishlist"><i class="fal fa-times-circle"></i></div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <!-- widget-posts end-->
                </div>
                <!-- header-modal-container end-->
                <div class="header-modal-top fl-wrap">
                    <h4>Your Wishlist : <span><strong></strong> Locations</span></h4>
                    <div class="close-header-modal"><i class="far fa-times"></i></div>
                </div>
            </div>
            <!--wishlist-wrap end -->
        </header>
        <!-- header end-->
        <!-- wrapper-->
        <div id="wrapper">
            <!-- content-->
            <div class="content">
                <!--section  -->
                @yield('content')
                <!--section end  -->
            </div>
            <!--content end-->
        </div>
        <!-- wrapper end-->
        <!--footer -->
        <footer class="main-footer fl-wrap">
            <div class="footer-inner  fl-wrap">
                <div class="container">
                    <div class="row">
                        <!-- footer-widget-->
                        <div class="col-md-4">
                            <div class="footer-widget fl-wrap">
                                <div class="footer-logo"><a href="index.html"><img
                                            src="{{url('public/images/cc_white_logo.png')}}" alt=""></a>
                                </div>
                                <div class="footer-contacts-widget fl-wrap">
                                    <p>CAMPUS CONNECTS is the go-to destination for Indian students to find a great
                                        education. Connects you with platform to make school search and selection easy
                                        based on your preference as Preschools. </p>
                                    <ul class="footer-contacts fl-wrap no-list-style">
                                        <li><span><i class="fal fa-envelope"></i> Mail :</span><a href="#"
                                                target="_blank">admin@bilimtechnologies.com</a></li>
                                        <li> <span><i class="fal fa-map-marker"></i> Adress :</span><a href="#"
                                                target="_blank">Aurangabad Maharashtra - 431001 India</a></li>
                                        <li><span><i class="fal fa-phone"></i> Phone :</span><a href="#">+91 8055459200,
                                                +91 9028536467</a></li>
                                    </ul>
                                    <div class="footer-social">
                                        <span>Find us on: </span>
                                        <ul class="no-list-style">
                                            <li><a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                            <li><a href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                            <li><a href="#" target="_blank"><i class="fab fa-instagram"></i></a></li>
                                            <li><a href="#" target="_blank"><i class="fab fa-vk"></i></a></li>
                                            <li><a href="#" target="_blank"><i class="fab fa-whatsapp"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- footer-widget end-->
                        <!-- footer-widget-->
                        <div class="col-md-4">
                            <div class="footer-widget fl-wrap">
                                <h3>Our Last Blog</h3>
                                <div class="footer-widget-posts fl-wrap">
                                    <ul class="no-list-style">
                                        @if(!empty($blogs))
                                        @for ($i = 0; $i < 3; $i++)
                                        <li class="clearfix">
                                            <a href="{{url('BlogDetail')}}/{{$blogs[$i]->blog_id ?? ''}}" class="widget-posts-img"><img
                                                    src="{{url('public/portal_images/blog_images/'.$blogs[$i]->blog_image)}}" class="respimg" alt=""></a>
                                            <div class="widget-posts-descr">
                                                <a href="{{url('BlogDetail')}}/{{$blogs[$i]->blog_id ?? ''}}" title="">{{$blogs[$i]->blog_title}}</a>
                                                <span class="widget-posts-date"><i class="fal fa-calendar"></i> 21 {{$blogs[$i]->blog_date}}</span>
                                            </div>
                                        </li>
                                    @endfor
                                    @else
                                    <h3>There is no blog uploaded.</h3>
                                    @endif
                                    {{--     <li class="clearfix">
                                            <a href="#" class="widget-posts-img"><img
                                                    src="{{url('public/images/all/4.jpg')}}" class="respimg" alt=""></a>
                                            <div class="widget-posts-descr">
                                                <a href="#" title="">Vivamus dapibus rutrum</a>
                                                <span class="widget-posts-date"><i class="fal fa-calendar"></i> 21 Mar
                                                    09.05 </span>
                                            </div>
                                        </li> --}}
                                      {{--   <li class="clearfix">
                                            <a href="#" class="widget-posts-img"><img
                                                    src="{{url('public/images/all/2.jpg')}}" class="respimg" alt=""></a>
                                            <div class="widget-posts-descr">
                                                <a href="#" title=""> In hac habitasse platea</a>
                                                <span class="widget-posts-date"><i class="fal fa-calendar"></i> 7 Mar
                                                    18.21 </span>
                                            </div>
                                        </li>
                                        <li class="clearfix">
                                            <a href="#" class="widget-posts-img"><img
                                                    src="{{url('public/images/all/7.jpg')}}" class="respimg" alt=""></a>
                                            <div class="widget-posts-descr">
                                                <a href="#" title="">Tortor tempor in porta</a>
                                                <span class="widget-posts-date"><i class="fal fa-calendar"></i> 7 Mar
                                                    16.42 </span>
                                            </div>
                                        </li> --}}
                                    </ul>
                                    <a href="{{url('AllBlogs')}}" class="footer-link">Read all <i
                                            class="fal fa-long-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <!-- footer-widget end-->
                        <!-- footer-widget  -->
                        <!-- <div class="col-md-4">
                            <div class="footer-widget fl-wrap ">
                                <h3>Our Twitter</h3>
                                <div class="twitter-holder fl-wrap scrollbar-inner2" data-simplebar
                                    data-simplebar-auto-hide="false">
                                    <div id="footer-twiit"></div>
                                </div>
                                <a href="#" class="footer-link twitter-link" target="_blank">Follow us <i
                                        class="fal fa-long-arrow-right"></i></a>
                            </div>
                        </div> -->
                        <!-- footer-widget end-->
                    </div>
                </div>
                <!-- footer bg-->
                <div class="footer-bg" data-ran="4"></div>
                <div class="footer-wave">
                    <svg viewbox="0 0 100 25">
                        <path fill="#fff" d="M0 30 V12 Q30 17 55 12 T100 11 V30z" />
                    </svg>
                </div>
                <!-- footer bg  end-->
            </div>
            <!--footer-inner end -->
            <!--sub-footer-->
            <div class="sub-footer  fl-wrap">
                <div class="container">
                    <div class="copyright text-center"> &#169; campusconnect 2022 . All rights reserved.</div>
                    <div class="lang-wrap v-none">
                        <div class="show-lang"><span><i class="fal fa-globe-europe"></i><strong>En</strong></span><i
                                class="fa fa-caret-down arrlan"></i></div>
                        <ul class="lang-tooltip lang-action no-list-style">
                            <li><a href="#" class="current-lan" data-lantext="En">English</a></li>
                            <li><a href="#" data-lantext="Fr">Franais</a></li>
                            <li><a href="#" data-lantext="Es">Espaol</a></li>
                            <li><a href="#" data-lantext="De">Deutsch</a></li>
                        </ul>
                    </div>
                    <!-- <div class="subfooter-nav">
                        <ul class="no-list-style">
                            <li><a href="#">Terms of use</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Blog</a></li>
                        </ul>
                    </div> -->
                </div>
            </div>
            <!--sub-footer end -->
        </footer>
        <!--footer end -->
        <!--map-modal -->
        <div class="map-modal-wrap">
            <div class="map-modal-wrap-overlay"></div>
            <div class="map-modal-item">
                <div class="map-modal-container fl-wrap">
                    <div class="map-modal fl-wrap">
                        <div id="singleMap" data-latitude="40.7" data-longitude="-73.1"></div>
                    </div>
                    <h3><span>Location for : </span><a href="#">Listing Title</a></h3>
                    <div class="map-modal-close"><i class="fal fa-times"></i></div>
                </div>
            </div>
        </div>
        <!--map-modal end -->
        <!--register form -->
        <div class="main-register-wrap modal">
            <div class="reg-overlay"></div>
            <div class="main-register-holder tabs-act">
                <div class="main-register fl-wrap  modal_main">
                    <div class="main-register_title">Welcome to
                        <span><strong>Campus</strong>Connect<strong>.</strong></span>
                    </div>
                    <div class="close-reg"><i class="fal fa-times"></i></div>
                    <ul class="tabs-menu fl-wrap no-list-style">
                        <li class="current"><a href="#tab-1"><i class="fal fa-sign-in-alt"></i> Login</a></li>
                        <li><a href="#tab-2"><i class="fal fa-user-plus"></i> Register</a></li>
                    </ul>
                    <!--tabs -->
                    <div class="tabs-container">
                        <div class="tab">
                            <!--tab -->
                            <div id="tab-1" class="tab-content first-tab">
                                <div class="custom-form">
                                    <form id="UserLogin" class="main-register-form">
                                        @csrf
                                        <label>Mobile Number <span>*</span></label>
                                        <input type="text" name="user_mobile" id="user_mobile" class="login_validation"
                                            placeholder="Mobile Number">
                                        <label>Password <span>*</span></label>
                                        <input type="password" name="user_password" id="user_password"
                                            class="login_validation" placeholder="Password">
                                        <div class="clearfix"></div>
                                    </form>
                                    <div class="text-center">
                                        <div id="login_error"> </div>
                                    </div>
                                    <button type="button" class="btn-load btn float-btn color2-bg"
                                        onclick="UserLogin()">
                                        Login <i class="fas fa-caret-right"></i></button>
                                </div>
                            </div>
                            <!--tab end -->
                            <!--tab -->
                            <div class="tab">
                                <div id="tab-2" class="tab-content">
                                    <div class="custom-form">
                                        <form id="UserRegistration" class="main-register-form">
                                            @csrf
                                            <label>Full Name <span>*</span> </label>
                                            <input type="text" name="user_name" id="user_name" class=""
                                                placeholder="Full Name">
                                            <label>Email Address <span>*</span></label>
                                            <input type="email" name="user_email" id="user_email" class=""
                                                placeholder="Eamil Address">
                                            <label>Mobile Number <span>*</span></label>
                                            <input type="text" name="user_mobile" id="user_mobile" class=""
                                                placeholder="Mobile Number">
                                            <label>Password <span>*</span></label>
                                            <input type="password" name="user_password" id="user_password" class=""
                                                placeholder="Password">
                                            <div class="clearfix"></div>
                                        </form>
                                        <div class="text-center">
                                            <div id="error"> </div>
                                        </div>
                                        <button type="button" class="btn-load btn float-btn color2-bg"
                                            onclick="UserRegister()"> Register <i
                                                class="fas fa-caret-right"></i></button>
                                    </div>
                                </div>
                            </div>
                            <!--tab end -->
                        </div>
                        <!--tabs end -->
                        <div class="wave-bg">
                            <div class='wave -one'></div>
                            <div class='wave -two'></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--register form end -->
        <a class="to-top"><i class="fas fa-caret-up"></i></a>
    </div>
    <!-- Main end -->

    <!--=============== scripts  ===============-->
    <script src="{{url('public/js/plugins.js')}}"></script>
    <script src="{{url('public/js/cropper.js')}}"></script>
    <script src="{{url('public/js/toastr.min.js')}}"></script>
    <script src="{{url('public/js/scripts.js')}}"></script>
    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBuYqeiJZxlcsxXcarhlequGReqh4LYKrQ&amp;libraries=places&amp;callback=initAutocomplete">
    </script>
    <!-- <script
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBuYqeiJZxlcsxXcarhlequGReqh4LYKrQ&libraries=places"
    async></script> -->
    <script src="{{url('public/js/map-single.js')}}"></script>


    <script>
    function UserRegister() {
        // var fields = $("input[class*='required']");
        // for (let i = 0; i <= fields.length; i++) {
        //     if ($(fields[i]).val() === '') {
        //         var currentElement = $(fields[i]).attr('id');
        //         var value = currentElement.replaceAll('_', ' ');
        //         $("#error").show().addClass('alert alert-danger').html('The ' + value + ' field is required.');
        //         return false;
        //     } else {
        //         $("#error").hide().removeClass().html('');
        //     }
        // }

        $.ajax({
            type: "POST",
            url: "{{url('UserRegister')}}",
            data: $("#UserRegistration").serialize(),
            beforeSend: function() {
                $(".btn-load").prop('disabled', true)
            },
            success: function(data) {
                $(".btn-load").prop('disabled', false)
                if (data['success'] == true) {
                    $("#error").show().addClass('alert alert-success').html(data['message']);
                    location.reload();
                } else if (data['validate'] == true) {
                    $("#error").show().addClass('alert alert-danger').html(data['message'][0]);
                } else {
                    $("#error").show().addClass('alert alert-danger').html(data['message']);
                }
            }
        })
    }


    function UserLogin() {
        // var fields = $("input[class*='login_validation']");
        // for (let i = 0; i <= fields.length; i++) {
        //     if ($(fields[i]).val() === '') {
        //         var currentElement = $(fields[i]).attr('name');
        //         var value = currentElement.replaceAll('_', ' ');
        //         $("#login_error").show().addClass('alert alert-danger').html('The ' + value + ' field is required.');
        //         return false;
        //     } else {
        //         $("#login_error").hide().removeClass().html('');
        //     }
        // }

        $.ajax({
            type: "POST",
            url: "{{url('UserLogin')}}",
            data: $("#UserLogin").serialize(),
            beforeSend: function() {
                $(".btn-load").prop('disabled', true)
            },
            success: function(data) {
                $(".btn-load").prop('disabled', false)
                if (data['success'] == true) {
                    $("#login_error").show().addClass('alert alert-success').html(data['message']);
                    location.reload();
                } else if (data['validate'] == true) {
                    $("#login_error").show().addClass('alert alert-danger').html(data['message'][0]);
                } else {
                    $("#login_error").show().addClass('alert alert-danger').html(data['message']);
                }
            }
        })
    }
    </script>
</body>

</html>
