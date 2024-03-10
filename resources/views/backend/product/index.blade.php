@extends('backend.layouts.admin_master')
@section('title')
  Product List
@endsection

@section('content')

  <!--begin::Card-->
  <div class="card">
    <!--begin::Card header-->
    <div class="card-header border-0 pt-6">
      <!--begin::Card title-->
      <div class="card-title">
        <h4>Product Lists</h4>
      </div>
      <!--begin::Card title-->
      <!--begin::Card toolbar-->
      <div class="card-toolbar">
        <a href="{{ route('admin.products.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Product Create</a>
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
                  <th>Image</th>
                  <th>Title</th>
                  <th>Category</th>
                  <th>Qty</th>
                  <th>Price</th>
                  <th>Status</th>
                  <th width="20%">Action</th>
              </tr>
          </thead>
          <tbody>
            @foreach($products as $row)
              <tr>
                <td>{{ $loop->iteration }}</td>
                  <td>
                    <img src="{{ asset($row->thumbnail_image) }}" width="80" alt="">
                  </td>
                  <td>{{ $row->title }}</td>
                  <td> {{ $row->category->name }} </td>
                  <td>{{ $row->qty }} {{ $row->unit }}</td>
                  <td>$ {{ $row->selling_price ?? $row->discount_price }}</td>
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
                    <a href="{{ route('admin.products.edit', ['product' => $row->id]) }}" class="btn btn-sm btn-info"><i class="fas fa-edit  "></i></a>
                    <a href="{{ route('admin.product.delete', ['product' => $row->id]) }}" class="btn btn-sm btn-danger delete"><i class="fas fa-trash"></i></a>

                    <!--begin::Menu wrapper-->
                    <span>
                        <!--begin::Toggle-->
                        <button type="button" style="padding: 19px;" class="btn btn-primary rotate" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-start" data-kt-menu-offset="30px, 30px">
                            <i class="fas fa-cog  "></i>
                            <span class="svg-icon fs-3 rotate-180 ms-3 me-0">...</span>
                        </button>
                        <!--end::Toggle-->

                        <!--begin::Menu-->
                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-auto min-w-200 mw-300px" data-kt-menu="true">
                            <!--begin::Menu item-->
                            <div class="menu-item px-3">
                                <a href="{{ route('admin.galleryimages.index', ['product' => $row->id]) }}" class="menu-link px-3">
                                    Gallery Image
                                </a>
                            </div>
                            <!--end::Menu item-->
                            <!--begin::Menu item-->
                            <div class="menu-item px-3">
                                <a href="{{ route('admin.variants.index', ['product' => $row->id]) }}" class="menu-link px-3">
                                    Variant
                                </a>
                            </div>
                            <!--end::Menu item-->
                        </div>
                        <!--end::Menu-->
                    </span>
                    <!--end::Dropdown wrapper-->  

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
                url: "{{ route('admin.product.update-status') }}",
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