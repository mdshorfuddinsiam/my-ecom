@extends('frontend.layouts.user_master')
@section('title')
	User Dashboard
@endsection

@section('user_content')
	<div class="dashboard_content mt-2 mt-md-0">
	  <h3><i class="far fa-user"></i> profile</h3>
	  <div class="wsus__dashboard_profile">
	    <div class="wsus__dash_pro_area">
	      <h4>basic information</h4>
	      <form method="POST" action="{{ route('user.profile.update') }}" enctype="multipart/form-data">
	      	@csrf

	      	@if ($errors->any())
	      	    <div class="alert alert-danger">
	      	        <ul>
	      	            @foreach ($errors->all() as $error)
	      	                <li>{{ $error }}</li>
	      	            @endforeach
	      	        </ul>
	      	    </div>
	      	@endif

	      	<div class="row mb-4">
	      		<div class="col-xl-3 col-sm-6 col-md-6">
	      		  <div class="wsus__dash_pro_img">
	      		    <img src="{{ !empty(asset(auth()->user()->image)) ? asset(auth()->user()->image) : asset('/uploads/no_image.jpg') }}" alt="img" class="img-fluid w-100">
	      		    {{-- <img src="{{ asset('frontend') }}/images/ts-2.jpg" alt="img" class="img-fluid w-100"> --}}
	      		    <input type="file" id="image" name="image">
	      		  </div>
	      		</div>
	      	</div>
	        <div class="row mb-2">
	          <div class="col-xl-12">
	            <div class="row">
	              <div class="col-xl-12 col-md-12">
	                <div class="wsus__dash_pro_single">
	                  <i class="fas fa-user-tie"></i>
	                  <input type="text" id="name" name="name" class="{{-- @error('name') is-invalid @enderror --}}" value="{{ auth()->user()->name }}" placeholder="Name">
	                  {{-- @error('name')
	                      <span class="invalid-feedback" role="alert">
	                          <strong>{{ $message }}</strong>
	                      </span>
	                  @enderror --}}
	                </div>
	              </div>
	              <div class="col-xl-12 col-md-12">
	                <div class="wsus__dash_pro_single">
	                  <i class="fal fa-envelope-open"></i>
	                  <input type="email" id="email" name="email" value="{{ auth()->user()->email }}" placeholder="Email">
	                  @error('email')
	                      <span class="invalid-feedback" role="alert">
	                          <strong>{{ $message }}</strong>
	                      </span>
	                  @enderror
	                </div>
	              </div>
	              <div class="col-xl-12 col-md-12">
	                <div class="wsus__dash_pro_single">
	                  <i class="far fa-phone-alt"></i>
	                  <input type="text" id="phone" name="phone" value="{{ auth()->user()->phone }}" placeholder="Phone">
	                  @error('phone')
	                      <span class="invalid-feedback" role="alert">
	                          <strong>{{ $message }}</strong>
	                      </span>
	                  @enderror
	                </div>
	              </div>
	            </div>
	          </div>
	          
	          <div class="col-xl-12">
	            <button class="common_btn mb-4 mt-2" type="submit">upload</button>
	          </div>
	        </div>
	      </form>

	      <h4>change password</h4>
	      <form action="{{ route('user.password.update') }}" method="POST">
	      	@csrf
	      	<div class="row">
	      		<div class="wsus__dash_pass_change mt-2">
	      		  <div class="row">
	      		    <div class="col-xl-4 col-md-6">
	      		      <div class="wsus__dash_pro_single">
	      		        <i class="fas fa-unlock-alt"></i>
	      		        <input type="password" id="current_password" name="current_password" placeholder="Current Password">
	      		        @error('current_password')
	      		            <span class="invalid-feedback" role="alert">
	      		                <strong>{{ $message }}</strong>
	      		            </span>
	      		        @enderror
	      		      </div>
	      		    </div>
	      		    <div class="col-xl-4 col-md-6">
	      		      <div class="wsus__dash_pro_single">
	      		        <i class="fas fa-lock-alt"></i>
	      		        <input type="password" id="password" name="password" placeholder="New Password">
	      		        @error('password')
	      		            <span class="invalid-feedback" role="alert">
	      		                <strong>{{ $message }}</strong>
	      		            </span>
	      		        @enderror
	      		      </div>
	      		    </div>
	      		    <div class="col-xl-4">
	      		      <div class="wsus__dash_pro_single">
	      		        <i class="fas fa-lock-alt"></i>
	      		        <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm Password">
	      		      </div>
	      		    </div>
	      		    <div class="col-xl-12">
	      		      <button class="common_btn" type="submit">upload</button>
	      		    </div>
	      		  </div>
	      		</div>
	      	</div>
	      </form>

	    </div>
	  </div>
	</div>        
@endsection

@section('front_user_js')
	{{-- <script>
		$(function () {
		    
		    "use strict";
		    		    
		  // for 2 input in 1 row

		  $("#add_row3").on('click',function () {
		  	// alert('siam');
		    var html = '';
		    html+='<div class="row" id="remove">';
		    html+='<div class="col-xl-5 col-md-5">';
		    html+='<div class="medicine_row_input">';
		    html+='<input type="url" placeholder="www.facebook.com" name="social_link[]" id="social_link">';
		    html+='</div>';
		    html+='</div>';
		    html+='<div class="col-xl-5 col-md-5">';
		    html+='<div class="medicine_row_input">';
		    html+='<input type="url" placeholder="www.youtube.com" name="social_link[]" id="social_link">';
		    html+='</div>';
		    html+='</div>';
		    html+='<div class="col-xl-2 col-md-2">';
		    html+='<div class="medicine_row_input">';
		    html+='<button type="button" id="removeRow" ><i class="fas fa-trash" aria-hidden="true"></i></button>';
		    html+=' </div>';
		    html+=' </div>';
		    html+='</div>';
		    $("#medicine_row3").append(html)
		  });

		  // remove custom input field row
		  $(document).on('click', '#removeRow', function () {
		    $(this).closest('#remove').remove();
		  });

		    
		});

	</script> --}}
@endsection