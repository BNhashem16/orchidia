<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Component;
use App\Page;

class ProductsController extends Controller
{
  // public function index() {
  //   return view('frontend.sub_category');
  // }

  public function index($lang ,$slug) {
    $page = Page::where('slug',$slug)->first();
    $pro = Component::where('component_category_id', 14)->get();
    return view('frontend.sub_products')->with('pro', $pro)->with('page', $page);
  }

  public function sub_category($lang ,$slug , $slug2) {
    $sub = Page::where('slug',$slug)->first();
    $product = Page::where('slug',$slug2)->first();
    $get_id = Page::get();
    $single_product = Page::where('page_id', $product->id)->first();
    return view('frontend.single_product')->with('single_product', $single_product)->with('product', $product)->with('sub', $sub);
  }

  public function single_product($lang , $slug , $slug2 , $slug3) {
    $sub = Page::where('slug',$slug)->first();
    $page = Page::where('slug',$slug2)->first();
    $page = Page::where('slug',$slug3)->first();
    $pro = Component::where('component_category_id', 14)->get();
    return view('frontend.single_product')->with('pro', $pro)->with('page', $page)->with('sub', $sub);
  }
}
