@extends('backend.layouts.admin_master')
@section('title')
	Gallery Image Edit
@endsection
@section('admin_css')

@endsection

@section('content')
	<div class="card shadow-sm">
	    <div class="card-header">
	        <h3 class="card-title">Gallery Image Edit</h3>
	        <div class="card-toolbar">
	            <a href="{{ route('admin.galleryimages.index', ['product' => $product->id]) }}" class="btn btn-sm btn-light">
	                <i class="fas fa-list"></i> Gallery Image Lists
	            </a>
	        </div>
	    </div>
	    <div class="card-body">

	    	<form action="{{ route('admin.galleryimages.update', ['product' => $product->id, 'galleryimage' => $galleryimage->id]) }}" method="POST" enctype="multipart/form-data">
	    		@csrf
	    		@method('PUT')

	    		@if ($errors->any())
	    		    <div class="alert alert-danger">
	    		        <ul>
	    		            @foreach ($errors->all() as $error)
	    		                <li>{{ $error }}</li>
	    		            @endforeach
	    		        </ul>
	    		    </div>
	    		@endif


	    		<!--begin::Input group-->
	    		<div class="fv-row mb-7">
	    		  <!--begin::Label-->
	    		  <label class="required fw-semibold fs-6 mb-2">Gallery Image</label>
	    		  <!--end::Label-->
	    		  <!--begin::Input-->
	    		  <input type="file" name="multi_image" id="multi_image" class="form-control form-control-solid mb-3 mb-lg-0 @error('multi_image') is-invalid @enderror" value="" multiple />
	    		  <!--end::Input-->
	    		  @error('multi_image')
	    		      <span class="invalid-feedback" role="alert">
	    		          <strong>{{ $message }}</strong>
	    		      </span>
	    		  @enderror
	    		</div>
	    		<!--end::Input group-->

	    		<div class="fv-row mb-7">
		    		<div class="col-md-12">
	                    <div class="mt-1 text-center">
	                        <div class="images-preview-div d-flex">
	                        	<img src="{{ asset($galleryimage->multi_image) }}"width="100" height="100" alt="">
	                        </div>
	                    </div>  
	                </div>
	    		</div>

	    		<!--begin::Input group-->
	    		<div class="fv-row mb-7">
	    		  <!--begin::Label-->
	    		  <label class="required fw-semibold fs-6 mb-2">Status</label>
	    		  <!--end::Label-->	
	    		  <select name="status" class="form-select form-select-solid @error('status') is-invalid @enderror" data-control="select2" data-placeholder="Select an option" data-allow-clear="true">
	    		      <option></option>
	    		      <option {{ old('status', $galleryimage->status) == "1" ? 'selected' : '' }} value="1">Active</option>
	    		      <option {{ old('status', $galleryimage->status) == "0" ? 'selected' : '' }} value="0">Inactive</option>
	    		  </select>
	    		  {{-- @error('status')
	    		      <span class="invalid-feedback" role="alert">
	    		          <strong>{{ $message }}</strong>
	    		      </span>
	    		  @enderror --}}
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
	<script >
	    $(function() {
	    // Multiple images preview with JavaScript
	    var previewImages = function(input, imgPreviewPlaceholder) {

	        if (input.files) {
	            var filesAmount = input.files.length;

	            for (i = 0; i < filesAmount; i++) {
	                var reader = new FileReader();

	                reader.onload = function(event) {
	                    $($.parseHTML('<img class="mx-2" with="100" height="100">')).attr('src', event.target.result).appendTo(imgPreviewPlaceholder);
	                }

	                reader.readAsDataURL(input.files[i]);
	            }
	        }

	    };

	    $('#multi_image').on('change', function() {
	    	$(".images-preview-div").empty();
	        previewImages(this, 'div.images-preview-div');
	    });
	  });
	</script>
@endsection