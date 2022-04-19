<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">

@if ($SellerCars->count() == 0)
    <div class="row p-a">
        <div class="col-sm-12">
            <div class=" p-a text-center light ">
                {{ __('backend.noData') }}
            </div>
        </div>
    </div>
@endif

@if ($SellerCars->count() > 0)
    <div class="portlet-body">
        <table id="dataTableExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
            <thead class="dker">
                <tr>
                    <th class="th-sm">{{ __('backend.SL') }}</th>
                    <th class="text-center">{{ __('backend.CAR_BRAND') }}</th>
                    <th>{{ __('backend.CAR_MODEL') }}</th>
                    <th>{{ __('backend.CAR_MENUFACTURING_YEAR') }}</th>
                    <th>{{ __('backend.CAR_REGISTRATION_YEAR') }}</th>
                    <th>{{ __('backend.CAR_NUMBER') }}</th>
                    <th class="text-center" style="width:200px;">{{ __('backend.ASKING_PRICE') }}</th>
                    <th class="text-center" style="width:200px;">{{ __('backend.ACTIONS') }}</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($SellerCars as $row)
                    <?php //echo '<pre/>';print_r($row->brand);
                    ?>
                    <tr>
                        <td>{{ $row->id }}</td>
                        <td>{{ $row->car_brand->name }}</td>
                        <td>{{ $row->model->name }}</td>
                        <td>{{ $row->menufacturing_year }}</td>
                        <td>{{ $row->registration_year }}</td>
                        <td>{{ $row->registration_number }}</td>
                        <td>{{ $row->price }}</td>
                        <td>
                            <a class="btn btn-fw btn-sm primary" href="{{ route('showSell', ['id' => $row->id]) }}">
                                <i class="material-icons">&#xe02e;</i>
                                &nbsp; {{ __('backend.view_details') }}</a>
                            <a class="btn btn-fw btn-sm primary" href="{{ route('carsEdit', ['id' => $row->id]) }}">
                                <i class="material-icons">&#xe02e;</i>
                                &nbsp; {{ __('backend.edit') }}</a>&nbsp;
                            <a class="btn btn-fw btn-sm danger" onclick="return confirm('Are you sure?')"
                                href="{{ route('carsDestroy', ['id' => $row->id]) }}">
                                <i class="material-icons">&#xE872;</i>
                                &nbsp; {{ __('backend.delete') }}</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@else
    <h3>No Data Found</h3>
@endif


<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
<script>
    $(function() {
        'use strict';

        $(function() {
            $('#dataTableExample').DataTable({
                "dom": 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'print'
                ],
                "aLengthMenu": [
                    [10, 30, 50, -1],
                    [10, 30, 50, "All"]
                ],
                "iDisplayLength": 10,
                "language": {
                    search: ""
                }
            });
            $('#dataTableExample').each(function() {
                var datatable = $(this);
                // SEARCH - Add the placeholder for Search and Turn this into in-line form control
                var search_input = datatable.closest('.dataTables_wrapper').find(
                    'div[id$=_filter] input');
                search_input.attr('placeholder', 'Search');
                search_input.removeClass('form-control-sm');
                // LENGTH - Inline-Form control
                var length_sel = datatable.closest('.dataTables_wrapper').find(
                    'div[id$=_length] select');
                length_sel.removeClass('form-control-sm');
            });
        });
    });
</script>
