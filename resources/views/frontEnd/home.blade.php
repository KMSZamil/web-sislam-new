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
        <div class="row">
            <div class="col-md-12">
                <div class="row" style="margin-bottom: 0;">
                    <h2 class="text-center">What does S Islam Cars offer?</h2>
                    <div class="col-md-4">
                        <div class="box">
                            <div class="box-gray aligncenter">
                                <div class="icon">
                                    <i class="fa fa-credit-card fa-3x"></i>
                                </div>
                                <h4>Buy Your Dream Car</h4>
                                <p>Hassle-free and easy way instantly sell, buy or exchange your car at any time in Bangladesh with S Islam Cars
                                    Hassle-free and easy way instantly sell, buy or exchange your car at any time in Bangladesh with S Islam Cars</p>
                            </div>
                            <div class="box-bottom">
                                <a href="{!! $TextBanner->link_url !!}">{{ __('frontend.moreDetails') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="box">
                            <div class="box-gray aligncenter">
                                <div class="icon">
                                    <i class="fa fa-credit-card fa-3x"></i>
                                </div>
                                <h4>Buy Your Dream Car</h4>
                                <p>Hassle-free and easy way instantly sell, buy or exchange your car at any time in Bangladesh with S Islam Cars
                                    Hassle-free and easy way instantly sell, buy or exchange your car at any time in Bangladesh with S Islam Cars</p>
                            </div>
                            <div class="box-bottom">
                                <a href="{!! $TextBanner->link_url !!}">{{ __('frontend.moreDetails') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="box">
                            <div class="box-gray aligncenter">
                                <div class="icon">
                                    <i class="fa fa-credit-card fa-3x"></i>
                                </div>
                                <h4>Buy Your Dream Car</h4>
                                <p>Hassle-free and easy way instantly sell, buy or exchange your car at any time in Bangladesh with S Islam Cars
                                    Hassle-free and easy way instantly sell, buy or exchange your car at any time in Bangladesh with S Islam Cars</p>
                            </div>
                            <div class="box-bottom">
                                <a href="{!! $TextBanner->link_url !!}">{{ __('frontend.moreDetails') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">
                <h2 class="text-center">Sell Your Car in 3 Easy Steps</h2>
                <img src="/uploads/frontend/sell_step.png" style="max-width: 100%; margin: 0 auto;">
                
            </div>
        </div>
    </div>
</section>
@endif

@endsection
