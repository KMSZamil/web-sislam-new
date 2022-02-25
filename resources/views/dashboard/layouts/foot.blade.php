<script type="text/javascript">
    var public_lang = "{{ @Helper::currentLanguage()->code }}";
    var public_folder_path = "{{ asset('') }}";
    var first_day_of_week = "{{ env("FIRST_DAY_OF_WEEK",0) }}";

</script>
@stack('before-scripts')
<!-- jQuery -->
<!--<script src="{{ asset('assets/dashboard/js/jquery/dist/jquery.js') }}"></script>-->
<!-- Bootstrap -->
<script src="{{ asset('assets/dashboard/js/tether/dist/js/tether.min.js') }}" defer></script>
<script src="{{ asset('assets/dashboard/js/bootstrap/dist/js/bootstrap.js') }}" defer></script>
<script src="{{ asset('assets/dashboard/js/moment/moment.js') }}" defer></script>
<script src="{{ asset('assets/dashboard/js/moment/moment.js') }}" defer></script>
<script src="{{ asset('assets/dashboard/js/moment/locale/'.@Helper::currentLanguage()->code.'.js') }}" defer></script>
<!-- core -->
<script src="{{ asset('assets/dashboard/js/underscore/underscore-min.js') }}" defer></script>
<script src="{{ asset('assets/dashboard/js/jQuery-Storage-API/jquery.storageapi.min.js') }}" defer></script>
<script src="{{ asset('assets/dashboard/js/pace/pace.min.js') }}" defer></script>
<script src="{{ asset('assets/dashboard/js/scripts/config.lazyload.js') }}" defer></script>

<script src="{{ asset('assets/dashboard/js/scripts/palette.js') }}" defer></script>
<script src="{{ asset('assets/dashboard/js/scripts/ui-load.js') }}" defer></script>
<script src="{{ asset('assets/dashboard/js/scripts/ui-jp.js') }}" defer></script>
<script src="{{ asset('assets/dashboard/js/scripts/ui-include.js') }}" defer></script>
<script src="{{ asset('assets/dashboard/js/scripts/ui-device.js') }}" defer></script>
<script src="{{ asset('assets/dashboard/js/scripts/ui-form.js') }}" defer></script>
<script src="{{ asset('assets/dashboard/js/scripts/ui-nav.js') }}" defer></script>
<script src="{{ asset('assets/dashboard/js/scripts/ui-screenfull.js') }}" defer></script>
<script src="{{ asset('assets/dashboard/js/scripts/ui-scroll-to.js') }}" defer></script>
<script src="{{ asset('assets/dashboard/js/scripts/ui-toggle-class.js') }}" defer></script>


<script src="{{ asset('assets/dashboard/js/scripts/app.js') }}" defer></script>



{{--<script src="{{ URL::asset('assets/frontend/js/select2/select2.min.js') }}"></script>--}}
{{--<script src="{{ URL::asset('assets/frontend/js/tinymce/tinymce.min.js') }}"></script>--}}
{{--<script src="{{ URL::asset('assets/frontend/js/feather-icons/feather.min.js')}}"></script>--}}
{{--<script src="{{ URL::asset('assets/frontend/js/my_custom.js') }}"></script>--}}


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ"crossorigin="anonymous"></script>
<!-- The jQuery UI widget factory, can be omitted if jQuery UI is already included -->
<script src="{{ asset('assets/dashboard/js/rupload/vendor/jquery.ui.widget.js') }}" defer></script>
<!-- The Templates plugin is included to render the upload/download listings -->
<script src="https://blueimp.github.io/JavaScript-Templates/js/tmpl.min.js"></script>
<!-- The Load Image plugin is included for the preview images and image resizing functionality -->
<script src="https://blueimp.github.io/JavaScript-Load-Image/js/load-image.all.min.js"></script>
<!-- The Canvas to Blob plugin is included for image resizing functionality -->
<script src="https://blueimp.github.io/JavaScript-Canvas-to-Blob/js/canvas-to-blob.min.js"></script>
<!-- blueimp Gallery script -->
<script src="https://blueimp.github.io/Gallery/js/jquery.blueimp-gallery.min.js"></script>
<!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
<script src="{{ asset('assets/dashboard/js/rupload/jquery.iframe-transport.js') }}" defer></script>
<script src="{{ asset('assets/dashboard/js/rupload/jquery.fileupload.js') }}" defer></script>
<script src="{{ asset('assets/dashboard/js/rupload/jquery.fileupload-process.js') }}" defer></script>
<script src="{{ asset('assets/dashboard/js/rupload/jquery.fileupload-image.js') }}" defer></script>
<script src="{{ asset('assets/dashboard/js/rupload/jquery.fileupload-audio.js') }}" defer></script>
<script src="{{ asset('assets/dashboard/js/rupload/jquery.fileupload-video.js') }}" defer></script>
<script src="{{ asset('assets/dashboard/js/rupload/jquery.fileupload-validate.js') }}" defer></script>
<script src="{{ asset('assets/dashboard/js/rupload/jquery.fileupload-ui.js') }}" defer></script>
<script src="{{ asset('assets/dashboard/js/rupload/ripons-js.js') }}" defer></script>

{!! Helper::SaveVisitorInfo("Dashboard &raquo; ".trim($__env->yieldContent('title'))) !!}
@stack('after-scripts')
