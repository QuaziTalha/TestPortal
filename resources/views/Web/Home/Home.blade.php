@extends('Components.Layout')
@section('title','Home || Campus Connect')
@section('content')
<script src="{{url('public/js/typed.min.js')}}"></script>
<!--section  -->
<section class="hero-section" data-scrollax-parent="true">
    <div class="bg-tabs-wrap">
        <div class="bg-parallax-wrap" data-scrollax="properties: { translateY: '200px' }">
            <div class="bg bg_tabs" data-bg="{{url('public/images/bg/hero/1.jpg')}}"></div>
            <div class="overlay op7"></div>
        </div>
    </div>
    <div class="container small-container">
        <div class="intro-item fl-wrap">
            <span class="section-separator"></span>
            <div class="bubbles">
                <h1>Find Best <span id="heading"></span></h1>
            </div>
            <h3>Find some of the best tips from around the city from our partners and friends.</h3>
        </div>
        <!-- main-search-input-tabs-->
        <div class="main-search-input-tabs  tabs-act fl-wrap">
            <!--tabs -->
            <div class="tabs-container fl-wrap  ">
                <!--tab -->
                <div class="tab">
                    <div id="tab-inpt1" class="tab-content first-tab">
                        <div class="main-search-input-wrap fl-wrap">
                            <form method="GET" action="{{url('SchoolSearch')}}">
                                <div class="main-search-input fl-wrap">
                                    <div class="col-lg-4">
                                        <div class="category-search">
                                            <div class="custome-user-search">
                                                <div class="custome-user-name mb-1">
                                                    <label class="m-7"><i
                                                            class="fal fa-keyboard text-primary mr-3"></i></label>
                                                    Category Search
                                                    <label class="float-right"><i
                                                            class="text-primary far fa-angle-down mr-3"></i></label>
                                                </div>
                                                <ul class="d-block no-list-style p-30 px-20">
                                                    <li><input type="checkbox" class="school-medium"
                                                            name="school-medium[]" value="English">
                                                        <label>English</label>
                                                    </li>
                                                    <li><input type="checkbox" class="school-medium"
                                                            name="school-medium[]" value="Urdu">
                                                        <label>Urdu</label>
                                                    </li>
                                                    <li><input type="checkbox" class="school-medium"
                                                            name="school-medium[]" value="Marathi">
                                                        <label>Marathi</label>
                                                    </li>
                                                    <li><input type="checkbox" class="school-medium"
                                                            name="school-medium[]" value="Semi English">
                                                        <label>Semi English</label>
                                                    </li>
                                                    <div class="divider"></div>
                                                    <li><input type="checkbox" class="school-type" name="school-type[]"
                                                            value="State Board">
                                                        <label>State Board</label>
                                                    </li>
                                                    <li><input type="checkbox" class="school-type" name="school-type[]"
                                                            value="CBSC">
                                                        <label>CBSC</label>
                                                    </li>
                                                    <li><input type="checkbox" class="school-type" name="school-type[]"
                                                            value="ICSE">
                                                        <label>ICSE</label>
                                                    </li>
                                                    <li><input type="checkbox" class="school-type" name="school-type[]"
                                                            value="IB">
                                                        <label>IB</label>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="main-search-input-item">
                                            <label><i class="fal fa-keyboard"></i></label>
                                            <input type="text" placeholder="What are you looking for?"
                                                id="school_search_key" name="school_search_key" />
                                        </div>
                                    </div>
                                    <button type="submit" class="main-search-button color2-bg">Search <i
                                            class="far fa-search"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!--tab end-->
            </div>
            <!--tabs end-->
        </div>
    </div>
    <div class="header-sec-link">
        <a href="#sec1" class="custom-scroll-link"><i class="fal fa-angle-double-down"></i></a>
    </div>
</section>
<!--section end-->
<!--section  -->
<section>
    <div class="container big-container">
        <div class="section-title">
            <h2><span>Most Popular Schools</span></h2>
            <div class="section-subtitle">Best Schools</div>
            <span class="section-separator"></span>
            <!-- <p>Proin dapibus nisl ornare diam varius tempus. Aenean a quam luctus, finibus tellus ut,
                convallis eros sollicitudin turpis.</p> -->
        </div>
        <div class="listing-filters gallery-filters fl-wrap">
            <a href="#" class="gallery-filter  gallery-filter-active" data-filter="*">All Categories</a>
            <a href="#" class="gallery-filter" data-filter=".CBSE">CBSE </a>
            <a href="#" class="gallery-filter" data-filter=".CBIC">CBIC</a>
            <a href="#" class="gallery-filter" data-filter=".SSC">SSC</a>
            <a href="#" class="gallery-filter" data-filter=".HSC">HSC</a>
        </div>
        <div class="grid-item-holder gallery-items fl-wrap">
            @if(!empty($schools))
            @foreach($schools as $row)
            <!--  gallery-item-->
            @include('Components.Partials.SchoolCard',['data' => $row])
            <!-- gallery-item  end-->
            @endforeach
            @else
            @endif
        </div>
        <a href="{{url('AllSchoolList')}}" class="btn  dec_btn  color2-bg">Check Out All School<i
                class="fal fa-arrow-alt-right"></i></a>
    </div>
</section>
<!--section end-->
<!--section  -->
<section class="gradient-bg hidden-section" data-scrollax-parent="true">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="colomn-text  pad-top-column-text fl-wrap">
                    <div class="colomn-text-title">
                        <h3>Our App Available Now</h3>
                        <p>In ut odio libero, at vulputate urna. Nulla tristique mi a massa convallis
                            cursus. Nulla eu mi magna. Etiam suscipit commodo gravida. Lorem ipsum dolor
                            sit amet, conse ctetuer adipiscing elit.</p>
                        <a href="#" class=" down-btn color3-bg"><i class="fab fa-apple"></i> Apple Store
                        </a>
                        <a href="#" class=" down-btn color3-bg"><i class="fab fa-android"></i> Google
                            Play </a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="collage-image">
                    <img src="{{url('public/images/api.png')}}" class="main-collage-image" alt="">
                    <div class="images-collage-title color2-bg icdec"> <img
                            src="{{url('public/images/cc_white_logo.png')}}" alt=""></div>
                    <div class="images-collage_icon green-bg" style="right:-20px; top:120px;"><i
                            class="fal fa-thumbs-up"></i></div>
                    <div class="collage-image-min cim_1"><img src="{{url('public/images/api/1.png')}}" alt=""></div>
                    <div class="collage-image-min cim_2"><img src="{{url('public/images/api/2.png')}}" alt=""></div>
                    <div class="collage-image-btn green-bg">Find Now</div>
                    <div class="collage-image-input">Search <i class="fa fa-search"></i></div>
                </div>
            </div>
        </div>
    </div>
    <div class="gradient-bg-figure" style="right:-30px;top:10px;"></div>
    <div class="gradient-bg-figure" style="left:-20px;bottom:30px;"></div>
    <div class="circle-wrap" style="left:270px;top:120px;" data-scrollax="properties: { translateY: '-200px' }">
        <div class="circle_bg-bal circle_bg-bal_small"></div>
    </div>
    <div class="circle-wrap" style="right:420px;bottom:-70px;" data-scrollax="properties: { translateY: '150px' }">
        <div class="circle_bg-bal circle_bg-bal_big"></div>
    </div>
    <div class="circle-wrap" style="left:420px;top:-70px;" data-scrollax="properties: { translateY: '100px' }">
        <div class="circle_bg-bal circle_bg-bal_big"></div>
    </div>
    <div class="circle-wrap" style="left:40%;bottom:-70px;">
        <div class="circle_bg-bal circle_bg-bal_middle"></div>
    </div>
    <div class="circle-wrap" style="right:40%;top:-10px;">
        <div class="circle_bg-bal circle_bg-bal_versmall" data-scrollax="properties: { translateY: '-350px' }"></div>
    </div>
    <div class="circle-wrap" style="right:55%;top:90px;">
        <div class="circle_bg-bal circle_bg-bal_versmall" data-scrollax="properties: { translateY: '-350px' }"></div>
    </div>
</section>
<!--section end-->
<!--section  -->
<section class="slw-sec d-none" id="sec1">
    <div class="section-title">
        <h2> New Schools</h2>
        <div class="section-subtitle">The New Schools</div>
        <span class="section-separator"></span>
        <!-- <p>Mauris ac maximus neque. Nam in mauris quis libero sodales eleifend. Morbi varius, nulla sit
            amet rutrum elementum.</p> -->
    </div>
    <div class="listing-slider-wrap fl-wrap">
        <div class="listing-slider fl-wrap">
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    <!--  swiper-slide  -->
                    @if(!empty($schools))
                    @foreach($schools as $row)
                    <!--  gallery-item-->
                    @include('Components.Partials.SliderCard',['data' => $row])
                    <!-- gallery-item  end-->
                    @endforeach
                    @else
                    @endif
                    <!--  swiper-slide end  -->
                </div>
            </div>
            <div class="listing-carousel-button listing-carousel-button-next2"><i class="fas fa-caret-right"></i></div>
            <div class="listing-carousel-button listing-carousel-button-prev2"><i class="fas fa-caret-left"></i></div>
        </div>
        <div class="tc-pagination_wrap">
            <div class="tc-pagination2"></div>
        </div>
    </div>
</section>
<!--section end-->


<!-- === Merchendise ===  -->
<!--section  -->
<section class="p-30">
    <div class="container big-container">
        <div class="section-title">
            <h2><span>Our Merchendise</span></h2>
            <div class="section-subtitle">Merchendise</div>
            <span class="section-separator"></span>
            <!-- <p>Proin dapibus nisl ornare diam varius tempus. Aenean a quam luctus, finibus tellus ut,
                convallis eros sollicitudin turpis.</p> -->
        </div>
        <div class="grid-item-holder gallery-items fl-wrap">
            @foreach ($merchandise as $merchandise)
                 <!--  gallery-item-->
            <div class="gallery-item restaurant events">
                <!-- listing-item  -->
                <div class="listing-item">
                    <article class="geodir-category-listing fl-wrap">
                        <div class="geodir-category-img">
                            <a href="javascript:void(0)" class="geodir-category-img-wrap fl-wrap">
                                <div style="width: 100%; height: 300px; background-image: url('{{url('public/portal_images/merchandise_images/'. $merchandise->merchandise_img)}}'); background-position: center;
                                    "></div>
                            </a>
                        </div>
                        <div class="geodir-category-content fl-wrap title-sin_item">
                            <div class="geodir-category-content-title fl-wrap">
                                <div class="geodir-category-content-title-item">
                                    <h3 class="title-sin_map"><a href="javascript:void(0)">{{$merchandise->merchandise_name}}</a></h3>
                                </div>
                            </div>
                            <div class="geodir-category-text fl-wrap">
                                <p class="small-text">{{Str::limit($merchandise->merchandise_desc,40,'..')  ?? ''}}</p>
                            </div>
                        </div>
                    </article>
                </div>
                <!-- listing-item end -->
            </div>
            <!-- gallery-item  end-->
            @endforeach

        </div>
    </div>
</section>
<!--section end-->
<!-- === Merchendise ===  -->


<!-- === Merchendise ===  -->
<!--section  -->
<section class="p-30">
    <div class="container">
        <div class="section-title">
            <h2><span>Our Blog</span></h2>
            <div class="section-subtitle">Blog</div>
            <span class="section-separator"></span>
            <!-- <p>Proin dapibus nisl ornare diam varius tempus. Aenean a quam luctus, finibus tellus ut,
                convallis eros sollicitudin turpis.</p> -->
        </div>
        <div class="grid-item-holder gallery-items fl-wrap">
            <!--  swiper-slide  -->
            @if(!empty($blogs))
            @foreach($blogs as $blog)
            <!--  gallery-item-->
            <div class="gallery-item restaurant events">
                @include('Components.Partials.BlogCard',['data' => $blog])
            </div>
            <!-- gallery-item  end-->
            @endforeach
            @else
            <h3>There is no blog uploaded.</h3>
            @endif
            <!--  swiper-slide end  -->
        </div>
        <a href="{{url('AllBlogs')}}" class="btn  dec_btn  color2-bg">Check Out All Blogs<i
                class="fal fa-arrow-alt-right"></i></a>
    </div>
</section>
<!--section end-->
<!-- === Merchendise ===  -->


<script>
ityped.init(document.querySelector("#heading"), {
    showCursor: false,
    strings: ['School In Aurangabad!', 'Hostel In Aurangabad!']
})


// --- === Search School  Function === --- \\
// $('#school_search_key').keypress(function(e) {
//     var key = e.which;
//     if (key == 13) // the enter key code
//     {
//         SeachSchool();
//     }
// });

// function SeachSchool() {
//     var selected = [];
//     $('input:checked').each(function() {
//         selected.push($(this).val());
//     });

//     if ($("#school_search_key").val() == "") {
//         toastr.remove();
//         toastr.options.positionClass = "toast-bottom-center";
//         toastr.error('', 'The search fiels should not be null.');
//         return false;
//     } else {
//         // if (selected.length > 0) {

//         // }
//         var slug = $("#school_search_key").val().replace(' ', '-');
//         window.location = "{{url('SchoolSearch')}}/" + slug;
//     }
// }
// --- === Search School  Function === --- \\
</script>
@endsection
