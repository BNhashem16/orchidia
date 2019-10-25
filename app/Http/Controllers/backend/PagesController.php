<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Page;
use App\Language;
use Illuminate\Support\Str;
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
        return view('backend.pages.create')->with('page' ,$page)->with('langs' ,$langs);
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
            $page->form_id = 1;
            $page->created_by = 1;
            $page->updatde_by = 1;
            $page->have_gallary = $request->input('have_gallary');
            $page->have_form = $request->input('have_form');
            $page->save();

            Session::flash('success' , 'Page Added Successfully');
            return Redirect::to('dashboard/pages');
        } catch (\Exception $e) {


            Session::flash('error', 'Page Not Added');
            // dd($page);
            // var_dump($e);
        }
        return Redirect::back();
    }


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
