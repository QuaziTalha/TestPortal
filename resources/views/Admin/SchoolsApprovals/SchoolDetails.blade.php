@extends('Components.AdminLayout')
@section('title', 'Campus Connekt School "'.$data->school_name.'"')
@section('content')
    {{-- Custom Css --}}
    <style>
        .user-profile-header-banner img {
            width: 100%;
            -o-object-fit: cover;
            object-fit: cover;
            height: 250px
        }

        .user-profile-header {
            margin-top: -2rem
        }

        .user-profile-header .user-profile-img {
            border: 5px solid;
            width: 120px
        }

        .light-style .user-profile-header .user-profile-img {
            border-color: #fff;
            background-color: #fff
        }

        .dark-style .user-profile-header .user-profile-img {
            border-color: #283144
        }

        .dataTables_wrapper .card-header .dataTables_filter label {
            margin-top: 0 !important;
            margin-bottom: 0 !important
        }

        @media(max-width: 767.98px) {
            .user-profile-header-banner img {
                height: 150px
            }

            .user-profile-header .user-profile-img {
                width: 100px
            }
        }

        .img-tooltip {
            width: 100%;
            height: auto;
        }
    </style>
    {{-- Custom Css --}}

    <!-- Header -->
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="user-profile-header-banner">
                    <img src="{{ url('public\portal_images\school_images/' . $data->school_image) }}" alt="Banner image"
                        class="rounded-top" style="width: 100%" />
                </div>
                <div class="user-profile-header d-flex flex-column flex-sm-row text-sm-start text-center mb-4">
                    <div class="flex-shrink-0 mt-n2 mx-sm-0 mx-auto">
                        <img src="{{ url('public\portal_images\school_logo/' . $data->school_logo ?? '') }}"
                            alt="user image" class="d-block h-auto ms-0 ms-sm-4 rounded-3 user-profile-img" />
                    </div>
                    <div class="flex-grow-1 mt-3 mt-sm-5">
                        <div
                            class="d-flex align-items-md-end align-items-sm-start align-items-center justify-content-md-between justify-content-start mx-4 flex-md-row flex-column gap-4">
                            <div class="user-profile-info">
                                <h4>{{ $data->school_name ?? '' }}</h4>
                                <ul
                                    class="list-inline mb-0 d-flex align-items-center flex-wrap justify-content-sm-start justify-content-center gap-2">
                                    <li class="list-inline-item fw-semibold">
                                        <i class="bx bx-pen"></i> {{ $data->syllabus_type ?? '' }}
                                    </li>
                                    <li class="list-inline-item fw-semibold">
                                        <i class="bx bx-map"></i> {{ $data->school_location ?? '' }}
                                    </li>
                                    <li class="list-inline-item fw-semibold">
                                        <i class="bx bx-envelope"></i> {{ $data->school_email ?? '' }}
                                    </li>
                                    <li class="list-inline-item fw-semibold">
                                        <i class="bx bx-user-pin"></i>Status:
                                        @if ($data->school_status == 1)
                                            <span style="color:#39da8a">Approved</span>
                                        @else
                                        <span style="color:#fdac41">Pending</span>
                                        @endif
                                    </li>
                                </ul>
                            </div>
                            <div id="school-approval-buttons" style="display: inline-grid;">
                                <a onclick="Approve()"
                                    class="btn btn-success text-white text-nowrap mb-1"><i
                                        class="bx bx-user-check"></i>Approve</a>
                                <a onclick="DisapproveModal()"
                                    class="btn btn-danger text-white  text-nowrap mb-1"><i
                                        class="bx bx-user-check"></i>Disapprove</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ Header -->

    <!-- User Profile Content -->
    <div class="row">
        <div class="col-xl-4 col-lg-5 col-md-5">
            {{-- School Details --}}
            <div class="card mb-4">
                <div class="card-body">
                    <small class="text-muted text-uppercase">School Details</small>
                    <ul class="list-unstyled mb-4 mt-3">
                        <li class="align-items-center mb-3">
                            <i class="bx bx-window"></i><span class="fw-semibold mx-2">Website:</span>
                            <span>{{ $data->school_website ?? 'N/a' }}</span>
                        </li>
                        <li class="align-items-center mb-3">
                            <i class="bx bx-book-content"></i><span class="fw-semibold mx-2">Syllabus Pattern:</span>
                            <span>{{ $data->syllabus_pattern ?? 'N/a' }}</span>
                        </li>
                        <li class="align-items-center mb-3">
                            <i class='bx bx-message-rounded'></i><span class="fw-semibold mx-2">School Medium:</span>
                            <span>{{ $data->school_medium ?? 'N/a' }}</span>
                        </li>
                        <li class="align-items-center mb-3">
                            <i class='bx bx-group'></i><span class="fw-semibold mx-2">Management Type:</span>
                            <span>{{ $data->management_type ?? 'N/a' }}</span>
                        </li>
                        <li class="align-items-center mb-3">
                            <i class='bx bx-barcode'></i><span class="fw-semibold mx-2">Udise Code:</span>
                            <span>{{ $data->udise_code ?? 'N/a' }}</span>
                        </li>
                        <li class="align-items-center mb-3">
                            <i class='bx bx-wallet'></i><span class="fw-semibold mx-2">Starting Fees:</span>
                            <span>{{ $data->starting_fees ?? 'N/a' }}</span>
                        </li>
                        <li class="align-items-center mb-3">
                            <i class='bx bx-map-pin'></i><span class="fw-semibold mx-2">School Pin Code:</span>
                            <span>{{ $data->school_pin_code ?? 'N/a' }}</span>
                        </li>
                        <li class="align-items-center mb-3">
                            <i class='bx bxs-city'></i><span class="fw-semibold mx-2">School City:</span>
                            <span>{{ $data->school_city ?? 'N/a' }}</span>
                        </li>
                        <li class=" align-items-center mb-3">
                            <i class='bx bx-current-location'></i><span class="fw-semibold mx-2">School Latitude and
                                Longitudes:</span>
                            <span>{{ $data->school_latlng ?? 'N/a' }}</span>
                        </li>
                        <li class="align-items-center mb-3">
                            <i class='bx bxs-city'></i><span class="fw-semibold mx-2">School Total Teacher:</span>
                            <span>{{ $data->total_teacher ?? 'N/a' }}</span>
                        </li>

                    </ul>
                </div>
            </div>
            {{-- School Details --}}

            {{-- School Contact Details --}}
            <div class="card mb-4">
                <div class="card-body">
                    <small class="text-muted text-uppercase">Contacts</small>
                    <ul class="list-unstyled mb-4 mt-3">
                        <li class="align-items-center mb-3">
                            <i class="bx bx-phone"></i><span class="fw-semibold mx-2">School Contact No.:</span>
                            <span>{{ $data->school_contact_number ?? 'N/a' }}</span>
                        </li>
                        <li class="align-items-center mb-3">
                            <i class="bx bx-mobile"></i><span class="fw-semibold mx-2">Primary Mobile No.:</span>
                            <span>{{ $data->primary_mobile_number ?? 'N/a' }}</span>
                        </li>
                        <li class="align-items-center mb-3">
                            <i class="bx bx-phone-call"></i><span class="fw-semibold mx-2">Secondary Mobile No.:</span>
                            <span>{{ $data->secondary_mobile_number ?? 'N/a' }}</span>
                        </li>
                        <li class="align-items-center mb-3">
                            <i class="bx bxl-whatsapp"></i><span class="fw-semibold mx-2">School Whatsapp:</span>
                            <span>{{ $data->school_whatsapp ?? 'N/a' }}</span>
                        </li>
                    </ul>

                </div>
            </div>
            {{-- School Contact Details --}}

            {{-- School Eligibilities --}}
            <div class="card mb-4">

                <div class="card-body">
                    <small class="text-muted text-uppercase">School Eligibilities</small>
                    <div class="m-1 perfect-scroll overflow-hidden" style="max-height: 250px; border:0.5px solid #d4d8dd;">
                        <table class=" table table-striped table-bordered dataTable display ">
                            <thead>
                                <tr>
                                    <th class="bg-light">Eligibility</th>
                                    <th class="bg-light"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($data->eligibility) > 0)
                                    @foreach ($data->eligibility as $row)
                                        <tr>
                                            <td>{{ $row->eligibity ?? '' }}</td>
                                            <td>{{ $row->eligibity_value ?? '' }}</td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan='2'>There is no Eligibilities uploaded.</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            {{-- School Eligibilities --}}
            {{-- School Brochure --}}
            <div class="card mb-4">
                <div class="card-body text-center">
                    @if (count($data->brochure) > 0)
                        @foreach ($data->brochure as $row)
                            @if (substr($row->brochure_file, -3) !== 'pdf')
                                <a href="{{ url('public/portal_images/school_brochure/' . $row->brochure_file) }}"
                                    target="_blank">
                                    <div class="mx-auto m-4">
                                        <button disabled class="btn btn-icon btn-lg rounded-pill btn-light">
                                            <i class='bx bx-md bxs-file-image' style="color: #39da8a"></i>
                                        </button>
                                        <h5 class="m-2 card-title">{{ $row->brochure_title ?? '' }}
                                        </h5>
                                    </div>
                                </a>
                            @else
                                    <a href="{{ url('public/portal_images/school_brochure/' . $row->brochure_file) }}">
                                        <div class="mx-auto m-4">
                                            <button disabled class="btn btn-icon btn-lg rounded-pill btn-light">
                                                <i class='bx bx-md bxs-file-pdf' style="color: #ee161f"></i>
                                            </button>
                                            <h5 class="m-2 card-title">{{ $row->brochure_title ?? '' }}
                                            </h5>
                                        </div>
                                    </a>

                            @endif
                        @endforeach
                    @else
                        <p style="text-align: center; verticaal-align: middle;">There is no Brohures uploaded.
                        </p>
                    @endif
                </div>
            </div>
            {{-- School Brochure --}}
        </div>
        <div class="col-xl-8 col-lg-7 col-md-7">
            {{-- School Description --}}
            <div class="card card-action mb-4">
                <div class="card-header align-items-center">
                    <h5 class="card-action-title mb-0">
                        <i class="bx bx-pencil bx-sm me-2"></i>School Description
                    </h5>
                    <div class="card-action-element">
                        <ul class="list-inline mb-0">
                            <li class="list-inline-item">
                                <a href="javascript:void(0);" class="card-collapsible"><i
                                        class="tf-icons bx bx-chevron-up"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="collapse show">
                    <div class="card-body">
                        {{ $data->school_about ?? '' }}
                    </div>
                </div>
            </div>
            {{-- School Description --}}

            {{-- School Courses --}}
            <div class="card card-action mb-4">
                <div class="card-header align-items-center">
                    <h5 class="card-action-title mb-0">
                        <i class="bx bx-book-open bx-sm me-2"></i>School Course
                    </h5>
                    <div class="card-action-element">
                        <ul class="list-inline mb-0">
                            <li class="list-inline-item">
                                <a href="javascript:void(0);" class="card-collapsible"><i
                                        class="tf-icons bx bx-chevron-up"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="collapse show">
                    <div class="card-body">
                        <div class="list-single-main-item fl-wrap block_box" id="sec4">
                            <div class="list-single-main-item_content fl-wrap">
                                <table class=" table table-striped table-bordered dataTable display ">
                                    <thead>
                                        <tr>
                                            <th class="bg-light">Course</th>
                                            <th class="bg-light">Course Fees</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (count($data->courses) > 0)
                                            @foreach ($data->courses as $row)
                                                <tr>
                                                    <td>{{ $row->course_name ?? '' }}</td>
                                                    <td>{{ $row->course_fees ?? '' }}</td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan='2'>There is no course uploaded.</td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- School Courses --}}

            {{-- School Gallery --}}
            <div class="card card-action mb-4">
                <div class="card-header align-items-center">
                    <h5 class="card-action-title mb-0">
                        <i class="bx bx-photo-album bx-sm me-2"></i>School Gallery
                    </h5>
                    <div class="card-action-element">
                        <ul class="list-inline mb-0">
                            <li class="list-inline-item">
                                <a href="javascript:void(0);" class="card-collapsible"><i
                                        class="tf-icons bx bx-chevron-up"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="collapse show">
                    <div class="card-body">
                        <div class="list-single-main-item fl-wrap block_box" id="sec4">
                            <div class="list-single-main-item_content fl-wrap">
                                @if (count($data->gallery) > 0)
                                    <div class="swiper-container" id="swiper-with-arrows">
                                        <div class="swiper-wrapper">
                                            @foreach ($data->gallery as $row)
                                                <div class="swiper-slide"
                                                    style="background-image: url({{ url('public/portal_images/school_gallery/' . $row->gallery_image) }}); width: 200px; height: auto;">
                                                </div>
                                            @endforeach
                                        </div>
                                        <div class="swiper-button-next swiper-button-white custom-icon">
                                        </div>
                                        <div class="swiper-button-prev swiper-button-white custom-icon">
                                        </div>
                                    </div>
                                @else
                                    <p style="text-align: center; vertical-align: middle;">There is no Gallery Images
                                        uploaded.
                                    </p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- School Gallery --}}

            {{-- School Facilities --}}
            <div class="card card-action mb-4">
                <div class="card-header align-items-center">
                    <h5 class="card-action-title mb-0">
                        <i class="bx bx-buildings bx-sm me-2"></i>School Facilities
                    </h5>
                    <div class="card-action-element">
                        <ul class="list-inline mb-0">
                            <li class="list-inline-item">
                                <a href="javascript:void(0);" class="card-collapsible"><i
                                        class="tf-icons bx bx-chevron-up"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="collapse show">
                    <div class="card-body overflow-hidden" id="vertical-example" style="max-height: 250px">
                        @if (count($data->facility) > 0)
                            <div class="col-md">
                                <div class="list-group list-group-flush">
                                    @foreach ($data->facility as $row)
                                        <span class="list-group-item list-group-item-action">
                                            <img src="{{ url('public/portal_images/school_facility/' . $row->facility_picture) }}"
                                                style="width: 65px; height: auto; margin-right: 10px;" />
                                            {{ $row->facility_name }}</span>
                                    @endforeach

                                </div>
                            </div>
                        @else
                            <p style="text-align: center; vertical-align: middle;">There is no Gallery Images uploaded.
                            </p>
                        @endif
                    </div>
                </div>
            </div>
            {{-- School Facilities --}}

            {{-- School Infrastructure --}}
            <div class="card card-action mb-4">
                <div class="card-header align-items-center">
                    <h5 class="card-action-title mb-0">
                        <i class="bx bx-list-ul bx-sm me-2"></i>School Infrastructure
                    </h5>
                    <div class="card-action-element">
                        <ul class="list-inline mb-0">
                            <li class="list-inline-item">
                                <a href="javascript:void(0);" class="card-collapsible"><i
                                        class="tf-icons bx bx-chevron-up"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="collapse show">
                    <div class="card-body">
                        <div class="m-1 perfect-scroll overflow-hidden perfect-scroll"
                            style="max-height: 250px;     border:0.5px solid #d4d8dd;">

                            <table class=" table table-striped table-bordered dataTable display ">
                                <thead>
                                    <tr>
                                        <th class="bg-light">Infrastructure</th>
                                        <th class="bg-light"> </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (count($data->infrastructure) > 0)
                                        <tr>
                                            <td>Building type</td>
                                            <td>{{ $data->infrastructure[0]->building_type ?? '' }}</td>
                                        </tr>
                                        <tr>
                                            <td>Total Class Rooms</td>
                                            <td>{{ $data->infrastructure[0]->total_class_rooms ?? '' }}</td>
                                        </tr>
                                        <tr>
                                            <td>Library</td>
                                            <td>{{ $data->infrastructure[0]->library ?? '' }}</td>
                                        </tr>
                                        <tr>
                                            <td>Computer Lab</td>
                                            <td>{{ $data->infrastructure[0]->computer_lab ?? '' }}</td>
                                        </tr>
                                        <tr>
                                            <td>Science Lab</td>
                                            <td>{{ $data->infrastructure[0]->science_lab ?? '' }}</td>
                                        </tr>
                                        <tr>
                                            <td>Play Ground</td>
                                            <td>{{ $data->infrastructure[0]->play_ground ?? '' }}</td>
                                        </tr>
                                        <tr>
                                            <td>Girls Toilet</td>
                                            <td>{{ $data->infrastructure[0]->girls_toilet ?? '' }}</td>
                                        </tr>
                                        <tr>
                                            <td>Boys Toilet</td>
                                            <td>{{ $data->infrastructure[0]->boys_toilet ?? '' }}</td>
                                        </tr>
                                        <tr>
                                            <td>Drinking Water</td>
                                            <td>{{ $data->infrastructure[0]->drinking_water ?? '' }}</td>
                                        </tr>
                                        <tr>
                                            <td>Smart Class</td>
                                            <td>{{ $data->infrastructure[0]->smart_class ?? '' }}</td>
                                        </tr>
                                        <tr>
                                            <td>Disable Friendly</td>
                                            <td>{{ $data->infrastructure[0]->disable_friendly ?? '' }}</td>
                                        </tr>
                                        <tr>
                                            <td>Mealt</td>
                                            <td>{{ $data->infrastructure[0]->mealt ?? '' }}</td>
                                        </tr>
                                    @else
                                        <tr>
                                            <td colspan='2'>There is no course uploaded.</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
            {{-- School Infrastructure --}}
        </div>
    </div>
    </div>
    <!--/ User Profile Content -->
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
                        <input id="school_id" name="school_id" type="hidden" value="{{$data->school_id}}">
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
                        <div id="button-spinner" class="spinner-border" style="color: white; display: none;"
                            role="status">
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
    {{-- Custom Script --}}
    <script>
        $(document).ready(function() {
            $('.perfect-scroll').each(function() {
                const ps = new PerfectScrollbar($(this)[0], {
                    wheelPropagation: !1
                });
            });

        });
        /* School Approval Function  */
        function Approve() {
                Swal.fire({
                    title: "Warning",
                    text: "Are you sure you want to Approve this School",
                    icon: "warning",
                    showCancelButton: !0,
                    confirmButtonText: "Yes",
                    customClass: {
                        confirmButton: "btn btn-lg btn-success me-3",
                        cancelButton: "btn btn-lg btn-outline-danger me-3"
                    },
                    buttonsStyling: !1
                }).then(function(t) {
                    if (t.isConfirmed == true) {
                        $.get("{{ route('ApproveSchool') }}", {
                            school_id: {{$data->school_id}}
                        }, function(data) {
                            if (data['success'] == true) {
                                Swal.fire('Success!', data.message, 'success');
                                location.reload();
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
            /* School Approval Function  */

            /* School Disapproval Modal  */
            function DisapproveModal() {
                $("#SchoolDisapprovalModal").modal('show');
            }
            /* School Disapproval Modal  */

            /* School Disapproval Function  */
            function DisapproveSchool() {
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
                            $("#SchoolDisapprovalModal").modal('hide');
                            location.reload();
                        } else {
                            Swal.fire(
                                'Oops!', data.message, 'error'
                            )
                        }
                    }

                })
            }
            /* School Disapproval Function  */
    </script>
    {{-- Custom Script --}}
@endsection
