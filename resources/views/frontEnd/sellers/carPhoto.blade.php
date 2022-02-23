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