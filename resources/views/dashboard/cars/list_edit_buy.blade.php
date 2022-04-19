@extends('dashboard.layouts.master')
@section('title', __('backend.car'))
@section('content')
    <div class="padding">
        <div class="app-body-inner">
            <div class="row-col row-col-xs">
                <style>
                    .select2-container .select2-search--inline .select2-search__field {
                        min-width: 200px !important;
                    }
                    .btn-icon {
                        line-height: 0.375rem;
                    }
                </style>
                <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.css">
                <script src="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.js"></script>
                {{-- @include('dashboard.cars.edit') --}}
<!--#############################################################################################-->


<link href="{{ asset('assets/dashboard/sweetalert2/sweetalert2.css') }}" rel="stylesheet" type="text/css" />
<!-- column -->
<div class="col-sm-6 col-md-7">
    <div class="row-col">
        {{-- <div class="p-a-sm">
            <h6 class="m-b-0 m-t-sm"><i class="material-icons">
                    &#xe02e;</i> {{ __('backend.newCars') }}
            </h6>
        </div> --}}
        <div class="row-row">
            <div class="row-body">
                <div class="row-inner">
                    <div class="padding p-y-sm ">
                        {{Form::open(['route'=>['updateBuy',$carDetails->id],'method'=>'POST', 'files' => true, 'id' => 'fileupload', 'enctype' => 'multipart/form-data'])}}
                        <h3>Car Details</h3>
                        @include('dashboard.cars.editbuy')

                        <h3>Customer Information</h3>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>{{ __('backend.CUSTOMER_NAME') }}</label>
                                    <input type="text" value="{{ old('customer_name', $CustomerData->name) }}" class="form-control" name="customer_name" id="customer_name">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>{{ __('backend.EMAIL') }}</label>
                                    <input type="text" class="form-control" value="{{ old('customer_email', $CustomerData->email ) }}" name="customer_email" id="customer_email">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>{{ __('backend.MOBILE') }}</label>
                                    <input type="text" class="form-control" name="customer_mobile" value="{{ old('bank_loan', $CustomerData->mobile ) }}" id="customer_mobile">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>{{ __('backend.ADDRESS') }}</label>
                                    <input type="text" value="{{ old('address_line1', $CustomerData->address_line1) }}" class="form-control" name="address_line1" id="address_line1">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>{{ __('backend.ADDRESS') }}</label>
                                    <input type="text" value="{{ old('address_line2', $CustomerData->address_line2) }}" class="form-control" name="address_line2" id="address_line2">
                                </div>
                            </div>
                        </div>
                        {{-- <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>{{ __('backend.STATUS') }}</label>
                                    <select  name="status" id="status" placeholder="Select {{ __('backend.STATUS') }}">
                                        <option value="">Select</option>
                                        @foreach($Status as $row)
                                            <option {{ (old('status', $carDetails->status) == $row->id) ? 'selected' : ''  }} value="{{ $row->id }}">{{ $row->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div> --}}
                        <!-- / fields -->
                        <div class="form-group row">
                            <div class="col-sm-offset-3 col-sm-9">
                                <button type="submit" class="btn btn-primary"><i
                                        class="material-icons">
                                        &#xe31b;</i> {!! __('backend.edit') !!}</button>
                            </div>
                        </div>
                        {{Form::close()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /column -->

<!-- The template to display files available for upload -->
<script id="template-upload" type="text/x-tmpl">
    {% for (var i=0, file; file=o.files[i]; i++) { %}
    <tr class="template-upload fade{%=o.options.loadImageFileTypes.test(file.type)?' image':''%}">
    <td>
    <span class="preview"></span>
    </td>
    <td>
    <p class="name">{%=file.name%}</p>
    <strong class="error text-danger"></strong>
    </td>
    <td>
    <p class="size">Processing...</p>
    <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0"><div class="progress-bar progress-bar-success" style="width:0%;"></div></div>
    </td>
    <td>
    {% if (!o.options.autoUpload && o.options.edit && o.options.loadImageFileTypes.test(file.type)) { %}
    <button class="btn btn-success edit" data-index="{%=i%}" disabled>
    <i class="glyphicon glyphicon-edit"></i>
    <span>Edit</span>
    </button>
    {% } %}
    {% if (!i && !o.options.autoUpload) { %}
    <button class="btn btn-primary start" disabled style="float: left; margin: 0 5px; border-radius: 5px; box-shadow: unset;">
    <i class="glyphicon glyphicon-upload"></i>
    <span>Start</span>
    </button>
    {% } %}
    {% if (!i) { %}
    <button class="btn btn-warning cancel">
    <i class="glyphicon glyphicon-ban-circle"></i>
    <span>Cancel</span>
    </button>
    {% } %}
    </td>
    </tr>
    {% } %}
</script>
<!-- The template to display files available for download -->
<script id="template-download" type="text/x-tmpl">
    {% for (var i=0, file; file=o.files[i]; i++) { %}        
    <tr class="template-download fade{%=file.thumbnailUrl?' image':''%}">
    <td>
    <span class="preview">
    {% if (file.thumbnailUrl) { %}
    <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" data-gallery><img src="{%=file.thumbnailUrl%}"></a>
    <input type="hidden" id="custId" name="car_photo[]" value="{%=file.name%}">
    {% } %}
    </span>
    </td>
    <td>
    <p class="name">
    {% if (file.url) { %}
    <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" {%=file.thumbnailUrl?'data-gallery':''%}>{%=file.name%}</a>
    {% } else { %}
    <span>{%=file.name%}</span>
    {% } %}
    </p>
    {% if (file.error) { %}
    <div><span class="label label-danger">Error</span> {%=file.error%}</div>
    {% } %}
    </td>
    <td>
    <span class="size">{%=o.formatFileSize(file.size)%}</span>
    </td>
    <td>
    {% if (file.deleteUrl) { %}
    <button class="btn btn-danger delete" data-type="{%=file.deleteType%}" data-url="{%=file.deleteUrl%}"{% if (file.deleteWithCredentials) { %} data-xhr-fields='{"withCredentials":true}'{% } %}>
    <i class="glyphicon glyphicon-trash"></i>
    <span>Delete</span>
    </button>
    <input type="checkbox" name="delete" value="1" class="toggle">
    {% } else { %}
    <button class="btn btn-warning cancel">
    <i class="glyphicon glyphicon-ban-circle"></i>
    <span>Cancel</span>
    </button>
    {% } %}
    </td>
    </tr>
    {% } %}
    
    $('#fileupload').fileupload({
    imageCrop: true // Force cropped images
})
</script>

<script src="{{ URL::asset('assets/frontend/js/jquery.js') }}"></script>
<script src="{{ URL::asset('assets/frontend/js/feather-icons/feather.min.js')}}"></script>
<script src="{{ asset('assets/dashboard/sweetalert2/sweetalert2.js')}}"></script>
<script>
    $(document).ready(function () {
    $('#brand').change(function () {
        var car_brand_id = $(this).val();

        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        // console.log({DistributorCode});
        $.ajax
                ({
                    type: 'POST',
                    url: "{{ route('get_car_models') }}",
                    data: {car_brand_id: car_brand_id, _token: CSRF_TOKEN},
                    success: function (response) {
                        $('#car_model').html(response);

                    },
                });
    });
    $('#district').change(function () {
        var district = $(this).val();

        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        // console.log({DistributorCode});
        $.ajax
                ({
                    type: 'POST',
                    url: "{{ route('get_thana') }}",
                    data: {district_id: district, _token: CSRF_TOKEN},
                    success: function (response) {
                        $('#thana').html(response);

                    },
                });
    });
});
</script>

<script>
    $(document).ready(function () {
        $('.car_photo_delete').click(function () {
            var car_photo_id = $(this).attr("id");
            //alert(car_photo_id);
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            // console.log({DistributorCode});
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax
                    ({
                        type: 'GET',
                        url: "{{ route('carsDestroyEdit','_id') }}".replace('_id', car_photo_id),
                        data: { id: car_photo_id, _token: CSRF_TOKEN },
                        success: function (response) {
                            //console.log(response);
                            if(response.success===true){
                                Swal.fire(
                                    'Deleted!',
                                    'Your file has been deleted.',
                                    'success'
                                ).then(function(){
                                        location.reload();
                                    }
                                );
                            }else{

                                swal.fire("Error!", results.message, "error");

                            }
                        },
                    });

                }
            })

        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function () {

        var multipleCancelButton = new Choices('#fuel_type,#comfort,#entertainment,#safety,#seat,#window,#other_feature,#status', {
            removeItemButton: true,
            enableFiltering: true,
            enableCaseInsensitiveFiltering: true,
            buttonWidth:'400px',
        });


    });
</script>



<!--#############################################################################################-->
                    
            </div>
        </div>
    </div>
    <style>
        .app-footer {
            display: none;
        }
    </style>
@endsection
@push("after-scripts")
    <script type="text/javascript">
        function readURL(input) {

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#photo_preview').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#photo_file").change(function () {
            readURL(this);
            $('#photo_preview').css("opacity", 1);
        });
    </script>
@endpush
