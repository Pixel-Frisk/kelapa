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

  public function pedagang($id){
    $user = DB::table('users as u')
                ->join('transactions  as t', 'u.id', '=', 't.id_sopir')
                ->join('users as us', 't.id_pb', '=', 'us.id')
                ->where('u.id', '=', $id)
                ->select('us.name', 'us.email', 'us.hp', 'us.alamat', 'us.statusAcc')
                ->first();
    return view('sopir.pedagang', ['users' => $user]);
  }
}
