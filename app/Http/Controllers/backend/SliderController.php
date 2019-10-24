<?php

namespace App\Http\Controllers\backend;

use App\Slider;
use App\Language;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Exception;
use Session;
use Redirect;
use App\Component_category;
use App\Component;
use File;

class SliderController extends Controller
{
    public function index()
    {
        $slider = Component::where('component_category_id' , 2)->orderBy('id','DESC')->get();
        return view('backend.slider.list')->with('slider' , $slider);
    }

    public function create()
    {
        $slider = Component::all();
        $langs = Language::where('active' , 1)->get();
        return view('backend.slider.create')->with('slider' ,$slider)->with('langs' ,$langs);
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'title.en'=>'required',
            'title.ar'=>'required',
            'sub_title.en'=>'required',
            'sub_title.ar'=>'required',
            'description.en'=>'required',
            'description.ar'=>'required',
        ]);
        try {
            $slider = new Component;
            $slider->component_category_id = 2;
            // $slider->bannar = 0;
            $slider->title = $request->input('title');
            $slider->sub_title = $request->input('sub_title');
            $slider->description = $request->input('description');
            // start Update Image
            if ($request->hasfile('image')) {
                File::Delete($slider->image);
                $file = $request->file('image');
                $path = 'uploads/products/';
                $filename = date('Y-m-d-h-i-s').'.'.$file->getClientOriginalExtension();
                $file->move(public_path().'/'.$path,$filename);
                $slider->image = $path.$filename;
            } else {
                $slider->image = 'No Image';
            }
            // Ending Update Image
            $slider->save();
            Session::flash('success' , 'Slider Added Successfully');
            return Redirect::to('dashboard/slider');
        } catch (\Exception $e) {
            dd($e);
            Session::flash('error', 'Slider Not Added');
        }
        return Redirect::back();
    }

    public function edit($id)
    {
        $slider = Slider::find($id);
        $langs = Language::where('active' , 1)->get();
        return view('backend.slider.edit')->with('slider' , $slider)->with('langs' , $langs);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'title.en'=>'required',
            'title.ar'=>'required',
            'sub_title.en'=>'required',
            'sub_title.ar'=>'required',
            'description.en'=>'required',
            'description.ar'=>'required',
        ]);
        try {
            $slider = slider::where('id',$id)->first();
            $slider->slider = 1;
            $slider->bannar = 0;
            $slider->title = $request->input('title');
            $slider->sub_title = $request->input('sub_title');
            $slider->description = $request->input('description');
            // start Update Image
            if ($request->hasfile('image')) {
                File::Delete($slider->image);
                $file = $request->file('image');
                $path = 'uploads/products/';
                $filename = date('Y-m-d-h-i-s').'.'.$file->getClientOriginalExtension();
                $file->move(public_path().'/'.$path,$filename);
                $slider->image = $path.$filename;
            } else {
                $slider->image = 'No Image';
            }
            // Ending Update Image
            $slider->title = $request->input('title'); 
            $slider->save();
            Session::flash('success' , 'Slider Updated Successfully');
            return Redirect::to('dashboard/slider');
        } catch (\Exception $e) {
            Session::flash('error', 'Slider Not Updated');
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
        try {
            $slider = Slider::where('id' , $id)->first();
                Session::flash('success' , 'Slider Deleted Successfully');
                $slider->delete();
        } catch (Exception $e) {
            Session::flash('error' ,'This Slider is A Sub Categoies');
        }
        return Redirect::back();
    }
    public  function ajax_delete(Slider $slider) {
        $slider->delete();

        $slider = Slider::orderBy('id','DESC')->get();
        return view('backend.slider.ajax')->with('slider' , $slider);
        //        return response()->view('');

    }
}
