
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
                        {{Form::open(['route'=>['dealersUpdate'],'method'=>'POST', 'files' => true ])}}
                        <!-- fields -->
                        <div class="form-horizontal">
                            <div class="form-group row">
                                <label class="col-sm-3 form-control-label">{{ __('backend.FIRST_NAME') }}</label>
                                <div class="col-sm-9">
                                    {!! Form::text('first_name','', array('placeholder' =>'','class' => 'form-control','id'=>'first_name')) !!}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 form-control-label">{{ __('backend.LAST_NAME') }}</label>
                                <div class="col-sm-9">
                                    {!! Form::text('last_name','', array('placeholder' =>'','class' => 'form-control','id'=>'last_name')) !!}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 form-control-label">{{ __('backend.COMPANY') }}</label>
                                <div class="col-sm-9">
                                    {!! Form::text('company','', array('placeholder' =>'','class' => 'form-control','id'=>'company')) !!}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 form-control-label">{{ __('backend.DEALER_Email') }}</label>
                                <div class="col-sm-9">
                                    {!! Form::email('email','', array('placeholder' =>'','class' => 'form-control','id'=>'email','required'=>'')) !!}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 form-control-label">{{ __('backend.PHONE') }}</label>
                                <div class="col-sm-9">
                                    {!! Form::text('phone','', array('placeholder' =>'','class' => 'form-control','id'=>'phone')) !!}
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label class="col-sm-3 form-control-label">{{ __('backend.SHOWROOM_ADDRESS') }}</label>
                                <div class="col-sm-9">
                                    {!! Form::textarea('address','', array('placeholder' => '','class' => 'form-control','rows'=>'2')) !!}
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-offset-3 col-sm-9">
                                    <button type="submit" class="btn btn-primary"> {!! __('backend.add') !!}</button>
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
