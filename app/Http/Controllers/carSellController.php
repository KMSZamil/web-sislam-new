<?php

namespace App\Http\Controllers;
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
use App\Models\Language;
use App\Models\OtherFeature;
use App\Models\Safety;
use App\Models\Seat;
use App\Models\Seller;
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
    public function test(){
        return view('test');
    }
    public function index(Request $request){
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
        $Entertainments = Entertainment::where('status',1)->get();
        $Safeties = Safety::where('status',1)->get();
        $Seats = Seat::where('status',1)->get();
        $Windows = Window::where('status',1)->get();
        $OtherFeatures = OtherFeature::where('status',1)->get();
        $District = District::where('status',1)->get();
        $Thana = Thana::where('status',1)->get();

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
            'sell_car' =>1
        );
        $data = SmartendCustomer::updateOrCreate(['mobile' => $request->mobile] ,$save_data);
        $GetID = $data->id;
        return view('frontEnd.sellCarDetaails', compact(
                "data", 
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
                "District",
                "Thana",
                "OtherFeatures",
                "PageDescription",
                "LatestNews",
                "GetID",
                "PageKeywords"));
    }


    public function seller_basic_data_save(Request $request){
        $WebmasterSettings = WebmasterSetting::find(1);

        // General for all pages
        $WebsiteSettings = Setting::find(1);
        
        $site_desc_var = "site_desc_" . @Helper::currentLanguage()->code;
        $site_keywords_var = "site_keywords_" . @Helper::currentLanguage()->code;

        $PageTitle = __('frontend.BAYCARTITLE'); // will show default site Title
        $PageDescription = $WebsiteSettings->$site_desc_var;
        $PageKeywords = $WebsiteSettings->$site_keywords_var;
        $LatestNews = $this->latest_topics($WebmasterSettings->latest_news_section_id);
        
        $customer_data = SmartendCustomer::where('id',$request->GetID)->first();
        $save_data = array(
            'name' => $request->name,
            'email' => $request->email,
            'thana' => $request->thana,
            'district' => $request->district,
            'address_line1' => $request->address1,
            'address_line2' => $request->address,
            'buy_car' =>1
        );
        $customer = SmartendCustomer::updateOrCreate(['mobile' => $request->mobile], $save_data);

        //dd($request->all());
        $seller_data = new Seller();
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
        
        $seller_data->message = $request->sellers_note;
        $seller_data->price = $request->asking_price;
        $seller_data->created_by = $customer->id;
        $seller_data->customer_id = $customer->id;
        $seller_data->save();
        if ($request->car_photo) {
            for($i=0 ; $i < count($request->car_photo) ; $i++){
                $seller_car_image  = new SellerCarImage();
                $seller_car_image->seller_id = $seller_data->id;
                $seller_car_image->car_image = $request->car_photo[$i];
                $seller_car_image->save();
            }
        }

//        $seller_image = new SellerImage();
//        if ($request->file('car_photo_1')) {
//
//            /*
//            $md5Name = md5_file($request->file('car_photo_1')->getRealPath()).time();
//            $mimeType = $request->file('car_photo_1')->guessExtension();
//            $path = $request->file('car_photo_1')->storeAs('uploads',  $md5Name.'.'.$mimeType  , 'public');
//            $seller_image->car_photo_1 = $path;
//            */
//            $image       = $request->file('car_photo_1')[$i];
//            $filename    = time().rand(100,999).' _ '.$image->getClientOriginalName();
//            $image_resize = Image::make($image->getRealPath());
//            //$image_resize->resize(1024, null);
//            $image_resize->insert('/home2/sislamcarscom/public_html/public/uploads/car_images/watermark/watermark.png', 'center');
//            $image_resize->resize(1024, null, function ($constraint) {
//                $constraint->aspectRatio(); //to preserve the aspect ratio
//                $constraint->upsize();
//            });
//
//            $image_resize->save(public_path('uploads/car_images/full/' .$filename));
//            $image_resize->resize(300, 300);
//            $image_resize->save(public_path('uploads/car_images/thumb/' .$filename));
//            $seller_image->car_photo_1 = $filename;
//        }
//        if ($request->file('car_photo_2')) {
//            $image       = $request->file('car_photo_2')[$i];
//            $filename    = time().rand(100,999).' _ '.$image->getClientOriginalName();
//            $image_resize = Image::make($image->getRealPath());
//            //$image_resize->resize(1024, null);
//            $image_resize->resize(1024, null, function ($constraint) {
//                $constraint->aspectRatio(); //to preserve the aspect ratio
//                $constraint->upsize();
//            });
//
//            $image_resize->save(public_path('uploads/car_images/full/' .$filename));
//            $image_resize->resize(300, 300);
//            $image_resize->save(public_path('uploads/car_images/thumb/' .$filename));
//            $seller_image->car_photo_2 = $filename;
//        }
//        if ($request->file('car_photo_3')) {
//            $image       = $request->file('car_photo_3')[$i];
//            $filename    = time().rand(100,999).' _ '.$image->getClientOriginalName();
//            $image_resize = Image::make($image->getRealPath());
//            //$image_resize->resize(1024, null);
//            $image_resize->resize(1024, null, function ($constraint) {
//                $constraint->aspectRatio(); //to preserve the aspect ratio
//                $constraint->upsize();
//            });
//
//            $image_resize->save(public_path('uploads/car_images/full/' .$filename));
//            $image_resize->resize(300, 300);
//            $image_resize->save(public_path('uploads/car_images/thumb/' .$filename));
//            $seller_image->car_photo_3 = $filename;
//        }
//        if ($request->file('car_photo_4')) {
//            $image       = $request->file('car_photo_4')[$i];
//            $filename    = time().rand(100,999).' _ '.$image->getClientOriginalName();
//            $image_resize = Image::make($image->getRealPath());
//            //$image_resize->resize(1024, null);
//            $image_resize->resize(1024, null, function ($constraint) {
//                $constraint->aspectRatio(); //to preserve the aspect ratio
//                $constraint->upsize();
//            });
//
//            $image_resize->save(public_path('uploads/car_images/full/' .$filename));
//            $image_resize->resize(300, 300);
//            $image_resize->save(public_path('uploads/car_images/thumb/' .$filename));
//            $seller_image->car_photo_4 = $filename;
//        }
//        if ($request->file('car_photo_5')) {
//            $image       = $request->file('car_photo_5')[$i];
//            $filename    = time().rand(100,999).' _ '.$image->getClientOriginalName();
//            $image_resize = Image::make($image->getRealPath());
//            //$image_resize->resize(1024, null);
//            $image_resize->resize(1024, null, function ($constraint) {
//                $constraint->aspectRatio(); //to preserve the aspect ratio
//                $constraint->upsize();
//            });
//
//            $image_resize->save(public_path('uploads/car_images/full/' .$filename));
//            $image_resize->resize(300, 300);
//            $image_resize->save(public_path('uploads/car_images/thumb/' .$filename));
//            $seller_image->car_photo_5 = $filename;
//        }
        $seller_image = new SellerImage();
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
        
        return view('frontEnd.thanks', compact("WebsiteSettings", "WebmasterSettings", "PageTitle", "PageDescription", "PageKeywords", "PageTitle",  "LatestNews"))->with('success', __('frontend.SUCESSMSG'));
    }
    
    public function buyerBasic(Request $request) {
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
            'buy_car' =>1
        );
        $data = SmartendCustomer::updateOrCreate(['mobile' => $request->mobile] ,$save_data);
        return redirect('buy-a-car');
        
    }
    
    public function exchangeBasic(Request $request){
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
        $Entertainments = Entertainment::where('status',1)->get();
        $Safeties = Safety::where('status',1)->get();
        $Seats = Seat::where('status',1)->get();
        $Windows = Window::where('status',1)->get();
        $OtherFeatures = OtherFeature::where('status',1)->get();
        $District = District::where('status',1)->get();
        $Thana = Thana::where('status',1)->get();

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
            'exchange_car' =>1
        );
        $data = SmartendCustomer::updateOrCreate(['mobile' => $request->mobile] ,$save_data);
        $GetID = $data->id;
        return view('frontEnd.exchangeCarDetails', compact(
                "data", 
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
                "District",
                "Thana",
                "OtherFeatures",
                "PageDescription",
                "LatestNews",
                "GetID",
                "PageKeywords"));
    }
    
    
    public function latest_topics($section_id, $limit = 3)
    {
        return Topic::where([['status', 1], ['webmaster_id', $section_id], ['expire_date', '>=', date("Y-m-d")], ['expire_date', '<>', null]])->orwhere([['status', 1], ['webmaster_id', $section_id], ['expire_date', null]])->orderby('row_no', 'desc')->limit($limit)->get();
    }


    public function get_car_models(Request $request)
    {
        $models = CarModel::where('car_brand',$request->car_brand_id)->get();
        //dd($models);
        return view('frontEnd.get_car_models', compact('models'));
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
