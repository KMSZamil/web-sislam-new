@extends('frontEnd.layout')

@section('content')
    <?php
    $title_var = 'title_' . @Helper::currentLanguage()->code;
    $title_var2 = 'title_' . env('DEFAULT_LANGUAGE');
    $details_var = 'details_' . @Helper::currentLanguage()->code;
    $details_var2 = 'details_' . env('DEFAULT_LANGUAGE');
    $file_var = 'file_' . @Helper::currentLanguage()->code;
    $file_var2 = 'file_' . env('DEFAULT_LANGUAGE');
    ?>
    <div class="block-title">
        <div class="block-title__inner section-bg section-bg_second">
            <div class="bg-inner">
                <h1 class="ui-title-page">{{ __('frontend.CARSELL') }}</h1>
            </div>
        </div>
    </div>

    <div class="container page-content">
        <div class="cont-title" style="margin-right: 20px;">
            <h3 style="color: green" class="text-center"><strong>{{ $success }}</strong></h3>
            <div class="form-horizontal">
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <h3>Details</h3>
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <td style="width:200px">Car Condition</td>
                                    <td>{{ isset($carDetails->condition->name) ? $carDetails->condition->name : '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>Car Brand</td>
                                    <td>{{ isset($carDetails->car_brand->name) ? $carDetails->car_brand->name : '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>Car Model</td>
                                    <td>{{ $carDetails->model->name }}</td>
                                </tr>
                                <tr>
                                    <td>Menufacturing Year</td>
                                    <td>{{ $carDetails->menufacturing_year }}</td>
                                </tr>
                                <tr>
                                    <td>Registration Year</td>
                                    <td>{{ $carDetails->registration_year }}</td>
                                </tr>
                                <tr>
                                    <td>Registration Number</td>
                                    <td>{{ $carDetails->registration_number }}</td>
                                </tr>
                            </tbody>
                        </table>
                        @if (isset($customerDetails))
                            <h3>Customer Details</h3>
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td style="width:200px">Full Name</td>
                                        <td>{{ $customerDetails->name }}</td>
                                    </tr>
                                    <tr>
                                        <td>Email</td>
                                        <td>{{ $customerDetails->email }}</td>
                                    </tr>
                                    <tr>
                                        <td>Mobile</td>
                                        <td>{{ $customerDetails->mobile }}</td>
                                    </tr>
                                    <tr>
                                        <td>Address</td>
                                        <td>{{ $customerDetails->address_line1 }}</td>
                                    </tr>
                                    <tr>
                                        <td>About Car</td>
                                        <td>{{ $carDetails->car_details }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        @endif
                    </div>
                    <div class="col-sm-12 col-md-6">
                        {{-- <h3>Car Photos</h3> --}}
                        <div class="form-horizontal">
                            <div class="row">
                                <div class="container text-center">
                                    <div class="col-md-8">
                                        <div class="fotorama" data-nav="thumbs" data-allowfullscreen="true"
                                            data-transition="slide" data-loop="true">

                                            @foreach ($carDetails->seller_car_images as $row)
                                                <a href="{{ $row->car_image }}"><img src="{{ $row->car_image }}"></a>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
