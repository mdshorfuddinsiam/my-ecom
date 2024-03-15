@extends('backend.layouts.admin_master')
@section('title')
	Blog Post Create
@endsection
@section('admin_css')
	<!--begin::Vendor Stylesheets(used by this page)-->
	<link href="{{ asset('backend') }}/assets/plugins/custom/prismjs/prismjs.bundle.css" rel="stylesheet" type="text/css" />
	<!--end::Vendor Stylesheets-->
@endsection

@section('content')
	<style>
		.ck-rounded-corners .ck.ck-editor__editable:not(.ck-editor__nested-editable), .ck.ck-editor__editable.ck-rounded-corners:not(.ck-editor__nested-editable) {
		    border-radius: var(--ck-border-radius);
		    background-color: #023042;
		}
	</style>

	<div class="card shadow-sm">
	    <div class="card-header">
	        <h3 class="card-title">Blog Post Create</h3>
	        <div class="card-toolbar">
	            <a href="{{ route('admin.blogposts.create') }}" class="btn btn-sm btn-light">
	                <i class="fas fa-list"></i> Blog Post Lists
	            </a>
	        </div>
	    </div>
	    <div class="card-body">

	    	<form action="{{ route('admin.blogposts.store') }}" method="POST" enctype="multipart/form-data">
	    		@csrf

	    		<!--begin::Input group-->
	    		<div class="fv-row mb-7">
	    		  <!--begin::Label-->
	    		  <label class="required d-block fw-semibold fs-6 mb-5">Image</label>
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
	    		    <div class="image-input-wrapper w-125px h-125px" style="background-image: url({{ asset('/uploads/no_image.jpg') }});"></div>
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
	    		  <label class="required fw-semibold fs-6 mb-2">Blog-Category Name</label>
	    		  <!--end::Label-->	
	    		  <select name="blogcategory_id" class="form-select form-select-solid @error('blogcategory_id') is-invalid @enderror" data-control="select2" data-placeholder="Select an option" data-allow-clear="true">
	    		      <option></option>
	    		      @foreach($blogcategories as $row)
	    		      <option {{ old('blogcategory_id') == $row->id ? 'selected' : '' }} value="{{ $row->id }}">{{ $row->name }}</option>
	    		      @endforeach
	    		  </select>
	    		  @error('blogcategory_id')
	    		      <span class="invalid-feedback" role="alert">
	    		          <strong>{{ $message }}</strong>
	    		      </span>
	    		  @enderror
	    		</div>
	    		<!--end::Input group-->

	    		<!--begin::Input group-->
	    		<div class="fv-row mb-7">
	    		  <!--begin::Label-->
	    		  <label class="required fw-semibold fs-6 mb-2">Title</label>
	    		  <!--end::Label-->
	    		  <!--begin::Input-->
	    		  <input type="text" name="title" class="form-control form-control-solid mb-3 mb-lg-0 @error('title') is-invalid @enderror" placeholder="Title" value="{{ old('title') }}" />
	    		  <!--end::Input-->
	    		  @error('title')
	    		      <span class="invalid-feedback" role="alert">
	    		          <strong>{{ $message }}</strong>
	    		      </span>
	    		  @enderror
	    		</div>
	    		<!--end::Input group-->

				<!--begin::Input group-->
				<div class="fv-row mb-7">
				  <!--begin::Label-->
				  <label class="required fw-semibold fs-6 mb-2">Description</label>
				  <!--end::Label-->
				  <!--begin::Input-->
				  <div class="py-5" data-bs-theme="light">
				      <textarea name="description" id="description" class="@error('description') is-invalid @enderror">{!! old('description') !!}</textarea>
				  </div>
				  <!--end::Input-->
				  @if($errors->has('description'))
				      <span class="error text-danger" role="alert">
				      	<strong>{{ $errors->first('description') }}</strong>
				      </span>
				  @endif
				</div>
				<!--end::Input group-->

				<!--begin::Input group-->
	    		<div class="fv-row mb-7">
	    		  <!--begin::Label-->
	    		  <label class="required fw-semibold fs-6 mb-2">Is Popular</label>
	    		  <!--end::Label-->	
	    		  <select name="is_popular" class="form-select form-select-solid @error('is_popular') is-invalid @enderror" data-control="select2" data-placeholder="Select an option" data-allow-clear="true">
	    		      <option></option>
	    		      <option {{ old('is_popular') == "1" ? 'selected' : '' }} value="1">Yes</option>
	    		      <option {{ old('is_popular') == "0" ? 'selected' : '' }} value="0">No</option>
	    		  </select>
	    		  @error('is_popular')
	    		      <span class="invalid-feedback" role="alert">
	    		          <strong>{{ $message }}</strong>
	    		      </span>
	    		  @enderror
	    		</div>
	    		<!--end::Input group-->

	    		<!--begin::Input group-->
	    		<div class="fv-row mb-7">
	    		  <!--begin::Label-->
	    		  <label class=" fw-semibold fs-6 mb-2">Seo Title</label>
	    		  <!--end::Label-->
	    		  <!--begin::Input-->
	    		  <input type="text" name="seo_title" class="form-control form-control-solid mb-3 mb-lg-0 @error('seo_title') is-invalid @enderror" placeholder="Seo Title" value="{{ old('seo_title') }}" />
	    		  <!--end::Input-->
	    		  @error('seo_title')
	    		      <span class="invalid-feedback" role="alert">
	    		          <strong>{{ $message }}</strong>
	    		      </span>
	    		  @enderror
	    		</div>
	    		<!--end::Input group-->

	    		<!--begin::Input group-->
				<div class="fv-row mb-7">
				  <!--begin::Label-->
				  <label class=" fw-semibold fs-6 mb-2">Seo Description</label>
				  <!--end::Label-->
				  <!--begin::Input-->
				  <textarea type="text" name="seo_description" class="form-control form-control-solid mb-3 mb-lg-0 @error('seo_description') is-invalid @enderror" placeholder="Leave a description here">{{ old('seo_description') }}</textarea>
				  <!--end::Input-->
				  @error('seo_description')
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
	<!--begin::Vendors Javascript(used by this page)-->
	<script src="{{ asset('backend') }}/assets/plugins/custom/prismjs/prismjs.bundle.js"></script>
	<script src="{{ asset('backend') }}/assets/plugins/custom/ckeditor/ckeditor-classic.bundle.js"></script>
	<!--end::Vendors Javascript-->

	<!--begin::Custom Javascript(used by this page)-->
	<script src="{{ asset('backend') }}/assets/js/custom/documentation/documentation.js"></script>
	<script src="{{ asset('backend') }}/assets/js/custom/documentation/search.js"></script>
	<script src="{{ asset('backend') }}/assets/js/custom/documentation/editors/ckeditor/classic.js"></script>
	<!--end::Custom Javascript-->

	<script>
		ClassicEditor
		    .create(document.querySelector('#description'))
		    .then(editor => {
		        console.log(editor);
		    })
		    .catch(error => {
		        console.error(error);
		    });
	</script>
@endsection