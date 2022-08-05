@extends('Components.Layout')
@section('title','404 Error || Campus Connect')
@section('content')
<!--  section  -->
<section class="parallax-section small-par" data-scrollax-parent="true">
    <div class="bg" data-bg="{{url('public/images/bg/hero/4.jpg')}}" data-scrollax="properties: { translateY: '30%' }">
    </div>
    <div class="overlay op7"></div>
    <div class="container">
        <div class="error-wrap">
            <div class="bubbles">
                <h2>404</h2>
            </div>
            <p>We're sorry, but the Page you were looking for, couldn't be found.</p>
            <div class="clearfix"></div>
            <p>Or</p>
            <a href="{{url('/')}}" class="btn   color2-bg">Back to Home Page<i class="far fa-home-alt"></i></a>
        </div>
    </div>
</section>
<!--  section  end-->
@endsection