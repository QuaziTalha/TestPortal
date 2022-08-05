@extends('Components.AdminLayout')
@section('title', 'Campus Connekt School Approval')
@section('content')
    <!-- Custom Style for this Page -->
    <style>
        .approval-btn{
            margin: 3px;
    height: 40px;
    width: 40px;
    font-size: 20px;
        }
    </style>
    <!-- Custom Style for this Page -->

    <!-- Main Content -->
    <div class="card">
        <div class="card-header">
            <h4 class="m-0">School List</h4>
        </div>
    </div>

    <!-- Data Tabel -->
    <div class="card mt-3">
        <div class="card-header">
            <h5>All School Lists</h5>
        </div>
        <hr class="m-0">
        <div class="card-body">
            <table id="datatable" class="datatables-basic table table-bordered text-center">
                <thead>
                    <tr>
                        <th>School Name</th>
                        <th>School Type</th>
                        <th>Syllabus Pattern</th>
                        <th>School Medium</th>
                        <th>School Address</th>
                        <th>School Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
    <!-- Data Tabel -->

    {{-- Modal --}}
    <div class="modal fade" id="SchoolDisapprovalModal" tabindex="-1" aria-labelledby="varyingModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="varyingModalLabel">School Disapproval Modal</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
                </div>
                <div class="modal-body">
                    <form id="DisaproveForm" method="POST">
                        @csrf
                        <input id="school_id" name="school_id" type="hidden" value="">
                        <label for="Remark" class="form-label">Disapproval Remark</label>
                        <textarea class="form-control" id="school_status_remark" rows="5" name="school_status_remark"></textarea>
                    </form>
                    <div class="text-center">
                        <div id="error"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary login-btn" onclick="DisapproveSchool()">
                        <div id="button-spinner" class="spinner-border" style="color: white; display: none;" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                        <div id="button-text">
                            Store
                        </div>
                    </button>
                </div>
            </div>
        </div>
    </div>
    {{-- Modal --}}

    <!-- Main Content -->

    <!-- Main Scipt -->
    <script>
        $(document).ready(function() {
            GetSchoolData()
            $('[data-toggle="tooltip"]').tooltip()
        })

        /* DataTable Function  */
        function GetSchoolData() {
            var dataTables = $('#datatable').DataTable({
                ordering: false,
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('GetSchoolList') }}"
                },
                columns: [{
                        data: 'school_name',
                        "searchable": true,
                        "orderable": false,
                    },
                    {
                        data: 'school_type',
                        "searchable": true,
                        "orderable": false,
                    },
                    {
                        data: 'syllabus_pattern',
                        "searchable": true,
                        "orderable": false,
                    },
                    {
                        data: 'school_medium',
                        "searchable": true,
                        "orderable": false,
                    },
                    {
                        data: 'school_address',
                        "searchable": true,
                        "orderable": false,
                    },
                    {
                        data: 'school_status',
                        render: function(status) {
                            if(status == 1){
                                return '<span class="badge bg-success">Approved</span>';
                            }else{
                                return '<span class="badge bg-warning">Pending</span>';
                            }
                        },
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

        /* School Approval Function  */
        function Approve(school_id) {
            Swal.fire({
                    title: "Warning",
                    text: "Are you sure you want to Approve this School",
                    icon: "warning",
                    showCancelButton: !0,
                    confirmButtonText: "Yes",
                    customClass: {
                        cancelButton: "btn btn-danger me-3",
                        confirmButton: "btn btn-success me-3"
                    },
                    buttonsStyling: !1
                }).then(function(t) {
                if (t.isConfirmed == true) {
                    $.get("{{ route('ApproveSchool') }}", {
                        school_id: school_id
                    }, function(data) {
                        if (data['success'] == true) {
                            Swal.fire('Success!', data.message, 'success');
                            $('#datatable').DataTable().ajax.reload();
                        }
                         else {
                            if(data['info'] == true){
                                Swal.fire('Info', data.message, 'info');
                            }
                            else{
                            Swal.fire('Oops!', data.message, 'error');
                            }
                        }
                    })
                } else {
                    Swal.fire({
                        title: "Cancelled",
                        icon: "error",
                        customClass: {
                            confirmButton: "btn btn-success"
                        }
                    })
                }
            })
        }
        /* School Approval Function  */

        /* School Disapproval Modal  */
        function DisapproveModal(school_id) {
            $("#SchoolDisapprovalModal").modal('show');
            $("#school_id").val(school_id);
        }
        /* School Disapproval Modal  */

        /* School Disapproval Function  */
        function DisapproveSchool() {
            var school_id = $("#school_id").val();
            var school_status_remark = $("#school_status_remark").val();
            if (school_status_remark == "" || school_status_remark == null) {
                $("#error").show().addClass('alert alert-danger').html("Please fill the Remark Field");
                return false;
            }
            $.ajax({
                type: "GET",
                url: "{{ route('DisapproveSchool') }}",
                data: $("#DisaproveForm").serialize(),
                beforeSend: function() {
                    $("#disapprove-btn").prop('disabled', true);
                    $("#button-text").hide()
                    $("#button-spinner").show()
                },
                success: function(data) {
                    $("#disapprove-btn").prop('disabled', false);
                    $("#button-text").show()
                    $("#button-spinner").hide()
                    if (data['success'] == true) {
                        Swal.fire(
                            'Success!', data.message, 'success'
                        )
                        $('#datatable').DataTable().ajax.reload();
                        $("#SchoolDisapprovalModal").modal('hide');
                    } else {
                        Swal.fire(
                            'Oops!', data.message, 'error'
                        )
                        $('#datatable').DataTable().ajax.reload();
                    }
                }

            })
        }
        /* School Disapproval Function  */
    </script>
    <!-- Main Scipt -->
@endsection();
