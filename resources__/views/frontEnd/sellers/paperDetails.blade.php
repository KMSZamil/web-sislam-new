<h3>Paper Details</h3>
<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            <label>{{ __('frontend.TAX_TOKEN_EXP_DATE') }}</label>
            <input type="date" class="form-control" name="tax_token_exp_date" id="tax_token_exp_date">
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            <label>{{ __('frontend.FITNESS_EXP_DATE') }}</label>
            <input type="date" class="form-control" name="fitness_exp_date" id="fitness_exp_date">
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            <label>{{ __('frontend.BANK_LOAN') }}</label>
            <input type="text" class="form-control" name="bank_loan" id="bank_loan">
        </div>
    </div>
    <div class="col-sm-6">
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