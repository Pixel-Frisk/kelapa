<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;

class UserController extends Controller
{
  public function pedagang(Request $request){
    if($request->has('cari')){
      $data_users = \App\User::where('name','LIKE','%'.$request->cari.'%')->get();
    }else{
      $data_users = User::where('status','pb')->get();
    }
    return view('admin.users.pedagang', ['data_users' => $data_users]);
  }

  public function createPB(Request $request){
    $request->validate([
        'name' => 'required',
        'email' => 'required',
        'password' => 'required',
        'hp' => 'required',
    ]);

    $user = new User;
    $user->name = $request->name;
    $user->email = $request->email;
    $user->password = bcrypt($request->password);
    $user->hp = $request->hp;
    $user->status = 'pb';
    $user->remember_token = str_random(60);

    $user->save();
    return redirect('/pedagang')->with('status', 'Data Berhasil Ditambah');
  }

  public function editPB($id){
    $user = \App\User::find($id);
    return view('admin.users.edit', ['users' => $user]);
  }

  public function updatePB(Request $request, $id){
    $user = \App\User::find($id);
    $user->name = $request->name;
    $user->email = $request->email;
    $user->password = $request->password;
    $user->hp = $request->hp;
    $user->save();
    return redirect('/pedagang')->with('status', 'Data Berhasil Diubah');
  }

  public function delete($id){
    $user = \App\User::find($id);
    $user->delete($user);
    return redirect('/pedagang')->with('status', 'Data Berhasil Dihapus');
  }

  public function sopir(){
    $data_users = User::where('status','sopir')->get();
    return view('admin.users.sopir', ['data_users' => $data_users]);
  }
}
