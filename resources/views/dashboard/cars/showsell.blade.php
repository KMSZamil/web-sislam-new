@extends('dashboard.layouts.master')
@section('title', __('backend.car'))

@section('content')
    <div class="padding">
        <div class="app-body-inner">
            <div class="row-col row-col-xs">

                <link href="{{ asset('assets/dashboard/sweetalert2/sweetalert2.css') }}" rel="stylesheet"
                    type="text/css" />
                <!-- column -->
                <div class="col-sm-6 col-md-7">
                    <div class="row-col">
                        <div class="row-row">
                            <div class="row-body">
                                <div class="row-inner">
                                    <div class="padding p-y-sm ">
                                        <h3>Car Details</h3>
                                        <div class="form-horizontal">
                                            <div class="row">
                                                <table class="table table-bordered">
                                                    <tbody>
                                                        <tr>
                                                            <td style="width:200px">Car Condition</td>
                                                            <td>{{ isset($SellCars->condition->name) ? $SellCars->condition->name : '' }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Car Brand</td>
                                                            <td>{{ isset($SellCars->car_brand->name) ? $SellCars->car_brand->name : '' }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Car Model</td>
                                                            <td>{{ $SellCars->model->name }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Menufacturing Year</td>
                                                            <td>{{ $SellCars->menufacturing_year }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Registration Year</td>
                                                            <td>{{ $SellCars->registration_year }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Registration Number</td>
                                                            <td>{{ $SellCars->registration_number }}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    @if (isset($SellCars->customer_info))
                                        <div class="padding p-y-sm ">
                                            <h3>Contact Details</h3>
                                            <div class="form-horizontal">
                                                <div class="row">
                                                    <table class="table table-bordered">
                                                        <tbody>
                                                            <tr>
                                                                <td style="width:200px">Full Name</td>
                                                                <td>{{ $SellCars->customer_info->name }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Email</td>
                                                                <td>{{ $SellCars->customer_info->email }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Mobile</td>
                                                                <td>{{ $SellCars->customer_info->mobile }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Address</td>
                                                                <td>{{ $SellCars->customer_info->address_line1 }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Price</td>
                                                                <td>{{ $SellCars->price }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>About Car</td>
                                                                <td>{{ $SellCars->car_details }}</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    <div class="padding p-y-sm ">
                                        <h3>Car Photos</h3>
                                        <div class="form-horizontal">
                                            <div class="row">
                                                <div class="container text-center">
                                                    <div class="col-md-8">
                                                        <div class="fotorama" data-nav="thumbs"
                                                            data-allowfullscreen="true" data-transition="slide"
                                                            data-loop="true">

                                                            @foreach ($SellCars->seller_car_images as $row)
                                                                <a href="{{ $row->car_image }}"><img
                                                                        src="{{ $row->car_image }}"></a>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                                {{-- @foreach ($SellCars->seller_car_images as $row)
                                                    <table role="presentation" class="table table-striped">
                                                        <tbody class="">
                                                            <tr class=" fade image in">
                                                                <td>
                                                                    <span class="preview">
                                                                        <img src="{{ asset('files/' . $row->car_image) }}"
                                                                            width="400" height="200">
                                                                    </span>
                                                                </td>
                                                                <td>
                                                                    <p class="name">{{ $row->car_image }}</p>
                                                                    <strong class="error text-danger"></strong>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                @endforeach --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <script src="{{ URL::asset('assets/frontend/js/jquery.js') }}"></script>
                <script src="{{ URL::asset('assets/frontend/js/feather-icons/feather.min.js') }}"></script>
                <script src="{{ asset('assets/dashboard/sweetalert2/sweetalert2.js') }}"></script>
                <script>
                    $(document).ready(function() {
                        $('#brand').change(function() {
                            var car_brand_id = $(this).val();

                            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                            // console.log({DistributorCode});
                            $.ajax({
                                type: 'POST',
                                url: "{{ route('get_car_models') }}",
                                data: {
                                    car_brand_id: car_brand_id,
                                    _token: CSRF_TOKEN
                                },
                                success: function(response) {
                                    $('#car_model').html(response);

                                },
                            });
                        });
                        $('#district').change(function() {
                            var district = $(this).val();

                            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                            // console.log({DistributorCode});
                            $.ajax({
                                type: 'POST',
                                url: "{{ route('get_thana') }}",
                                data: {
                                    district_id: district,
                                    _token: CSRF_TOKEN
                                },
                                success: function(response) {
                                    $('#thana').html(response);

                                },
                            });
                        });
                    });
                </script>
            </div>
        </div>
    </div>
    <style>
        .app-footer {
            display: none;
        }

    </style>
@endsection
@push('after-scripts')
    <script type="text/javascript">
        function readURL(input) {

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#photo_preview').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#photo_file").change(function() {
            readURL(this);
            $('#photo_preview').css("opacity", 1);
        });
    </script>
@endpush
