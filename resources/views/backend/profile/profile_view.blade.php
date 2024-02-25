@extends('backend.layouts.admin_master')
@section('title')
	Profile View
@endsection

@section('content')
	<!--begin::details View-->
	<div class="card mb-5 mb-xl-10" id="kt_profile_details_view">
	  <!--begin::Card header-->
	  <div class="card-header cursor-pointer">
	    <!--begin::Card title-->
	    <div class="card-title m-0">
	      <h3 class="fw-bold m-0">Profile Details</h3>
	    </div>
	    <!--end::Card title-->
	    <!--begin::Action-->
	    <a href="{{ route('admin.profiles.edit', $admin->id) }}" class="btn btn-primary align-self-center">Edit Profile</a>
	    <!--end::Action-->
	  </div>
	  <!--begin::Card header-->
	  <!--begin::Card body-->
	  <div class="card-body p-9">

	  	{{-- @dd($admin->image ? 1 : 5) --}}

	  	<div class="row mb-10">
	  		<!--begin: Pic-->
	  		<div class="me-7 mb-4">
	  		  <div class="symbol symbol-100px symbol-lg-160px symbol-fixed position-relative">
	  		    <img src="{{ empty($admin->image) ? asset('uploads/no_image.jpg') : asset($admin->image) }}" alt="image" />
	  		    <div class="position-absolute translate-middle bottom-0 start-100 mb-6 bg-success rounded-circle border border-4 border-body h-20px w-20px"></div>
	  		  </div>
	  		</div>
	  		<!--end::Pic-->
	  	</div>

	    <!--begin::Row-->
	    <div class="row mb-7">
	      <!--begin::Label-->
	      <label class="col-lg-4 fw-semibold text-muted">Full Name</label>
	      <!--end::Label-->
	      <!--begin::Col-->
	      <div class="col-lg-8">
	        <span class="fw-bold fs-6 text-gray-800">{{ $admin->name }}</span>
	      </div>
	      <!--end::Col-->
	    </div>
	    <!--end::Row-->
	    <!--begin::Input group-->
	    <div class="row mb-7">
	      <!--begin::Label-->
	      <label class="col-lg-4 fw-semibold text-muted">Email</label>
	      <!--end::Label-->
	      <!--begin::Col-->
	      <div class="col-lg-8 fv-row">
	        <span class="fw-semibold text-gray-800 fs-6">{{ $admin->email }}</span>
	        <span class="badge badge-success">Verified</span>
	      </div>
	      <!--end::Col-->
	    </div>
	    <!--end::Input group-->
	    <!--begin::Input group-->
	    <div class="row mb-7">
	      <!--begin::Label-->
	      <label class="col-lg-4 fw-semibold text-muted">Contact Phone <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Phone number must be active"></i>
	      </label>
	      <!--end::Label-->
	      <!--begin::Col-->
	      <div class="col-lg-8 d-flex align-items-center">
	        <span class="fw-bold fs-6 text-gray-800 me-2">{{ $admin->phone }}</span>
	        {{-- <span class="badge badge-success">Verified</span> --}}
	      </div>
	      <!--end::Col-->
	    </div>
	    <!--end::Input group-->
	  </div>
	  <!--end::Card body-->
	</div>
	<!--end::details View-->
@endsection