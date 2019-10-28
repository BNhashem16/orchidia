<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Component;
use App\Component_category;
use App\Language;
use Illuminate\Support\Str;
use Exception;
use Session;
use Redirect;
use File;

class ComponentController extends Controller
{
    public function index()
    {
        $component_category = Component_category::get();
        $components = Component::orderBy('id','DESC')->get();
        return view('backend.component.list')->with('components' , $components)->with('component_category' , $component_category);
    }

    public function create()
    {
        $langs = Language::where('active' , 1)->get();
        $component_category = Component_category::get();
        $component = Component::orderBy('id','DESC')->get();
        return view('backend.component.create')->with('langs' , $langs)->with('component' , $component)->with('component_category' , $component_category);
    }

    public function store(Request $request)
    {
            try {
            $title_en= $request->title['en'];
            $component = new Component;
            $component->component_category_id = $request->component_category_id;
            $component->title = $request->title;
            $component->sub_title = $request->sub_title;
            $component->description = $request->description;
            $component->extra = $request->extra;
            $component->link = Str::slug($title_en,'-');
            // start Update Image
            if ($request->hasfile('image')) {
                File::Delete($component->image);
                $file = $request->file('image');
                $path = 'uploads/pages/';
                $filename = date('Y-m-d-h-i-s').'.'.$file->getClientOriginalExtension();
                $file->move(public_path().'/'.$path,$filename);
                $component->image = $path.$filename;
            }
            // Ending Update Image
            $component->created_by = 1;
            $component->updated_by = 1;
            $component->save();
            Session::flash('success' , 'Component Added Successfully');
            return Redirect::to('dashboard/component');
        } catch (\Exception $e) {
            Session::flash('error', 'Component Not Added');
        }
        return Redirect::back();
    }

    public function edit($id)
    {
      $component = Component::find($id);
      $langs = Language::get();
      $component_category = Component_category::get();
      return view('backend.component.edit')->with('component' , $component)->with('component_category' , $component_category)->with('langs' , $langs);
    }

    public function update(Request $request, $id)
    {
      try {
      $title_en= $request->title['en'];
      $component = Component::where('id',$id)->first();
      $component->component_category_id = $request->component_category_id;
      $component->title = $request->title;
      $component->sub_title = $request->sub_title;
      $component->description = $request->description;
      $component->extra = $request->extra;
      $component->link = Str::slug($title_en,'-');
      // start Update Image
      if ($request->hasfile('image')) {
          File::Delete($component->image);
          $file = $request->file('image');
          $path = 'uploads/pages/';
          $filename = date('Y-m-d-h-i-s').'.'.$file->getClientOriginalExtension();
          $file->move(public_path().'/'.$path,$filename);
          $component->image = $path.$filename;
      }
      // Ending Update Image
      $component->created_by = 1;
      $component->updated_by = 1;
      $component->save();
      Session::flash('success' , 'Component Added Successfully');
      return Redirect::to('dashboard/component');
  } catch (\Exception $e) {
      Session::flash('error', 'Component Not Added');
  }
  return Redirect::back();
    }

    public function destroy($id)
    {
      if(!$id || Component::where('id',$id)->count() == 0) {
        return \App::abort(404);
      }

    try {
      Component::where('id',$id)->delete();
        Session::flash('success','Component Deleted Successfully');
    } catch (\Exception $e) {
      Session::flash('error','Component Not Deleted');
    }
    return Redirect::back();
    }
}
