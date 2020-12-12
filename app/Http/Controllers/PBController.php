<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\User;
use App\Penyaluran;

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
                ->join('kendaraan as k', 'p.id_kendaraan', '=', 'k.id')
                ->where([['users.id', '=', $id],['p.status', '=', 'sedang dalam perjalanan']])
                ->select('p.id','p.tanggalKirim','k.id_kendaraan', 'us.nama', 'p.id_penjualan', 'p.status')
                ->get();
    return view('pb.sopir', ['users' => $user]);
  }

  public function qrcode($id){
    $qr = "192.168.1.66:8000/editPenyalur/$id";
    return view('pb.qrCode',['qr' => $qr]);
  }
}
