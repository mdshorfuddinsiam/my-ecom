@extends('backend.layouts.admin_master')
@section('title')
	Variant Item Create
@endsection
@section('admin_css')

@endsection

@section('content')
	<div class="card shadow-sm">
	    <div class="card-header">
	        <h3 class="card-title">Variant Item Create</h3>
	        <div class="card-toolbar">
	            <a href="{{ route('admin.variantitems.index', ['product' => $product->id, 'variant' => $variant->id]) }}" class="btn btn-sm btn-light">
	                <i class="fas fa-list"></i> Variant Item Lists
	            </a>
	        </div>
	    </div>
	    <div class="card-body">

	    	<form action="{{ route('admin.variantitems.store', ['product' => $product->id, 'variant' => $variant->id]) }}" method="POST" enctype="multipart/form-data">
	    		@csrf

	    		{{-- @if ($errors->any())
	    		    <div class="alert alert-danger">
	    		        <ul>
	    		            @foreach ($errors->all() as $error)
	    		                <li>{{ $error }}</li>
	    		            @endforeach
	    		        </ul>
	    		    </div>
	    		@endif --}}

	    		<!--begin::Input group-->
	    		<div class="fv-row mb-7">
	    		  <!--begin::Label-->
	    		  <label class="required fw-semibold fs-6 mb-2">Variant Name</label>
	    		  <!--end::Label-->
	    		  <!--begin::Input-->
	    		  <input type="text" class="form-control form-control-solid mb-3 mb-lg-0" value="{{ $variant->name }}" disabled />
	    		  <!--end::Input-->
	    		</div>
	    		<!--end::Input group-->

	    		<!--begin::Input group-->
	    		<div class="fv-row mb-7">
	    		  <!--begin::Label-->
	    		  <label class="required fw-semibold fs-6 mb-2">Item Name</label>
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
	    		  <label class="required fw-semibold fs-6 mb-2">Price (Set 0 for make it free)</label>
	    		  <!--end::Label-->
	    		  <!--begin::Input-->
	    		  <input type="text" name="price" class="form-control form-control-solid mb-3 mb-lg-0 @error('price') is-invalid @enderror" placeholder="0.00" value="{{ old('price') }}" />
	    		  <!--end::Input-->
	    		  @error('price')
	    		      <span class="invalid-feedback" role="alert">
	    		          <strong>{{ $message }}</strong>
	    		      </span>
	    		  @enderror
	    		</div>
	    		<!--end::Input group-->

	    		<!--begin::Input group-->
	    		<div class="fv-row mb-7">
	    		  <!--begin::Label-->
	    		  <label class="required fw-semibold fs-6 mb-2">Is Default</label>
	    		  <!--end::Label-->	
	    		  <select name="is_default" class="form-select form-select-solid @error('is_default') is-invalid @enderror" data-control="select2" data-placeholder="Select an option" data-allow-clear="true">
	    		      <option></option>
	    		      <option {{ old('is_default') == "1" ? 'selected' : '' }} value="1">Yes</option>
	    		      <option {{ old('is_default') == "0" ? 'selected' : '' }} value="0">No</option>
	    		  </select>
	    		  @error('is_default')
	    		      <span class="invalid-feedback" role="alert">
	    		          <strong>{{ $message }}</strong>
	    		      </span>
	    		  @enderror
	    		</div>
	    		<!--end::Input group-->

	    		<!--begin::Input group-->
	    		<div class="fv-row mb-7">
	    		  <!--begin::Label-->
	    		  <label class="required fw-semibold fs-6 mb-2">Status</label>
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