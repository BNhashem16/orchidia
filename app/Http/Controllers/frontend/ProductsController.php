<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Component;

class ProductsController extends Controller
{
  public function index() {
    return view('frontend.products');
  }

  public function sub_products($slug) {
    $component = Component::where('link',$slug)->first();
    $pro = Component::where('component_category_id', 14)->get();
    return view('frontend.sub_products')->with('pro', $pro);
  }
}
