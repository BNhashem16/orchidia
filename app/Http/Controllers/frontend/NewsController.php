<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Component;

class NewsController extends Controller
{
    public function index() {
      return view('frontend.news');
    }

    public function sub_news($lang ,$slug) {

      $news = Component::where('link',$slug)->first();

      return view('frontend.sub_news')->with('news' , $news);
    }
}
