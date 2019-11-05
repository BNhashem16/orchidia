<?php

namespace App\Http\Controllers\backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Component_category;
use Auth;
use Session;
use Redirect;
use validator;

class Component_categoryController extends Controller
{
    public function index()
    {
        $component_category = Component_category::orderBy('id','DESC')->get();
        return view('backend.component_category.list')->with('component_category' , $component_category);
    }

    public function create()
    {
        $component_category = Component_category::get();
        return view('backend.component_category.create')->with('component_category' , $component_category);
    }

    public function store(Request $request)
    {
        try {
            $component_category = new Component_category;
            $component_category->title = $request->title;
            $component_category->type = $request->type;
            $component_category->created_by = Auth::user()->id;
            $component_category->save();
              Session::flash('success' , 'Language Added Successfully');
              return Redirect::to('dashboard/component/category');
            } catch (\Exception $e) {
              Session::flash('error', 'Language Not Added');
            }
            return Redirect::back();
    }

    public function edit($id)
    {
        $component_category = Component_category::find($id);
        return view('backend.component_category.edit')->with('component_category' , $component_category);
    }

    public function update(Request $request, $id)
    {
        try {
            $component_category = Component_category::where('id',$id)->first();
            $component_category->title = $request->input('title');
            $component_category->type = $request->type;
            $component_category->updated_by = Auth::user()->id;
            $component_category->save();
              Session::flash('success', 'Component Updated Successfully');
              return Redirect::to('dashboard/component/category');
            } catch (\Exception $e) {
              Session::flash('error', 'Component Not Updated');
              return Redirect::back();
            }
    }

    public function destroy($id)
    {
    	  if(!$id || Component_category::where('id',$id)->count() == 0) {
    		return \App::abort(404);
    	}

		try {
			  $category = Component_category::find($id);

        foreach ($category->forms as  $value) {
          $value->delete();
        }
        $category->delete();
    		 Session::flash('success','Component Category Deleted Successfully');
		    } catch (\Exception $e) {
			   Session::flash('error','Component Category Not Deleted');
		     }
		       return Redirect::back();
         }
}
