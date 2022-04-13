 <?php            
    if(count($dashboardCars)>0){?>



 <?php
foreach($dashboardCars as $data):
?>
 @if (isset($data->car_images[0]->car_image))
     <div class="col-md-4 message_box" data-id="<?php echo $data->id; ?>" style=" margin-bottom: 30px;">
         <div class="car-list-box box-sm">
             <div class="media-box">
                 <img src="{{ asset('files/' . $data->car_images[0]->car_image) }}"
                     alt="{{ isset($data->car_title) ? $data->car_title : '' }}">
             </div>
             <div class="list-info">
                 <div class="row">
                     <div style="float: left;">
                         <span class="badge-book m-b30">
                             <a href="{{ url('car-book', $data->id) }}">Book Now</a>
                         </span>
                     </div>
                     <div style="float: right;">
                         <span class="badge m-b30">Tk. {{ number_format($data->price, 2) }}</span>
                     </div>
                 </div>

                 <h5 class="title mb-0"><a
                         href="{{ route('car-details', $data->id) }}">{{ isset($data->car_title) ? $data->car_title : '' }}</a>
                 </h5>
                 <div class="col-xs-4">
                     <div class="row"><img src="/uploads/frontend/icon/road.png" width="14">
                         {{ isset($data->milage) ? $data->milage . ' km' : '' }}</div>
                 </div>
                 <div class="col-xs-4">
                     <div class="row"><img src="/uploads/frontend/icon/gear.png" width="14">
                         {{ isset($data->car_transmission->name) ? $data->car_transmission->name : '' }}</div>
                 </div>
                 <div class="col-xs-4">
                     <div class="row"><img src="/uploads/frontend/icon/calendar.png" width="14">
                         {{ isset($data->menufacturing_year) ? $data->menufacturing_year : '' }}</div>
                 </div>
                 <div class="col-xs-4">
                     <div class="row"><img src="/uploads/frontend/icon/fuel.png" width="14">
                         {{ isset($data->fuel_type) ? $data->fuel_type : '' }}</div>
                 </div>
                 <div class="col-xs-4">
                     <div class="row"><img src="/uploads/frontend/icon/car-body.png" width="14">
                         {{ isset($data->bodytype->name) ? $data->bodytype->name : '' }}</div>
                 </div>
                 <div class="col-xs-4">
                     <div class="row"><img src="/uploads/frontend/icon/car-colours.png" width="14">
                         {{ isset($data->car_exterior_color->name) ? $data->car_exterior_color->name : '' }}</div>
                 </div>
                 <div class="col-xs-4">
                     <div class="row"><img src="/uploads/frontend/icon/car-engine-cc.png" width="14">
                         {{ isset($data->engine_capacity) ? $data->engine_capacity . ' CC' : '' }}</div>
                 </div>
                 <div class="col-xs-4">
                     <div class="row"><img src="/uploads/frontend/icon/4wd-drive.png" width="14">
                         {{ isset($data->drive_type->name) ? $data->drive_type->name : '' }}</div>
                 </div>
                 <div class="col-xs-4">
                     <div class="row"><img src="/uploads/frontend/icon/car-seat-si.png" width="14">
                         {{ isset($data->seats) ? $data->seats : '' }}</div>
                 </div>
             </div>
             <div class="clear"></div>
             <div class="car-details">
                 <a href="{{ url('car-details', $data->id) }}"><button type="button"
                         class="btn btn-warning btn-lg btn-block">Details</button></a>

             </div>
         </div>
     </div>
 @else
     @continue;
 @endif

 <?php 

endforeach;
?>

 <?php 
    }else{?>
 <div class="col-sm-12">
     <div class="row text-center">
         <div class="alert alert-warning text-center">
             No more car
         </div>
     </div>
 </div>

 <?php }
    ?>
