@extends('frontEnd.layout')

@section('content')
    <?php
    $title_var = 'title_' . @Helper::currentLanguage()->code;
    $title_var2 = 'title_' . env('DEFAULT_LANGUAGE');
    $details_var = 'details_' . @Helper::currentLanguage()->code;
    $details_var2 = 'details_' . env('DEFAULT_LANGUAGE');
    $file_var = 'file_' . @Helper::currentLanguage()->code;
    $file_var2 = 'file_' . env('DEFAULT_LANGUAGE');
    ?>
    <div class="block-title">
        <div class="block-title__inner section-bg section-bg_second">
            <div class="bg-inner">
                <h1 class="ui-title-page">{{ __('frontend.BCACAR') }}</h1>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="tab-pane active" id="tab-sel">
                    <h2 class="form-h2-title">{{ __('frontend.CAREXC') }}</h2>
                    <p><span> {{ __('frontend.CARINFO2') }}</span></p>
                    @if (count($errors) > 0)
                        <div class="custom-alerts alert alert-danger fade in">
                            <div class="error">
                                @foreach ($errors->all() as $error)
                                    <ul>
                                        <li>{{ $error }}</li>
                                    </ul>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <div class="form-group">
                        {!! Form::open(['route' => 'exchangeBasic', 'id' => 'fileupload', 'method' => 'post', 'files' => true]) !!}
                        @csrf

                        <h3>Contact Details</h3>
                        <div class="form-group">
                            <label>{{ __('frontend.NAME') }} *</label>
                            <input type="text" class="form-control" name="name" id="name"
                                value="{{ $Customer->name ?? '' }}" required>
                        </div>
                        <div class="form-group">
                            <label>{{ __('frontend.EMAIL') }} *</label>
                            <input type="email" class="form-control" name="email" id="email"
                                value="{{ $Customer->email ?? '' }}" required>
                        </div>
                        <div class="form-group">
                            <label>{{ __('frontend.MOBILE') }} *</label>
                            <input type="text" class="form-control" name="mobile" id="mobile required"
                                value="{{ $Customer->mobile ?? '' }}" required>
                        </div>
                        <div class="row">
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
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>{{ __('frontend.ADDRESS') }}</label>
                                    <input type="text" class="form-control" name="address1" id="address1"
                                        value="{{ $Customer->address_line1 ?? '' }}" required>
                                </div>
                            </div>
                            {{-- <div class="col-sm-6">
                                <div class="form-group">
                                    <label>{{ __('frontend.ADDRESS2') }}</label>
                                    <input type="text" class="form-control" name="address2" id="address2"
                                        value="{{ $Customer->address_line2 ?? '' }}">
                                </div>
                            </div> --}}
                        </div>

                        <button type="submit" name="send" class="btn btn-dark btn-block">{{ __('frontend.NEXT') }} <i
                                class='fa fa-arrow-right' aria-hidden='true'></i></button>
                        {{-- </form> --}}
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#district').change(function() {
                var district = $(this).val();
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                // console.log({DistributorCode});
                $.ajax({
                    type: 'POST',
                    url: "{{ route('get_car_thana') }}",
                    data: {
                        district_id: district,
                        _token: CSRF_TOKEN
                    },
                    success: function(response) {
                        $('#thana').html(response);
                    },
                });
            });
        });
    </script>

@endsection
