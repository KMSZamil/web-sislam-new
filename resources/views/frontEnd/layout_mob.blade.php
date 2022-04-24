<!DOCTYPE html>
<html lang="{{ @Helper::currentLanguage()->code }}" dir="{{ @Helper::currentLanguage()->direction }}">

<head>
    @include('frontEnd.includes.head')
    <!-- jQuery 1.8 or later, 33 KB -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Fotorama from CDNJS, 19 KB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.js"></script>
    @include('frontEnd.includes.colors')
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-13DD0GVHYW"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-13DD0GVHYW');
    </script>

    <!-- Google Tag Manager -->
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-55TNP8B');
    </script>
    <!-- End Google Tag Manager -->

    <!-- Meta Pixel Code -->
    <script>
        ! function(f, b, e, v, n, t, s) {
            if (f.fbq) return;
            n = f.fbq = function() {
                n.callMethod ?
                    n.callMethod.apply(n, arguments) : n.queue.push(arguments)
            };
            if (!f._fbq) f._fbq = n;
            n.push = n;
            n.loaded = !0;
            n.version = '2.0';
            n.queue = [];
            t = b.createElement(e);
            t.async = !0;
            t.src = v;
            s = b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t, s)
        }(window, document, 'script',
            'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '1183921752351594');
        fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none"
            src="https://www.facebook.com/tr?id=1183921752351594&ev=PageView&noscript=1" /></noscript>
    <!-- End Meta Pixel Code -->
</head>
<?php
$bdy_class = '';
$bdy_bg_color = '';
$bdy_bg_image = '';
if (Helper::GeneralSiteSettings('style_type')) {
    $bdy_class = 'boxed-layout';
    if (Helper::GeneralSiteSettings('style_bg_type') == 0) {
        $bdy_bg_color = 'background-color: #000;';
        if (Helper::GeneralSiteSettings('style_bg_color') != '') {
            $bdy_bg_color = 'background-attachment: fixed;background-color: ' . Helper::GeneralSiteSettings('style_bg_color') . ';';
        }
        $bdy_bg_image = '';
    } elseif (Helper::GeneralSiteSettings('style_bg_type') == 1) {
        $bdy_bg_color = '';
        $bdy_bg_image = 'background-attachment: fixed;background-image:url(' . URL::to('uploads/pattern/' . Helper::GeneralSiteSettings('style_bg_pattern')) . ')';
    } elseif (Helper::GeneralSiteSettings('style_bg_type') == 2) {
        $bdy_bg_color = '';
        $bdy_bg_image = 'background-attachment: fixed;background-image:url(' . URL::to('uploads/settings/' . Helper::GeneralSiteSettings('style_bg_image')) . ')';
    }
}
?>

<body class="js {!! $bdy_class !!}" style=" {!! $bdy_bg_color !!} {!! $bdy_bg_image !!}">
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-55TNP8B" height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript>

   
    <!-- Your SDK code -->
    <script>
        window.fbAsyncInit = function() {
            FB.init({
                xfbml: true,
                version: 'v13.0'
            });
        };

        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s);
            js.id = id;
            js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>
    <div id="wrapper">
        <!-- start header -->
        {{-- @include('frontEnd.includes.header') --}}
        <!-- end header -->

        <!-- Content Section -->
        <div class="contents">
            @yield('content')
        </div>
        <!-- end of Content Section -->

        <!-- start footer -->
        {{-- @include('frontEnd.includes.footer') --}}
        <!-- end footer -->
    </div>
    @include('frontEnd.includes.foot')
    @yield('footerInclude')

    @if (Helper::GeneralSiteSettings('style_preload'))
        <div id="preloader"></div>
        <script type="text/javascript">
            jQuery(document).ready(function($) {
                $(window).load(function() {
                    $('#preloader').fadeOut('slow', function() {
                        // $(this).remove();
                    });
                });
            });
        </script>
    @endif
    @if (Helper::GeneralSiteSettings('style_header'))
        <script type="text/javascript">
            window.onscroll = function() {
                myFunction()
            };
            var header = document.getElementsByTagName("header")[0];
            var sticky = header.offsetTop;

            function myFunction() {
                if (window.pageYOffset >= sticky) {
                    header.classList.add("sticky");
                } else {
                    header.classList.remove("sticky");
                }
            }
        </script>
    @endif
</body>

</html>
