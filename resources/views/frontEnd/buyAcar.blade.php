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
        <?php for ($i = 0; $i <= 2; $i++): ?>
            <div class="col-md-4">
                <div class="car-list-box box-sm">
                    <div class="media-box">
                        <img src="/uploads/frontend/pic1.jpeg" alt="">
                            <div class="overlay-bx">
                                <span data-exthumbimage="/uploads/frontend/pic1.jpeg" data-src="/uploads/frontend/pic1.jpeg" class="view-btn lightimg">
                                    <svg width="75" height="74" viewBox="0 0 75 74" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M44.5334 27.7473V32.3718C44.5334 33.3257 43.7424 34.106 42.7755 34.106H34.572V42.199C34.572 43.1528 33.7809 43.9332 32.8141 43.9332H28.1264C27.1595 43.9332 26.3685 43.1528 26.3685 42.199V34.106H18.1649C17.1981 34.106 16.4071 33.3257 16.4071 32.3718V27.7473C16.4071 26.7935 17.1981 26.0131 18.1649 26.0131H26.3685V17.9201C26.3685 16.9663 27.1595 16.1859 28.1264 16.1859H32.8141C33.7809 16.1859 34.572 16.9663 34.572 17.9201V26.0131H42.7755C43.7424 26.0131 44.5334 26.7935 44.5334 27.7473ZM73.9782 68.8913L69.8325 72.9812C68.4555 74.3396 66.2288 74.3396 64.8664 72.9812L50.2466 58.5728C49.5874 57.9225 49.2212 57.0409 49.2212 56.116V53.7604C44.05 57.749 37.5458 60.1191 30.4702 60.1191C13.6384 60.1191 0 46.6646 0 30.0596C0 13.4545 13.6384 0 30.4702 0C47.3021 0 60.9405 13.4545 60.9405 30.0596C60.9405 37.0397 58.538 43.4563 54.4949 48.5578H56.8827C57.8202 48.5578 58.7138 48.9191 59.373 49.5694L73.9782 63.9777C75.3406 65.3362 75.3406 67.5329 73.9782 68.8913ZM50.3931 30.0596C50.3931 19.1919 41.4864 10.4052 30.4702 10.4052C19.4541 10.4052 10.5474 19.1919 10.5474 30.0596C10.5474 40.9273 19.4541 49.7139 30.4702 49.7139C41.4864 49.7139 50.3931 40.9273 50.3931 30.0596Z" fill="white" fill-opacity="0.66"></path>
                                    </svg>
                                </span>
                            </div>
                    </div>
                    <div class="list-info">
                        <div class="row">
                            <div style="float: left;">
                                <span class="badge-book m-b30"><a href="{{url('car-details/1')}}">Book Now</a></span>
                            </div>
                            <div style="float: right;">
                                <span class="badge m-b30">Tk. 34,500</span>
                            </div>
                        </div>
                        <h5 class="title mb-0"><a href="car-details.html">SMART GT AA-211</a></h5>
                        <div class="car-type">SPORT CAR</div>

                        <div class="col-xs-4"><div class="row"><img src="/uploads/frontend/icon/road.png" width="14"> 8000 km</div></div>
                        <div class="col-xs-4"><div class="row"><img src="/uploads/frontend/icon/gear.png" width="14"> Autometic</div></div>
                        <div class="col-xs-4"><div class="row"><img src="/uploads/frontend/icon/calendar.png" width="14"> 2003</div></div>
                        <div class="col-xs-4"><div class="row"><img src="/uploads/frontend/icon/fuel.png" width="14"> Octen</div></div>
                        <div class="col-xs-4"><div class="row"><img src="/uploads/frontend/icon/car-body.png" width="14"> Sedan</div></div>
                        <div class="col-xs-4"><div class="row"><img src="/uploads/frontend/icon/car-colours.png" width="14"> White</div></div>
                        <div class="col-xs-4"><div class="row"><img src="/uploads/frontend/icon/car-engine-cc.png" width="14"> 1500 CC</div></div>
                        <div class="col-xs-4"><div class="row"><img src="/uploads/frontend/icon/4wd-drive.png" width="14"> 4WD</div></div>
                        <div class="col-xs-4"><div class="row"><img src="/uploads/frontend/icon/car-seat-si.png" width="14"> 5</div></div>
                    </div>
                    <div class="clear"></div>
                    <div class="car-details"><a href="{{url('car-details/1')}}"><button type="button" class="btn btn-warning btn-lg btn-block">Details</button></a></div>
                </div>
            </div>
        <?php endfor; ?>
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

