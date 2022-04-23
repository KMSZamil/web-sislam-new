<?php

namespace App\Http\Controllers;

use App\Models\BodyType;
use App\Models\CarBrand;
use App\Models\CarCondition;
use App\Models\CarModel;
use App\Models\Comfort;
use App\Models\Customer;
use App\Models\District;
use App\Models\Drive;
use App\Models\ExteriorColor;
use App\Models\FuelType;
use App\Models\InteriorColor;
use App\Models\Language;
use App\Models\OtherFeature;
use App\Models\Seat;
use App\Models\Entertainment;
use App\Models\Safety;
use App\Models\Seller;
use App\Models\SellerImage;
use App\Models\SmartendCarCondition;
use App\Models\SmartendCustomer;
use App\Models\Thana;
use App\Models\Transmission;
use App\Models\Window;
use App\Models\RegistrationSerial;
use Illuminate\Http\Request;
use App\Models\SmartendSeller;
use App\Models\WebmasterSection;
use App\Models\WebmasterSetting;
use App\Models\Topic;
use App\Models\Setting;
use Helper;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Validator;

class carsController extends Controller
{

    public function buyAcar(Request $request)
    {
        //dd($request->all());
        $CustomerID = $request->CustomerID;
        //dd($CustomerID);
        $WebmasterSettings = WebmasterSetting::find(1);
        $WebsiteSettings = Setting::find(1);
        $site_desc_var = 'site_desc_' . @Helper::currentLanguage()->code;
        $site_keywords_var = 'site_keywords_' . @Helper::currentLanguage()->code;
        $PageTitle = __('frontend.BAYCARTITLE'); // will show default site Title
        $PageDescription = $WebsiteSettings->$site_desc_var;
        $PageKeywords = $WebsiteSettings->$site_keywords_var;
        $LatestNews = $this->latest_topics($WebmasterSettings->latest_news_section_id);

        $customer = Customer::where('id', $request->CustomerID)->first();
        //dd($customer);
        $dashboardCars = Seller::with('images', 'car_images', 'seller_fuel_types.fuel_type_name', 'condition', 'car_brand', 'model', 'bodytype', 'car_exterior_color', 'car_drive_type', 'car_transmission')
            ->where('status','!=', 0)
            ->where('home_feature', 1)
            ->where('car_status', 2)
            ->take(9)
            ->get();
        //dd($dashboardCars);
        return view('frontEnd.buyAcar', compact('WebsiteSettings', 'WebmasterSettings', 'PageTitle', 'PageDescription', 'PageKeywords', 'PageTitle', 'LatestNews', 'dashboardCars', 'customer', 'CustomerID'));
    }

    public function buyAcarMore(Request $request)
    {

        $ID = $request->msg_id;

        $dashboardCars = Seller::with('images', 'car_images', 'seller_fuel_types.fuel_type_name', 'condition', 'car_brand', 'model', 'bodytype', 'car_exterior_color', 'car_drive_type', 'car_transmission')
            ->where('status','!=', 0)
            ->where('home_feature', 1)
            ->where('car_status', 2)
            ->where('id', '>', $ID)
            ->take(6)
            ->get();
        //dd($dashboardCars);
        //dd(count($dashboardCars)==0);

        return view('frontEnd.buyACarMore', compact('dashboardCars'));
    }



    // public function buyAcarMore(Request $request)
    // {
    //     dd($request->all());
    //     //msg_id
    //     $CustomerID = $request->CustomerID;
    //     //dd($CustomerID);
    //     $WebmasterSettings = WebmasterSetting::find(1);
    //     $WebsiteSettings = Setting::find(1);
    //     $site_desc_var = 'site_desc_' . @Helper::currentLanguage()->code;
    //     $site_keywords_var = 'site_keywords_' . @Helper::currentLanguage()->code;
    //     $PageTitle = __('frontend.BAYCARTITLE'); // will show default site Title
    //     $PageDescription = $WebsiteSettings->$site_desc_var;
    //     $PageKeywords = $WebsiteSettings->$site_keywords_var;
    //     $LatestNews = $this->latest_topics($WebmasterSettings->latest_news_section_id);

    //     $customer = Customer::where('id', $request->CustomerID)->first();
    //     //dd($customer);
    //     $dashboardCars = Seller::with('images', 'car_images', 'seller_fuel_types.fuel_type_name', 'condition', 'car_brand', 'model', 'bodytype', 'car_exterior_color', 'drive_type', 'car_transmission')
    //         ->where('status','!=', 0)
    //         ->where('home_feature', 1)
    //         ->where('car_status', 2)
    //         ->get();

    //     return view('frontEnd.buyAcar', compact('WebsiteSettings', 'WebmasterSettings', 'PageTitle', 'PageDescription', 'PageKeywords', 'PageTitle', 'LatestNews', 'dashboardCars', 'customer', 'CustomerID'));
    // }

    public function showroomCars(Request $request)
    {
        $WebmasterSettings = WebmasterSetting::find(1);
        $WebsiteSettings = Setting::find(1);
        $site_desc_var = 'site_desc_' . @Helper::currentLanguage()->code;
        $site_keywords_var = 'site_keywords_' . @Helper::currentLanguage()->code;
        $PageTitle = __('frontend.BAYCARTITLE'); // will show default site Title
        $PageDescription = $WebsiteSettings->$site_desc_var;
        $PageKeywords = $WebsiteSettings->$site_keywords_var;
        $LatestNews = $this->latest_topics($WebmasterSettings->latest_news_section_id);
        //dd($customer);
        $dashboardCars = Seller::with('images', 'car_images', 'seller_fuel_types.fuel_type_name', 'condition', 'car_brand', 'model', 'bodytype', 'car_exterior_color', 'drive_type', 'car_transmission')
            ->where('status','!=', 0)
            ->where('home_feature', 1)
            ->where('car_status', 2)
            ->inRandomOrder()
            ->get();

        return view('frontEnd.showroomsCars', compact('WebsiteSettings', 'WebmasterSettings', 'PageTitle', 'PageDescription', 'PageKeywords', 'PageTitle', 'LatestNews', 'dashboardCars'));
    }

    public function sellAcar(Request $request)
    {
        // General Webmaster Settings
        $WebmasterSettings = WebmasterSetting::find(1);

        // General for all pages
        $WebsiteSettings = Setting::find(1);

        $site_desc_var = 'site_desc_' . @Helper::currentLanguage()->code;
        $site_keywords_var = 'site_keywords_' . @Helper::currentLanguage()->code;

        $PageTitle = __('frontend.SELLCARTITLE'); // will show default site Title
        $PageDescription = $WebsiteSettings->$site_desc_var;
        $PageKeywords = $WebsiteSettings->$site_keywords_var;
        $LatestNews = $this->latest_topics($WebmasterSettings->latest_news_section_id);
        $GetID = '';
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
        return view('frontEnd.sellAcar',
            compact('WebsiteSettings', 'WebmasterSettings', 'PageTitle', 'PageDescription', 'PageKeywords', 'PageTitle', 'LatestNews', 'CarConditions', 'CarBrands', 'CarModels', 'BodyTypes', 'FuelTypes', 'Transmissions', 'Drives', 'ExteriorColors', 'InteriorColors', 'Districts', 'Comforts', 'Entertainments', 'Safeties', 'Seats', 'Windows', 'District', 'Thana', 'OtherFeatures', 'PageDescription', 'GetID', 'RegistrationSerial'),
        );
    }

    public function sellAcarForm(Request $request)
    {
        // General Webmaster Settings
        $WebmasterSettings = WebmasterSetting::find(1);

        // General for all pages
        $WebsiteSettings = Setting::find(1);

        $site_desc_var = 'site_desc_' . @Helper::currentLanguage()->code;
        $site_keywords_var = 'site_keywords_' . @Helper::currentLanguage()->code;

        $PageTitle = __('frontend.SELLCARTITLE'); // will show default site Title
        $PageDescription = $WebsiteSettings->$site_desc_var;
        $PageKeywords = $WebsiteSettings->$site_keywords_var;
        $LatestNews = $this->latest_topics($WebmasterSettings->latest_news_section_id);
        $GetID = '';
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
        return view('frontEnd.sellAcarForm',
            compact('WebsiteSettings', 'WebmasterSettings', 'PageTitle', 'PageDescription', 'PageKeywords', 'PageTitle', 'LatestNews', 'CarConditions', 'CarBrands', 'CarModels', 'BodyTypes', 'FuelTypes', 'Transmissions', 'Drives', 'ExteriorColors', 'InteriorColors', 'Districts', 'Comforts', 'Entertainments', 'Safeties', 'Seats', 'Windows', 'District', 'Thana', 'OtherFeatures', 'PageDescription', 'GetID', 'RegistrationSerial'),
        );
    }

    public function exchangeAcar(Request $request)
    {
        // General Webmaster Settings
        $WebmasterSettings = WebmasterSetting::find(1);

        // General for all pages
        $WebsiteSettings = Setting::find(1);

        $site_desc_var = 'site_desc_' . @Helper::currentLanguage()->code;
        $site_keywords_var = 'site_keywords_' . @Helper::currentLanguage()->code;

        $PageTitle = __('frontend.EXCARTITLE'); // will show default site Title
        $PageDescription = $WebsiteSettings->$site_desc_var;
        $PageKeywords = $WebsiteSettings->$site_keywords_var;
        $LatestNews = $this->latest_topics($WebmasterSettings->latest_news_section_id);
        return view('frontEnd.exchangeAcar', compact('WebsiteSettings', 'WebmasterSettings', 'PageTitle', 'PageDescription', 'PageKeywords', 'PageTitle', 'LatestNews'));
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
