@extends('Components.SchoolLayout')
@section('title','School Personal Profile')
@section('admin_content')


<div class="dashboard-title fl-wrap">
    <h3>School Gallery</h3>
</div>

<div class="card dashboard-list-box mar-dash-list fl-wrap">
    <div class="card-header">

        <div class="d-flex justify-content-between">
            <form class="GalleryFrom">
                @csrf
                <div class="row custom-form">
                    <div class="col-sm-12">
                        <label for="gallery_file"><i class="fal fa-file-image"></i></label>
                        <input type="file" name="gallery_image" id="gallery_image" class="m-0 required"
                            accept="image/*">
                    </div>
                </div>
            </form>
            <button class="add-btn color-bg" onclick="GalleryStore()">Add Gallery Image</button>
        </div>
        <div class="text-center">
            <br>
            <div id="error"></div>
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




<script>
function GetGallery() {
    $.ajax({
        type: "GET",
        url: "{{route('SchoolGalleryList')}}",
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
                    brochure +="<div class='col-lg-4'><div class='dashboard-list dash-galery-section'><div class='broch-remove' onclick=GalleryRemove(" +value.gallery_id + ",'" + value.gallery_image +"')><i class='fal fa-times'></i></div><img src='{{url('/')}}/public/portal_images/school_gallery/"+value.gallery_image+"' alt='' class='img-fluid dash-gallery-image'></div></div>";
                    $(".broucher-list").html(brochure)
                });
            } else {
                heading += "<h1>You do not have any gallery image uploaded.</h1>"
                $(".broucher-list").html(heading)
            }
        }
    })
}
GetGallery();

function GalleryStore() {
    var fields = $("input[class*='required']");
    for (let i = 0; i <= fields.length; i++) {
        if ($(fields[i]).val() === '') {
            var currentElement = $(fields[i]).attr('id');
            var value = currentElement.replaceAll('_', ' ');
            $("#error").show().addClass('alert alert-danger').html('The ' + value + ' field is required.');
            return false;
        } else {
            $("#error").hide().removeClass().html('');
        }
    }


    const form = document.querySelector('.GalleryFrom');
    const formData = new FormData(form);


    $.ajax({
        type: "POST",
        url: "{{route('GalleryStore')}}",
        data: formData,
        processData: false,
        contentType: false,
        beforeSend: function() {
            $(".register-btn").prop('disabled', true)
        },
        success: function(data) {
            $(".register-btn").prop('disabled', false)
            if (data['success'] == true) {
                GetGallery();
                $("#error").show().addClass('alert alert-success').html(data['message']);
                setTimeout(() => {
                    $("#error").hide().addClass('').html('');
                }, 1000);
            } else if (data['validate'] == true) {
                $("#error").show().addClass('alert alert-danger').html(data['message'][0]);
            } else {
                $("#error").show().addClass('alert alert-danger').html(data['message']);
            }
        }
    })
}

function GalleryRemove(gallery_id, gallery_image) {
    $.ajax({
        type: "GET",
        url: "{{route('GalleryRemove')}}",
        data: {
            gallery_id: gallery_id,
            gallery_image: gallery_image,
        },
        success: function(data) {
            GetGallery();
        }
    })
}
</script>
@endsection
