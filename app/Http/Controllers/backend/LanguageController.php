<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Language;
use Auth;
use Exception;
use Session;
use Validator;
use Redirect;
use Response;

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
              $lang->name = $request->input('name');
              $lang->short_code = $request->input('short_code');
              $lang->active = $request->input('active');
              $lang->updated_by = Auth::user()->id;
              $lang->save();
              Session::flash('success', 'Language Updated Successfully');
              return Redirect::to('dashboard/lang');
          } catch (\Exception $e) {
              Session::flash('error', 'Language Not Updated');
              return Redirect::back();
          }

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
            $lang->updated_by = Auth::user()->id;
            $lang->save();
            Session::flash('success', 'Language Updated Successfully');
            return Redirect::to('dashboard/lang');
        } catch (\Exception $e) {
            Session::flash('error', 'Language Not Updated');
            return Redirect::back();
        }
    }

    // public  function change_active(Language $lang) {
    //     $active = $_GET['active'];
    //     $active == 1 ? $lang->update(['active'=>0]) :   $lang->update(['active'=>1]);
    //
    //     $lang->save();
    //     $lang = Language::orderBy('id','DESC')->get();
    // //     return view('backend.language.ajax')->with('lang' , $lang);
    //
    // }
    public function destroy(Language $lang){
      $lang->delete();
      return Session::flash('success' ,'Record deleted successfully!');
    }
}
