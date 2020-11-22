<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;

class PbController extends Controller
{
  public function dashboard(){
    return view('pb.dashboard');
  }

  public function profil($id){
    $user = User::find($id);
    return view('profile', ['users' => $user]);
  }

  public function sopir($id){
    $user = User::join('transactions  as t', 'users.id', '=', 't.id_pb')
                ->join('users as us', 't.id_sopir', '=', 'us.id')
                ->where('users.id', '=', $id)
                ->select('us.name', 'us.hp', 'us.alamat', 'us.statusAcc')
                ->get();
    return view('pb.sopir', ['users' => $user]);
  }
}
