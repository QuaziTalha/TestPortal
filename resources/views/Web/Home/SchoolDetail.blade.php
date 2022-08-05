@extends('Components.Layout')
@section('title','Home || Campus Connect')
@section('content')

<!-- === School Detail Section === -->
<section class="listing-hero-section hidden-section" data-scrollax-parent="true" id="sec1">
    <div class="bg-parallax-wrap">
        <div class="bg par-elem "
            data-bg="{{url('/')}}/public/portal_images/school_images/{{$schools->school_image ?? ''}}"
            data-scrollax="properties: { translateY: '30%' }"></div>
        <div class="overlay"></div>
    </div>
    <div class="container">
        <div class="list-single-header-item  fl-wrap">
            <div class="row">
                <div class="col-md-9">
                    <h1>{{$schools->school_name ?? ''}} <span class="verified-badge"><i class="fal fa-check"></i></span>
                    </h1>
                    <div class="geodir-category-location fl-wrap"><a href="#"><i class="fas fa-map-marker-alt"></i>
                            {{$schools->school_address ?? ''}},{{$schools->school_city ?? ''}}
                            {{$schools->school_pin_code ?? ''}}</a> <a href="#"> <i
                                class="fal fa-phone"></i>{{$schools->school_contact_number ?? ''}}</a> <a href="#"><i
                                class="fal fa-envelope"></i> {{$schools->school_email ?? ''}}</a></div>
                </div>
            </div>
        </div>
        <div class="list-single-header_bottom fl-wrap">
            <a class="listing-item-category-wrap" href="#">
                <div class="listing-item-category  red-bg"><i class="fal fa-school"></i></div>
                <span>School</span>
            </a>
            <div class="list-single-author"> <a href="javascript:void(0)"><span class="author_avatar"> <img alt=''
                            src="{{url('/')}}/public/portal_images/school_logo/{{$schools->school_logo ?? ''}}">
                    </span>{{Str::limit($schools->school_name,10,'..')  ?? ''}}</a></div>
        </div>
    </div>
</section>
<!-- scroll-nav-wrapper-->
<div class="scroll-nav-wrapper fl-wrap">
    <div class="container">
        <nav class="scroll-nav scroll-init">
            <ul class="no-list-style">
                <li><a class="act-scrlink" href="#sec1"><i class="fal fa-images"></i> Top</a></li>
                <li><a href="#sec2"><i class="fal fa-info"></i>Details</a></li>
                <li><a href="#sec3"><i class="fal fa-image"></i>Gallery</a></li>
                <li><a href="#sec4"><i class="fal fa-clipboard"></i>Course</a></li>
                <li><a href="#sec5"><i class="fal fa-graduation-cap"></i>Eligibilities</a></li>
            </ul>
        </nav>
    </div>
</div>
<!-- scroll-nav-wrapper end-->
<section class="gray-bg no-top-padding">
    <div class="container">
        <div class="clearfix"></div>
        <div class="row">
            <!-- list-single-main-wrapper-col -->
            <div class="col-md-8">
                <!-- list-single-main-wrapper -->
                <div class="list-single-main-wrapper fl-wrap" id="sec2">
                    <!-- <div class="list-single-main-media fl-wrap">
                        <img src="images/all/48.jpg" class="respimg" alt="">
                        <a href="https://vimeo.com/70851162" class="promo-link   image-popup"><i
                                class="fal fa-video"></i><span>Promo Video</span></a>
                    </div> -->
                    <!-- list-single-main-item -->
                    <div class="list-single-main-item fl-wrap block_box">
                        <div class="list-single-main-item-title">
                            <h3>Description</h3>
                        </div>
                        <div class="list-single-main-item_content fl-wrap">
                            <p>{{$schools->school_about ?? ''}}</p>
                            <a href="{{$schools->school_website ?? ''}}" target="_blank"
                                class="btn color2-bg    float-btn">Visit Website<i class="fal fa-chevron-right"></i></a>
                        </div>
                    </div>
                    <!-- list-single-main-item end -->
                    <!-- list-single-main-item -->
                    <div class="list-single-main-item fl-wrap block_box h-215px">
                        <div class="list-single-main-item-title">
                            <h3>School Features</h3>
                        </div>
                        <div class="list-single-main-item_content fl-wrap">
                            <div class="listing-features fl-wrap">
                                <ul class="no-list-style">
                                    @if(count($schools->facility)>0)
                                    @foreach($schools->facility as $facility)
                                    <li>
                                        <a href="#">
                                            <img src="{{url('/')}}/public/portal_images/school_facility/{{$facility->facility_picture ?? ''}}"
                                                alt="{{$facility->facility_name ?? ''}}">
                                            {{$facility->facility_name ?? ''}}
                                        </a>
                                    </li>
                                    @endforeach
                                    @else
                                    <li>
                                        <h3 class="text-grey">There are no facility uploaded</h2>
                                    </li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- list-single-main-item end -->
                    <!-- list-single-main-item-->
                    <div class="list-single-main-item fl-wrap block_box" id="sec3">
                        <div class="list-single-main-item-title">
                            <h3>Gallery / Photos</h3>
                        </div>
                        <div class="list-single-main-item_content fl-wrap">
                            <div class="single-carousel-wrap fl-wrap lightgallery">
                                <div class="sc-next sc-btn color2-bg"><i class="fas fa-caret-right"></i></div>
                                <div class="sc-prev sc-btn color2-bg"><i class="fas fa-caret-left"></i></div>
                                <div class="single-carousel fl-wrap full-height">
                                    <div class="swiper-container">
                                        <div class="swiper-wrapper">
                                            <!-- swiper-slide-->
                                            @if(count($schools->gallery)>0)
                                            @foreach($schools->gallery as $gallery)
                                            <div class="swiper-slide">
                                                <div class="box-item">
                                                    <img src="{{url('/')}}/public/portal_images/school_gallery/{{$gallery->gallery_image ??''}}"
                                                        alt="">
                                                    <a href="{{url('/')}}/public/portal_images/school_gallery/{{$gallery->gallery_image ??''}}"
                                                        class="gal-link popup-image"><i class="fa fa-search"></i></a>
                                                </div>
                                            </div>
                                            @endforeach
                                            @else
                                            <li>
                                                <h3 class="text-grey">There are no gallery uploaded</h2>
                                            </li>
                                            @endif
                                            <!-- swiper-slide end-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- list-single-main-item end -->
                    <!-- list-single-main-item-->
                    <div class="list-single-main-item fl-wrap block_box" id="sec4">
                        <div class="list-single-main-item-title">
                            <h3>School Course</h3>
                        </div>
                        <div class="list-single-main-item_content fl-wrap">
                            <table class=" table table-striped table-bordered dataTable display ">
                                <thead>
                                    <tr>
                                        <th class="bg-info">Course</th>
                                        <th class="bg-light">Course Fees</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(count($schools->courses) > 0)
                                    @foreach($schools->courses as $courses)
                                    <tr>
                                        <td>{{$courses->course_name ?? '' }}</td>
                                        <td>{{$courses->course_fees ?? '' }}</td>
                                    </tr>
                                    @endforeach
                                    @else
                                    <tr>
                                        <td colspan='2'>There is no course uploaded.</td>
                                    </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- list-single-main-item end -->
                    <!-- list-single-main-item -->
                    <div class="list-single-main-item fl-wrap block_box" id="sec5">
                        <div class="list-single-main-item-title">
                            <h3>School Eligibilities</h3>
                        </div>

                        <div class="list-single-main-item_content fl-wrap text-left">
                            <ul class="no-list-style eligibity-ul">
                                @if(count($schools->eligibility)>0)
                                @foreach($schools->eligibility as $eligibility)
                                <li> {{$eligibility->eligibity  ?? ''}} <br>
                                    <span><small>{{$eligibility->eligibity_value ?? ''}}</small></span>
                                </li>
                                @endforeach
                                @else
                                <li>
                                    <h3 class="text-grey">There are no eligibity uploaded</h2>
                                </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                    <!-- list-single-main-item end -->
                </div>
            </div>
            <!-- list-single-main-wrapper-col end -->
            <!-- list-single-sidebar -->
            <div class="col-md-4">
                <!--box-widget-item -->
                <div class="box-widget-item fl-wrap block_box">
                    <div class="box-widget-item-header">
                        <h3>School Detail</h3>
                    </div>
                    <div class="box-widget opening-hours fl-wrap">
                        <div class="box-widget-content">
                            <ul class="no-list-style">
                                <li class="no-class"><span class="opening-hours-day">Starting Fees </span><span
                                        class="opening-hours-time">{{$schools->starting_fees ?? ''}}</span></li>
                                <li class="no-class"><span class="opening-hours-day">Latitude & Longitude </span><span
                                        class="opening-hours-time">{{$schools->school_latlng ?? ''}}</span></li>
                                <li class="no-class"><span class="opening-hours-day">Email </span><a
                                        href="mailto:{{$schools->school_email ?? ''}}"><span
                                            class="opening-hours-time">{{$schools->school_email ?? ''}}</span></a></li>
                                <li class="no-class"><span class="opening-hours-day">Contact Number </span><a
                                        href="tel:{{$schools->school_contact_number ?? ''}}"><span
                                            class="opening-hours-time">{{$schools->school_contact_number ?? ''}}</span></a>
                                </li>
                                <li class="no-class"><span class="opening-hours-day">Whatsapp Number </span><a
                                        href="https://wa.me/{{$schools->school_whatsapp ?? ''}}" target="_blank"><span
                                            class="opening-hours-time">{{$schools->school_whatsapp ?? ''}}</span></a>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>
                <!--box-widget-item end -->

                <!--box-widget-item -->
                <div class="box-widget-item fl-wrap block_box">
                    <div class="box-widget-item-header">
                        <h3>Location / Contacts </h3>
                    </div>
                    <div class="box-widget">
                        <div class="map-container">
                        @if($schools->school_latlng != " " && $schools->school_latlng != null)
                            <?php
                                $NewLatLongArr = explode(',', $schools->school_latlng ?? '');
                                $NewLat = $NewLatLongArr[0];
                                $NewLng = $NewLatLongArr[1];
                            ?>
                            <div id="singleMap" data-latitude="{{$NewLat ?? ''}}" data-longitude="{{$NewLng ?? ''}}"
                                data-mapTitle="Our Location"></div>
                            @endif
                        </div>
                        <div class="box-widget-content bwc-nopad">
                            <div class="list-author-widget-contacts list-item-widget-contacts bwc-padside">
                                <ul class="no-list-style">
                                    <li><span><i class="fal fa-map-marker"></i> Adress :</span> <a
                                            href="#">{{$schools->school_address ?? ''}}</a></li>
                                    <li><span><i class="fal fa-phone"></i> Phone :</span> <a
                                            href="tel:{{$schools->school_contact_number ?? ''}}">{{$schools->school_contact_number ?? ''}}</a>
                                    </li>
                                    <li><span><i class="fal fa-envelope"></i> Mail :</span> <a
                                            href="mailto:{{$schools->school_email ?? ''}}">{{$schools->school_email ?? ''}}</a>
                                    </li>
                                    <li><span><i class="fal fa-browser"></i> Website :</span> <a target="_blank"
                                            href="{{$schools->school_website ?? ''}}">{{$schools->school_website ?? ''}}</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!--box-widget-item end -->
                @if(!empty($schools->brochure[0]->brochure_file))
                <a href="{{url('/')}}/public/portal_images/school_brochure/{{$schools->brochure[0]->brochure_file ?? ''}}"
                    download class="btn color2-bg url_btn float-btn btn-block"> Download College Info
                    <i class="fal fa-bookmark"></i>
                </a>
                @endif
            </div>
            <!-- list-single-sidebar end -->
        </div>
    </div>
</section>
<div class="limit-box fl-wrap"></div>
<!-- === School Detail Section === -->
@endsection