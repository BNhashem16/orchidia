<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Component;
use App\Message;
use Session;
use App\Language;
use App\Page;
use App\Gallery;
use Redirect;
use validator;

class HomeController extends Controller
{

    public function index()
    {
      $switch = Language::first();
      $lang = Language::all();
      $component = Component::where('component_category_id', 11)->first();
        return view('frontend.layouts.index')->with('component', $component)->with('lang', $lang)->with('switch', $switch);
    }

    # Who We are page
    public function whoWeAre() {
      $whoWeAre = Page::where('slug', 'who-we-are')->first();
      return view('frontend.whoWeAre')->with('whoWeAre', $whoWeAre);
    }
    #CME Page
    public function cme() {
      $cme = Page::where('slug', 'cme')->first();
      return view('frontend.cme')->with('cme', $cme);
    }

    #Gallery
    public function gallery() {
      $image = Gallery::where('type', 'image')->get();
      $video = Gallery::where('type', 'video')->get();
      return view('frontend.gallery')->with('image', $image)->with('video', $video);
    }

    public function home()
    {
      $switch = Language::first();
      $lang = Language::all();
      $component = Component::where('component_category_id', 11)->first();
        return view('frontend.layouts.index')->with('component', $component)->with('lang', $lang)->with('switch', $switch);
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

    public function formStore(Request $request)
    {
      try {
        $name = $request->input('name');
        $email = $request->input('email');
        $phone_number = $request->input('phone_number');
        $subject = $request->input('subject');
        $msg = $request->input('message');

        $full_name = $request->input('full_name');
        $department = $request->input('department');
        $date = $request->input('date');
        $message_array = [ // Form 1
                          "name"          =>  $name,
                          "email"         =>  $email,
                          "phone_number"  =>  $phone_number,
                          "subject"       =>  $subject,
                          "message"       =>  $msg,
                          // Form 2
                          "full_name"       =>  $full_name,
                          "department"    => $department,
                        "date"    => $date];
        $contact_form = new Message;
        $contact_form->message = $message_array;
        $contact_form->page_id = 1;
        $contact_form->created_by = 1;
        $contact_form->updated_by = 1;
        $contact_form->save();

      Session::flash('success' , 'Form Added Successfully');
      return Redirect::to('/');
  } catch (\Exception $e) {
    dd($e);
      Session::flash('error', 'Form Not Added');
    }
  }

  public function ceo_message($slug) {
    $ceo_message = Component::where('link',$slug)->first();
    return view('frontend.ceo_message')->with('ceo_message' , $ceo_message);
  }



}
