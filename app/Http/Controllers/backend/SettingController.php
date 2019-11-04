<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Setting;
use App\Language;
use File;
use Auth;
use Session;
use Redirect;
use validator;

class SettingController extends Controller
{
    public function index()
    {
        $setting = Setting::get();
        return view('backend.settings.list')->with('setting', $setting);
    }

    public function create()
    {
      $langs = Language::where('active', '1')->get();
        return view('backend.settings.create')->with('langs', $langs);
    }

    public function store(Request $request)
    {
      try {
        $href = $request->input('href');
        $target = $request->input('target');
        $class = $request->input('class');
        $social_array = [ "href"          =>  $href,
                          "target"        =>  $target,
                          "class"         =>  $class];
        $email = $request->input('email');
        $fax = $request->input('fax');
        $phone_number = $request->input('phone_number');
        $info_array = [ "email"         =>  $email,
                        "fax"           =>  $fax,
                        "phone_number"  =>  $phone_number ];

        $setting = new Setting;
        $setting->title =  $request->input('title');

        $setting->related_icon =  $request->input('related_icon');
        // start Update Image
        if ($request->hasfile('image')) {
            File::Delete($setting->image);
            $file = $request->file('image');
            $path = 'uploads/pages/';
            $filename = date('Y-m-d-h-i-s').'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/'.$path,$filename);
            $setting->logo = $path.$filename;
        }
        // Ending Update Image
        $setting->link = $social_array;
        $setting->extra =  $info_array;
        $setting->created_by = Auth::user()->id;
        $setting->save();

      Session::flash('success' , 'Form Added Successfully');
      return Redirect::to('dashboard/setting');
  } catch (\Exception $e) {
    dd($e);
      Session::flash('error', 'Form Not Added');
    }
    }

    public function edit($id)
    {
      $setting = Setting::find($id);
      $langs = Language::get();
      return view('backend.settings.edit')->with('setting' , $setting)->with('langs' , $langs);

    }

    public function update(Request $request, $id)
    {
      try {
        $href = $request->input('href');
        $target = $request->input('target');
        $class = $request->input('class');
        $social_array = [ "href"          =>  $href,
                          "target"        =>  $target,
                          "class"         =>  $class];
        $email = $request->input('email');
        $fax = $request->input('fax');
        $phone_number = $request->input('phone_number');
        $info_array = [ "email"         =>  $email,
                        "fax"           =>  $fax,
                        "phone_number"  =>  $phone_number ];

        $setting = Setting::find($id);
        $setting->title =  $request->input('title');

        $setting->related_icon =  $request->input('related_icon');
        // start Update Image
        if ($request->hasfile('image')) {
            File::Delete($setting->image);
            $file = $request->file('image');
            $path = 'uploads/pages/';
            $filename = date('Y-m-d-h-i-s').'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/'.$path,$filename);
            $setting->logo = $path.$filename;
        }
        // Ending Update Image
        $setting->link = $social_array;
        $setting->extra =  $info_array;
        $setting->updated_by = Auth::user()->id;
        $setting->save();

      Session::flash('success' , 'Settings Updated Successfully');
      return Redirect::to('dashboard/setting');
  } catch (\Exception $e) {
    dd($e);
      Session::flash('error', 'Setting Not Udated');
    }
    }


    public function destroy($id)
    {
      if(!$id || Setting::where('id',$id)->count() == 0) {
        return \App::abort(404);
      }

    try {
      Setting::where('id',$id)->delete();
        Session::flash('success','Setting Deleted Successfully');
    } catch (\Exception $e) {
      Session::flash('error','Setting Not Deleted');
    }
    return Redirect::back();

    }
}
