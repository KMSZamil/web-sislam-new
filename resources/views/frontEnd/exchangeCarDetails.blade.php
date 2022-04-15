@extends('frontEnd.layout')

@section('content')
<?php
$title_var = "title_" . @Helper::currentLanguage()->code;
$title_var2 = "title_" . env('DEFAULT_LANGUAGE');
$details_var = "details_" . @Helper::currentLanguage()->code;
$details_var2 = "details_" . env('DEFAULT_LANGUAGE');
$file_var = "file_" . @Helper::currentLanguage()->code;
$file_var2 = "file_" . env('DEFAULT_LANGUAGE');
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
                <p><span>{{ __('frontend.CARINFO1') }} {{ __('frontend.CARINFO2') }}</span></p>
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
                    {!! Form::open(array('url' => '/exchange-car-information', $GetID, 'id'=>'fileupload', 'method' => 'post', 'files' => true )) !!}
                    <!-- CROSS Site Request Forgery Protection -->
                    @csrf
                    <input type="hidden" name="GetID" value="{{ $GetID }}"/>
                    @include('frontEnd.sellers.carDetails')
                    @include('frontEnd.sellers.carFeatures')
                    @include('frontEnd.sellers.paperDetails')
                    @include('frontEnd.sellers.carPhoto')
                    {{-- @include('frontEnd.sellers.contactDetails') --}}

                    {{-- <div class="row">
                        <div class="form-group">
                            <input type="checkbox" class="form-check-input" name="terms_and_condition" value="1" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">{{ __('frontend.TERMS_AND_CONDITION') }}</label>
                        </div>
                    </div> --}}

{{--                    <div class="row">--}}
{{--                        <div class="form-group">--}}
{{--                            <label>{{ __('frontend.ADD_VIDEO') }}</label>--}}
{{--                            <input type="text" class="form-control" name="video" id="video">--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div class="row">--}}
{{--                        <div class="form-group">--}}
{{--                            <label>{{ __('frontend.SELLER_NOTE') }}</label>--}}
{{--                            <textarea class="form-control" name="sellers_note" id="sellers_note"></textarea>--}}
{{--                        </div>--}}
{{--                    </div>--}}

                    <button type="submit" name="send" class="btn btn-dark btn-block">{{ __('frontend.NEXT') }}   <i class='fa fa-arrow-right' aria-hidden='true'></i></button>
{{--                </form>--}}
                    {{Form::close()}}
                </div>
            </div>
        </div>
    </div>
</div>

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

<script type="text/javascript">
        $(document).ready(function () {
            feather.replace();
            var i = 1;
            $(".add-more").click(function () {
                i++;
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
            });
        });
    </script>



@endsection
