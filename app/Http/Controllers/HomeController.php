<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Component;

class HomeController extends Controller
{

    public function index()
    {
      $component = Component::where('component_category_id', 11)->first();
        return view('frontend.layouts.index')->with('component', $component);
    }

    public function calender()
    {
        return view('frontend.calender');
    }

}
