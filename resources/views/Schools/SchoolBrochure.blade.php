@extends('Components.SchoolLayout')
@section('title','School Personal Profile')
@section('admin_content')


<div class="dashboard-title fl-wrap">
    <h3>School Brochure</h3>
</div>

<div class="card dashboard-list-box mar-dash-list fl-wrap">
    <div class="card-header">

        <div class="d-flex justify-content-between">
            <form class="BrochureFrom">
                @csrf
                <div class="row custom-form">
                    <div class="col-sm-6">
                        <label for="brochure_file"><i class="fal fa-file-signature"></i></label>
                        <input type="text" name="brochure_title" id="brochure_title" placeholder="Brochure title"
                            class="m-0 required">
                    </div>
                    <div class="col-sm-6">
                        <label for="brochure_file"><i class="fal fa-file"></i></label>
                        <input type="file" name="brochure_file" id="brochure_file" class="m-0 required">
                    </div>
                </div>
            </form>
            <button class="add-btn color-bg" onclick="BrochureStore()">Add Brochure</button>
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
function GetBrochure() {
    $.ajax({
        type: "GET",
        url: "{{route('SchoolBrochureList')}}",
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
                brochure +="<div class='col-lg-4'><div class='dashboard-list fl-wrap'><div class='broch-card'><div class='broch-remove' onclick=BrochureRemove(" +
                    value.brochure_id +",'" + value.brochure_file +"')><i class='fal fa-times'></i></div><a href='{{url('/')}}/public/portal_images/school_brochure/" +value.brochure_file +"' target='_blank'><div class='broch-header'><i class='fal fa-file-pdf text-primary'></i></div><div class='broch-body'><p><a href='{{url('/')}}/public/portal_images/school_brochure/" +
                    value.brochure_file + "' target='_blank' class='text-primary'>" + value
                    .brochure_title + "</a></p></div></a></div></div></div>";
                $(".broucher-list").html(brochure)
            });
            }else{
                heading += "<h1>You do not have any brochures uploaded.</h1>"
                $(".broucher-list").html(heading)
            }
        }
    })
}
GetBrochure();

function BrochureStore() {
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


    const form = document.querySelector('.BrochureFrom');
    const formData = new FormData(form);


    $.ajax({
        type: "POST",
        url: "{{route('BrochureStore')}}",
        data: formData,
        processData: false,
        contentType: false,
        beforeSend: function() {
            $(".register-btn").prop('disabled', true)
        },
        success: function(data) {
            $(".register-btn").prop('disabled', false)
            if (data['success'] == true) {
                GetBrochure();
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

function BrochureRemove(brochure_id, brochure_file) {
    $.ajax({
        type: "GET",
        url: "{{route('BrochureRemove')}}",
        data: {
            brochure_id: brochure_id,
            brochure_file: brochure_file,
        },
        success: function(data) {
            console.log(data);
            GetBrochure();
        }
    })
}
</script>
@endsection