<?php

namespace App\Http\Controllers;
use App\Models\Language;
use Illuminate\Http\Request;
use App\Models\SmartendSeller;
use App\Models\WebmasterSection;
use App\Models\WebmasterSetting;
use App\Models\Topic;
use App\Models\Setting;
use App\Models\Seller;
use Helper;
use Validator;


class carDetailsController extends Controller
{
    public function index($id){
        // General Webmaster Settings
        $WebmasterSettings = WebmasterSetting::find(1);

        // General for all pages
        $WebsiteSettings = Setting::find(1);
        
        $site_desc_var = "site_desc_" . @Helper::currentLanguage()->code;
        $site_keywords_var = "site_keywords_" . @Helper::currentLanguage()->code;

        $PageTitle = ""; // will show default site Title
        $PageDescription = $WebsiteSettings->$site_desc_var;
        $PageKeywords = $WebsiteSettings->$site_keywords_var;
        $LatestNews = $this->latest_topics($WebmasterSettings->latest_news_section_id);
        
        $carDetails = Seller::with('images','car_images','seller_fuel_types.fuel_type_name',
            'condition',
            'car_brand',
            'model',
            'bodytype',
            'car_exterior_color',
            'drive_type',
            'car_transmission'
        )->where('status',1)
            ->where('id',$id)->first();

        return view("frontEnd.carDetails",
            compact("WebsiteSettings",
                "WebmasterSettings",
                "PageTitle",
                "PageDescription",
                "PageKeywords",
                "PageTitle",
                "LatestNews",
                "carDetails"));

        return view('frontEnd.carDetails', compact('LatestNews'));
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
