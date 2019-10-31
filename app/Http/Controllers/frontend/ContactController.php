<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Message;
use App\Form;
use Session;
use App\Language;
use Redirect;
use validator;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $form = Form::get();
        return view('frontend.pages')->with('$form' , $form);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      try {
        $name = $request->input('name');
        $email = $request->input('email');
        $phone_number = $request->input('phone_number');
        $subject = $request->input('subject');
        $msg = $request->input('message');
        $message_array = ["name"          =>  $name,
                          "email"         =>  $email,
                          "phone_number"  =>  $phone_number,
                          "subject"       =>  $subject,
                          "message"       =>  $msg];
        $contact_form = new Message;
        $contact_form->message = $message_array;
        $contact_form->page_id = 1;
        $contact_form->created_by = 1;
        $contact_form->updated_by = 1;
        $contact_form->save();

      Session::flash('success' , 'Form Added Successfully');
      return Redirect::to('/');
  } catch (\Exception $e) {
    dd($e);
      Session::flash('error', 'Form Not Added');
    }
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
