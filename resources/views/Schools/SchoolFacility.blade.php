@extends('Components.SchoolLayout')
@section('title','School Personal Profile')
@section('admin_content')


<div class="dashboard-title fl-wrap">
    <h3>School Facilities</h3>
</div>

<div class="card dashboard-list-box mar-dash-list fl-wrap">
    <div class="card-header">

        <div class="d-flex justify-content-between">
            <form class="FacilityFrom">
                @csrf
                <div class="row custom-form">
                    <div class="col-sm-6">
                        <label for="facility_name"><i class="fal fa-file-signature"></i></label>
                        <input type="text" name="facility_name" id="facility_name" placeholder="Facility Name"
                            class="m-0 required">
                    </div>
                    <div class="col-sm-6">
                        <label for="brochure_file"><i class="fal fa-file-image"></i></label>
                        <input type="file" name="facility_picture" id="facility_picture" class="m-0 required"
                            accept="image/*">
                    </div>
                </div>
            </form>
            <button class="add-btn color-bg" onclick="FacilityStore()">Add Facilities</button>
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
function GetFacility() {
    $.ajax({
        type: "GET",
        url: "{{route('FacilityList')}}",
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
                        "<div class='dashboard-list fl-wrap'><div class='dashboard-message'><div class='booking-list-contr'><a href='javascript:void(0)' class='red-bg tolt' data-microtip-position='left' data-tooltip='Delete' onclick=FacilityRemove(" + value.facility_id + ",'" + value.facility_picture +"')><i class='fal fa-trash'></i></a></div><div class='dashboard-message-text'><img src='{{url('/')}}/public/portal_images/school_facility/" + value.facility_picture +"' alt=''><h4><a href='javascript:void(0)'>" + value.facility_name + "</a></h4>    <div class='geodir-category-location clearfix v-none'><a href='#'> sdfsd</a></div></div></div></div>";
                    $(".broucher-list").html(brochure)
                });
            } else {
                heading += "<h1>You do not have any brochures uploaded.</h1>"
                $(".broucher-list").html(heading)
            }
        }
    })
}
GetFacility();

function FacilityStore() {
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


    const form = document.querySelector('.FacilityFrom');
    const formData = new FormData(form);


    $.ajax({
        type: "POST",
        url: "{{route('FacilityStore')}}",
        data: formData,
        processData: false,
        contentType: false,
        beforeSend: function() {
            $(".register-btn").prop('disabled', true)
        },
        success: function(data) {
            $(".register-btn").prop('disabled', false)
            if (data['success'] == true) {
                GetFacility();
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

function FacilityRemove(facility_id, facility_picture) {
    $.ajax({
        type: "GET",
        url: "{{route('FacilityRemove')}}",
        data: {
            facility_id: facility_id,
            facility_picture: facility_picture,
        },
        success: function(data) {
            GetFacility();
        }
    })
}
</script>
@endsection
