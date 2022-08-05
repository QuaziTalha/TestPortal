@extends('Components.Layout')
@section('title','School Registration || Campus Connect')
@section('content')
<link type="text/css" rel="stylesheet" href="{{url('public/css/dashboard-style.css')}}">
<!--  section  -->
<!-- == Login And Register Tab == -->
<section class="gray-bg main-dashboard-sec" id="sec1">
    <div class="container">

        <div class="col-lg-9 mx-center">
            <div class="listsearch-input-wrap  fl-wrap tabs-act " id="lisfw">
                <div class="listsearch-input-wrap_contrl fl-wrap">
                    <div class="container">
                        <ul class="tabs-menu fl-wrap no-list-style">
                            <li class="current"><a href="#Register_tab"> <i class="fal fa-user-plus"></i> Register </a>
                            </li>
                            <li><a href="#Login_tab"> <i class="fal fa-sign-in-alt"></i> Login</a></li>
                        </ul>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="container">
                    <!--tabs -->
                    <div class="tabs-container fl-wrap">
                        <!--tab -->
                        <div class="tab">
                            <div id="Register_tab" class="tab-content  first-tab ">
                                <!-- Register content-->
                                <div class="col-md-12">
                                    <!-- profile-edit-container-->
                                    <div class="profile-edit-container fl-wrap block_box">
                                        <div class="RegistrationForm">
                                            <form class="SchoolRegisterForm">
                                                @csrf
                                                <input type="hidden" name="slug" id="slug">
                                                <div class="custom-form">
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <label>School Name <small class="text-primary">*</small> <i
                                                                    class="fal fa-user"></i></label>
                                                            <input type="text" class="required"
                                                                placeholder="School Name" name="school_name"
                                                                id="school_name" onkeyup="SchoolSlug()" />
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <label>UDISE Code <i class="fal fa-school"></i> </label>
                                                            <input type="text" class="required" placeholder="UDISE Code"
                                                                name="udise_code" id="udise_code" />
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <label> Address <small class="text-primary">*</small><i
                                                                    class="fas fa-map-marker-alt"></i> </label>
                                                            <input type="text" class="required"
                                                                placeholder="School Address" name="school_address"
                                                                id="school_address" />
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <label>Phone <small class="text-primary">*</small><i
                                                                    class="far fa-phone"></i>
                                                            </label>
                                                            <input type="text" class="required"
                                                                placeholder="School Phone Number"
                                                                name="school_contact_number"
                                                                id="school_contact_number" />
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <label> Email <small class="text-primary">*</small><i
                                                                    class="fal fa-envelope"></i>
                                                            </label>
                                                            <input type="text" class="required"
                                                                placeholder="School Email" name="school_email"
                                                                id="school_email" />
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="pass-input-wrap fl-wrap">
                                                                <label>School Password</label>
                                                                <input type="password" class="required"
                                                                    placeholder="School Password" name="school_password"
                                                                    id="school_password">
                                                                <span class="eye"><i class="far fa-eye"
                                                                        aria-hidden="true"></i> </span>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <label>School Logo <small
                                                                    class="text-primary">*</small></label>
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
                                                                    <input type="file" class="upload" name="school_logo"
                                                                        id="school_logo" accept="image/*">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <label>School Image <small
                                                                    class="text-primary">*</small></label>
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
                                                                    <input type="file" class="upload"
                                                                        name="school_image" id="school_image"
                                                                        accept="image/*">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="text">
                                                        <br>
                                                        <div id="error"></div>
                                                    </div>
                                                    <button type="button" class="register-btn btn color2-bg float-btn"
                                                        onclick="RegisterSchool()">Register<i
                                                            class="fal fa-user-plus"></i></button>

                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                                <!-- Register content end-->
                            </div>
                        </div>
                        <!--tab end-->
                        <!--tab -->
                        <div class="tab">
                            <div id="Login_tab" class="tab-content">
                                <!-- Login content -->
                                <div class="col-md-12">
                                    <!-- profile-edit-container-->
                                    <div class="profile-edit-container fl-wrap block_box">
                                        <div class="RegistrationForm">
                                            <form class="SchoolLoginForm">
                                                @csrf
                                                <div class="custom-form">
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <label> School Email <small class="text-primary">*</small><i
                                                                    class="fal fa-envelope"></i>
                                                            </label>
                                                            <input type="text" placeholder="School Email"
                                                                name="school_email" id="school_email" />
                                                        </div>
                                                        <div class="col-sm-12">
                                                            <label> Password <small class="text-primary">*</small><i
                                                                    class="fal fa-unlock"></i>
                                                            </label>
                                                            <input type="password" placeholder="Password"
                                                                name="school_password" id="school_password" />
                                                        </div>
                                                    </div>
                                            </form>
                                            <div class="text">
                                                <br>
                                                <div id="log_error"></div>
                                            </div>
                                            <button type="button" class="register-btn btn color2-bg float-btn"
                                                onclick="LoginSchool()">Login<i class="fal fa-sign-in-alt"></i></button>

                                        </div>
                                    </div>
                                </div>
                                <!-- Login content end -->
                            </div>
                        </div>
                        <!--tab end-->
                    </div>
                    <!--tabs end-->
                </div>
            </div>
        </div>
    </div>
</section>
<!-- == Login And Register Tab == -->



<!--  section  end-->






<!-- === Image Model === -->
<div class="main-register-wrap modal_2">
    <div class="reg-overlay_2"></div>
    <div class="main-register-holder tabs-act">
        <div class="main-register fl-wrap  modal_main_2">
            <div class="main-register_title">Welcome to
                <span><strong>Campus</strong>Connect<strong>.</strong></span>
            </div>
            <div class="close-reg close-2"><i class="fal fa-times"></i></div>
            <!--tabs -->
            <div class="tabs-container">
                <div class="cropper-img-area">
                    <img src="{{url('public/images/bg/29.jpg')}}" alt="" class="img-fluid img-preview">
                </div>
                <div class="crop-btn">
                    <button type="button" class=" b-none crop-img-btn btn color2-bg float-btn">Save <i
                            class="fas fa-save"></i></button>
                </div>
            </div>
        </div>
    </div>
</div>
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

<script>
// --- === Slug Creating Function === --- \\
function SchoolSlug() {
    let file_value = $("#school_name").val().trim();
    let slug = file_value;
    slug = slug.replaceAll(/[^a-zA-Z ]/g, '');
    slug = slug.replaceAll(" ", "-");
    $('#slug').val(slug);
}
// --- === Slug Creating Function === --- \\

var school_logo = $("#school_logo");
var school_image = $("#school_image");
var logo = ""
var NewSchoolImage = ""
var canvas_logo = ""
var canvas_image = ""
var getLogoBase64 = ""
var getImageBase64 = ""

school_logo.on('change', function() {
    var files = this.files;
    if (files && files.length > 0) {
        var photo = files[0];
        var reader = new FileReader();
        reader.onload = function(event) {
            var image = $('.img-preview')[0];
            image.src = event.target.result;
            logo = new Cropper(image, {
                viewMode: 1,
                aspectRatio: 1,
                maxCropBoxWidth: 150,
                maxCropBoxHeight: 150,
                responsive: true,
            });
            ModalOpen();
        };
        reader.readAsDataURL(photo);
    }
});
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

$(".crop-img-btn").click(function(e) {
    e.preventDefault()
    canvas_logo = logo.getCroppedCanvas({
        width: 150,
        height: 150,
        imageSmoothingQuality: 'high',
    });
    var crop_logo = canvas_logo.toBlob(function(blob) {
        url = URL.createObjectURL(blob);
        var reader = new FileReader();
        reader.readAsDataURL(blob);
        reader.onloadend = function() {
            getLogoBase64 = reader.result;
        }
    });
    if (getLogoBase64 != "") {
        $('.modal_2 , .reg-overlay_2').fadeOut(200);
        $("html, body").removeClass("hid-body");
        $(".modal_main_2").removeClass("vis_mr");
        logo.destroy();
    }
})
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

function RegisterSchool() {

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
    var school_logo = getLogoBase64;
    var school_image = getImageBase64;

    formData.append('school_logo', school_logo)
    formData.append('school_image', school_image)
    // -- Form Data Append -- \\


    $.ajax({
        type: "POST",
        url: "{{url('SchoolRegister')}}",
        data: formData,
        processData: false,
        contentType: false,
        beforeSend: function() {
            $(".register-btn").prop('disabled', true)
        },
        success: function(data) {
            $(".register-btn").prop('disabled', false);
            if (data['success'] == true) {
                $("#error").show().addClass('alert alert-success').html(data['message']);
                window.location.href = "{{url('/')}}/Schools/SchoolProfile/" + data['token'] + "";
            } else if (data['validate'] == true) {
                $("#error").show().addClass('alert alert-danger').html(data['message'][0]);
            } else {
                $("#error").show().addClass('alert alert-danger').html(data['message']);
            }
        }
    })
}

function LoginSchool() {
    $.ajax({
        type: "POST",
        url: "{{url('SchoolLogin')}}",
        data: $(".SchoolLoginForm").serialize(),
        beforeSend: function() {
            $(".register-btn").prop('disabled', true)
        },
        success: function(data) {
            $(".register-btn").removeProp('disabled')
            if (data['success'] == true) {
                $("#log_error").show().addClass('alert alert-success').html(data['message']);
                window.location.href = "{{url('/')}}/Schools/SchoolProfile/" + data['token'] + "";
                $(".register-btn").prop('disabled', false)
            } else if (data['validate'] == true) {
                $("#log_error").show().addClass('alert alert-danger').html(data['message'][0]);
                $(".register-btn").prop('disabled', false)
            } else {
                $("#log_error").show().addClass('alert alert-danger').html(data['message']);
                $(".register-btn").prop('disabled', false)
            }
        }

    })
}
</script>
@endsection