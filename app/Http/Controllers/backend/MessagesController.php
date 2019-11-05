<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Message;
use Session;
use Redirect;

class MessagesController extends Controller
{

    public function index()
    {
      $contact = Message::where('page_id' , 17)->get();
      $messages = Message::where('page_id' , 25)->get();
      return view('backend.messages.list')->with('contact' , $contact)->with('messages' , $messages);
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
      if(!$id || Message::where('id',$id)->count() == 0) {
        return \App::abort(404);
      }

    try {
      Message::where('id',$id)->delete();
        Session::flash('success','Message Deleted Successfully');
    } catch (\Exception $e) {
      Session::flash('error','Message Not Deleted');
    }
    return Redirect::back();
    }
}
