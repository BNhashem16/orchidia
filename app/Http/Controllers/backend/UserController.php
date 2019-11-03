<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Hash;
use Session;
use Redirect;
use validate;
use App\User;
class UserController extends Controller
{

    public function index()
    {
        //
    }

        #Login
        public function login()
        {
            if(Auth::check()) { return \Redirect::to('/'); }
            return view('backend.user.login');
        }

        public function doLogin(Request $request)
        {
          if (Auth::attempt([
              'email'=>$request->email,
              'password'=>$request->password
          ]))
          {

              $user= User::where('email', $request->email)->first();
              if (app()->getLocale() == "en") {
                  Session::flash('success','You Are Logged in');
              }else{
                  Session::flash('success','تم تسجيل الدخول بنجاح');
              }

              return redirect('/'.app()->getLocale());

          }
          else{
              Session::flash('danger',trans('app.EmailAddressError'));
              return redirect(app()->getLocale().'/signin');
          }
            #Validation
            // $request->validate([
            //     'name' => 'required',
            //     'password' => 'required'
            // ]);
            //
            // $name = $request->input('name');
            // $password = Hash::make($request->input('password'));
            // $data = ["name"=>$name,"password" =>$password];
            // if(Auth::attempt($data, true)) {
            //     return Redirect::to('dashboard');
            // } else {
            //
            //    Session::flash('error','Username or Password Incorrect');
            //    return Redirect::back();
            // }
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
        //
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
