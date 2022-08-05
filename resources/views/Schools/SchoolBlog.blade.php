@extends('Components.SchoolLayout')
@section('title','School Daily Blog')
@section('admin_content')

<div class="card dashboard-list-box mar-dash-list fl-wrap">
    <div class="card-header">

        <div class="d-flex justify-content-between">
            <h1 class="mt-7">School Blog</h1>
            <a href="{{route('SchoolBlogForm')}}" class="add-btn color-bg">Create Blog</a>
        </div>
    </div>
</div>

<!-- === Content ===  -->
<div class="dashboard-list-box mar-dash-list fl-wrap broucher-list mt-2">
    <br>
    <div class="bg-white loader d-none">
        <img src="{{url('public/portal_images/loader_gif.gif')}}" alt="" width="150">
    </div>
</div>
<!-- === Content ===  -->

<!-- === Main Script === -->
<script>
function GetBlog() {
    $.ajax({
        type: "GET",
        url: "{{route('GetBlogs')}}",
        beforeSend: function() {
            $(".loader").removeClass('d-none')
        },
        success: function(data) {
            $(".loader").addClass('d-none')
            var data = JSON.parse(data);
            var brochure = "";
            var heading = "";
            if (data.length > 0) {
                $.each(data, function(index, value) {
                    brochure +=
                        "<div class='dashboard-list fl-wrap'><div class='dashboard-message'><div class='booking-list-contr'><a href='{{url('Schools/SchoolBlogEdit')}}/" +
                        value.blog_id +
                        "' class='color-bg tolt' data-microtip-position='left' data-tooltip='Edit'><i class='fal fa-edit'></i></a><a href='javascript:void(0)' class='red-bg tolt' data-microtip-position='left' data-tooltip='Delete' onclick=BlogRemove(" +
                        value.blog_id + ",'" + value.blog_image +
                        "')><i class='fal fa-trash'></i></a></div><div class='dashboard-message-text'><img src='{{url('/')}}/public/portal_images/blog_images/" +
                        value.blog_image + "' alt=''><h4><a href='javascript:void(0)'>" + value
                        .blog_title +
                        "</a></h4>    <div class='geodir-category-location clearfix'><p>" + value
                        .blog_description.replace(/(<([^>]+)>)/ig, '').slice(0, 70) + '...' +
                        " </p></div></div></div></div>";
                    $(".broucher-list").html(brochure)
                });
            } else {
                heading += "<h1>You do not have any blog uploaded.</h1>"
                $(".broucher-list").html(heading)
            }
        }
    })
}
GetBlog();

function BlogRemove(blog_id, blog_image) {
    $.ajax({
        type: "GET",
        url: "{{route('BlogRemove')}}",
        data: {
            blog_id: blog_id,
            blog_image: blog_image,
        },
        success: function(data) {
            GetBlog();
        }
    })
}
</script>
<!-- === Main Script === -->
@endsection
