<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Gallery;
use App\Page;
use Exception;
use Session;
use Redirect;
use validator;
use File;

class GalleryController extends Controller
{
    public function index()
    {
      $gallery = Gallery::get();
      return view('backend.gallery.list')->with('gallery' , $gallery);
    }

    public function create()
    {
      $page = Page::get();
      $gallery = Gallery::get();
      return view('backend.gallery.create')->with('gallery' ,$gallery)->with('page' ,$page);
    }

    public function store(Request $request)
    {
      $this->validate($request,[
          'title'=>'required',
          'image'=>'required',
      ]);

      try {
          $gallery = new Gallery;
          $gallery->title = $request->title;
          $gallery->page_id = $request->page_id;
          $gallery->type = $request->type;
          // start Update Image
          if ($request->hasfile('image')) {
              File::Delete($gallery->attachment);
              $file = $request->file('image');
              $path = 'uploads/pages/';
              $filename = date('Y-m-d-h-i-s').'.'.$file->getClientOriginalExtension();
              $file->move(public_path().'/'.$path,$filename);
              $gallery->attachment = $path.$filename;
          }
          // Ending Update Image
          $gallery->save();
          Session::flash('success' , 'Gallery Added Successfully');
          return Redirect::to('dashboard/gallery');
      } catch (\Exception $e) {
          Session::flash('error', 'Gallery Not Added');

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
    
    public function destroy($id)
    {
      if(!$id || Gallery::where('id',$id)->count() == 0) {
        return \App::abort(404);
      }

    try {
      Gallery::where('id',$id)->delete();
        Session::flash('success','Gallery Deleted Successfully');
    } catch (\Exception $e) {
      Session::flash('error','Gallery Not Deleted');
    }
    return Redirect::back();
    }
}
