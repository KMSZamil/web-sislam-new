<h3>Car Details</h3>
{{-- <div class="row">
    <div>
        <div class="form-group">
            <label>{{ __('frontend.CAR_TITLE') }}</label>
            <input type="text" class="form-control" name="car_title" id="car_title" value="">
        </div>
    </div>
</div> --}}
<div class="row">
    <div class="col-sm-4">
        <div class="form-group">
            <label>{{ __('frontend.CAR_CONDITION') }} *</label>
            <select class="form-control" name="car_condition" id="car_condition" required>
                <option value="">Select</option>
                @foreach ($CarConditions as $row)
                    <option value="{{ $row->id }}">{{ $row->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <label>{{ __('frontend.CAR_BRAND') }} *</label>
            <select class="form-control" name="car_brand" id="car_brand" required>
                <option value="">Select</option>
                @foreach ($CarBrands as $row)
                    <option value="{{ $row->id }}">{{ $row->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <label>{{ __('frontend.CAR_MODEL') }} *</label>
            <select class="form-control" name="car_model" id="car_model" required>
                <option value="">Select</option>
                <option value="">Select</option>
                @foreach ($CarModels as $row)
                    <option value="{{ $row->id }}">{{ $row->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <label>Manufacturing {{ __('frontend.YEAR') }} *</label>
            <select class="form-control" name="menufacturing_year" id="menufacturing_year" required>
                <option value="">Select</option>
                @php
                    $firstYear = (int) date('Y') - 32;
                    $lastYear = (int) date('Y');
                    for ($i = $lastYear; $i >= $firstYear; $i--) {
                        echo '<option value=' . $i . '>' . $i . '</option>';
                    }
                @endphp
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
            for ($i = $lastYear; $i >= $firstYear; $i--) {
                        echo '<option value=' . $i . '>' . $i . '</option>';
                    }
            @endphp
        </select>
    </div>
</div>
    {{-- <div class="col-sm-4">
    <div class="form-group">
        <label>{{ __('frontend.CAR_BODY') }}</label>
        <select class="form-control" name="car_body" id="car_body">
            <option value="">Select</option>
            @foreach ($BodyTypes as $row)
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
        <select class="form-control js-example-basic-single" name="fuel_type[]" id="fuel_type" multiple="multiple">
            <option value="">Select</option>
            @foreach ($FuelTypes as $row)
            <option value="{{ $row->id }}">{{ $row->name }}</option>
            @endforeach
        </select>
    </div>
</div>
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
            @foreach ($Transmissions as $row)
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
            @foreach ($Drives as $row)
            <option value="{{ $row->id }}">{{ $row->name }}</option>
            @endforeach
        </select>
    </div>
</div>
<div class="col-sm-4">
    <div class="form-group">
        <label>{{ __('frontend.EXTERIOR_COLOR') }}</label>
        <select class="form-control" name="exterior_color" id="exterior_color">
            <option value="">Select</option>
            @foreach ($ExteriorColors as $row)
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
            @foreach ($InteriorColors as $row)
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
<div class="col-sm-4">

</div>

<div class="col-sm-4">
    <div class="form-group">
        <label>{{ __('frontend.REGISTRATION_CITY') }}</label>
        <select class="form-control" name="registration_city" id="registration_city">
            <option value="">Select</option>
            @foreach ($District as $row)
            <option value="{{ $row->id }}">{{ $row->name }}</option>
            @endforeach
        </select>
    </div>
</div> --}}

    <div class="col-sm-4">
        <div class="form-group">
            <label>{{ __('frontend.REGISTRATION_NUMBER') }}</label>
            <div>
                <div class="col-sm-3">
                    <div class="row">
                    <select class="form-control" name="registration_serial" id="registration_serial">
                        <option value="">Select</option>
                        @foreach ($RegistrationSerial as $row)
                            <option value="{{ $row->id }}">{{ $row->name }}</option>
                        @endforeach
                    </select>
                    </div>
                </div>
                <div class="col-sm-9">
                    <div class="row">
                    <input type="text" class="form-control" name="registration_number" id="registration_number">
                    </div>
                </div>
            </div>
        </div>
    </div>


    {{-- <div class="col-sm-4">
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
</div> --}}
</div>
