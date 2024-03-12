@extends('backend.layouts.admin_master')
@section('title')
	Footer Grid Two Create
@endsection
@section('admin_css')

@endsection

@section('content')
	<div class="card shadow-sm">
	    <div class="card-header">
	        <h3 class="card-title">	Footer Grid Two Create</h3>
	        <div class="card-toolbar">
	            <a href="{{ route('admin.footergridtwos.create') }}" class="btn btn-sm btn-light">
	                <i class="fas fa-list"></i>	Footer Grid Two Lists
	            </a>
	        </div>
	    </div>
	    <div class="card-body">

	    	<form action="{{ route('admin.footergridtwos.store') }}" method="POST" >
	    		@csrf

	    		<!--begin::Input group-->
	    		<div class="fv-row mb-7">
	    		  <!--begin::Label-->
	    		  <label class="required fw-semibold fs-6 mb-2">Name</label>
	    		  <!--end::Label-->
	    		  <!--begin::Input-->
	    		  <input type="text" name="name" class="form-control form-control-solid mb-3 mb-lg-0 @error('name') is-invalid @enderror" placeholder="Name" value="{{ old('name') }}" />
	    		  <!--end::Input-->
	    		  @error('name')
	    		      <span class="invalid-feedback" role="alert">
	    		          <strong>{{ $message }}</strong>
	    		      </span>
	    		  @enderror
	    		</div>
	    		<!--end::Input group-->
	    		
	    		<!--begin::Input group-->
	    		<div class="fv-row mb-7">
	    		  <!--begin::Label-->
	    		  <label class="required fw-semibold fs-6 mb-2">Link</label>
	    		  <!--end::Label-->
	    		  <!--begin::Input-->
	    		  <input type="url" name="link" class="form-control form-control-solid mb-3 mb-lg-0 @error('link') is-invalid @enderror" placeholder="https://www.google.com/" value="{{ old('link') }}" />
	    		  <!--end::Input-->
	    		  @error('link')
	    		      <span class="invalid-feedback" role="alert">
	    		          <strong>{{ $message }}</strong>
	    		      </span>
	    		  @enderror
	    		</div>
	    		<!--end::Input group-->

	    		<!--begin::Input group-->
	    		<div class="fv-row mb-7">
	    		  <!--begin::Label-->
	    		  <label class="fw-semibold fs-6 mb-2">Status</label>
	    		  <!--end::Label-->	
	    		  <select name="status" class="form-select form-select-solid @error('status') is-invalid @enderror" data-control="select2" data-placeholder="Select an option" data-allow-clear="true">
	    		      <option></option>
	    		      <option {{ old('status') == "1" ? 'selected' : '' }} value="1">Active</option>
	    		      <option {{ old('status') == "0" ? 'selected' : '' }} value="0">Inactive</option>
	    		  </select>
	    		  @error('status')
	    		      <span class="invalid-feedback" role="alert">
	    		          <strong>{{ $message }}</strong>
	    		      </span>
	    		  @enderror
	    		</div>
	    		<!--end::Input group-->
	    		<div class="fv-row mb-7">
	    			<input type="submit" class="btn btn-light-primary mt-5" value="Save">
	    		</div>
	    		
	    	</form>
	    </div>		
	</div>

@endsection

@section('admin_js')

@endsection