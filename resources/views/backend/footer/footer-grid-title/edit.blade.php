@extends('backend.layouts.admin_master')
@section('title')
	Footer Grid Title Update
@endsection

@section('content')
	<div class="card shadow-sm">
	    <div class="card-body">

	    	{{-- @if ($errors->any())
	    	    <div class="alert alert-danger">
	    	        <ul>
	    	            @foreach ($errors->all() as $error)
	    	                <li>{{ $error }}</li>
	    	            @endforeach
	    	        </ul>
	    	    </div>
	    	@endif --}}

	    	<form action="{{ route('admin.footergridtitle.update', ['footergridtitle' => $footergridtitle->id]) }}" method="POST" enctype="multipart/form-data">
	    		@csrf
	    		@method('PUT')
	    		
	    		<!--begin::Input group-->
	    		<div class="fv-row mb-7">
	    		  <!--begin::Label-->
	    		  <label class="required fw-semibold fs-6 mb-2">Grid Title One</label>
	    		  <!--end::Label-->
	    		  <!--begin::Input-->
	    		  <input type="text" name="grid_title_one" class="form-control form-control-solid mb-3 mb-lg-0 @error('grid_title_one') is-invalid @enderror" placeholder="Grid Title One" value="{{ old('grid_title_one') ?? $footergridtitle->grid_title_one }}" />
	    		  <!--end::Input-->
	    		  @error('grid_title_one')
	    		      <span class="invalid-feedback" role="alert">
	    		          <strong>{{ $message }}</strong>
	    		      </span>
	    		  @enderror
	    		</div>
	    		<!--end::Input group-->
	    			    
	    		<!--begin::Input group-->
	    		<div class="fv-row mb-7">
	    		  <!--begin::Label-->
	    		  <label class="required fw-semibold fs-6 mb-2">Grid Title Two</label>
	    		  <!--end::Label-->
	    		  <!--begin::Input-->
	    		  <input type="text" name="grid_title_two" class="form-control form-control-solid mb-3 mb-lg-0 @error('grid_title_two') is-invalid @enderror" placeholder="Grid Title Two" value="{{ old('grid_title_two') ?? $footergridtitle->grid_title_two }}" />
	    		  <!--end::Input-->
	    		  @error('grid_title_two')
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