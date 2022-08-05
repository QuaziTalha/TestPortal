<div class="listing-item" style="height: 471px;">
    <article class="geodir-category-listing fl-wrap">
        <div class="geodir-category-img">
            <a href="{{url('SchoolDetail')}}/{{$data->school_slug ?? ''}}" class="geodir-category-img-wrap fl-wrap">
                <img src="{{url('public/portal_images/school_images')}}/{{$data->school_image ?? ''}}" alt="">
            </a>
            <div class="listing-avatar"><a href="javascript:void(0)"><img
                        src="{{url('public/portal_images/school_logo')}}/{{$data->school_logo ?? ''}}" alt=""></a>
                <span class="avatar-tooltip">Added By
                    <strong>{{Str::limit($data->school_name,10,'..')  ?? ''}}</strong></span>
            </div>
        </div>
        <div class="geodir-category-content fl-wrap title-sin_item">
            <div class="geodir-category-content-title fl-wrap">
                <div class="geodir-category-content-title-item">
                    <h3 class="title-sin_map"><a
                            href="{{url('SchoolDetail')}}/{{$data->school_slug ?? ''}}">{{Str::limit($data->school_name,18,'..')  ?? ''}}</a>
                    </h3>
                    <div class="geodir-category-location fl-wrap"><a href="#"><i
                                class="fas fa-map-marker-alt"></i>{{$data->school_address ?? ''}},{{$data->school_city ?? ''}}
                            {{$data->school_pin_code ?? ''}} </a></div>
                </div>
            </div>
            <div class="geodir-category-text fl-wrap">
                <p class="small-text">{{Str::limit($data->school_about,120,'..')  ?? ''}}</p>
            </div>
            <div class="geodir-category-footer fl-wrap">
                <a href="{{url('SchoolDetail')}}/{{$data->school_slug ?? ''}}" class="listing-item-category-wrap">
                    <div class="listing-item-category purp-bg"><i class="fal fa-info"></i></div>
                    <span> View Details</span>
                </a>
                <div class="geodir-opt-list">
                    <ul class="no-list-style">
                        <li><a href="#" class="show_gcc"><i class="fal fa-envelope"></i><span
                                    class="geodir-opt-tooltip">Contact Info</span></a>
                        </li>
                        @if($data->school_latlng != " " && $data->school_latlng != null)
                        <?php
$NewLatLongArr = explode(',', $data->school_latlng ?? '');
$NewLat = $NewLatLongArr[0];
$NewLng = $NewLatLongArr[1];
?>
                        @endif
                        @if($data->school_latlng != " " && $data->school_latlng != null)
                        <li><a href="#1" class="single-map-item" data-newlatitude="{{$NewLat ?? ''}}"
                                data-newlongitude="{{$NewLng ?? ''}}"><i class="fal fa-map-marker-alt"></i><span
                                    class="geodir-opt-tooltip">On the map <strong>1</strong></span> </a></li>
                        <li>
                            @endif
                        </li>
                    </ul>
                </div>
                <div class="geodir-category_contacts">
                    <div class="close_gcc"><i class="fal fa-times-circle"></i></div>
                    <ul class="no-list-style">
                        <li><span><i class="fal fa-phone"></i> Call : </span><a
                                href="#">{{$data->school_contact_number ?? ''}}</a></li>
                        <li><span><i class="fal fa-envelope"></i> Write : </span><a
                                href="#">{{$data->school_email ?? ''}}</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </article>
</div>