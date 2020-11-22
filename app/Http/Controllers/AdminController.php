<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Transaction;

class AdminController extends Controller
{
  // public function profile($id){
  //   $user = User::find($id);
  //   return view('profile', ['users' => $user]);
  // }

  public function ListPb(){
    $data_users = User::where('status','pedagang')->get();
    return view('admin.pedagang', ['data_users' => $data_users]);
  }

  public function searchPB(Request $request){
    if($request->has('cari')){
      $data_users = User::where([['name','LIKE','%'.$request->cari.'%'],['status', '=', 'pedagang']])->get();
      return view('admin.pedagang', ['data_users' => $data_users]);
    }else{
      $data_users = User::where('status','pedagang')->get();
      return redirect('/pedagang', ['data_users' => $data_users]);
    }
  }

  public function createPb(Request $request){
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
    return redirect('/pedagang')->with('status', 'data telah ditambahkan');
  }

  public function edit($id){
    $user = User::find($id);
    return view('admin.edit', ['users' => $user]);
  }

  public function detail($id){
    $user = User::find($id);
    return view('admin.detail', ['users' => $user]);
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
      return redirect('/pedagang')->with('status', 'Data perubahan telah disimpan');
    } else if($user->status == 'sopir'){
      return redirect('/sopir')->with('status', 'Data perubahan telah disimpan');
    }

  }

  // public function delete($id){
  //   $user = User::find($id);
  //   $user->delete($user);
  //   return redirect('/pedagang')->with('status', 'Data Berhasil Dihapus');
  // }

  public function listSopir(Request $request){
    $data_users = User::where('status','sopir')->get();
    return view('admin.sopir', ['data_users' => $data_users]);
  }

  public function searchSopir(Request $request){
    if($request->has('cari')){
      $data_users = User::where([['name','LIKE','%'.$request->cari.'%'],['status', '=', 'sopir']])->get();
      return view('admin.sopir', ['data_users' => $data_users]);
    }else{
      $data_users = User::where('status','pedagang')->get();
      return redirect('/sopir', ['data_users' => $data_users]);
    }
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
    return redirect('/sopir')->with('status', 'data telah ditambahkan');
  }

  public function transaksi(){
    $user = User::get();
    $transaksi = User::join('transactions  as t', 'users.id', '=', 't.id_sopir')
                ->join('users as us', 't.id_pb', '=', 'us.id')
                ->select('users.name', 'us.alamat', 't.created_at', 't.updated_at')
                ->get();
    return view('admin.transaksi',['transaksi' => $transaksi], ['user' => $user]);
  }

  public function editTransaksi(){
    return view('admin.editTransaksi');
  }

  public function detailTransaksi(){
    return view('admin.detailTransaksi');
  }

  public function stok(){
    return view('admin.stok');
  }

  public function editStok(){
    return view('admin.editStok');
  }

  public function detailStok(){
    return view('admin.detailStok');
  }
}
