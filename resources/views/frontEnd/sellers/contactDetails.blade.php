<h3>Contact Details</h3>
<div class="col-sm-4">
<div class="form-group">
    <label>{{ __('frontend.NAME') }}</label>
    <input type="text" class="form-control" name="name" id="name" value="{{ $data->name ?? '' }}">
</div>
</div>
<div class="col-sm-4">
<div class="form-group">
    <label>{{ __('frontend.EMAIL') }}</label>
    <input type="email" class="form-control" name="email" id="email" value="{{ $data->email ?? '' }}">
</div>
</div>
<div class="col-sm-4">
<div class="form-group">
    <label>{{ __('frontend.MOBILE') }} *</label>
    <input type="text" class="form-control" name="mobile" id="mobile required" value="{{ $data->mobile ?? '' }}">
</div>
</div>
<div>
    <div class="col-sm-6">
        <label>{{ __('frontend.DISTRICT') }}</label>
        <select class="form-control" name="district" id="district">
            <option value="">Select</option>
            @foreach($District as $row)
            <option value="{{ $row->id }}">{{ $row->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-sm-6">
        <label>{{ __('frontend.THANA') }}</label>
        <select class="form-control" name="thana" id="thana">
            <option value="">Select</option>
            @foreach($Thana as $row)
            <option value="{{ $row->id }}">{{ $row->name }}</option>
            @endforeach
        </select>
    </div>
</div>
<div>
    <div class="col-sm-12">
        <div class="form-group">
            <label>{{ __('frontend.ADDRESS') }}</label>
            <input type="text" class="form-control" name="address1" id="address1">
        </div>
    </div>
    {{-- <div class="col-sm-6">
        <div class="form-group">
            <label>{{ __('frontend.ADDRESS2') }}</label>
    <input type="text" class="form-control" name="address2" id="address2">
</div>
</div> --}}
</div>


<div>
    <div class="col-sm-12">
        <label>{{ __('frontend.ASKING_PRICE') }}</label>
        <input type="text" class="form-control" name="price" id="price">
    </div>
</div>

<div>
    <div class="col-sm-12">
        <div class="form-group">
            <label>{{ __('frontend.SELLER_NOTE') }}</label>
            <textarea class="form-control" name="sellers_note" id=""></textarea>
        </div>
    </div>
</div>