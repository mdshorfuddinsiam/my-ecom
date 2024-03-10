@extends('backend.layouts.admin_master')
@section('title')
	Product Edit
@endsection
@section('admin_css')
	<!--begin::Vendor Stylesheets(used by this page)-->
	<link href="{{ asset('backend') }}/assets/plugins/custom/prismjs/prismjs.bundle.css" rel="stylesheet" type="text/css" />
	<!--end::Vendor Stylesheets-->
@endsection
	<style>
		.ck-rounded-corners .ck.ck-editor__editable:not(.ck-editor__nested-editable), .ck.ck-editor__editable.ck-rounded-corners:not(.ck-editor__nested-editable) {
		    border-radius: var(--ck-border-radius);
		    background-color: #023042;
		}
	</style>

@section('content')
	<div class="card shadow-sm">
	    <div class="card-header">
	        <h3 class="card-title">Product Edit</h3>
	        <div class="card-toolbar">
	            <a href="{{ route('admin.products.index') }}" class="btn btn-sm btn-light">
	                <i class="fas fa-list"></i> Product Lists
	            </a>
	        </div>
	    </div>
	    <div class="card-body">

	    	<form action="{{ route('admin.products.update', ['product' => $product->id]) }}" method="POST" enctype="multipart/form-data">
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
	    		  <label class=" d-block fw-semibold fs-6 mb-5">Thumbnail Image</label>
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
	    		    <div class="image-input-wrapper w-125px h-125px" style="background-image: url({{ $product->thumbnail_image ? asset($product->thumbnail_image) : asset('/uploads/no_image.jpg') }});"></div>
	    		    <!--end::Preview existing avatar-->
	    		    <!--begin::Label-->
	    		    <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow " data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
	    		      <i class="bi bi-pencil-fill fs-7"></i>
	    		      <!--begin::Inputs-->
	    		      <input type="file" name="thumbnail_image" accept=".png, .jpg, .jpeg" value="{{ old('thumbnail_image') }}" />
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
	    		  @if($errors->has('thumbnail_image'))
	    		      <span class="error text-danger" role="alert">
	    		      	<strong>{{ $errors->first('thumbnail_image') }}</strong>
	    		      </span>
	    		  @endif
	    		</div>
	    		<!--end::Input group-->
	    		<div class="row">
	    			<div class="col-md-6">
	    				<!--begin::Input group-->
	    				<div class="fv-row mb-7">
	    				  <!--begin::Label-->
	    				  <label class="required fw-semibold fs-6 mb-2">Title</label>
	    				  <!--end::Label-->
	    				  <!--begin::Input-->
	    				  <input type="text" name="title" class="form-control form-control-solid mb-3 mb-lg-0 @error('title') is-invalid @enderror" placeholder="Title" value="{{ old('title') ?? $product->title }}" />
	    				  <!--end::Input-->
	    				  @error('title')
	    				      <span class="invalid-feedback" role="alert">
	    				          <strong>{{ $message }}</strong>
	    				      </span>
	    				  @enderror
	    				</div>
	    				<!--end::Input group-->
	    			</div>
	    			<div class="col-md-6">
			    		<!--begin::Input group-->
			    		<div class="fv-row mb-7">
			    		  <!--begin::Label-->
			    		  <label class="required fw-semibold fs-6 mb-2">Brand Name</label>
			    		  <!--end::Label-->	
			    		  <select name="brand_id" id="brand_id" class="form-select form-select-solid @error('brand_id') is-invalid @enderror" data-control="select2" data-placeholder="Select an option" data-allow-clear="true">
			    		      <option></option>
			    		      @foreach($brands as $row)
			    		      <option {{ old('brand_id', $product->brand_id) == $row->id ? 'selected' : '' }} value="{{ $row->id }}">{{ $row->name }}</option>
			    		      @endforeach
			    		  </select>
			    		  @error('brand_id')
			    		      <span class="invalid-feedback" role="alert">
			    		          <strong>{{ $message }}</strong>
			    		      </span>
			    		  @enderror
			    		</div>
			    		<!--end::Input group-->
	    			</div>
	    		</div>
	    		<div class="row">
	    			<div class="col-md-4">
	    				<!--begin::Input group-->
	    				<div class="fv-row mb-7">
	    				  <!--begin::Label-->
	    				  <label class="required fw-semibold fs-6 mb-2">Category Name</label>
	    				  <!--end::Label-->	
	    				  <select name="category_id" id="category_id" class="form-select form-select-solid @error('category_id') is-invalid @enderror" data-control="select2" data-placeholder="Select an option" data-allow-clear="true">
	    				      <option></option>
	    				      @foreach($categories as $row)
	    				      <option {{ old('category_id', $product->category_id) == $row->id ? 'selected' : '' }} value="{{ $row->id }}">{{ $row->name }}</option>
	    				      @endforeach
	    				  </select>
	    				  @error('category_id')
	    				      <span class="invalid-feedback" role="alert">
	    				          <strong>{{ $message }}</strong>
	    				      </span>
	    				  @enderror
	    				</div>
	    				<!--end::Input group-->
	    			</div>
	    			<div class="col-md-4">
	    				<!--begin::Input group-->
	    				<div class="fv-row mb-7">
	    				  <!--begin::Label-->
	    				  <label class=" fw-semibold fs-6 mb-2">Sub-Category Name</label>
	    				  <!--end::Label-->	
	    				  <select name="subcategory_id" id="subcategory_id" class="form-select form-select-solid @error('subcategory_id') is-invalid @enderror" data-control="select2" data-placeholder="Select an option" data-allow-clear="true">
	    				      <option></option>
	    				      @foreach($product->category->subcategories as $row)
	    				      <option {{ old('subcategory_id', $product->subcategory_id) == $row->id ? 'selected' : '' }} value="{{ $row->id }}">{{ $row->name }}</option>
	    				      @endforeach
	    				  </select>
	    				  @error('subcategory_id')
	    				      <span class="invalid-feedback" role="alert">
	    				          <strong>{{ $message }}</strong>
	    				      </span>
	    				  @enderror
	    				</div>
	    				<!--end::Input group-->
	    			</div>
	    			<div class="col-md-4">
	    				<!--begin::Input group-->
	    				<div class="fv-row mb-7">
	    				  <!--begin::Label-->
	    				  <label class=" fw-semibold fs-6 mb-2">Sub-SubCategory Name</label>
	    				  <!--end::Label-->	
	    				  <select name="subsubcategory_id" class="form-select form-select-solid @error('subsubcategory_id') is-invalid @enderror" data-control="select2" data-placeholder="Select an option" data-allow-clear="true">
	    				      <option></option>
	    				      @if(!empty($product->subcategory_id))
		    				      @foreach($product->subcategory->subsubcategories as $row)
		    				      <option {{ old('subsubcategory_id', $product->subsubcategory_id) == $row->id ? 'selected' : '' }} value="{{ $row->id }}">{{ $row->name }}</option>
		    				      @endforeach
		    				  @endif
	    				  </select>
	    				  @error('subsubcategory_id')
	    				      <span class="invalid-feedback" role="alert">
	    				          <strong>{{ $message }}</strong>
	    				      </span>
	    				  @enderror
	    				</div>
	    				<!--end::Input group-->
	    			</div>
	    		</div>
	    		<div class="row">
	    			<div class="col-md-6">
	    				<!--begin::Input group-->
	    				<div class="fv-row mb-7">
	    				  <!--begin::Label-->
	    				  <label class="required fw-semibold fs-6 mb-2">Selling Price</label>
	    				  <!--end::Label-->
	    				  <!--begin::Input-->
	    				  <input type="text" name="selling_price" class="form-control form-control-solid mb-3 mb-lg-0 @error('selling_price') is-invalid @enderror" placeholder="0.00" value="{{ old('selling_price') ?? $product->selling_price }}" min="0.00" />
	    				  <!--end::Input-->
	    				  @error('selling_price')
	    				      <span class="invalid-feedback" role="alert">
	    				          <strong>{{ $message }}</strong>
	    				      </span>
	    				  @enderror
	    				</div>
	    				<!--end::Input group-->
	    			</div>
	    			<div class="col-md-6">
			    		<!--begin::Input group-->
	    				<div class="fv-row mb-7">
	    				  <!--begin::Label-->
	    				  <label class=" fw-semibold fs-6 mb-2">Discount Price</label>
	    				  <!--end::Label-->
	    				  <!--begin::Input-->
	    				  <input type="text" name="discount_price" class="form-control form-control-solid mb-3 mb-lg-0 @error('discount_price') is-invalid @enderror" placeholder="0.00" value="{{ old('discount_price') ?? $product->discount_price }}" min="0.00" />
	    				  <!--end::Input-->
	    				  @error('discount_price')
	    				      <span class="invalid-feedback" role="alert">
	    				          <strong>{{ $message }}</strong>
	    				      </span>
	    				  @enderror
	    				</div>
	    				<!--end::Input group-->
	    			</div>
	    		</div>
	    		<div class="row">
	    			<div class="col-md-6">
	    				<!--begin::Input group-->
	    				<div class="fv-row mb-7">
	    				  <!--begin::Label-->
	    				  <label class=" fw-semibold fs-6 mb-2">Start Discount Date</label>
	    				  <!--end::Label-->
	    				  <!--begin::Input-->
	    				  <input type="date" name="start_discount_date" class="form-control form-control-solid mb-3 mb-lg-0 @error('start_discount_date') is-invalid @enderror" placeholder="" value="{{ old('start_discount_date') ?? $product->start_discount_date }}" />
	    				  <!--end::Input-->
	    				  @error('start_discount_date')
	    				      <span class="invalid-feedback" role="alert">
	    				          <strong>{{ $message }}</strong>
	    				      </span>
	    				  @enderror
	    				</div>
	    				<!--end::Input group-->
	    			</div>
	    			<div class="col-md-6">
	    				<!--begin::Input group-->
	    				<div class="fv-row mb-7">
	    				  <!--begin::Label-->
	    				  <label class=" fw-semibold fs-6 mb-2">End Discount Date</label>
	    				  <!--end::Label-->
	    				  <!--begin::Input-->
	    				  <input type="date" name="end_discount_date" class="form-control form-control-solid mb-3 mb-lg-0 @error('end_discount_date') is-invalid @enderror" placeholder="" value="{{ old('end_discount_date') ?? $product->end_discount_date }}" />
	    				  <!--end::Input-->
	    				  @error('end_discount_date')
	    				      <span class="invalid-feedback" role="alert">
	    				          <strong>{{ $message }}</strong>
	    				      </span>
	    				  @enderror
	    				</div>
	    				<!--end::Input group-->
	    			</div>
	    		</div>
	    		<div class="row">
	    			<div class="col-md-6">
	    				<!--begin::Input group-->
			    		<div class="fv-row mb-7">
			    		  <!--begin::Label-->
			    		  <label class="required fw-semibold fs-6 mb-2">Unit</label>
			    		  <!--end::Label-->	
			    		  <select name="unit" class="form-select form-select-solid @error('unit') is-invalid @enderror" data-control="select2" data-placeholder="Select an option" data-allow-clear="true">
			    		      <option></option>
			    		      <option {{ old('unit', $product->unit) == "pc" ? 'selected' : '' }} value="pc">Piece</option>
			    		      <option {{ old('unit', $product->unit) == "kg" ? 'selected' : '' }} value="kg">KG</option>
			    		  </select>
			    		  @error('unit')
			    		      <span class="invalid-feedback" role="alert">
			    		          <strong>{{ $message }}</strong>
			    		      </span>
			    		  @enderror
			    		</div>
			    		<!--end::Input group-->
	    			</div>
	    			<div class="col-md-6">
	    				<!--begin::Input group-->
	    				<div class="fv-row mb-7">
	    				  <!--begin::Label-->
	    				  <label class="required fw-semibold fs-6 mb-2">SKU</label>
	    				  <!--end::Label-->
	    				  <!--begin::Input-->
	    				  <input type="text" name="sku" class="form-control form-control-solid mb-3 mb-lg-0 @error('sku') is-invalid @enderror" placeholder="XYZ-12345" value="{{ old('sku') ?? $product->sku }}" />
	    				  <!--end::Input-->
	    				  @error('sku')
	    				      <span class="invalid-feedback" role="alert">
	    				          <strong>{{ $message }}</strong>
	    				      </span>
	    				  @enderror
	    				</div>
	    				<!--end::Input group-->
	    			</div>
	    		</div>

				<!--begin::Input group-->
				<div class="fv-row mb-7">
				  <!--begin::Label-->
				  <label class="required fw-semibold fs-6 mb-2">Short Description</label>
				  <!--end::Label-->
				  <!--begin::Input-->
				  {{-- <textarea class="form-control" placeholder="Leave a description here"></textarea> --}}
				  <textarea type="text" name="short_description" class="form-control form-control-solid mb-3 mb-lg-0 @error('short_description') is-invalid @enderror" placeholder="Leave a description here">{{ old('short_description') ?? $product->short_description }}</textarea>
				  <!--end::Input-->
				  @error('short_description')
				      <span class="invalid-feedback" role="alert">
				          <strong>{{ $message }}</strong>
				      </span>
				  @enderror
				</div>
				<!--end::Input group-->

				<!--begin::Input group-->
				<div class="fv-row mb-7">
				  <!--begin::Label-->
				  <label class="required fw-semibold fs-6 mb-2">Long Description</label>
				  <!--end::Label-->
				  <!--begin::Input-->
				  <div class="py-5" data-bs-theme="light">
				      <textarea name="long_description" id="long_description" class="@error('long_description') is-invalid @enderror">{!! old('long_description') ?? $product->long_description !!}</textarea>
				  </div>
				  <!--end::Input-->
				  @if($errors->has('long_description'))
				      <span class="error text-danger" role="alert">
				      	<strong>{{ $errors->first('long_description') }}</strong>
				      </span>
				  @endif
				</div>
				<!--end::Input group-->

				<!--begin::Input group-->
				<div class="fv-row mb-7">
				  <!--begin::Label-->
				  <label class=" fw-semibold fs-6 mb-2">Video Link</label>
				  <!--end::Label-->
				  <!--begin::Input-->
				  <input type="url" name="video_link" class="form-control form-control-solid mb-3 mb-lg-0 @error('video_link') is-invalid @enderror" placeholder="Video Link" value="{{ old('video_link') ?? $product->video_link }}" />
				  <!--end::Input-->
				  @error('video_link')
				      <span class="invalid-feedback" role="alert">
				          <strong>{{ $message }}</strong>
				      </span>
				  @enderror
				</div>
				<!--end::Input group-->

				<!--begin::Input group-->
				<div class="fv-row mb-7">
				  <!--begin::Label-->
				  <label class=" fw-semibold fs-6 mb-2">SEO Title</label>
				  <!--end::Label-->
				  <!--begin::Input-->
				  <input type="text" name="seo_title" class="form-control form-control-solid mb-3 mb-lg-0 @error('seo_title') is-invalid @enderror" placeholder="SEO Title" value="{{ old('seo_title') ?? $product->seo_title }}" />
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
				  <label class=" fw-semibold fs-6 mb-2">SEO Description</label>
				  <!--end::Label-->
				  <!--begin::Input-->
				  {{-- <textarea class="form-control" placeholder="Leave a description here"></textarea> --}}
				  <textarea type="text" name="seo_description" class="form-control form-control-solid mb-3 mb-lg-0 @error('seo_description') is-invalid @enderror" placeholder="Leave a description here">{{ old('seo_description') ?? $product->seo_description }}</textarea>
				  <!--end::Input-->
				  @error('seo_description')
				      <span class="invalid-feedback" role="alert">
				          <strong>{{ $message }}</strong>
				      </span>
				  @enderror
				</div>
				<!--end::Input group-->

				<div class="row">
					<div class="col-md-6">
						<!--begin::Input group-->
						<div class="fv-row mb-7">
						  <!--begin::Input-->
						  <div class="form-check form-switch form-check-custom form-check-solid">
						    <input name="is_new" class="form-check-input @error('is_new') is-invalid @enderror" type="checkbox" {{ old('is_new', $product->is_new) == '1' ? 'checked' : '' }} value="1" id="is_new"/>
						    <label class="form-check-label" for="is_new">
						        New
						    </label>
						  </div>
						  <!--end::Input-->
						  @if($errors->has('is_new'))
						      <span class="error text-danger" role="alert">
						      	<strong>{{ $errors->first('is_new') }}</strong>
						      </span>
						  @endif
						</div>
						<!--end::Input group-->
						<!--begin::Input group-->
						<div class="fv-row mb-7">
						  <!--begin::Input-->
						  <div class="form-check form-switch form-check-custom form-check-solid">
						    <input name="is_top" class="form-check-input @error('is_top') is-invalid @enderror" type="checkbox" {{ old('is_top', $product->is_top) == '1' ? 'checked' : '' }} value="1" id="is_top"/>
						    <label class="form-check-label" for="is_top">
						        Top
						    </label>
						  </div>
						  <!--end::Input-->
						  @if($errors->has('is_top'))
						      <span class="error text-danger" role="alert">
						      	<strong>{{ $errors->first('is_top') }}</strong>
						      </span>
						  @endif
						</div>
						<!--end::Input group-->
						<!--begin::Input group-->
						<div class="fv-row mb-7">
						  <!--begin::Input-->
						  <div class="form-check form-switch form-check-custom form-check-solid">
						    <input name="is_today_deals" class="form-check-input @error('is_today_deals') is-invalid @enderror" type="checkbox" {{ old('is_today_deals', $product->is_today_deals) == '1' ? 'checked' : '' }} value="1" id="is_today_deals"/>
						    <label class="form-check-label" for="is_today_deals">
						        Today Deals
						    </label>
						  </div>
						  <!--end::Input-->
						  @if($errors->has('is_today_deals'))
						      <span class="error text-danger" role="alert">
						      	<strong>{{ $errors->first('is_today_deals') }}</strong>
						      </span>
						  @endif
						</div>
						<!--end::Input group-->
					</div>
					<div class="col-md-6">
						<!--begin::Input group-->
						<div class="fv-row mb-7">
						  <!--begin::Input-->
						  <div class="form-check form-switch form-check-custom form-check-solid">
						    <input name="is_featured" class="form-check-input @error('is_featured') is-invalid @enderror" type="checkbox" {{ old('is_featured', $product->is_featured) == '1' ? 'checked' : '' }} value="1" id="is_featured"/>
						    <label class="form-check-label" for="is_featured">
						        Featured
						    </label>
						  </div>
						  <!--end::Input-->
						  @if($errors->has('is_featured'))
						      <span class="error text-danger" role="alert">
						      	<strong>{{ $errors->first('is_featured') }}</strong>
						      </span>
						  @endif
						</div>
						<!--end::Input group-->
						<!--begin::Input group-->
						<div class="fv-row mb-7">
						  <!--begin::Input-->
						  <div class="form-check form-switch form-check-custom form-check-solid">
						    <input name="is_best" class="form-check-input @error('is_best') is-invalid @enderror" type="checkbox" {{ old('is_best', $product->is_best) == '1' ? 'checked' : '' }} value="1" id="is_best"/>
						    <label class="form-check-label" for="is_best">
						        Best
						    </label>
						  </div>
						  <!--end::Input-->
						  @if($errors->has('is_best'))
						      <span class="error text-danger" role="alert">
						      	<strong>{{ $errors->first('is_best') }}</strong>
						      </span>
						  @endif
						</div>
						<!--end::Input group-->
					</div>
				</div>

				{{-- <div class="form-check form-switch form-check-custom form-check-solid">
				    <input class="form-check-input" type="checkbox" value="" id="flexSwitchDefault"/>
				    <label class="form-check-label" for="flexSwitchDefault">
				        Default switch
				    </label>
				</div> --}}

	    		<!--begin::Input group-->
	    		<div class="fv-row mb-7 mt-5">
	    		  <!--begin::Label-->
	    		  <label class="required fw-semibold fs-6 mb-2">Status</label>
	    		  <!--end::Label-->	
	    		  <select name="status" class="form-select form-select-solid @error('status') is-invalid @enderror" data-control="select2" data-placeholder="Select an option" data-allow-clear="true">
	    		      <option></option>
	    		      <option {{ old('status', $product->status) == "1" ? 'selected' : '' }} value="1">Active</option>
	    		      <option {{ old('status', $product->status) == "0" ? 'selected' : '' }} value="0">Inactive</option>
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
		$(document).on('change', '#category_id', function(){
			let category_id = $(this).val();
			// alert(category_id);

			$.ajax({
				url: "{{ route('admin.getsubcat') }}",
				method: "POST",
				dataType: "JSON",
				data: { category_id:category_id },
				success: function(response){
					console.log(response);

					$("select[name='subsubcategory_id']").empty();
					$("select[name='subcategory_id']").empty();

					var html = '<option></option>';

					$.each(response.data, function(index, value){
						// console.log(value);
						html += `<option value="${value.id}">${value.name}</option>`;
					});

					$("select[name='subcategory_id']").append(html);
				}

			});
		});
	</script>
	<script>
		$(document).on('change', '#subcategory_id', function(){
			let subcategory_id = $(this).val();
			// alert(subcategory_id);

			$.ajax({
				url: "{{ route('admin.getsubsubcat') }}",
				method: "POST",
				dataType: "JSON",
				data: { subcategory_id:subcategory_id },
				success: function(response){
					console.log(response);

					$("select[name='subsubcategory_id']").empty();

					var html = '<option></option>';

					$.each(response.data, function(index, value){
						// console.log(value);
						html += `<option value="${value.id}">${value.name}</option>`;
					});

					$("select[name='subsubcategory_id']").append(html);
				}

			});
		});
	</script>
	<script>
		ClassicEditor
		    .create(document.querySelector('#long_description'))
		    .then(editor => {
		        console.log(editor);
		    })
		    .catch(error => {
		        console.error(error);
		    });
	</script>
@endsection