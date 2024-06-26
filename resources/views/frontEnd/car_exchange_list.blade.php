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
                <h1 class="ui-title-page">{{ __('frontend.CHOOSECAR') }}</h1>
            </div>
        </div>
    </div>

    <div class="container page-content">
        <div class="cont-title">
            <p>{{ __('frontend.BUYLONGDETAILS') }}</p>
        </div>
        <section class="content-row-no-bg p-b-0">
            <h2>{{ __('frontend.CHOOSECAR') }}</h2>
            <?php            
        if(count($dashboardCars)>0):
        $i=0;
        foreach($dashboardCars as $data):
        $i++;
        //if($i > 9):
        //break;
        //endif;
            ?>
            @if (isset($data->car_images[0]->car_image))
                <div class="col-md-4 message_box" data-id="<?php echo $data->id; ?>" style=" margin-bottom: 30px;">
                    <div class="car-list-box box-sm">
                        <div class="media-box">
                            @if ($data->status == 2)
                                {{-- <span class="label label-danger"
                                    style="position: absolute; transform: rotate(313deg); margin-top: 32px; width: 100px; font-size:20px;">Sold</span> --}}
                                     <img style="position: absolute; transform: rotate(333deg); margin-top: 32px; width: 100px; "
                                    src="https://www.sislamcars.com.bd/public/assets/images/sold-out-png-4.png"
                                    alt="https://www.sislamcars.com.bd/public/assets/images/sold-out-png-4.png">
                            @endif
                            <img src="{{ $data->car_images[0]->car_image }}"
                                alt="{{ isset($data->car_title) ? $data->car_title : '' }}">
                        </div>
                        <div class="list-info">
                            <div class="row">
                                <div style="float: left;">
                                    @if ($data->status != 2)
                                        <span class="badge-book m-b30">

                                            <form action="{{ url('car-exchange-details') }}" method="post">
                                                @csrf
                                                <input type="hidden" name="CustomerID" id="CustomerID"
                                                    value="{{ $customer_id }}">
                                                <input type="hidden" name="SellerCarID" id="SellerCarID"
                                                    value="{{ $seller_car_id }}">
                                                <input type="hidden" name="ShowroomCarID" value="{{ $data->id }}">
                                                <button type="submit"
                                                    style="background: none; border:none; font-size: 16px;">Exchange
                                                    Now</button>
                                            </form>

                                            {{-- <a href="{{ url('car-book', $data->id) }}">Exchange Now</a> --}}
                                        </span>
                                    @endif
                                </div>
                                <div style="float: right;">
                                    <span class="badge m-b30">Tk. {{ number_format($data->price, 2) }}</span>
                                </div>
                            </div>

                            <h5 class="title mb-0"><a
                                    href="{{ route('car-details', $data->id) }}">{{ isset($data->car_title) ? $data->car_title : '' }}</a>
                            </h5>
                            <div class="col-xs-4">
                                <div class="row"><img src="/uploads/frontend/icon/road.png" width="14">
                                    {{ isset($data->milage) ? $data->milage . ' km' : '' }}</div>
                            </div>
                            <div class="col-xs-4">
                                <div class="row"><img src="/uploads/frontend/icon/gear.png" width="14">
                                    {{ isset($data->car_transmission->name) ? $data->car_transmission->name : '' }}</div>
                            </div>
                            <div class="col-xs-4">
                                <div class="row"><img src="/uploads/frontend/icon/calendar.png" width="14">
                                    {{ isset($data->menufacturing_year) ? $data->menufacturing_year : '' }}</div>
                            </div>
                            @php
                                $data_array = [];
                                if (!empty($data->seller_fuel_types)) {
                                    foreach ($data->seller_fuel_types as $row) {
                                        $data_array[] = $row->fuel_type_name['name'];
                                    }
                                }
                                
                                $fules = implode(', ', $data_array);
                                //dd($fules)
                            @endphp
                            <div class="col-xs-4">
                                <div class="row" style="font-size: 12px"><img
                                        src="/uploads/frontend/icon/fuel.png" width="14">
                                    {{ isset($data->seller_fuel_types) ? $fules : '' }}</div>
                            </div>
                            <div class="col-xs-4">
                                <div class="row"><img src="/uploads/frontend/icon/car-body.png" width="14">
                                    {{ isset($data->bodytype->name) ? $data->bodytype->name : '' }}</div>
                            </div>
                            <div class="col-xs-4">
                                <div class="row"><img src="/uploads/frontend/icon/car-colours.png" width="14">
                                    {{ isset($data->car_exterior_color->name) ? $data->car_exterior_color->name : '' }}
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <div class="row"><img src="/uploads/frontend/icon/car-engine-cc.png" width="14">
                                    {{ isset($data->engine_capacity) ? $data->engine_capacity . ' CC' : '' }}</div>
                            </div>
                            <div class="col-xs-4">
                                <div class="row"><img src="/uploads/frontend/icon/4wd-drive.png" width="14">
                                    {{ isset($data->car_drive_type->name) ? $data->car_drive_type->name : '' }}</div>
                            </div>
                            <div class="col-xs-4">
                                <div class="row"><img src="/uploads/frontend/icon/car-seat-si.png" width="14">
                                    {{ isset($data->seats) ? $data->seats : '' }}</div>
                            </div>
                        </div>
                        <div class="clear"></div>
                        <div class="car-details">
                            <form action="{{ url('car-exchange-details') }}" method="post">
                                @csrf
                                <input type="hidden" name="CustomerID" id="CustomerID" value="{{ $customer_id }}">
                                <input type="hidden" name="SellerCarID" id="SellerCarID" value="{{ $seller_car_id }}">
                                <input type="hidden" name="ShowroomCarID" value="{{ $data->id }}">
                                <button type="submit" class="btn btn-warning btn-lg btn-block">Details</button>
                            </form>
                        </div>
                    </div>
                </div>
            @else
                @continue;
            @endif

            <?php 
        endforeach;
         endif;
         ?>

            <br />
            {{-- <p><button id="proceed" class="btn btn-lg btn-primary">Load More</button></p> --}}

            <div class="col-sm-12">
                <div class="row text-center">
                    <div id="msg_loader" style="display:none"><img src="{{ asset('assets/images/ajax-loader.gif') }}">
                    </div>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="row text-center">
                    <button id="proceed" class="btn btn-lg btn-warning btn-start"> Load More</button>
                </div>
            </div>

        </section>
    </div>
    </div>
    <style>
        .block-title {
            margin-bottom: 0;
        }

        .section-bg .bg-inner {
            padding: 120px auto;
        }

        .page-content {
            margin-bottom: 50px;
        }

    </style>

    <script>
        $(document).ready(function() {
            $('#proceed').click(function() {
                //console.log($(document).height());
                //console.log($(window).height());
                //if ($(window).scrollTop() == $(document).height() - $(window).height()) {
                var msg_id = $(".message_box:last").data("id");
                var CustomerID = $("#CustomerID").val();
                var SellerCarID = $("#SellerCarID").val();
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                $("#msg_loader").show();
                $.ajax({
                    type: "POST",
                    url: "{{ route('exchangeACarMore') }}",
                    data: {
                        msg_id: msg_id,
                        CustomerID: CustomerID,
                        SellerCarID: SellerCarID,
                        _token: CSRF_TOKEN
                    },
                    cache: false,
                    success: function(data) {
                        //Insert data after the message_box 
                        $(".message_box:last").after(data);
                        $("#msg_loader").hide();
                    }
                });

                //}
            });
        });
    </script>
@endsection
