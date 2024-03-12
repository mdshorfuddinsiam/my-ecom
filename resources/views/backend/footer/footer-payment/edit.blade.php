@extends('backend.layouts.admin_master')
@section('title')
	Footer Payment Edit
@endsection
@section('admin_css')

@endsection

@section('content')
	<div class="card shadow-sm">
	    <div class="card-header">
	        <h3 class="card-title">Footer Payment Edit</h3>
	        <div class="card-toolbar">
	            <a href="{{ route('admin.footerpayments.index') }}" class="btn btn-sm btn-light">
	                <i class="fas fa-list"></i> Footer Payment Lists
	            </a>
	        </div>
	    </div>
	    <div class="card-body">

	    	<form action="{{ route('admin.footerpayments.update', ['footerpayment' => $footerpayment->id]) }}" method="POST" enctype="multipart/form-data">
	    		@csrf
	    		@method('PUT')

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
	    		  <label class=" d-block fw-semibold fs-6 mb-5">Image</label>
	    		  <!--end::Label-->
	    		  <!--begin::Image placeholder-->
	    		  <style>
	    		    .image-input-placeholder {
	    		      background-image: url('{{ asset('backend') }}/assets/media/svg/files/blank-image.svg');
	    		    }

	    		    [data-theme="dark"] .image-input-placeholder {
	    		      background-image: url('{{ asset('backend') }}/assets/media/svg/files/blank-image-dark.svg');
	    		    }
	    		  </style>
	    		  <!--end::Image placeholder-->
	    		  <!--begin::Image input-->
	    		  <div class="image-input image-input-outline image-input-placeholder" data-kt-image-input="true">
	    		    <!--begin::Preview existing avatar-->
	    		    <div class="image-input-wrapper w-125px h-125px" style="background-image: url({{ $footerpayment->image ? asset($footerpayment->image) : asset('/uploads/no_image.jpg') }});"></div>
	    		    <!--end::Preview existing avatar-->
	    		    <!--begin::Label-->
	    		    <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow " data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
	    		      <i class="bi bi-pencil-fill fs-7"></i>
	    		      <!--begin::Inputs-->
	    		      <input type="file" name="image" accept=".png, .jpg, .jpeg" value="{{-- {{ old('image') }} --}}" />
	    		      {{-- <input type="hidden" name="avatar_remove" /> --}}
	    		      <!--end::Inputs-->
	    		    </label>
	    		    <!--end::Label-->
	    		    <!--begin::Cancel-->
	    		    <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
	    		      <i class="bi bi-x fs-2"></i>
	    		    </span>
	    		    <!--end::Cancel-->
	    		    <!--begin::Remove-->
	    		    <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove avatar">
	    		      <i class="bi bi-x fs-2"></i>
	    		    </span>
	    		    <!--end::Remove-->
	    		  </div>
	    		  <!--end::Image input-->
	    		  <!--begin::Hint-->
	    		  <div class="form-text">Allowed file types: png, jpg, jpeg.</div>
	    		  <!--end::Hint-->
	    		  @if($errors->has('image'))
	    		      <span class="error text-danger" role="alert">
	    		      	<strong>{{ $errors->first('image') }}</strong>
	    		      </span>
	    		  @endif
	    		</div>
	    		<!--end::Input group-->

	    		<!--begin::Input group-->
	    		<div class="fv-row mb-7">
	    		  <!--begin::Label-->
	    		  <label class="required fw-semibold fs-6 mb-2">Status</label>
	    		  <!--end::Label-->	
	    		  <select name="status" class="form-select form-select-solid @error('status') is-invalid @enderror" data-control="select2" data-placeholder="Select an option" data-allow-clear="true">
	    		      <option></option>
	    		      <option {{ old('status', $footerpayment->status) == "1" ? 'selected' : '' }} value="1">Active</option>
	    		      <option {{ old('status', $footerpayment->status) == "0" ? 'selected' : '' }} value="0">Inactive</option>
	    		  </select>
	    		  @error('status')
	    		      <span class="invalid-feedback" role="alert">
	    		          <strong>{{ $message }}</strong>
	    		      </span>
	    		  @enderror
	    		</div>
	    		<!--end::Input group-->

	    		<div class="fv-row mb-7">
	    			<input type="submit" class="btn btn-light-primary mt-5" value="Update">
	    		</div>
	    		
	    	</form>
	    </div>		
	</div>

@endsection

@section('admin_js')

@endsection