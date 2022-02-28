<h3>Car Features</h3>

<div class="row">
    <div class="col-sm-4">
        <div class="form-group">
            <label>{{ __('frontend.COMFORT') }}</label>
            <select class="form-control js-example-basic-single" name="comfort[]" id="comfort" multiple="multiple">
                @foreach($Comforts as $row)
                <option value="{{ $row->id }}">{{ $row->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <label>{{ __('frontend.ENTERTAINMENT') }}</label>
            <select class="form-control js-example-basic-single" name="entertainment[]" id="entertainment" multiple="multiple">
                @foreach($Entertainments as $row)
                <option value="{{ $row->id }}">{{ $row->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <label>{{ __('frontend.SAFETY') }}</label>
            <select class="form-control js-example-basic-single" name="safety[]" id="safety" multiple="multiple">
                @foreach($Safeties as $row)
                <option value="{{ $row->id }}">{{ $row->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <label>{{ __('frontend.SEAT') }}</label>
            <select class="form-control js-example-basic-single" name="seat[]" id="seat" multiple="multiple">
                @foreach($Seats as $row)
                <option value="{{ $row->id }}">{{ $row->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <label>{{ __('frontend.WINDOW') }}</label>
            <select class="form-control js-example-basic-single" name="window[]" id="window" multiple="multiple">
                @foreach($Windows as $row)
                <option value="{{ $row->id }}">{{ $row->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-sm-4">
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