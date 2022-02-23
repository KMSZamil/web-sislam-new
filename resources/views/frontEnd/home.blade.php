@extends('frontEnd.layout')

@section('content')

<!-- start Home Slider -->
@include('frontEnd.includes.slider')
<!-- end Home Slider -->

@if(!empty($HomePage))
@if(@$HomePage->{"details_" . @Helper::currentLanguage()->code} !="")
<section class="content-row-no-bg home-welcome">
    <div class="container">
        {!! @$HomePage->{"details_" . @Helper::currentLanguage()->code} !!}
    </div>
</section>
@endif
@endif

@if(count($TextBanners)>0)
@foreach($TextBanners->slice(0,1) as $TextBanner)
<?php
try {
    $TextBanner_type = $TextBanner->webmasterBanner->type;
} catch (Exception $e) {
    $TextBanner_type = 0;
}
?>
@endforeach
<?php
$title_var = "title_" . @Helper::currentLanguage()->code;
$title_var2 = "title_" . env('DEFAULT_LANGUAGE');
$details_var = "details_" . @Helper::currentLanguage()->code;
$details_var2 = "details_" . env('DEFAULT_LANGUAGE');
$file_var = "file_" . @Helper::currentLanguage()->code;
$file_var2 = "file_" . env('DEFAULT_LANGUAGE');

$col_width = 12;
if (count($TextBanners) == 2) {
    $col_width = 6;
}
if (count($TextBanners) == 3) {
    $col_width = 4;
}
if (count($TextBanners) > 3) {
    $col_width = 3;
}
?>
<section class="content-row-no-bg p-b-0">
    <div class="container">
        <div class="home-sec">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <h1 class="text-center">{{ __('frontend.HOMETITLE') }}</h1>
                </div>
                <div class="col-md-2"></div>
            </div>
            <div class="row">
                <div class="col-md-6"><p class="para-cont text-justify" style="font-size: 16px; margin-top: 15px; ">{{ __('frontend.HOME1') }}</p></div>
                <div class="col-md-6">
                    <img src="/uploads/frontend/s_islam_cars.jpg" style="max-width: 100%; margin: 0 auto;">
                </div>
            </div>
        </div>
    </div>
</section>
<section class="content-row-no-bg p-b-0">
    <div class="container">
        <div class="why-we">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <h2 class="text-center">{{ __('frontend.WHYWETITLE') }}</h2>
                </div>
                <div class="col-md-2"></div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <img src="/uploads/frontend/why_we_diff.jpg" style="max-width: 100%; margin: 0 auto;">
                </div>
                <div class="col-md-6">
                    <p class="para-cont text-justify" style="font-size: 16px;"><span style="font-weight: bold;"><i class="fa fa-check-circle fa-bse" style="margin: 0!important; font-size: 16px;"></i> {{ __('frontend.WHYWET1') }}</span><br /><span>{{ __('frontend.WHYWEp1') }}</span></p>
                    <p class="para-cont text-justify" style="font-size: 16px;"><span style="font-weight: bold;"><i class="fa fa-check-circle fa-bse" style="margin: 0!important; font-size: 16px;"></i> {{ __('frontend.WHYWET2') }}</span><br /><span>{{ __('frontend.WHYWEp2') }}</span></p>
                    <p class="para-cont text-justify" style="font-size: 16px;"><span style="font-weight: bold;"><i class="fa fa-check-circle fa-bse" style="margin: 0!important; font-size: 16px;"></i> {{ __('frontend.WHYWET3') }}</span><br /><span>{{ __('frontend.WHYWEp3') }}</span></p>
                    <p class="para-cont text-justify" style="font-size: 16px;"><span style="font-weight: bold;"><i class="fa fa-check-circle fa-bse" style="margin: 0!important; font-size: 16px;"></i> {{ __('frontend.WHYWET4') }}</span><br /><span>{{ __('frontend.WHYWEp4') }}</span></p>
                    <p class="para-cont text-justify" style="font-size: 16px;"><span style="font-weight: bold;"><i class="fa fa-check-circle fa-bse" style="margin: 0!important; font-size: 16px;"></i> {{ __('frontend.WHYWET5') }}</span><br /><span>{{ __('frontend.WHYWEp5') }}</span></p>
                </div>

            </div>
        </div>
    </div>
</section>
<section class="content-row-no-bg p-b-0">
    <div class="paralex-sec">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <a class="icon-box-link" href="#buy" title="Buy car">

                        <div class="icon-box buy_box_side">
                            <div class="icon-text">
                                <h3 class="title heading-font" style="color:#232628; line-height: 1.5;"><i class="fa fa-credit-card fa-bsle"></i> {{ __('frontend.WANTBUY') }}</h3>
                                <div class="content" style="line-height:17px;">
                                    <p style="line-height: 1.5;"><span style="color: #000;">{{ __('frontend.BUYSHORTDETAILS') }}</span><a href="/buy-a-car"><span style="color: #0978ad;"> ...{{ __('frontend.LEARNMORE') }}</span></a></p>
                                </div>
                            </div>
                        </div>

                    </a>
                </div>
                <div class="col-md-4">
                    <a class="icon-box-link" href="#buy" title="Sell car">
                        <div class="icon-box buy_box_center">
                            <div class="icon-text">
                                <h3 class="title heading-font" style="color:#fff; line-height: 1.5;"><i class="fa fa-money"></i> {{ __('frontend.WANTSELL') }}</h3>
                                <div class="content" style="line-height:17px;">
                                    <p style="line-height: 1.5;"><span style="color: #ffffff;">{{ __('frontend.SELLSHORTDETAILS') }}</span><a href="/sell-a-car"><span style="color: #0978ad;"> ...{{ __('frontend.LEARNMORE') }}</span></p>
                                </div>
                            </div>
                        </div>

                    </a>
                </div>
                <div class="col-md-4">
                    <a class="icon-box-link" href="#buy" title="Exchange car">

                        <div class="buy-box buy_box_side">
                            <div class="icon-text">
                                <h3 class="title heading-font" style="color:#232628; line-height: 1.5;"><i class="fa fa-exchange fa-bsle"></i> {{ __('frontend.WANTEXCHANGE') }}</h3>
                                <div class="content" style="line-height:17px;">
                                    <p style="line-height: 1.5;"><span style="color: #000;">{{ __('frontend.EXSHORTDETAILS') }}</span><a href="/exchange-a-car"><span style="color: #0978ad;"> ...{{ __('frontend.LEARNMORE') }}</span></a></p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="content-row-no-bg p-b-0">
    <div class="container">
        <div class="col-xs-12">
        <h2>{{__('frontend.CARFIND')}}</h2>
        </div>
        @if(count($dashboardCars)>0)
            @foreach($dashboardCars as $data)
            <div class="col-md-4" style=" margin-bottom: 30px;">
                    <div class="car-list-box box-sm">
                        <div class="media-box">
                            <img src="{{ asset('storage/'.$data->car_images[0]->car_image) }}" alt="{{ isset($data->car_title) ? $data->car_title : '' }}">
                        </div>
                        <div class="list-info">
                            <div class="row">
                                <div style="float: left;">
                                    <span class="badge-book m-b30"><a href="{{ route('car-details',$data->id) }}">Book Now</a></span>
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
                        <div class="car-details"><a href="{{url('car-details',$data->id)}}"><button type="button" class="btn btn-warning btn-lg btn-block">Details</button></a></div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</section>
<section class="content-row-no-bg p-b-0">
    <div class="test-section wrap-section-border wow bounceInUp" data-wow-duration="2s" style="visibility: visible; animation-duration: 2s; animation-name: bounceInUp;">
        <div class="section_mod-g section-bg section-bg_primary">
            <div class="bg-inner border-section-top border-section-top_mod-a">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <h2 class="ui-title-block ui-title-block_mod-a text-center">what customers say</h2>
                            <div class="ui-subtitle-block_mod-a">Lorem ipsum dolor sit ametelit sed do</div>
                            <div class="owl-carousel owl-theme" style="opacity: 1; display: block;">
                                <div class="owl-wrapper-outer">
                                    <div class="owl-wrapper">
                                        <div class="owl-item" >
                                            <div class="reviews">
                                                <h3 class="reviews__title">BEST CARS!</h3>
                                                <iframe src="https://www.facebook.com/plugins/post.php?href=https%3A%2F%2Fwww.facebook.com%2FkapilkarTT%2Fposts%2F3005312469796788&show_text=true&width=500" width="100%" class="ifrm-review" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
                                            </div>

                                        </div>
                                        <div class="owl-item" >
                                            <div class="reviews">
                                                <h3 class="reviews__title">affordable deals!!!</h3>

                                                    <iframe src="https://www.facebook.com/plugins/post.php?href=https%3A%2F%2Fwww.facebook.com%2Fmohammad.raselahamed.7%2Fposts%2F1585609011776855&show_text=true&width=500" width="100%" class="ifrm-review" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
                                                </div>
                                                
                                            </div>
                                        <div class="owl-item" >
                                            <div class="reviews">
                                                <h3 class="reviews__title">very much satisfied.</h3>
                                                <iframe src="https://www.facebook.com/plugins/post.php?href=https%3A%2F%2Fwww.facebook.com%2Fpermalink.php%3Fstory_fbid%3D1561745950870895%26id%3D100011065154837&show_text=true&width=500" width="100%" class="ifrm-review" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
                                        </div>
                                        </div>
                                        <div class="owl-item" >
                                            <div class="reviews">
                                                <h3 class="reviews__title">BEST CARS!</h3>
                                               <iframe src="https://www.facebook.com/plugins/post.php?href=https%3A%2F%2Fwww.facebook.com%2Fpermalink.php%3Fstory_fbid%3D3046487975639813%26id%3D100008359201998&show_text=true&width=500" width="100%" class="ifrm-review" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
                                            </div>
                                        </div>
                                        <div class="owl-item" >
                                            <div class="reviews">
                                                <h3 class="reviews__title">BEST CARS!</h3>
                                               <iframe src="https://www.facebook.com/plugins/post.php?href=https%3A%2F%2Fwww.facebook.com%2Fshowkotosman.salim%2Fposts%2F4839794459423271&show_text=true&width=500" width="100%" class="ifrm-review" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
                                            </div>
                                        </div>
                                        <div class="owl-item" >
                                            <div class="reviews">
                                                <h3 class="reviews__title">BEST CARS!</h3>
                                               <iframe src="https://www.facebook.com/plugins/post.php?href=https%3A%2F%2Fwww.facebook.com%2Fakash.gangachara%2Fposts%2F4181245341979914&show_text=true&width=500" width="100%" class="ifrm-review" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="owl-controls clickable">
                                    <div class="owl-pagination">
                                        <div class="owl-page active"><span class=""></span></div>
                                        <div class="owl-page"><span class=""></span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="border-section-bottom"></div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="content-row-no-bg p-b-0" style=" overflow: hidden;">
    <div class="row">
        <div class="container">
            <div class="col-sm-6">
                <h3>Frequently Asked Questions (FAQ)</h3>
                <div class="panel-group" id="accordion">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title"> <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne"> <span class="glyphicon glyphicon-minus"></span> My Collapsable item #1 </a> </h4>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse in">
                            <div class="panel-body"> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title"> <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"> <span class="glyphicon glyphicon-plus"></span> My Collapsable item #2 </a> </h4>
                        </div>
                        <div id="collapseTwo" class="panel-collapse collapse">
                            <div class="panel-body"> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title"> <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseThree"> <span class="glyphicon glyphicon-plus"></span> My Collapsable item #3 </a> </h4>
                        </div>
                        <div id="collapseThree" class="panel-collapse collapse">
                            <div class="panel-body"> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-md-6">
                <h3>Contact Us</h3>
                <formmethod="POST" action="/contact">

                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="Name">Name: </label>
                        <input type="text" class="form-control" id="name" placeholder="Name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email: </label>
                        <input type="text" class="form-control" id="email" placeholder="Email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="Phone Number">Email: </label>
                        <input type="text" class="form-control" id="phone" placeholder="Phone Number" name="phone" required>
                    </div>
                    <div class="form-group">
                        <label for="message">Message: </label>
                        <textarea type="text" class="form-control" id="message" placeholder="Enter your message here" name="message" required> </textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-lg btn-block" value="Send">Send</button>
                    </div>

                    </form>
            </div>
        </div>
    </div>
</section>
<section class="content-row-no-bg p-b-0" style="padding-bottom: 0; padding-top: 0;">
    <div class="wrap-section-border wow bounceInUp" data-wow-duration="2s" style="visibility: visible; animation-duration: 2s; animation-name: bounceInUp;">
        <div class="section_mod-c section-bg section-bg_second">
            <div class="bg-inner border-section-top border-section-top_mod-b">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <h2 class="ui-title-block ui-title-block_mod-a text-center">Real Facts</h2>
                            <div class="ui-subtitle-block_mod-a">we have some superb facts here</div>
                            <script src="assets/plugins/rendro-easy-pie-chart/dist/jquery.easypiechart.min.js"></script>
                            <ul class="list-progress list-unstyled">
                                <li class="list-progress__item"> <i class="icon flaticon-transport391"></i>
                                    <div class="list-progress__inner"> <span class="chart" data-percent="900"><span class="percent">900</span>+<canvas height="0" width="0"></canvas></span> <span class="list-progress__name">COUNTRIES REACHED</span> </div>
                                </li>
                                <li class="list-progress__item"> <i class="icon flaticon-automobile8"></i>
                                    <div class="list-progress__inner"> <span class="chart" data-percent="10000"><span class="percent">10000</span>+<canvas height="0" width="0"></canvas></span> <span class="list-progress__name">PASSED GRADUATES</span> </div>
                                </li>
                                <li class="list-progress__item"> <i class="icon flaticon-bus6"></i>
                                    <div class="list-progress__inner"> <span class="chart" data-percent="120"><span class="percent">120</span>+<canvas height="0" width="0"></canvas></span> <span class="list-progress__name">QUALIFIED STAFF</span> </div>
                                </li>
                            </ul>
                            <!-- end list-progress --> 
                        </div>
                        <!-- end col --> 
                    </div>
                    <!-- end row -->
                    <div class="border-section-bottom"></div>
                </div>
                <!-- end container --> 
            </div>
            <!-- end bg-inner --> 
        </div>
        <!-- end section_mod-b --> 
    </div>
</section>
<section class="content-row-no-bg p-b-0" style="padding-top:0!important; margin-bottom: -30px;">
    <!--Google map-->
    <div id="map-container-google-1" class="z-depth-1-half map-container">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3648.447543218603!2d90.37358701464545!3d23.873743784528727!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c5ed0832656f%3A0xefac156498e13b68!2sS%20Islam%20Cars!5e0!3m2!1sen!2sbd!4v1644868285341!5m2!1sen!2sbd" frameborder="0"
                style="border:0; height: 400px;" allowfullscreen></iframe>
    </div>

    <!--Google Maps-->
</section>

@endif

<style>
    .ifrm-review{
        height: 300px;
        
    }
    .badge-book{ 
        padding: 0.35em 0.65em;
        font-size: 0.75em;
        font-weight: 700;
        line-height: 1;
        color: #fff;
        text-align: center;
        white-space: nowrap;
        vertical-align: baseline;
        border-radius: 0.25rem;
        position: absolute;
        top: -25px;
        background-color: #0b1b38;
        padding: 10px 16px;
        font-size: 18px;
        border-radius: 30px;
        font-weight: 500;
        border: 1px #fff solid;
    }
    .badge-book a{
        color: #fff;
    }
    .car-list-box.box-sm .list-info .badge{
        right: 5px!important;
    }
    .section_mod-g:after {
        background-image: url(/uploads/frontend/7.jpeg);
    }
    .section-bg:after {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-size: cover;
        opacity: 0.1;
        content: '';
    }
    .section-bg_primary{
        background-color: #fdb700;
    }
    .section-bg_second{
        background-color: #0b1b38;
    }
    .section-bg .bg-inner {
        padding-top: 60px;
        padding-bottom: 30px;
    }
    .border-section-top_mod-a:before, .border-section-top_mod-a:after {
        background-color: #0b1b38;
    }
    .border-section-top:before {
        left: -70px;
        box-shadow: 4px 1px 0 2px #f5f5f5;
        transform: skew(-58deg, 10deg);
    }
    .border-section-top:before, .border-section-top:after {
        position: absolute;
        top: -16px;
        width: 170px;
        height: 80px;
        content: '';
    }
    .border-section-top:after {
        right: -70px;
        box-shadow: -4px 1px 0 2px #f5f5f5;
        transform: skew(58deg, -10deg);
    }
    .test-section{
        margin-top: 40px;
    }
    .reviews {
        position: relative;
        margin-right: 15px;
        margin-left: 15px;
        padding-top: 25px;
        padding-bottom: 38px;
        background-color: #fff;
        overflow: hidden;
        transition: all 0.3s;
    }
    .reviews__text {
        padding: 11px 15px 21px 45px;
    }
    .reviews__img {
        float: left;
        width: 55px;
        height: 55px;
        margin-left: 44px;
        border-radius: 50%;
        overflow: hidden;
    }
    .reviews__title {
        margin-top: 14px;
        margin-bottom: 13px;
        padding-top: 4px;
        padding-bottom: 4px;
        padding-left: 40px;
        font-family: Raleway;
        font-size: 16px;
        font-weight: 700;
        color: #222;
        border-left: 4px solid #999;
        transition: all 0.3s;
        text-align: left;
        text-transform: uppercase;
    }
    .owl-theme_mod-a .owl-controls {
        text-align: center;
        top: -120px;
        right: 0;
    }
    .owl-theme .owl-controls {
        position: absolute;
    }

    .owl-theme .owl-controls .owl-page {
        display: inline-block;
        zoom: 1;
        padding-left: 3px;
        padding-right: 3px;
        display: inline;
    }
    .owl-theme .owl-controls .owl-page span {
        display: block;
        width: 8px;
        height: 8px;
        margin: 5px 3px;
        border: 1px solid #eeeeee;
        transition: all .3s;
        transform: rotate(45deg);
    }
    .owl-theme .owl-controls .owl-page.active span, .owl-theme .owl-controls.clickable .owl-page:hover span {
        background-color: #fff;
        border-color: #eee;
    }
    .owl-carousel .owl-wrapper-outer{
        width: 100%;
    }
    .owl-carousel .owl-wrapper:after {
        content: ".";
        display: block;
        clear: both;
        visibility: hidden;
        line-height: 0;
        height: 0;
    }
    .wrap-section-border{
        padding-top: 30px;
        overflow: hidden;
    }
    /*#main-slider:before {
        left: 0;
        transform: skewY(4.5deg);
    }
    #main-slider:before, #main-slider:after {
        position: absolute;
        bottom: -3vw;
        width: 50%;
        height: 8vw;
        background-color: #fff;
        z-index: 101;
        content: '';
    }
    #main-slider:after {
        right: 0;
        transform: skewY(-4.5deg);
    }*/
    /*    .accordion_one .panel-group {
            border: 1px solid #f1f1f1;
        }
    
        a:link {
            text-decoration: none
        }
    
        .accordion_one .panel {
            background-color: transparent;
            box-shadow: none;
            border-bottom: 0px solid transparent;
            border-radius: 0;
            margin: 0
        }
    
        .accordion_one .panel-default {
            border: 0
        }
    
        .accordion-wrap .panel-heading {
            padding: 0px;
            border-radius: 0px
        }
    
        h4 {
            font-size: 18px;
            line-height: 24px
        }
    
        .accordion_one .panel .panel-heading a.collapsed {
            color: #999999;
            display: block;
            padding: 12px 30px;
            border-top: 0px
        }
    
        .accordion_one .panel .panel-heading a {
            display: block;
            padding: 12px 30px;
            background: #fff;
            color: #000;
        }
    
        .accordion-wrap .panel .panel-heading a {
            font-size: 14px
        }
    
        .accordion_one .panel-group .panel-heading+.panel-collapse>.panel-body {
            border-top: 0;
            padding-top: 0;
            padding: 25px 30px 30px 35px;
            background: #0b1b38;
            color: #fff;
        }
    
        .img-accordion {
            width: 81px;
            float: left;
            margin-right: 15px;
            display: block
        }
    
        .accordion_one .panel .panel-heading a.collapsed:after {
            content: "\2b";
            color: #f1f1f1;
            background: #fdb700;
        }
    
        .accordion_one .panel .panel-heading a:after,
        .accordion_one .panel .panel-heading a.collapsed:after {
            font-family: 'FontAwesome';
            font-size: 15px;
            width: 36px;
            line-height: 48px;
            text-align: center;
            background: #fdb700;
            float: left;
            margin-left: -31px;
            margin-top: -12px;
            margin-right: 15px
        }
    
        .accordion_one .panel .panel-heading a:after {
            content: "\2212"
        }
        .panel-default > .panel-heading{
            background-color: #0b1b38;
        }
        .panel-heading{
            padding: 2px;
        }
        .accordion_one .panel .panel-heading a:after{
            color: #fff;
        }*/
    .accordion-toggle:hover {
        text-decoration: none
    }
    .glyphicon-plus:before, .glyphicon-minus:before {
        font-size: 18px;
        font-weight: bold;
    }

    .panel-default>.panel-heading {
        color: #fff;
        background-color: #0b1b38;;
        border-color:#0b1b38;
    }
    .panel-title > a:hover, .panel-title > a:focus{
        color: #fdb700;
    }
    #contactus {
        /*        background: #F9F9F9;
                padding: 25px;
                box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24)*/
    }

    /*    #contactus h3 {
            display: block;
            font-size: 30px;
            font-weight: 300;
            margin-bottom: 10px
        }*/

    #contactus h4 {
        margin: 5px 0 15px;
        display: block;
        font-size: 13px;
        font-weight: 400
    }

    #contactus input[type="text"],
    #contactus input[type="email"],
    #contactus input[type="tel"],
    #contactus input[type="url"],
    #contactus textarea {
        width: 100%;
        border: 1px solid #ccc;
        background: #FFF;
        margin: 0 0 5px;
        padding: 10px
    }

    #contactus input[type="text"]:hover,
    #contactus input[type="email"]:hover,
    #contactus input[type="tel"]:hover,
    #contactus input[type="url"]:hover,
    #contactus textarea:hover {
        -webkit-transition: border-color 0.3s ease-in-out;
        -moz-transition: border-color 0.3s ease-in-out;
        transition: border-color 0.3s ease-in-out;
        border: 1px solid #aaa
    }

    #contactus textarea {
        height: 100px;
        max-width: 100%;
        resize: none
    }

    #contactus button[type="submit"] {
        cursor: pointer;
        width: 100%;
        border: none;
        background: #0b1b38;
        color: #FFF;
        margin: 0 0 5px;
        padding: 10px;
        font-size: 15px
    }

    #contactus button[type="submit"]:hover {
        background: #333;
        -webkit-transition: background 0.3s ease-in-out;
        -moz-transition: background 0.3s ease-in-out;
        transition: background-color 0.3s ease-in-out
    }

    #contactus button[type="submit"]:active {
        box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.5)
    }

    #contactus input:focus,
    #contactus textarea:focus {
        outline: 0;
        border: 1px solid #aaa
    }

    ::-webkit-input-placeholder {
        color: #888
    }

    :-moz-placeholder {
        color: #888
    }

    ::-moz-placeholder {
        color: #888
    }

    :-ms-input-placeholder {
        color: #888
    }

    .section_mod-c:after {
        background-image: url(/uploads/frontend/3car.jpeg);
    }
    .border-section-top_mod-b:before, .border-section-top_mod-b:after{
        background-color: #fdb700;
    }
    .ui-title-block_mod-a {
        color: #fff;
    }
    .ui-subtitle-block_mod-a {
        font-size: 16px;
        font-weight: 400;
        color: rgba(255, 255, 255, 0.7);
        text-align: center;
        letter-spacing: 0.1em;
        text-transform: uppercase;
    }
    .list-progress {
        margin-top: 52px;
        margin-bottom: 150px;
        text-align: center;
    }
    .list-progress__item {
        position: relative;
        display: inline-block;
        margin-right: 7px;
        margin-left: 7px;
        padding: 20px 0 0;
        vertical-align: top;
        background-repeat: no-repeat;
        background-position: 0 0;
        background-size: contain;
    }
    .list-progress__item:nth-child(1) {
        width: 350px;
        height: 122px;
        background-image: 'https://pro-theme.com/html/autozone/assets/media/figure/figure-1.svg';
    }
    .section-bg {
        position: relative;
    }
    .list-progress__item:nth-child(1) .icon {
        font-size: 78px;
    }
    .list-progress .icon{
        color: #fdb700;
    }
    .list-progress .icon {
        display: inline-block;
        margin-right: 22px;
        line-height: 1;
    }
    .flaticon-transport391:before {
        content: "\e009";
    }
    .list-progress__inner {
        display: inline-block;
        text-align: left;
    }
    .list-progress .chart {
        font-size: 34px;
        font-weight: 700;
        color: #fff;
    }
    .list-progress__name {
        display: block;
        font-family: Raleway;
        font-size: 15px;
        font-weight: 600;
        color: #999;
    }

    .map-container{
        margin: 0;
        padding-bottom: 25%;
    }
    .map-container iframe{
        top: unset;
        bottom: 0;
    }

</style>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script type="text/javascript">
jQuery(document).ready(function ($) {
    jQuery(".owl-wrapper").owlCarousel({
        loop: true,
        margin: 10,
        responsiveClass: true,
        autoplay: true,
        autoplayTimeout: 5000,
        autoplaySpeed: 5000,
        dots: true,
        merge: true,
        mouseDrag: true,
        touchDrag: true,
        responsive: {
            0: {
                items: 1,
            },
            600: {
                items: 2,
            },
            1000: {
                items: 3,
            }
        }
    })
});
$(document).ready(function () {

    $('.collapse').on('shown.bs.collapse', function () {
        $(this).parent().find(".glyphicon-plus").removeClass("glyphicon-plus").addClass("glyphicon-minus");
    }).on('hidden.bs.collapse', function () {
        $(this).parent().find(".glyphicon-minus").removeClass("glyphicon-minus").addClass("glyphicon-plus");
    });
});
</script>
@endsection
