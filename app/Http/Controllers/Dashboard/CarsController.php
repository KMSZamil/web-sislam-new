<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\CarsGroup;
use App\Models\Country;
use App\Http\Requests;
use App\Models\BodyType;
use App\Models\CarBrand;
use App\Models\CarCondition;
use App\Models\CarModel;
use App\Models\Comfort;
use App\Models\District;
use App\Models\Drive;
use App\Models\Entertainment;
use App\Models\ExteriorColor;
use App\Models\FuelType;
use App\Models\InteriorColor;
use App\Models\OtherFeature;
use App\Models\Safety;
use App\Models\Seat;
use App\Models\Seller;
use App\Models\SellerImage;
use App\Models\Thana;
use App\Models\Transmission;
use App\Models\WebmasterSection;
use App\Models\Window;
use Auth;
use File;
use Helper;
use Illuminate\Config;
use Illuminate\Http\Request;
use Redirect;

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
        //
        // General for all pages
        $GeneralWebmasterSections = WebmasterSection::where('status', '=', '1')->orderby('row_no', 'asc')->get();
        //dd($GeneralWebmasterSections);
        // General END

        //List of groups
        if (@Auth::user()->permissionsGroup->view_status) {
            $CarsGroups = CarsGroup::where('created_by', '=', Auth::user()->id)->orderby('id', 'asc')->get();
        } else {
            //$CarsGroups = CarsGroup::orderby('id', 'asc')->get();
            $CarsGroups = 0;
        }
        

        //List of Countries
        $Countries = Country::orderby('title_' . @Helper::currentLanguage()->code, 'asc')->get();

        if (@Auth::user()->permissionsGroup->view_status) {
            if ($group_id > 0) {
                //List of group cars
                $Cars = Car::where('created_by', '=', Auth::user()->id)->where('group_id', '=',
                    $group_id)->orderby('id',
                    'desc')->paginate(env('BACKEND_PAGINATION'));
            } elseif ($group_id == "wait") {
                //List waiting activation Cars
                $Cars = Car::where('created_by', '=', Auth::user()->id)->where('status', '=',
                    '0')->orderby('id',
                    'desc')->paginate(env('BACKEND_PAGINATION'));
            } elseif ($group_id == "blocked") {
                //List waiting activation Cars
                $Cars = Car::where('created_by', '=', Auth::user()->id)->where('status', '=',
                    '2')->orderby('id',
                    'desc')->paginate(env('BACKEND_PAGINATION'));
            } else {
                //List of all cars
                $Cars = Car::where('created_by', '=', Auth::user()->id)->orderby('id',
                    'desc')->paginate(env('BACKEND_PAGINATION'));

            }
        } else {
            if ($group_id > 0) {
                //List of group cars
                $Cars = Car::where('group_id', '=', $group_id)->orderby('id',
                    'desc')->paginate(env('BACKEND_PAGINATION'));
            } elseif ($group_id == "wait") {
                //List waiting activation Cars
                $Cars = Car::where('status', '=', '0')->orderby('id',
                    'desc')->paginate(env('BACKEND_PAGINATION'));
            } elseif ($group_id == "blocked") {
                //List waiting activation Cars
                $Cars = Car::where('status', '=', '2')->orderby('id',
                    'desc')->paginate(env('BACKEND_PAGINATION'));
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


        $search_word = "";



        $CarConditions = CarCondition::where('status',1)->get();
        $CarBrands = CarBrand::where('status',1)->get();
        $CarModels = CarModel::where('status',1)->get();
        $BodyTypes = BodyType::where('status',1)->get();
        $FuelTypes = FuelType::where('status',1)->get();
        $Transmissions = Transmission::where('status',1)->get();
        $Drives = Drive::where('status',1)->get();
        $ExteriorColors = ExteriorColor::where('status',1)->get();
        $InteriorColors = InteriorColor::where('status',1)->get();
        $Districts = District::where('status',1)->get();
        
        $Comforts = Comfort::where('status',1)->get();
        $Entertainments = Entertainment::where('status',1)->get();
        $Safeties = Safety::where('status',1)->get();
        
        $Seats = Seat::where('status',1)->get();
        $Windows = Window::where('status',1)->get();
        $OtherFeatures = OtherFeature::where('status',1)->get();
        $District = District::where('status',1)->get();
        $Thana = Thana::where('status',1)->get();

        return view("dashboard.cars.list",
            compact("Cars", "GeneralWebmasterSections", "CarsGroups", "Countries", "WaitCarsCount",
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
                "Seats",
                "Windows",
                "OtherFeatures",
                "District",
                "Thana"
            ));
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
        // $seller_data = Seller::where('id',$request->GetID)->first();
        $seller_data = new Seller();
        $seller_data->name = $request->name;
        $seller_data->email = $request->email;
        $seller_data->mobile = $request->mobile;
        $seller_data->car_condition = $request->car_condition;
        $seller_data->brand = $request->car_brand;
        $seller_data->car_model = $request->car_model;
        $seller_data->menufacturing_year = $request->car_year;
        $seller_data->engine_capacity = $request->engine_capacity;
        $seller_data->body_type = $request->car_body;
        $seller_data->fuel_type = isset($request->fuel_type) ? implode(',', $request->fuel_type) : '';
        $seller_data->transmission = $request->transmission;
        $seller_data->registration_year = $request->registration_year;
        $seller_data->registration_serial = $request->registration_serial;
        $seller_data->registration_city = $request->registration_city;
        $seller_data->drive_type = $request->drive;
        $seller_data->exterior_color = $request->exterior_color;
        $seller_data->interior_color = $request->interior_color;
        $seller_data->comfort = isset($request->comfort) ? implode(',', $request->comfort) : '';
        $seller_data->enterteinment = isset($request->entertainment) ? implode(',', $request->entertainment) : '';
        $seller_data->safty = isset($request->safety) ? implode(',', $request->safety) : '';
        $seller_data->seats = isset($request->seat) ? implode(',', $request->seat) : '';
        $seller_data->wwindow = isset($request->window) ? implode(',', $request->window) : '';
        $seller_data->others = isset($request->other_feature) ? implode(',', $request->other_feature) : '';
        $seller_data->tax_token_expaire = isset($request->tax_token_exp_date) ? date('Y-m-d', strtotime($request->tax_token_exp_date)) : null;
        $seller_data->fitnes_exspaire = isset($request->fitness_exp_date) ? date('Y-m-d', strtotime($request->fitness_exp_date)) : null;
        $seller_data->bank_loan = $request->bank_loan;
        $seller_data->name_transfer = $request->name_transfer;
        $seller_data->thana = $request->thana;
        $seller_data->district = $request->district;
        $seller_data->address_line1 = $request->address1;
        $seller_data->address_line2 = $request->address2;
        $seller_data->message = $request->sellers_note;
        $seller_data->price = $request->asking_price;
        $seller_data->created_by = 0;
        $seller_data->save();
        $seller_image = new SellerImage();
        if ($request->file('car_photo_1')) {
            $md5Name = md5_file($request->file('car_photo_1')->getRealPath()).time();
            $mimeType = $request->file('car_photo_1')->guessExtension();
            $path = $request->file('car_photo_1')->storeAs('uploads',  $md5Name.'.'.$mimeType  , 'public');
            $seller_image->car_photo_1 = $path;
        }
        if ($request->file('car_photo_2')) {
            $md5Name = md5_file($request->file('car_photo_2')->getRealPath()).time();
            $mimeType = $request->file('car_photo_2')->guessExtension();
            $path = $request->file('car_photo_2')->storeAs('uploads',  $md5Name.'.'.$mimeType  , 'public');
            $seller_image->car_photo_2 = $path;
        }
        if ($request->file('car_photo_3')) {
            $md5Name = md5_file($request->file('car_photo_3')->getRealPath()).time();
            $mimeType = $request->file('car_photo_3')->guessExtension();
            $path = $request->file('car_photo_3')->storeAs('uploads',  $md5Name.'.'.$mimeType  , 'public');
            $seller_image->car_photo_3 = $path;
        }
        if ($request->file('car_photo_4')) {
            $md5Name = md5_file($request->file('car_photo_4')->getRealPath()).time();
            $mimeType = $request->file('car_photo_4')->guessExtension();
            $path = $request->file('car_photo_4')->storeAs('uploads',  $md5Name.'.'.$mimeType  , 'public');
            $seller_image->car_photo_4 = $path;
        }
        if ($request->file('car_photo_5')) {
            $md5Name = md5_file($request->file('car_photo_5')->getRealPath()).time();
            $mimeType = $request->file('car_photo_5')->guessExtension();
            $path = $request->file('car_photo_5')->storeAs('uploads',  $md5Name.'.'.$mimeType  , 'public');
            $seller_image->car_photo_5 = $path;
        }
        if ($request->file('smart_card')) {
            $md5Name = md5_file($request->file('smart_card')->getRealPath()).time();
            $mimeType = $request->file('smart_card')->guessExtension();
            $path = $request->file('smart_card')->storeAs('uploads',  $md5Name.'.'.$mimeType  , 'public');
            $seller_image->smart_card_photo = $path;
        }
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
        $seller_image->seller_id = $seller_data->id;
        $seller_image->save();
        //return Redirect::to('/');

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
        //
        $CarToEdit = Car::find($id);
        if (!empty($CarToEdit)) {
            return redirect()->action('Dashboard\CarsController@index', $CarToEdit->group_id)->with('CarToEdit',
                $CarToEdit);
        } else {
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
            return redirect()->action('Dashboard\CarsController@index')->with('EditCarsGroup', $EditCarsGroup);
        } else {
            return redirect()->action('Dashboard\CarsController@index');
        }
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
                'email' => 'email|required',
                'file' => 'mimes:png,jpeg,jpg,gif,svg'
            ]);


            // Start of Upload Files
            $formFileName = "file";
            $fileFinalName_ar = "";
            if ($request->$formFileName != "") {
                $fileFinalName_ar = time() . rand(1111,
                        9999) . '.' . $request->file($formFileName)->getClientOriginalExtension();
                $path = $this->getUploadPath();
                $request->file($formFileName)->move($path, $fileFinalName_ar);
            }
            // End of Upload Files

            $Car->group_id = $request->group_id;
            $Car->first_name = $request->first_name;
            $Car->last_name = $request->last_name;
            $Car->company = $request->company;
            $Car->email = $request->email;
            $Car->password = $request->password;
            $Car->phone = $request->phone;
            $Car->country_id = $request->country_id;
            $Car->city = $request->city;
            $Car->address = $request->address;
            $Car->address = $request->address;
            $Car->notes = $request->notes;

            if ($fileFinalName_ar != "") {
                // Delete a Car file
                if ($Car->photo != "") {
                    File::delete($this->getUploadPath() . $Car->photo);
                }

                $Car->photo = $fileFinalName_ar;
            }

            $Car->status = $request->status;
            $Car->updated_by = Auth::user()->id;
            $Car->save();
            return redirect()->action('Dashboard\CarsController@index')->with('CarToEdit', $Car)->with('doneMessage2',
                __('backend.saveDone'));
        } else {
            return redirect()->action('Dashboard\CarsController@index');
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
    public function destroy($id)
    {
        // Check Permissions
        if (!@Auth::user()->permissionsGroup->delete_status) {
            return Redirect::to(route('NoPermission'))->send();
        }
        //
        if (@Auth::user()->permissionsGroup->view_status) {
            $Car = Car::where('created_by', '=', Auth::user()->id)->find($id);
        } else {
            $Car = Car::find($id);
        }
        if (!empty($Car)) {
            // Delete a Car file
            if ($Car->photo != "") {
                File::delete($this->getUploadPath() . $Car->photo);
            }

            $Car->delete();
        }
        return redirect()->action('Dashboard\CarsController@index');

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


}
