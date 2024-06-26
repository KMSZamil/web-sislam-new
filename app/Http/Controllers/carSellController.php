<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\BodyType;
use App\Models\CarBrand;
use App\Models\CarCondition;
use App\Models\CarModel;
use App\Models\Comfort;
use App\Models\Customer;
use App\Models\District;
use App\Models\Drive;
use App\Models\Entertainment;
use App\Models\ExteriorColor;
use App\Models\FuelType;
use App\Models\InteriorColor;
use App\Models\Language;
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
use App\Models\SmartendCarCondition;
use App\Models\Thana;
use App\Models\Transmission;
use App\Models\Window;
use Illuminate\Http\Request;
use App\Models\SmartendSeller;
use App\Models\SmartendCustomer;
use App\Models\WebmasterSection;
use App\Models\WebmasterSetting;
use App\Models\Topic;
use App\Models\Setting;
use Helper;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Validator;
use Intervention\Image\ImageManagerStatic as Image;

class carSellController extends Controller
{
    public function test()
    {
        return view('test');
    }

    public function index(Request $request)
    {
        // General Webmaster Settings
        $WebmasterSettings = WebmasterSetting::find(1);

        // General for all pages
        $WebsiteSettings = Setting::find(1);

        $site_desc_var = 'site_desc_' . @Helper::currentLanguage()->code;
        //dd($site_desc_var);
        $site_keywords_var = 'site_keywords_' . @Helper::currentLanguage()->code;

        $PageTitle = ''; // will show default site Title
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
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $save_data = [
            'name' => $request->name,
            'email' => $request->email,
            'sell_car' => 1,
        ];
        $data = SmartendCustomer::updateOrCreate(['mobile' => $request->mobile], $save_data);
        $GetID = $data->id;
        return view('frontEnd.sellCarDetaails', compact('data', 'WebsiteSettings', 'WebmasterSettings', 'PageTitle', 'PageDescription', 'PageKeywords', 'PageTitle', 'CarConditions', 'CarBrands', 'CarModels', 'BodyTypes', 'FuelTypes', 'Transmissions', 'Drives', 'ExteriorColors', 'InteriorColors', 'Districts', 'Comforts', 'Entertainments', 'Safeties', 'Seats', 'Windows', 'District', 'Thana', 'OtherFeatures', 'PageDescription', 'LatestNews', 'GetID', 'PageKeywords', 'RegistrationSerial'));
    }


    public function messengerIntregation()
    {
        $WebmasterSettings = WebmasterSetting::find(1);
        $WebsiteSettings = Setting::find(1);
        $HomeTopics = Topic::where([['status', 1], ['webmaster_id', $WebmasterSettings->home_content1_section_id], ['expire_date', '>=', date("Y-m-d")], ['expire_date', '<>', null]])->orwhere([['status', 1], ['webmaster_id', $WebmasterSettings->home_content1_section_id], ['expire_date', null]])->orderby('row_no', env("FRONTEND_TOPICS_ORDER", "asc"))->limit(12)->get();
        $HomePhotos = Topic::where([['status', 1], ['webmaster_id', $WebmasterSettings->home_content2_section_id], ['expire_date', '>=', date("Y-m-d")], ['expire_date', '<>', null]])->orwhere([['status', 1], ['webmaster_id', $WebmasterSettings->home_content2_section_id], ['expire_date', null]])->orderby('row_no', env("FRONTEND_TOPICS_ORDER", "asc"))->limit(6)->get();
        $HomePartners = Topic::where([['status', 1], ['webmaster_id', $WebmasterSettings->home_content3_section_id], ['expire_date', '>=', date("Y-m-d")], ['expire_date', '<>', null]])->orwhere([['status', 1], ['webmaster_id', $WebmasterSettings->home_content3_section_id], ['expire_date', null]])->orderby('row_no', env("FRONTEND_TOPICS_ORDER", "asc"))->get();
        $LatestNews = $this->latest_topics($WebmasterSettings->latest_news_section_id);

        $SliderBanners = Banner::where('section_id', $WebmasterSettings->home_banners_section_id)->where(
            'status',
            1
        )->orderby('row_no', 'asc')->get();

        $TextBanners = Banner::where('section_id', $WebmasterSettings->home_text_banners_section_id)->where(
            'status',
            1
        )->orderby('row_no', 'asc')->get();

        $site_desc_var = "site_desc_" . @Helper::currentLanguage()->code;
        $site_keywords_var = "site_keywords_" . @Helper::currentLanguage()->code;

        $PageTitle = "";
        $PageDescription = $WebsiteSettings->$site_desc_var;
        $PageKeywords = $WebsiteSettings->$site_keywords_var;

        $HomePage = [];
        if ($WebmasterSettings->default_currency_id > 0) {
            $HomePage = Topic::where("status", 1)->find($WebmasterSettings->default_currency_id);
        }
        return view('frontEnd.mesengerIntregation', compact(
            "WebsiteSettings",
            "WebmasterSettings",
            "SliderBanners",
            "TextBanners",
            "PageTitle",
            "PageDescription",
            "PageKeywords",
            "PageTitle",
            "PageDescription",
            "PageKeywords",
            "HomePage",
            "HomeTopics",
            "HomePhotos",
            "HomePartners",
            "LatestNews"
        ));
    }

    public function seller_basic_data_save(Request $request)
    {
        $WebmasterSettings = WebmasterSetting::find(1);

        // General for all pages
        $WebsiteSettings = Setting::find(1);

        $site_desc_var = 'site_desc_' . @Helper::currentLanguage()->code;
        $site_keywords_var = 'site_keywords_' . @Helper::currentLanguage()->code;

        $PageTitle = __('frontend.BAYCARTITLE'); // will show default site Title
        $PageDescription = $WebsiteSettings->$site_desc_var;
        $PageKeywords = $WebsiteSettings->$site_keywords_var;
        $LatestNews = $this->latest_topics($WebmasterSettings->latest_news_section_id);

        $customer_data = SmartendCustomer::where('id', $request->GetID)->first();
        $save_data = [
            'name' => $request->name,
            'email' => $request->email,
            'thana' => $request->thana,
            'district' => $request->district,
            'address_line1' => $request->address1,
            'address_line2' => $request->address2,
            'buy_car' => 1,
        ];
        $customer = SmartendCustomer::updateOrCreate(['mobile' => $request->mobile], $save_data);

        //dd($request->all());

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
        $seller_data->car_status = 1;
        $seller_data->home_feature = ''; //$request->home_feature;
        $seller_data->car_details = $request->car_details;
        $seller_data->video_url = $request->video_url;
        $seller_data->created_by = $customer->id;
        $seller_data->customer_id = $customer->id;
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

        $carDetails = Seller::with(
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
            'customer_info'
        )->where('status', '!=', 0)
            ->where('id', $seller_data->id)->first();

        $customerDetails = Customer::where('id', $customer->id)->first();
        //dd($carDetails);


        $receipient = $customerDetails->mobile;
        $smsText = "Welcome to S Islam Cars\nWe have successfully received your car sale request. We will contact you very soon.\n\nYour car information:\nCar Brand: " . $carDetails->car_brand->name . "\nCar Model: " . $carDetails->model->name . "\nYou can call us to +8801712282178";
        $smsUrl = "http://66.45.237.70/api.php?username=01746555579&password=Rwc@1177!&number=$receipient&message=" . urlencode($smsText) . "";
        //echo($smsUrl);exit();
        $response = file_get_contents($smsUrl);

        return view(
            'frontEnd.thanks_book_sell',
            compact(
                "WebsiteSettings",
                "WebmasterSettings",
                "PageTitle",
                "PageDescription",
                "PageKeywords",
                "PageTitle",
                "LatestNews",
                "carDetails",
                "customerDetails"
            )
        )->with('success', __('frontend.SUCESSMSG'));
        //$request->session()->put('success', __('frontend.SUCESSMSG'));
        //return redirect()->route('Home', ['success' => __('frontend.SUCESSMSG')]);
    }

    public function exchangeBasic(Request $request)
    {
        $WebmasterSettings = WebmasterSetting::find(1);

        // General for all pages
        $WebsiteSettings = Setting::find(1);

        $site_desc_var = 'site_desc_' . @Helper::currentLanguage()->code;
        //dd($site_desc_var);
        $site_keywords_var = 'site_keywords_' . @Helper::currentLanguage()->code;

        $PageTitle = ''; // will show default site Title
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
            'buy_car' => 1,
        ];
        $data = SmartendCustomer::updateOrCreate(['mobile' => $request->mobile], $save_data);
        return view('frontEnd.sellCarDetaails', compact('data', 'WebsiteSettings', 'WebmasterSettings', 'PageTitle', 'PageDescription', 'PageKeywords', 'PageTitle', 'CarConditions', 'CarBrands', 'CarModels', 'BodyTypes', 'FuelTypes', 'Transmissions', 'Drives', 'ExteriorColors', 'InteriorColors', 'Districts', 'Comforts', 'Entertainments', 'Safeties', 'Seats', 'Windows', 'District', 'Thana', 'OtherFeatures', 'PageDescription', 'LatestNews', 'GetID', 'PageKeywords', 'RegistrationSerial'));
    }

    public function latest_topics($section_id, $limit = 3)
    {
        return Topic::where([['status', 1], ['webmaster_id', $section_id], ['expire_date', '>=', date('Y-m-d')], ['expire_date', '<>', null]])
            ->orwhere([['status', 1], ['webmaster_id', $section_id], ['expire_date', null]])
            ->orderby('row_no', 'desc')
            ->limit($limit)
            ->get();
    }

    public function get_car_models(Request $request)
    {
        $models = CarModel::where('car_brand', $request->car_brand_id)->get();
        //dd($models);
        return view('frontEnd.get_car_models', compact('models'));
    }

    public function get_car_thana(Request $request)
    {
        $thanas = Thana::where('district_id', $request->district_id)->get();
        //dd($models);
        return view('dashboard.cars.get_thana', compact('thanas'));
    }

    /**
     * Language Check
     */
    public function getLanguage($lang)
    {
        // List of active languages for API
        $Language = Language::where('status', true)
            ->where('code', $lang)
            ->first();

        if ($lang == '' || empty($Language)) {
            $lang = env('DEFAULT_LANGUAGE');
        }
        return $lang;
    }
}
