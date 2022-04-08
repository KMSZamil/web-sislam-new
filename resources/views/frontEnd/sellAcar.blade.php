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
                <h1 class="ui-title-page">{{ __('frontend.CARSELL') }}</h1>
                <a href="{{ route('sellAcarForm') }}"><button class="btn btn-lg btn-primary"> SEND YOUR CAR
                        INFORMATION</button></a>
            </div>
        </div>
    </div>
    <section class="content-row-no-bg p-b-0" style="padding-top: 0;">
        @if (session('success'))
            <div class="alert alert-success text-center">
                {{ session('success') }}
            </div>
        @endif
        <div class="container page-content">
            <div class="cont-title">
                <div class="row">
                    <div class="col-sm-6 text-justify">
                        <p>{{ __('frontend.SELLLONGDETAILS') }}</p>
                        <a href="{{ route('sellAcarForm') }}"><button class="btn btn-lg btn-primary">
                                {{ __('frontend.SENDCARINFO') }}</button></a>
                    </div>
                    <div class="col-sm-6 text-justify">
                        <img src="https://via.placeholder.com/500x250" />
                    </div>
                </div>
            </div>

            <div class="cont-title">
                <div class="row">
                    <div class="col-sm-6 text-justify">
                        <h2>{{ __('frontend.HOWITWORKS') }}</h2>
                        <img src="https://via.placeholder.com/500x250" />
                    </div>
                    <div class="col-sm-6 text-justify">
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                            the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley
                            of type and scrambled it to make a type specimen book. It has survived not only five centuries,
                            but also the leap into electronic typesetting, remaining essentially unchanged. It was
                            popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages,
                            and more recently with desktop publishing software like Aldus PageMaker including versions of
                            Lorem Ipsum</p>
                        <a href="{{ route('sellAcarForm') }}"><button class="btn btn-lg btn-primary">
                                {{ __('frontend.SENDCARINFO') }}</button></a>
                    </div>
                </div>
            </div>

            <div class="cont-title">
                <div class="row">
                    <h2>{{ __('frontend.FAQ') }}</h2>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="col-sm-2">
                            <img src="https://via.placeholder.com/100x100" />
                        </div>
                        <div class="col-sm-8">
                            <h4>Q1. {{ __('frontend.FAQ1') }}</h4>
                            <h5>Ans. {{ __('frontend.ANS1') }}</h5>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="col-sm-2">
                            <img src="https://via.placeholder.com/100x100" />
                        </div>
                        <div class="col-sm-8">
                            <h4>Q1. {{ __('frontend.FAQ2') }}</h4>
                            <h5>Ans. {{ __('frontend.ANS2') }}</h5>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="col-sm-2">
                            <img src="https://via.placeholder.com/100x100" />
                        </div>
                        <div class="col-sm-8">
                            <h4>Q1. {{ __('frontend.FAQ3') }}</h4>
                            <h5>Ans. {{ __('frontend.ANS3') }}</h5>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="col-sm-2">
                            <img src="https://via.placeholder.com/100x100" />
                        </div>
                        <div class="col-sm-8">
                            <h4>Q1. {{ __('frontend.FAQ4') }}</h4>
                            <h5>Ans. {{ __('frontend.ANS4') }}</h5>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="col-sm-2">
                            <img src="https://via.placeholder.com/100x100" />
                        </div>
                        <div class="col-sm-8">
                            <h4>Q1. {{ __('frontend.FAQ5') }}</h4>
                            <h5>Ans. {{ __('frontend.ANS5') }}</h5>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="col-sm-2">
                            <img src="https://via.placeholder.com/100x100" />
                        </div>
                        <div class="col-sm-8">
                            <h4>Q1. {{ __('frontend.FAQ6') }}</h4>
                            <h5>Ans. {{ __('frontend.ANS6') }}</h5>
                        </div>
                    </div>
                </div>
            </div>

            <div class="cont-title">
                <div class="row">
                    <div class="col-sm-2 text-justify">
                        <h2>{{ __('frontend.TESTIMONIAL') }}</h2>
                    </div>
                </div>
                @for ($i = 0; $i < 6; $i++)
                    <div class="col-md-2 col-lg-2 col-sm-6 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <div class=" image d-flex flex-column justify-content-center align-items-center">
                                    <button class="btn btn-secondary">
                                        <img style="border-radius: 10%" src="https://via.placeholder.com/100x100"
                                            height="100" width="100" /></button>
                                    <span class="name mt-3">Sample Name</span> <span
                                        class="idd">Designation</span>
                                    <div class="d-flex flex-row justify-content-center align-items-center gap-2">
                                        <span class="idd1">Company Name</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endfor
            </div>
            <div class="cont-title">
                <div class="row">
                    <div class="col-sm-6 text-justify">
                        <br />
                        <p>1. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                            been
                            the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley
                            of type and scrambled it to make a type specimen book. </p>
                        <p>2. It has survived not only five centuries,
                            but also the leap into electronic typesetting, remaining essentially unchanged. It was
                            popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages,
                            and more recently with desktop publishing software like Aldus PageMaker including versions of
                            Lorem Ipsum</p>
                        <p>3. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                            been
                            the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley
                            of type and scrambled it to make a type specimen book. </p>
                        <p>4. It has survived not only five centuries,
                            but also the leap into electronic typesetting, remaining essentially unchanged. It was
                            popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages,
                            and more recently with desktop publishing software like Aldus PageMaker including versions of
                            Lorem Ipsum</p>
                    </div>
                    <div class="col-sm-6 text-justify">
                        <h2>{{ __('frontend.WHYSALETOUS') }}</h2>
                        <a href="{{ route('sellAcarForm') }}"><button class="btn btn-lg btn-primary">
                                {{ __('frontend.SENDCARINFO') }}</button></a>
                    </div>
                </div>
            </div>
    </section>
@endsection
