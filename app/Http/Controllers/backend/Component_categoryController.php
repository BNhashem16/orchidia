<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Component_category;
use Session;
use Redirect;

class Component_categoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
            $component_category->created_by = 1;
            $component_category->updated_by = 1;
            $component_category->save();
            Session::flash('success' , 'Language Added Successfully');
            return Redirect::to('dashboard/component/category');
        } catch (\Exception $e) {
            dd($e);
            Session::flash('error', 'Language Not Added');
        }
        return Redirect::back();
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
        try {
            $component_category = Component_category::where('id' , $id)->first();
            if (Component_category::where('id' , $id)->count()) {
                Session::flash('error' , 'This Category is A Sub Categoies');
            } else {
                Session::flash('success' , 'Category Deleted Successfully');
                $component_category->delete();
            }
        } catch (Exception $e) {
            Session::flash('error' ,'This Category is A Sub Categoies');
        }
        return Redirect::back();
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
