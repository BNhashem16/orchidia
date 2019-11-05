<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Form;
use Auth;
use App\Component_category;
use App\Language;
use Session;
use Redirect;
use validator;


class FormController extends Controller
{

    public function index()
    {
      $forms = Form::all();
      return view('backend.form.list')->with('forms' , $forms);
    }

    public function create()
    {
      $form = Form::get();
      $langs = Language::where('active' , 1)->get();
      $component_category = Component_category::where('type', 'form')->get();
      return view('backend.form.create')->with('form' , $form)->with('langs' , $langs)->with('component_category' , $component_category);
    }

    public function store(Request $request)
    {

      try {
        $title_en = $request->title["en"];
        $name = str_replace(" ","_", $title_en);
        $name = strtolower($name);
        $mendatory = $request->mendatory == null ? 0 : 1 ;
        $type =$request->type;
        $field = [  "name"      =>  $name,
                    "type"      =>  $type,
                    "mendatory" =>  $mendatory];

        $extra = $request->extra;
        // dd($extra);
        // $extra_array= [];
        // foreach ($extra as $key => $value) {
        //   foreach ($value as  $key2=>$type) {
        //     var_dump($type);
        //   }
        // }die();
        // $extra_array = [  "option"    =>  $extra ];

        $title = $request->title;
        $form = new Form;
        $form->title = $title;
        $form->field = $field;
        $form->extra = $extra;
        $form->component_category_id = $request->component_category_id;
        $form->created_by = Auth::user()->id;
        $form->save();

      Session::flash('success' , 'Form Added Successfully');
      return Redirect::to('dashboard/form');
  } catch (\Exception $e) {
    dd($e);
      Session::flash('error', 'Form Not Added');
  }
  return Redirect::back();
    }


    public function edit($id)
    {
      $form = Form::find($id);
      $langs = Language::where('active' , 1)->get();
      $component_category = Component_category::where('type', 'form')->get();
      return view('backend.form.edit')->with('form' , $form)->with('langs' , $langs)->with('component_category' , $component_category);
    }


    public function update(Request $request, $id)
    {
      try {
        $title_en = $request->title["en"];
        $name = str_replace(" ","_", $title_en);
        $name = strtolower($name);
        $mendatory = $request->mendatory == null ? 0 : 1 ;
        $type =$request->type;
        $field = [  "name"      =>  $name,
                    "type"      =>  $type,
                    "mendatory" =>  $mendatory];
        // $extra = $request->extra;
        // $extra_array = [  "option"    =>  $extra ];
        $title = $request->title;
        $form = Form::find($id);
        $form->title = $title;
        $form->field = $field;
        $form = $request->extra;
        // $form->extra = $extra_array;
        $form->component_category_id = $request->component_category_id;
        $form->updated_by = Auth::user()->id;
        $form->save();

      Session::flash('success' , 'Form Added Successfully');
      return Redirect::to('dashboard/form');
  } catch (\Exception $e) {
    dd($e);
      Session::flash('error', 'Form Not Added');
  }
  return Redirect::back();
    }

    public function destroy($id)
    {
      if(!$id || Form::where('id',$id)->count() == 0) {
        return \App::abort(404);
      }

    try {
      Form::where('id',$id)->delete();
        Session::flash('success','Form Deleted Successfully');
    } catch (\Exception $e) {
      Session::flash('error','Form Not Deleted');
    }
    return Redirect::back();
    }
}
