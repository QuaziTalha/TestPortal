@extends('Components.SchoolLayout')
@section('title','School Personal Profile')
@section('admin_content')

<div class="dashboard-title fl-wrap">
    <!-- Register content-->
    <div class="col-md-12">
        <!-- profile-edit-container-->
        <div class="profile-edit-container fl-wrap block_box">
            <div class="RegistrationForm">
                <form class="SchoolRegisterForm">
                    @csrf
                    <input type="hidden" name="school_id" value="{{$data->school_id ?? ''}}">
                    <input type="hidden" name="slug" id="slug" value="{{$data->school_slug ?? ''}}">
                    <div class="custom-form">
                        <div class="row">
                            <div class="col-sm-6">
                                <label>School Name <small class="text-primary">*</small> <i
                                        class="fal fa-user"></i></label>
                                <input type="text" class="required" placeholder="School Name" name="school_name"
                                    id="school_name" onkeyup="SchoolSlug()" value="{{$data->school_name ?? ''}}" />
                            </div>
                            <div class="col-md-6">
                                <label>School Type <small class="text-primary">*</small></label>
                                <div class="listsearch-input-item">
                                    <select name="school_type" id="school_type"
                                        class="chosen-select no-search-select required">
                                        <option value="Day School">Day School</option>
                                        <option value="Play School">Play School</option>
                                        <option value="Boarding School">Boarding School
                                        </option>
                                        <option value="Jr College">Jr College</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label>Syllabus <small class="text-primary">*</small></label>
                                <div class="listsearch-input-item">
                                    <select name="syllabus_type" id="syllabus_type"
                                        class="chosen-select no-search-select required">
                                        <option value="State Board">State Board</option>
                                        <option value="CBSC">CBSC</option>
                                        <option value="ICSE">ICSE</option>
                                        <option value="IB">IB</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label>Medium <small class="text-primary">*</small></label>
                                <div class="listsearch-input-item">
                                    <select name="school_medium" id="school_medium"
                                        class="chosen-select no-search-select required">
                                        <option>English</option>
                                        <option>Urdu</option>
                                        <option>Marathi</option>
                                        <option>Semi English</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label>Establishment Since<i class="fal fa-building"></i>
                                </label>
                                <input type="text"="{{$data->stablisment_since ??''}}" placeholder="Stablisment Since"
                                    name="stablisment_since" id="stablisment_since" />
                            </div>
                            <div class="col-sm-6">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label>Minimum Fees <small class="text-primary">*</small><i
                                                class="far fa-rupee-sign"></i> </label>
                                        <input type="text" class="required" value="{{$data->min_fees ??''}}"
                                            placeholder="Minimum Fees" name="min_fees" id="min_fees" />
                                    </div>
                                    <div class="col-lg-6">
                                        <label>Maximum Fees <small class="text-primary">*</small><i
                                                class="far fa-rupee-sign"></i> </label>
                                        <input type="text" class="required" value="{{$data->max_fees ??''}}"
                                            placeholder="Maximum Fees" name="max_fees" id="max_fees" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label>UDISE Code <i class="fal fa-school"></i> </label>
                                <input type="text" class="required" value="{{$data->udise_code ??''}}"
                                    placeholder="UDISE Code" name="udise_code" id="udise_code" />
                            </div>
                            <div class="col-sm-6">
                                <label> Address <small class="text-primary">*</small><i
                                        class="fas fa-map-marker-alt"></i> </label>
                                <input type="text" class="required" value="{{$data->school_address ??''}}"
                                    placeholder="School Address" name="school_address" id="school_address" />
                            </div>
                            <div class="col-sm-6">
                                <label> Location <small class="text-primary">*</small><i class="far fa-paper-plane"></i>
                                </label>
                                <input type="text" class="required" value="{{$data->school_location ??''}}"
                                    placeholder="School Location" name="school_location" id="school_location" />
                            </div>
                            <div class="col-sm-6">
                                <label>Phone <small class="text-primary">*</small><i class="far fa-phone"></i>
                                </label>
                                <input type="text" class="required" value="{{$data->school_contact_number ??''}}"
                                    placeholder="School Phone Number" name="school_contact_number"
                                    id="school_contact_number" />
                            </div>
                            <div class="col-sm-6">
                                <label>School Whatsapp<i class="fab fa-whatsapp"></i>
                                </label>
                                <input type="text" value="{{$data->school_whatsapp ??''}}"
                                    placeholder="School Whatsapp Number" name="school_whatsapp"
                                    id="school_whatsapp_number" />
                            </div>
                            <div class="col-sm-6">
                                <label>Primary Contact <small class="text-primary">*</small><i class="far fa-phone"></i>
                                </label>
                                <input type="text" class="required" value="{{$data->primary_mobile_number ??''}}"
                                    placeholder="School Primary Number" name="primary_mobile_number"
                                    id="primary_mobile_number" />
                            </div>
                            <div class="col-sm-6">
                                <label>Secondary Contact <i class="far fa-phone"></i>
                                </label>
                                <input type="text" value="{{$data->secondary_mobile_number ??''}}"
                                    placeholder="School Secondary Number" name="secondary_mobile_number"
                                    id="secondary_mobile_number" />
                            </div>
                            <div class="col-sm-6">
                                <label> Email <small class="text-primary">*</small><i class="fal fa-envelope"></i>
                                </label>
                                <input type="text" class="required" value="{{$data->school_email ??''}}"
                                    placeholder="School Email" name="school_email" id="school_email" />
                            </div>
                            <div class="col-sm-6">
                                <label> Website <i class="far fa-globe"></i> </label>
                                <input type="text" value="{{$data->school_website ??''}}" placeholder="website.com"
                                    name="school_website" id="school_website" />
                            </div>
                            <div class="col-md-6">
                                <label>Management Type <small class="text-primary">*</small></label>
                                <div class="listsearch-input-item">
                                    <select name="management_type" id="management_type"
                                        class="chosen-select no-search-select required">
                                        <option value="Government">Government</option>
                                        <option value="Private">Private</option>
                                        <option value="Fully Aided">Fully Aided</option>
                                        <option value="Semi Aided">Semi Aided</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label> Total Teacher <i class="fal fa-user-chart"></i>
                                </label>
                                <input type="text" value="{{$data->total_teacher ??''}}" placeholder="Total Teacher"
                                    name="total_teacher" id="total_teacher" />
                            </div>
                            <div class="col-sm-6">
                                <label> About School <i class="fal fa-info-circle"></i>
                                </label>
                                <input type="text" value="{{$data->school_about ??''}}" placeholder="About School"
                                    name="school_about" id="school_about" />
                            </div>
                            <div class="col-sm-12">
                                <div class="pass-input-wrap fl-wrap">
                                    <label>School Password</label>
                                    <input type="password" class="required" value="{{$data->school_password ??''}}"
                                        placeholder="School Password" name="school_password" id="school_password">
                                    <span class="eye"><i class="far fa-eye" aria-hidden="true"></i> </span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label>School Logo <small class="text-primary">*</small></label>
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
                                        <input type="file" class="upload" name="school_logo" id="school_logo"
                                            accept="image/*">
                                    </div>
                                    <div class="edit-frame">
                                        <img src="{{url('public/portal_images/school_logo')}}/{{$data->school_logo ?? ''}}"
                                            alt="" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label>School Image <small class="text-primary">*</small></label>
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
                                    <div class="edit-frame">
                                        <img src="{{url('public/portal_images/school_images')}}/{{$data->school_image ?? ''}}"
                                            alt="" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text">
                            <br>
                            <div id="error"></div>
                        </div>
                        <button type="button" class="register-btn btn color2-bg float-btn"
                            onclick="RegisterSchool()">Update<i class="fal fa-user-plus"></i></button>

                    </div>
                </form>

            </div>
        </div>
    </div>
    <!-- Register content end-->
</div>

<!-- === Selected Study Pattern ===  -->
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

<!-- === Selected Study Pattern ===  -->


<!-- === Script === -->
<script>
// --- === Slug Creating Function === --- \\
function SchoolSlug() {
    let file_value = $("#school_name").val().trim();
    let slug = file_value;
    slug = slug.replaceAll(/[^a-zA-Z ]/g, '');
    slug = slug.replaceAll(" ", "-");
    $('#slug').val(slug);
}
SchoolSlug();
// --- === Slug Creating Function === --- \\

// --- === Category Selected === --- \\
$('#syllabus_type option').filter(function(i, e) {
    if ($(e).val() == "{{$data->syllabus_type ?? ''}}") {
        $(e).prop('selected', true);
    }
    return $(e).val() == "{{$data->syllabus_type ?? ''}}"
})
$('#school_type option').filter(function(i, e) {
    if ($(e).val() == "{{$data->school_type ?? ''}}") {
        $(e).prop('selected', true);
    }
    return $(e).val() == "{{$data->school_type ?? ''}}"
})
$('#school_medium option').filter(function(i, e) {
    if ($(e).val() == "{{$data->school_medium ?? ''}}") {
        $(e).prop('selected', true);
    }
    return $(e).val() == "{{$data->school_medium ?? ''}}"
})
$('#management_type option').filter(function(i, e) {
    if ($(e).val() == "{{$data->management_type ?? ''}}") {
        $(e).prop('selected', true);
    }
    return $(e).val() == "{{$data->management_type ?? ''}}"
})
// --- === Category Selected === --- \\

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

    /* var fields = $("input[class*='required']");
    for (let i = 0; i <= fields.length; i++) {
        if ($(fields[i]).val() === '') {
            var currentElement = $(fields[i]).attr('id');
            var value = currentElement.replaceAll('_', ' ');
            $("#error").show().addClass('alert alert-danger').html('The ' + value + ' field is required.');
            return false;
        } else {
            $("#error").hide().removeClass().html('');
        }
    } */


    const form = document.querySelector('.SchoolRegisterForm');
    const formData = new FormData(form);



    // -- Form Data Append -- \\
    var school_logo = getLogoBase64;
    var school_image = getImageBase64;

    formData.append('school_logo', school_logo)
    formData.append('school_image', school_image)
    formData.append('old_logo', '{{$data->school_logo ?? '
        '}}')
    formData.append('old_image', '{{$data->school_image ?? '
        '}}')
    // -- Form Data Append -- \\


    $.ajax({
        type: "POST",
        url: "{{route('SchoolProfileUpdate')}}",
        data: formData,
        processData: false,
        contentType: false,
        beforeSend: function() {
            $(".register-btn").prop('disabled', true)
        },
        success: function(data) {
            $(".register-btn").prop('disabled', false)
            if (data['success'] == true) {
                $("#error").show().addClass('alert alert-success').html(data['message']);
                location.reload();
            } else if (data['validate'] == true) {
                $("#error").show().addClass('alert alert-danger').html(data['message'][0]);
                $(".register-btn").prop('disabled', false)
            } else {
                $("#error").show().addClass('alert alert-danger').html(data['message']);
                $(".register-btn").prop('disabled', false)
            }
        }
    })
}
</script>
<!-- === Script === -->
@endsection