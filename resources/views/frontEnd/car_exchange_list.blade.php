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

<div class="container page-content">
    <div class="cont-title">
        <p>{{ __('frontend.BUYLONGDETAILS') }}</p>
    </div>
    <section class="content-row-no-bg p-b-0">
        <h2>{{__('frontend.CARFIND')}}</h2>
<?php            
        if(count($dashboardCars)>0):
        $i=0;
        foreach($dashboardCars as $data):
        $i++;
        //if($i > 9):
        //break;
        //endif;
            ?>
        @if(isset($data->car_images[0]->car_image))
            <div class="col-md-4" style=" margin-bottom: 30px;">
                <div class="car-list-box box-sm">
                    <div class="media-box">
                        <img src="{{ asset('files/'.$data->car_images[0]->car_image) }}" alt="{{ isset($data->car_title) ? $data->car_title : '' }}">
                    </div>
                    <div class="list-info">
                        <div class="row">
                            <div style="float: left;">
{{--                                <span class="badge-book m-b30">--}}
{{--                                    <a href="#">Book Now</a>--}}
{{--                                </span>--}}
                            </div>
                            <div style="float: right;">
                                <span class="badge m-b30">Tk. {{ number_format($data->price, 2) }}</span>
                            </div>
                        </div>

                        <h5 class="title mb-0"><a href="{{ route('car-details',$data->id) }}">{{ isset($data->car_title) ? $data->car_title : '' }}</a></h5>
                        <div class="col-xs-4"><div class="row"><img src="/uploads/frontend/icon/road.png" width="14"> {{ isset( $data->milage) ?  $data->milage.' km' : ''  }}</div></div>
                        <div class="col-xs-4"><div class="row"><img src="/uploads/frontend/icon/gear.png" width="14"> {{ isset($data->car_transmission->name) ? $data->car_transmission->name : '' }}</div></div>
                        <div class="col-xs-4"><div class="row"><img src="/uploads/frontend/icon/calendar.png" width="14"> {{ isset($data->menufacturing_year) ? $data->menufacturing_year : '' }}</div></div>
                        <div class="col-xs-4"><div class="row"><img src="/uploads/frontend/icon/fuel.png" width="14"> {{ isset($data->fuel_type) ? $data->fuel_type : '' }}</div></div>
                        <div class="col-xs-4"><div class="row"><img src="/uploads/frontend/icon/car-body.png" width="14"> {{ isset($data->bodytype->name) ? $data->bodytype->name : '' }}</div></div>
                        <div class="col-xs-4"><div class="row"><img src="/uploads/frontend/icon/car-colours.png" width="14"> {{ isset($data->exterior_color->name) ? $data->exterior_color->name : '' }}</div></div>
                        <div class="col-xs-4"><div class="row"><img src="/uploads/frontend/icon/car-engine-cc.png" width="14"> {{ isset($data->engine_capacity) ? $data->engine_capacity.' CC' : '' }}</div></div>
                        <div class="col-xs-4"><div class="row"><img src="/uploads/frontend/icon/4wd-drive.png" width="14"> {{ isset($data->drive_type->name) ? $data->drive_type->name : '' }}</div></div>
                        <div class="col-xs-4"><div class="row"><img src="/uploads/frontend/icon/car-seat-si.png" width="14"> {{ isset($data->seats) ? $data->seats : '' }}</div></div>
                    </div>
                    <div class="clear"></div>
                    <div class="car-details">
                            <form action="{{url('car-exchange-details')}}" method="post">
                                @csrf
                                <input type="hidden" name="CustomerID" value="{{  $customer_id }}">
                                <input type="hidden" name="SellerCarID" value="{{ $seller_car_id }}">
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
        
    </section>
</div>
</div>
<style>
    .block-title{
        margin-bottom: 0;
    }
    .section-bg .bg-inner{
        padding: 120px auto;
    }
    .page-content{
        margin-bottom: 50px;
    }
</style>
@endsection

