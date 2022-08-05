@extends('Components.AdminLayout')
@section('title', 'Campus Connekt Admin DashBoard')
@section('content')
<h1>Dashboard</h1>
 <!-- All Schools -->
 <div class="col-6">
    <div class="card h-100">
        <div class="card-header">
          </div>
      <div class="card-body">
        <div class="row">
        <div class="col-4 overflow-hidden" >
            <div class="avatar mx-auto mb-2" style="width: 130px;height: 130px;">
                <span class="avatar-initial rounded-circle bg-label-success"><a href="{{route('SchoolsApprovals')}}" class="bx bxs-school" style="font-size: 5rem"></a></span>
              </div>
        </div>
        <div class="col-8">
            <h2 class="card-title mb-2">All Schools</h2>
            <h1 class="display-6 fw-normal mb-0" style="font-size: 4.5rem;">{{count($schools)}}</h1>
        </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-6">
    <div class="row">
        <!-- Statistics Cards -->
        <div class="col-6 col-md-3 col-lg-6">
          <div class="card h-100">
            <div class="card-body text-center">
              <div class="avatar mx-auto mb-2" style="width: 6rem; height: 6rem;">
                <span class="avatar-initial rounded-circle bg-label-info"><a href="{{route('BlogsApprovals')}}" style="font-size:3.2rem;" class="bx bx-news fs-8"></a></span>
              </div>
              <span class="d-block text-nowrap">Blogs</span>
              <h2 class="mb-0">{{count($schools->blogs)}}</h2>
            </div>
          </div>
        </div>
        <div class="col-6 col-md-3 col-lg-6">
          <div class="card h-100">
            <div class="card-body text-center">
              <div class="avatar mx-auto mb-2" style="width: 6rem; height: 6rem;">
                <span class="avatar-initial rounded-circle bg-label-primary"><a href="{{route('Merchandise')}}" style="font-size:3.2rem;" class="bx bxs-backpack"></a></span>
              </div>
              <span class="d-block text-nowrap">Merchandise</span>
              <h2 class="mb-0">{{count($schools->merchandise)}}</h2>
            </div>
          </div>
        </div>
        <!--/ Statistics Cards -->
      </div>
  </div>
  <!--/ All Schools -->
@endsection();
