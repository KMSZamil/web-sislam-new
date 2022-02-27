@extends('frontEnd.layout')
<!-- Fotorama from CDNJS, 19 KB -->
<link  href="https://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.js"></script>
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
            <h2 class="ui-title-page">vehicle listings</h2>
            <div class="decor-1 center-block"></div>
        </div><!-- end bg-inner -->
    </div><!-- end block-title__inner -->
</div>

<div class="container">
    <div class="col-md-12">
    <h1>{{$carDetails->car_title}}</h1>
    </div>
    <div class="col-md-8">
        <div class="fotorama" data-nav="thumbs" data-allowfullscreen="true" data-transition="slide" data-loop="true">
             @php
            foreach($carDetails->car_images as $row){
            @endphp
            <a href="{{ asset('uploads/car_images/full/'.$row->car_image) }}"><img src="{{ asset('uploads/car_images/full/'.$row->car_image) }}"></a>
            @php
            }
            @endphp
        </div>
       
        <div class="tabdesc">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item active">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Description</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Video</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade active in" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <h3>Price: Tk. {{ isset($carDetails->price) ? number_format($carDetails->price, 2) : '-' }}</h3>
                    <p><?php echo nl2br($carDetails->car_details) ?></p>
                    </div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab" style="text-align: center;">
                    <iframe width="560" height="315" src="{{$carDetails->video_url}}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>

            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="sidebar-right">
            <div class="car-details-book">
                <h3 class="sidebar-title">Booking This Car</h3>
                <ul>
                    <li style="font-weight: bold;">
                        <span><strong>Price</strong></span>{{ isset($carDetails->price) ? number_format($carDetails->price, 2) : '-' }}
                    </li>
                    <li>
                        <span>Make</span>{{ isset($carDetails->car_brand->name) ? $carDetails->car_brand->name : '-' }}
                    </li>
                    <li>
                        <span>Model</span>{{ isset($carDetails->model->name) ? $carDetails->model->name : '-' }}
                    </li>
                    <li>
                        <span>Body Style</span>{{ isset($carDetails->bodytype->name) ? $carDetails->bodytype->name : '' }}
                    </li>
                    <li>
                        <span>Manufacturing Year</span>{{ isset($carDetails->menufacturing_year) ? $carDetails->menufacturing_year : '' }}
                    </li>
                    <li>
                        <span>Registration Year</span>{{ isset($carDetails->registration_year) ? $carDetails->registration_year : '' }}
                    </li>
                    <li>
                        <span>Condition</span>{{ isset($carDetails->condition->name) ? $carDetails->condition->name : '-' }}
                    </li>
                    <li>
                        <span>Mileage</span>{{ isset($carDetails->milage) ? $carDetails->milage.' km' : '-' }}
                    </li>
                    <li>
                        <span>Exterior Color</span>{{ isset($carDetails->car_exterior_color->name) ? $carDetails->car_exterior_color->name : '-' }}
                    </li>
                    <li>
                        <span>Transmission</span>{{ isset($carDetails->car_transmission->name) ? $carDetails->car_transmission->name : '-' }}
                    </li>
                    <li>
                        <span>Engine Capacity</span>{{ isset($carDetails->engine_capacity) ? $carDetails->engine_capacity . ' cc' : '-' }}
                    </li>
                    <!--<li>-->
                    <!--    <span>No. of Gears:</span>-->
                    <!--</li>-->
                    <li>
                        <span>Fuel Type</span>{{ isset($carDetails->fuel_type) ? $carDetails->fuel_type : '-' }}
                    </li>
                </ul>
                <div class="car-details"><a href="{{ route('buyBasic',$carDetails->id)}}"><button type="button" class="btn btn-warning btn-lg btn-block">Book Now</button></a></div>
            </div>
        </div>
        <div class="social-share">
            <ul class="social-network share">
                <li><a href="{{ Helper::SocialShare("facebook", $PageTitle)}}" class="facebook"
                       data-placement="top"
                       title="Facebook" target="_blank"><i class="fa fa-facebook"></i></a></li>
                <li><a href="{{ Helper::SocialShare("twitter", $PageTitle)}}" class="twitter"
                       data-placement="top" title="Twitter"
                       target="_blank"><i
                            class="fa fa-twitter"></i></a></li>
                <li><a href="{{ Helper::SocialShare("google", $PageTitle)}}" class="google"
                       data-placement="top"
                       title="Google+"
                       target="_blank"><i
                            class="fa fa-google-plus"></i></a></li>
                <li><a href="{{ Helper::SocialShare("linkedin", $PageTitle)}}" class="linkedin"
                       data-placement="top" title="linkedin"
                       target="_blank"><i
                            class="fa fa-linkedin"></i></a></li>
                <li><a href="{{ Helper::SocialShare("tumblr", $PageTitle)}}" class="tumblr" data-plac ement="top" title="Tumblr"
                       target="_blank"><i
                            class="fa fa-tumblr"></i></a></li>
            </ul>
        </div>
    </div>
</div>
<style>
    .social-share{
        text-align: center;
    }
    .img-thmb{
        margin-right: 15px;
        border: 2px #333 solid;
    }
    .img-thmb-border{
        border: 2px #333 solid;
    }

    .section-bg .bg-inner{
        padding: 120px auto;
    }
    .tabdesc{
        margin-bottom: 50px;
        margin-top: 30px;
    }
</style>
<script language="javascript">
    jQuery( document ).ready(function() {
    jQuery('.img-thmb').css('cursor', 'pointer');
});
    function loadPhoto(pid) {
    $(".img-featr").attr("src", pid);
    $('.img-thmb').css('cursor', 'pointer');
    }
</script>
@endsection

