<?php


//Route::get('/', function () {
//    return view('welcome');
//});

//Auth::routes();
//=============
//==Front End==
//=============
use Illuminate\Support\Facades\Route;
Route::get('/', 'HomeController@index')->name('home');
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
# Products
Route::get('Products', 'frontend\ProductsController@index');
# Sub Products Route
Route::get('Products/{slug}', 'frontend\ProductsController@sub_products');

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

#Product
// Route::resource('dashboard/product', 'backend\ProductController');
#News
// Route::resource('dashboard/news', 'backend\NewsController');
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
#Login
Route::get('dashboard/login', 'backend\UserController@login');
Route::post('dashboard/login', 'backend\UserController@doLogin');
