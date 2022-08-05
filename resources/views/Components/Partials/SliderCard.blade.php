<div class="swiper-slide">
    <div class="listing-slider-item fl-wrap">
        <!-- listing-item  -->
        <div class="listing-item listing_carditem">
            <article class="geodir-category-listing fl-wrap">
                <div class="geodir-category-img">
                    <a href="{{url('SchoolDetail')}}/{{$data->school_slug ?? ''}}"
                        class="geodir-category-img-wrap fl-wrap">
                        <img src="{{url('public/portal_images/school_images')}}/
                        {{$data->school_image ?? 'NotFound'}}" alt="">
                    </a>
                    <div class="geodir-category-opt">
                        <div class="geodir-category-opt_title">
                            <h4><a
                                    href="{{url('SchoolDetail')}}/{{$data->school_slug ?? ''}}">{{Str::limit($data->school_name,20,'..')  ?? ''}}</a>
                            </h4>
                            <div class="geodir-category-location"><a href="#"><i class="fas fa-map-marker-alt"></i>
                                    {{$data->school_address ?? ''}},{{$data->school_city ?? ''}}
                                    {{$data->school_pin_code ?? ''}}</a></div>
                        </div>
                        <div class="listing_carditem_footer fl-wrap">
                            <a class="listing-item-category-wrap"
                                href="{{url('SchoolDetail')}}/{{$data->school_slug ?? ''}}">
                                <div class="listing-item-category red-bg"><i class="fal fa-info"></i></div>
                                <span> View Details</span>
                            </a>
                            <div class="price-level geodir-category_price v-none">
                                <span class="price-level-item" data-pricerating="2"></span>
                                <span class="price-name-tooltip">Pricey</span>
                            </div>
                            <div class="post-author"><a href="#"><img
                                        src="{{url('public/portal_images/school_logo')}}/{{$data->school_logo ?? 'NotFound'}}"
                                        alt=""><span>By ,
                                        {{Str::limit($data->school_name,16,'..')  ?? ''}}</span></a></div>
                        </div>
                    </div>
                </div>
            </article>
        </div>
        <!-- listing-item end -->
    </div>
</div>