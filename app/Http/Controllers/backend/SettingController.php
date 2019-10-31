<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Setting;
use App\Language;
use File;
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
        $social_array = ["href"          =>  $href,
                          "target"        =>  $target,
                          "class"         =>  $class];
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
        $setting->created_by = 1;
        $setting->updated_by = 1;
        $setting->save();

      Session::flash('success' , 'Form Added Successfully');
      return Redirect::to('dashboard/setting');
  } catch (\Exception $e) {
    dd($e);
      Session::flash('error', 'Form Not Added');
    }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
