<a href="#" title="{{ __('frontend.toTop') }}" class="scrollup"><i class="fa fa-angle-up active"></i></a>

<script type="text/javascript">
    var page_dir = "{{ @Helper::currentLanguage()->direction }}";
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ"crossorigin="anonymous"></script>
{{--<script src="{{ URL::asset('assets/frontend/js/jquery.js') }}"></script>--}}
{{-- <script src="{{ URL::asset('assets/frontend/js/jquery.easing.1.3.js') }}"></script> --}}
<script src="{{ URL::asset('assets/frontend/js/bootstrap.min.js') }}"></script>
<script src="{{ URL::asset('assets/frontend/js/jquery.fancybox.pack.js') }}"></script>
<script src="{{ URL::asset('assets/frontend/js/jquery.fancybox-media.js') }}"></script>
<script src="{{ URL::asset('assets/frontend/js/google-code-prettify/prettify.js') }}"></script>
<script src="{{ URL::asset('assets/frontend/js/portfolio/jquery.quicksand.js') }}"></script>
<script src="{{ URL::asset('assets/frontend/js/portfolio/setting.js') }}"></script>
<script src="{{ URL::asset('assets/frontend/js/jquery.flexslider.js') }}"></script>
<script src="{{ URL::asset('assets/frontend/js/animate.js') }}"></script>
<script src="{{ URL::asset('assets/frontend/js/custom.js') }}"></script>
<script src="{{ URL::asset('assets/frontend/js/owl-carousel/owl.carousel.js') }}"></script>
<script src="{{ URL::asset('assets/frontend/js/Chart.min.js') }}"></script>
<script src="{{ URL::asset('assets/frontend/js/select2/select2.min.js') }}"></script>
<script src="{{ URL::asset('assets/frontend/js/tinymce/tinymce.min.js') }}"></script>
<script src="{{ URL::asset('assets/frontend/js/feather-icons/feather.min.js')}}"></script>
<script src="{{ URL::asset('assets/frontend/js/my_custom.js') }}"></script>


<!-----------------IMAGE UPLOAD START---------------------------->
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ"crossorigin="anonymous"></script> --}}
<script src="{{ asset('assets/dashboard/js/rupload/vendor/jquery.ui.widget.js') }}" defer></script>
<script src="https://blueimp.github.io/JavaScript-Templates/js/tmpl.min.js"></script>
<script src="https://blueimp.github.io/JavaScript-Load-Image/js/load-image.all.min.js"></script>
<script src="https://blueimp.github.io/JavaScript-Canvas-to-Blob/js/canvas-to-blob.min.js"></script>
<script src="https://blueimp.github.io/Gallery/js/jquery.blueimp-gallery.min.js"></script>
<script src="{{ asset('assets/dashboard/js/rupload/jquery.iframe-transport.js') }}" defer></script>
<script src="{{ asset('assets/dashboard/js/rupload/jquery.fileupload.js') }}" defer></script>
<script src="{{ asset('assets/dashboard/js/rupload/jquery.fileupload-process.js') }}" defer></script>
<script src="{{ asset('assets/dashboard/js/rupload/jquery.fileupload-image.js') }}" defer></script>
<script src="{{ asset('assets/dashboard/js/rupload/jquery.fileupload-audio.js') }}" defer></script>
<script src="{{ asset('assets/dashboard/js/rupload/jquery.fileupload-video.js') }}" defer></script>
<script src="{{ asset('assets/dashboard/js/rupload/jquery.fileupload-validate.js') }}" defer></script>
<script src="{{ asset('assets/dashboard/js/rupload/jquery.fileupload-ui.js') }}" defer></script>
<script src="{{ asset('assets/dashboard/js/rupload/ripons-js.js') }}" defer></script>
<!-----------------IMAGE UPLOAD END---------------------------->


{{--ajax subscribe to news letter--}}
@if(Helper::GeneralSiteSettings("style_subscribe"))
    <script type="text/javascript">
        jQuery(document).ready(function ($) {
            "use strict";

            //Subscribe
            $('form.subscribeForm').submit(function () {

                var f = $(this).find('.form-group'),
                    ferror = false,
                    emailExp = /^[^\s()<>@,;:\/]+@\w[\w\.-]+\.[a-z]{2,}$/i;

                f.children('input').each(function () { // run all inputs

                    var i = $(this); // current input
                    var rule = i.attr('data-rule');

                    if (rule !== undefined) {
                        var ierror = false; // error flag for current input
                        var pos = rule.indexOf(':', 0);
                        if (pos >= 0) {
                            var exp = rule.substr(pos + 1, rule.length);
                            rule = rule.substr(0, pos);
                        } else {
                            rule = rule.substr(pos + 1, rule.length);
                        }

                        switch (rule) {
                            case 'required':
                                if (i.val() === '') {
                                    ferror = ierror = true;
                                }
                                break;

                            case 'minlen':
                                if (i.val().length < parseInt(exp)) {
                                    ferror = ierror = true;
                                }
                                break;

                            case 'email':
                                if (!emailExp.test(i.val())) {
                                    ferror = ierror = true;
                                }
                                break;

                            case 'checked':
                                if (!i.attr('checked')) {
                                    ferror = ierror = true;
                                }
                                break;

                            case 'regexp':
                                exp = new RegExp(exp);
                                if (!exp.test(i.val())) {
                                    ferror = ierror = true;
                                }
                                break;
                        }
                        i.next('.validation').html('<i class=\"fa fa-info\"></i> &nbsp;' + ( ierror ? (i.attr('data-msg') !== undefined ? i.attr('data-msg') : 'wrong Input') : '' )).show();
                        !ierror ? i.next('.validation').hide() : i.next('.validation').show();
                    }
                });
                if (ferror) return false;
                else var str = $(this).serialize();
                $.ajax({
                    type: "POST",
                    url: "{{ route("subscribeSubmit") }}",
                    data: str,
                    success: function (msg) {
                        if (msg == 'OK') {
                            $("#subscribesendmessage").addClass("show");
                            $("#subscribeerrormessage").removeClass("show");
                            $("#subscribe_name").val('');
                            $("#subscribe_email").val('');
                        }
                        else {
                            $("#subscribesendmessage").removeClass("show");
                            $("#subscribeerrormessage").addClass("show");
                            $('#subscribeerrormessage').html(msg);
                        }

                    }
                });
                return false;
            });

        });
    </script>
@endif

{{-- Google Tags and google analytics --}}
@if($WebmasterSettings->google_tags_status && $WebmasterSettings->google_tags_id !="")
    <!-- Google Tag Manager (noscript) -->
    <noscript>
        <iframe src="//www.googletagmanager.com/ns.html?id={!! $WebmasterSettings->google_tags_id !!}"
                height="0" width="0" style="display:none;visibility:hidden"></iframe>
    </noscript>
    <!-- End Google Tag Manager (noscript) -->
@endif
@if($WebmasterSettings->google_analytics_code !="")
    {!! $WebmasterSettings->google_analytics_code !!}
@endif


<?php
if ($PageTitle == "") {
    $PageTitle = Helper::GeneralSiteSettings("site_title_" . @Helper::currentLanguage()->code);
}
?>
{!! Helper::SaveVisitorInfo($PageTitle) !!}
