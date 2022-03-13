<link href="{{ asset('assets/dashboard/sweetalert2/sweetalert2.css') }}" rel="stylesheet" type="text/css" />

<style>
 .imagePreview {
    width: 100%;
    height: 180px;
    background-position: center center;
  background:url(http://cliquecities.com/assets/no-image-e3699ae23f866f6cbdf8ba2443ee5c4e.jpg);
  background-color:#fff;
    background-size: cover;
  background-repeat:no-repeat;
    display: inline-block;
  box-shadow:0px -3px 6px 2px rgba(0,0,0,0.2);
} 
.btn-primary
{
  display:block;
  border-radius:0px;
  box-shadow:0px 4px 6px 2px rgba(0,0,0,0.2);
  margin-top:-5px;
}
.imgUp
{
  margin-bottom:15px;
}
.del
{
  position:absolute;
  top:0px;
  right:15px;
  width:30px;
  height:30px;
  text-align:center;
  line-height:30px;
  background-color:rgba(255,255,255,0.6);
  cursor:pointer;
}
.imgAdd
{
  width:30px;
  height:30px;
  border-radius:50%;
  background-color:#4bd7ef;
  color:#fff;
  box-shadow:0px 0px 2px 1px rgba(0,0,0,0.2);
  text-align:center;
  line-height:30px;
  margin-top:0px;
  cursor:pointer;
  font-size:15px;
}
</style>

<!-- column -->
<div class="col-sm-6 col-md-7">
    <div class="row-col">
        <div class="p-a-sm">
            <h6 class="m-b-0 m-t-sm"><i class="material-icons">
                    &#xe02e;</i> {{ __('backend.newCars') }}
            </h6>
        </div>
        <div class="row-row">
            <div class="row-body">
                <div class="row-inner">
                    <div class="padding p-y-sm ">
                        <?php //echo '<pre/>';print_r($carDetails->body_type);exit();?>
                        {{Form::open(['route'=>['carsUpdate',$carDetails->id],'method'=>'POST', 'files' => true ])}}
                        <input type="hidden" name="id" value="{{ $carDetails->id }}"/>
                        <h3>Car Details</h3>
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
                                            <option value="">Select</option>
                                            @php
                                                $first = 0;
                                                $last = 99;
                                                for($i=$first;$i<=$last;$i++)
                                                {
                                                @endphp
                                                    <option {{ (old('registration_serial', $carDetails->registration_serial) == $i) ? 'selected' : ''  }} value='{{$i}}'>{{$i}}</option>
                                                @php 
                                                }
                                            @endphp
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

                    <h3>Car Features</h3>

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
                        
                    <h3>Photo Upload</h3>
{{--                            {{dd($carDetails->seller_car_images)}}--}}
                        <div class="row">
                            <div class="col-sm-12">
                                @include('dashboard.cars.photoUpload')
{{--                                @foreach($carDetails->seller_car_images as $row)--}}
{{--                                    <?php--}}
{{--                                    echo '<pre/>'; print_r(asset('files/'.$row->car_image));--}}
{{--                                    ?>--}}
{{--                                @endforeach--}}

                            </div>
                            <div class=" clear"></div>
                    <!--
                        {{-- {{dd($carDetails->seller_car_images)}} --}}
{{--                        @foreach($carDetails->seller_car_images as $row)--}}
                        <div class="col-sm-2 imgUp">
                            {{-- asset('storage/'.$row->car_image) --}}
                            {{-- asset('uploads/car_images/full/'.$row->car_image) --}}
                            <div class="imagePreview" style="background:url('{{ asset('uploads/car_images/full/'.$row->car_image) }}'); 
                                                                width: 100%;
                                                                height: 180px;
                                                                background-position: center center;
                                                                background-color:#fff;
                                                                background-size: cover;
                                                                background-repeat:no-repeat;
                                                                display: inline-block;
                                                                box-shadow:0px -3px 6px 2px rgba(0,0,0,0.2);"></div>
                            <label class="btn btn-primary">Upload
                                <input type="hidden" name="carphoto_id[]" value="{{ $row->id }}">
                                <input type="file" class="uploadFile img"  name="carphoto[]"  style="width: 0px;height: 0px;overflow: hidden;">
                                </label><i class="fa fa-times del car_photo" id="{{ $row->id }}"></i>
        				    </label>
                        </div>
{{--                        @endforeach--}}
                        <i class="fa fa-plus imgAdd"></i>


                        <div class="col-sm-8">
                            <div class="form-group">
                                <label>{{ __('frontend.CAR_PHOTO') }}</label>
                                <input type="file" class="form-control" name="car_photo_1" id="car_photo">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group" style="padding-top: 31px;">
                                <button type="button" class="btn btn-success btn-icon add-more">
                                    <i data-feather="plus"></i>
                                </button>
                            </div>
                        </div>

                    </div>
                    -->
                    
{{--                    <div class="after-add-more"></div>--}}

{{--                    <div class="row">--}}
{{--                        <div class="col-sm-6">--}}
{{--                            <div class="form-group">--}}
{{--                                <label>{{ __('frontend.SMART_CARD') }}</label>--}}
{{--                                <input type="file" class="form-control" name="smart_card" id="smart_card">--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-sm-6">--}}
{{--                            <div class="form-group">--}}
{{--                                <label>{{ __('frontend.TAX_TOKEN') }}</label>--}}
{{--                                <input type="file" class="form-control" name="tax_token" id="tax_token">--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div class="row">                        --}}
{{--                        <div class="col-sm-6">--}}
{{--                            <div class="form-group">--}}
{{--                                <label>{{ __('frontend.FITNESS') }}</label>--}}
{{--                                <input type="file" class="form-control" name="fitness" id="fitness">--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-sm-6">--}}
{{--                            <div class="form-group">--}}
{{--                                <label>{{ __('frontend.BANK_CLEARANCE') }}</label>--}}
{{--                                <input type="file" class="form-control" name="bank_clearance" id="bank_clearance">--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <h3>Contact Details</h3>--}}
{{--                    <div class="form-group">--}}
{{--                        <label>{{ __('frontend.NAME') }}</label>--}}
{{--                        <input type="text" class="form-control" value="{{ old('name', $carDetails->customers->name) }}" name="name" id="name" value="">--}}
{{--                    </div>--}}
{{--                    <div class="form-group">--}}
{{--                        <label>{{ __('frontend.EMAIL') }}</label>--}}
{{--                        <input type="email" class="form-control" value="{{ old('email', $carDetails->customers->email) }}" name="email" id="email" value="">--}}
{{--                    </div>--}}
{{--                    <div class="form-group">--}}
{{--                        <label>{{ __('frontend.MOBILE') }} *</label>--}}
{{--                        <input type="text" class="form-control" value="{{ old('mobile', $carDetails->customers->mobile) }}" name="mobile" id="mobile required" value="">--}}
{{--                    </div>--}}
{{--                    <div class="row">--}}
{{--                        <div class="col-sm-6">--}}
{{--                            <div class="form-group">--}}
{{--                                <label>{{ __('frontend.ADDRESS1') }}</label>--}}
{{--                                <input type="text" class="form-control" value="{{ old('address1', $carDetails->customers->address_line1) }}" name="address_line1" id="address_line1">--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-sm-6">--}}
{{--                            <div class="form-group">--}}
{{--                                <label>{{ __('frontend.ADDRESS2') }}</label>--}}
{{--                                <input type="text" class="form-control" value="{{ old('address2', $carDetails->customers->address_line2) }}" name="address_line2" id="address_line2">--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="row">--}}
{{--                        <div class="col-sm-6">                            --}}
{{--                            <label>{{ __('frontend.DISTRICT') }}</label>--}}
{{--                            <?php //print_r($carDetails->customers->district);exit(); ?>--}}
{{--                            <select class="form-control" name="district" id="district">--}}
{{--                                <option value="">Select</option>--}}
{{--                                @foreach($District as $row)--}}
{{--                                    <option {{ (old('district', $carDetails->customers->district) == $row->id) ? 'selected' : ''  }} value="{{ $row->id }}">{{ $row->name }}</option>--}}
{{--                                @endforeach--}}
{{--                            </select>--}}
{{--                        </div>--}}
{{--                        <div class="col-sm-6">--}}
{{--                            <label>{{ __('frontend.THANA') }}</label>--}}
{{--                            <select class="form-control" name="thana" id="thana">--}}
{{--                                <option value="">Select</option>--}}
{{--                                @foreach($Thana as $row)--}}
{{--                                    <option {{ (old('thana', $carDetails->customers->thana) == $row->id) ? 'selected' : ''  }} value="{{ $row->id }}">{{ $row->name }}</option>--}}
{{--                                @endforeach--}}
{{--                            </select>--}}
{{--                        </div>--}}
{{--                    </div>--}}

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
                                        <option {{(old('status', $carDetails->status) == 0) ? 'selected' : ''}} value="0">Inactive</option>
                                        <option {{(old('status', $carDetails->status) == 1) ? 'selected' : ''}} value="1">Active</option>
                                        <option {{(old('status', $carDetails->status) == 2) ? 'selected' : ''}} value="2">Sold Out</option>
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
    <button class="btn btn-primary start" disabled>
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
<script>
$(".imgAdd").click(function(){
  $(this).closest(".row").find('.imgAdd').before('<div class="col-sm-2 imgUp"><div class="imagePreview"></div><label class="btn btn-primary">Upload<input type="file" name="carphoto[]" class="uploadFile img" value="Upload Photo" style="width:0px;height:0px;overflow:hidden;"></label><i class="fa fa-times del"></i></div>');
});
$(document).on("click", "i.del" , function() {
// 	to remove card
  $(this).parent().remove();
// to clear image
  // $(this).parent().find('.imagePreview').css("background-image","url('')");
});
$(function() {
    $(document).on("change",".uploadFile", function()
    {
    		var uploadFile = $(this);
        var files = !!this.files ? this.files : [];
        if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support
 
        if (/^image/.test( files[0].type)){ // only image file
            var reader = new FileReader(); // instance of the FileReader
            reader.readAsDataURL(files[0]); // read the local file
 
            reader.onloadend = function(){ // set image data as background of div
                //alert(uploadFile.closest(".upimage").find('.imagePreview').length);
uploadFile.closest(".imgUp").find('.imagePreview').css("background-image", "url("+this.result+")");
            }
        }
      
    });
});

    $(document).ready(function () {
        $('#brand').change(function () {
            var car_brand_id = $(this).val();

            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            // console.log({DistributorCode});
            $.ajax
            ({
                type: 'POST',
                url: "{{ route('get_car_models') }}",
                data: { car_brand_id: car_brand_id, _token: CSRF_TOKEN },
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
                data: { district_id: district, _token: CSRF_TOKEN },
                success: function (response) {
                    $('#thana').html(response);

                },
            });
        });
        
        $('.car_photo').click(function () {
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
                                console.log(response);
                                if(response.success===true){
                                    Swal.fire(
                                    'Deleted!',
                                    'Your file has been deleted.',
                                    'success'
                                )
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
    <script src="{{ asset('assets/dashboard/sweetalert2/sweetalert2.js')}}"></script>
<script type="text/javascript">
        $(document).ready(function () {
            feather.replace();
            var i = 1;
            $(".add-more").click(function () {
                i++;
                console.log(i);
                //alert("alert");
                //var html = $(".copy").html();
                $sections = $("<div class='row cc'>\
                                    <div class='col-sm-8'>\
                                        <div class='form-group'>\
                                            <input type='file' class='form-control' name='car_photo_"+ i +"' id='car_photo'>\
                                        </div>\
                                    </div>\
                                    <div class='col-sm-4'>\
                                        <div class='form-group'>\
                                            <button type='button' class='btn btn-danger btn-icon remove'>\
                                                <i data-feather='x-circle'></i>\
                                            </button>\
                                        </div>\
                                    </div>\
                                </div>");

               
                if(i>=6){
                    alert('Upto 5 image added');
                    i--;
                }else{
                    $('.after-add-more').append($sections);
                    feather.replace();
                }
            });
            $("body").on("click", ".remove", function () {
                i--;
                $(this).parents(".cc").remove();
                console.log(i);
            });
        });
        $(document).ready(function(){

            var multipleCancelButton = new Choices('#fuel_type,#comfort,#entertainment,#safety,#seat,#window,#other_feature', {
                removeItemButton: true,
                maxItemCount:5,
                searchResultLimit:5,
                renderChoiceLimit:5
            });


        });
    </script>


