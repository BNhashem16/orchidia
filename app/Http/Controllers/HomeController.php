<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Component;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
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
