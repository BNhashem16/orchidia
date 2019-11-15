<?php
use Illuminate\Support\Facades\Route;
Auth::routes();
#Logout
Route::get('dashboard/logout', 'backend\UserController@logout');
#Login
Route::get('dashboard/login', 'backend\UserController@login')->name('login');
Route::post('dashboard/login', 'backend\UserController@doLogin');
//----------------------------------Back End-------------------------------------------
Route::group(['prefix' => 'dashboard', 'middleware'  => ['auth' , 'isAdmin']] , function(){
#Home
Route::get('', 'backend\DashboardController@index')->name('dashboard');
#Category
// Route::resource('dashboard/categories', 'backend\CategoryController');
// Route::get('dashboard/categories/delete_ajax/{category}','backend\CategoryController@ajax_delete')->name('delete.ajax');
// Route::get('dashboard/categories/change_active/{category}','backend\CategoryController@change_active')->name('change.active');

#Language
Route::resource('/lang', 'backend\LanguageController');
Route::get('/lang/change_active/{lang}','backend\LanguageController@change_active')->name('change.active');
Route::delete('/lang/{id}', 'backend\LanguageController@destroy')->name('lang.destroy');
// Route::post('/lang', 'backend\LanguageController@store');
#pages
Route::resource('/pages', 'backend\PagesController');
Route::delete('/pages/{id}' , 'backend\PagesController@destroy');
Route::get('/pages/change_active/{page}','backend\PagesController@change_active')->name('change.active');
#Component Category
Route::resource('/component/category', 'backend\Component_categoryController');
  Route::get('/component/category/dynamic_pdf', 'backend\DynamicPDFController@index');
  Route::get('/component/category/dynamic_pdf/pdf', 'backend\DynamicPDFController@pdf');

  Route::get('/component/category/import_excel', 'backend\ImportExcelController@index');
  Route::post('/component/category/import_excel/import', 'backend\ImportExcelController@import');
#Component
Route::resource('/component', 'backend\ComponentController');
#Gallery
Route::resource('/gallery', 'backend\GalleryController');
#Messages
Route::resource('/messages', 'backend\MessagesController');

#Setting
Route::resource('/setting', 'backend\SettingController');
#Gallery
Route::resource('/form', 'backend\FormController');
});
//-------------------------------------------Front End-------------------------------------
Route::get('/',function(){ return redirect()->to('/en'); });
Route::group(['prefix'=>'{lang?}','middleware' => 'Lang'] , function() {
  Route::get('/' ,'HomeController@lang');
  Route::get('/', 'HomeController@index')->name('home');
  #Form Post Method
  Route::post('/', 'frontend\ContactController@store');
  #Contact Us
  Route::resource('contact-us', 'frontend\ContactController');
  Route::post('/', 'HomeController@formStore');
  #News Route
  Route::get('news', 'frontend\NewsController@index');
  #who we are Page
  Route::get('about-as/who-we-are', 'HomeController@whoWeAre');
  #CME Page
  Route::get('cme', 'HomeController@cme');
  # CEO MESSAGE
  Route::get('ceo-message', 'HomeController@ceo_message');
  # ِAll Products
  Route::get('Products', 'HomeController@all_products');
  #Event Route
  Route::get('events', 'frontend\EventController@index');
  #Gallery
  Route::get('images', 'HomeController@gallery');
  # Sub News Route
  Route::get('News/{slug}', 'frontend\NewsController@sub_news')->name('News');
  # Sub Event Route
  Route::get('Events/{slug}', 'frontend\EventController@sub_events');
  # Calender
  Route::get('Calender', 'HomeController@calender');
  # Products Category
  Route::get('Products/{slug}', 'frontend\ProductsController@index')->name('products');
  # Sub Products Route
  Route::get('Products/{slug}/{slug2}', 'frontend\ProductsController@sub_category');
  # Pages
  Route::get('{slug}', 'frontend\PagesController@pages');
  # Products Route
  Route::get('Products/{slug1}/{slug2}/{slug3}', 'frontend\ProductsController@single_product');
});
