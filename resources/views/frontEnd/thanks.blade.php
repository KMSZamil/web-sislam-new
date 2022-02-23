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
            <h1 class="ui-title-page">{{ __('frontend.CARRECIVED') }}</h1>
        </div>        
    </div>
</div>

<div class="container page-content">
    <div class="cont-title" style="margin-right: 50px;">
        <p style="color: green" class="text-center"><strong>{{ $success }}</strong></p>
    </div>

</div>
@endsection

