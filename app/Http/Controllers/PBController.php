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
    $user = User::join('penyaluran  as p', 'users.id', '=', 'p.id_pb')
                ->join('users as us', 'p.id_sopir', '=', 'us.id')
                ->where('users.id', '=', $id)
                ->select('p.created_at' ,'us.name', 'us.hp', 'us.alamat', 'us.statusAcc')
                ->get();
    return view('pb.sopir', ['users' => $user]);
  }
}
