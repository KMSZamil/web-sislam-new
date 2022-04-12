<?php

use App\Http\Controllers\Auth\SocialAuthController;
use App\Http\Controllers\Dashboard\CarsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\SiteMapController;
use App\Http\Controllers\carSellController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/linkstorage', function () {
    Artisan::call('storage:link');
});

// Language Route
Route::post('/lang', [LanguageController::class, 'index'])->middleware('LanguageSwitcher')->name('lang');
// For Language direct URL link
Route::get('/lang/{lang}', [LanguageController::class, 'change'])->middleware('LanguageSwitcher')->name('langChange');
Route::get('/locale/{lang}', [LanguageController::class, 'locale'])->middleware('LanguageSwitcher')->name('localeChange');
// .. End of Language Route

// Backend Routes
Route::get('/login', function () {
    return redirect('/');
});
Route::get('/register', function () {
    return redirect('/');
});

// Social Auth
Route::get('/oauth/{driver}', [SocialAuthController::class, 'redirectToProvider'])->name('social.oauth');
Route::get('/oauth/{driver}/callback', [SocialAuthController::class, 'handleProviderCallback'])->name('social.callback');

Route::Group(['prefix' => env('BACKEND_PATH')], function () {
    Auth::routes();
});
Route::get('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');



Route::post('/seller-basic', 'carSellController@index');
Route::post('/buyer-basic', 'carBuyController@buyerBasic');
Route::post('/exchange-basic', 'carSellController@exchangeBasic');
Route::post('/get_car_models', [carSellController::class, 'get_car_models'])->name('get_car_models');
Route::post('/get_car_thana', [carSellController::class, 'get_car_thana'])->name('get_car_thana');
Route::post('/seller-car-information', 'carSellController@seller_basic_data_save');

Route::post('get_thana', [CarsController::class, 'get_thana'])->name('get_thana');
//Exchange
Route::post('/exchange-basic', 'carExchangeController@exchangeBasic');
Route::post('/exchange-car-information', 'carExchangeController@exchange_basic_data_save');
Route::post('/car-exchange-details', 'carExchangeController@carExchangeDetails');
Route::post('/car-exchange-submit', 'carExchangeController@exchangeSubmit')->name('exchangeSubmit');
Route::post('/car-exchange-submit-final', 'carExchangeController@exchangeSubmitFinal')->name('exchangeSubmitFinal');

//Buy
Route::get('/buyBasic/{id}', 'carBuyController@buyBasic')->name('buyBasic');
Route::post('/buy-a-car', 'carsController@buyAcar')->name('buyCars');
Route::post('/buy-a-car-more', 'carsController@buyACarMore')->name('buyACarMore');
Route::get('/showroom-cars', 'carsController@showroomCars')->name('showroomCars');
Route::get('/car-book/{id}', 'carBuyController@carBook');
Route::post('/car-book', 'carBuyController@carBook')->name('carBook');
Route::post('/car-book-submit', 'carBuyController@carBookSubmit')->name('carBookSubmit');


Route::get('/car-details/{id}', 'carDetailsController@cardetails');
Route::get('/google-review', 'carDetailsController@googleReview');
Route::get('/fb/car-details/{id}', 'carDetailsController@fbCcardetails');
Route::post('/car-details', 'carDetailsController@index')->name('car-details');
Route::post('/upload-file', 'carPhotoUploadController@index');
Route::get('/buy-a-car', 'carsController@buyAcar');
Route::get('/{lang?}/buy-a-car', 'carsController@buyAcar');
Route::get('/sell-a-car', 'carsController@sellAcar');
Route::get('/{lang?}/sell-a-car', 'carsController@sellAcar')->name('sellAcar');
Route::get('/sell-car-details', 'carsController@sellAcarForm')->name('sellAcarForm');
Route::get('/exchange-a-car', 'carsController@exchangeAcar');
Route::get('/{lang?}/exchange-a-car', 'carsController@exchangeAcar');

// Start of Frontend Routes
// ../site map
Route::get('/sitemap.xml', [SiteMapController::class, 'siteMap'])->name('siteMap');
Route::get('/{lang}/sitemap', [SiteMapController::class, 'siteMap'])->name('siteMapByLang');

Route::get('/', [HomeController::class, 'HomePage'])->name('Home');
// ../home url
Route::get('/home', [HomeController::class, 'HomePage'])->name('HomePage');
Route::get('/{lang?}/home', [HomeController::class, 'HomePageByLang'])->name('HomePageByLang');
// ../subscribe to newsletter submit  (ajax url)
Route::post('/subscribe', [HomeController::class, 'subscribeSubmit'])->name('subscribeSubmit');
// ../Comment submit  (ajax url)
Route::post('/comment', [HomeController::class, 'commentSubmit'])->name('commentSubmit');
// ../Order submit  (ajax url)
Route::post('/order', [HomeController::class, 'orderSubmit'])->name('orderSubmit');
// ..Custom URL for contact us page ( www.site.com/contact )
Route::get('/contact', [HomeController::class, 'ContactPage'])->name('contactPage');
Route::get('/{lang?}/contact', [HomeController::class, 'ContactPageByLang'])->name('contactPageByLang');
// ../contact message submit  (ajax url)
Route::post('/contact/submit', [HomeController::class, 'ContactPageSubmit'])->name('contactPageSubmit');
// ..if page by name ( ex: www.site.com/about )
Route::get('/topic/{id}', [HomeController::class, 'topic'])->name('FrontendPage');
// ..if page by user id ( ex: www.site.com/user )
Route::get('/user/{id}', [HomeController::class, 'userTopics'])->name('FrontendUserTopics');
Route::get('/{lang?}/user/{id}', [HomeController::class, 'userTopicsByLang'])->name('FrontendUserTopicsByLang');
// ../search
Route::post('/search', [HomeController::class, 'searchTopics'])->name('searchTopics');

// ..Topics url  ( ex: www.site.com/news/topic/32 )
Route::get('/{section}/topic/{id}', [HomeController::class, 'topic'])->name('FrontendTopic');
Route::get('/{lang?}/{section}/topic/{id}', [HomeController::class, 'topicByLang'])->name('FrontendTopicByLang');


// ..Sub category url for Section  ( ex: www.site.com/products/2 )
Route::get('/{section}/{cat}', [HomeController::class, 'topics'])->name('FrontendTopicsByCat');
Route::get('/{lang?}/{section}/{cat}', [HomeController::class, 'topicsByLang'])->name('FrontendTopicsByCatWithLang');


// ..Section url by name  ( ex: www.site.com/news )
Route::get('/{section}', [HomeController::class, 'topics'])->name('FrontendTopics');
Route::get('/{lang?}/{section}', [HomeController::class, 'topicsByLang'])->name('FrontendTopicsByLang');


// ..SEO url  ( ex: www.site.com/title-here )
Route::get('/{seo_url_slug}', [HomeController::class, 'SEO'])->name('FrontendSEO');
Route::get('/{lang?}/{seo_url_slug}', [HomeController::class, 'SEOByLang'])->name('FrontendSEOByLang');

// ..if page by name and language( ex: www.site.com/ar/about )
Route::get('/{lang?}/topic/{id}', [HomeController::class, 'topicByLang'])->name('FrontendPageByLang');
// .. End of Frontend Route

