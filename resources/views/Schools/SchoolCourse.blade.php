@extends('Components.SchoolLayout')
@section('title','School Courses || Campus Portal')
@section('admin_content')


<div class="dashboard-title fl-wrap">
    <h3>School Courses</h3>
</div>

<div class="card dashboard-list-box mar-dash-list fl-wrap">
    <div class="card-header">

        <div class="d-flex justify-content-between">
            <form class="CourseFrom">
                @csrf
                <input type="hidden" name="course_id" id="course_id">
                <div class="row custom-form col-sm-12">
                    <div class="col-sm-6">
                        <label for="course_name"><i class="fal fa-graduation-cap"></i></label>
                        <input type="text" name="course_name" id="course_name" placeholder="Course Name"
                            class="m-0 required">
                    </div>
                    <div class="col-sm-6">
                        <label for="course_fees"><i class="fal fa-rupee-sign"></i></label>
                        <input type="text" name="course_fees" id="course_fees" class="m-0 required"
                            placeholder="Courses Fees">
                    </div>
                </div>
            </form>
            <button class="add-btn color-bg" onclick="CourseStore()">Add Brochure</button>
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
                <th>Course Name</th>
                <th>Course Fees</th>
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
function GetCourse() {
    $.ajax({
        type: "GET",
        url: "{{route('CourseList')}}",
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
                    brochure += "<tr><td>" + value.course_name + "</td><td>" + value.course_fees +
                        "</td><td><div class='booking-list-custom'><button type='button' class='color-bg tolt' data-microtip-position='left' data-tooltip='Edit' onclick=CourseEdit(" +
                        value.course_id +
                        ")><i class='fal fa-edit'></i></button><button type='button' class='red-bg tolt' data-microtip-position='left' data-tooltip='Delete' onclick=CourseRemove(" +
                        value.course_id +
                        ")><i class='fal fa-trash'></i></button></div></td></tr>";
                    $(".eligibility-list").html(brochure)
                });
            } else {
                heading += "<td colspan='3'>You do not have any course uploaded.</td>"
                $(".eligibility-list").html(heading)
            }
        }
    })
}
GetCourse();

function CourseStore() {
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


    const form = document.querySelector('.CourseFrom');
    const formData = new FormData(form);


    $.ajax({
        type: "POST",
        url: "{{route('CourseStore')}}",
        data: formData,
        processData: false,
        contentType: false,
        beforeSend: function() {
            $(".register-btn").prop('disabled', true)
        },
        success: function(data) {
            $(".register-btn").prop('disabled', false)
            if (data['success'] == true) {
                GetCourse();
                $("#error").show().addClass('alert alert-success').html(data['message']);
                $(".add-btn").text('Add Course')
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


// --- === Course Edit === --- \\
function CourseEdit(course_id) {
    $.ajax({
        type: "GET",
        url: "{{route('CourseEdit')}}",
        data: {
            course_id: course_id,
        },
        success: function(data) {
            $("#course_id").val(data['course_id'])
            $("#course_name").val(data['course_name'])
            $("#course_fees").val(data['course_fees'])
            $(".add-btn").text('Update Course')
        }
    })
}
// --- === Course Edit === --- \\
function CourseRemove(course_id) {
    $.ajax({
        type: "GET",
        url: "{{route('CourseRemove')}}",
        data: {
            course_id: course_id,
        },
        success: function(data) {
            GetCourse();
        }
    })
}
</script>
@endsection
