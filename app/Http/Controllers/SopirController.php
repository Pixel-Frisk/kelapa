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
    $user = User::join('sopir as s', 'users.id', '=', 's.idUser')
                ->where('users.id', '=', $id)
                ->select('users.id', 'users.nama', 'users.email', 's.noHP', 's.alamat', 's.gaji', 'users.statusAcc')
                ->first();
    return view('profile', ['users' => $user]);
  }

  public function pb($id){
    $user = User::join('penyaluran  as p', 'users.id', '=', 'p.id_sopir')
                ->join('users as us', 'p.id_pb', '=', 'us.id')
                ->join('pb as pb', 'us.id', '=', 'pb.idUser')
                ->where('users.id', '=', $id)
                ->select('us.nama', 'us.email', 'pb.noHP', 'pb.alamat', 'us.statusAcc')
                ->first();
    return view('sopir.pedagang', ['users' => $user]);
  }
}
