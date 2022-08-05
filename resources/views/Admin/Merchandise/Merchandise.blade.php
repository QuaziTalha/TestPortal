@extends('Components.AdminLayout')
@section('title', 'Campus Connekt Merchandise Managers')
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
            <h4 class="m-0">Merchandise</h4>
        </div>
    </div>
    {{-- Header --}}
    <div class="card mt-3">
        <div class="row">
            <div class="col-6">
                <div class="card-header">
                    <h5>All Merchandise Lists</h5>
                </div>
            </div>
            <div class="col-6">
                <div class="card-header">
                    <button class="btn btn-primary" style="float: right;" onclick="InsertModal()">Add Merchandise</button>
                </div>
            </div>

        </div>
        <hr class="m-0">
        {{-- Datatable --}}
        <div class="card-body">
            <table id="datatable" class="datatables-basic table table-bordered text-center">
                <thead>
                    <tr>
                        <th>Merchandise ID</th>
                        <th>Merchandise Name</th>
                        <th>Merchandise Description</th>
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
                    <h5 class="modal-title" id="varyingModalLabel">Merchandise Cropper Modal</h5>
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
    <div class="modal fade" id="MerchandiseCreateModal" tabindex="-1" aria-labelledby="varyingModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="varyingModalLabel">Merchandise Insert Modal</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
                </div>
                <div class="modal-body">
                    <form id="CreateForm" enctype="multipart/form-data">
                        @csrf
                        <input class="form-control" id="merchandise_id" name="merchandise_id" type="hidden" value="">
                        <label for="merchandise_name" class="form-label" value = "">Merchandise Name</label>
                        <input class="form-control" type="text" id="merchandise_name" name="merchandise_name" >
                        <label for="merchandise_desc" class="form-label">Merchandise Description</label>
                        <textarea class="form-control" id="merchandise_desc" rows="5" name="merchandise_desc"></textarea>
                        <label for="merchandise_image" class="form-label">Merchandise Image</label>
                        <input type="file" class="upload form-control" name="merchandise_image" id="merchandise_image" accept="image/*">
                    </form>
                    <div class="text-center">
                        <div id="error"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary login-btn" onclick="InsertMerchandise()">
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
                    <h4 id="merchandise-title"></h4>
                    <hr class="m-0 mb-3">
                    <div class="m-3 overflow-hidden perfect-scroll" id="merchandise-desc" style="word-break: break-word; max-height: 250px;"></div>
                    <div class="col-12">
                        <img src="" id="merchandise-image" alt="Image Not Found" style="width: 100%; height: auto;">
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

        /* Variables */
        var merchandise_image = $("#merchandise_image");
        var canvas_image = "";
        var getImageBase64 = "";
        /* Variables */

        /* DataTable Function  */
        $(document).ready(function() {
            GetMerchandiseData();
            $('.perfect-scroll').each(function() {
                const ps = new PerfectScrollbar($(this)[0], {
                    wheelPropagation: !1
                });
            });
        })
        function GetMerchandiseData() {
            var dataTables = $('#datatable').DataTable({
                ordering: false,
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('GetMerchandiseList') }}"
                },
                columns: [{
                        data: 'merchandise_id',
                        "searchable": true,
                        "orderable": false,
                    },
                    {
                        data: 'merchandise_name',
                        "searchable": true,
                        "orderable": false,
                    },
                    {
                        data: 'merchandise_desc',
                        render: function(merchandise_desc) {
                            if(merchandise_desc.length > 150) {
                                merchandise_desc = merchandise_desc.substring(0,150)+"  ...";
                                console.log('shorten')
                            }
                          return '<div class="m-3 overflow-hidden perfect-scroll" style="word-break: break-word; max-height: 150px;"><p>'+merchandise_desc+'</p></div> ';
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

        /* Cropper Function */
        function ModalOpen2() {
            $("#CropperModal").modal('show');
        }

        /* Getting Image From input field and setting Cropper */
        merchandise_image.on('change', function() {
            var files = this.files;
            if (files && files.length > 0) {
                var photo = files[0];

                var reader = new FileReader();
                reader.onload = function(event) {
                    var image = $('.img-preview-2')[0];
                    image.src = event.target.result;
                    NewMerchandiseImage = new Cropper(image, {
                        autoCropArea: 0.5,
                        aspectRatio: 16 / 9,
                        minContainerWidth: 500,
                        minContainerHeight: 250,
                        ready: function() {}
                    });
                    $("#CropperModal").modal('show');
                };
                reader.readAsDataURL(photo);
            }
        });
        /* Getting Image From input field and setting Cropper */

        /* Saving Cropped image as Base64 and clearing the Cropper */
        $("#cropper_save").click(function(e) {
            e.preventDefault()
            canvas_image = NewMerchandiseImage.getCroppedCanvas({
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
                $("#CropperModal").modal('hide');
                NewMerchandiseImage.destroy();
            }
        })
        /* Saving Cropped image as Base64 and clearing the Cropper */
        /* Cropper Function */

        /* Merchandise Create And Update Modal  */
        function InsertModal(data) {
            if($(data).data("id") !== "" || $(data).data("id") !== null){
                $("#merchandise_id").val($(data).data("id"));
                $("#merchandise_name").val($(data).data("name"));
                $("#merchandise_desc").val($(data).data("desc"));
            }
            $("#MerchandiseCreateModal").modal('show');
        }
        /* Merchandise Create And Update Modal  */


        /* Merchandise Create and Update Function  */
        function InsertMerchandise() {
            /* Validation */
            if ($("#merchandise_name").val() == "" || $("#merchandise_name").val() == null) {
                $("#error").show().addClass('alert alert-danger').html("Please fill the Merchandise Name Field");
                return false;
            }
            if ($("#merchandise_desc").val() == "" || $("#merchandise_desc").val() == null) {
                $("#error").show().addClass('alert alert-danger').html("Please fill the Merchandise Description Field");
                return false;
            }
            if ($("#merchandise_id").val() == "" || $("#merchandise_id").val() == null) {
                console.log('you have no id');
            if ($("#merchandise_image").val() == "" || $("#merchandise_image").val() == null) {
                $("#error").show().addClass('alert alert-danger').html("Please fill the Merchandise Image Field");
                return false;
            }
            }
            /* Validation */

            /* Appending Cropped Image in Form Data */
            const form = document.querySelector('#CreateForm');
            const formData = new FormData(form);
            var Merchandise_Image = getImageBase64;
            formData.append('merchandise_img', Merchandise_Image);
            /* Appending Cropped Image in Form Data */

            /* Ajax Request */
            $.ajax({
                type: "POST",
                url: "{{ route('MerchandiseStore') }}",
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
                    $("#MerchandiseCreateModal").modal('hide')
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
        /* Merchandise Create and Update Function  */

        /* Merchandise Delete Function  */
        function DeleteMerchandise(data) {
            var merchandise_id = $(data).data("id");
            $.ajax({
                type: "GET",
                url: "{{ route('MerchandiseDelete') }}",
                data: {
                    merchandise_id: merchandise_id
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
        /* Merchandise Delete Function  */

        /* Merchandise Details Modal  */
        function Details(data) {
            $("#BlogDetailsModal").modal('show');
            $("#merchandise-title").html($(data).data("title"));
            $("#merchandise-desc").html($(data).data("desc"));
            $("#merchandise-image").attr("src", "{{url('public/portal_images/merchandise_images/')}}/"+$(data).data("image"));
        }
        /* Merchandise Details Modal  */
    </script>
    {{-- Main Script --}}
@endsection();
