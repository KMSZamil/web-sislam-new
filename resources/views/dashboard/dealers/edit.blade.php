
<!-- column -->
<div class="col-sm-12 col-md-12">
    <div class="row-col">
        <div class="p-a-sm">
            <h6 class="m-b-0 m-t-sm"><i class="material-icons">
                    &#xe02e;</i> {{ __('backend.NEW_DEALER') }}
            </h6>
        </div>
        <div class="row-row">
            <div class="row-body">
                <div class="row-inner">
                    <div class="padding p-y-sm ">
                        {{Form::open(['route'=>['dealersUpdate',$DealerToEdit->id],'method'=>'POST', 'files' => true ])}}
                        <!-- fields -->
                        <input type="hidden" name="dealer_id" value="{{ $DealerToEdit->id }}" />
                        <div class="form-horizontal">
                            <div class="form-group row">
                                <label class="col-sm-3 form-control-label">{{ __('backend.FIRST_NAME') }}</label>
                                <div class="col-sm-9">
                                    {!! Form::text('first_name',$DealerToEdit->first_name, array('placeholder' =>'','class' => 'form-control','id'=>'first_name')) !!}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 form-control-label">{{ __('backend.LAST_NAME') }}</label>
                                <div class="col-sm-9">
                                    {!! Form::text('last_name',$DealerToEdit->last_name, array('placeholder' =>'','class' => 'form-control','id'=>'last_name')) !!}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 form-control-label">{{ __('backend.COMPANY') }}</label>
                                <div class="col-sm-9">
                                    {!! Form::text('company',$DealerToEdit->company, array('placeholder' =>'','class' => 'form-control','id'=>'company')) !!}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 form-control-label">{{ __('backend.DEALER_Email') }}</label>
                                <div class="col-sm-9">
                                    {!! Form::email('email',$DealerToEdit->email, array('placeholder' =>'','class' => 'form-control','id'=>'email','required'=>'')) !!}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 form-control-label">{{ __('backend.PHONE') }}</label>
                                <div class="col-sm-9">
                                    {!! Form::text('phone',$DealerToEdit->phone, array('placeholder' =>'','class' => 'form-control','id'=>'phone')) !!}
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label class="col-sm-3 form-control-label">{{ __('backend.SHOWROOM_ADDRESS') }}</label>
                                <div class="col-sm-9">
                                    {!! Form::textarea('address',$DealerToEdit->address, array('placeholder' => '','class' => 'form-control','rows'=>'2')) !!}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 form-control-label">{{ __('backend.STATUS') }}</label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="status" id="status">
                                        <option value="">Select</option>                                       
                                        <option {{(old('status', $DealerToEdit->status) == 1) ? 'selected' : ''}} value="1">Active</option>
                                        <option {{(old('status', $DealerToEdit->status) == 0) ? 'selected' : ''}} value="0">Inactive</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-offset-3 col-sm-9">
                                    <button type="submit" class="btn btn-primary"> {!! __('backend.edit') !!}</button>
                                </div>
                            </div>

                        </div>
                        <!-- / fields -->
                        {{Form::close()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
});
<script src="{{ URL::asset('assets/frontend/js/jquery.js') }}"></script>
<script>
    $(document).ready(function () {
        $('#district').change(function () {
        var district = $(this).val();
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        // console.log({DistributorCode});
        $.ajax
            ({
                type: 'POST',
                url: "{{ route('get_thana') }}",
                data: {district_id: district, _token: CSRF_TOKEN},
                    success: function (response) {
                    $('#thana').html(response);
                },
            });
        });
    });
</script>
<!-- /column -->
