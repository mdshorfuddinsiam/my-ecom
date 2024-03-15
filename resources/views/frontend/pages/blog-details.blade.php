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
                        <h4>blog dtails</h4>
                        <ul>
                            <li><a href="#">blog</a></li>
                            <li><a href="#">blog details</a></li>
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
        BLOGS DETAILS START
    ==============================-->
    <section id="wsus__blog_details">
        <div class="container">
            <div class="row">
                <div class="col-xxl-9 col-xl-8 col-lg-8">
                    <div class="wsus__main_blog">
                        <div class="wsus__main_blog_img">
                            <img src="{{ asset($blogpost->image) }}" alt="blog" class="img-fluid w-100">
                        </div>
                        <p class="wsus__main_blog_header">
                            <span><i class="fas fa-user-tie"></i> by {{ $blogpost->admin->name }}</span>
                            <span><i class="fal fa-calendar-alt"></i> {{ \Carbon\Carbon::parse($blogpost->updated_at)->format('F d Y') }}</span>
                            <span><i class="fal fa-comment-alt-smile"></i> {{ $commentCount }} Comment</span>
                            <span><i class="far fa-eye"></i> 11 Views</span>
                        </p>
                        <div class="wsus__description_area">
                            <h1>{{ $blogpost->title }}</h1>
                            {!! $blogpost->description !!}
                        </div>
                        <div class="wsus__share_blog">
                            <p>share:</p>
                            <ul>
                                <li><a class="facebook" href="#"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a class="twitter" href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a class="linkedin" href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                <li><a class="pinterest" href="#"><i class="fab fa-pinterest-p"></i></a></li>
                            </ul>
                        </div>
                        <div class="wsus__related_post">
                            <div class="row">
                                <div class="col-xl-12">
                                    <h5>related post</h5>
                                </div>
                            </div>
                            <div class="row blog_det_slider">
                            	@forelse($relatedBlogs as $row)
                                <div class="col-xl-3">
                                    <div class="wsus__single_blog wsus__single_blog_2">
                                        <a class="wsus__blog_img" href="#">
                                            <img src="{{ asset('frontend') }}/images/blog_1.jpg" alt="blog" class="img-fluid w-100">
                                        </a>
                                        <div class="wsus__blog_text">
                                            <a class="blog_top red" href="#">{{ $row->blogcategory->name }}</a>
                                            <div class="wsus__blog_text_center">
                                                <a href="blog_details.html">{{ $row->title }}</a>
                                                <p class="date">{{ \Carbon\Carbon::parse($blogpost->updated_at)->format('F d Y') }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @empty
                                @endforelse
                            </div>
                        </div>
                        <div class="wsus__comment_area">
                            <h4>comment <span>{{ $commentCount }}</span></h4>
                            @forelse($blogpost->comments as $row)
                            <div class="wsus__main_comment">
                                <div class="wsus__comment_img">
                                    <img src="{{ $row->user->image ? asset($row->user->image) : asset('uploads/no_image.jpg') }}" alt="user" class="img-fluid w-100">
                                </div>
                                <div class="wsus__comment_text replay">
                                    <h6>{{ $row->user->name }} <span>{{ \Carbon\Carbon::parse($row->updated_at)->format('d M Y') }}</span></h6>
                                    <p>{{ $row->body }}</p>
                                    <a href="#" data-bs-toggle="collapse"
                                        data-bs-target="#flush-collapsetwo-{{ $row->id }}">replay</a>
                                    <div class="accordion accordion-flush" id="accordionFlushExample3">
                                        <div class="accordion-item">
                                            <div id="flush-collapsetwo-{{ $row->id }}" class="accordion-collapse collapse"
                                                aria-labelledby="flush-collapsetwo"
                                                data-bs-parent="#accordionFlushExample">
                                                <div class="accordion-body">
                                                    <form action="{{ route('blogpost.reply-comment.store', ['blogpost' => $row->blogpost_id, 'comment' => $row->id]) }}" method="POST">
                                                    	@csrf

                                                        <div class="wsus__riv_edit_single text_area">
                                                            <i class="far fa-edit"></i>
                                                            <textarea name="body" cols="3" rows="1" placeholder="Your Text"></textarea>
                                                        </div>
                                                        <button type="submit" class="common_btn">submit</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            	@forelse($row->replies as $row)
	                            <div class="wsus__main_comment wsus__com_replay">
	                                <div class="wsus__comment_img">
	                                    <img src="{{ $row->user->image ? asset($row->user->image) : asset('uploads/no_image.jpg') }}" alt="user" class="img-fluid w-100">
	                                </div>
	                                <div class="wsus__comment_text replay">
                                    <h6>{{ $row->user->name }} <span>{{ \Carbon\Carbon::parse($row->updated_at)->format('d M Y') }}</span></h6>
                                    <p>{{ $row->body }}</p>
                                    <a href="#" data-bs-toggle="collapse"
                                        data-bs-target="#flush-collapsetwo-{{ $row->id }}">replay</a>
                                    <div class="accordion accordion-flush" id="accordionFlushExample3">
                                        <div class="accordion-item">
                                            <div id="flush-collapsetwo-{{ $row->id }}" class="accordion-collapse collapse"
                                                aria-labelledby="flush-collapsetwo"
                                                data-bs-parent="#accordionFlushExample">
                                                <div class="accordion-body">
                                                    <form action="{{ route('blogpost.reply-comment.store', ['blogpost' => $row->blogpost_id, 'comment' => $row->id]) }}" method="POST">
                                                    	@csrf

                                                        <div class="wsus__riv_edit_single text_area">
                                                            <i class="far fa-edit"></i>
                                                            <textarea name="body" cols="3" rows="1" placeholder="Your Text"></textarea>
                                                        </div>
                                                        <button type="submit" class="common_btn">submit</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
	                            </div>
	                            	{{-- @forelse(\App\Models\Comment::with('user:id,name')->where('parent_id', $row->id)->get() as $row) --}}
	                            		{{-- @dd($row->toArray()) --}}
	                            	{{-- @forelse($row->replies as $row)
	                            	<div class="wsus__main_comment wsus__com_replay">
		                                <div class="wsus__comment_img">
		                                    <img src="{{ $row->user->image ? asset($row->user->image) : asset('uploads/no_image.jpg') }}" alt="user" class="img-fluid w-100">
		                                </div>
		                                <div class="wsus__comment_text replay">
		                                    <h6>{{ $row->user->name }} <span>{{ \Carbon\Carbon::parse($row->updated_at)->format('d M Y') }}</span></h6>
		                                    <p>{{ $row->body }}</p>
		                                    <a href="#" data-bs-toggle="collapse"
		                                        data-bs-target="#flush-collapsetwo-{{ $row->id }}">replay</a>
		                                    <div class="accordion accordion-flush" id="accordionFlushExample3">
		                                        <div class="accordion-item">
		                                            <div id="flush-collapsetwo-{{ $row->id }}" class="accordion-collapse collapse"
		                                                aria-labelledby="flush-collapsetwo"
		                                                data-bs-parent="#accordionFlushExample">
		                                                <div class="accordion-body">
		                                                    <form action="{{ route('blogpost.reply-comment.store', ['blogpost' => $row->blogpost_id, 'comment' => $row->id]) }}" method="POST">
		                                                    	@csrf

		                                                        <div class="wsus__riv_edit_single text_area">
		                                                            <i class="far fa-edit"></i>
		                                                            <textarea name="body" cols="3" rows="1" placeholder="Your Text"></textarea>
		                                                        </div>
		                                                        <button type="submit" class="common_btn">submit</button>
		                                                    </form>
		                                                </div>
		                                            </div>
		                                        </div>
		                                    </div>
		                                </div>
	                            	</div>
	                            	@empty
	                            	@endforelse --}}
	                            @empty
	                            @endforelse
                            @empty
                            	<h2>No comment yet.</h2>
                            @endforelse
                            {{ $commentPagination->links('vendor.pagination.custom') }}
                            {{-- <div id="pagination">
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination">
                                        <li class="page-item">
                                            <a class="page-link" href="#" aria-label="Previous">
                                                <i class="fas fa-chevron-left"></i>
                                            </a>
                                        </li>
                                        <li class="page-item"><a class="page-link page_active" href="#">1</a></li>
                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item"><a class="page-link" href="#">4</a></li>
                                        <li class="page-item">
                                            <a class="page-link" href="#" aria-label="Next">
                                                <i class="fas fa-chevron-right"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                            </div> --}}
                        </div>
                        <div class="wsus__post_comment">
                            <h4>post a comment</h4>
                            <form action="{{ route('blogpost.comment.store', ['blogpost' => $blogpost->id]) }}" method="POST">
                            	@csrf

                                <div class="row">
                                    {{-- <div class="col-xl-6">
                                        <div class="wsus__single_com">
                                            <input type="text" placeholder="Name">
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="wsus__single_com">
                                            <input type="email" placeholder="Email">
                                        </div>
                                    </div> --}}
                                    <div class="col-xl-12">
                                        <div class="wsus__single_com">
                                            <textarea name="body" rows="5" placeholder="Your Comment"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <button class="common_btn" type="submit">post comment</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-3 col-xl-4 col-lg-4">
                    <div class="wsus__blog_sidebar" id="sticky_sidebar">
                        <div class="wsus__blog_search">
                            <h4>search</h4>
                            <form>
                                <input type="text" placeholder="Search">
                                <button type="submit" class="common_btn"><i class="far fa-search"></i></button>
                            </form>
                        </div>
                        <div class="wsus__blog_category">
                            <h4>Categories</h4>
                            <ul>
                            	@forelse($blogcategories as $row)
                                <li><a href="#">{{ $row->name }}</a></li>
                                @empty
                                @endforelse
                            </ul>
                        </div>
                        <div class="wsus__blog_post">
                            <h4>Popular Post</h4>
                            @forelse($popularBlogs as $row)
                            <div class="wsus__blog_post_single">
                                <a href="{{ route('blog.details', ['blogpost' => $row->id]) }}" class="wsus__blog_post_img">
                                    <img src="{{ asset($row->image) }}" alt="blog" class="imgofluid w-100">
                                </a>
                                <div class="wsus__blog_post_text">
                                    <a href="#">{{ $row->title }}</a>
                                    <p> <span> {{ \Carbon\Carbon::parse($blogpost->updated_at)->format('M d Y') }} </span> {{ $row->allcomments ? $row->allcomments->count() : 0 }} Comment </p>
                                </div>
                            </div>
                            @empty
                            @endforelse
                            
                        </div>
                        <div class="wsus__popular_tag">
                            <h4>popular tags</h4>
                            <ul>
                                <li><a href="#">Fashion</a></li>
                                <li><a href="#">Style</a></li>
                                <li><a href="#">Travel</a></li>
                                <li><a href="#">Women</a></li>
                                <li><a href="#">Men</a></li>
                                <li><a href="#">Hobbies</a></li>
                                <li><a href="#">Shopping</a></li>
                                <li><a href="#">Photography</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--============================
        BLOGS DETAILS END
    ==============================-->
@endsection

@section('front_js')
	<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" ></script>

	<script>
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                toastr.options.closeButton = true;
                toastr.error('{{ $error }}');
            @endforeach
        @endif
    </script>

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
@endsection
