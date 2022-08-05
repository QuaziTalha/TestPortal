@if(!empty($blogs))
@foreach($blogs as $row)
<!--  gallery-item-->
@include('Components.Partials.BlogCard',['data' => $row])
<!-- gallery-item  end-->
@endforeach
@else
@endif