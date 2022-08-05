<!-- <div class="gallery-item restaurant events"> -->
    <!-- listing-item  -->
    <div class="listing-item">
        <article class="geodir-category-listing fl-wrap">
            <div class="geodir-category-img">
                <a href="{{url('BlogDetail')}}/{{$data->blog_id ?? ''}}" class="geodir-category-img-wrap fl-wrap">
                    <img src="{{url('public/portal_images/blog_images/')}}/{{$data->blog_image ?? ''}}" alt="">
                </a>
                <div class="geodir_status_date color-bg"><i class="fal fa-clock"></i>{{$data->blog_date ?? ''}}</div>
            </div>
            <div class="geodir-category-content fl-wrap title-sin_item">
                <div class="geodir-category-content-title fl-wrap">
                    <div class="geodir-category-content-title-item">
                        <h3 class="title-sin_map"><a href="{{url('BlogDetail')}}/{{$data->blog_id ?? ''}}">{{Str::limit($data->blog_title,55,'..')  ?? ''}}</a></h3>
                    </div>
                </div>
                <div class="geodir-category-text fl-wrap" style="height: 60px;">
                    <p class="small-text" style="word-break: break-all;">{{strip_tags(Str::limit($data->blog_description,80,'..')  ?? '')}}</p>
                </div>
            </div>
        </article>
    </div>
    <!-- listing-item end -->
<!-- </div> -->
