<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;

class PBController extends Controller
{
  public function dashboard(){
    return view('pb.dashboard');
  }

  public function sopir($id){
    $user = DB::table('users as u')
                ->join('transactions  as t', 'u.id', '=', 't.id_pb')
                ->join('users as us', 't.id_sopir', '=', 'us.id')
                ->where('u.id', '=', $id)
                ->select('us.name', 'us.email', 'us.hp', 'us.alamat', 'us.statusAcc')
                ->first();
    return view('pb.sopir', ['users' => $user]);
  }
}
