
@extends('Components.Layout')
@section('title','About Us || Campus Connect')
@section('content')
  <!-- content-->
  <div class="content">

    <!--  section  -->
    <section class="parallax-section single-par" data-scrollax-parent="true">
        <div class="bg par-elem "  data-bg="{{url('public/images/bg/30.jpg')}}" data-scrollax="properties: { translateY: '30%' }"></div>
        <div class="overlay op7"></div>
        <div class="container">
            <div class="section-title center-align big-title">
                <h2><span>About Campus Connects</span></h2>
                <span class="section-separator"></span>
                <div class="breadcrumbs fl-wrap"><a href="{{url('/')}}">Home</a><span>About us</span></div>
            </div>
        </div>
        <div class="header-sec-link">
            <a href="#sec1" class="custom-scroll-link"><i class="fal fa-angle-double-down"></i></a> 
        </div>
    </section>
    <!--  section  end-->
    <section   id="sec1" data-scrollax-parent="true">
        <div class="container">
            <div class="section-title">
                <h2>What is Campus Connect</h2>
                <div class="section-subtitle">What is Campus Connect</div>
                <span class="section-separator"></span>
            </div>
            <!--about-wrap -->
            <div class="about-wrap">
                <div class="row">
                    <div class="col-md-6">
                        <div class="list-single-main-media fl-wrap" style="box-shadow: 0 9px 26px rgba(58, 87, 135, 0.2);">
                            <img src="{{url('public/images/all/55.jpg')}}" class="respimg" alt="">
                         {{--    <a href="https://vimeo.com/70851162" class="promo-link   image-popup"><i class="fal fa-video"></i><span>Our Story</span></a> --}}
                        </div>
                    </div>
                    <div class="col-md-6" style="margin-top: 35px;">
                        <div class="ab_text">
                            <div class="ab_text-title fl-wrap">
                                <h3>About<span>Campus Connect</span></h3>
                                <span class="section-separator fl-sec-sep"></span>
                            </div>
                            <p>CAMPUS CONNECTS is the go-to destination for Indian students to find a great education. Connects you with platform to make school search and selection easy based on your preference as Preschools, Play schools, Day Care, Primary Schools, High Schools, CBSE Schools, ICSE Schools, State Board Schools, International Baccalaureate Schools(IB), IGCSE Schools, boarding schools & Residential schools listed to help you find the best one for your child</p>
                            <p>
                                CAMPUS CONNECTS features school profiles, Blogs, events and scholarships to help support Indian students across their educational journey. Schools and Parents can create a custom profile to get matched automatically with each other, Explore with Verified and reliable information covering Fees, Reviews, List, Results, Facilities, Admission Information, Admission Dates & Admission Forms, Distance, Location, Videos, Photographs & Academic Results of schools.
                            </p>
                   {{--          <a href="#sec3" class="btn color2-bg float-btn custom-scroll-link">Our Team <i class="fal fa-users"></i></a> --}}
                        </div>
                    </div>
                    <div class="col-md-12" style="margin-top: 35px;">
                        <div class="ab_text">
                            
                            <p>Being a Parent one of the prime responsibilities is the selection of School for your child. Every parent carries a different perspective for what makes an educational institution count as the “Best School” or “The Top School”. And certainly this depends on a bunch of factors including Curriculum choices, Fee Brackets, Age Criteria, School Infrastructure, Environment, Modern Educational Amenities, Facilities in School & School’s Academic & Extra-Curricular Performance. Campus Connects help the parents to shortlist & select schools matching your criteria. We ensure parents receive the most Verified information filtered across multiple parameters like Admission Timelines, Fees, Reviews, Contact Details, Facilities, Academic Results etc.</p>
                            <p>
                                CAMPUS CONNECTS is a production of the BILIM TECNOLOGIES PRIVATE LIMITED. Based in Maharashtra, the BILIM TECNOLOGIES PRIVATE LIMITED is one of the leading providers of information and software solutions for School, students and educational professionals and other.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- about-wrap end  --> 
            <span class="fw-separator"></span>
          
        </div>
    </section>
    <!--section end-->  
    <!--section  -->  
   
    <!--section end-->  
    <!--section  -->  
{{--     <section class="parallax-section video-section" data-scrollax-parent="true" id="sec2">
        <div class="bg par-elem "  data-bg="{{url('public/images/bg/34.jpg')}}" data-scrollax="properties: { translateY: '30%' }"></div>
        <div class="overlay op7"></div>
        <!--container-->
        <div class="container">
            <div class="video_section-title fl-wrap">
                <h4>Aliquam erat volutpat interdum</h4>
                <h2>Get ready to start your exciting journey. <br> Our agency will lead you through the amazing digital world</h2>
            </div>
            <a href="https://vimeo.com/70851162" class="promo-link big_prom   image-popup"><i class="fal fa-play"></i><span>Promo Video</span></a>
        </div>
    </section> --}}
    <!--section end-->  

    <!--section  -->  

    <!--section end-->  

 

</div>
<!--content end-->
@endsection