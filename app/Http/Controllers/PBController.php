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
    $user = User::join('pb as p', 'users.id', '=', 'p.idUser')
                ->where('users.id', '=', $id)
                ->select('users.id', 'users.nama', 'users.email', 'p.noHP', 'p.alamat', 'users.statusAcc')
                ->first();
    return view('profile', ['users' => $user]);
  }

  public function sopir($id){
    $user = User::join('penyaluran  as p', 'users.id', '=', 'p.id_pb')
                ->join('users as us', 'p.id_sopir', '=', 'us.id')
                ->join('sopir as s', 'us.id', '=', 's.idUser')
                ->where('users.id', '=', $id)
                ->select('p.created_at' ,'us.nama', 's.noHP', 's.alamat', 'us.statusAcc')
                ->get();
    return view('pb.sopir', ['users' => $user]);
  }
}
