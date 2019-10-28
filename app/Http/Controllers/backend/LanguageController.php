<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Language;
use Exception;
use Session;
use Redirect;

class LanguageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lang = Language::orderBy('id','DESC')->get();
        return view('backend.language.list')->with('lang' , $lang);
    }

    public function create()
    {
        $lang = Language::get();
        return view('backend.language.create')->with('lang' ,$lang);
    }

    public function store(Request $request)
    {
        try {
            $lang = new Language;
            $lang->name = $request->name;
            $lang->short_code = $request->short_code;
            $lang->active = $request->input('status');
            $lang->save();
            Session::flash('success' , 'Language Added Successfully');
            return Redirect::to('dashboard/lang');
        } catch (\Exception $e) {
            Session::flash('error', 'Language Not Added');
        }
        return Redirect::back();
    }

    public function edit($id)
    {
        $lang = Language::find($id);
        return view('backend.language.edit')->with('lang' , $lang);
    }
    public function update(Request $request, $id)
    {
        try {
            $lang = Language::where('id',$id)->first();
            $lang->name = $request->input('name');
            $lang->short_code = $request->input('short_code');
            $lang->active = $request->input('status');
            $lang->save();
            Session::flash('success', 'Language Updated Successfully');
            return Redirect::to('dashboard/lang');
        } catch (\Exception $e) {
            Session::flash('error', 'Language Not Updated');
            return Redirect::back();
        }
    }

    public function destroy($id)
    {
      if(!$id || Language::where('id',$id)->count() == 0) {
        return \App::abort(404);
      }

    try {
      Language::where('id',$id)->delete();
        Session::flash('success','Language Deleted Successfully');
    } catch (\Exception $e) {
      Session::flash('error','Language Not Deleted');
    }
    return Redirect::back();
    }
    // public  function ajax_delete(Language $lang) {
    //     $lang->delete();
    //
    //     $lang = Language::orderBy('id','DESC')->get();
    //     return view('backend.language.ajax')->with('lang' , $lang);
    // }
    // public  function change_active(Language $lang) {
    //     $active = $_GET['active'];
    //     $active == 1 ? $lang->update(['active'=>0]) :   $lang->update(['active'=>1]);
    //
    //     $lang->save();
    //     $lang = Language::orderBy('id','DESC')->get();
    // //     return view('backend.language.ajax')->with('lang' , $lang);
    //
    // }
}
