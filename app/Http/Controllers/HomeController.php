<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Component;
use Session;
use App\Language;

class HomeController extends Controller
{

    public function index()
    {
      $lang = Language::all();
      $component = Component::where('component_category_id', 11)->first();
        return view('frontend.layouts.index')->with('component', $component)->with('lang', $lang);
    }

    public function calender()
    {
        return view('frontend.calender');
    }

    public function lang($lang) {
      if (isset($lang) && !empty($lang)) {
        Session::put('lang' , $lang);
      } else {
        Session::put('lang' , 'en');
      }
      return back();
}

}
