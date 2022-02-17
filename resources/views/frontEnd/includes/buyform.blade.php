<div class="tab-pane" id="tab-buy">
    <h2 class="form-h2-title">{{ __('frontend.CARBUY') }}</h2>
    <p><span>{{ __('frontend.CARINFO1') }} {{ __('frontend.CARINFO2') }}</span></p>
    @if (count($errors) > 0)
    <div class="custom-alerts alert alert-danger fade in">
        <div class="error">
            @foreach ($errors->all() as $error)
            <ul>
                <li>{{ $error }}</li>
            </ul>
            @endforeach
        </div>
    </div>
    @endif

    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    <div class="form-group">
        {{-- {!! Form::open(array('url' => '/seller-basic', 'method' => 'post')) !!} --}}
        <!-- CROSS Site Request Forgery Protection -->
        @csrf
            <div class="form-group">
                <label>{{ __('frontend.CAR_BRAND') }} *</label>
                <select class="form-control" name="car_brand" id="car_brand" required>
                    @foreach($CarBrands as $row)
                        <option value="{{ $row->id }}">{{ $row->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>{{ __('frontend.CAR_MODEL') }} *</label>
                <select class="form-control" name="car_model" id="car_model" required>
                    @foreach($CarModels as $row)
                        <option value="{{ $row->id }}">{{ $row->name }}</option>
                    @endforeach
                </select>
            </div>
        <button name="send" class="btn btn-dark btn-block">{{ __('frontend.NEXT') }}   <i class='fa fa-arrow-right' aria-hidden='true'></i></button>
        <br>
        <table class="table table-bordered">
            <tr>
              <th>Brand</th>
              <th>Model</th>
              <th>Price</th>
              <th>Action</th>
            </tr>
            <tr>
              <td>Alfreds Futterkiste</td>
              <td>Maria Anders</td>
              <td>Germany</td>
              <td>
                  <button></button>
              </td>
            </tr>
          </table>
        {{-- {{Form::close()}} --}}
    </div>
</div>

<script src="{{ URL::asset('assets/frontend/js/jquery.js') }}"></script>
<script src="{{ URL::asset('assets/frontend/js/feather-icons/feather.min.js')}}"></script>
<script>
    $(document).ready(function () {
        $('#car_brand').change(function () {
            var car_brand_id = $(this).val();

            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            // console.log({DistributorCode});
            $.ajax
            ({
                type: 'POST',
                url: "{{ route('get_car_models') }}",
                data: { car_brand_id: car_brand_id, _token: CSRF_TOKEN },
                success: function (response) {
                    $('#car_model').html(response);

                },
            });
        });
    });
</script>