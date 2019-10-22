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


//============
//==Back End==
//============
#Home
Route::get('dashboard', 'backend\DashboardController@index')->name('dashboard');
#Category
Route::resource('dashboard/categories', 'backend\CategoryController');
Route::get('dashboard/categories/delete_ajax/{category}','backend\CategoryController@ajax_delete')->name('delete.ajax');
Route::get('dashboard/categories/change_active/{category}','backend\CategoryController@change_active')->name('change.active');
#Slider & Bannar
Route::resource('dashboard/slider', 'backend\SliderController');
Route::get('dashboard/slider/delete_ajax/{slider}','backend\SliderController@ajax_delete')->name('delete.ajax');
Route::get('dashboard/slider/change_active/{slider}','backend\SliderController@change_active')->name('change.active');

#Product
Route::resource('dashboard/product', 'backend\ProductController');
#News
Route::resource('dashboard/news', 'backend\NewsController');
#Language
Route::resource('dashboard/lang', 'backend\LanguageController');
Route::get('dashboard/lang/delete_ajax/{lang}','backend\LanguageController@ajax_delete')->name('delete.ajax');
Route::get('dashboard/lang/change_active/{lang}','backend\LanguageController@change_active')->name('change.active');
#pages
Route::resource('dashboard/pages', 'backend\PagesController');
Route::get('dashboard/pages/delete_ajax/{page}','backend\PagesController@ajax_delete')->name('delete.ajax');
Route::get('dashboard/pages/change_active/{page}','backend\PagesController@change_active')->name('change.active');
