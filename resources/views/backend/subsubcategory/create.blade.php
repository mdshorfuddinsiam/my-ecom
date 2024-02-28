@extends('backend.layouts.admin_master')
@section('title')
	Sub-SubCategory Create
@endsection
@section('admin_css')

@endsection

@section('content')
	<div class="card shadow-sm">
	    <div class="card-header">
	        <h3 class="card-title">Sub-SubCategory Create</h3>
	        <div class="card-toolbar">
	            <a href="{{ route('admin.subsubcategories.index') }}" class="btn btn-sm btn-light">
	                <i class="fas fa-list"></i> Sub-SubCategory Lists
	            </a>
	        </div>
	    </div>
	    <div class="card-body">

	    	<form action="{{ route('admin.subsubcategories.store') }}" method="POST" enctype="multipart/form-data">
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
	    		  <label class="required fw-semibold fs-6 mb-2">Category Name</label>
	    		  <!--end::Label-->	
	    		  <select name="category_id" id="category_id" class="form-select form-select-solid @error('category_id') is-invalid @enderror" data-control="select2" data-placeholder="Select an option" data-allow-clear="true">
	    		      <option></option>
	    		      @foreach($categories as $row)
	    		      <option {{ old('category_id') == $row->id ? 'selected' : '' }} value="{{ $row->id }}">{{ $row->name }}</option>
	    		      @endforeach
	    		  </select>
	    		  @error('category_id')
	    		      <span class="invalid-feedback" role="alert">
	    		          <strong>{{ $message }}</strong>
	    		      </span>
	    		  @enderror
	    		</div>
	    		<!--end::Input group-->

	    		<!--begin::Input group-->
	    		<div class="fv-row mb-7">
	    		  <!--begin::Label-->
	    		  <label class="required fw-semibold fs-6 mb-2">Sub-Category Name</label>
	    		  <!--end::Label-->	
	    		  <select name="subcategory_id" class="form-select form-select-solid @error('subcategory_id') is-invalid @enderror" data-control="select2" data-placeholder="Select an option" data-allow-clear="true">
	    		      <option></option>
	    		      {{-- @foreach($categories as $row)
	    		      <option {{ old('subcategory_id') == $row->id ? 'selected' : '' }} value="{{ $row->id }}">{{ $row->name }}</option>
	    		      @endforeach --}}
	    		  </select>
	    		  @error('subcategory_id')
	    		      <span class="invalid-feedback" role="alert">
	    		          <strong>{{ $message }}</strong>
	    		      </span>
	    		  @enderror
	    		</div>
	    		<!--end::Input group-->

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
@endsection