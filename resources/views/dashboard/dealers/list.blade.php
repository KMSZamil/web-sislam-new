@extends('dashboard.layouts.master')
@section('title', __('backend.DEALER'))
@section('content')
    <div class="padding">
        <div class="app-body-inner">
            <div class="row-col row-col-xs">
            <!-- column -->
                <div class="col-sm-4 col-md-3 bg b-r">
                    <div class="row-col">
                        <div class="p-a-xs b-b">
                            {{Form::open(['route'=>['dealersSearch'],'method'=>'POST'])}}
                            <div class="input-group">
                                <input type="text" style="width: 85%" name="q" required value="{{ $search_word }}"
                                       class="form-control no-border no-bg"
                                       placeholder="{{ __('backend.searchAllDealers') }}">

                                <button type="submit" style="padding-top: 10px;"
                                        class="input-group-addon no-border no-shadow no-bg pull-left"><i
                                        class="fa fa-search"></i>
                                </button>
                            </div>
                            {{Form::close()}}
                        </div>
                        <div class="row-row">
                            <div class="row-body scrollable hover">
                                <div class="row-inner">
                                    <div class="list inset">

                                        @foreach($Dealers as $Dealer)

                                            <?php
                                            $active_cls = "";
                                            ?>
                                            @if(Session::has('DealerToEdit'))
                                                @if(Session::get('DealerToEdit')->id == $Dealer->id)
                                                    <?php
                                                    $active_cls = "primary";
                                                    ?>
                                                @endif
                                            @endif

                                            <div class="list-item pointer {{$active_cls}}"
                                                 onclick="javascript: location.href='{{ route("dealersEdit",["id"=>$Dealer->id]) }}'">
                                                <div class="list-left">
                    <span class="w-40 avatar">
                        <a href="{{ route("dealersEdit",["id"=>$Dealer->id]) }}">
                            @if($Dealer->photo!="")
                                <img src="{{ asset('uploads/dealers/'.$Dealer->photo) }}" class="img-circle">
                            @else
                                <img src="{{ asset('uploads/dealers/profile.jpg') }}" class="img-circle"
                                     style="opacity: 0.5">
                            @endif
                        </a>
                    </span>
                                                </div>
                                                <div class="list-body">
                                                    <a href="{{ route("dealersEdit",["id"=>$Dealer->id]) }}">
                                                        @if($Dealer->first_name !="" || $Dealer->last_name !="")
                                                            {{ $Dealer->first_name }} {{ $Dealer->last_name }}
                                                        @else
                                                            {{ substr($Dealer->email,0, strpos($Dealer->email, "@")) }}
                                                        @endif
                                                        <small class="block"><i
                                                                class="fa fa-phone m-r-sm text-muted"></i>
                                                            <span dir="ltr">
                                                                @if($Dealer->phone !="")
                                                                    {{ $Dealer->phone }}
                                                                @else
                                                                    {{ substr($Dealer->email, strpos($Dealer->email, "@")) }}
                                                                @endif
                                                            </span>
                                                        </small>
                                                    </a>
                                                </div>
                                            </div>
                                        @endforeach

                                    </div>
                                </div>
                            </div>
                        </div>
                        @if($Dealers->total() > env('BACKEND_PAGINATION'))
                            <div class="p-a b-t text-center">
                                {!! $Dealers->links() !!}
                            </div>
                        @endif
                    </div>
                </div>
                <!-- /column -->

                @if(Session::has('DealerToEdit'))
                    @include('dashboard.dealers.edit')
                @else
                    @include('dashboard.dealers.create')
                @endif

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
