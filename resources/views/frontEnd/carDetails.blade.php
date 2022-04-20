@extends('frontEnd.layout')
<!-- Fotorama from CDNJS, 19 KB -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.js"></script>
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
                <h2 class="ui-title-page">vehicle listings</h2>
                <div class="decor-1 center-block"></div>
            </div><!-- end bg-inner -->
        </div><!-- end block-title__inner -->
    </div>

    <div class="container">
        <div class="col-md-12">
            <h1>{{ $carDetails->car_title }}</h1>
        </div>
        <div class="col-md-8">
            <div class="fotorama" data-nav="thumbs" data-allowfullscreen="true" data-transition="slide"
                data-loop="true">
                <?php
                    foreach($carDetails->car_images as $row){
                ?>
                <a href="{{ asset('files/' . $row->car_image) }}"><img src="{{ asset('files/' . $row->car_image) }}"></a>
                <?php
                    }
                ?>
            </div>

            <div class="tabdesc">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item active">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                            aria-controls="home" aria-selected="true">Description</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                            aria-controls="profile" aria-selected="false">Video</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade active in" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <h3>Price: Tk. {{ isset($carDetails->price) ? number_format($carDetails->price, 2) : '-' }}</h3>
                        <p><?php echo nl2br($carDetails->car_details); ?></p>
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab"
                        style="text-align: center;">
                        <iframe width="560" height="315" src="{{ $carDetails->video_url }}" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen></iframe>
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
                            <span>Body
                                Style</span>{{ isset($carDetails->bodytype->name) ? $carDetails->bodytype->name : '-' }}
                        </li>
                        <li>
                            <span>Manufacturing
                                Year</span>{{ isset($carDetails->menufacturing_year) ? $carDetails->menufacturing_year : '-' }}
                        </li>
                        <li>
                            <span>Registration
                                Year</span>{{ isset($carDetails->registration_year) ? $carDetails->registration_year : '-' }}
                        </li>
                        <li>
                            <span>Condition</span>{{ isset($carDetails->condition->name) ? $carDetails->condition->name : '-' }}
                        </li>
                        <li>
                            <span>Mileage</span>{{ isset($carDetails->milage) ? $carDetails->milage . ' km' : '-' }}
                        </li>
                        <li>
                            <span>Exterior
                                Color</span>{{ isset($carDetails->car_exterior_color->name) ? $carDetails->car_exterior_color->name : '-' }}
                        </li>
                        <li>
                            <span>Transmission</span>{{ isset($carDetails->car_transmission->name) ? $carDetails->car_transmission->name : '-' }}
                        </li>
                        <li>
                            <span>Engine
                                Capacity</span>{{ isset($carDetails->engine_capacity) ? $carDetails->engine_capacity . ' cc' : '-' }}
                        </li>
                        <!--<li>-->
                        <!--    <span>No. of Gears:</span>-->
                        <!--</li>-->
                        @php
                            $data_array = [];
                            if (!empty($carDetails->seller_fuel_types)) {
                                foreach ($carDetails->seller_fuel_types as $row) {
                                    $data_array[] = $row->fuel_type_name['name'];
                                }
                            }
                            
                            $fules = implode(', ', $data_array);
                            //dd($fules)
                        @endphp
                        <li>
                            <span>Fuel Type</span>{{ isset($carDetails->seller_fuel_types) ? $fules : '-' }}
                        </li>
                    </ul>
                    <div class="car-details">
                        <form action="{{ url('car-book') }}" method="post">
                            @csrf
                            <input type="hidden" name="CustomerID" value="{{ isset($CustomerID) ? $CustomerID : null }}">
                            <input type="hidden" name="CarID"
                                value="{{ isset($carDetails->id) ? $carDetails->id : null }}">

                            <button type="submit" class="btn btn-warning btn-lg btn-block">Book Now</button>

                        </form>

                    </div>
                </div>
            </div>
            <div class="social-share">
                <ul class="social-network share">
                    <li><a href="{{ Helper::SocialShare('facebook', $PageTitle) }}" class="facebook"
                            data-placement="top" title="Facebook" target="_blank"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="{{ Helper::SocialShare('twitter', $PageTitle) }}" class="twitter"
                            data-placement="top" title="Twitter" target="_blank"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="{{ Helper::SocialShare('google', $PageTitle) }}" class="google"
                            data-placement="top" title="Google+" target="_blank"><i class="fa fa-google-plus"></i></a></li>
                    <li><a href="{{ Helper::SocialShare('linkedin', $PageTitle) }}" class="linkedin"
                            data-placement="top" title="linkedin" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                    <li><a href="{{ Helper::SocialShare('tumblr', $PageTitle) }}" class="tumblr" data-plac
                            ement="top" title="Tumblr" target="_blank"><i class="fa fa-tumblr"></i></a></li>
                </ul>
            </div>
        </div>
        <div class="clear"></div>

        <?php if(isset($same_car) && !empty($same_car)):?>
        <div class="col-md-12">
            <h2>Similar Car</h2>
            <div class="owl-carousel owl-theme" style="opacity: 1; display: block;">
                <div class="owl-wrapper-outer">
                    <div class="owl-wrapper">
                        <?php foreach ($same_car as $row):?>
                        <?php if(count($row->car_images) > 0):?>
                        <div class="owl-item">
                            <?php foreach ($row->car_images as $data):?>
                            <a href="{{ url('car-details', $row->id) }}">
                                <img src="{{ asset('files/' . $data->car_image) }}" alt="">

                                <?php if ($data->car_image):
                                    break;
                                endif;
                                ?>

                                <?php endforeach;?>
                                <h4>{{ isset($row->car_title) ? $row->car_title : '' }}</h4>
                                <p><strong>Tk. {{ number_format($row->price, 2) }}</strong></p>
                                <p>{{ $row->milage }} Km</p>
                                <p>{{ $row->menufacturing_year }} / {{ $row->registration_year }}</p>
                            </a>
                        </div>
                        <?php endif;?>
                        <?php endforeach;?>
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
        <?php endif;?>
    </div>
    </div>
    <style>
        .social-share {
            text-align: center;
        }

        .img-thmb {
            margin-right: 15px;
            border: 2px #333 solid;
        }

        .img-thmb-border {
            border: 2px #333 solid;
        }

        .section-bg .bg-inner {
            padding: 120px auto;
        }

        .tabdesc {
            margin-bottom: 50px;
            margin-top: 30px;
        }

    </style>
    <script language="javascript">
        jQuery(document).ready(function($) {
            jQuery(".owl-wrapper").owlCarousel({
                loop: true,
                margin: 20,
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
                        items: 3,
                    },
                    1000: {
                        items: 4,
                    }
                }
            })
        });
        jQuery(document).ready(function() {
            jQuery('.img-thmb').css('cursor', 'pointer');
        });

        function loadPhoto(pid) {
            $(".img-featr").attr("src", pid);
            $('.img-thmb').css('cursor', 'pointer');
        }
    </script>
@endsection
