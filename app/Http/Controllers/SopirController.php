<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Penyaluran;


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
    $detail = User::join('penyaluran  as p', 'users.id', '=', 'p.id_sopir')
                ->join('users as us', 'p.id_pb', '=', 'us.id')
                ->join('pb as pb', 'us.id', '=', 'pb.idUser')
                ->join('kendaraan as k', 'p.id_kendaraan', '=', 'k.id')
                ->join('pemasukan as pen', 'p.id_penjualan', '=', 'pen.id')
                ->where([['users.id', '=', $id],['p.status', '=', 'sedang dalam perjalanan']])
                ->orderBy('p.id', 'Desc')
                ->select('p.tanggalKirim','p.tanggalTerima','k.id_kendaraan','us.nama', 'pb.noHP', 'pb.alamat','pen.namaItem','pen.quantity','pen.harga','pen.jenisPembayaran','pen.keterangan','p.status')
                ->first();
    if($detail==null){
      return redirect('/dashboard')->with('gagal', 'Tidak ada penyaluran');
    } else {
      return view('sopir.pedagang', ['detail' => $detail]);
    }
  }
  public function editPenyalur($id){
    $penyaluran = Penyaluran::find($id);
    // $days2 = date('Y-m-d', time() + (60 * 60 * 24 * 2));
    // return dd('tanggal hari ini:',$days2);
    return view('sopir.updatePenyaluran',['penyaluran' => $penyaluran]);
  }
  public function updatePenyalur(Request $request, $id, $nama){
    $current = date('Y-m-d H:i:s');
    $user = User::where('id', '=', $nama)->first();
    $penyaluran = Penyaluran::find($id);
    if ($penyaluran->tanggalTerima >= $current) {
      if($penyaluran->id_sopir == $user->id){
        $penyaluran->status = $request->status;
        $penyaluran->save();
        if($request->hasFile('kendala')){
          $request->file('kendala')->move('images/',$request->file('kendala')->getClientOriginalName());
          $penyaluran->kendala = $request->file('kendala')->getClientOriginalName();
          $penyaluran->save();
        }
        return redirect('/dashboard')->with('status', 'Transaksi berhasil dilakukan');
      }else {
        return redirect('/dashboard')->with('gagal', 'Data tidak sesuai, Silahkan Cobalagi atau hubungi Pak WIldi No HP 0987654234');
      }
    }elseif($request->hasFile('kendala')) {
      if($penyaluran->id_sopir == $user->id){
        $penyaluran->status = $request->status;
        $penyaluran->tanggalTerima = $current;
        $penyaluran->save();
        if($request->hasFile('kendala')){
          $request->file('kendala')->move('images/',$request->file('kendala')->getClientOriginalName());
          $penyaluran->kendala = $request->file('kendala')->getClientOriginalName();
          $penyaluran->save();
        }
        return redirect('/dashboard')->with('status', 'Transaksi berhasil dilakukan');
      }else {
        return redirect('/dashboard')->with('gagal', 'Data tidak sesuai, Silahkan Cobalagi atau hubungi Pak WIldi No HP 0987654234');
      }
    }else {
      return redirect('/dashboard')->with('gagal', 'Data tidak sesuai, Silahkan Cobalagi atau hubungi Pak WIldi No HP 0987654234');
    }
  }
}
