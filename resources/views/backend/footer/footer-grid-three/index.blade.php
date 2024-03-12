@extends('backend.layouts.admin_master')
@section('title')
	Footer Grid Three List
@endsection

@section('content')

	<!--begin::Card-->
	<div class="card">
	  <!--begin::Card header-->
	  <div class="card-header border-0 pt-6">
	    <!--begin::Card title-->
	    <div class="card-title">
	    	<h4>Footer Grid Three Lists</h4>
	    </div>
	    <!--begin::Card title-->
	    <!--begin::Card toolbar-->
	    <div class="card-toolbar">
	    	<a href="{{ route('admin.footergridthrees.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Footer Grid Three Create</a>
	    </div>
	    <!--end::Card toolbar-->
	  </div>
	  <!--end::Card header-->
	  <hr style="color: #ddd">
	  <!--begin::Card body-->
	  <div class="card-body py-4">

	  	<table id="kt_datatable_dom_positioning" class="table table-striped table-row-bordered gy-5 gs-7 border rounded">
	  	    <thead>
	  	        <tr class="fw-bold fs-6 text-gray-800 px-7">
	  	            <th>Sl No.</th>
	  	            <th>Name</th>
	  	            <th>Url</th>
	  	            <th>Status</th>
	  	            <th width="20%">Action</th>
	  	        </tr>
	  	    </thead>
	  	    <tbody>
	  	    	@foreach($footergridthrees as $row)
	  	        <tr>
	  	        	<td>{{ $loop->iteration }}</td>
	  	            <td>{{ $row->name }}</td>
	  	            <td>{{ $row->link }}</td>
	  	            <td>
	  	            	@if($row->status == 1)
	  	            		<div class="form-check form-switch form-check-custom form-check-solid">
	  	            		    <input class="form-check-input status" type="checkbox" value="" id="{{ $row->id }}" checked />
	  	            		</div>
	  	            	@else
	  	            		<div class="form-check form-switch form-check-custom form-check-solid">
	  	            		    <input class="form-check-input status" type="checkbox" value="" id="{{ $row->id }}" />
	  	            		</div>
	  	            	@endif
	  	            </td>
	  	            <td>
	  	            	<a href="{{ route('admin.footergridthrees.edit', ['footergridthree' => $row->id]) }}" class="btn btn-sm btn-info"><i class="fas fa-edit	"></i></a>
	  	            	<a href="{{ route('admin.footergridthree.delete', ['footergridthree' => $row->id]) }}" class="btn btn-sm btn-danger delete"><i class="fas fa-trash"></i></a>
	  	            </td>
	  	        </tr>
	  	        @endforeach
	  	    </tbody>
	  	</table>

	  </div>
	  <!--end::Card body-->
	</div>
	<!--end::Card-->

	
@endsection

@section('admin_js')
	{{-- <script src="{{ asset('backend') }}/assets/js/custom/apps/user-management/users/list/table.js"></script>
	<script src="{{ asset('backend') }}/assets/js/custom/apps/user-management/users/list/export-users.js"></script>
	<script src="{{ asset('backend') }}/assets/js/custom/apps/user-management/users/list/add.js"></script> --}}

	<script>
		$("#kt_datatable_dom_positioning").DataTable({
			"language": {
				"lengthMenu": "Show _MENU_",
			},
			"dom":
				"<'row'" +
				"<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
				"<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
				">" +

				"<'table-responsive'tr>" +

				"<'row'" +
				"<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
				"<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
				">"
		});
	</script>

	<script>

		$('.delete').on('click', function (e) {
           e.preventDefault();
           var link = $(this).attr('href');
           // alert(link);

           Swal.fire({
		        // html: `A SweetAlert content with <strong>bold text</strong>, <a href="#">links</a>
		        //      or any of our available <span class="badge badge-primary">components</span>`,
		        title: "Are you sure?",
	            text: "You won't be able to revert this!",
		        icon: "info",
		        buttonsStyling: false,
		        showCancelButton: true,
		        confirmButtonText: "Ok, got it!",
		        cancelButtonText: 'Nope, cancel it',
		        customClass: {
		            confirmButton: "btn btn-primary",
		            cancelButton: 'btn btn-danger'
		        }
		    }).then((result) => {
               if (result.isConfirmed) {
                   Swal.fire({
                     title: "Deleted!",
                     text: "Your file has been deleted.",
                     icon: "success"
                   });
                   window.location = link;
               }
           })
       });

	</script>

	<script>
		$('.status').on('click', function (e) {
           // alert($(this).is(':checked'));
           // alert($(this).attr('id'));

           let check = $(this).is(':checked');
           let id = $(this).attr('id');
           // alert(id);

           $.ajax({
	           	url: "{{ route('admin.footergridthree.update-status') }}",
	           	method: "POST",
	           	dateType: "JSON",
	           	data: {check:check,id:id},
	           	success: function(res){
	           		console.log(res);
	           		toastr.success('Status Updated Successfully!!', {timeOut: 2000});
	           		toastr.options.closeButton = true;
	           	}
           });

        });
	</script>
@endsection