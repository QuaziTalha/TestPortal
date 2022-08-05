@extends('Components.Layout')
@section('title','The Best School In Aurangabad || Campus Connect')
@section('content')
<!--  section  -->
<section class="parallax-section single-par" data-scrollax-parent="true">
    <div class="bg par-elem " data-bg="{{url('public/images/bg/38.jpg')}}"
        data-scrollax="properties: { translateY: '30%' }"></div>
    <div class="overlay op7"></div>
    <div class="container">
        <div class="section-title center-align big-title">
            <h2><span>All School List</span></h2>
            <span class="section-separator"></span>
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
            <a href="{{url('/')}}">Home</a><a href="#">All Schools</a>
        </div>
        <div class="mob-nav-content-btn  color2-bg show-list-wrap-search ntm fl-wrap"><i class="fal fa-filter"></i>
            Filters</div>
        <div class="fl-wrap">
            <div class="row">
                <div class="col-md-4">
                    <div class=" fl-wrap lws_mobile   tabs-act block_box">
                        <div class="filter-sidebar-header fl-wrap" id="filters-column">
                            <ul class="tabs-menu fl-wrap no-list-style">
                                <li class="current"><a href="#filters-search"> <i class="fal fa-sliders-h"></i> Filters
                                    </a></li>
                            </ul>
                        </div>
                        <div class="scrl-content filter-sidebar    fs-viscon">
                            <!--tabs -->
                            <div class="tabs-container fl-wrap">
                                <!--tab -->
                                <div class="tab">
                                    <div id="filters-search" class="tab-content  first-tab ">
                                        <!-- listsearch-input-item-->
                                        <div class="listsearch-input-item">
                                            <select data-placeholder="Categories"
                                                class="chosen-select no-search-select">
                                                <option>All School</option>
                                                <option>Latest School </option>
                                                <option>Oldest School </option>
                                            </select>
                                        </div>
                                        <!-- listsearch-input-item end-->
                                        <!-- listsearch-input-item-->
                                        <div class="listsearch-input-item">
                                            <select data-placeholder="City/Location"
                                                class="chosen-select no-search-select">
                                                <option>All Course</option>
                                                <option>CBSC</option>
                                                <option>CBIC</option>
                                                <option>SSC</option>
                                                <option>HSC</option>
                                            </select>
                                        </div>
                                        <!-- listsearch-input-item end-->
                                        <a href="{{('')}}" class="clear-filter-btn"><i class="far fa-redo"></i> Reset
                                            Filters</a>
                                    </div>
                                </div>
                                <!--tab end-->
                            </div>
                            <!--tabs end-->
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <!-- listing-item-container -->
                    <div class="listing-item-container init-grid-items fl-wrap nocolumn-lic pagination-append">

                        @include('Components.PaginationCard')

                    </div>
                    <button class=" btn-custom  b-none" onclick="PaginateMore()">Load More</button>
                    <!-- listing-item-container end -->
                </div>
            </div>
        </div>
    </div>
</section>
<div class="limit-box fl-wrap"></div>

<!-- === All Script === -->
<script>
// --- === Pagination Function === --- \\
var current_page = 1;
var lastpage = "{{$lastpage ?? ''}}";
if (current_page >= lastpage) {
    $(".btn-custom").hide();
}

function PaginateMore() {
    current_page++;
    if (current_page >= lastpage) {
        $(".btn-custom").hide();
    } else {
        $.ajax({
            type: "GET",
            url: "{{url('/')}}/AllSchoolList?page=" + current_page,
            success: function(data) {
                console.log(data);
                $(".pagination-append").append(data.data);
            }
        })
    }
}
// --- === Pagination Function === --- \\
</script>
<!-- === All Script === -->
@endsection