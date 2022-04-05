@extends('dashboard.layouts.master')
@section('title', __('backend.DEALER'))
@section('content')
    <div class="padding">
        
        <div class="app-body-inner">
            <div class="row-col">
           
                @include('dashboard.dealers.edit')

            </div>
        </div>
    </div>
    <style>
        .app-footer {
            display: none;
        }
    </style>
@endsection
@push("after-scripts")
    <script type="text/javascript">
        function readURL(input) {

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#photo_preview').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#photo_file").change(function () {
            readURL(this);
            $('#photo_preview').css("opacity", 1);
        });
    </script>
@endpush
