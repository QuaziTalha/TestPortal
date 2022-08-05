@if(!empty($schools))
@foreach($schools as $row)
<!--  gallery-item-->
@include('Components.Partials.ListCard',['data' => $row])
<!-- gallery-item  end-->
@endforeach
@else
@endif