<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
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
use App\Models\RegistrationSerial;
use App\Models\Safety;
use App\Models\Seat;
use App\Models\Seller;
use App\Models\Seller_Comfort;
use App\Models\Seller_Entertainment;
use App\Models\Seller_fuel_type;
use App\Models\Seller_Other_Feature;
use App\Models\Seller_Safety;
use App\Models\Seller_Seat;
use App\Models\Seller_Window;
use App\Models\SellerCarImage;
use App\Models\SellerImage;
use App\Models\Setting;
use App\Models\SmartendCustomer;
use App\Models\Thana;
use App\Models\Topic;
use App\Models\Transmission;
use App\Models\WebmasterSetting;
use App\Models\Window;
use Illuminate\Http\Request;
use Validator;

class carExchangeController extends Controller
{
    public function exchangeBasic(Request $request)
    {
        $WebmasterSettings = WebmasterSetting::find(1);
        $WebsiteSettings = Setting::find(1);
        $site_desc_var = 'site_desc_' . @Helper::currentLanguage()->code;
        $site_keywords_var = 'site_keywords_' . @Helper::currentLanguage()->code;
        $PageTitle = '';
        $PageDescription = $WebsiteSettings->$site_desc_var;
        $PageKeywords = $WebsiteSettings->$site_keywords_var;
        $LatestNews = $this->latest_topics($WebmasterSettings->latest_news_section_id);
        $CarConditions = CarCondition::where('status', 1)->get();
        $CarBrands = CarBrand::where('status', 1)->get();
        $CarModels = CarModel::where('status', 1)->get();
        $BodyTypes = BodyType::where('status', 1)->get();
        $FuelTypes = FuelType::where('status', 1)->get();
        $Transmissions = Transmission::where('status', 1)->get();
        $Drives = Drive::where('status', 1)->get();
        $ExteriorColors = ExteriorColor::where('status', 1)->get();
        $InteriorColors = InteriorColor::where('status', 1)->get();
        $Districts = District::where('status', 1)->get();
        $Comforts = Comfort::where('status', 1)->get();
        $Entertainments = Entertainment::where('status', 1)->get();
        $Safeties = Safety::where('status', 1)->get();
        $Seats = Seat::where('status', 1)->get();
        $Windows = Window::where('status', 1)->get();
        $OtherFeatures = OtherFeature::where('status', 1)->get();
        $District = District::where('status', 1)->get();
        $Thana = Thana::where('status', 1)->get();
        $RegistrationSerial = RegistrationSerial::where('status', 1)->get();

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'mobile' => 'required',
            //'car_condition' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->withErrors($validator)
                ->withInput();
        }

        $save_data = [
            'name' => $request->name,
            'email' => $request->email,
            'thana' => $request->thana,
            'district' => $request->district,
            'address_line1' => $request->address1,
            'sell_car' => 1,
        ];
        $data = SmartendCustomer::updateOrCreate(['mobile' => $request->mobile], $save_data);
        $GetID = $data->id;
        return view('frontEnd.exchangeCarDetails', compact('data', 'WebsiteSettings', 'WebmasterSettings', 'PageTitle', 'PageDescription', 'PageKeywords', 'PageTitle', 'CarConditions', 'CarBrands', 'CarModels', 'BodyTypes', 'FuelTypes', 'Transmissions', 'Drives', 'ExteriorColors', 'InteriorColors', 'Districts', 'Comforts', 'Entertainments', 'Safeties', 'Seats', 'Windows', 'District', 'Thana', 'OtherFeatures', 'PageDescription', 'LatestNews', 'GetID', 'PageKeywords', 'RegistrationSerial'));
    }

    public function latest_topics($section_id, $limit = 3)
    {
        return Topic::where([['status', 1], ['webmaster_id', $section_id], ['expire_date', '>=', date('Y-m-d')], ['expire_date', '<>', null]])
            ->orwhere([['status', 1], ['webmaster_id', $section_id], ['expire_date', null]])
            ->orderby('row_no', 'desc')
            ->limit($limit)
            ->get();
    }

    public function exchange_basic_data_save(Request $request)
    {
        //dd($request->all());
        $WebmasterSettings = WebmasterSetting::find(1);
        $WebsiteSettings = Setting::find(1);

        $site_desc_var = 'site_desc_' . @Helper::currentLanguage()->code;
        $site_keywords_var = 'site_keywords_' . @Helper::currentLanguage()->code;

        $PageTitle = __('frontend.BAYCARTITLE'); // will show default site Title
        $PageDescription = $WebsiteSettings->$site_desc_var;
        $PageKeywords = $WebsiteSettings->$site_keywords_var;
        $LatestNews = $this->latest_topics($WebmasterSettings->latest_news_section_id);

        $seller_data = new Seller();
        $seller_data->car_title = isset($request->car_title) ? $request->car_title : '';
        $seller_data->car_condition = $request->car_condition;
        $seller_data->made_in = 0; //$request->made_in;
        $seller_data->brand = $request->car_brand;
        $seller_data->car_model = $request->car_model;
        $seller_data->menufacturing_year = $request->menufacturing_year;
        $seller_data->body_type = $request->body_type;
        $seller_data->milage = $request->milage;
        //fuel_type
        $seller_data->engine_capacity = $request->engine_capacity;
        $seller_data->transmission = $request->transmission;
        $seller_data->drive_type = $request->drive_type;
        $seller_data->exterior_color = $request->exterior_color;
        $seller_data->interior_color = $request->interior_color;
        $seller_data->registration_year = $request->registration_year;
        $seller_data->registration_serial = $request->registration_serial;
        $seller_data->registration_city = $request->registration_city;
        $seller_data->registration_number = $request->registration_serial . ' - ' . $request->registration_number;
        $seller_data->seats = $request->seats;
        $seller_data->tax_token_expaire = date('Y-m-d', strtotime($request->tax_token_expaire));
        $seller_data->fitnes_exspaire = date('Y-m-d', strtotime($request->fitnes_exspaire));
        $seller_data->bank_loan = $request->bank_loan;
        $seller_data->name_transfer = $request->name_transfer;
        $seller_data->price = $request->price;
        $seller_data->status = 1;
        $seller_data->car_status = 3;
        $seller_data->home_feature = ''; //$request->home_feature;
        $seller_data->car_details = $request->car_details;
        $seller_data->video_url = $request->video_url;
        $seller_data->created_by = $request->GetID;
        $seller_data->customer_id = $request->GetID;
        $seller_data->save();

        if ($request->car_photo) {
            for ($i = 0; $i < count($request->car_photo); $i++) {
                $seller_car_image = new SellerCarImage();
                $seller_car_image->seller_id = $seller_data->id;
                $seller_car_image->car_image = "https://www.sislamcars.com.bd/files/" . $request->car_photo[$i];
                $seller_car_image->save();
            }
        }

        $seller_image = new SellerImage();
        if ($request->file('smart_card')) {
            $md5Name = md5_file($request->file('smart_card')->getRealPath()) . time();
            $mimeType = $request->file('smart_card')->guessExtension();
            $path = $request->file('smart_card')->storeAs('uploads', $md5Name . '.' . $mimeType, 'public');
            $seller_image->smart_card_photo = "https://www.sislamcars.com.bd/storage/uploads/" . $path;
        }
        if ($request->file('tax_token')) {
            $md5Name = md5_file($request->file('tax_token')->getRealPath()) . time();
            $mimeType = $request->file('tax_token')->guessExtension();
            $path = $request->file('tax_token')->storeAs('uploads', $md5Name . '.' . $mimeType, 'public');
            $seller_image->tax_token_photo = "https://www.sislamcars.com.bd/storage/uploads/" . $path;
        }
        if ($request->file('fitness')) {
            $md5Name = md5_file($request->file('fitness')->getRealPath()) . time();
            $mimeType = $request->file('fitness')->guessExtension();
            $path = $request->file('fitness')->storeAs('uploads', $md5Name . '.' . $mimeType, 'public');
            $seller_image->fitness_photo = "https://www.sislamcars.com.bd/storage/uploads/" . $path;
        }
        if ($request->file('bank_clearance')) {
            $md5Name = md5_file($request->file('bank_clearance')->getRealPath()) . time();
            $mimeType = $request->file('bank_clearance')->guessExtension();
            $path = $request->file('bank_clearance')->storeAs('uploads', $md5Name . '.' . $mimeType, 'public');
            $seller_image->bank_clearance_photo = "https://www.sislamcars.com.bd/storage/uploads/" . $path;
        }
        $seller_image->seller_id = $seller_data->id;
        $seller_image->save();

        if ($request->fuel_type) {
            for ($i = 0; $i < count($request->fuel_type); $i++) {
                $fuel_type = new Seller_fuel_type();
                $fuel_type->seller_id = $seller_data->id;
                $fuel_type->fuel_type_id = $request->fuel_type[$i];
                $fuel_type->save();
            }
        }

        if ($request->comfort) {
            for ($i = 0; $i < count($request->comfort); $i++) {
                $comfort = new Seller_Comfort();
                $comfort->seller_id = $seller_data->id;
                $comfort->comfort_id = $request->comfort[$i];
                $comfort->save();
            }
        }
        //dd($request->entertainment[0]);
        if ($request->entertainment) {
            for ($i = 0; $i < count($request->entertainment); $i++) {
                $entertainment = new Seller_Entertainment();
                $entertainment->seller_id = $seller_data->id;
                $entertainment->entertainment_id = $request->entertainment[$i];
                //dd($entertainment);
                $entertainment->save();
            }
        }

        if ($request->safety) {
            for ($i = 0; $i < count($request->safety); $i++) {
                $safety = new Seller_Safety();
                $safety->seller_id = $seller_data->id;
                $safety->safety_id = $request->safety[$i];
                $safety->save();
            }
        }

        if ($request->seat) {
            for ($i = 0; $i < count($request->seat); $i++) {
                $seat = new Seller_Seat();
                $seat->seller_id = $seller_data->id;
                $seat->seat_id = $request->seat[$i];
                $seat->save();
            }
        }

        if ($request->window) {
            for ($i = 0; $i < count($request->window); $i++) {
                $window = new Seller_Window();
                $window->seller_id = $seller_data->id;
                $window->window_id = $request->window[$i];
                $window->save();
            }
        }

        if ($request->other_feature) {
            for ($i = 0; $i < count($request->other_feature); $i++) {
                $other_feature = new Seller_Other_Feature();
                $other_feature->seller_id = $seller_data->id;
                $other_feature->other_feature_id = $request->other_feature[$i];
                $other_feature->save();
            }
        }

        $seller_car_id = $seller_data->id;
        $customer_id = $request->GetID;
        //dd($seller_car_id);
        //dd($customer_id);

        $dashboardCars = Seller::with('images', 'car_images', 'seller_fuel_types.fuel_type_name', 'condition', 'car_brand', 'model', 'bodytype', 'car_exterior_color', 'car_drive_type', 'car_transmission')
            ->where('status', '!=', 0)
            ->where('home_feature', 1)
            ->where('car_status', 2)
            ->take(9)
            ->get();

        return view('frontEnd.car_exchange_list', compact('WebsiteSettings', 'WebmasterSettings', 'PageTitle', 'PageDescription', 'PageKeywords', 'PageTitle', 'LatestNews', 'dashboardCars', 'seller_car_id', 'customer_id'));
    }

    public function exchangeAcarMore(Request $request)
    {
        //dd($request->all());
        $seller_car_id = $request->SellerCarID;
        $customer_id = $request->CustomerID;

        $ID = $request->msg_id;
        $dashboardCars = Seller::with('images', 'car_images', 'seller_fuel_types.fuel_type_name', 'condition', 'car_brand', 'model', 'bodytype', 'car_exterior_color', 'car_drive_type', 'car_transmission')
            ->where('status', '!=', 0)
            ->where('home_feature', 1)
            ->where('car_status', 2)
            ->where('id', '>', $ID)
            ->take(6)
            ->get();
        //dd($dashboardCars);
        //dd(count($dashboardCars)==0);

        return view('frontEnd.exchangeACarMore', compact('dashboardCars', 'seller_car_id', 'customer_id'));
    }


    public function carExchangeDetails(Request $request)
    {
        //dd($request->all());

        $CustomerID = $request->CustomerID;
        $SellerCarID = $request->SellerCarID;
        $ShowroomCarID = $request->ShowroomCarID;

        $WebmasterSettings = WebmasterSetting::find(1);
        $WebsiteSettings = Setting::find(1);
        $site_desc_var = 'site_desc_' . @Helper::currentLanguage()->code;
        $site_keywords_var = 'site_keywords_' . @Helper::currentLanguage()->code;
        $PageTitle = '';
        $PageDescription = $WebsiteSettings->$site_desc_var;
        $PageKeywords = $WebsiteSettings->$site_keywords_var;
        $LatestNews = $this->latest_topics($WebmasterSettings->latest_news_section_id);

        $carDetails = Seller::with('images', 'car_images', 'seller_fuel_types.fuel_type_name', 'condition', 'car_brand', 'model', 'bodytype', 'car_exterior_color', 'car_drive_type', 'car_transmission')
            ->where('status', '!=', 0)
            ->where('id', $ShowroomCarID)
            ->first();

        return view('frontEnd.carExchangeDetails', compact('WebsiteSettings', 'WebmasterSettings', 'PageTitle', 'PageDescription', 'PageKeywords', 'PageTitle', 'LatestNews', 'carDetails', 'CustomerID', 'SellerCarID', 'ShowroomCarID'));
    }

    public function exchangeSubmitForm(Request $request)
    {

        $WebmasterSettings = WebmasterSetting::find(1);
        $WebsiteSettings = Setting::find(1);
        $site_desc_var = 'site_desc_' . @Helper::currentLanguage()->code;
        $site_keywords_var = 'site_keywords_' . @Helper::currentLanguage()->code;

        $PageTitle = __('frontend.BAYCARTITLE'); // will show default site Title
        $PageDescription = $WebsiteSettings->$site_desc_var;
        $PageKeywords = $WebsiteSettings->$site_keywords_var;
        $LatestNews = $this->latest_topics($WebmasterSettings->latest_news_section_id);
        $District = District::where('status', 1)->get();
        $Thana = Thana::where('status', 1)->get();
        //dd($customer);

        return view('frontEnd.car_exchange_form_initial', compact('WebsiteSettings', 'WebmasterSettings', 'PageTitle', 'PageDescription', 'PageKeywords', 'PageTitle', 'LatestNews', "Thana", "District"));
    }

    public function exchangeSubmit(Request $request)
    {
        //dd($request->all());
        $CustomerID = $request->CustomerID;
        $SellerCarID = $request->SellerCarID;
        $ShowroomCarID = $request->ShowroomCarID;

        $WebmasterSettings = WebmasterSetting::find(1);
        $WebsiteSettings = Setting::find(1);
        $site_desc_var = 'site_desc_' . @Helper::currentLanguage()->code;
        $site_keywords_var = 'site_keywords_' . @Helper::currentLanguage()->code;

        $PageTitle = __('frontend.BAYCARTITLE'); // will show default site Title
        $PageDescription = $WebsiteSettings->$site_desc_var;
        $PageKeywords = $WebsiteSettings->$site_keywords_var;
        $LatestNews = $this->latest_topics($WebmasterSettings->latest_news_section_id);

        $District = District::where('status', 1)->get();
        $Thana = Thana::where('status', 1)->get();

        $Customer = Customer::where('id', $CustomerID)->first();
        //dd($customer);

        return view('frontEnd.car_exchange_form', compact('WebsiteSettings', 'WebmasterSettings', 'PageTitle', 'PageDescription', 'PageKeywords', 'PageTitle', 'LatestNews', 'Customer', 'CustomerID', 'SellerCarID', 'ShowroomCarID', "District", "Thana"));
    }

    public function exchangeSubmitFinal(Request $request)
    {
        //dd($request->all());

        $WebmasterSettings = WebmasterSetting::find(1);
        $WebsiteSettings = Setting::find(1);
        $site_desc_var = 'site_desc_' . @Helper::currentLanguage()->code;
        $site_keywords_var = 'site_keywords_' . @Helper::currentLanguage()->code;
        $PageTitle = __('frontend.BAYCARTITLE'); // will show default site Title
        $PageDescription = $WebsiteSettings->$site_desc_var;
        $PageKeywords = $WebsiteSettings->$site_keywords_var;
        $LatestNews = $this->latest_topics($WebmasterSettings->latest_news_section_id);


        $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'mobile' => 'required',
            'address1' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $save_data = [
            'name' => $request->name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'address1' => $request->address1,
            'address2' => $request->address1,
            'exchange_car' => 1,
        ];

        $data = SmartendCustomer::updateOrCreate(['mobile' => $request->mobile], $save_data);

        $CustomerID = $data->id;
        $SellerCarID = $request->SellerCarID;
        $ShowroomCarID = $request->ShowroomCarID;

        $Exchange = new CarExchange();
        $Exchange->customer_id = $CustomerID;
        $Exchange->seller_car_id = $SellerCarID;
        $Exchange->showroom_car_id = $ShowroomCarID;
        $Exchange->status = 1;
        $Exchange->save();

        //dd($SellerCarID);
        $carDetailsCarOwner = Seller::with(
            'images',
            'car_images',
            'seller_fuel_types.fuel_type_name',
            'condition',
            'car_brand',
            'model',
            'bodytype',
            'car_exterior_color',
            'car_drive_type',
            'car_transmission',
            'customer_info',
            'seller_car_images'
        )->where('status', '!=', 0)
            ->where('id', $SellerCarID)->first();


        $carDetailsShowroomCar = Seller::with(
            'images',
            'car_images',
            'seller_fuel_types.fuel_type_name',
            'condition',
            'car_brand',
            'model',
            'bodytype',
            'car_exterior_color',
            'car_drive_type',
            'car_transmission',
            'customer_info',
            'seller_car_images'
        )->where('status', '!=', 0)
            ->where('id', $ShowroomCarID)->first();

        $customerDetails = Customer::where('id', $CustomerID)->first();

        $receipient = $customerDetails->mobile;
        $smsText = "Welcome to S Islam Cars\nWe have successfully received your car exchange request. We will contact you very soon.\n\nYour car information:\nCar Brand: " . $carDetailsCarOwner->car_brand->name . "\nCar Model: " . $carDetailsCarOwner->model->name . "\n\nExchange car information:\nCar Brand: " . $carDetailsShowroomCar->car_brand->name . "\nCar Model: " . $carDetailsShowroomCar->model->name . "\nYou can call us to +8801712282178";
        $smsUrl = "http://66.45.237.70/api.php?username=01746555579&password=Rwc@1177!&number=$receipient&message=" . urlencode($smsText) . "";
        //echo($smsUrl);exit();
        $response = file_get_contents($smsUrl);

        //dd($carDetailsShowroomCar);
        return view('frontEnd.thanks_exchange',
            compact(
                "WebsiteSettings",
                "WebmasterSettings",
                "PageTitle",
                "PageDescription",
                "PageKeywords",
                "PageTitle",
                "LatestNews",
                "carDetailsCarOwner",
                "carDetailsShowroomCar",
                "customerDetails"
            )
        )
            ->with('success', __('frontend.SUCESSMSGEXCHANGE'));
        //$request->session()->put('success', __('frontend.SUCESSMSGEXCHANGE'));

        //return redirect()->route('Home', ['success' => __('frontend.SUCESSMSGEXCHANGE')]);
    }
}
