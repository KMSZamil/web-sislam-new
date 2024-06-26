<!-- column -->
<div class="col-sm-2 col-md-2 w w-auto-sm b-r">
    <div class="row-col">
        <div class="row-row">
            <div class=" hover">
                <div class="row-inner"><br>
                    <div class="nav nav-pills nav-stacked m-t-sm">
                        <div class="row-row">
                            <div class="col-sm-9 p-a-0">
                                <br>
                                <ul class="list">
                                    <?php
                                    if (Session::has('CarToEdit')) {
                                        $group_id = Session::get('CarToEdit')->group_id;
                                    }
                                    ?>
                                    <li class="marginBottom5"><a
                                            href="{{ route('cars') }}" {!!   ($group_id=="") ? " style='font-weight: bold;color:#0cc2aa'":""  !!}> {{ __('backend.allCars') }}

                                            <small>({{ $AllCarsCount }})</small>

                                        </a>
                                    </li>

                                    @foreach($CarsGroups as $CarsGroup)
                                        <li class="marginBottom5"
                                            onmouseover="document.getElementById('grpRow{{ $CarsGroup->id }}').style.display='block'"
                                            onmouseout="document.getElementById('grpRow{{ $CarsGroup->id }}').style.display='none'">
                                            <a href="{{ route("cars",["group_id"=>$CarsGroup->id]) }}" {!!   ($CarsGroup->id == $group_id) ? " style='font-weight: bold;color:#0cc2aa'":""  !!} > {!! $CarsGroup->name !!}

                                                <small>({{ count($CarsGroup->cars) }})</small>

                                            </a>

                                            <div id="grpRow{{ $CarsGroup->id }}"
                                                 class="pull-right displayNone">
                                                <a class="btn btn-sm success p-a-0 m-a-0"
                                                   title="{{ __('backend.edit') }}"
                                                   href="{{ route("carsEditGroup",["id"=>$CarsGroup->id]) }}">
                                                    <small>&nbsp;<i class="material-icons">&#xe3c9;</i>&nbsp;
                                                    </small>
                                                </a>
                                                @if(@Auth::user()->permissionsGroup->delete_status)
                                                    <button class="btn btn-sm warning p-a-0 m-a-0"
                                                            data-toggle="modal"
                                                            data-target="#mg-{{ $CarsGroup->id }}"
                                                            ui-toggle-class="bounce"
                                                            title="{{ __('backend.delete') }}"
                                                            ui-target="#animate">
                                                        <small>&nbsp;<i class="material-icons">
                                                                &#xe872;</i>&nbsp;
                                                        </small>
                                                    </button>

                                                @endif
                                            </div>
                                            <!-- .modal -->
                                            <div id="mg-{{ $CarsGroup->id }}" class="modal fade"
                                                 data-backdrop="true">
                                                <div class="modal-dialog" id="animate">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">{{ __('backend.confirmation') }}</h5>
                                                        </div>
                                                        <div class="modal-body text-center p-lg">
                                                            <p>
                                                                {{ __('backend.confirmationDeleteMsg') }}
                                                                <br>
                                                                <strong>[ {{ $CarsGroup->name }}
                                                                    ]</strong>
                                                            </p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button"
                                                                    class="btn dark-white p-x-md"
                                                                    data-dismiss="modal">{{ __('backend.no') }}</button>
                                                            <a href="{{ route("carsDestroyGroup",["id"=>$CarsGroup->id]) }}"
                                                               class="btn danger p-x-md">{{ __('backend.yes') }}</a>
                                                        </div>
                                                    </div><!-- /.modal-content -->
                                                </div>
                                            </div>
                                            <!-- / .modal -->
                                        </li>
                                    @endforeach


                                    <li class="marginBottom5"><a
                                            {!!   ($group_id=="wait") ? " style='font-weight: bold;color:#0cc2aa'":""  !!}
                                            href="{{ route("cars",["group_id"=>"wait"]) }}"> {{ __('backend.waitActivation') }}

                                            <small>({{ $WaitCarsCount }})</small>

                                        </a></li>
                                    <li>
                                        <a {!!   ($group_id=="blocked") ? " style='font-weight: bold;color:#0cc2aa'":""  !!} href="{{ route("cars",["group_id"=>"blocked"]) }}"> {{ __('backend.blockedCars') }}

                                            <small>( {{ $BlockedCarsCount }})</small>

                                        </a></li>
                                </ul>
                                <div class="p-y">
                                    @if(Session::has('EditCarsGroup'))
                                        {{Form::open(['route'=>['carsUpdateGroup',Session::get('EditCarsGroup')->id],'method'=>'POST'])}}
                                        <div class="input-group input-group-sm">
                                            {!! Form::text('name',Session::get('EditCarsGroup')->name, array('placeholder' => __('backend.newGroup'),'class' => 'form-control','id'=>'name','required'=>'')) !!}
                                            <span class="input-group-btn">
                <button class="btn btn-default b-a no-shadow" type="submit">{!! __('backend.save') !!}</button>
              </span>
                                        </div>
                                        {{Form::close()}}
                                    @else
                                        @if(@Auth::user()->permissionsGroup->add_status)
                                            {{Form::open(['route'=>['carsStoreGroup'],'method'=>'POST'])}}
                                            <div class="input-group input-group-sm">
                                                {!! Form::text('name','', array('placeholder' => __('backend.newGroup'),'class' => 'form-control','id'=>'name','required'=>'')) !!}
                                                <span class="input-group-btn">
                <button class="btn btn-default b-a no-shadow" type="submit">{!! __('backend.add') !!}</button>
              </span>
                                            </div>
                                        @endif
                                        {{Form::close()}}
                                    @endif
                                </div>
                            </div>
                        </div>
                        <a href="{{ route('cars') }}"
                           class="btn btn-sm white btn-addon primary m-b-1"><i class="material-icons">
                                &#xe02e;</i> {{ __('backend.newCars') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div>


        </div>
    </div>
</div>
<!-- /column -->
