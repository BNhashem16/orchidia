<?php
use Illuminate\Support\Facades\Route;

//Auth::routes();





//============
//==Back End==
//============
#Home
Route::get('dashboard', 'backend\DashboardController@index')->name('dashboard');
#Category
// Route::resource('dashboard/categories', 'backend\CategoryController');
// Route::get('dashboard/categories/delete_ajax/{category}','backend\CategoryController@ajax_delete')->name('delete.ajax');
// Route::get('dashboard/categories/change_active/{category}','backend\CategoryController@change_active')->name('change.active');
#Slider & Bannar
Route::resource('dashboard/slider', 'backend\SliderController');
Route::get('dashboard/slider/delete_ajax/{slider}','backend\SliderController@ajax_delete')->name('delete.ajax');
Route::get('dashboard/slider/change_active/{slider}','backend\SliderController@change_active')->name('change.active');

#Language
Route::resource('dashboard/lang', 'backend\LanguageController');
Route::get('dashboard/lang/delete_ajax/{lang}','backend\LanguageController@ajax_delete')->name('delete.ajax');
Route::get('dashboard/lang/change_active/{lang}','backend\LanguageController@change_active')->name('change.active');
#pages
Route::resource('dashboard/pages', 'backend\PagesController');
Route::get('dashboard/pages/delete_ajax/{page}','backend\PagesController@ajax_delete')->name('delete.ajax');
Route::get('dashboard/pages/change_active/{page}','backend\PagesController@change_active')->name('change.active');
#Component Category
Route::resource('dashboard/component/category', 'backend\Component_categoryController');
#Component Category
Route::resource('dashboard/component', 'backend\ComponentController');
#Gallery
Route::resource('dashboard/gallery', 'backend\GalleryController');
#Gallery
Route::resource('dashboard/form', 'backend\FormController');
#Login
Route::get('dashboard/login', 'backend\UserController@login');
Route::post('dashboard/login', 'backend\UserController@doLogin');




//=============
//==Front End==
//=============
Route::get('/',function(){
  return redirect()->to('/en');
});
Route::group(['prefix'=>'{lang?}','middleware' => 'Lang'] , function() {
  Route::get('/' ,'HomeController@lang');

  Route::get('/', 'HomeController@index')->name('home');

  #Contact Us
  Route::resource('contact-us', 'frontend\ContactController');
  // Route::post('contact-us', 'HomeController@formStore')->name('contactus');
  #News Route
  Route::get('news', 'frontend\NewsController@index');
  # Sub News Route
  Route::get('News/{slug}', 'frontend\NewsController@sub_news');
  #Event Route
  Route::get('events', 'frontend\EventController@index');
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
