@extends('Components.Layout')
@section('title','Merchandise -'. $merchandise[0]->merchandise_name ?? '')
@section('content')

<!-- === Merchandise Detail ===  -->
<section class="gray-bg no-top-padding-sec" id="sec1">
    <div class="container">
        <div class="breadcrumbs inline-breadcrumbs fl-wrap block-breadcrumbs">
            <a href="#">Home</a><a href="#">Merchandise</a>
            <!-- <div class="showshare brd-show-share color2-bg"> <i class="fas fa-share"></i> Share </div> -->
        </div>
        <div class="share-holder hid-share sing-page-share top_sing-page-share">
            <div class="share-container  isShare"></div>
        </div>
        <div class="post-container fl-wrap">
            <div class="row">
                <!-- Merchandise content-->
                <div class="col-md-12">
                    <!-- article> -->
                    <article class="post-article single-post-article">
                        <div class="list-single-main-media fl-wrap">
                            <div class="single-slider-wrap">
                                <div class="single-slider fl-wrap">
                                    <div class="swiper-container">
                                        <div class="swiper-wrapper lightgallery">
                                            <div class="swiper-slide hov_zoom"><img
                                                    src="{{url('/')}}/public/portal_images/merchandise_images/{{$merchandise[0]->merchandise_img ?? ''}}"
                                                    alt=""><a
                                                    href="{{url('/')}}/public/portal_images/merchandise_images/{{$merchandise[0]->merchandise_img ?? ''}}"
                                                    class="box-media-zoom   popup-image"><i
                                                        class="fal fa-search"></i></a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="list-single-main-item fl-wrap block_box">
                            <h2 class="post-opt-title"><a href="javascript:void(0)">{{$merchandise[0]->merchandise_name ?? ''}}</a>
                            </h2>
                           {{--  <div class="post-author"><a href="#"><img
                                        src="{{url('public/portal_images/school_logo')}}/{{$merchandise[0]->school_logo ?? ''}}"
                                        alt=""><span>{{$merchandise[0]->school_name ?? ''}}</span></a></div>
                            <div class="post-opt">
                                <ul class="no-list-style">
                                    <li><i class="fal fa-calendar"></i> <span>{{$merchandise[0]->merchandise_date ?? ''}}</span></li>
                                    </li>
                                </ul>
                            </div> --}}
                            <span class="fw-separator"></span>
                            <div class="clearfix"></div>
                            <div id="description">{!! $merchandise[0]->merchandise_desc !!}</div>
                            {{-- <script>$("#description").html()</script> --}}

                            <span class="fw-separator"></span>
                        </div>
                    </article>
                    <!-- article end -->
                </div>
                <!-- Merchandise conten end-->
            </div>
        </div>
    </div>
</section>
<div class="limit-box fl-wrap"></div>
<!-- === Merchandise Detail ===  -->
@endsection
