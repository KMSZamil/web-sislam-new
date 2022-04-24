<div class="form-horizontal">
    <div class="row">
        <div class="col-sm-4">
            <div class="form-group">
                <label>{{ __('frontend.CAR_TITLE') }}</label>
                <input type="text" class="form-control" name="car_title" id="car_title" value="{{ old('car_title', $carDetails->car_title) }}">
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <label>{{ __('frontend.CAR_CONDITION') }} *</label>
                <select class="form-control" name="car_condition" id="car_condition" required>
                    @foreach($CarConditions as $row)
                        <option {{ (old('car_condition', $carDetails->car_condition) == $row->id) ? 'selected' : ''  }} value="{{ $row->id }}">{{ $row->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <label>{{ __('frontend.MADEIN') }}</label>
                <select class="form-control" name="made_in" id="made_in" required>
                    @foreach($Country as $row)
                    <option {{ (old('made_in', $carDetails->made_in) == $row->id) ? 'selected' : ''  }} value="{{ $row->id }}">{{ $row->title_en }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <label>{{ __('frontend.CAR_BRAND') }} *</label>
                <select class="form-control" name="brand" id="brand" required>
                    @foreach($CarBrands as $row)
                        <option {{ (old('car_brand', $carDetails->brand) == $row->id) ? 'selected' : ''  }} value="{{ $row->id }}">{{ $row->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <label>{{ __('frontend.CAR_MODEL') }} *</label>
                <select class="form-control" name="car_model" id="car_model" required>
                    @foreach($CarModels as $row)
                        <option {{ (old('car_model', $carDetails->car_model) == $row->id) ? 'selected' : ''  }} value="{{ $row->id }}">{{ $row->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <label>{{ __('frontend.YEAR') }} *</label>
                <select class="form-control" name="menufacturing_year" id="menufacturing_year" required>
                    @php
                        $firstYear = (int)date('Y') - 32;
                        $lastYear = (int)date('Y');
                        for($i=$lastYear;$i>=$firstYear;$i--)
                        {
                    @endphp
                            echo '<option {{ (old('car_brand', $carDetails->menufacturing_year) == $i) ? 'selected' : ''  }} value="{{ $i }}">{{ $i }}</option>';
                    @php
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
                <select class="form-control" name="body_type" id="body_type">
                    <option value="">Select</option>
                    @foreach($BodyTypes as $row)
                        <option {{ (old('car_brand', $carDetails->body_type) == $row->id) ? 'selected' : ''  }} value="{{ $row->id }}">{{ $row->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <label>{{ __('frontend.MILEAGE') }}</label>
                <input type="text" class="form-control numeric" name="milage" id="milage" value="{{ old('milage', $carDetails->milage) }}">
            </div>
        </div>
        @php                                
        
        $data_array = [];
        if (!empty($carDetails->seller_fuel_types)){
            foreach ($carDetails->seller_fuel_types as $row){
                $data_array[] = $row['fuel_type_id'];
            }
        }
        //dd($data_array);
        @endphp
        <div class="col-sm-4">
            <div class="form-group">
                <label>{{ __('frontend.FUEL_TYPE') }}</label>
                <select class="form-control" name="fuel_type[]" id="fuel_type" placeholder="Select {{ __('frontend.FUEL_TYPE') }}" multiple="multiple">
                    @foreach($FuelTypes as $row)
                        <option @php if(in_array($row->id, $data_array)){echo 'selected';}  @endphp value="{{ $row->id }}">{{ $row->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-4">
            <div class="form-group">
                <label>{{ __('frontend.ENGINE_CAPACITY') }}</label>
                <input type="text" class="form-control numeric" value="{{ old('engine_capacity', $carDetails->engine_capacity) }}" name="engine_capacity" id="engine_capacity">
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <label>{{ __('frontend.TRANSMISSION') }}</label>
                <select class="form-control" name="transmission" id="transmission">
                    <option value="">Select</option>
                    @foreach($Transmissions as $row)
                        <option {{ (old('transmission', $carDetails->transmission) == $row->id) ? 'selected' : ''  }} value="{{ $row->id }}">{{ $row->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <label>{{ __('frontend.DRIVE') }}</label>
                <select class="form-control" name="drive_type" id="drive_type">
                    <option value="">Select</option>
                    @foreach($Drives as $row)
                        <option {{ (old('drive_type', $carDetails->drive_type) == $row->id) ? 'selected' : ''  }} value="{{ $row->id }}">{{ $row->name }}</option>
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
                    <option value="">Select</option>
                    @foreach($ExteriorColors as $row)
                        <option {{ (old('exterior_color', $carDetails->exterior_color) == $row->id) ? 'selected' : ''  }} value="{{ $row->id }}">{{ $row->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <label>{{ __('frontend.INTERIOR_COLOR') }}</label>
                <select class="form-control" name="interior_color" id="interior_color">
                    <option value="">Select</option>
                    @foreach($InteriorColors as $row)
                        <option {{ (old('interior_color', $carDetails->interior_color) == $row->id) ? 'selected' : ''  }} value="{{ $row->id }}">{{ $row->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <label>{{ __('frontend.REGISTRATION_YEAR') }}</label>
                <select class="form-control" name="registration_year" id="registration_year">
                    <option value="">Select</option>
                    @php
                        $firstYear = (int)date('Y') - 32;
                        $lastYear = (int)date('Y');
                        for($i=$lastYear;$i>=$firstYear;$i--)
                        {
                        @endphp
                            <option {{ (old('registration_year', $carDetails->registration_year) == $i) ? 'selected' : ''  }} value='{{$i}}'>{{$i}}</option>
                        @php                                                   
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
                    {{-- <option value="">Select</option>
                    @php
                        $first = 0;
                        $last = 99;
                        for($i=$first;$i<=$last;$i++)
                        {
                        @endphp
                            <option {{ (old('registration_serial', $carDetails->registration_serial) == $i) ? 'selected' : ''  }} value='{{$i}}'>{{$i}}</option>
                        @php 
                        }
                    @endphp --}}
                    <option value="">Select</option>
                    @foreach($RegistrationSerial as $row)
                    <option {{ (old('registration_city', $carDetails->registration_serial) == $row->id) ? 'selected' : ''  }} value="{{ $row->id }}">{{ $row->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <label>{{ __('frontend.REGISTRATION_CITY') }}</label>
                <select class="form-control" name="registration_city" id="registration_city">
                    <option value="">Select</option>
                    @foreach($registration_cities as $row)
                        <option {{ (old('registration_city', $carDetails->registration_city) == $row->id) ? 'selected' : ''  }} value="{{ $row->id }}">{{ $row->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>


        <div class="col-sm-4">
            <div class="form-group">
                <label>{{ __('frontend.REGISTRATION_NUMBER') }}</label>
                <input type="text" class="form-control" name="registration_number" id="registration_number" value="{{  $carDetails->registration_number }}">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-4">
            <div class="form-group">
                <label>{{ __('frontend.SEAT_CAPACITY') }}</label>
                <select class="form-control" name="seats" id="seats">
                    <option value="">Select</option>
                    @php
                        $first = 1;
                        $last = 20;
                        for($i=$first;$i<=$last;$i++)
                        {
                        @endphp
                            <option {{(old('seats', $carDetails->seats) == $i) ? 'selected' : ''}} value='{{$i}}'>{{$i}}</option>
                        @php                                                   
                        }
                    @endphp
                </select>
            </div>
        </div>
    </div>

    <hr/>

    @php
$data_array = [];
if (!empty($carDetails->seller_comfort)){
foreach ($carDetails->seller_comfort as $row){
    $data_array[] = $row['comfort_id'];
}
}
@endphp

<div class="row">
<div class="col-sm-2">
    <div class="form-group">
        <label>{{ __('frontend.COMFORT') }}</label>
        <select  name="comfort[]" id="comfort" placeholder="Select {{ __('frontend.COMFORT') }}" multiple="multiple">
            @foreach($Comforts as $row)
                <option @php if(in_array($row->id, $data_array)){echo 'selected';}  @endphp value="{{ $row->id }}">{{ $row->name }}</option>
            @endforeach
        </select>
    </div>
</div>

@php
$data_array = [];
if (!empty($carDetails->seller_entertainment)){
    foreach ($carDetails->seller_entertainment as $row){
        $data_array[] = $row['entertainment_id'];
    }
}
@endphp

<div class="col-sm-2">
    <div class="form-group">
        <label>{{ __('frontend.ENTERTAINMENT') }}</label>
        <select  name="entertainment[]" id="entertainment" placeholder="Select {{ __('frontend.ENTERTAINMENT') }}" multiple="multiple">
            @foreach($Entertainments as $row)
                <option @php if(in_array($row->id, $data_array)){echo 'selected';}  @endphp value="{{ $row->id }}">{{ $row->name }}</option>
            @endforeach
        </select>
    </div>
</div>

@php
$data_array = [];
if (!empty($carDetails->seller_safety)){
    foreach ($carDetails->seller_safety as $row){
        $data_array[] = $row['safety_id'];
    }
}
@endphp
<div class="col-sm-2">
    <div class="form-group">
        <label>{{ __('frontend.SAFETY') }}</label>
        <select  name="safety[]" id="safety" placeholder="Select {{ __('frontend.SAFETY') }}" multiple="multiple">
            @foreach($Safeties as $row)
                <option @php if(in_array($row->id, $data_array)){echo 'selected';}  @endphp value="{{ $row->id }}">{{ $row->name }}</option>
            @endforeach
        </select>
    </div>
</div>

@php
$data_array = [];
if (!empty($carDetails->seller_seat)){
    foreach ($carDetails->seller_seat as $row){
        $data_array[] = $row['seat_id'];
    }
}
@endphp
<div class="col-sm-2">
    <div class="form-group">
        <label>{{ __('frontend.SEAT') }}</label>
        <select  name="seat[]" id="seat" placeholder="Select {{ __('frontend.SEAT') }}" multiple="multiple">
            @foreach($Seats as $row)
                <option @php if(in_array($row->id, $data_array)){echo 'selected';}  @endphp value="{{ $row->id }}">{{ $row->name }}</option>
            @endforeach
        </select>
    </div>
</div>

@php
$data_array = [];
if (!empty($carDetails->seller_window)){
    foreach ($carDetails->seller_window as $row){
        $data_array[] = $row['window_id'];
    }
}
@endphp
<div class="col-sm-2">
    <div class="form-group">
        <label>{{ __('frontend.WINDOW') }}</label>
        <select  name="window[]" id="window" placeholder="Select {{ __('frontend.WINDOW') }}" multiple="multiple">
            @foreach($Windows as $row)
                <option @php if(in_array($row->id, $data_array)){echo 'selected';}  @endphp value="{{ $row->id }}">{{ $row->name }}</option>
            @endforeach
        </select>
    </div>
</div>

@php
$data_array = [];
if (!empty($carDetails->seller_other_feature)){
    foreach ($carDetails->seller_other_feature as $row){
        $data_array[] = $row['other_feature_id'];
    }
}
@endphp
<div class="col-sm-2">
    <div class="form-group">
        <label>{{ __('frontend.OTHER_FEATURE') }}</label>
        <select  name="other_feature[]" id="other_feature" placeholder="Select {{ __('frontend.OTHER_FEATURE') }}" multiple="multiple">
            @foreach($OtherFeatures as $row)
                <option @php if(in_array($row->id, $data_array)){echo 'selected';}  @endphp value="{{ $row->id }}">{{ $row->name }}</option>
            @endforeach
        </select>
    </div>
</div>
</div>

<h3>Paper Details</h3>
<div class="row">
<div class="col-sm-3">
    <div class="form-group">
        <label>{{ __('frontend.TAX_TOKEN_EXP_DATE') }}</label>
        <input type="date" value="{{ old('tax_token_expaire', date('Y-m-d',strtotime($carDetails->tax_token_expaire)) ) }}" class="form-control" name="tax_token_expaire" id="tax_token_expaire">
    </div>
</div>
<div class="col-sm-3">
    <div class="form-group">
        <label>{{ __('frontend.FITNESS_EXP_DATE') }}</label>
        <input type="date" class="form-control" value="{{ old('fitnes_exspaire', date('Y-m-d',strtotime($carDetails->fitnes_exspaire)) ) }}" name="fitnes_exspaire" id="fitnes_exspaire">
    </div>
</div>
<div class="col-sm-3">
    <div class="form-group">
        <label>{{ __('frontend.BANK_LOAN') }}</label>
        <input type="text" class="form-control" name="bank_loan" value="{{ old('bank_loan', $carDetails->bank_loan ) }}" id="bank_loan">
    </div>
</div>
<div class="col-sm-3">
    <div class="form-group">
        <label>{{ __('frontend.NAME_TRANSFER') }}</label>
        <select class="form-control" name="name_transfer" id="name_transfer">
            <option value="">Select</option>
            <option @php if($carDetails->name_transfer=='Instant'){echo 'selected';}  @endphp value="Instant">Instant</option>
            <option @php if($carDetails->name_transfer=='Later'){echo 'selected';}  @endphp value="Later">Later</option>
        </select>
    </div>
</div>
</div>

<hr/>

<h3>Car Photo</h3>
<div class="row">
    <div class="col-sm-12">

        @foreach($carDetails->seller_car_images as $row)
        <?php //print_r($row->car_image); ?>
            <table role="presentation" class="table table-striped">
                <tbody class="">
                    <tr class=" fade image in">
                        <td>
                            <span class="preview">
{{--                                                        <canvas width="80" height="45"></canvas>--}}
                                <img src="{{ $row->car_image }}" width="80" height="45">
                            </span>
                        </td>
                        <td>
                            <p class="name">{{ $row->car_image }}</p>
                            <strong class="error text-danger"></strong>
                        </td>
                        <td>
                            <p class="size"></p>
{{--                                                    <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0"><div class="progress-bar progress-bar-success" style="width:0%;"></div></div>--}}
                        </td>
                        <td>

                            <a class="btn btn-danger car_photo_delete" id="{{ $row->id }}" style="float: left; margin: 0 5px; border-radius: 5px; box-shadow: unset;">
                                <i class="fa fa-times del"></i>
                                <span>Delete</span>
                            </a>

                            <button class="btn btn-warning cancel">
                                <i class="glyphicon glyphicon-ban-circle"></i>
                                <span>Cancel</span>
                            </button>                                
                        </td>
                    </tr>
                </tbody>
            </table>
        @endforeach
            @include('dashboard.cars.photoUpload')
    </div>
</div>    
<!--<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            <label>{{ __('frontend.SMART_CARD') }}</label>
            <input type="file" class="form-control" name="smart_card" id="smart_card">
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            <label>{{ __('frontend.TAX_TOKEN') }}</label>
            <input type="file" class="form-control" name="tax_token" id="tax_token">
        </div>
    </div>
</div>
<div class="row">                        
    <div class="col-sm-6">
        <div class="form-group">
            <label>{{ __('frontend.FITNESS') }}</label>
            <input type="file" class="form-control" name="fitness" id="fitness">
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            <label>{{ __('frontend.BANK_CLEARANCE') }}</label>
            <input type="file" class="form-control" name="bank_clearance" id="bank_clearance">
        </div>
    </div>
</div>-->
<div class="row">
    <div class="col-sm-4">
        <label>{{ __('frontend.ASKING_PRICE') }}</label>
        <input type="text" class="form-control" value="{{ old('price', $carDetails->price) }}" name="price" id="price">
    </div>
    <div class="col-sm-4">
        <label>{{ __('frontend.HOMEFEATURE') }}</label>
        <select class="form-control" name="home_feature" id="home_feature">
            <option value="">Select</option>
            <option {{(old('home_feature', $carDetails->home_feature) == 1) ? 'selected' : ''}} value="1">Yes</option>
            <option {{(old('home_feature', $carDetails->home_feature) == 0) ? 'selected' : ''}} value="0">No</option>
        </select>
    </div>
    <div class="col-sm-4">
        <label>{{ __('frontend.CARSTATUS') }}</label>
        <select class="form-control" name="status" id="status">
            <option value="">Select</option>
            <option {{(old('status', $carDetails->status) == 0) ? 'selected' : ''}} value="0">In Active</option>
            <option {{(old('status', $carDetails->status) == 1) ? 'selected' : ''}} value="1">In Stock</option>
            <option {{(old('status', $carDetails->status) == 2) ? 'selected' : ''}} value="2">Sold Out</option>
            <option {{(old('status', $carDetails->status) == 3) ? 'selected' : ''}} value="2">Booked</option>
        </select>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <label>{{ __('backend.VIDEOURL') }}</label>
        <input type="text" class="form-control" value="{{ old('video_url', $carDetails->video_url) }}" name="video_url" id="video_url">
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <label>{{ __('backend.CARDETAILS') }}</label>
        <textarea class="form-control" rows="10" name="car_details" id="car_details">{{ old('car_details', $carDetails->car_details) }}</textarea>
    </div>
</div>


<br/>


</div>