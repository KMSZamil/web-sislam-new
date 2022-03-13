
<!-- column -->
<div class="col-sm-6 col-md-7">
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
                        {{Form::open(['route'=>['dealersStore'],'method'=>'POST', 'files' => true ])}}
                        <!-- fields -->
                        <div class="form-horizontal">
                            <div class="form-group row">
                                <label class="col-sm-3 form-control-label">{{ __('backend.DEALER_PHONE') }}</label>
                                <div class="col-sm-9">
                                    {!! Form::text('phone','', array('placeholder' =>'','class' => 'form-control','id'=>'phone')) !!}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 form-control-label">{{ __('backend.DEALER_Email') }}</label>
                                <div class="col-sm-9">
                                    {!! Form::email('email','', array('placeholder' =>'','class' => 'form-control','id'=>'email','required'=>'')) !!}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 form-control-label">{{ __('backend.SHOWROOM_NAME') }}</label>
                                <div class="col-sm-9">
                                    {!! Form::text('company','', array('placeholder' =>'','class' => 'form-control','id'=>'company')) !!}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 form-control-label">{{ __('backend.DISTRICT') }}</label>
                                <div class="col-sm-9">
                                    <select class="form-control js-example-basic-single" name="district" id="district">
                                        <option value="">Select</option>
                                        @foreach($Districts as $row)
                                            <option value="{{ $row->id }}">{{ $row->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 form-control-label">{{ __('backend.THANA') }}</label>
                                <div class="col-sm-9">
                                    <select class="form-control js-example-basic-single" name="thana" id="thana">
                                        <option value="">Select</option>
                                        @foreach($Thana as $row)
                                            <option value="{{ $row->id }}">{{ $row->name }}</option>
                                        @endforeach
                                    </select>
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
