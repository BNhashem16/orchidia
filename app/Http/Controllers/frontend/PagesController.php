<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Page;

class PagesController extends Controller
{
    public function pages($slug) {
      $page = Page::where('active' , 1)->where('nav' , 1)->where('slug' , $slug)->first();
      return view('frontend.pages');
    }
}
