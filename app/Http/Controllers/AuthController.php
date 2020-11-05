<?php

namespace App\Http\Controllers;
use Auth;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(){
      return view('login');
    }

    public function postLogin(Request $request){
      if(Auth::attemp($request->only('email','password'))){
        return redirect('/pedagang');
      }
      return redirect('/login');
    }
}
