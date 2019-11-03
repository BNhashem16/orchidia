<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Page;
use App\Language;
use App\Gallery;
use Illuminate\Support\Str;
use App\Component_category;
use Auth;
use Exception;
use Session;
use Redirect;
use validator;
use File;

class PagesController extends Controller
{
    public function index()
    {
        $page = Page::orderBy('id','DESC')->get();
        return view('backend.pages.list')->with('page' , $page);
    }

    public function create()
    {
        $page = Page::get();
        $langs = Language::where('active' , 1)->get();
        $forms = Component_category::where('type' , 'form')->get();
        return view('backend.pages.create')->with('page' ,$page)->with('langs' ,$langs)->with('forms' ,$forms);
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'description.en'=>'required',
            'description.ar'=>'required',
        ]);

        try {
            $title_en= $request->title['en'];
            $page = new Page;
            $page->title = $request->title;
            $page->description = $request->description;
            $page->slug = Str::slug($title_en,'-');
            $page->active = $request->input('status');
            // start Update Image
            if ($request->hasfile('image')) {
                File::Delete($page->image);
                $file = $request->file('image');
                $path = 'uploads/pages/';
                $filename = date('Y-m-d-h-i-s').'.'.$file->getClientOriginalExtension();
                $file->move(public_path().'/'.$path,$filename);
                $page->image = $path.$filename;
            }
            // Ending Update Image
            $page->page_id = $request->input('page_id');
            $page->form_id = $request->form;
            $page->created_by = Auth::user()->id;
            $page->have_gallary = $request->input('have_gallary');
            $page->have_form = $request->input('have_form');
            $page->nav = $request->input('nav');
            $page->save();

            Session::flash('success' , 'Page Added Successfully');
            return Redirect::to('dashboard/pages');
        } catch (\Exception $e) {
            Session::flash('error', 'Page Not Added');
        }
        return Redirect::back();
    }

    public function edit($id)
    {
      $galleries = Gallery::get();
      $page = Page::find($id);
      $page_get = Page::get();
      $langs = Language::get();
      $forms = Component_category::where('type' , 'form')->get();
      return view('backend.pages.edit')->with('page' , $page)->with('page_get' , $page_get)->with('langs' , $langs)->with('galleries' , $galleries)->with('forms' ,$forms);
    }

    public function update(Request $request, $id)
    {
        try {
            $title_en= $request->title['en'];
            $page = Page::find($id);
            $page->title = $request->title;
            $page->description = $request->description;
            $page->slug = Str::slug($title_en,'-');
            $page->active = $request->input('status');
            // start Update Image
            if($request->hasFile('image')) {
                File::Delete($page->image);
               $file = $request->file('image');
               $path = 'uploads/page/';
               $filename = date('Y-m-d-h-i-s').'.'.$file->getClientOriginalExtension();
               $file->move(public_path().'/'.$path,$filename);
                $page->image = $path.$filename;
            }
            // Ending Update Image
            $page->page_id = $request->input('page_id');
            $page->have_gallary = $request->input('have_gallary');
            $page->have_form = $request->input('have_form');
            $page->nav = $request->input('nav');
            $page->form_id = $request->form;
            $page->updatde_by = Auth::user()->id;
            $page->save();
            Session::flash('success' , 'Page Updated Successfully');
            return Redirect::to('dashboard/pages');
        } catch (\Exception $e) {
            Session::flash('error', 'Page Not Updated');
        }
        return Redirect::back();
    }

    public function destroy($id)
    {
      if(!$id || Page::where('id',$id)->count() == 0) {
        return \App::abort(404);
      }

    try {
      Page::where('id',$id)->delete();
        Session::flash('success','Page Deleted Successfully');
    } catch (\Exception $e) {
      Session::flash('error','Page Not Deleted');
    }
    return Redirect::back();
    }
}
