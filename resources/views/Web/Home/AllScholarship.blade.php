@extends('Components.Layout')
@section('title','The Best School In Aurangabad || Campus Connect')
@section('content')
<link type="text/css" rel="stylesheet" href="{{url('public\css\shop.css')}}">
<div class="content">
    <!--  section  -->
    <section class="parallax-section single-par" data-scrollax-parent="true">
        <div class="bg par-elem "  data-bg="{{url('public/images/bg/scholarship.jpg')}}" data-scrollax="properties: { translateY: '30%' }"></div>
        <div class="overlay op7"></div>
        <div class="container">
            <div class="section-title center-align big-title">
                <h2><span>Our Scholarship</span></h2>
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
                <a href="#">Home</a><span>Scholarship</span>
            </div>
            <div class="mob-nav-content-btn  color2-bg show-list-wrap-search ntm fl-wrap"><i class="fal fa-filter"></i>  Filters</div>
            <div class="fl-wrap">
                <div class="row">
                    <div class="col-md-12">
                        <!-- list-main-wrap-header-->
                        <div class="list-main-wrap-header fl-wrap block_box no-vis-shadow" style="margin-bottom: 10px">
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
                            @foreach ($scholarship as $row)
                            <div class="shop-item m-auto">
                               {{--  <div class="shop-item-media">
                                    <a href="{{url('ScholarshipDetail/'. $row->scholarship_id)}}">
                                        <div style="width: 100%; height: 300px; background-image: url(''); background-position: center;
                                        "></div>
                                        <iframe src="{{url('public/portal_images/Scholarship_images/'. $row->scholarship_file)}}" title="description"></iframe>
                                        <div class="overlay"></div>
                                    </a>
                                </div> --}}
                                <div class="shop-item_title">
                                    <h4><a href="{{url('ScholarshipDetail/'. $row->scholarship_id)}}">{{$row->scholarship_name}}</a></h4>
                                    <span class="shop-item_price">{{Str::limit($row->scholarship_desc,50,'..')  ?? ''}}</span>
                                </div>
                            </div>
                            @endforeach

                            <!-- shop-item end -->
{{--
                            <div class="pagination fwmpag">
                                <a href="#" class="prevposts-link"><i class="fas fa-caret-left"></i><span>Prev</span></a>
                                <a href="#">1</a>
                                <a href="#" class="current-page">2</a>
                                <a href="#">3</a>
                                <a href="#">...</a>
                                <a href="#">7</a>
                                <a href="#" class="nextposts-link"><span>Next</span><i class="fas fa-caret-right"></i></a>
                            </div> --}}
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
@endsection

