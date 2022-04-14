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
    <div class="block-title" style=" margin-bottom: 0;">
        <div class="block-title__inner section-bg section-bg_second">
            <div class="bg-inner">
                <p style=" color: #fff;"> <span><img src="{{ asset('uploads/frontend/starstar.png') }}"
                            alt="Tell us about your car"> Tell us about your car</span>
                    <span> <img src="{{ asset('uploads/frontend/starstar.png') }}" alt="Sell From Home"> Sell From
                        Home</span>
                    <span> <img src="{{ asset('uploads/frontend/starstar.png') }}" alt="Get best price"> Get best
                        price</span>
                    <span> <img src="{{ asset('uploads/frontend/starstar.png') }}" alt="Free name transfer"> Free name
                        transfer</span>
                </p>
                <h2 class="ui-title-page" style="text-transform: capitalize;">{{ __('frontend.CARSELL') }}</h2>
                <a href="{{ route('sellAcarForm') }}"><button class="btn btn-lg btn-warning btn-start"> Get
                        Started</button></a>
            </div>
        </div>
    </div>
    <section class="content-row-no-bg p-b-0" style="padding-top: 0;">
        @if (session('success'))
            <div class="alert alert-success text-center">
                {{ session('success') }}
                {{ session()->forget('success') }}
            </div>
        @endif
        <div class="container page-content">
            <div class="cont-title" style=" margin-bottom: 60px;">
                <h1 class="text-center" style=" margin-top: 0;">Sell your car and get best price instantly</h1>
                <div class="row">
                    <div class="col-sm-6">
                        <img src="{{ asset('uploads/frontend/start_sell_car.jpg') }}">
                    </div>
                    <div class="col-sm-6">
                        <p>{{ __('frontend.SELLLONGDETAILS') }}</p>
                        <a href="{{ route('sellAcarForm') }}"><button class="btn btn-lg btn-warning btn-start"> Get
                                Started</button></a>

                    </div>
                </div>
            </div>

            <div class="cont-title text-center" style=" margin-bottom: 20px;">
                <h2 class=" text-center">How to sell your car with <strong>S Islam</strong>?</h2>
                <p><img src="{{ asset('uploads/frontend/how-to-sell-bg.png') }}" alt="How to sell"
                        style=" margin-bottom: 40px;"></p>
                <a href="{{ route('sellAcarForm') }}"><button class="btn btn-lg btn-warning btn-start"> Get
                        Started</button></a>
            </div>

            <div class="cont-title" style=" margin-bottom: 20px;">
                <h2 class=" text-center">Why sell your car to <strong>S Islam Car's</strong>?</h2>
                <div class="row">
                    <div class="col-sm-6">
                        <p>We make it faster, easier and secured to sell your car from home.</p>
                        <p><img src="{{ asset('uploads/frontend/right-click.png') }}" alt="Right click"><strong> Direct
                                sell to us.</strong></p>
                        <p><img src="{{ asset('uploads/frontend/right-click.png') }}" alt="Right click"><strong> Instant
                                payment.</strong></p>
                        <p><img src="{{ asset('uploads/frontend/right-click.png') }}" alt="Right click"><strong> No media
                                charge.</strong></p>
                        <p><img src="{{ asset('uploads/frontend/right-click.png') }}" alt="Right click"><strong>
                                Incredible price.</strong></p>
                        <p><img src="{{ asset('uploads/frontend/right-click.png') }}" alt="Right click"><strong> Free
                                name transfer.</strong></p>
                        <p><img src="{{ asset('uploads/frontend/right-click.png') }}" alt="Right click"><strong> Fully
                                hassel free.</strong></p>
                        <a href="{{ route('sellAcarForm') }}" style=" margin-top: 30px;"><button
                                class="btn btn-lg btn-warning btn-start"> Get Started</button></a>

                    </div>
                    <div class="col-sm-6">
                        <img src="{{ asset('uploads/frontend/how-to-sell-a-used-car.jpg') }}" alt="why sell">
                    </div>
                </div>
            </div>
    </section>
@endsection
<style>
    .btn-start {
        font-size: 30px !important;
    }

</style>
