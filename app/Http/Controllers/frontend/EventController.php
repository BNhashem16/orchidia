<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Component;

class EventController extends Controller
{
  public function index() {
    return view('frontend.events');
  }

  public function sub_events($slug) {
    $component = Component::where('link',$slug)->first();
    return view('frontend.sub_events')->with('component' , $component);
  }
}
