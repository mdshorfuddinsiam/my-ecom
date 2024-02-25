@extends('backend.layouts.admin_master')
@section('title')
	Profile Edit
@endsection

@section('content')
	<!--begin::Basic info-->
	<div class="card mb-5 mb-xl-10">
	  <!--begin::Card header-->
	  <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
	    <!--begin::Card title-->
	    <div class="card-title m-0">
	      <h3 class="fw-bold m-0">Profile Details</h3>
	    </div>
	    <!--end::Card title-->
	  </div>
	  <!--begin::Card header-->
	  <!--begin::Content-->
	  <div id="kt_account_settings_profile_details" class="collapse show">
	    <!--begin::Form-->
	    <form action="{{ route('admin.profiles.update', $admin->id) }}" method="POST" id="kt_account_profile_details_form" class="form" enctype="multipart/form-data">
	    	@csrf
	    	@method('PUT')
	      <!--begin::Card body-->
	      <div class="card-body border-top p-9">
	        <!--begin::Input group-->
	        <div class="row mb-6">
	          <!--begin::Label-->
	          <label class="col-lg-4 col-form-label fw-semibold fs-6">Photo</label>
	          <!--end::Label-->
	          <!--begin::Col-->
	          <div class="col-lg-8">
	            <!--begin::Image input-->
	            <div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url('{{ asset('backend') }}/assets/media/svg/avatars/blank.svg')">
	              <!--begin::Preview existing avatar-->
	              <div class="image-input-wrapper w-125px h-125px" style="background-image: url({{ $admin->image ? asset($admin->image) : asset('uploads/no_image.jpg'); }})"></div>
	              <!--end::Preview existing avatar-->
	              <!--begin::Label-->
	              <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
	                <i class="bi bi-pencil-fill fs-7"></i>
	                <!--begin::Inputs-->
	                <input type="file" name="image" accept=".png, .jpg, .jpeg" />
	                <input type="hidden" name="avatar_remove" />
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
	          </div>
	          <!--end::Col-->
	        </div>
	        <!--end::Input group-->
	        <!--begin::Input group-->
	        <div class="row mb-6">
	          <!--begin::Label-->
	          <label class="col-lg-4 col-form-label required fw-semibold fs-6">Name</label>
	          <!--end::Label-->
	          <!--begin::Col-->
	          <div class="col-lg-8">
	            <!--begin::Row-->
	            <div class="row">
	              <!--begin::Col-->
	              <div class="col-lg-12 fv-row">
	                <input type="text" name="name" id="name" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0 @error('name') is-invalid @enderror" placeholder="Name" value="{{ $admin->name }}" />
	                @error('name')
	                    <span class="invalid-feedback" role="alert">
	                        <strong>{{ $message }}</strong>
	                    </span>
	                @enderror
	              </div>
	              <!--end::Col-->
	              <!--end::Col-->
	            </div>
	            <!--end::Row-->
	          </div>
	          <!--end::Col-->
	        </div>
	        <!--end::Input group-->
	        <!--begin::Input group-->
	        <div class="row mb-6">
	          <!--begin::Label-->
	          <label class="col-lg-4 col-form-label required fw-semibold fs-6">Email</label>
	          <!--end::Label-->
	          <!--begin::Col-->
	          <div class="col-lg-8 fv-row">
	            <input type="email" name="email" id="email" class="form-control form-control-lg form-control-solid @error('email') is-invalid @enderror" placeholder="Email" value="{{ $admin->email }}" />
	            @error('email')
	                <span class="invalid-feedback" role="alert">
	                    <strong>{{ $message }}</strong>
	                </span>
	            @enderror
	          </div>
	          <!--end::Col-->
	        </div>
	        <!--end::Input group-->
	        <!--begin::Input group-->
	        <div class="row mb-6">
	          <!--begin::Label-->
	          <label class="col-lg-4 col-form-label fw-semibold fs-6">
	            <span class="required">Contact Phone</span>
	            <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Phone number must be active"></i>
	          </label>
	          <!--end::Label-->
	          <!--begin::Col-->
	          <div class="col-lg-8 fv-row">
	            <input type="tel" name="phone" id="phone" class="form-control form-control-lg form-control-solid @error('phone') is-invalid @enderror" placeholder="Phone number" value="{{ $admin->phone }}" />
	            @error('phone')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
	          </div>
	          <!--end::Col-->
	        </div>
	        <!--end::Input group-->
	      </div>
	      <!--end::Card body-->
	      <!--begin::Actions-->
	      <div class="card-footer d-flex justify-content-end py-6 px-9">
	        <button type="reset" class="btn btn-light btn-active-light-primary me-2">Discard</button>
	        <button type="submit" class="btn btn-primary" id="kt_account_profile_details_submit">Save Changes</button>
	      </div>
	      <!--end::Actions-->
	    </form>
	    <!--end::Form-->
	  </div>
	  <!--end::Content-->
	</div>
	<!--end::Basic info-->

	<!--begin::Sign-in Method-->
	<div class="card mb-5 mb-xl-10">
	  <!--begin::Card header-->
	  <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_signin_method">
	    <div class="card-title m-0">
	      <h3 class="fw-bold m-0">Sign-in Method</h3>
	    </div>
	  </div>
	  <!--end::Card header-->
	  <!--begin::Content-->
	  <div id="kt_account_settings_signin_method" class="collapse show">
	    <!--begin::Card body-->
	    <div class="card-body border-top p-9">
	      <!--begin::Email Address-->
	      <div class="d-flex flex-wrap align-items-center">
	        <!--begin::Label-->
	        <div id="kt_signin_email" class="{{ !$errors->isEmpty() ? 'd-none' : '' }}">
	          <div class="fs-6 fw-bold mb-1">Email Address</div>
	          <div class="fw-semibold text-gray-600">{{ $admin->email }}</div>
	        </div>
	        <!--end::Label-->
	        <!--begin::Edit-->
	        <div id="kt_signin_email_edit" class="flex-row-fluid {{ $errors->isEmpty() ? 'd-none' : '' }}">
	          <!--begin::Form-->
	          <form method="POST" action="{{ route('admin.email.update', $admin->id) }}" id="kt_signin_change_email" class="form" novalidate="novalidate">
	          	@csrf
	            <div class="row mb-6">
	              <div class="col-lg-6 mb-4 mb-lg-0">
	                <div class="fv-row mb-0">
	                  <label for="email_address" class="form-label fs-6 fw-bold mb-3">Enter New Email Address</label>
	                  <input type="email" class="form-control form-control-lg form-control-solid @error('email_address') is-invalid @enderror" id="email_address" placeholder="Email Address" name="email_address" value="{{ $admin->email }}" />
	                  @error('email_address')
	                      <span class="invalid-feedback" role="alert">
	                          <strong>{{ $message }}</strong>
	                      </span>
	                  @enderror
	                </div>
	              </div>
	              <div class="col-lg-6">
	                <div class="fv-row mb-0">
	                  <label for="password" class="form-label fs-6 fw-bold mb-3">Confirm Password</label>
	                  <input type="password" class="form-control form-control-lg form-control-solid @error('password') is-invalid @enderror" name="password" id="password" />
	                  @error('password')
	                      <span class="invalid-feedback" role="alert">
	                          <strong>{{ $message }}</strong>
	                      </span>
	                  @enderror
	                </div>
	              </div>
	            </div>
	            <div class="d-flex">
	              <button id="kt_signin_submit" type="submit" class="btn btn-primary me-2 px-6">Update Email</button>
	              <button id="kt_signin_cancel" type="button" class="btn btn-color-gray-400 btn-active-light-primary px-6">Cancel</button>
	            </div>
	          </form>
	          <!--end::Form-->
	        </div>
	        <!--end::Edit-->
	        <!--begin::Action-->
	        <div id="kt_signin_email_button" class="ms-auto {{ !$errors->isEmpty() ? 'd-none' : '' }}">
	          <button class="btn btn-light btn-active-light-primary">Change Email</button>
	        </div>
	        <!--end::Action-->
	      </div>
	      <!--end::Email Address-->
	      <!--begin::Separator-->
	      <div class="separator separator-dashed my-6"></div>
	      <!--end::Separator-->
	      <!--begin::Password-->
	      <div class="d-flex flex-wrap align-items-center mb-10">
	        <!--begin::Label-->
	        <div id="kt_signin_password" class="{{ !$errors->isEmpty() ? 'd-none' : '' }}">
	          <div class="fs-6 fw-bold mb-1">Password</div>
	          <div class="fw-semibold text-gray-600">************</div>
	        </div>
	        <!--end::Label-->
	        <!--begin::Edit-->
	        <div id="kt_signin_password_edit" class="flex-row-fluid {{ $errors->isEmpty() ? 'd-none' : '' }}">
	          <!--begin::Form-->
	          <form method="POST" action="{{ route('admin.password.update', $admin->id) }}" id="kt_signin_change_password" class="form" novalidate="novalidate">
	          	@csrf
	            <div class="row mb-1">
	              <div class="col-lg-4">
	                <div class="fv-row mb-0">
	                  <label for="current_password" class="form-label fs-6 fw-bold mb-3">Current Password</label>
	                  <input type="password" class="form-control form-control-lg form-control-solid @error('current_password') is-invalid @enderror" name="current_password" id="current_password" />
	                  @error('current_password')
	                      <span class="invalid-feedback" role="alert">
	                          <strong>{{ $message }}</strong>
	                      </span>
	                  @enderror
	                </div>
	              </div>
	              <div class="col-lg-4">
	                <div class="fv-row mb-0">
	                  <label for="new_password" class="form-label fs-6 fw-bold mb-3">New Password</label>
	                  <input type="password" class="form-control form-control-lg form-control-solid @error('new_password') is-invalid @enderror" name="new_password" id="new_password" />
	                  @error('new_password')
	                      <span class="invalid-feedback" role="alert">
	                          <strong>{{ $message }}</strong>
	                      </span>
	                  @enderror
	                </div>
	              </div>
	              <div class="col-lg-4">
	                <div class="fv-row mb-0">
	                  <label for="confirm_password" class="form-label fs-6 fw-bold mb-3">Confirm New Password</label>
	                  <input type="password" class="form-control form-control-lg form-control-solid" name="confirm_password" id="confirm_password" />
	                </div>
	              </div>
	            </div>
	            {{-- <div class="form-text mb-5">Password must be at least 8 character and contain symbols</div> --}}
	            <div class="d-flex">
	              <button id="kt_password_submit" type="submit" class="btn btn-primary me-2 px-6">Update Password</button>
	              <button id="kt_password_cancel" type="subi" class="btn btn-color-gray-400 btn-active-light-primary px-6">Cancel</button>
	            </div>
	          </form>
	          <!--end::Form-->
	        </div>
	        <!--end::Edit-->
	        <!--begin::Action-->
	        <div id="kt_signin_password_button" class="ms-auto {{ !$errors->isEmpty() ? 'd-none' : '' }}">
	          <button class="btn btn-light btn-active-light-primary">Reset Password</button>
	        </div>
	        <!--end::Action-->
	      </div>
	      <!--end::Password-->
	    </div>
	    <!--end::Card body-->
	  </div>
	  <!--end::Content-->
	</div>
	<!--end::Sign-in Method-->

@endsection

@section('admin_js')
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>

	<script>
		$(document).ready(function(){
			$('#kt_signin_email_button').click(function(){
				$('#kt_signin_email').hide();
				$(this).hide();
				$('#kt_signin_email_edit').removeClass('d-none');
			});
			$('#kt_signin_cancel').click(function(){
				$('#kt_signin_email').show();
				$('#kt_signin_email_button').show();
				$('#kt_signin_email_edit').addClass('d-none');
			});

			$('#kt_signin_password_button').click(function(){
				$('#kt_signin_password').hide();
				$(this).hide();
				$('#kt_signin_password_edit').removeClass('d-none');
			});
			$('#kt_signin_cancel').click(function(){
				$('#kt_signin_password').show();
				$('#kt_signin_password_button').show();
				$('#kt_signin_password_edit').addClass('d-none');
			});
		});
	</script>

	<script>
	window.addEventListener('load', function() {
	    $("#kt_signin_change_email").validate({
	        rules: {
	            email_address: {
	                required: true,
	                email: true,
	                maxlength: 50
	            },
	            password: {
	                required: true,
	                minlength: 8
	            },
	        },
	        messages: {
	            email_address: {
	                required: "Email is required",
	                email: "Email must be a valid email address",
	                maxlength: "Email cannot be more than 30 characters",
	            },
	            password: {
	                required: "Password is required",
	                minlength: "Password must be at least 8 characters"
	            },
	        },
	        errorElement: 'span',
	        errorPlacement: function (error, element) {
	            error.addClass('invalid-feedback');
	            element.closest('.fv-row').append(error);
	        },
	        highlight: function (element, errorClass, validClass) {
	            $(element).addClass('is-invalid');
	        },
	        unhighlight: function (element, errorClass, validClass) {
	            $(element).removeClass('is-invalid');
	        }
	    });
	});
	</script>
@endsection