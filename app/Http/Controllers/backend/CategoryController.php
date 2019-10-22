<?php

namespace App\Http\Controllers\backend;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Exception;
use Session;
use Redirect;
use File;

class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::orderBy('id','DESC')->get();
        return view('backend.category.list')->with('category' , $category);
    }

    public function create()
    {
        $category = Category::get();
        return view('backend.category.create')->with('category' ,$category);
    }

    public function store(Request $request)
    {
        try {
            $category = new Category;
            $category->category_id = $request->input('category_id');
            $category->name = $request->name;
            $category->slug = Str::slug($request->input('name') , '-');
            // start Update Image
            if ($request->hasfile('image')) {
                File::Delete($category->image);
                $file = $request->file('image');
                $path = 'uploads/products/';
                $filename = date('Y-m-d-h-i-s').'.'.$file->getClientOriginalExtension();
                $file->move(public_path().'/'.$path,$filename);
                $category->image = $path.$filename;
            } else {
                $category->image = 'No Image';
            }
            // Ending Update Image
            $category->active = $request->input('status');
            $category->save();
            Session::flash('success' , 'Category Added Successfully');
            return Redirect::to('dashboard/categories');
        } catch (\Exception $e) {
            Session::flash('error', 'Category Not Added');
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
        try {
            $category = Category::where('id' , $id)->first();
            if (Category::where('category_id' , $id)->count()) {
                Session::flash('error' , 'This Category is A Sub Categoies');
            } else {
                Session::flash('success' , 'Category Deleted Successfully');
                $category->delete();
            }
        } catch (Exception $e) {
            Session::flash('error' ,'This Category is A Sub Categoies');
        }
        return Redirect::back();
    }
    public  function ajax_delete(Category $category) {
        $category->delete();

        $category = Category::orderBy('id','DESC')->get();
        return view('backend.category.ajax')->with('category' , $category);
        //        return response()->view('');

    }
    public  function change_active(Category $category) {
        $active = $_GET['active'];
        $active == 1 ? $category->update(['active'=>0]) :   $category->update(['active'=>1]);

        $category->save();
        $category = Category::orderBy('id','DESC')->get();
        return view('backend.category.ajax')->with('category' , $category);
        //        return response()->view('');

    }
}
