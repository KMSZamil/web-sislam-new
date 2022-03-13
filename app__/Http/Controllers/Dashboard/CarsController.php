<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\CarsGroup;
use App\Models\Country;
use App\Http\Requests;
use App\Models\BodyType;
use App\Models\CarBrand;
use App\Models\CarBuy;
use App\Models\CarCondition;
use App\Models\CarExchange;
use App\Models\CarModel;
use App\Models\Comfort;
use App\Models\Customer;
use App\Models\District;
use App\Models\Drive;
use App\Models\Entertainment;
use App\Models\ExteriorColor;
use App\Models\FuelType;
use App\Models\InteriorColor;
use App\Models\OtherFeature;
use App\Models\Registration_city;
use App\Models\Safety;
use App\Models\Seat;
use App\Models\Seller;
use App\Models\SellerCarImage;
use App\Models\SellerImage;
use App\Models\Thana;
use App\Models\Transmission;
use App\Models\WebmasterSection;
use App\Models\Window;
use App\Models\Seller_fuel_type;
use App\Models\Seller_Comfort;
use App\Models\Seller_Entertainment;
use App\Models\Seller_Other_Feature;
use App\Models\Seller_Seat;
use App\Models\Seller_Window;
use App\Models\Seller_Safety;
use App\Models\Status;
use Auth;
use File;
use Helper;
use Illuminate\Config;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Redirect;
use Intervention\Image\ImageManagerStatic as Image;

class CarsController extends Controller
{

    private $uploadPath = "uploads/cars/";

    // Define Default Variables

    public function __construct()
    {
        $this->middleware('auth');

        // Check Permissions
        if (!@Auth::user()->permissionsGroup->newsletter_status) {
            return Redirect::to(route('NoPermission'))->send();
        }
    }

    /**
     * Display a listing of the resource.
     * int $group_id
     * @return \Illuminate\Http\Response
     */
    public function index($group_id = null)
    {

        $GeneralWebmasterSections = WebmasterSection::where('status', '=', '1')->orderby('row_no', 'asc')->get();
        if (@Auth::user()->permissionsGroup->view_status) {
            $CarsGroups = CarsGroup::where('created_by', '=', Auth::user()->id)->orderby('id', 'asc')->get();
        } else {
            $CarsGroups = 0;
        }


        //List of Countries
        $Countries = Country::orderby('title_' . @Helper::currentLanguage()->code, 'asc')->get();


        if (@Auth::user()->permissionsGroup->view_status) {
            //Count of waiting activation Cars
            $WaitCarsCount = Car::where('created_by', '=', Auth::user()->id)->where('status', '=',
                '0')->count();

            //Count of Blocked Cars
            $BlockedCarsCount = Car::where('created_by', '=', Auth::user()->id)->where('status', '=',
                '2')->count();

            //Count of All Cars
            $AllCarsCount = Car::where('created_by', '=', Auth::user()->id)->count();
        } else {
            //Count of waiting activation Cars
            $WaitCarsCount = Car::where('status', '=', '0')->count();

            //Count of Blocked Cars
            $BlockedCarsCount = Car::where('status', '=', '2')->count();

            //Count of All Cars
            $AllCarsCount = Car::count();
        }


        $search_word = "";

        $CarConditions = CarCondition::where('status',1)->get();
        $CarBrands = CarBrand::where('status',1)->get();
        $CarModels = CarModel::where('status',1)->get();
        $BodyTypes = BodyType::where('status',1)->get();
        $FuelTypes = FuelType::where('status',1)->get();
//        dd($FuelTypes);
        $Transmissions = Transmission::where('status',1)->get();
        $Drives = Drive::where('status',1)->get();
        $ExteriorColors = ExteriorColor::where('status',1)->get();
        $InteriorColors = InteriorColor::where('status',1)->get();
        $Districts = District::where('status',1)->get();

        $Comforts = Comfort::where('status',1)->get();
        $Country = Country::select('*')->get();
        $Entertainments = Entertainment::where('status',1)->get();
        $Safeties = Safety::where('status',1)->get();
        $registration_cities = Registration_city::where('status',1)->get();

        $Seats = Seat::where('status',1)->get();
        $Windows = Window::where('status',1)->get();
        $OtherFeatures = OtherFeature::where('status',1)->get();
        $District = District::where('status',1)->get();
        $Thana = Thana::where('status',1)->get();

        return view("dashboard.cars.list",
            compact( "GeneralWebmasterSections", "CarsGroups", "Countries", "WaitCarsCount",
                "BlockedCarsCount", "AllCarsCount", "group_id", "search_word",
                "CarConditions",
                "CarBrands",
                "CarModels",
                "BodyTypes",
                "FuelTypes",
                "Transmissions",
                "Drives",
                "ExteriorColors",
                "InteriorColors",
                "Districts",
                "Comforts",
                "Entertainments",
                "Safeties",
                "registration_cities",
                "Seats",
                "Windows",
                "OtherFeatures",
                "District",
                "Thana",
                'Country'
            ));
    }

    public function get_car_models(Request $request) {
        $models = CarModel::where('car_brand', $request->car_brand_id)->get();
        //dd($models);
        return view('dashboard.cars.get_car_models', compact('models'));
    }

    public function get_thana(Request $request){
        $thanas = Thana::where('district_id', $request->district_id)->get();
        //dd($models);
        return view('dashboard.cars.get_thana', compact('thanas'));
    }
    
    
    public function delete_car_image(Request $request){
        
        dd($request->all());
        
    }

    /**
     * Search resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        //
        // General for all pages
        $GeneralWebmasterSections = WebmasterSection::where('status', '=', '1')->orderby('row_no', 'asc')->get();
        // General END

        //List of groups
        if (@Auth::user()->permissionsGroup->view_status) {
            $CarsGroups = CarsGroup::where('created_by', '=', Auth::user()->id)->orderby('id', 'asc')->get();
        } else {
            $CarsGroups = CarsGroup::orderby('id', 'asc')->get();
        }

        //List of Countries
        $Countries = Country::orderby('title_' . @Helper::currentLanguage()->code, 'asc')->get();

        if (@Auth::user()->permissionsGroup->view_status) {
            if ($request->q != "") {
                //find Cars
                $Cars = Car::where('created_by', '=', Auth::user()->id)->where('first_name', 'like',
                    '%' . $request->q . '%')
                    ->orwhere('last_name', 'like', '%' . $request->q . '%')
                    ->orwhere('company', 'like', '%' . $request->q . '%')
                    ->orwhere('city', 'like', '%' . $request->q . '%')
                    ->orwhere('notes', 'like', '%' . $request->q . '%')
                    ->orwhere('phone', '=', $request->q)
                    ->orwhere('email', '=', $request->q)
                    ->orderby('id', 'desc')->paginate(env('BACKEND_PAGINATION'));
            } else {
                //List of all cars
                $Cars = Car::where('created_by', '=', Auth::user()->id)->orderby('id',
                    'desc')->paginate(env('BACKEND_PAGINATION'));
            }
        } else {
            if ($request->q != "") {
                //find Cars
                $Cars = Car::where('first_name', 'like', '%' . $request->q . '%')
                    ->orwhere('last_name', 'like', '%' . $request->q . '%')
                    ->orwhere('company', 'like', '%' . $request->q . '%')
                    ->orwhere('city', 'like', '%' . $request->q . '%')
                    ->orwhere('notes', 'like', '%' . $request->q . '%')
                    ->orwhere('phone', '=', $request->q)
                    ->orwhere('email', '=', $request->q)
                    ->orderby('id', 'desc')->paginate(env('BACKEND_PAGINATION'));
            } else {
                //List of all cars
                $Cars = Car::orderby('id', 'desc')->paginate(env('BACKEND_PAGINATION'));
            }
        }
        if (@Auth::user()->permissionsGroup->view_status) {
            //Count of waiting activation Cars
            $WaitCarsCount = Car::where('created_by', '=', Auth::user()->id)->where('status', '=',
                '0')->count();

            //Count of Blocked Cars
            $BlockedCarsCount = Car::where('created_by', '=', Auth::user()->id)->where('status', '=',
                '2')->count();

            //Count of All Cars
            $AllCarsCount = Car::where('created_by', '=', Auth::user()->id)->count();
        } else {
            //Count of waiting activation Cars
            $WaitCarsCount = Car::where('status', '=', '0')->count();

            //Count of Blocked Cars
            $BlockedCarsCount = Car::where('status', '=', '2')->count();

            //Count of All Cars
            $AllCarsCount = Car::count();
        }
        $group_id = "";
        $search_word = $request->q;

        return view("dashboard.cars.list",
            compact("Cars", "GeneralWebmasterSections", "CarsGroups", "Countries", "WaitCarsCount",
                "BlockedCarsCount", "AllCarsCount", "group_id", "search_word"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function storeGroup(Request $request)
    {
        // Check Permissions
        if (!@Auth::user()->permissionsGroup->add_status) {
            return Redirect::to(route('NoPermission'))->send();
        }
        //
        $CarsGroup = new CarsGroup;
        $CarsGroup->name = $request->name;
        $CarsGroup->created_by = Auth::user()->id;
        $CarsGroup->save();

        return redirect()->action('Dashboard\CarsController@index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $Car = new Seller(); 
        $Car->car_title = $request->car_title;
        $Car->car_condition = $request->car_condition;
        $Car->made_in = $request->made_in;
        $Car->brand = $request->brand;
        $Car->car_model = $request->car_model;
        $Car->menufacturing_year = $request->menufacturing_year;
        $Car->body_type = $request->body_type;
        $Car->milage = $request->milage;
        //fuel_type
        $Car->engine_capacity = $request->engine_capacity;
        $Car->transmission = $request->transmission;
        $Car->drive_type = $request->drive_type;
        $Car->exterior_color = $request->exterior_color;
        $Car->interior_color = $request->interior_color;
        $Car->registration_year = $request->registration_year;
        $Car->registration_serial = $request->registration_serial;
        $Car->registration_city = $request->registration_city;
        $Car->registration_city = $request->registration_number;
        $Car->seats = $request->seats;

    
        $Car->tax_token_expaire = date('Y-m-d',strtotime($request->tax_token_expaire));
        $Car->fitnes_exspaire = date('Y-m-d',strtotime($request->fitnes_exspaire));
        $Car->bank_loan = $request->bank_loan;
        $Car->name_transfer = $request->name_transfer;
        $Car->price = $request->price;
        $Car->status = 1;
        $Car->car_status = 2;
        $Car->home_feature = $request->home_feature;
        $Car->car_details = $request->car_details;
        $Car->video_url = $request->video_url;
        $Car->save();
        if ($request->car_photo) {
            for($i=0 ; $i < count($request->car_photo) ; $i++){
                //echo '<pre/>';print_r($request->file('carphoto'));
                
                // $seller_car_image = new SellerCarImage();
                // $md5Name = md5_file(($request->file('carphoto')[$i])->getRealPath()).time();
                // $mimeType = ($request->file('carphoto')[$i])->guessExtension();
                // $path = ($request->file('carphoto')[$i])->storeAs('uploads',  $md5Name.'.'.$mimeType  , 'public');
                // $seller_car_image->seller_id = $Car->id;
                // $seller_car_image->car_image = $path;
                // $seller_car_image->save();
            /*
            $image       = $request->file('carphoto')[$i];
            $filename    = time().rand(100,999).' _ '.$image->getClientOriginalName();
            $image_resize = Image::make($image->getRealPath());
            //$image_resize->resize(1024, null);
            $image_resize->insert('/home2/sislamcarscom/public_html/public/uploads/car_images/watermark/watermark.png', 'center');
            $image_resize->resize(1024, null, function ($constraint) {
                $constraint->aspectRatio(); //to preserve the aspect ratio
                $constraint->upsize();
            });

            $image_resize->save(public_path('uploads/car_images/full/' .$filename));
            $image_resize->resize(300, 300);
            $image_resize->save(public_path('uploads/car_images/thumb/' .$filename));
            */
            //dd($request->car_photo[0]);
            $seller_car_image  = new SellerCarImage();
            $seller_car_image->seller_id = $Car->id;
            $seller_car_image->car_image = $request->car_photo[$i];
            //dd($seller_car_image->car_image);
            $seller_car_image->save();
            }
        }

        if ($request->file('smart_card')) {
            $md5Name = md5_file($request->file('smart_card')->getRealPath()).time();
            $mimeType = $request->file('smart_card')->guessExtension();
            $path = $request->file('smart_card')->storeAs('uploads',  $md5Name.'.'.$mimeType  , 'public');
            $seller_car_image->smart_card_photo = $path;
        }

        $seller_image = new SellerImage();
        if ($request->file('tax_token')) {
            $md5Name = md5_file($request->file('tax_token')->getRealPath()).time();
            $mimeType = $request->file('tax_token')->guessExtension();
            $path = $request->file('tax_token')->storeAs('uploads',  $md5Name.'.'.$mimeType  , 'public');
            $seller_image->tax_token_photo = $path;
        }
        if ($request->file('fitness')) {
            $md5Name = md5_file($request->file('fitness')->getRealPath()).time();
            $mimeType = $request->file('fitness')->guessExtension();
            $path = $request->file('fitness')->storeAs('uploads',  $md5Name.'.'.$mimeType  , 'public');
            $seller_image->fitness_photo = $path;
        }
        if ($request->file('bank_clearance')) {
            $md5Name = md5_file($request->file('bank_clearance')->getRealPath()).time();
            $mimeType = $request->file('bank_clearance')->guessExtension();
            $path = $request->file('bank_clearance')->storeAs('uploads',  $md5Name.'.'.$mimeType  , 'public');
            $seller_image->bank_clearance_photo = $path;
        }
        $seller_image->seller_id = $Car->id;
        $seller_image->save();

        if($request->fuel_type){
            for($i=0 ; $i < count($request->fuel_type) ; $i++){
                $fuel_type = new Seller_fuel_type();
                $fuel_type->seller_id = $Car->id;
                $fuel_type->fuel_type_id = $request->fuel_type[$i];
                $fuel_type->save();
            }
        }


        if($request->comfort){
            for($i=0 ; $i < count($request->comfort) ; $i++){
                $comfort = new Seller_Comfort();
                $comfort->seller_id = $Car->id;
                $comfort->comfort_id = $request->comfort[$i];
                $comfort->save();
            }
        }
        //dd($request->entertainment[0]);
        if($request->entertainment){
            for($i=0 ; $i < count($request->entertainment) ; $i++){
                $entertainment = new Seller_Entertainment();
                $entertainment->seller_id = $Car->id;
                $entertainment->entertainment_id = $request->entertainment[$i];
                //dd($entertainment);
                $entertainment->save();
            }
        }

        if($request->safety){
            for($i=0 ; $i < count($request->safety) ; $i++){
                $safety = new Seller_Safety();
                $safety->seller_id = $Car->id;
                $safety->safety_id = $request->safety[$i];
                $safety->save();
            }
        }

        if($request->seat){
            for($i=0 ; $i < count($request->seat) ; $i++){
                $seat = new Seller_Seat();
                $seat->seller_id = $Car->id;
                $seat->seat_id = $request->seat[$i];
                $seat->save();
            }
        }

        if($request->window){
            for($i=0 ; $i < count($request->window) ; $i++){
                $window = new Seller_Window();
                $window->seller_id = $Car->id;
                $window->window_id = $request->window[$i];
                $window->save();
            }
        }

        if($request->other_feature){
            for($i=0 ; $i < count($request->other_feature) ; $i++){
                $other_feature = new Seller_Other_Feature();
                $other_feature->seller_id = $Car->id;
                $other_feature->other_feature_id = $request->other_feature[$i];
                $other_feature->save();
            }
        }
        //return Redirect::to('/');

        $request->session()->flash('alert-success', 'Data successfully added!');
        return redirect()->action('Dashboard\CarsController@index');
    }

    public function getUploadPath()
    {
        return $this->uploadPath;
    }

    public function setUploadPath($uploadPath)
    {
        $this->uploadPath = Config::get('app.APP_URL') . $uploadPath;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
     
        $GeneralWebmasterSections = WebmasterSection::where('status', '=', '1')->orderby('row_no', 'asc')->get();

        $CarConditions = CarCondition::where('status',1)->get();
        $CarBrands = CarBrand::where('status',1)->get();
        $CarModels = CarModel::where('status',1)->get();
        $BodyTypes = BodyType::where('status',1)->get();
        
        $FuelTypes = FuelType::where('status',1)->get();
        $Country = Country::select('*')->get();
       

        $Transmissions = Transmission::where('status',1)->get();
        $Drives = Drive::where('status',1)->get();
        $ExteriorColors = ExteriorColor::where('status',1)->get();
        $InteriorColors = InteriorColor::where('status',1)->get();
        $Districts = District::where('status',1)->get();

        $Comforts = Comfort::where('status',1)->get();
        $Entertainments = Entertainment::where('status',1)->get();
        $Safeties = Safety::where('status',1)->get();
        $registration_cities = Registration_city::where('status',1)->get();

        $Seats = Seat::where('status',1)->get();
        $Windows = Window::where('status',1)->get();
        $OtherFeatures = OtherFeature::where('status',1)->get();
        $District = District::where('status',1)->get();
        $Thana = Thana::where('status',1)->get();

        $carDetails = Seller::with('images','customers',
        'seller_fuel_types','seller_comfort','seller_entertainment','seller_safety','seller_seat','seller_window','seller_other_feature',
        'seller_car_images',
            'condition',
            'car_brand',
            'model',
            'bodytype',
            'car_exterior_color',
            'drive_type',
            'car_transmission'
        )->where('status',1)->where('id',$id)->first();
         //dd($carDetails->seller_car_images);

        return view("dashboard.cars.list_edit",
            compact( "GeneralWebmasterSections","carDetails",
                "CarConditions",
                "CarBrands",
                "CarModels",
                "BodyTypes",
                "FuelTypes",
                "Transmissions",
                "Drives",
                "ExteriorColors",
                "InteriorColors",
                "Districts",
                "Comforts",
                "Entertainments",
                "Safeties",
                "registration_cities",
                "Seats",
                "Windows",
                "OtherFeatures",
                "District",
                "Thana",
                "Country"
            ));     
    }

    public function editBuy($id)
    {
        //dd($id);
        $CustomerID = CarBuy::where('car_id',$id)->first()->customer_id;
        $GeneralWebmasterSections = WebmasterSection::where('status', '=', '1')->orderby('row_no', 'asc')->get();
        $CarConditions = CarCondition::where('status',1)->get();
        $CarBrands = CarBrand::where('status',1)->get();
        $CarModels = CarModel::where('status',1)->get();
        $BodyTypes = BodyType::where('status',1)->get();
        $FuelTypes = FuelType::where('status',1)->get();
        $Country = Country::select('*')->get();

        $Transmissions = Transmission::where('status',1)->get();
        $Drives = Drive::where('status',1)->get();
        $ExteriorColors = ExteriorColor::where('status',1)->get();
        $InteriorColors = InteriorColor::where('status',1)->get();
        $Districts = District::where('status',1)->get();

        $Comforts = Comfort::where('status',1)->get();
        $Entertainments = Entertainment::where('status',1)->get();
        $Safeties = Safety::where('status',1)->get();
        $registration_cities = Registration_city::where('status',1)->get();

        $Seats = Seat::where('status',1)->get();
        $Windows = Window::where('status',1)->get();
        $OtherFeatures = OtherFeature::where('status',1)->get();
        $District = District::where('status',1)->get();
        $Thana = Thana::where('status',1)->get();
        $Status = Status::all();


        $carDetails = Seller::with('images','customers',
        'seller_fuel_types','seller_comfort','seller_entertainment','seller_safety','seller_seat','seller_window','seller_other_feature',
        'seller_car_images',
            'condition',
            'car_brand',
            'model',
            'bodytype',
            'car_exterior_color',
            'drive_type',
            'car_transmission'
        )->where('id',$id)->first();

        //$CustomerID = $carDetails->customer_id;
        
        $CustomerData = Customer::where('id',$CustomerID)->first();
         //dd($carDetails->seller_car_images);

        return view("dashboard.cars.list_edit_buy",
            compact( "GeneralWebmasterSections","carDetails",
                "CarConditions",
                "CarBrands",
                "CarModels",
                "BodyTypes",
                "FuelTypes",
                "Transmissions",
                "Drives",
                "ExteriorColors",
                "InteriorColors",
                "Districts",
                "Comforts",
                "Entertainments",
                "Safeties",
                "registration_cities",
                "Seats",
                "Windows",
                "OtherFeatures",
                "District",
                "Thana",
                "Country",
                "CustomerData",
                "Status"
            ));     
    }

    public function editExchange($id)
    {
        //dd($id);
        $CustomerID = CarExchange::where('seller_car_id',$id)->first()->customer_id;
        //dd($customerId);
        $GeneralWebmasterSections = WebmasterSection::where('status', '=', '1')->orderby('row_no', 'asc')->get();
        $CarConditions = CarCondition::where('status',1)->get();
        $CarBrands = CarBrand::where('status',1)->get();
        $CarModels = CarModel::where('status',1)->get();
        $BodyTypes = BodyType::where('status',1)->get();
        $FuelTypes = FuelType::where('status',1)->get();
        $Country = Country::select('*')->get();

        $Transmissions = Transmission::where('status',1)->get();
        $Drives = Drive::where('status',1)->get();
        $ExteriorColors = ExteriorColor::where('status',1)->get();
        $InteriorColors = InteriorColor::where('status',1)->get();
        $Districts = District::where('status',1)->get();

        $Comforts = Comfort::where('status',1)->get();
        $Entertainments = Entertainment::where('status',1)->get();
        $Safeties = Safety::where('status',1)->get();
        $registration_cities = Registration_city::where('status',1)->get();

        $Seats = Seat::where('status',1)->get();
        $Windows = Window::where('status',1)->get();
        $OtherFeatures = OtherFeature::where('status',1)->get();
        $District = District::where('status',1)->get();
        $Thana = Thana::where('status',1)->get();
        $Status = Status::all();

        $carDetails = Seller::with('images','customers',
        'seller_fuel_types','seller_comfort','seller_entertainment','seller_safety','seller_seat','seller_window','seller_other_feature',
        'seller_car_images',
            'condition',
            'car_brand',
            'model',
            'bodytype',
            'car_exterior_color',
            'drive_type',
            'car_transmission'
        )->where('id',$id)->first();
        //dd($carDetails);
        //$CustomerID = $carDetails->customer_id;
        
        $CustomerData = Customer::where('id',$CustomerID)->first();
        //dd($carDetails);

        return view("dashboard.cars.list_edit_exchange",
            compact( "GeneralWebmasterSections","carDetails",
                "CarConditions",
                "CarBrands",
                "CarModels",
                "BodyTypes",
                "FuelTypes",
                "Transmissions",
                "Drives",
                "ExteriorColors",
                "InteriorColors",
                "Districts",
                "Comforts",
                "Entertainments",
                "Safeties",
                "registration_cities",
                "Seats",
                "Windows",
                "OtherFeatures",
                "District",
                "Thana",
                "Country",
                "CustomerData",
                "Status"
            ));     
    }

    public function editSell($id)
    {
        //dd($id);
        $GeneralWebmasterSections = WebmasterSection::where('status', '=', '1')->orderby('row_no', 'asc')->get();
        $CarConditions = CarCondition::where('status',1)->get();
        $CarBrands = CarBrand::where('status',1)->get();
        $CarModels = CarModel::where('status',1)->get();
        $BodyTypes = BodyType::where('status',1)->get();
        $FuelTypes = FuelType::where('status',1)->get();
        $Country = Country::select('*')->get();

        $Transmissions = Transmission::where('status',1)->get();
        $Drives = Drive::where('status',1)->get();
        $ExteriorColors = ExteriorColor::where('status',1)->get();
        $InteriorColors = InteriorColor::where('status',1)->get();
        $Districts = District::where('status',1)->get();

        $Comforts = Comfort::where('status',1)->get();
        $Entertainments = Entertainment::where('status',1)->get();
        $Safeties = Safety::where('status',1)->get();
        $registration_cities = Registration_city::where('status',1)->get();

        $Seats = Seat::where('status',1)->get();
        $Windows = Window::where('status',1)->get();
        $OtherFeatures = OtherFeature::where('status',1)->get();
        $District = District::where('status',1)->get();
        $Thana = Thana::where('status',1)->get();

        $Status = Status::all();


        $carDetails = Seller::with('images','customers',
        'seller_fuel_types','seller_comfort','seller_entertainment','seller_safety','seller_seat','seller_window','seller_other_feature',
        'seller_car_images',
            'condition',
            'car_brand',
            'model',
            'bodytype',
            'car_exterior_color',
            'drive_type',
            'car_transmission'
        )->where('id',$id)->first();

        $CustomerData = Customer::where('id',$carDetails->customer_id)->first();
        //dd($CustomerData);

        return view("dashboard.cars.list_edit_sell",
            compact( "GeneralWebmasterSections","carDetails",
                "CarConditions",
                "CarBrands",
                "CarModels",
                "BodyTypes",
                "FuelTypes",
                "Transmissions",
                "Drives",
                "ExteriorColors",
                "InteriorColors",
                "Districts",
                "Comforts",
                "Entertainments",
                "Safeties",
                "registration_cities",
                "Seats",
                "Windows",
                "OtherFeatures",
                "District",
                "Thana",
                "Country",
                "CustomerData",
                "Status"
            ));     
    }
    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Check Permissions
        if (!@Auth::user()->permissionsGroup->edit_status) {
            return Redirect::to(route('NoPermission'))->send();
        }
        //
        if (@Auth::user()->permissionsGroup->view_status) {
            $Car = Car::where('created_by', '=', Auth::user()->id)->find($id);
        } else {
            $Car = Car::find($id);
        }
        if (!empty($Car)) {

        
        $this->validate($request, [
            'email' => 'email',
            'file' => 'mimes:png,jpeg,jpg,gif,svg'
        ]);
  
            // End of Upload Files
        //dd($request->all());
            
        $Car = Seller::where("id",$request->id)->first();
            //dd($request->id);

        $Car->car_title = $request->car_title;
        $Car->car_condition = $request->car_condition;
        $Car->made_in = $request->made_in;
        $Car->brand = $request->brand;
        $Car->car_model = $request->car_model;
        $Car->menufacturing_year = $request->menufacturing_year;
        $Car->body_type = $request->body_type;

        $Car->milage = $request->milage;
        //fuel_type
        $Car->engine_capacity = $request->engine_capacity;
        $Car->transmission = $request->transmission;
        $Car->drive_type = $request->drive_type;
        $Car->exterior_color = $request->exterior_color;
        $Car->interior_color = $request->interior_color;
        $Car->registration_year = $request->registration_year;
        $Car->registration_serial = $request->registration_serial;
        $Car->registration_city = $request->registration_city;
        $Car->seats = $request->seats;

        $Car->tax_token_expaire = date('Y-m-d',strtotime($request->tax_token_expaire));
        $Car->fitnes_exspaire = date('Y-m-d',strtotime($request->fitnes_exspaire));
        $Car->bank_loan = $request->bank_loan;
        $Car->name_transfer = $request->name_transfer;
        $Car->price = $request->price;
        $Car->status = 1;
        $Car->car_status = 2;
        $Car->home_feature = $request->home_feature;
        $Car->car_details = $request->car_details;
        $Car->video_url = $request->video_url;

        if ($request->car_photo) {
            for($i=0 ; $i < count($request->car_photo) ; $i++){
                $seller_car_image  = new SellerCarImage();
                $seller_car_image->seller_id = $Car->id;
                $seller_car_image->car_image = $request->car_photo[$i];
                $seller_car_image->save();
            }
        }
            
            /*foreach ($request->file('carphoto') as $key => $value) {
                
                $car_photo_id = isset($request->input('carphoto_id')[$key]) ? $request->input('carphoto_id')[$key] : null;
                
                $image       = $request->file('carphoto')[$key];
                $filename    = time().rand(100,999).' _ '.$image->getClientOriginalName();
                $image_resize = Image::make($image->getRealPath());
                //$image_resize->resize(1024, null);
                //echo '<pre>'; print_r($image_resize);
                
                $image_resize->insert('/home2/sislamcarscom/public_html/public/uploads/car_images/watermark/watermark.png', 'center');
                //echo '<pre>'; print_r($image_resize);
                $image_resize->resize(1024, null, function ($constraint) {
                    $constraint->aspectRatio(); //to preserve the aspect ratio
                    $constraint->upsize();
                });
                
                //echo '<pre>'; print_r($image_resize);
                //exit();
                $image_resize->save(public_path('uploads/car_images/full/' .$filename));
                $image_resize->resize(300, 300);
                $image_resize->save(public_path('uploads/car_images/thumb/' .$filename));
                
                if($car_photo_id!=null){
                    $seller_car_image  = SellerCarImage::where('id',$car_photo_id)->first();
                    $seller_car_image->seller_id = $Car->id;
                    $seller_car_image->car_image = $filename;
                    $seller_car_image->save();
                }else{
                    $seller_car_image  = new SellerCarImage();
                    $seller_car_image->seller_id = $Car->id;
                    $seller_car_image->car_image = $filename;
                    $seller_car_image->save();
                }
                
            }*/
            /*
            for($i=0 ; $i < count($request->file('carphoto')) ; $i++){

            $image       = $request->file('carphoto')[$i];
            $filename    = time().rand(100,999).' _ '.$image->getClientOriginalName();
            $image_resize = Image::make($image->getRealPath());
            //$image_resize->resize(1024, null);
            $image_resize->resize(1024, null, function ($constraint) {
                $constraint->aspectRatio(); //to preserve the aspect ratio
                $constraint->upsize();
            });

            $image_resize->save(public_path('uploads/car_images/full/' .$filename));
            $image_resize->resize(300, 300);
            $image_resize->save(public_path('uploads/car_images/thumb/' .$filename));

            $seller_car_image  = new SellerCarImage();
            $seller_car_image->seller_id = $Car->id;
            $seller_car_image->car_image = $filename;
            $seller_car_image->save();
            }
            */
            //exit();

                /*
                    $fuel_type = new Seller_fuel_type();
                    $fuel_type->seller_id = $request->id;
                    $fuel_type->fuel_type_id = $request->fuel_type[$i];
                    $fuel_type->save();
              
                */
//
//            if ($fileFinalName_ar != "") {
//                // Delete a Car file
//                if ($Car->photo != "") {
//                    File::delete($this->getUploadPath() . $Car->photo);
//                }
//
//                $Car->photo = $fileFinalName_ar;
//            }

            $Car->save();

            if($request->fuel_type){
                Seller_fuel_type::where('seller_id',$request->id)->delete();
                for($i=0 ; $i < count($request->fuel_type) ; $i++){
                    $fuel_type = new Seller_fuel_type();
                    $fuel_type->seller_id = $request->id;
                    $fuel_type->fuel_type_id = $request->fuel_type[$i];
                    $fuel_type->save();
                }
            }

            if($request->comfort){
                Seller_Comfort::where('seller_id',$request->id)->delete();
                for($i=0 ; $i < count($request->comfort) ; $i++){
                    $comfort = new Seller_Comfort();
                    $comfort->seller_id = $request->id;
                    $comfort->comfort_id = $request->comfort[$i];
                    $comfort->save();
                }
            }
            //dd($request->entertainment[0]);
            if($request->entertainment){
                Seller_Entertainment::where('seller_id',$request->id)->delete();
                for($i=0 ; $i < count($request->entertainment) ; $i++){
                    $entertainment = new Seller_Entertainment();
                    $entertainment->seller_id = $request->id;
                    $entertainment->entertainment_id = $request->entertainment[$i];
                    //dd($entertainment);
                    $entertainment->save();
                }
            }

            if($request->safety){
                Seller_Safety::where('seller_id',$request->id)->delete();
                for($i=0 ; $i < count($request->safety) ; $i++){
                    $safety = new Seller_Safety();
                    $safety->seller_id = $request->id;
                    $safety->safety_id = $request->safety[$i];
                    $safety->save();
                }
            }

            if($request->seat){
                Seller_Seat::where('seller_id',$request->id)->delete();
                for($i=0 ; $i < count($request->seat) ; $i++){
                    $seat = new Seller_Seat();
                    $seat->seller_id = $request->id;
                    $seat->seat_id = $request->seat[$i];
                    $seat->save();
                }
            }

            if($request->window){
                Seller_Window::where('seller_id',$request->id)->delete();
                for($i=0 ; $i < count($request->window) ; $i++){
                    $window = new Seller_Window();
                    $window->seller_id = $request->id;
                    $window->window_id = $request->window[$i];
                    $window->save();
                }
            }

            if($request->other_feature){
                Seller_Other_Feature::where('seller_id',$request->id)->delete();
                for($i=0 ; $i < count($request->other_feature) ; $i++){
                    $other_feature = new Seller_Other_Feature();
                    $other_feature->seller_id = $request ->id;
                    $other_feature->other_feature_id = $request->other_feature[$i];
                    $other_feature->save();
                }
            }

            $request->session()->flash('alert-success', 'Data successfully updated!');
            return redirect()->action('Dashboard\CarsController@all')->with('CarToEdit', $Car)->with('doneMessage2',
                __('backend.saveDone'));
        } else {
            $request->session()->flash('alert-danger', 'Something went wrong!');
            return redirect()->action('Dashboard\CarsController@index');
        }
    }

    public function updateBuy(Request $request, $id)
    {
        //dd($request->all());
        // Check Permissions
        if (!@Auth::user()->permissionsGroup->edit_status) {
            return Redirect::to(route('NoPermission'))->send();
        }
        //
        if (@Auth::user()->permissionsGroup->view_status) {
            $Car = Car::where('created_by', '=', Auth::user()->id)->find($id);
        } else {
            $Car = Car::find($id);
        }
        if (!empty($Car)) {

        
        $this->validate($request, [
            'email' => 'email',
            'file' => 'mimes:png,jpeg,jpg,gif,svg'
        ]);
  
            // End of Upload Files
        //dd($request->all());
            
        $Car = Seller::where("id",$request->id)->first();
            //dd($request->id);

        $Car->car_title = $request->car_title;
        $Car->car_condition = $request->car_condition;
        $Car->made_in = $request->made_in;
        $Car->brand = $request->brand;
        $Car->car_model = $request->car_model;
        $Car->menufacturing_year = $request->menufacturing_year;
        $Car->body_type = $request->body_type;

        $Car->milage = $request->milage;
        //fuel_type
        $Car->engine_capacity = $request->engine_capacity;
        $Car->transmission = $request->transmission;
        $Car->drive_type = $request->drive_type;
        $Car->exterior_color = $request->exterior_color;
        $Car->interior_color = $request->interior_color;
        $Car->registration_year = $request->registration_year;
        $Car->registration_serial = $request->registration_serial;
        $Car->registration_city = $request->registration_city;
        $Car->seats = $request->seats;

        $Car->tax_token_expaire = date('Y-m-d',strtotime($request->tax_token_expaire));
        $Car->fitnes_exspaire = date('Y-m-d',strtotime($request->fitnes_exspaire));
        $Car->bank_loan = $request->bank_loan;
        $Car->name_transfer = $request->name_transfer;
        $Car->price = $request->price;
        
        $Car->car_status = 2;
        $Car->home_feature = $request->home_feature;
        $Car->car_details = $request->car_details;
        $Car->video_url = $request->video_url;

        $Car->status = $request->status;

        if ($request->car_photo) {
            for($i=0 ; $i < count($request->car_photo) ; $i++){
                $seller_car_image  = new SellerCarImage();
                $seller_car_image->seller_id = $Car->id;
                $seller_car_image->car_image = $request->car_photo[$i];
                $seller_car_image->save();
            }
        }
            
            $Car->save();

            if($request->fuel_type){
                Seller_fuel_type::where('seller_id',$request->id)->delete();
                for($i=0 ; $i < count($request->fuel_type) ; $i++){
                    $fuel_type = new Seller_fuel_type();
                    $fuel_type->seller_id = $request->id;
                    $fuel_type->fuel_type_id = $request->fuel_type[$i];
                    $fuel_type->save();
                }
            }

            if($request->comfort){
                Seller_Comfort::where('seller_id',$request->id)->delete();
                for($i=0 ; $i < count($request->comfort) ; $i++){
                    $comfort = new Seller_Comfort();
                    $comfort->seller_id = $request->id;
                    $comfort->comfort_id = $request->comfort[$i];
                    $comfort->save();
                }
            }
            //dd($request->entertainment[0]);
            if($request->entertainment){
                Seller_Entertainment::where('seller_id',$request->id)->delete();
                for($i=0 ; $i < count($request->entertainment) ; $i++){
                    $entertainment = new Seller_Entertainment();
                    $entertainment->seller_id = $request->id;
                    $entertainment->entertainment_id = $request->entertainment[$i];
                    //dd($entertainment);
                    $entertainment->save();
                }
            }

            if($request->safety){
                Seller_Safety::where('seller_id',$request->id)->delete();
                for($i=0 ; $i < count($request->safety) ; $i++){
                    $safety = new Seller_Safety();
                    $safety->seller_id = $request->id;
                    $safety->safety_id = $request->safety[$i];
                    $safety->save();
                }
            }

            if($request->seat){
                Seller_Seat::where('seller_id',$request->id)->delete();
                for($i=0 ; $i < count($request->seat) ; $i++){
                    $seat = new Seller_Seat();
                    $seat->seller_id = $request->id;
                    $seat->seat_id = $request->seat[$i];
                    $seat->save();
                }
            }

            if($request->window){
                Seller_Window::where('seller_id',$request->id)->delete();
                for($i=0 ; $i < count($request->window) ; $i++){
                    $window = new Seller_Window();
                    $window->seller_id = $request->id;
                    $window->window_id = $request->window[$i];
                    $window->save();
                }
            }

            if($request->other_feature){
                Seller_Other_Feature::where('seller_id',$request->id)->delete();
                for($i=0 ; $i < count($request->other_feature) ; $i++){
                    $other_feature = new Seller_Other_Feature();
                    $other_feature->seller_id = $request ->id;
                    $other_feature->other_feature_id = $request->other_feature[$i];
                    $other_feature->save();
                }
            }

            $request->session()->flash('alert-success', 'Data successfully updated!');
            return redirect()->action('Dashboard\CarsController@buy')->with('CarToEdit', $Car)->with('doneMessage2',
                __('backend.saveDone'));
        } else {
            $request->session()->flash('alert-danger', 'Something went wrong!');
            return redirect()->action('Dashboard\CarsController@index');
        }
    }

    public function updateSell(Request $request, $id)
    {
        //dd($request->all());
        // Check Permissions
        if (!@Auth::user()->permissionsGroup->edit_status) {
            return Redirect::to(route('NoPermission'))->send();
        }
        //
        if (@Auth::user()->permissionsGroup->view_status) {
            $Car = Car::where('created_by', '=', Auth::user()->id)->find($id);
        } else {
            $Car = Car::find($id);
        }
        if (!empty($Car)) {

        
        $this->validate($request, [
            'email' => 'email',
            'file' => 'mimes:png,jpeg,jpg,gif,svg'
        ]);
  
            // End of Upload Files
        //dd($request->all());
            
        $Car = Seller::where("id",$request->id)->first();
            //dd($request->id);

        $Car->car_title = $request->car_title;
        $Car->car_condition = $request->car_condition;
        $Car->made_in = $request->made_in;
        $Car->brand = $request->brand;
        $Car->car_model = $request->car_model;
        $Car->menufacturing_year = $request->menufacturing_year;
        $Car->body_type = $request->body_type;

        $Car->milage = $request->milage;
        //fuel_type
        $Car->engine_capacity = $request->engine_capacity;
        $Car->transmission = $request->transmission;
        $Car->drive_type = $request->drive_type;
        $Car->exterior_color = $request->exterior_color;
        $Car->interior_color = $request->interior_color;
        $Car->registration_year = $request->registration_year;
        $Car->registration_serial = $request->registration_serial;
        $Car->registration_city = $request->registration_city;
        $Car->seats = $request->seats;

        $Car->tax_token_expaire = date('Y-m-d',strtotime($request->tax_token_expaire));
        $Car->fitnes_exspaire = date('Y-m-d',strtotime($request->fitnes_exspaire));
        $Car->bank_loan = $request->bank_loan;
        $Car->name_transfer = $request->name_transfer;
        $Car->price = $request->price;
        
        $Car->car_status = 2;
        $Car->home_feature = $request->home_feature;
        $Car->car_details = $request->car_details;
        $Car->video_url = $request->video_url;
        $Car->status = $request->status;

        if ($request->car_photo) {
            for($i=0 ; $i < count($request->car_photo) ; $i++){
                $seller_car_image  = new SellerCarImage();
                $seller_car_image->seller_id = $Car->id;
                $seller_car_image->car_image = $request->car_photo[$i];
                $seller_car_image->save();
            }
        }
            
            $Car->save();

            if($request->fuel_type){
                Seller_fuel_type::where('seller_id',$request->id)->delete();
                for($i=0 ; $i < count($request->fuel_type) ; $i++){
                    $fuel_type = new Seller_fuel_type();
                    $fuel_type->seller_id = $request->id;
                    $fuel_type->fuel_type_id = $request->fuel_type[$i];
                    $fuel_type->save();
                }
            }

            if($request->comfort){
                Seller_Comfort::where('seller_id',$request->id)->delete();
                for($i=0 ; $i < count($request->comfort) ; $i++){
                    $comfort = new Seller_Comfort();
                    $comfort->seller_id = $request->id;
                    $comfort->comfort_id = $request->comfort[$i];
                    $comfort->save();
                }
            }
            //dd($request->entertainment[0]);
            if($request->entertainment){
                Seller_Entertainment::where('seller_id',$request->id)->delete();
                for($i=0 ; $i < count($request->entertainment) ; $i++){
                    $entertainment = new Seller_Entertainment();
                    $entertainment->seller_id = $request->id;
                    $entertainment->entertainment_id = $request->entertainment[$i];
                    //dd($entertainment);
                    $entertainment->save();
                }
            }

            if($request->safety){
                Seller_Safety::where('seller_id',$request->id)->delete();
                for($i=0 ; $i < count($request->safety) ; $i++){
                    $safety = new Seller_Safety();
                    $safety->seller_id = $request->id;
                    $safety->safety_id = $request->safety[$i];
                    $safety->save();
                }
            }

            if($request->seat){
                Seller_Seat::where('seller_id',$request->id)->delete();
                for($i=0 ; $i < count($request->seat) ; $i++){
                    $seat = new Seller_Seat();
                    $seat->seller_id = $request->id;
                    $seat->seat_id = $request->seat[$i];
                    $seat->save();
                }
            }

            if($request->window){
                Seller_Window::where('seller_id',$request->id)->delete();
                for($i=0 ; $i < count($request->window) ; $i++){
                    $window = new Seller_Window();
                    $window->seller_id = $request->id;
                    $window->window_id = $request->window[$i];
                    $window->save();
                }
            }

            if($request->other_feature){
                Seller_Other_Feature::where('seller_id',$request->id)->delete();
                for($i=0 ; $i < count($request->other_feature) ; $i++){
                    $other_feature = new Seller_Other_Feature();
                    $other_feature->seller_id = $request ->id;
                    $other_feature->other_feature_id = $request->other_feature[$i];
                    $other_feature->save();
                }
            }

            $request->session()->flash('alert-success', 'Data successfully updated!');
            return redirect()->action('Dashboard\CarsController@sell')->with('CarToEdit', $Car)->with('doneMessage2',
                __('backend.saveDone'));
        } else {
            $request->session()->flash('alert-danger', 'Something went wrong!');
            return redirect()->action('Dashboard\CarsController@index');
        }
    }

    public function updateExchange(Request $request, $id)
    {
        //dd($request->all());
        // Check Permissions
        if (!@Auth::user()->permissionsGroup->edit_status) {
            return Redirect::to(route('NoPermission'))->send();
        }
        //
        if (@Auth::user()->permissionsGroup->view_status) {
            $Car = Car::where('created_by', '=', Auth::user()->id)->find($id);
        } else {
            $Car = Car::find($id);
        }
        if (!empty($Car)) {

        
        $this->validate($request, [
            'email' => 'email',
            'file' => 'mimes:png,jpeg,jpg,gif,svg'
        ]);
  
            // End of Upload Files
        //dd($request->all());
            
        $Car = Seller::where("id",$request->id)->first();
            //dd($request->id);

        $Car->car_title = $request->car_title;
        $Car->car_condition = $request->car_condition;
        $Car->made_in = $request->made_in;
        $Car->brand = $request->brand;
        $Car->car_model = $request->car_model;
        $Car->menufacturing_year = $request->menufacturing_year;
        $Car->body_type = $request->body_type;

        $Car->milage = $request->milage;
        //fuel_type
        $Car->engine_capacity = $request->engine_capacity;
        $Car->transmission = $request->transmission;
        $Car->drive_type = $request->drive_type;
        $Car->exterior_color = $request->exterior_color;
        $Car->interior_color = $request->interior_color;
        $Car->registration_year = $request->registration_year;
        $Car->registration_serial = $request->registration_serial;
        $Car->registration_city = $request->registration_city;
        $Car->seats = $request->seats;

        $Car->tax_token_expaire = date('Y-m-d',strtotime($request->tax_token_expaire));
        $Car->fitnes_exspaire = date('Y-m-d',strtotime($request->fitnes_exspaire));
        $Car->bank_loan = $request->bank_loan;
        $Car->name_transfer = $request->name_transfer;
        $Car->price = $request->price;
        
        $Car->car_status = 2;
        $Car->home_feature = $request->home_feature;
        $Car->car_details = $request->car_details;
        $Car->video_url = $request->video_url;

        $Car->status = $request->status;

        if ($request->car_photo) {
            for($i=0 ; $i < count($request->car_photo) ; $i++){
                $seller_car_image  = new SellerCarImage();
                $seller_car_image->seller_id = $Car->id;
                $seller_car_image->car_image = $request->car_photo[$i];
                $seller_car_image->save();
            }
        }
            
            $Car->save();

            if($request->fuel_type){
                Seller_fuel_type::where('seller_id',$request->id)->delete();
                for($i=0 ; $i < count($request->fuel_type) ; $i++){
                    $fuel_type = new Seller_fuel_type();
                    $fuel_type->seller_id = $request->id;
                    $fuel_type->fuel_type_id = $request->fuel_type[$i];
                    $fuel_type->save();
                }
            }

            if($request->comfort){
                Seller_Comfort::where('seller_id',$request->id)->delete();
                for($i=0 ; $i < count($request->comfort) ; $i++){
                    $comfort = new Seller_Comfort();
                    $comfort->seller_id = $request->id;
                    $comfort->comfort_id = $request->comfort[$i];
                    $comfort->save();
                }
            }
            //dd($request->entertainment[0]);
            if($request->entertainment){
                Seller_Entertainment::where('seller_id',$request->id)->delete();
                for($i=0 ; $i < count($request->entertainment) ; $i++){
                    $entertainment = new Seller_Entertainment();
                    $entertainment->seller_id = $request->id;
                    $entertainment->entertainment_id = $request->entertainment[$i];
                    //dd($entertainment);
                    $entertainment->save();
                }
            }

            if($request->safety){
                Seller_Safety::where('seller_id',$request->id)->delete();
                for($i=0 ; $i < count($request->safety) ; $i++){
                    $safety = new Seller_Safety();
                    $safety->seller_id = $request->id;
                    $safety->safety_id = $request->safety[$i];
                    $safety->save();
                }
            }

            if($request->seat){
                Seller_Seat::where('seller_id',$request->id)->delete();
                for($i=0 ; $i < count($request->seat) ; $i++){
                    $seat = new Seller_Seat();
                    $seat->seller_id = $request->id;
                    $seat->seat_id = $request->seat[$i];
                    $seat->save();
                }
            }

            if($request->window){
                Seller_Window::where('seller_id',$request->id)->delete();
                for($i=0 ; $i < count($request->window) ; $i++){
                    $window = new Seller_Window();
                    $window->seller_id = $request->id;
                    $window->window_id = $request->window[$i];
                    $window->save();
                }
            }

            if($request->other_feature){
                Seller_Other_Feature::where('seller_id',$request->id)->delete();
                for($i=0 ; $i < count($request->other_feature) ; $i++){
                    $other_feature = new Seller_Other_Feature();
                    $other_feature->seller_id = $request ->id;
                    $other_feature->other_feature_id = $request->other_feature[$i];
                    $other_feature->save();
                }
            }

            $request->session()->flash('alert-success', 'Data successfully updated!');
            return redirect()->action('Dashboard\CarsController@exchange')->with('CarToEdit', $Car)->with('doneMessage2',
                __('backend.saveDone'));
        } else {
            $request->session()->flash('alert-danger', 'Something went wrong!');
            return redirect()->action('Dashboard\CarsController@index');
        }
    }

    

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function editGroup($id)
    {
        // Check Permissions
        if (!@Auth::user()->permissionsGroup->edit_status) {
            return Redirect::to(route('NoPermission'))->send();
        }
        //
        // General for all pages
        $GeneralWebmasterSections = WebmasterSection::where('status', '=', '1')->orderby('row_no', 'asc')->get();
        // General END

        if (@Auth::user()->permissionsGroup->view_status) {
            $EditCarsGroup = CarsGroup::where('created_by', '=', Auth::user()->id)->find($id);
        } else {
            $EditCarsGroup = CarsGroup::find($id);
        }
        if (!empty($EditCarsGroup)) {
            
            return redirect()->action('Dashboard\CarsController@all')->with('EditCarsGroup', $EditCarsGroup);
        } else {
            dd($EditCarsGroup);
            return redirect()->action('Dashboard\CarsController@all');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function updateGroup(Request $request, $id)
    {
        //
        $CarsGroup = CarsGroup::find($id);
        if (!empty($CarsGroup)) {
            $CarsGroup->name = $request->name;
            $CarsGroup->updated_by = Auth::user()->id;
            $CarsGroup->save();
        }
        return redirect()->action('Dashboard\CarsController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy_edit($id)
    {
        // Check Permissions
        //dd($id);
        $previous_image = SellerCarImage::where('id',$id)->first()->car_image;
        //dd(asset('uploads/car_images/full/'.$previous_image));
        
        if (asset('files/'.$previous_image)){
                //unlink('/home2/sislamcarscom/public_html/public/files/'.$previous_image);
            }
        
        if (SellerCarImage::where('id',$id)->delete()) {
            
            $data = array(
                'success' => true,
                'message' => 'Data deleted successfully.'
            );
        } else {
            $data = array(

                'success' => false,
                'message' => 'Data delete unsuccessful.'
            );
        }
        return $data;
        //return redirect()->action('Dashboard\CarsController@index');

    }
    
    public function destroy($id)
    {
        // Check Permissions
        //dd($id);
        if (Seller::where('id',$id)->delete()) {
                SellerCarImage::where('seller_id',$id)->delete();
                Seller_fuel_type::where('seller_id',$id)->delete();
                Seller_Comfort::where('seller_id',$id)->delete();
                Seller_Entertainment::where('seller_id',$id)->delete();
                Seller_Safety::where('seller_id',$id)->delete();
                Seller_Seat::where('seller_id',$id)->delete();
                Seller_Window::where('seller_id',$id)->delete();
                Seller_Other_Feature::where('seller_id',$id)->delete();

           //return redirect()->action('Dashboard\CarsController@index');
           return redirect()->action('Dashboard\CarsController@all')->with('doneMessage2',
                __('backend.saveDone'));

        }
    }

    public function destroyGroup($id)
    {
        // Check Permissions
        if (!@Auth::user()->permissionsGroup->delete_status) {
            return Redirect::to(route('NoPermission'))->send();
        }
        //
        if (@Auth::user()->permissionsGroup->view_status) {
            $CarsGroup = CarsGroup::where('created_by', '=', Auth::user()->id)->find($id);
        } else {
            $CarsGroup = CarsGroup::find($id);
        }
        if (!empty($CarsGroup)) {
            $CarsGroup->delete();
            return redirect()->action('Dashboard\CarsController@index');
        } else {
            return redirect()->action('Dashboard\CarsController@index');
        }
    }

    /**
     * Update all selected resources in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param buttonNames , array $ids[]
     * @return \Illuminate\Http\Response
     */
    public function updateAll(Request $request)
    {
        //
        if ($request->ids != "") {
            if ($request->action == "activate") {
                Car::wherein('id', $request->ids)
                    ->update(['status' => 1]);

            } elseif ($request->action == "block") {
                Car::wherein('id', $request->ids)
                    ->update(['status' => 0]);

            } elseif ($request->action == "delete") {
                // Check Permissions
                if (!@Auth::user()->permissionsGroup->delete_status) {
                    return Redirect::to(route('NoPermission'))->send();
                }
                // Delete Cars file
                $Cars = Car::wherein('id', $request->ids)->get();
                foreach ($Cars as $Car) {
                    if ($Car->photo != "") {
                        File::delete($this->getUploadPath() . $Car->photo);
                    }
                }

                Car::wherein('id', $request->ids)
                    ->delete();

            }
        }
        return redirect()->action('Dashboard\CarsController@index')->with('doneMessage', __('backend.saveDone'));
    }

    public function all(Request $request)
    {
        //dd('d');
        $GeneralWebmasterSections = WebmasterSection::where('status', '=', '1')->orderby('row_no', 'asc')->get();
        // General END
        if (@Auth::user()->permissionsGroup->view_status) {
            $SellerCars = Seller::where('created_by', '=', Auth::user()->id)->orderby('id', 'asc')->paginate(env('BACKEND_PAGINATION'));
        } else {
            $SellerCars = Seller::with('images',
                'condition',
                'car_brand',
                'model',
                'bodytype',
                'car_exterior_color',
                'drive_type',
                'car_transmission')->orderby('id', 'desc')->get();
        }
        // dd($SellerCars);
        return view("dashboard.cars.all", compact("SellerCars", "GeneralWebmasterSections"));

    }

    public function exchange(Request $request)
    {
        //dd('d');
        $GeneralWebmasterSections = WebmasterSection::where('status', '=', '1')->orderby('row_no', 'asc')->get();
        // General END
        if (@Auth::user()->permissionsGroup->view_status) {
            $ExchangeCars = Seller::where('created_by', '=', Auth::user()->id)->orderby('id', 'asc')->paginate(env('BACKEND_PAGINATION'));
        } else {
            $ExchangeCars = Seller::join('car_exchange','car_exchange.seller_car_id','=','seller.id')
            ->with('images',
                'condition',
                'car_brand',
                'model',
                'bodytype',
                'car_exterior_color',
                'drive_type',
                'car_transmission')->orderby('car_exchange.id', 'desc')->get();
        }
        // dd($ExchangeCars);
        return view("dashboard.cars.exchange", compact("ExchangeCars", "GeneralWebmasterSections"));

    }

    public function buy(Request $request)
    {
        $GeneralWebmasterSections = WebmasterSection::where('status', '=', '1')->orderby('row_no', 'asc')->get();
        if (@Auth::user()->permissionsGroup->view_status) {
            $BuyCars = Seller::where('created_by', '=', Auth::user()->id)->orderby('id', 'asc')->paginate(env('BACKEND_PAGINATION'));
        } else {
            $BuyCars = Seller::join('car_buy','car_buy.car_id','=','seller.id')
                ->with('images',
                    'condition',
                    'car_brand',
                    'model',
                    'bodytype',
                    'car_exterior_color',
                    'drive_type',
                    'car_transmission')->orderby('seller.id', 'desc')->get();
                    //dd($BuyCars);
        }
        return view("dashboard.cars.buy", compact("BuyCars", "GeneralWebmasterSections"));
    }

    public function sell(Request $request)
    {
        $GeneralWebmasterSections = WebmasterSection::where('status', '=', '1')->orderby('row_no', 'asc')->get();
        if (@Auth::user()->permissionsGroup->view_status) {
            $SellCars = Seller::where('created_by', '=', Auth::user()->id)->orderby('id', 'asc')->paginate(env('BACKEND_PAGINATION'));
        } else {
            $SellCars = Seller::where('customer_id','!=',0)->with('images',
                    'condition',
                    'car_brand',
                    'model',
                    'bodytype',
                    'car_exterior_color',
                    'drive_type',
                    'car_transmission')->orderby('seller.id', 'desc')->get();
            //dd($SellCars);
        }
        return view("dashboard.cars.sell", compact("SellCars", "GeneralWebmasterSections"));
    }
}
