
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
                        {{Form::open(['route'=>['carsStore'],'method'=>'POST', 'files' => true ])}}
                        {{-- <div class="row-col h-auto m-b-1">
                            <div class="col-sm-3">
                                <div class="avatar w-64 inline">
                                    <img id="photo_preview"
                                         src="{{ asset('uploads/cars/profile.jpg') }}"
                                         style="opacity: 0.2">
                                </div>
                                <div class="form-file inline">
                                    <input id="photo_file" type="file" name="file" accept="image/*">
                                    <button class="btn white btn-sm">
                                        <small>
                                            <small>{{ __('backend.selectFile') }} ..</small>
                                        </small>
                                    </button>
                                </div>
                            </div>
                            <div class="col-sm-9 v-m h2 _300">
                                <div class="p-l-xs">
                                    {!! Form::text('first_name','', array('placeholder' =>__('backend.firstName'),'class' => 'form-control w-sm inline','id'=>'first_name','required'=>'')) !!}
                                    {!! Form::text('last_name','', array('placeholder' =>__('backend.lastName'),'class' => 'form-control w-sm inline','id'=>'last_name','required'=>'')) !!}
                                </div>
                            </div>
                        </div> --}}
                        <!-- fields -->


                        
                        <h3>Car Details</h3>
                        <div class="form-horizontal">
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>{{ __('frontend.CAR_CONDITION') }} *</label>
                                        <select class="form-control" name="car_condition" id="car_condition" required>
                                            @foreach($CarConditions as $row)
                                                <option value="{{ $row->id }}">{{ $row->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>{{ __('frontend.CAR_BRAND') }} *</label>
                                        <select class="form-control" name="car_brand" id="car_brand" required>
                                            @foreach($CarBrands as $row)
                                                <option value="{{ $row->id }}">{{ $row->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>{{ __('frontend.CAR_MODEL') }} *</label>
                                        <select class="form-control" name="car_model" id="car_model" required>
                                            @foreach($CarModels as $row)
                                                <option value="{{ $row->id }}">{{ $row->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>{{ __('frontend.YEAR') }} *</label>
                                        <select class="form-control" name="car_year" id="car_year" required>
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
                                            <option value="">Select</option>
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
                                        <label class="col-sm-3">{{ __('frontend.FUEL_TYPE') }}</label>
                                        <select class="col-sm-9 form-control js-example-basic-single" name="fuel_type[]" id="fuel_type" multiple="multiple">
                                            <option value="">Select</option>
                                            @foreach($FuelTypes as $row)
                                                <option value="{{ $row->name }}">{{ $row->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>{{ __('frontend.ENGINE_CAPACITY') }}</label>
                                        <input type="text" class="form-control numeric" name="engine_capacity" id="engine_capacity">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>{{ __('frontend.TRANSMISSION') }}</label>
                                        <select class="form-control" name="transmission" id="transmission">
                                            <option value="">Select</option>
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
                                            <option value="">Select</option>
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
                                            <option value="">Select</option>
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
                                            <option value="">Select</option>
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
                                            <option value="">Select</option>
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
                                            <option value="">Select</option>
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
                                            <option value="">Select</option>
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
                                            <option value="">Select</option>
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

                            <h3>Car Features</h3>

                    <div class="row">
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label>{{ __('frontend.COMFORT') }}</label>
                                <select class="form-control js-example-basic-single" name="comfort[]" id="comfort" multiple="multiple">
                                    @foreach($Comforts as $row)
                                        <option value="{{ $row->name }}">{{ $row->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label>{{ __('frontend.ENTERTAINMENT') }}</label>
                                <select class="form-control js-example-basic-single" name="entertainment[]" id="entertainment" multiple="multiple">
                                    @foreach($Entertainments as $row)
                                        <option value="{{ $row->name }}">{{ $row->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label>{{ __('frontend.SAFETY') }}</label>
                                <select class="form-control js-example-basic-single" name="safety[]" id="safety" multiple="multiple">
                                    @foreach($Safeties as $row)
                                        <option value="{{ $row->name }}">{{ $row->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label>{{ __('frontend.SEAT') }}</label>
                                <select class="form-control js-example-basic-single" name="seat[]" id="seat" multiple="multiple">
                                    @foreach($Seats as $row)
                                        <option value="{{ $row->name }}">{{ $row->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label>{{ __('frontend.WINDOW') }}</label>
                                <select class="form-control js-example-basic-single" name="window[]" id="window" multiple="multiple">
                                    @foreach($Windows as $row)
                                        <option value="{{ $row->name }}">{{ $row->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label>{{ __('frontend.OTHER_FEATURE') }}</label>
                                <select class="form-control js-example-basic-single" name="other_feature[]" id="other_feature" multiple="multiple">
                                    @foreach($OtherFeatures as $row)
                                        <option value="{{ $row->name }}">{{ $row->name }}</option>
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
                                <input type="date" class="form-control" name="tax_token_exp_date" id="tax_token_exp_date">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>{{ __('frontend.FITNESS_EXP_DATE') }}</label>
                                <input type="date" class="form-control" name="fitness_exp_date" id="fitness_exp_date">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>{{ __('frontend.BANK_LOAN') }}</label>
                                <input type="text" class="form-control" name="bank_loan" id="bank_loan">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>{{ __('frontend.NAME_TRANSFER') }}</label>
                                <select class="form-control" name="name_transfer" id="name_transfer">
                                    <option value="">Select</option>
                                    <option value="Instant">Instant</option>
                                    <option value="Later">Later</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <h3>Photo Upload</h3>
                    <div class="row">
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
                    
                    <div class="after-add-more"></div>

                    <div class="row">
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
                    </div>

                    <h3>Contact Details</h3>
                    <div class="form-group">
                        <label>{{ __('frontend.NAME') }}</label>
                        <input type="text" class="form-control" name="name" id="name" value="">
                    </div>
                    <div class="form-group">
                        <label>{{ __('frontend.EMAIL') }}</label>
                        <input type="email" class="form-control" name="email" id="email" value="">
                    </div>
                    <div class="form-group">
                        <label>{{ __('frontend.MOBILE') }} *</label>
                        <input type="text" class="form-control" name="mobile" id="mobile required" value="">
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>{{ __('frontend.ADDRESS1') }}</label>
                                <input type="text" class="form-control" name="address1" id="address1">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>{{ __('frontend.ADDRESS2') }}</label>
                                <input type="text" class="form-control" name="address2" id="address2">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <label>{{ __('frontend.DISTRICT') }}</label>
                            <select class="form-control js-example-basic-single" name="district" id="district">
                                <option value="">Select</option>
                                @foreach($District as $row)
                                    <option value="{{ $row->id }}">{{ $row->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <label>{{ __('frontend.THANA') }}</label>
                            <select class="form-control js-example-basic-single" name="thana" id="thana">
                                <option value="">Select</option>
                                @foreach($Thana as $row)
                                    <option value="{{ $row->id }}">{{ $row->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <label>{{ __('frontend.ASKING_PRICE') }}</label>
                            <input type="text" class="form-control" name="asking_price" id="asking_price">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group">
                            <label>{{ __('frontend.SELLER_NOTE') }}</label>
                            <textarea class="form-control" name="sellers_note" id=""></textarea>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group">
                            <input type="checkbox" class="form-check-input" name="terms_and_condition" value="1" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">{{ __('frontend.TERMS_AND_CONDITION') }}</label>
                        </div>
                    </div>





                            {{-- <div class="form-group row">
                                <label class="col-sm-3 form-control-label">{{ __('backend.carPhone') }}</label>
                                <div class="col-sm-9">
                                    {!! Form::text('phone','', array('placeholder' =>'','class' => 'form-control','id'=>'phone')) !!}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 form-control-label">{{ __('backend.carEmail') }}</label>
                                <div class="col-sm-9">
                                    {!! Form::email('email','', array('placeholder' =>'','class' => 'form-control','id'=>'email','required'=>'')) !!}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 form-control-label">{{ __('backend.companyName') }}</label>
                                <div class="col-sm-9">
                                    {!! Form::text('company','', array('placeholder' =>'','class' => 'form-control','id'=>'company')) !!}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 form-control-label">{!!  __('backend.country') !!}</label>
                                <div class="col-sm-9">
                                    <select name="country_id" id="country_id"
                                            class="form-control select2 select2-hidden-accessible" ui-jp="select2"
                                            ui-options="{theme: 'bootstrap'}">
                                        <option value="">- - {!!  __('backend.country') !!} - -
                                        </option>
                                        <?php
                                        $title_var = "title_" . @Helper::currentLanguage()->code;
                                        $title_var2 = "title_" . env('DEFAULT_LANGUAGE');
                                        ?>
                                        @foreach ($Countries as $country)
                                            <?php
                                            if ($country->$title_var != "") {
                                                $title = $country->$title_var;
                                            } else {
                                                $title = $country->$title_var2;
                                            }
                                            ?>
                                            <option value="{{ $country->id  }}">{{ $title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 form-control-label">{{ __('backend.city') }}</label>
                                <div class="col-sm-9">
                                    {!! Form::text('city','', array('placeholder' =>'','class' => 'form-control','id'=>'city')) !!}
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 form-control-label">{{ __('backend.notes') }}</label>
                                <div class="col-sm-9">
                                    {!! Form::textarea('notes','', array('placeholder' => '','class' => 'form-control','rows'=>'2')) !!}
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-offset-3 col-sm-9">
                                    <button type="submit" class="btn btn-primary"><i
                                            class="material-icons">
                                            &#xe31b;</i> {!! __('backend.add') !!}</button>
                                </div>
                            </div> --}}

                        </div>
                        <!-- / fields -->
                        <div class="form-group row">
                            <div class="col-sm-offset-3 col-sm-9">
                                <button type="submit" class="btn btn-primary"><i
                                        class="material-icons">
                                        &#xe31b;</i> {!! __('backend.add') !!}</button>
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



<script src="{{ URL::asset('assets/frontend/js/jquery.js') }}"></script>
<script src="{{ URL::asset('assets/frontend/js/feather-icons/feather.min.js')}}"></script>
<script>
    $(document).ready(function () {
        $('#car_brand').change(function () {
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
    });
</script>

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
    </script>
