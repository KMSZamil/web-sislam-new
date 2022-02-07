@extends('frontEnd.layout')

@section('content')
<?php
$title_var = "title_" . @Helper::currentLanguage()->code;
$title_var2 = "title_" . env('DEFAULT_LANGUAGE');
$details_var = "details_" . @Helper::currentLanguage()->code;
$details_var2 = "details_" . env('DEFAULT_LANGUAGE');
$file_var = "file_" . @Helper::currentLanguage()->code;
$file_var2 = "file_" . env('DEFAULT_LANGUAGE');
?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="tab-pane active" id="tab-sel">
                <h2 class="form-h2-title">{{ __('frontend.CARSELL') }}</h2>
                <p><span>{{ __('frontend.CARINFO1') }} {{ __('frontend.CARINFO2') }}</span></p>
                @if (count($errors) > 0)
                <div class="custom-alerts alert alert-danger fade in">
                    <div class="error">
                        @foreach ($errors->all() as $error)
                        <ul>
                            <li>{{ $error }}</li>
                        </ul>
                        @endforeach
                    </div>
                </div>
                @endif

                @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif
                <div class="form-group">
                    {!! Form::open(array('url' => '/seller-basic', 'method' => 'post' )) !!}
                    <!-- CROSS Site Request Forgery Protection -->
                    @csrf
                    <div class="form-group">
                        <label>{{ __('frontend.NAME') }} *</label>
                        <input type="text" class="form-control" name="name" id="name" required>
                    </div>
                    <div class="form-group">
                        <label>{{ __('frontend.EMAIL') }}</label>
                        <input type="email" class="form-control" name="email" id="email">
                    </div>
                    <div class="form-group">
                        <label>{{ __('frontend.MOBILE') }} *</label>
                        <input type="text" class="form-control" name="mobile" id="mobile required">
                    </div>
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>{{ __('frontend.CAR_CONDITION') }} *</label>
                                <select class="form-control" name="car_condition" id="car_condition required">
                                    @foreach($CarConditions as $row)
                                        <option value="{{ $row->id }}">{{ $row->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>{{ __('frontend.CAR_BRAND') }} *</label>
                                <select class="form-control" name="car_brand" id="car_brand required">
                                    @foreach($CarBrands as $row)
                                        <option value="{{ $row->id }}">{{ $row->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>{{ __('frontend.CAR_MODEL') }} *</label>
                                <select class="form-control" name="car_model" id="car_model required">
                                    @foreach($CarConditions as $row)
                                        <option value="{{ $row->id }}">{{ $row->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>{{ __('frontend.YEAR') }} *</label>
                                <select class="form-control" name="car_year" id="car_year required">
                                    @php
                                        $firstYear = (int)date('Y') - 32;
                                        $lastYear = (int)date('Y');
                                        for($i=$firstYear;$i<=$lastYear;$i++)
                                        {
                                            echo '<option value='.$i.'>'.$i.'</option>';
                                        }
                                    @endphp
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>{{ __('frontend.CAR_BODY') }}</label>
                                <select class="form-control" name="car_body" id="car_body">
                                    @foreach($BodyTypes as $row)
                                        <option value="{{ $row->id }}">{{ $row->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>{{ __('frontend.MILEAGE') }}</label>
                                <input type="text" class="form-control numeric" name="mileage" id="mileage">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>{{ __('frontend.FUEL_TYPE') }}</label>
                                <select class="form-control" name="fuel_type" id="fuel_type">
                                    @foreach($FuelTypes as $row)
                                        <option value="{{ $row->id }}">{{ $row->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>{{ __('frontend.ENGINE_CAPACITY') }}</label>
                                <input type="text" class="form-control numeric" name="mileage" id="mileage">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>{{ __('frontend.TRANSMISSION') }}</label>
                                <select class="form-control" name="transmission" id="transmission">
                                    @foreach($Transmissions as $row)
                                        <option value="{{ $row->id }}">{{ $row->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>{{ __('frontend.DRIVE') }}</label>
                                <select class="form-control" name="drive" id="drive">
                                    @foreach($Drives as $row)
                                        <option value="{{ $row->id }}">{{ $row->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>{{ __('frontend.EXTERIOR_COLOR') }}</label>
                                <select class="form-control" name="exterior_color" id="exterior_color">
                                    @foreach($ExteriorColors as $row)
                                        <option value="{{ $row->id }}">{{ $row->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>{{ __('frontend.INTERIOR_COLOR') }}</label>
                                <select class="form-control" name="interior_color" id="interior_color">
                                    @foreach($InteriorColors as $row)
                                        <option value="{{ $row->id }}">{{ $row->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>{{ __('frontend.REGISTRATION_YEAR') }}</label>
                                <select class="form-control" name="registration_year" id="registration_year">
                                    @php
                                        $firstYear = (int)date('Y') - 32;
                                        $lastYear = (int)date('Y');
                                        for($i=$firstYear;$i<=$lastYear;$i++)
                                        {
                                            echo '<option value='.$i.'>'.$i.'</option>';
                                        }
                                    @endphp
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>{{ __('frontend.REGISTRATION_SERIAL') }}</label>
                                <select class="form-control" name="registration_serial" id="registration_serial">
                                    @php
                                        $first = 0;
                                        $last = 99;
                                        for($i=$first;$i<=$last;$i++)
                                        {
                                            echo '<option value='.$i.'>'.$i.'</option>';
                                        }
                                    @endphp
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>{{ __('frontend.REGISTRATION_CITY') }}</label>
                                <select class="form-control" name="registration_city" id="registration_city">
                                    @foreach($InteriorColors as $row)
                                        <option value="{{ $row->id }}">{{ $row->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>{{ __('frontend.SEAT_CAPACITY') }}</label>
                                <select class="form-control" name="seat_capacity" id="seat_capacity">
                                    @php
                                        $first = 0;
                                        $last = 30;
                                        for($i=$first;$i<=$last;$i++)
                                        {
                                            echo '<option value='.$i.'>'.$i.'</option>';
                                        }
                                    @endphp
                                </select>
                            </div>
                        </div>
                    </div>

                        <div class="row">
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label>{{ __('frontend.COMFORT') }}</label>
                                    <select class="form-control js-example-basic-single" name="comfort[]" id="comfort" multiple="multiple">
                                        @foreach($Comforts as $row)
                                            <option value="{{ $row->id }}">{{ $row->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label>{{ __('frontend.ENTERTAINMENT') }}</label>
                                    <select class="form-control js-example-basic-single" name="entertainment[]" id="entertainment" multiple="multiple">
                                        @foreach($Entertainments as $row)
                                            <option value="{{ $row->id }}">{{ $row->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label>{{ __('frontend.SAFETY') }}</label>
                                    <select class="form-control js-example-basic-single" name="safety[]" id="safety" multiple="multiple">
                                        @foreach($Safeties as $row)
                                            <option value="{{ $row->id }}">{{ $row->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label>{{ __('frontend.SEAT') }}</label>
                                    <select class="form-control js-example-basic-single" name="seat[]" id="seat" multiple="multiple">
                                        @foreach($Seats as $row)
                                            <option value="{{ $row->id }}">{{ $row->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label>{{ __('frontend.WINDOW') }}</label>
                                    <select class="form-control js-example-basic-single" name="window[]" id="window" multiple="multiple">
                                        @foreach($Windows as $row)
                                            <option value="{{ $row->id }}">{{ $row->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label>{{ __('frontend.OTHER_FEATURE') }}</label>
                                    <select class="form-control js-example-basic-single" name="other_feature[]" id="other_feature" multiple="multiple">
                                        @foreach($OtherFeatures as $row)
                                            <option value="{{ $row->id }}">{{ $row->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group">
                                <label>{{ __('frontend.UPLOAD_PHOTO') }}</label>
                                <input type="file" class="form-control" name="file" id="file">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group">
                                <label>{{ __('frontend.ADD_VIDEO') }}</label>
                                <input type="text" class="form-control" name="video" id="video">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group">
                                <label>{{ __('frontend.SELLER_NOTE') }}</label>
                                <textarea class="form-control" name="sellers_note" id="sellers_note"></textarea>
                            </div>
                        </div>

                    <button type="submit" name="send" class="btn btn-dark btn-block">{{ __('frontend.NEXT') }}   <i class='fa fa-arrow-right' aria-hidden='true'></i></button>

                    {{Form::close()}}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
