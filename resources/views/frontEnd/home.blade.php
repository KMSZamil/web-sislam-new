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
<section class="content-row-no-bg p-b-0 get-client-sec">
    <div class="container">
        <div class="flex-form">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link" href="#tab-buy-mob" data-toggle="tab"><i class="fa fa-credit-card fa-bsle"></i><br/>{{ __('frontend.BUY') }}</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="#tab-sel-mob" data-toggle="tab"><i class="fa fa-money fa-bsle"></i><br/>{{ __('frontend.SELL') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#tab-exc-mob" data-toggle="tab"><i class="fa fa-exchange fa-bsle"></i><br/>{{ __('frontend.EXCHANGE') }}</a>
                </li>
            </ul>
            @include('frontEnd.includes.buyformmob')
            @include('frontEnd.includes.sellformmob')
            @include('frontEnd.includes.exchangeformmob')

        </div>
    </div>
</section>
<section class="content-row-no-bg p-b-0">
    <div class="container">
        <div class="home-sec row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <h1 class="text-center">{{ __('frontend.HOMETITLE') }}</h1>
            </div>
            <div class="col-md-2"></div>
            <div class="col-md-6"><p class="para-cont text-justify" style="font-size: 16px; margin-top: 15px; ">{{ __('frontend.HOME1') }}</p></div>
            <div class="col-md-6">
                <img src="/uploads/frontend/s_islam_cars.jpg" style="max-width: 100%; margin: 0 auto;" alt="Showroom">
            </div>
        </div>
    </div>
</section>
<section class="content-row-no-bg p-b-0">
    <div class="container">
        <div class="why-we row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <h2 class="text-center">{{ __('frontend.WHYWETITLE') }}</h2>
            </div>
            <div class="col-md-2"></div>
            <div class="col-md-6">
                <img src="/uploads/frontend/why_we_diff.jpg" style="max-width: 100%; margin: 0 auto;" alt="Why we are different">
            </div>
            <div class="col-md-6">
                <p class="para-cont" style="font-size: 16px;"><span style="font-weight: bold;"><i class="fa fa-check-circle fa-bse" style="margin: 0!important; font-size: 16px;"></i> {{ __('frontend.WHYWET1') }}</span><br /><span>{{ __('frontend.WHYWEp1') }}</span></p>
                <p class="para-cont" style="font-size: 16px;"><span style="font-weight: bold;"><i class="fa fa-check-circle fa-bse" style="margin: 0!important; font-size: 16px;"></i> {{ __('frontend.WHYWET2') }}</span><br /><span>{{ __('frontend.WHYWEp2') }}</span></p>
                <p class="para-cont" style="font-size: 16px;"><span style="font-weight: bold;"><i class="fa fa-check-circle fa-bse" style="margin: 0!important; font-size: 16px;"></i> {{ __('frontend.WHYWET3') }}</span><br /><span>{{ __('frontend.WHYWEp3') }}</span></p>
                <p class="para-cont" style="font-size: 16px;"><span style="font-weight: bold;"><i class="fa fa-check-circle fa-bse" style="margin: 0!important; font-size: 16px;"></i> {{ __('frontend.WHYWET4') }}</span><br /><span>{{ __('frontend.WHYWEp4') }}</span></p>
                <p class="para-cont" style="font-size: 16px;"><span style="font-weight: bold;"><i class="fa fa-check-circle fa-bse" style="margin: 0!important; font-size: 16px;"></i> {{ __('frontend.WHYWET5') }}</span><br /><span>{{ __('frontend.WHYWEp5') }}</span></p>
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
            <h2>{{__('frontend.CARFIND')}}</h2>
<?php            
        //dd(count($dashboardCars));
        if(count($dashboardCars)>0):
        $i=0;
        foreach($dashboardCars as $data):
        $i++;
        if($i > 9):
        break;
        endif;
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
                                    <span class="badge-book m-b30"><a href="{{ url('car-book',$data->id) }}">Book Now</a></span>
                                    {{-- <form action="{{ url('car-book',$data->id) }}" method="post">
                                        {{-- @csrf
                                        <input type="hidden" name="CustomerID" id="CustomerID" value="{{ isset($CustomerID) ? $CustomerID : null }}">
                                        <input type="hidden" name="CarID"  id="CarID" value="{{ isset($carDetails->id) ? $carDetails->id : null }}">
                                        <a class="btnSubmit">Book Now</a> 
                                    </form> --}}
                                
                            </div>
                            <div style="float: right;">
                                <span class="badge m-b30">Tk. {{ number_format($data->price, 2) }}</span>
                            </div>
                        </div>
                        

                        <h5 class="title mb-0"><a href="{{ route('car-details',$data->id) }}">{{ isset($data->car_title) ? $data->car_title : '' }}</a></h5>
                        <div class="col-xs-4"><div class="row"><img src="/uploads/frontend/icon/road.png" width="14" alt="Road"> {{ isset( $data->milage) ?  $data->milage.' km' : ''  }}</div></div>
                        <div class="col-xs-4"><div class="row"><img src="/uploads/frontend/icon/gear.png" width="14" alt="Gear"> {{ isset($data->car_transmission->name) ? $data->car_transmission->name : '' }}</div></div>
                        <div class="col-xs-4"><div class="row"><img src="/uploads/frontend/icon/calendar.png" width="14" alt="Calender"> {{ isset($data->menufacturing_year) ? $data->menufacturing_year : '' }}</div></div>
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
                        <div class="col-xs-4"><div class="row" style="font-size: 12px"><img src="/uploads/frontend/icon/fuel.png" width="14" alt="Fuel"> {{ isset($data->seller_fuel_types) ? $fules : '' }}</div></div>
                        <div class="col-xs-4"><div class="row"><img src="/uploads/frontend/icon/car-body.png" width="14" alt="Car Body"> {{ isset($data->bodytype->name) ? $data->bodytype->name : '' }}</div></div>
                        <div class="col-xs-4"><div class="row"><img src="/uploads/frontend/icon/car-colours.png" width="14" alt="Car Colors"> {{ isset($data->car_exterior_color->name) ? $data->car_exterior_color->name : '' }}</div></div>
                        <div class="col-xs-4"><div class="row"><img src="/uploads/frontend/icon/car-engine-cc.png" width="14" alt="Car Engine"> {{ isset($data->engine_capacity) ? $data->engine_capacity.' CC' : '' }}</div></div>
                        <div class="col-xs-4"><div class="row"><img src="/uploads/frontend/icon/4wd-drive.png" width="14" alt="4wd Drive"> {{ isset($data->car_drive_type->name) ? $data->car_drive_type->name : '' }}</div></div>
                        <div class="col-xs-4"><div class="row"><img src="/uploads/frontend/icon/car-seat-si.png" width="14" alt="Car Seat SI"> {{ isset($data->seats) ? $data->seats : '' }}</div></div>
                    </div>
                    <div class="clear"></div>
                    <div class="car-details"><a href="{{url('car-details',$data->id)}}"><button type="button" class="btn btn-warning btn-lg btn-block">Details</button></a></div>
                </div>
            </div>
        @else
            @continue;
        @endif

        <?php 
        endforeach;
         endif;
         ?>
        <div class="col-md-12 text-center">
            <a href="{{url('buy-a-car')}}"><button type="button" class="btn btn-warning btn-lg">View More Cars</button></a>
        </div>
    </div>
</section>
<section class="content-row-no-bg p-b-0" style="padding-top: 0;">
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
                            <h4 class="panel-title"> <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne"> <span class="glyphicon glyphicon-minus"></span> {{__('frontend.FAQ1')}} </a> </h4>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse in">
                            <div class="panel-body"> {{__('frontend.ANS1')}}</div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title"> <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"> <span class="glyphicon glyphicon-plus"></span> {{__('frontend.FAQ2')}} </a> </h4>
                        </div>
                        <div id="collapseTwo" class="panel-collapse collapse">
                            <div class="panel-body"> {{__('frontend.ANS2')}} </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title"> <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseThree"> <span class="glyphicon glyphicon-plus"></span> {{__('frontend.FAQ3')}} </a> </h4>
                        </div>
                        <div id="collapseThree" class="panel-collapse collapse">
                            <div class="panel-body"> {!!__("frontend.ANS3")!!} </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-md-6">
                <h3>Contact Us</h3>
                <form method="POST" action="/contact">

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
                            {{-- <script src="assets/plugins/rendro-easy-pie-chart/dist/jquery.easypiechart.min.js"></script> --}}
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
