<!DOCTYPE html>
<html lang="{{ @Helper::currentLanguage()->code }}" dir="{{ @Helper::currentLanguage()->direction }}">

<head>
    @include('dashboard.layouts.head')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Fotorama from CDNJS, 19 KB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.js"></script>
</head>

<body>
    <div class="app" id="app">
        @include('dashboard.layouts.menu')

        <div id="content" class="app-content box-shadow-z0" role="main">
            @include('dashboard.layouts.header')
            @include('dashboard.layouts.footer')
            <div ui-view class="app-body" id="view">
                @include('dashboard.layouts.errors')
                @yield('content')
            </div>
        </div>

        @include('dashboard.layouts.settings')
    </div>
    @include('dashboard.layouts.foot')
</body>

</html>
