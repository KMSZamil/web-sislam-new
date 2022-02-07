<?php

namespace App\Http\Controllers;
use App\Models\BodyType;
use App\Models\CarBrand;
use App\Models\CarCondition;
use App\Models\CarModel;
use App\Models\Comfort;
use App\Models\District;
use App\Models\Drive;
use App\Models\ExteriorColor;
use App\Models\FuelType;
use App\Models\InteriorColor;
use App\Models\Language;
use App\Models\OtherFeature;
use App\Models\Seat;
use App\Models\SmartendCarCondition;
use App\Models\Transmission;
use App\Models\Window;
use Illuminate\Http\Request;
use App\Models\SmartendSeller;
use App\Models\WebmasterSection;
use App\Models\WebmasterSetting;
use App\Models\Topic;
use App\Models\Setting;
use Helper;
use Illuminate\Support\Facades\DB;
use Validator;


class carSellController extends Controller
{
    public function index(Request $request){
//        if ($lang != "") {
//            // Set Language
//            App::setLocale($lang);
//            \Session::put('locale', $lang);
//        }
        // General Webmaster Settings
        $WebmasterSettings = WebmasterSetting::find(1);

        // General for all pages
        $WebsiteSettings = Setting::find(1);
        
        $site_desc_var = "site_desc_" . @Helper::currentLanguage()->code;
        //dd($site_desc_var);
        $site_keywords_var = "site_keywords_" . @Helper::currentLanguage()->code;

        $PageTitle = ""; // will show default site Title
        $PageDescription = $WebsiteSettings->$site_desc_var;
        $PageKeywords = $WebsiteSettings->$site_keywords_var;
        $LatestNews = $this->latest_topics($WebmasterSettings->latest_news_section_id);
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
        $Entertainments = Comfort::where('status',1)->get();
        $Safeties = Comfort::where('status',1)->get();
        $Seats = Seat::where('status',1)->get();
        $Windows = Window::where('status',1)->get();
        $OtherFeatures = OtherFeature::where('status',1)->get();

        $validator = Validator::make($request->all(), [
                    'name' => 'required',
                    'mobile' => 'required'
        ]);
        
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $save_data = array(
            'name' => $request->name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        );
        SmartendSeller::create($save_data);
        return view('frontEnd.sellCarDetaails', compact(
                "save_data", 
                "WebsiteSettings",
                "WebmasterSettings",
                "PageTitle",
                "PageDescription",
                "PageKeywords",
                "PageTitle",
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
                "PageDescription",
                "LatestNews",
                "PageKeywords"));
    }
    
    public function latest_topics($section_id, $limit = 3)
    {
        return Topic::where([['status', 1], ['webmaster_id', $section_id], ['expire_date', '>=', date("Y-m-d")], ['expire_date', '<>', null]])->orwhere([['status', 1], ['webmaster_id', $section_id], ['expire_date', null]])->orderby('row_no', 'desc')->limit($limit)->get();
    }

    /**
     * Language Check
     */
    public function getLanguage($lang)
    {
        // List of active languages for API
        $Language = Language::where("status", true)->where("code", $lang)->first();

        if ($lang == "" || empty($Language)) {
            $lang = env('DEFAULT_LANGUAGE');
        }
        return $lang;
    }
}
