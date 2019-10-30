<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Component;
use App\Message;
use Session;
use App\Language;
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
        $message_array = ["name"          =>  $name,
                          "email"         =>  $email,
                          "phone_number"  =>  $phone_number,
                          "subject"       =>  $subject,
                          "message"       =>  $msg];
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



}
