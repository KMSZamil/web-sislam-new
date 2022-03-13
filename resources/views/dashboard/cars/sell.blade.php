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
            <div class="flash-message">
                @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                    @if(Session::has('alert-' . $msg))

                        <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                    @endif
                @endforeach
            </div>
            
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
    
                    <form method="POST" autocomplete="off">
                        @csrf
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group row">
                                    <label class="control-label col-sm-2">Date From</label>
                                    <input type="date" class="form-control col-sm-10" name="dateFrom" id="dateFrom" value="{{ isset($small_date) ? date('Y-m-d',strtotime($small_date)) : date('Y-m-01') }}">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group row">
                                    <label class="control-label col-sm-2">Date To</label>
                                    <input type="date" class="form-control col-sm-10" name="dateTo" id="dateTo" value="{{ isset($large_date) ? date('Y-m-d',strtotime($large_date)) : date('Y-m-d') }}">
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group row">
                                    <label class="control-label col-sm-2">&nbsp;</label>
                                    <button type="button" class="btn btn-primary submit col-sm-10" id="submit_data">Filter Data</button>
                                </div>
                            </div>
                        </div>
                        <div class="text-center" id="loaderDiv"></div>
                        <section id="product_sales_table_data"></section>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push("after-scripts")

<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
<script>
    $(document).ready(function(){
        dataCapture();
        $("#submit_data").click(function()
        {
            dataCapture();
        });
    });

    function dataCapture(){

        var FromDate = $('#dateFrom').val();
        var ToDate = $('#dateTo').val();
        if(FromDate==''){
            alert('Enter start date'); return false;
        }else if(ToDate==''){
            alert('Enter end date'); return false;
        }
        var dataString = { FromDate: FromDate, ToDate:ToDate, _token: '{{csrf_token()}}'};
        console.log(dataString);

        $.ajax
        ({
            type: "POST",
            url: '{{ route('get_sell_car_data') }}',
            data: dataString,
            cache: false,
            beforeSend: function() {
                $("#loaderDiv").html('<img src="{{asset('assets/images/ajax-loader.gif')}}" alt="Wait" />');
            },
            success: function(html)
            {
                $("#loaderDiv").html('');
                $("#product_sales_table_data").html(html);
            }
        });
    }
</script>
@endpush
