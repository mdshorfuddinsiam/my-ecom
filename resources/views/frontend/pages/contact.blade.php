@extends('frontend.layouts.master')
@section('title')
	Contact Page
@endsection
@section('front_css')
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"/>
@endsection

@section('content')
	<!--============================
	    BREADCRUMB START
	==============================-->
	<section id="wsus__breadcrumb">
	    <div class="wsus_breadcrumb_overlay">
	        <div class="container">
	            <div class="row">
	                <div class="col-12">
	                    <h4>contact us</h4>
	                    <ul>
	                        <li><a href="#">home</a></li>
	                        <li><a href="#">contact us</a></li>
	                    </ul>
	                </div>
	            </div>
	        </div>
	    </div>
	</section>
	<!--============================
	    BREADCRUMB END
	==============================-->


	<!--============================
	    CONTACT PAGE START
	==============================-->
	<section id="wsus__contact">
	    <div class="container">
	        <div class="wsus__contact_area">
	            <div class="row">
	                <div class="col-xl-4">
	                    <div class="row">
	                        <div class="col-xl-12">
	                            <div class="wsus__contact_single">
	                                <i class="fal fa-envelope"></i>
	                                <h5>mail address</h5>
	                                <a href="mailto:example@gmail.com">example@gmail.com</a>
	                                <span><i class="fal fa-envelope"></i></span>
	                            </div>
	                        </div>
	                        <div class="col-xl-12">
	                            <div class="wsus__contact_single">
	                                <i class="far fa-phone-alt"></i>
	                                <h5>phone number</h5>
	                                <a href="macallto:+69522145000001">+69522145000001</a>
	                                <span><i class="far fa-phone-alt"></i></span>
	                            </div>
	                        </div>
	                        <div class="col-xl-12">
	                            <div class="wsus__contact_single">
	                                <i class="fal fa-map-marker-alt"></i>
	                                <h5>contact address</h5>
	                                <a href="mailto:example@gmail.com">example@gmail.com</a>
	                                <span><i class="fal fa-map-marker-alt"></i></span>
	                            </div>
	                        </div>
	                    </div>
	                </div>
	                <div class="col-xl-8">
	                    <div class="wsus__contact_question">
	                        <h5>Send Us a Message</h5>
	                        <form id="contactForm">
	                            <div class="row">
	                                <div class="col-xl-12">
	                                    <div class="wsus__con_form_single">
	                                        <input type="text" name="name" placeholder="Your Name">
	                                    </div>
	                                </div>
	                                <div class="col-xl-12">
	                                    <div class="wsus__con_form_single">
	                                        <input type="email" name="email" placeholder="Email">
	                                    </div>
	                                </div>
	                                {{-- <div class="col-xl-6">
	                                    <div class="wsus__con_form_single">
	                                        <input type="text" placeholder="Phone">
	                                    </div>
	                                </div> --}}
	                                <div class="col-xl-12">
	                                    <div class="wsus__con_form_single">
	                                        <input type="text" name="subject" placeholder="Subject">
	                                    </div>
	                                </div>
	                                <div class="col-xl-12">
	                                    <div class="wsus__con_form_single">
	                                        <textarea name="message" cols="3" rows="5" placeholder="Message"></textarea>
	                                    </div>
	                                    <button type="submit" class="common_btn">send now</button>
	                                </div>
	                            </div>
	                        </form>
	                    </div>

	                    <div class="row mt-3">
	                    	<div class="col-md-12">
	                    		@if (session('success'))
	                    		    <div class="alert alert-success">
	                    		        {{ session('success') }}
	                    		    </div>
	                    		@endif
	                    	</div>
	                    </div>

	                </div>
	                <div class="col-xl-12">
	                    <div class="wsus__con_map">
	                        <iframe
	                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3650.1435090089785!2d90.42196781465853!3d23.81349539228068!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c62fb95f16c1%3A0xb333248370356dee!2sJamuna%20Future%20Park!5e0!3m2!1sen!2sbd!4v1639724859199!5m2!1sen!2sbd"
	                            width="1600" height="450" style="border:0;" allowfullscreen="100"
	                            loading="lazy"></iframe>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>
	</section>
	<!--============================
	    CONTACT PAGE END
	==============================-->
@endsection

@section('front_js')
	<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" ></script>

	<script>
		$(document).ready(function(){
			$('.common_btn').click(function(){

				$('#contactForm').submit(function(event){
					event.preventDefault();

					let formData = $(this).serialize(); 
					// console.log(formData);
					// alert(formData);

					// $('.common_btn').attr('disabled', true).html('Processing...');

					$.ajax({
						url: "{{ route('contact.form.submit') }}",
						method: "POST",
						dataType: "JSON",
						data: formData,
						beforeSend: function(){
							$('.common_btn').attr('disabled', true).html('Processing...');
						},
						success: function(res){
							$('.common_btn').attr('disabled', false).html('Send Now');
							$('#contactForm')[0].reset();
							toastr.options.closeButton = true;
							toastr.success(res.message);
						},
						// error: function(data) {
						error: function(xhr, status, error) {
			                // console.error(data);
			                // console.error(xhr);
			                // console.error(xhr.responseJSON);
			                // console.error(xhr.responseJSON.errors);

			                let errors = xhr.responseJSON.errors;

			                $.each(errors, function( index, value ) {
			                  	// console.log(value);
			                  	toastr.options.closeButton = true;
								toastr.error(value);
			                });

			                $('.common_btn').attr('disabled', false).html('Send Now');
			                $('#contactForm')[0].reset();
			            },
					});
				});

			});
		});
	</script>

	<script>
    	 
	</script>
@endsection
