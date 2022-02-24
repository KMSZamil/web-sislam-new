@extends('dashboard.layouts.master')
@section('title', __('backend.siteSectionsSettings'))
@section('content')
    <div class="padding">
        <div class="box">
            <div class="box-header dker">
                <h3>{{ __('backend.siteSectionsSettings') }}</h3>
                <small>
                    <a href="{{ route('adminHome') }}">{{ __('backend.home') }}</a> /
                    {{ __('backend.webmasterTools') }} /
                    <a href="">{{ __('backend.siteSectionsSettings') }}</a>
                </small>
            </div>
            @if($SellerCars->total() == 0)
                <div class="row p-a">
                    <div class="col-sm-12">
                        <div class=" p-a text-center light ">
                            {{ __('backend.noData') }}
                        </div>
                    </div>
                </div>
            @endif

            @if($SellerCars->total() > 0)

                <div class="table-responsive">
                    <table class="table table-bordered m-a-0">
                        <thead  class="dker">
                        <tr>
                            <th>{{ __('backend.SL') }}</th>
                            <th>{{ __('backend.CAR_MODEL') }}</th>
                            <th>Title</th>
                            <th class="text-center">{{ __('backend.CAR_BRAND') }}</th>
{{--                            <th class="text-center">{{ __('backend.FUEL_TYPE') }}</th>--}}
                            <th class="text-center" style="width:50px;">{{ __('backend.CAR_CONDITION') }}</th>
                            <th class="text-center" style="width:200px;">{{ __('backend.PRICE') }}</th>
                            <th class="text-center" style="width:200px;">{{ __('backend.ACTIONS') }}</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($SellerCars as $row)
                            <?php  //echo '<pre/>';print_r($row->brand); ?>

                            <tr>

                                <td>{{ $row->id }}</td>
                                <td>{{ $row->car_title }}</td>
                                <td>{{ $row->model->name }}</td>
                                <td>{{ $row->car_brand->name }}</td>
{{--                                <td>{{ $row->fuel_type }}</td>--}}
                                <td>{{ $row->condition->name }}</td>
                                <td>{{ $row->price }}</td>
                                <td><a class="btn btn-fw btn-sm primary" href="{{ route("carsEdit",["id"=>$row->id]) }}">
                                        <i class="material-icons">&#xe02e;</i>
                                        &nbsp; {{ __('backend.edit') }}</a>&nbsp;
                                        <a class="btn btn-fw btn-sm danger" onclick="return confirm('Are you sure?')" href="{{ route("carsDestroy",["id"=>$row->id]) }}">
                                        <i class="material-icons">&#xE872;</i>
                                        &nbsp; {{ __('backend.delete') }}</a>
                                        </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>

                </div>
            @endif
        </div>
    </div>
@endsection
@push("after-scripts")
    <script type="text/javascript">
        $("#checkAll").click(function () {
            $('input:checkbox').not(this).prop('checked', this.checked);
        });
        $("#action").change(function () {
            if (this.value == "delete") {
                $("#submit_all").css("display", "none");
                $("#submit_show_msg").css("display", "inline-block");
            } else {
                $("#submit_all").css("display", "inline-block");
                $("#submit_show_msg").css("display", "none");
            }
        });
    </script>
@endpush