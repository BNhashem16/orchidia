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
            dd($e);
            Session::flash('error', 'Component Not Added');
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
