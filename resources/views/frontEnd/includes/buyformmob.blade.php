<div class="tab-pane" id="tab-buy-mob">
    <h2 class="form-h2-title">{{ __('frontend.CARBUY') }}</h2>
    <p><span>{{ __('frontend.CARINFO3') }}</span></p>
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
        {!! Form::open(array('url' => '/buyer-basic', 'method' => 'post')) !!}
        <!-- CROSS Site Request Forgery Protection -->
        @csrf
        <div class="form-group">
            <label>{{ __('frontend.NAME') }} *</label>
            <input type="text" class="form-control" name="name" id="name" required>
        </div>
        <div class="form-group">
            <label>{{ __('frontend.EMAIL') }}</label>
            <input type="email" class="form-control" name="email" id="email">
        </div>
        <div class="form-group">
            <label>{{ __('frontend.MOBILE') }} *</label>
            <input type="text" class="form-control" name="mobile" id="mobile required">
        </div>
        <button type="submit" name="send" class="btn btn-dark btn-block">{{ __('frontend.NEXT') }}   <i class='fa fa-arrow-right' aria-hidden='true'></i></button>

        {{Form::close()}}
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