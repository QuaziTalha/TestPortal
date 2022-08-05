@extends('Components.SchoolLayout')
@section('title','School Eligibility || Campus Portal')
@section('admin_content')


<div class="dashboard-title fl-wrap">
    <h3>School Eligibilities</h3>
</div>

<div class="card dashboard-list-box mar-dash-list fl-wrap">
    <div class="card-header">

        <div class="d-flex justify-content-between">
            <form class="EligibilityFrom">
                @csrf
                <div class="row custom-form col-sm-12">
                    <input type="hidden" id="eligibity_id" name="eligibity_id">
                    <div class="col-sm-6">
                        <label for="eligibity"><i class="far fa-circle"></i></label>
                        <input type="text" name="eligibity" id="eligibity" placeholder="Eligibity" class="m-0 required">
                    </div>
                    <div class="col-sm-6">
                        <label for="eligibity_value"><i class="far fa-circle"></i></label>
                        <input type="text" name="eligibity_value" id="eligibity_value" class="m-0 required"
                            placeholder="Eligibity Value">
                    </div>
                </div>
            </form>
            <button class="add-btn color-bg" onclick="EligibilityStore()">Add Eligibility</button>
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
    <div class='dashboard-list'>
        <table class='display table table-striped table-bordered dataTable'>
            <tr>
                <th>Eligibility </th>
                <th>Eligibility Value</th>
                <th>Action</th>
            </tr>
            <tbody class="eligibility-list">
                <td colspan="3">
                    <div class="bg-white loader d-none">
                        <img src="{{url('public/portal_images/loader_gif.gif')}}" alt="" width="150">
                    </div>
                </td>
            </tbody>
        </table>
    </div>
</div>
<!-- === Content ===  -->






<script>
function GetEligibility() {
    $.ajax({
        type: "GET",
        url: "{{route('EligibilityList')}}",
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
                    brochure += "<tr><td>" + value.eligibity + "</td><td>" + value.eligibity_value +
                        "</td><td><div class='booking-list-custom'><button type='button' class='color-bg tolt' data-microtip-position='left' data-tooltip='Edit' onclick=EligibilityEdit(" +
                        value.eligibity_id +
                        ")><i class='fal fa-edit'></i></button><button type='button' class='red-bg tolt' data-microtip-position='left' data-tooltip='Delete' onclick=EligibilityRemove(" +
                        value.eligibity_id +
                        ")><i class='fal fa-trash'></i></button></div></td></tr>";
                    $(".eligibility-list").html(brochure)
                });
            } else {
                heading += "<td colspan='3'>You do not have any eligibility uploaded.</td>"
                $(".eligibility-list").html(heading)
            }
        }
    })
}
GetEligibility();

// --- === Eligibility Store Function === --- \\
function EligibilityStore() {
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


    const form = document.querySelector('.EligibilityFrom');
    const formData = new FormData(form);


    $.ajax({
        type: "POST",
        url: "{{route('EligibilityStore')}}",
        data: formData,
        processData: false,
        contentType: false,
        beforeSend: function() {
            $(".register-btn").prop('disabled', true)
        },
        success: function(data) {
            $(".register-btn").prop('disabled', false)
            if (data['success'] == true) {
                GetEligibility();
                $("#error").show().addClass('alert alert-success').html(data['message']);
                setTimeout(() => {
                    $("#error").hide().addClass('').html('');
                    $('.EligibilityFrom')[0].reset();
                    $(".add-btn").text('Add Eligibity')
                }, 1000);
            } else if (data['validate'] == true) {
                $("#error").show().addClass('alert alert-danger').html(data['message'][0]);
            } else {
                $("#error").show().addClass('alert alert-danger').html(data['message']);
            }
        }
    })
}
// --- === Eligibility Store Function === --- \\

// --- === Eligibility Edit Function === --- \\
function EligibilityEdit(eligibity_id) {

    $.ajax({
        type: "GET",
        url: "{{route('EligibilityEdit')}}",
        data : {
            eligibity_id : eligibity_id
        },
        success: function(data) {
            $("#eligibity_id").val(data[0]['eligibity_id']);
            $("#eligibity").val(data[0]['eligibity']);
            $("#eligibity_value").val(data[0]['eligibity_value']);
            $(".add-btn").text('Update Eligibity')

        }
    })
}
// --- === Eligibility Edit Function === --- \\

function EligibilityRemove(eligibity_id) {
    $.ajax({
        type: "GET",
        url: "{{route('EligibilityRemove')}}",
        data: {
            eligibity_id: eligibity_id,
        },
        success: function(data) {
            $('.EligibilityFrom')[0].reset();
            GetEligibility();
        }
    })
}
</script>
@endsection
