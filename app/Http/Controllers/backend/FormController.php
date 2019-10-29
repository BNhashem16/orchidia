<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Form;
use App\Component_category;
use App\Language;
use Session;
use Redirect;
use validator;


class FormController extends Controller
{

    public function index()
    {
      $form = Form::get();
      return view('backend.form.list')->with('form' , $form);
    }

    public function create()
    {
      $form = Form::get();
      $langs = Language::where('active' , 1)->get();
      $component_category = Component_category::where('type', 'form')->get();
      return view('backend.form.create')->with('form' , $form)->with('langs' , $langs)->with('component_category' , $component_category);
    }

    public function store(Request $request)
    {
      try {
      $form = new Form;
      $form->title = $request->title;
      $form->form = $request->form;
      $form->component_category_id = $request->component_category_id;
      $form->created_by = 1;
      $form->updated_by = 1;
      $form->save();
      Session::flash('success' , 'Form Added Successfully');
      return Redirect::to('dashboard/form');
  } catch (\Exception $e) {
      Session::flash('error', 'Form Not Added');
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
