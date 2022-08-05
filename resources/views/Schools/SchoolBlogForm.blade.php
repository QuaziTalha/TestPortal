@extends('Components.SchoolLayout')
@section('title','School Daily Blog')
@section('admin_content')
<!-- <script src="{{url('public/js/ckeditor.js')}}"></script> -->
<script src="https://cdn.ckeditor.com/4.16.1/full/ckeditor.js"></script>

<div class="dashboard-title fl-wrap">
    <!-- Register content-->
    <div class="col-md-12">
        <!-- profile-edit-container-->
        <div class="profile-edit-container fl-wrap block_box">
            <div class="RegistrationForm">
                <form class="SchoolRegisterForm">
                    @csrf
                    <input type="hidden" name="blog_id" id="blog_id" value="{{$data->blog_id ?? ''}}">
                    <div class="custom-form">
                        <div class="row">
                            <div class="col-sm-12">
                                <label>Blog Title <small class="text-primary">*</small> <i
                                        class="fal fa-blog"></i></label>
                                <input type="text" class="required" placeholder="Blog Title" name="blog_title"
                                    id="blog_title" value="{{$data->blog_title ?? ''}}" />
                            </div>
                            @if(!empty($data) > 0)
                            @if($data->blog_image != "")
                            <div class="col-sm-6">
                                <label>Blog Image <small class="text-primary">*</small></label>
                                <div class="listsearch-input-item fl-wrap">
                                    <div class="fuzone">
                                        <div class="fu-text">
                                            <span><i class="fal fa-images"></i> Click here
                                                or
                                                drop files
                                                to
                                                upload</span>
                                            <div class="photoUpload-files fl-wrap"></div>
                                        </div>
                                        <input type="file" class="upload" name="school_image" id="school_image"
                                            accept="image/*">
                                    </div>
                                </div>
                            </div>
                            @endif
                            @else
                            <div class="col-sm-12">
                                <label>Blog Image <small class="text-primary">*</small></label>
                                <div class="listsearch-input-item fl-wrap">
                                    <div class="fuzone">
                                        <div class="fu-text">
                                            <span><i class="fal fa-images"></i> Click here
                                                or
                                                drop files
                                                to
                                                upload</span>
                                            <div class="photoUpload-files fl-wrap"></div>
                                        </div>
                                        <input type="file" class="upload" name="school_image" id="school_image"
                                            accept="image/*">
                                    </div>
                                </div>
                            </div>
                            @endif
                            @if(!empty($data) > 0)
                            @if($data->blog_image != "")
                            <div class="col-sm-6">
                                <div class="">
                                    <img src="{{url('public/portal_images/blog_images')}}/{{$data->blog_image ?? ''}}"
                                        alt="" class="img-fluid" style="margin: 0 0 9px 0;">
                                </div>
                            </div>
                            @endif
                            @endif
                            <div class="col-sm-12">
                                <!-- <label> Blog Description <small class="text-primary">*</small> -->
                                </label>
                                <textarea cols="40" rows="2" placeholder="Blog Description" id="blog_description"
                                    name="blog_description">{{$data->blog_description ?? ''}}</textarea>
                            </div>
                        </div>
                        <div class="text">
                            <br>
                            <div id="error"></div>
                        </div>
                        <button type="button" class="register-btn btn color2-bg float-btn" onclick="Blog()">Store<i
                                class="fal fa-user-plus"></i></button>

                    </div>
                </form>

            </div>
        </div>
    </div>
    <!-- Register content end-->
</div>

<!-- === Modal === -->
<!-- ### Modal ### -->
<div class="main-register-wrap modal_3">
    <div class="reg-overlay_3"></div>
    <div class="main-register-holder tabs-act">
        <div class="main-register fl-wrap  modal_main_3">
            <div class="main-register_title">Welcome to
                <span><strong>Campus</strong>Connect<strong>.</strong></span>
            </div>
            <div class="close-reg close-3"><i class="fal fa-times"></i></div>
            <!--tabs -->
            <div class="tabs-container">
                <div class="cropper-img-area">
                    <img src="{{url('public/images/bg/')}}" alt="" class="img-fluid img-preview-2">
                </div>
                <div class="crop-btn">
                    <button type="button" class=" b-none crop-img-btn-2 btn color2-bg float-btn">Save <i
                            class="fas fa-save"></i></button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- === Image Model === -->
<!-- === Modal === -->

<!-- === Main Script === -->
<script>
var school_image = $("#school_image");
var canvas_image = ""
var getImageBase64 = ""
// CKEDITOR.replace('blog_description');
CKEDITOR.replace('blog_description');





school_image.on('change', function() {
    var files = this.files;
    if (files && files.length > 0) {
        var photo = files[0];
        var reader = new FileReader();
        reader.onload = function(event) {
            var image = $('.img-preview-2')[0];
            image.src = event.target.result;
            NewSchoolImage = new Cropper(image, {
                aspectRatio: 6 / 4,
                responsive: true,
                viewMode: 3,
            });
            ModalOpen2();
        };
        reader.readAsDataURL(photo);
    }
});

$(".crop-img-btn-2").click(function(e) {
    e.preventDefault()
    canvas_image = NewSchoolImage.getCroppedCanvas({
        width: 600,
        height: 400,
        imageSmoothingQuality: 'high',
    });
    var crop_image = canvas_image.toBlob(function(blob) {
        url = URL.createObjectURL(blob);
        var reader = new FileReader();
        reader.readAsDataURL(blob);
        reader.onloadend = function() {
            getImageBase64 = reader.result;
        }
    });
    if (getImageBase64 != "") {
        $('.modal_3 , .reg-overlay_3').fadeOut(200);
        $("html, body").removeClass("hid-body");
        $(".modal_main_3").removeClass("vis_mr");
        NewSchoolImage.destroy();
    }
})


// <!-- === BLog Function ===  -->
function Blog() {
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


    const form = document.querySelector('.SchoolRegisterForm');
    const formData = new FormData(form);



    // -- Form Data Append -- \\
    var school_image = getImageBase64;
    formData.append('school_image', school_image)
    formData.append('old_image', "{{$data->blog_image ?? ''}}");
    formData.append('blog_description', CKEDITOR.instances.blog_description.getData()),
        // -- Form Data Append -- \\


        $.ajax({
            type: "POST",
            url: "{{route('SchoolBlogStore')}}",
            data: formData,
            processData: false,
            contentType: false,
            success: function(data) {
                if (data['success'] == true) {
                    $("#error").show().addClass('alert alert-success').html(data['message']);
                    window.location = "{{url('Schools/SchoolBlog')}}/{{Session::get('token')}}";
                } else if (data['validate'] == true) {
                    $("#error").show().addClass('alert alert-danger').html(data['message'][0]);
                } else {
                    $("#error").show().addClass('alert alert-danger').html(data['message']);
                }
            }
        })
}
// <!-- === BLog Function ===  -->
</script>
<!-- === Main Script === -->

@endsection