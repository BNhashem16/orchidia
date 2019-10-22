<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\News;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Exception;
use Session;
use Redirect;
use File;

class NewsController extends Controller
{

    public function index()
    {
        $new = News::orderBy('id','DESC')->get();
        return view('backend.new.list')->with('new' , $new);
    }

    public function create()
    {
        $new = News::get();
        return view('backend.new.create')->with('new' ,$new);
    }


    public function store(Request $request)
    {
        try {
            $new = new News;
            $new->title = $request->input('title');
            $new->slug = Str::slug($request->input('title') , '-');
            // start Update Image
            if ($request->hasfile('image')) {
                File::Delete($new->image);
                $file = $request->file('image');
                $path = 'uploads/products/';
                $filename = date('Y-m-d-h-i-s').'.'.$file->getClientOriginalExtension();
                $file->move(public_path().'/'.$path,$filename);
                $new->image = $path.$filename;
            } else {
                $new->image = 'No Image';
            }
            // Ending Update Image
            $new->description = $request->input('description');
            $new->new = $request->input('new');
            $new->save();
            Session::flash('success' , 'News Added Successfully');
            return Redirect::to('dashboard/news');
        } catch (\Exception $e) {
            Session::flash('error', 'News Not Added');
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

    public function destroy($id)
    {
        try {
            $new = News::where('id' , $id)->first();
            if (News::where('new_id' , $id)->count()) {
                Session::flash('error' , 'This News is A Sub Categoies');
            } else {
                Session::flash('success' , 'News Deleted Successfully');
                $new->delete();
            }
        } catch (Exception $e) {
            Session::flash('error' ,'This News is A Sub Categoies');
        }
        return Redirect::back();
    }
    public  function ajax_delete(News $new) {
        $new->delete();

        $new = News::orderBy('id','DESC')->get();
        return view('backend.new.ajax')->with('new' , $new);
        //        return response()->view('');

    }
    public  function change_active(News $new) {
        $active = $_GET['active'];
        $active == 1 ? $new->update(['active'=>0]) :   $new->update(['active'=>1]);

        $new->save();
        $new = News::orderBy('id','DESC')->get();
        return view('backend.new.ajax')->with('new' , $new);
        //        return response()->view('');

    }
}
