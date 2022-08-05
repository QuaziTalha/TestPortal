@extends('Components.AdminLayout')
@section('title', 'Campus Connekt Scholarships')
@section('content')
    {{-- Custom Style for this Page --}}
    <style>
         .approval-btn{
            margin: 3px;
            height: 40px;
            width: 40px;
            font-size: 20px;
        }
        .form-label {
            padding-top: 20px;
        }
    </style>
    {{-- Custom Style for this Page --}}

    {{-- Main Content --}}
    {{-- Header --}}
    <div class="card">
        <div class="card-header">
            <h4 class="m-0">Scholarships</h4>
        </div>
    </div>
    {{-- Header --}}
    <div class="card mt-3">
        <div class="row">
            <div class="col-6">
                <div class="card-header">
                    <h5>All Scholarships Lists</h5>
                </div>
            </div>
            <div class="col-6">
                <div class="card-header">
                    <button class="btn btn-primary" style="float: right;" onclick="InsertModal()">Add Scholarships</button>
                </div>
            </div>

        </div>
        <hr class="m-0">
        {{-- Datatable --}}
        <div class="card-body">
            <table id="datatable" class="datatables-basic table table-bordered text-center">
                <thead>
                    <tr>
                        <th>Scholarships Name</th>
                        <th>Scholarships Description</th>
                        <th>Scholarships Documents</th>
                        <th>Action</th>
                    </tr>
                </thead>
            </table>
        </div>
        {{-- Datatable --}}
    </div>

    {{-- Cropper Modal --}}
    <div class="modal fade z-99" id="CropperModal" aria-labelledby="varyingModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="varyingModalLabel">Scholarships Cropper Modal</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
                </div>
                <div class="modal-body">
                    <div class="cropper-img-area">
                        <img src="{{ url('public/images/bg/') }}" alt="" class="img-fluid img-preview-2">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary login-btn" id="cropper_save">
                    <div>Save</div>
                    </button>
                </div>
            </div>
        </div>
    </div>
    {{-- Cropper Modal --}}

    {{-- Modal --}}
    <div class="modal fade" id="ScholarshipsCreateModal" tabindex="-1" aria-labelledby="varyingModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="varyingModalLabel">Scholarships Insert</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
                </div>
                <div class="modal-body">
                    <form id="CreateForm" enctype="multipart/form-data">
                        @csrf
                        <input class="form-control" id="scholarship_id" name="scholarship_id" type="hidden" value="">
                        <label for="scholarship_name" class="form-label" value = "">Scholarships Name</label>
                        <input class="form-control" type="text" id="scholarship_name" name="scholarship_name" >
                        <label for="scholarship_desc" class="form-label">Scholarships Description</label>
                        <textarea class="form-control" id="scholarship_desc" rows="5" name="scholarship_desc"></textarea>
                        <label for="scholarship_file" class="form-label">Scholarships File</label>
                        <input type="file" class="upload form-control" name="scholarship_file" id="scholarship_file">
                    </form>
                    <div class="text-center">
                        <div id="error"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary login-btn" onclick="InsertScholarships()">
                        <div id="button-spinner" class="spinner-border" style="color: white; display: none;" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                        <div id="button-text">Store</div>
                    </button>
                </div>
            </div>
        </div>
    </div>
    {{-- Modal --}}

    {{-- Details Modal --}}
    <div class="modal fade" id="BlogDetailsModal" tabindex="-1" aria-labelledby="varyingModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="varyingModalLabel"><i class="bx bx-list-ul bx-sm me-2"></i> Blog Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
                </div>
                <div class="modal-body">
                    <h4 id="scholarship-title"></h4>
                    <hr class="m-0 mb-3">
                    <div class="m-3 overflow-hidden perfect-scroll" id="scholarship-desc" style="word-break: break-word; max-height: 250px;"></div>
                    <div class="col-12">
                        <a id="scholarship-file" href="" style="text-decoration: none">
                        <button disabled="" class="btn btn-icon btn-lg rounded-pill btn-light">
                            <i class="bx bx-md bx-file" style="color: #39da8a"></i>
                        </button>
                        File
                        </a>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    {{-- Details Modal --}}

    {{-- Main Content --}}

    {{-- Main Script --}}
    <script>

        /* DataTable Function  */
        $(document).ready(function() {
            GetScholarshipsData();
            $('.perfect-scroll').each(function() {
                const ps = new PerfectScrollbar($(this)[0], {
                    wheelPropagation: !1
                });
            });
        })
        function GetScholarshipsData() {
            var dataTables = $('#datatable').DataTable({
                ordering: false,
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{route('GetScholarshipList')}}"
                },
                columns: [{
                        data: 'scholarship_name',
                        "searchable": true,
                        "orderable": false,
                    },
                    {
                        data: 'scholarship_desc',
                        render: function(scholarship_desc) {
                            if(scholarship_desc.length > 150) {
                                scholarship_desc = scholarship_desc.substring(0,150)+"  ...";
                                console.log('shorten')
                            }
                          return scholarship_desc;
                        },
                        "searchable": true,
                        "orderable": false,
                    },
                    {
                        data: 'scholarship_file',
                        "searchable": true,
                        "orderable": false,
                    },

                    {
                        data: 'action',
                        "searchable": true,
                        "orderable": false,
                    },
                ]
            });
        }
        /* DataTable Function  */

        /* Scholarships Create And Update Modal  */
        function InsertModal(data) {
            if($(data).data("id") !== "" || $(data).data("id") !== null){
                $("#scholarship_id").val($(data).data("id"));
                $("#scholarship_name").val($(data).data("name"));
                $("#scholarship_desc").val($(data).data("desc"));
            }
            $("#ScholarshipsCreateModal").modal('show');
        }
        /* Scholarships Create And Update Modal  */


        /* Scholarships Create and Update Function  */
        function InsertScholarships() {
            /* Validation */
            if ($("#scholarship_name").val() == "" || $("#scholarship_name").val() == null) {
                $("#error").show().addClass('alert alert-danger').html("Please fill the Scholarships Name Field");
                return false;
            }
            if ($("#scholarship_desc").val() == "" || $("#scholarship_desc").val() == null) {
                $("#error").show().addClass('alert alert-danger').html("Please fill the Scholarships Description Field");
                return false;
            }
            if ($("#scholarship_id").val() == "" || $("#scholarship_id").val() == null) {
                console.log('you have no id');
            if ($("#scholarship_file").val() == "" || $("#scholarship_file").val() == null) {
                $("#error").show().addClass('alert alert-danger').html("Please fill the Scholarships Image Field");
                return false;
            }
            }
            /* Validation */

            /* Appending Cropped Image in Form Data */
            const form = document.querySelector('#CreateForm');
            const formData = new FormData(form);
            formData.append('scholarship_file', $("#scholarship_file").val().files);
            /* Appending Cropped Image in Form Data */

            /* Ajax Request */
            $.ajax({
                type: "POST",
                url: "{{route('ScholarshipStore')}}",
                processData: false,
                contentType: false,
                data: formData,
                beforeSend: function() {
                    $("#button-text").hide()
                    $("#button-spinner").show()
                },
                success: function(data) {
                    $("#button-text").show()
                    $("#button-spinner").hide()
                    $('#CreateForm').trigger("reset");
                    $("#ScholarshipsCreateModal").modal('hide')
                    if (data['success'] == true) {
                        Swal.fire('Success!', data.message, 'success');
                        $('#datatable').DataTable().ajax.reload();
                    } else {
                        Swal.fire('Oops!', data.message, 'error');
                        $('#datatable').DataTable().ajax.reload();
                    }
                }

            })
            /* Ajax Request */
        }
        /* Scholarships Create and Update Function  */

        /* Scholarships Details Modal  */
        function Details(data) {
            $("#BlogDetailsModal").modal('show');
            $("#scholarship-title").html($(data).data("title"));
            $("#scholarship-desc").html($(data).data("desc"));
            $("#scholarship-file").attr("href", "{{url('public/portal_images/scholarship_files/')}}/"+$(data).data("image"));
        }
        /* Scholarships Details Modal  */

        /* Scholarship Delete Function  */
        function DeleteScholarship(data) {
            var scholarship_id = $(data).data("id");
            $.ajax({
                type: "GET",
                url: "{{ route('ScholarshipDelete') }}",
                data: {
                    scholarship_id: scholarship_id
                },
                beforeSend: function() {
                    $("#delete-btn").prop('disabled', true);
                },
                success: function(data) {
                    $("#delete-btn").prop('disabled', false);
                    if (data['success'] == true) {
                        Swal.fire(
                            'Success!', data.message, 'success'
                        )
                        $('#datatable').DataTable().ajax.reload();
                    } else {
                        Swal.fire(
                            'Oops!', data.message, 'Error'
                        )
                        $('#datatable').DataTable().ajax.reload();
                    }
                }
            })
        }
        /* Scholarship Delete Function  */
    </script>
    {{-- Main Script --}}
@endsection();
