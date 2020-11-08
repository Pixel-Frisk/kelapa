<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;

class UserController extends Controller
{

  public function getDataPB(Request $request){
    if($request->has('cari')){
      $data_users = User::where([['name','LIKE','%'.$request->cari.'%'],['status', '=', 'pedagang']])->get();
    }else{
      $data_users = User::where('status','pedagang')->get();
    }
    return view('admin.pedagang', ['data_users' => $data_users]);
  }

  public function createPB(Request $request){
    $request->validate([
        'name' => 'required',
        'email' => 'required',
        'password' => 'required',
        'hp' => 'required',
        'alamat' => 'required',
    ]);

    $user = new User;
    $user->name = $request->name;
    $user->email = $request->email;
    $user->password = bcrypt($request->password);
    $user->hp = $request->hp;
    $user->alamat = $request->alamat;
    $user->status = 'pedagang';
    $user->statusAcc = 'on';
    $user->remember_token = str_random(60);

    $user->save();
    return redirect('/pedagang')->with('status', 'Data Berhasil Ditambah');
  }

  public function edit($id){
    $user = User::find($id);
    return view('admin.edit', ['users' => $user]);
  }

  public function update(Request $request, $id){
    $user = User::find($id);
    $user->name = $request->name;
    $user->email = $request->email;
    $user->hp = $request->hp;
    $user->alamat = $request->alamat;
    $user->statusAcc = $request->statusAcc;
    $user->save();
    if($user->status == 'pedagang'){
      return redirect('/pedagang')->with('status', 'Data Berhasil Diubah');
    } else if($user->status == 'sopir'){
      return redirect('/sopir')->with('status', 'Data Berhasil Diubah');
    }

  }

  // public function delete($id){
  //   $user = User::find($id);
  //   $user->delete($user);
  //   return redirect('/pedagang')->with('status', 'Data Berhasil Dihapus');
  // }

  public function getDataSopir(Request $request){
    if($request->has('cari')){
      $data_users = User::where([['name','LIKE','%'.$request->cari.'%'],['status', '=', 'sopir']])->get();
    }else{
      $data_users = User::where('status','sopir')->get();
    }
    return view('admin.sopir', ['data_users' => $data_users]);
  }

  public function createSopir(Request $request){
    $request->validate([
        'name' => 'required',
        'email' => 'required',
        'password' => 'required',
        'hp' => 'required',
        'alamat' => 'required',
    ]);

    $user = new User;
    $user->name = $request->name;
    $user->email = $request->email;
    $user->password = bcrypt($request->password);
    $user->hp = $request->hp;
    $user->alamat = $request->alamat;
    $user->status = 'sopir';
    $user->statusAcc = 'on';
    $user->remember_token = str_random(60);

    $user->save();
    return redirect('/sopir')->with('status', 'Data Berhasil Ditambah');
  }
}
