<div class="gallery-item {{$data->syllabus_type ?? ''}} events" style="position: absolute; left: 0px; top: 0px;">
    <!-- listing-item  -->
    <div class="listing-item" style="height: 471px;">
        <article class="geodir-category-listing fl-wrap">
            <div class="geodir-category-img">
                <a href="{{url('SchoolDetail')}}/{{$data->school_slug ?? ''}}" class="geodir-category-img-wrap fl-wrap">
                    <div style="height: 205px; width: 100%; background-position: center; background-repeat: no-repeat; background-size: contain; background-image: url('{{url('public/portal_images/school_images')}}/{{$data->school_image ?? ''}}');">

                    </div>
             {{--        <img src="{{url('public/portal_images/school_images')}}/{{$data->school_image ?? ''}}" 
                    onerror="this.onerror=null; this.src='{{url('public/images/image-not-found.png')}}'"
                    alt=""> --}}
                </a>
                <div class="listing-avatar"><a href="author-single.html">
                   {{--  <img src="{{url('public/portal_images/school_logo')}}/{{$data->school_logo ?? ''}}"  onerror="this.onerror=null; this.src='{{url('public/images/image-not-found.png')}}'"
  alt=""> --}}
  <div style="height: 50px; width: 50px;     box-shadow: 0px 0px 0px 6px rgb(255 255 255);
  border-radius: 100%;
  position: relative;
  z-index: 2; background-position: center; background-repeat: no-repeat; background-size: contain; background-image: url('{{url('public/portal_images/school_logo')}}/{{$data->school_logo ?? ''}}');">
  </div>
                </a>
                    <span class="avatar-tooltip">Added By <strong>{{Str::limit($data->school_name,10,'..')  ?? ''}}</strong></span>
                </div>
            </div>
            <div class="geodir-category-content fl-wrap title-sin_item">
                <div class="geodir-category-content-title fl-wrap">
                    <div class="geodir-category-content-title-item">
                        <h3 class="title-sin_map"><a href="{{url('SchoolDetail')}}/{{$data->school_slug ?? ''}}">{{Str::limit($data->school_name,18,'..')  ?? ''}}</a></h3>
                        <div class="geodir-category-location fl-wrap"><a><i class="fas fa-map-marker-alt"></i>{{Str::limit($data->school_address,35,'..')  ?? ''}} </a></div>
                    </div>
                </div>
                <div class="geodir-category-text fl-wrap h-custom-auto">
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

                            <li><a href="#1" class="single-map-item" data-newlatitude="{{$NewLat ?? ''}}"
                                    data-newlongitude="{{$NewLng ?? ''}}"><i class="fal fa-map-marker-alt"></i><span
                                        class="geodir-opt-tooltip">On the map <strong>1</strong></span> </a></li>
                            <li>
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
    <!-- listing-item end -->
</div>
