@extends('Components.SchoolLayout')
@section('title','School Personal Profile')
@section('admin_content')

<div class="dashboard-title fl-wrap">
    <h3>Your Statistics</h3>
</div>

<div class="list-single-facts fl-wrap">
    <div class="row">
        <div class="col-md-3">
            <!-- inline-facts -->
            <div class="inline-facts-wrap gradient-bg " style="">
                <div class="inline-facts">
                    <i class="fal fa-file-pdf"></i>
                    <div class="milestone-counter">
                        <div class="stats animaper">
                            <div class="num" data-content="0" data-num="{{count($count_data->brochure ?? '')}}">{{count($count_data->brochure ?? '')}}</div>
                        </div>
                    </div>
                    <h6>School Brochure</h6>
                </div>
                <div class="stat-wave">
                    <svg viewBox="0 0 100 25">
                        <path fill="#fff" d="M0 30 V12 Q30 17 55 2 T100 11 V30z"></path>
                    </svg>
                </div>
            </div>
            <!-- inline-facts end -->
        </div>
        <div class="col-md-3">
            <!-- inline-facts  -->
            <div class="inline-facts-wrap gradient-bg " style="">
                <div class="inline-facts">
                    <i class="fal fa-chart-bar"></i>
                    <div class="milestone-counter">
                        <div class="stats animaper">
                            <div class="num" data-content="0" data-num="{{count($count_data->courses ?? '')}}">{{count($count_data->courses ?? '')}}</div>
                        </div>
                    </div>
                    <h6>School Courses</h6>
                </div>
                <div class="stat-wave">
                    <svg viewBox="0 0 100 25">
                        <path fill="#fff" d="M0 30 V12 Q30 17 55 12 T100 11 V30z"></path>
                    </svg>
                </div>
            </div>
            <!-- inline-facts end -->
        </div>
        <div class="col-md-3">
            <!-- inline-facts  -->
            <div class="inline-facts-wrap gradient-bg " style="">
                <div class="inline-facts">
                    <i class="fal fa-images"></i>
                    <div class="milestone-counter">
                        <div class="stats animaper">
                            <div class="num" data-content="0" data-num="{{count($count_data->gallery ?? '')}}">{{count($count_data->gallery ?? '')}}</div>
                        </div>
                    </div>
                    <h6>School Gallery </h6>
                </div>
                <div class="stat-wave">
                    <svg viewBox="0 0 100 25">
                        <path fill="#fff" d="M0 30 V12 Q30 12 55 5 T100 11 V30z"></path>
                    </svg>
                </div>
            </div>
            <!-- inline-facts end -->
        </div>
        <div class="col-md-3">
            <!-- inline-facts  -->
            <div class="inline-facts-wrap gradient-bg " style="">
                <div class="inline-facts">
                    <i class="fal fa-certificate"></i>
                    <div class="milestone-counter">
                        <div class="stats animaper">
                            <div class="num" data-content="0" data-num="{{count($count_data->eligibility ?? '')}}">{{count($count_data->eligibility ?? '')}}</div>
                        </div>
                    </div>
                    <h6>School Eligibility</h6>
                </div>
                <div class="stat-wave">
                    <svg viewBox="0 0 100 25">
                        <path fill="#fff" d="M0 30 V12 Q30 12 55 5 T100 11 V30z"></path>
                    </svg>
                </div>
            </div>
            <!-- inline-facts end -->
        </div>
    </div>
</div>
@endsection