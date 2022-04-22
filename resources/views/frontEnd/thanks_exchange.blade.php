@extends('frontEnd.layout')

@section('content')
    <style>
        @media screen and (min-width: 0px) and (max-width: 400px) {
            #my-content {
                display: block;
            }

            /* show it on smaller screen */
        }

        @media screen and (min-width: 401px) and (max-width: 1024px) {
            #my-content {
                display: none;
            }

            /* hide it on larger screens */
        }

    </style>
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
                <h1 class="ui-title-page">{{ __('frontend.CAREXCHANGE') }}</h1>
            </div>
        </div>
    </div>

    <div class="container page-content">
        <div class="cont-title" style="margin-right: 20px;">
            <h3 style="color: green" class="text-center"><strong>{{ $success }}</strong></h3>
        </div>

        <div class="col-12">
            <div class="col-sm-6 col-md-6" style="border: 0px solid red">
                <h4 class="text-center">Owner Car Details</h4>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <td style="width:200px">Car Condition</td>
                                <td>{{ isset($carDetailsCarOwner->condition->name) ? $carDetailsCarOwner->condition->name : '' }}
                                </td>
                            </tr>
                            <tr>
                                <td>Car Brand</td>
                                <td>{{ isset($carDetailsCarOwner->car_brand->name) ? $carDetailsCarOwner->car_brand->name : '' }}
                                </td>
                            </tr>
                            <tr>
                                <td>Car Model</td>
                                <td>{{ $carDetailsCarOwner->model->name }}</td>
                            </tr>
                            <tr>
                                <td>Menufacturing Year</td>
                                <td>{{ $carDetailsCarOwner->menufacturing_year }}</td>
                            </tr>
                            <tr>
                                <td>Registration Year</td>
                                <td>{{ $carDetailsCarOwner->registration_year }}</td>
                            </tr>
                            <tr>
                                <td>Registration Number</td>
                                <td>{{ $carDetailsCarOwner->registration_number }}</td>
                            </tr>
                            <tr>
                                <td>Photo</td>
                                <td>
                                    <div class="text-center">
                                        <a href="{{ $carDetailsCarOwner->seller_car_images[0]->car_image }}"><img
                                                style="width: 350px;"
                                                src="{{ $carDetailsCarOwner->seller_car_images[0]->car_image }}"></a>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div id="my-content">
                <img style="position: absolute; width:100px; margin-left: -45px; margin-top:200px;"
                    src="{{ asset('assets/images/line.png') }}">
            </div>
            <div class="col-sm-6 col-md-6" style="border: 0px solid">
                <h4 class="text-center">Showroom Car Details</h4>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <td style="width:200px">Car Condition</td>
                                <td>{{ isset($carDetailsShowroomCar->condition->name) ? $carDetailsShowroomCar->condition->name : '' }}
                                </td>
                            </tr>
                            <tr>
                                <td>Car Brand</td>
                                <td>{{ isset($carDetailsShowroomCar->car_brand->name) ? $carDetailsShowroomCar->car_brand->name : '' }}
                                </td>
                            </tr>
                            <tr>
                                <td>Car Model</td>
                                <td>{{ $carDetailsShowroomCar->model->name }}</td>
                            </tr>
                            <tr>
                                <td>Menufacturing Year</td>
                                <td>{{ $carDetailsShowroomCar->menufacturing_year }}</td>
                            </tr>
                            <tr>
                                <td>Registration Year</td>
                                <td>{{ $carDetailsShowroomCar->registration_year }}</td>
                            </tr>
                            <tr>
                                <td>Registration Number</td>
                                <td>{{ $carDetailsShowroomCar->registration_number }}</td>
                            </tr>
                            <tr>
                                <td>Photo</td>
                                <td>
                                    <div class="text-center">
                                        <a href="{{ $carDetailsShowroomCar->seller_car_images[0]->car_image }}"><img
                                                style="width: 350px;"
                                                src="{{ $carDetailsShowroomCar->seller_car_images[0]->car_image }}"></a>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
