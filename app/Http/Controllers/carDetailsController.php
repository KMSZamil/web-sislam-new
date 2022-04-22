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

  public function index(Request $request)
  {
    //dd($request->all());
    $CustomerID = $request->CustomerID;
    $CarID = $request->CarID;
    $WebmasterSettings = WebmasterSetting::find(1);
    $WebsiteSettings = Setting::find(1);
    $site_desc_var = "site_desc_" . @Helper::currentLanguage()->code;
    $site_keywords_var = "site_keywords_" . @Helper::currentLanguage()->code;
    $PageTitle = "";
    $PageDescription = $WebsiteSettings->$site_desc_var;
    $PageKeywords = $WebsiteSettings->$site_keywords_var;
    $LatestNews = $this->latest_topics($WebmasterSettings->latest_news_section_id);

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

    return view(
      "frontEnd.carDetails",
      compact(
        "WebsiteSettings",
        "WebmasterSettings",
        "PageTitle",
        "PageDescription",
        "PageKeywords",
        "PageTitle",
        "LatestNews",
        "carDetails",
        "CustomerID",
        "CarID"
      )
    );

    return view('frontEnd.carDetails', compact('LatestNews'));
  }

  public function fbCcardetails($id)
  {
    $CarID = $id;
    $WebmasterSettings = WebmasterSetting::find(1);
    $WebsiteSettings = Setting::find(1);
    $site_desc_var = "site_desc_" . @Helper::currentLanguage()->code;
    $site_keywords_var = "site_keywords_" . @Helper::currentLanguage()->code;
    $PageTitle = "";
    $PageDescription = $WebsiteSettings->$site_desc_var;
    $PageKeywords = $WebsiteSettings->$site_keywords_var;
    $LatestNews = $this->latest_topics($WebmasterSettings->latest_news_section_id);

    $carDetails = Seller::with(
      'images',
      'car_images',
      'seller_fuel_types.fuel_type_name',
      'condition',
      'car_brand',
      'model',
      'bodytype',
      'car_exterior_color',
      'drive_type',
      'car_transmission'
    )->where('status', 1)
      ->where('id', $CarID)->first();

    $same_car = Seller::with(
      'images',
      'car_images',
      'seller_fuel_types.fuel_type_name',
      'condition',
      'car_brand',
      'model',
      'bodytype',
      'car_exterior_color',
      'drive_type',
      'car_transmission'
    )->where('status', 1)
      ->where('car_model', $carDetails->car_model)
      ->inRandomOrder()->get();

    $total_samecar = $same_car->count();

    if ($total_samecar < 16) {
      $same_car2 = Seller::with(
        'images',
        'car_images',
        'seller_fuel_types.fuel_type_name',
        'condition',
        'car_brand',
        'model',
        'bodytype',
        'car_exterior_color',
        'drive_type',
        'car_transmission'
      )->where('status', 1)
        ->where('car_model', '!=', $carDetails->car_model)
        ->limit(16 - $total_samecar)
        ->inRandomOrder()->get();
    }

    if ($same_car2->count() > 0) {
      $merged = $same_car->merge($same_car2);
      $same_car = $merged->all();
    }
    //        dd($same_car);
    return view(
      "frontEnd.fbCarDetails",
      compact(
        "WebsiteSettings",
        "WebmasterSettings",
        "PageTitle",
        "PageDescription",
        "PageKeywords",
        "PageTitle",
        "LatestNews",
        "carDetails",
        "CarID",
        "same_car"
      )
    );
  }

  public function cardetails($id)
  {
    $CarID = $id;
    $WebmasterSettings = WebmasterSetting::find(1);
    $WebsiteSettings = Setting::find(1);
    $site_desc_var = "site_desc_" . @Helper::currentLanguage()->code;
    $site_keywords_var = "site_keywords_" . @Helper::currentLanguage()->code;
    $PageTitle = "";
    $PageDescription = $WebsiteSettings->$site_desc_var;
    $PageKeywords = $WebsiteSettings->$site_keywords_var;
    $LatestNews = $this->latest_topics($WebmasterSettings->latest_news_section_id);

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
    )->where('status', '!=', 0)
      ->where('id', $CarID)->first();

    $same_car = Seller::with(
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
    )->where('status', '!=', 0)
      ->where('car_model', $carDetails->car_model)
      ->inRandomOrder()->get();

    $total_samecar = $same_car->count();

    if ($total_samecar < 16) {
      $same_car2 = Seller::with(
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
      )->where('status', '!=', 0)
        ->where('car_model', '!=', $carDetails->car_model)
        ->limit(16 - $total_samecar)
        ->inRandomOrder()->get();
    }

    if ($same_car2->count() > 0) {
      $merged = $same_car->merge($same_car2);
      $same_car = $merged->all();
    }
    //        dd($same_car);
    return view("frontEnd.carDetails",
      compact(
        "WebsiteSettings",
        "WebmasterSettings",
        "PageTitle",
        "PageDescription",
        "PageKeywords",
        "PageTitle",
        "LatestNews",
        "carDetails",
        "CarID",
        "same_car"
      )
    );

    //return view('frontEnd.carDetails', compact('LatestNews'));
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

  public function googleReview()
  {
    $url = "https://maps.googleapis.com/maps/api/place/details/json?key=AIzaSyDSW9xYRbLAM-npP5x8mCCvSwJIewyS4lU&placeid=ChIJb2UyCO3FVTcRaDvhmGQVrO8";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $result = curl_exec($ch);
    //$res        = json_decode($result,true);
    //$reviews    = $res['result']['reviews'];
    dd($result);
    $options = array(
      'googlemaps_free_apikey' => 'AIzaSyDSW9xYRbLAM-npP5x8mCCvSwJIewyS4lU', // Google API Key
      'google_maps_review_cid' => 'ChIJb2UyCO3FVTcRaDvhmGQVrO8', // Google Placec ID
      'cache_data_xdays_local' => 30, // every x day the reviews are loaded from google
      'your_language_for_tran' => 'en', // give you language for auto translate reviews
      'show_not_more_than_max' => 5, // (0-5) only show first x reviews
      'show_only_if_with_text' => false, // true = show only reviews that have text
      'show_only_if_greater_x' => 0, // (0-4) only show reviews with more than x stars
      'sort_reviews_by_a_data' => 'rating', // sort by 'time' or by 'rating' (newest/best first)
      'show_cname_as_headline' => true, // true = show customer name as headline
      'show_stars_in_headline' => true, // true = show customer stars after name in headline
      'show_author_avatar_img' => true, // true = show the author avatar image (rounded)
      'show_blank_star_till_5' => true, // false = don't show always 5 stars e.g. ⭐⭐⭐☆☆
      'show_txt_of_the_review' => true, // true = show the text of each review
      'show_author_of_reviews' => true, // true = show the author of each review
      'show_age_of_the_review' => true, // true = show the age of each review
      'dateformat_for_the_age' => 'Y.m.d', // see https://www.php.net/manual/en/datetime.format.php
      'show_rule_after_review' => true, // false = don't show <hr> Tag after/before each review
      'add_schemaorg_metadata' => true, // add schemo.org data to loop back your rating to SERP
    );
    echo $this->getReviews($options);
  }

  function getReviews($option)
  {
    if (file_exists('reviews.json') and strtotime(filemtime('reviews.json')) < strtotime('-' . $option['cache_data_xdays_local'] . ' days')) {
      $result = file_get_contents('reviews.json');
    } else {
      $url = 'https://maps.googleapis.com/maps/api/place/details/json?place_id=' . $option['google_maps_review_cid'] . '&key=' . $option['googlemaps_free_apikey'];
      if (function_exists('curl_version')) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        if (isset($option['your_language_for_tran']) and !empty($option['your_language_for_tran'])) {
          curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept-Language: ' . $option['your_language_for_tran']));
        }
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36');
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        curl_close($ch);
      } else {
        $arrContextOptions = array(
          'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
          ),
          'http' => array(
            'method' => 'GET',
            'header' => 'Accept-language: ' . $option['your_language_for_tran'] . "\r\n" .
              "User-Agent: Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36\r\n"
          )
        );
        $result = file_get_contents($url, false, stream_context_create($arrContextOptions));
      }
      $fp = fopen('reviews.json', 'w');
      fwrite($fp, $result);
      fclose($fp);
    }
    $data  = json_decode($result, true);
    echo '<pre>';
    var_dump($data);
    echo '</pre>'; // DEV & DEBUG
    die;
    $reviews = $data['result']['reviews'];
    $html = '';
    if (!empty($reviews)) {
      if (isset($option['sort_reviews_by_a_data']) and $option['sort_reviews_by_a_data'] == 'rating') {
        array_multisort(array_map(function ($element) {
          return $element['rating'];
        }, $reviews), SORT_DESC, $reviews);
      } else if (isset($option['sort_reviews_by_a_data']) and $option['sort_reviews_by_a_data'] == 'time') {
        array_multisort(array_map(function ($element) {
          return $element['time'];
        }, $reviews), SORT_DESC, $reviews);
      }
      $html .= '<div class="review">';
      if (isset($option['show_cname_as_headline']) and $option['show_cname_as_headline'] == true) {
        $html .= '<strong>' . $data['result']['name'] . ' ';
        if (isset($option['show_stars_in_headline']) and $option['show_stars_in_headline'] == true) {
          for ($i = 1; $i <= $data['result']['rating']; ++$i) $html .= '⭐';
          if (isset($option['show_blank_star_till_5']) and $option['show_blank_star_till_5'] == true) for ($i = 1; $i <= 5 - floor($data['result']['rating']); ++$i) $html .= '☆';
        }
        $html .= '</strong><br>';
      }
      if (isset($option['add_schemaorg_metadata']) and $option['add_schemaorg_metadata'] == true) {
        $html .= '<itemprop="reviewRating" itemscope itemtype="http://schema.org/Rating"><meta itemprop="worstRating" content="1"/><meta itemprop="bestRating" content="5"/>';
        $html .= '<meta itemprop="ratingValue" content="' . $data['result']['rating'] . '"/>';
      }
      if (isset($option['show_rule_after_review']) and $option['show_rule_after_review'] == true) $html .= '<hr size="1">';
      foreach ($reviews as $key => $review) {
        if (isset($option['show_not_more_than_max']) and $option['show_not_more_than_max'] > 0 and $key >= $option['show_not_more_than_max']) continue;
        if (isset($option['show_only_if_with_text']) and $option['show_only_if_with_text'] == true and empty($review['text'])) continue;
        if (isset($option['show_only_if_greater_x']) and $review['rating'] <= $option['show_only_if_greater_x']) continue;
        if (
          isset($option['show_author_of_reviews']) and $option['show_author_of_reviews'] == true and
          isset($option['show_author_avatar_img']) and $option['show_author_avatar_img'] == true
        ) $html .= '<img class="avatar" src="' . $review['profile_photo_url'] . '">';
        for ($i = 1; $i <= $review['rating']; ++$i) $html .= '⭐';
        if (isset($option['show_blank_star_till_5']) and $option['show_blank_star_till_5'] == true) for ($i = 1; $i <= 5 - $review['rating']; ++$i) $html .= '☆';
        $html .= '<br>';
        if (isset($option['show_txt_of_the_review']) and $option['show_txt_of_the_review'] == true) $html .= str_replace(array("\r\n", "\r", "\n"), ' ', $review['text']) . '<br>';
        if (isset($option['show_author_of_reviews']) and $option['show_author_of_reviews'] == true) $html .= '<small>' . $review['author_name'] . ' </small>';
        if (isset($option['show_age_of_the_review']) and $option['show_age_of_the_review'] == true) $html .= '<small> ' . date($option['dateformat_for_the_age'], $review['time']) . '  &mdash; ' . $review['relative_time_description'] . ' </small>';
        if (isset($option['show_rule_after_review']) and $option['show_rule_after_review'] == true) $html .= '<hr style="clear:both" size="1">';
      }
      $html .= '</div>';
    }
    return $html;
  }
}
