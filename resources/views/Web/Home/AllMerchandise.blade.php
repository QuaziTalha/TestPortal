@extends('Components.Layout')
@section('title','The Best School In Aurangabad || Campus Connect')
@section('content')
<link type="text/css" rel="stylesheet" href="{{url('public\css\shop.css')}}">
<div class="content">
    <!--  section  -->
    <section class="parallax-section single-par" data-scrollax-parent="true">
        <div class="bg par-elem "  data-bg="{{url('public/images/bg/merchandise.jpg')}}" data-scrollax="properties: { translateY: '30%' }"></div>
        <div class="overlay op7"></div>
        <div class="container">
            <div class="section-title center-align big-title">
                <h2><span>Our Merchandise</span></h2>
           {{--      <span class="section-separator"></span>
                <h4>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut nec tincidunt arcu, sit amet fermentum sem.</h4> --}}
            </div>
        </div>
        <div class="header-sec-link">
            <a href="#sec1" class="custom-scroll-link"><i class="fal fa-angle-double-down"></i></a>
        </div>
    </section>
    <!--  section  end-->
    <section class="gray-bg small-padding no-top-padding-sec" id="sec1">
        <div class="container">
            <div class="breadcrumbs inline-breadcrumbs fl-wrap block-breadcrumbs">
                <a href="#">Home</a><span>Merchandise</span>
            </div>
            <div class="mob-nav-content-btn  color2-bg show-list-wrap-search ntm fl-wrap"><i class="fal fa-filter"></i>  Filters</div>
            <div class="fl-wrap">
                <div class="row">
                    <div class="col-md-4">
                        <div class=" fl-wrap lws_mobile">
                            <!--box-widget-item -->
                            <div class="box-widget-item fl-wrap block_box">
                                <div class="box-widget-item-header">
                                    <h3>Search Products</h3>
                                </div>
                                <div class="box-widget fl-wrap">
                                    <div class="box-widget-content">
                                        <div class="search-widget">
                                            <form action="#" class="fl-wrap">
                                                <input name="se" id="se" type="text" class="search" placeholder="Search.." value="" />
                                                <button class="search-submit color2-bg" id="submit_btn"><i class="fal fa-search"></i> </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--box-widget-item end -->
                            <!--box-widget-item -->
                            <div class="box-widget-item fl-wrap block_box">
                                <div class="box-widget-item-header">
                                    <h3>Price Filter</h3>
                                </div>
                                <div class="box-widget fl-wrap">
                                    <div class="box-widget-content">
                                        <div class="price-rage-wrap shop-rage-wrap fl-wrap">
                                            <a class="srw_btn color-bg" >Update</a>
                                            <div class="price-rage-item fl-wrap">
                                                <input type="text" id="shop-price" class="shop-price" data-min="0" data-max="1000"  name="shop-price"  data-step="10" value="$$">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--box-widget-item end -->
                            <!--box-widget-item -->
                            <div class="box-widget-item fl-wrap block_box">
                                <div class="box-widget-item-header">
                                    <h3>Product Categories</h3>
                                </div>
                                <div class="box-widget fl-wrap">
                                    <div class="box-widget-content">
                                        <ul class="cat-item no-list-style">
                                            <li><a href="#">Pizza</a> <span>3</span></li>
                                            <li><a href="#">Pasta</a> <span>6 </span></li>
                                            <li><a href="#">Sea Products</a> <span>12 </span></li>
                                            <li><a href="#">Drinks</a> <span>4</span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!--box-widget-item end -->
                            <!--box-widget-item -->

                            <!--box-widget-item end -->
                            <!--box-widget-item -->
                            <div class="box-widget-item fl-wrap block_box">
                                <div class="box-widget-item-header">
                                    <h3>Product Tags</h3>
                                </div>
                                <div class="box-widget fl-wrap">
                                    <div class="box-widget-content">
                                        <div class="list-single-tags tags-stylwrap">
                                            <a href="#">Market</a>
                                            <a href="#">Hot</a>
                                            <a href="#">Drinks</a>
                                            <a href="#">Coffee</a>
                                            <a href="#">Restourant</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--box-widget-item end -->
                        </div>
                    </div>
                    <div class="col-md-8">
                        <!-- list-main-wrap-header-->
                        <div class="list-main-wrap-header fl-wrap block_box no-vis-shadow">
                            <!-- list-main-wrap-title-->
                            <div class="list-main-wrap-title">
                                <h2>Showing <span> 1–8 </span> of   19 results</h2>
                            </div>
                            <!-- list-main-wrap-title end-->
                            <!-- list-main-wrap-opt-->
                            <div class="list-main-wrap-opt">
                                <!-- price-opt-->
                                <div class="price-opt">
                                    <span class="price-opt-title">Sort   by:</span>
                                    <div class="listsearch-input-item">
                                        <select data-placeholder="Popularity" class="chosen-select no-search-select" >
                                            <option>Popularity</option>
                                            <option>Average rating</option>
                                            <option>Price: low to high</option>
                                            <option>Price: high to low</option>
                                        </select>
                                    </div>
                                </div>
                                <!-- price-opt end-->
                            </div>
                            <!-- list-main-wrap-opt end-->
                        </div>
                        <!-- list-main-wrap-header end-->
                        <!-- listing-item-container -->
                        <div class="listing-item-container init-grid-items fl-wrap nocolumn-lic">
                            <!-- shop-item  -->
                            @foreach ($merchandise as $row)
                            <div class="shop-item m-auto">
                                <div class="shop-item-media">
                                    <a href="{{url('MerchandiseDetail/'. $row->merchandise_id)}}">
                                        {{-- <img src="{{url('public/portal_images/merchandise_images/'. $row->merchandise_img)}}" alt=""> --}}
                                        <div style="width: 100%; height: 300px; background-image: url('{{url('public/portal_images/merchandise_images/'. $row->merchandise_img)}}'); background-position: center;
                                        "></div>
                                        <div class="overlay"></div>
                                    </a>
                             {{--        <div class="geodir-category-opt">
                                        <div class="listing-rating-count-wrap">
                                            <div class="listing-rating card-popup-rainingvis" data-starrating2="4"></div>
                                            <br>
                                            <div class="reviews-count">12 reviews</div>
                                        </div>
                                    </div> --}}
                                </div>
                                <div class="shop-item_title">
                                    <h4><a href="{{url('MerchandiseDetail/'. $row->merchandise_id)}}">{{$row->merchandise_name}}</a></h4>
                                    <span class="shop-item_price">{{Str::limit($row->merchandise_desc,50,'..')  ?? ''}}</span>
                                    {{-- <a href="#" class="shop-item_link color-bg">Details</a> --}}
                                </div>
                            </div>
                            @endforeach

                            <!-- shop-item end -->

                        </div>
                        <!-- listing-item-container end -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--section end-->
    <div class="limit-box fl-wrap"></div>
</div>
<script src="{{url('public\js\plugins.js')}}"></script>
<script src="{{url('public\js\shop.js')}}"></script>


@endsection

