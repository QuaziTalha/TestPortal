@extends('Components.AdminLayout')
@section('title', 'Campus Connekt Blog Approval')
@section('content')
    {{-- Custom Style for this Page --}}
    <style>
        .approval-btn {
            margin: 3px;
            height: 40px;
            width: 40px;
            font-size: 20px;
        }
    </style>
    {{-- Custom Style for this Page --}}

    {{-- Main Content --}}

    {{-- Header --}}
    <div class="card">
        <div class="card-header">
            <h4 class="m-0">Blog List</h4>
        </div>
    </div>
    {{-- Header --}}

    {{-- Data Table --}}
    <div class="card mt-3">
        <div class="card-header">
            <h5>All Blog Lists</h5>
        </div>
        <hr class="m-0">
        <div class="card-body">
            <table id="datatable" class="datatables-basic table table-bordered text-center">
                <thead>
                    <tr>
                        <th>Blog Id</th>
                        <th>Blog Title</th>
                        <th>Blog Date</th>
                        <th>School Id</th>
                        <th>Blog Image</th>
                        <th>Blog Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
    {{-- Data Table --}}

    {{-- Modal --}}
    <div class="modal fade" id="BlogDisapprovalModal" tabindex="-1" aria-labelledby="varyingModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="varyingModalLabel">Blog Disapproval</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
                </div>
                <div class="modal-body">
                    <form id="DisaproveBlog" method="POST">
                        @csrf
                        <input id="blog_id" name="blog_id" type="hidden" value="">
                        <label for="Remark" class="form-label">Disapproval Remark</label>
                        <textarea class="form-control" id="blog_status_remark" rows="5" name="blog_status_remark"></textarea>
                    </form>
                    <div class="text-center">
                        <div id="error"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary login-btn" onclick="DisapproveBlog()">
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

    {{-- Details Modal --}}
    <div class="modal fade" id="BlogDetailsModal" tabindex="-1" aria-labelledby="varyingModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="varyingModalLabel"><i class="bx bx-list-ul bx-sm me-2"></i> Blog Details
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
                </div>
                <div class="modal-body">
                    <h4 id="blog-title"></h4>
                    <hr class="m-0 mb-3">
                    <div>Date:<p id="blog-date"></p>
                    </div>
                    <div class="m-3 perfect-scroll" id="blog-desc" style="word-break: break-word; max-height: 250px;"></div>
                    <div class="col-12">
                        <img src="" id="blog-image" alt="Image Not Found" style="width: 100%; height: auto;">
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

    {{-- Main Scipt --}}
    <script>
        /* Document Ready Function */
        $(document).ready(function() {
            GetBlogData();
            $('.perfect-scroll').each(function() {
                const ps = new PerfectScrollbar($(this)[0], {
                    wheelPropagation: !1
                });
            });
        })
        /* Document Ready Function */

        /* DataTable Function  */
        function GetBlogData() {
            var dataTables = $('#datatable').DataTable({
                ordering: false,
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('GetBlogList') }}"
                },
                columns: [{
                        data: 'blog_id',
                        "searchable": true,
                        "orderable": false,
                    },
                    {
                        data: 'blog_title',
                        "searchable": true,
                        "orderable": false,
                    },
                    {
                        data: 'blog_date',
                        "searchable": true,
                        "orderable": false,
                    },
                    {
                        data: 'school_id',
                        "searchable": true,
                        "orderable": false,
                    },
                    {
                        data: 'blog_image',
                        "searchable": true,
                        "orderable": false,
                    },
                    {
                        data: 'blog_status',
                        render: function(status) {
                            if (status == 1) {
                                return '<span class="badge bg-success">Approved</span>';
                            } else {
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

        /* Blog Approval Function  */
        function Approve(blog_id) {
            Swal.fire({
                title: "Warning",
                text: "Are you sure you want to Approve this Blog",
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
                    $.get("{{ route('ApproveBlog') }}", {
                        blog_id: blog_id
                    }, function(data) {
                        if (data['success'] == true) {
                            Swal.fire('Success!', data.message, 'success');
                            $('#datatable').DataTable().ajax.reload();
                        } else {
                            if (data['info'] == true) {
                                Swal.fire('Info', data.message, 'info');
                            } else {
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
        /* Blog Approval Function  */

        /* Blog Disapproval Modal  */
        function DisapproveModal(blog_id) {
            $("#BlogDisapprovalModal").modal('show');
            $("#blog_id").val(blog_id);
        }
        /* Blog Disapproval Modal  */

        /* Blog Details Modal  */
        function Details(data) {
            $("#BlogDetailsModal").modal('show');
            $("#blog-title").html($(data).data("title"));
            $("#blog-date").html($(data).data("date"));
            $("#blog-desc").html($(data).data("desc"));
            $("#blog-image").attr("src", "{{ url('public/portal_images/blog_images/') }}/" + $(data).data("image"));
        }
        /* Blog Details Modal  */

        /* Blog Disapproval Function  */
        function DisapproveBlog() {
            var blog_id = $("#blog_id").val();
            var blog_status_remark = $("#blog_status_remark").val();
            if (blog_status_remark == "" || blog_status_remark == null) {
                $("#error").show().addClass('alert alert-danger').html("Please fill the Remark Field");
                return false;
            }
            $.ajax({
                type: "GET",
                url: "{{ route('DisapproveBlog') }}",
                data: $("#DisaproveBlog").serialize(),
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
                    } else {
                        Swal.fire(
                            'Oops!', data.message, 'error'
                        )
                        $('#datatable').DataTable().ajax.reload();
                    }
                }

            })
        }
        /* Blog Disapproval Function  */
    </script>
    Main Scipt
@endsection();
