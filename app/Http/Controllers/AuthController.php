<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Auth;
use App\User;

class AuthController extends Controller
{
  public function login_t(){
    return view('login');
  }

  public function Post_Login(Request $request){
    if(Auth::attempt(['email'=>$request->email, 'password'=>$request->password])){
      if(Auth::attempt(['email'=>$request->email, 'password'=>$request->password, 'statusAcc'=>'on'])){
        return redirect('/dashboard');
      } else {
        return redirect('/login')->with('status', 'data tidak valid');
      }
    } else {
      return redirect('/login')->with('status', 'data tidak valid');
    }
  }

  public function logout(){
    Auth::logout();
    return redirect('/');
  }
}
