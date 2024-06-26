<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\CarBuy;
use App\Models\Customer;
use App\Models\District;
use App\Models\Setting;
use App\Models\SmartendCustomer;
use App\Models\Topic;
use App\Models\WebmasterSetting;
use App\Models\Seller;
use App\Models\Thana;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use function Sodium\compare;

class carBuyController extends Controller
{
    public function buyerBasic(Request $request)
    {
        $WebmasterSettings = WebmasterSetting::find(1);
        $WebsiteSettings = Setting::find(1);
        $site_desc_var = "site_desc_" . @Helper::currentLanguage()->code;
        $site_keywords_var = "site_keywords_" . @Helper::currentLanguage()->code;
        $PageTitle = "";
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
            'buy_car' => 1
        );
        $data = SmartendCustomer::updateOrCreate(['mobile' => $request->mobile], $save_data);
        $CustomerID = $data->id;
        //dd($CustomerID);

        //return redirect('buy-a-car', compact('CustomerID'));
        return Redirect::route('buyCars', compact("CustomerID"));
    }

    public function carBook(Request $request)
    {

        //dd($request->all());
        //dd($id);

        $CarID = $request->CarID;

        if ($CarID == null) {
            $CarID = last(request()->segments(1));
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
            'car_transmission'
        )->where('status', 1)
            ->where('id', $CarID)->first();

        //dd($CarID);
        $WebmasterSettings = WebmasterSetting::find(1);
        $WebsiteSettings = Setting::find(1);

        $site_desc_var = "site_desc_" . @Helper::currentLanguage()->code;
        $site_keywords_var = "site_keywords_" . @Helper::currentLanguage()->code;

        $PageTitle = __('frontend.BAYCARTITLE'); // will show default site Title
        $PageDescription = $WebsiteSettings->$site_desc_var;
        $PageKeywords = $WebsiteSettings->$site_keywords_var;
        $LatestNews = $this->latest_topics($WebmasterSettings->latest_news_section_id);

        $CustomerID = $request->CustomerID;
        $customer = Customer::where('id', $request->CustomerID)->first();
        $District = District::where('status', 1)->get();
        $Thana = Thana::where('status', 1)->get();
        //dd($customer);

        return view('frontEnd.car_book_form', compact(
            "WebsiteSettings",
            "WebmasterSettings",
            "PageTitle",
            "PageDescription",
            "PageKeywords",
            "PageTitle",
            "LatestNews",
            "customer",
            "CarID",
            "CustomerID",
            "carDetails",
            "District",
            "Thana"
        ));
    }

    public function carBookSubmit(Request $request)
    {

        //dd($request->all());
        $WebmasterSettings = WebmasterSetting::find(1);
        $WebsiteSettings = Setting::find(1);

        $site_desc_var = "site_desc_" . @Helper::currentLanguage()->code;
        $site_keywords_var = "site_keywords_" . @Helper::currentLanguage()->code;

        $PageTitle = __('frontend.BAYCARTITLE'); // will show default site Title
        $PageDescription = $WebsiteSettings->$site_desc_var;
        $PageKeywords = $WebsiteSettings->$site_keywords_var;
        $LatestNews = $this->latest_topics($WebmasterSettings->latest_news_section_id);

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'mobile' => 'required',
            'address1' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $save_data = array(
            'name' => $request->name,
            'email' => $request->email,
            'district' => $request->district,
            'thana' => $request->thana,
            'address1' => $request->address1,
            'address2' => $request->address1,
            'buy_car' => 1
        );

        $data = SmartendCustomer::updateOrCreate(['mobile' => $request->mobile], $save_data);
        //dd($data);
        $CustomerID = $data->id;

        $Booking = new CarBuy();
        $Booking->car_id = $request->CarID;
        $Booking->customer_id = $CustomerID;
        $Booking->status = 1;
        $Booking->save();
        //dd($CustomerID);

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
            ->where('id', $request->CarID)->first();
        $customerDetails = Customer::where('id', $CustomerID)->first();
        //dd($carDetails);


        //$receipient = 01713053336;
        //$smsText = "Testing";
        $receipient = $customerDetails->mobile;
        $smsText = "Welcome to S Islam Cars\nWe have successfully received your car book request. We will contact you very soon.\n\nYour booked car information:\nCat Title: " . $carDetails->car_title . "\nCar Brand: " . $carDetails->car_brand->name . "\nCar Model: " . $carDetails->model->name . "\nYou can call us to +8801712282178";
        $smsUrl = "http://66.45.237.70/api.php?username=01746555579&password=Rwc@1177!&number=$receipient&message=" . urlencode($smsText) . "";
        //echo($smsUrl);exit();
        $response = file_get_contents($smsUrl);


        return view(
            'frontEnd.thanks_book',
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
        )->with('success', __('frontend.SUCESSMSGBOOK'));
        //$request->session()->put('success', __('frontend.SUCESSMSGBOOK'));
        //return redirect()->route('Home', ['success' => __('frontend.SUCESSMSGBOOK')]);
    }

    public function latest_topics($section_id, $limit = 3)
    {
        return Topic::where([['status', 1], ['webmaster_id', $section_id], ['expire_date', '>=', date("Y-m-d")], ['expire_date', '<>', null]])->orwhere([['status', 1], ['webmaster_id', $section_id], ['expire_date', null]])->orderby('row_no', 'desc')->limit($limit)->get();
    }
}
