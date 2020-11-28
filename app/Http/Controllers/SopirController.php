<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;


class SopirController extends Controller
{
  public function dashboard(){
    return view('sopir.dashboard');
  }

  public function profil($id){
    $user = User::find($id);
    return view('profile', ['users' => $user]);
  }

  public function pb($id){
    $user = User::join('penyaluran  as p', 'users.id', '=', 'p.id_sopir')
                ->join('users as us', 'p.id_pb', '=', 'us.id')
                ->where('users.id', '=', $id)
                ->select('us.name', 'us.email', 'us.hp', 'us.alamat', 'us.statusAcc')
                ->first();
    return view('sopir.pedagang', ['users' => $user]);
  }
}
