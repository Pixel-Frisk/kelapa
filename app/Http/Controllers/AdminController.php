<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Transaksi;
use App\Penjualan;
use App\Pembelian;
use App\Stok;
use App\PB;
use App\Sopir;

class AdminController extends Controller
{
  // public function profile($id){
  //   $user = User::find($id);
  //   return view('profile', ['users' => $user]);
  // }

  public function ListPb(){
    $data_users = User::join('pb as p', 'users.id', '=', 'p.idUser')
                ->select('users.id', 'users.nama', 'users.email', 'p.noHP', 'p.alamat', 'users.statusAcc')
                ->get();
    return view('admin.pedagang', ['data_users' => $data_users]);
  }

  public function searchPB(Request $request){
    if($request->has('cari')){
      $data_users = User::join('pb as p', 'users.id', '=', 'p.idUser')
                  ->where([['users.nama','LIKE','%'.$request->cari.'%']])
                  ->select('users.id', 'users.nama', 'users.email', 'p.noHP', 'p.alamat', 'users.statusAcc')
                  ->get();
      return view('admin.pedagang', ['data_users' => $data_users]);
    }else{
      $data_users = User::join('pb as p', 'users.id', '=', 'p.idUser')
                  ->select('users.id', 'users.nama', 'users.email', 'p.noHP', 'p.alamat', 'users.statusAcc')
                  ->get();
      return view('admin.pedagang', ['data_users' => $data_users]);
    }
  }

  public function createPb(Request $request){
    $request->validate([
        'nama' => 'required',
        'email' => 'required',
        'password' => 'required',
        'hp' => 'required',
        'alamat' => 'required',
    ]);

    $user = new User;
    $user->nama = $request->nama;
    $user->email = $request->email;
    $user->password = bcrypt($request->password);
    $user->status = 'pedagang';
    $user->statusAcc = 'on';
    $user->remember_token = str_random(60);

    $user->save();

    $ped = User::orderBy('id', 'Desc')->first();

    $pb = new PB;
    $pb->idUser = $ped->id;
    $pb->noHP = $request->hp;
    $pb->alamat = $request->alamat;

    $pb->save();
    return redirect('/pedagang')->with('status', 'data telah ditambahkan');
  }

  // public function delete($id){
  //   $user = User::find($id);
  //   $user->delete($user);
  //   return redirect('/pedagang')->with('status', 'Data Berhasil Dihapus');
  // }

  public function listSopir(Request $request){
    $data_users = User::join('sopir as s', 'users.id', '=', 's.idUser')
                ->select('users.id', 'users.nama', 'users.email', 's.noHP', 's.alamat', 's.gaji', 'users.statusAcc')
                ->get();
    return view('admin.sopir', ['data_users' => $data_users]);
  }

  public function searchSopir(Request $request){
    if($request->has('cari')){
      $data_users = User::join('sopir as s', 'users.id', '=', 's.idUser')
                  ->where([['users.nama','LIKE','%'.$request->cari.'%']])
                  ->select('users.id', 'users.nama', 'users.email', 's.noHP', 's.alamat', 's.gaji', 'users.statusAcc')
                  ->get();
      return view('admin.sopir', ['data_users' => $data_users]);
    }else{
      $data_users = User::join('sopir as s', 'users.id', '=', 's.idUser')
                  ->select('users.id', 'users.nama', 'users.email', 's.noHP', 's.alamat', 's.gaji', 'users.statusAcc')
                  ->get();
      return view('admin.sopir', ['data_users' => $data_users]);
    }
  }

  public function createSopir(Request $request){
    $request->validate([
        'nama' => 'required',
        'email' => 'required',
        'password' => 'required',
        'hp' => 'required',
        'alamat' => 'required',
    ]);

    $user = new User;
    $user->nama = $request->nama;
    $user->email = $request->email;
    $user->password = bcrypt($request->password);
    $user->status = 'sopir';
    $user->statusAcc = 'on';
    $user->remember_token = str_random(60);

    $user->save();
    $sop = User::orderBy('id', 'Desc')->first();

    $sopir = new Sopir;
    $sopir->idUser = $sop->id;
    $sopir->noHP = $request->hp;
    $sopir->alamat = $request->alamat;
    $sopir->gaji = 0;

    $sopir->save();
    return redirect('/sopir')->with('status', 'data telah ditambahkan');
  }

  public function edit($id){
    $user = User::find($id);
    if($user->status == "pedagang"){
      $user = User::join('pb as p', 'users.id', '=', 'p.idUser')
                  ->where('users.id', '=', $id)
                  ->select('users.id', 'users.nama', 'users.email', 'p.noHP', 'p.alamat', 'users.statusAcc')
                  ->first();
      return view('admin.edit', ['users' => $user]);
    }elseif ($user->status == "sopir") {
      $user = User::join('sopir as s', 'users.id', '=', 's.idUser')
                  ->where('users.id', '=', $id)
                  ->select('users.id', 'users.nama', 'users.email', 's.noHP', 's.alamat', 's.gaji', 'users.statusAcc', 'users.status')
                  ->first();
      return view('admin.edit', ['users' => $user]);
    }
  }

  public function detail($id){
    $user = User::find($id);
    if($user->status == "pedagang"){
      $user = User::join('pb as p', 'users.id', '=', 'p.idUser')
                  ->where('users.id', '=', $id)
                  ->select('users.id', 'users.nama', 'users.email', 'p.noHP', 'p.alamat', 'users.statusAcc')
                  ->first();
      return view('admin.detail', ['users' => $user]);
    }elseif ($user->status == "sopir") {
      $user = User::join('sopir as s', 'users.id', '=', 's.idUser')
                  ->where('users.id', '=', $id)
                  ->select('users.id', 'users.nama', 'users.email', 's.noHP', 's.alamat', 's.gaji', 'users.statusAcc', 'users.status')
                  ->first();
      return view('admin.detail', ['users' => $user]);
    }
  }

  public function update(Request $request, $id){
    $user = User::find($id);
    $user->nama = $request->nama;
    $user->email = $request->email;
    $user->statusAcc = $request->statusAcc;
    $user->save();
    if($user->status == "pedagang"){
      $pb = PB::where('idUser', '=', $id)->first();
      $pb->noHP = $request->hp;
      $pb->alamat = $request->alamat;
      $pb->save();

      return redirect('/pedagang')->with('status', 'Data perubahan telah disimpan');
    }elseif ($user->status == "sopir") {
      $Sopir = Sopir::where('idUser', '=', $id)->first();
      $Sopir->noHP = $request->hp;
      $Sopir->alamat = $request->alamat;
      $Sopir->gaji = $request->gaji;
      $Sopir->save();

      return redirect('/sopir')->with('status', 'Data perubahan telah disimpan');
    }
  }

  // Method untuk Sprint 2
  public function transaksi(){
    $penjualan = Penjualan::join('transaksi as t', 't.id', '=', 'penjualan.idTransaksi')
                ->select('penjualan.tanggal', 'penjualan.id', 'penjualan.idTransaksi', 'penjualan.namaItem', 'penjualan.harga', 't.saldo')
                ->get();
    $pembelian = Pembelian::join('transaksi as t', 't.id', '=', 'pembelian.idTransaksi')
                ->select('pembelian.tanggal', 'pembelian.id', 'pembelian.idTransaksi', 'pembelian.namaItem', 'pembelian.harga', 't.saldo')
                ->get();
    return view('admin.transaksi', ['penjualan' =>$penjualan], ['pembelian' =>$pembelian]);
  }

  public function deleteTransaksi($id){
    $trans = Transaksi::find($id);
    if($trans->faktur == "Pembelian"){
      $pembelian = Pembelian::where('idTransaksi', '=', $id);
      $pembelian->delete($pembelian);
      $transaksi = Transaksi::find($id);
      $transaksi->delete($transaksi);
      return redirect('/transaksi')->with('status', 'Data Berhasil Dihapus');
    }elseif($trans->faktur == "Penjualan"){
      $penjualan = Penjualan::where('idTransaksi', '=', $id);
      $penjualan->delete($penjualan);
      $transaksi = Transaksi::find($id);
      $transaksi->delete($transaksi);
      return redirect('/transaksi')->with('status', 'Data Berhasil Dihapus');
    }
  }
  
  public function searchTransaksi(Request $request){
    if($request->has('cari')){
      $penjualan = Penjualan::join('transaksi as t', 't.id', '=', 'penjualan.idTransaksi')
                  ->where([['penjualan.namaItem','LIKE','%'.$request->cari.'%']])
                  ->select('penjualan.tanggal', 'penjualan.id', 'penjualan.namaItem', 'penjualan.harga', 't.saldo')
                  ->get();
      $pembelian = Pembelian::join('transaksi as t', 't.id', '=', 'pembelian.idTransaksi')
                  ->where([['pembelian.namaItem','LIKE','%'.$request->cari.'%']])
                  ->select('pembelian.tanggal', 'pembelian.id', 'pembelian.namaItem', 'pembelian.harga', 't.saldo')
                  ->get();
      return view('admin.transaksi', ['penjualan' =>$penjualan], ['pembelian' =>$pembelian]);
    }else {
      $penjualan = Penjualan::join('transaksi as t', 't.id', '=', 'penjualan.idTransaksi')
                  ->select('penjualan.tanggal', 'penjualan.id', 'penjualan.namaItem', 'penjualan.harga', 't.saldo')
                  ->get();
      $pembelian = Pembelian::join('transaksi as t', 't.id', '=', 'pembelian.idTransaksi')
                  ->select('pembelian.tanggal', 'pembelian.id', 'pembelian.namaItem', 'pembelian.harga', 't.saldo')
                  ->get();
      return view('admin.transaksi', ['penjualan' =>$penjualan], ['pembelian' =>$pembelian]);
    }
  }

  public function createTransaksi(Request $request){
    if ($request->faktur=="Penjualan") {
      $request->validate([
          'tanggal' => 'required',
          'id' => 'required',
          'namaSupplier' => 'required',
          'namaItem' => 'required',
          'quantity' => 'required',
          'harga' => 'required',
          'jenisPembayaran' => 'required',
          'keterangan' => 'required',
      ]);
      $stokK = Stok::orderBy('id', 'Desc')->first();
      $stA = $stokK->stokA;
      $rqA = $request->quantity;
      $jumlahA = $stA-$rqA;
      $stB = $stokK->stokB;
      $rqB = $request->quantity;
      $jumlahB = $stB-$rqB;
      $stC = $stokK->stokC;
      $rqC = $request->quantity;
      $jumlahC = $stC-$rqC;
      if ($request->namaItem=="Kelapa A") {
        if($jumlahA < 1){
          return redirect('/transaksi')->with('stok', 'Stok Kelapa A Tidak Cukup');
        }
      }elseif ($request->namaItem=="Kelapa B") {
        if($jumlahB < 1){
          return redirect('/transaksi')->with('stok', 'Stok Kelapa B Tidak Cukup');
        }
      }elseif ($request->namaItem=="Kelapa C") {
        if($jumlahC < 1){
          return redirect('/transaksi')->with('stok', 'Stok Kelapa C Tidak Cukup');
        }
      }
      $tran = Transaksi::orderBy('id', 'Desc')->first();
      $sal = $tran->saldo+$request->harga;
      $transaksi = new Transaksi;
      $transaksi->idUser = 9;
      $transaksi->faktur = $request->faktur;
      $transaksi->saldo = $sal;
      $transaksi->save();

      $tra = Transaksi::orderBy('id', 'Desc')->first();

      $penjualan = new Penjualan;
      $penjualan->idTransaksi = $tra->id;
      $penjualan->id = $request->id;
      $penjualan->tanggal = $request->tanggal;
      $penjualan->namaSupplier = $request->namaSupplier;
      $penjualan->namaItem = $request->namaItem;
      $penjualan->quantity = $request->quantity;
      $penjualan->harga = $request->harga;
      $penjualan->jenisPembayaran = $request->jenisPembayaran;
      $penjualan->keterangan = $request->keterangan;

      $penjualan->save();

      $stokKel = Stok::orderBy('id', 'Desc')->first();
      $penj = Penjualan::orderBy('id', 'Desc')->first();
      if ($request->namaItem=="Kelapa A") {
        $st = $stokKel->stokA;
        $rq = $request->quantity;
        $jumlah = $st-$rq;
        $stok = new Stok;
        $stok->idUser = 9;
        $stok->idPenjualan = $penj->id;
        $stok->idTransaksi = $penj->idTransaksi;
        $stok->tanggal = $penj->tanggal;
        $stok->keMasA = 0;
        $stok->keMasB = 0;
        $stok->keMasC = 0;
        $stok->keKelA = $request->quantity;
        $stok->keKelB = 0;
        $stok->keKelC = 0;
        $stok->stokA = $jumlah;
        $stok->stokB = $stokKel->stokB;
        $stok->stokC = $stokKel->stokC;
        $stok->save();
      } elseif ($request->namaItem=="Kelapa B") {
        $st = $stokKel->stokB;
        $rq = $request->quantity;
        $jumlah = $st-$rq;
        $stok = new Stok;
        $stok->idUser = 9;
        $stok->idPenjualan = $penj->id;
        $stok->idTransaksi = $penj->idTransaksi;
        $stok->tanggal = $penj->tanggal;
        $stok->keMasA = 0;
        $stok->keMasB = 0;
        $stok->keMasC = 0;
        $stok->keKelA = 0;
        $stok->keKelB = $request->quantity;
        $stok->keKelC = 0;
        $stok->stokA = $stokKel->stokA;
        $stok->stokB = $jumlah;
        $stok->stokC = $stokKel->stokC;
        $stok->save();
      }elseif ($request->namaItem=="Kelapa C") {
        $st = $stokKel->stokC;
        $rq = $request->quantity;
        $jumlah = $st-$rq;
        $stok = new Stok;
        $stok->idUser = 9;
        $stok->idPenjualan = $penj->id;
        $stok->idTransaksi = $penj->idTransaksi;
        $stok->tanggal = $penj->tanggal;
        $stok->keMasA = 0;
        $stok->keMasB = 0;
        $stok->keMasC = 0;
        $stok->keKelA = 0;
        $stok->keKelB = 0;
        $stok->keKelC = $request->quantity;
        $stok->stokA = $stokKel->stokA;
        $stok->stokB = $stokKel->stokB;
        $stok->stokC = $jumlah;
        $stok->save();
      }
      return redirect('/transaksi')->with('status', 'data telah ditambahkan');
    }elseif ($request->faktur=="Pembelian") {
      $request->validate([
        'tanggal' => 'required',
        'id' => 'required',
        'namaItem' => 'required',
        'namaPenjual' => 'required',
        'quantity' => 'required',
        'harga' => 'required',
        'keterangan' => 'required',
      ]);
      $tran = Transaksi::orderBy('id', 'Desc')->first();
      $sal = $tran->saldo-$request->harga;
      $transaksi = new Transaksi;
      $transaksi->idUser = 9;
      $transaksi->faktur = $request->faktur;
      $transaksi->saldo = $sal;
      $transaksi->save();

      $tra = Transaksi::orderBy('id', 'Desc')->first();

      $pembelian = new Pembelian;
      $pembelian->idTransaksi = $tra->id;
      $pembelian->id = $request->id;
      $pembelian->tanggal = $request->tanggal;
      $pembelian->namaItem = $request->namaItem;
      $pembelian->namaPenjual = $request->namaPenjual;
      $pembelian->quantity = $request->quantity;
      $pembelian->harga = $request->harga;
      $pembelian->keterangan = $request->keterangan;

      $pembelian->save();
      return redirect('/transaksi')->with('status', 'data telah ditambahkan');
    }
  }

  public function editTransaksi($id){
    $transaksi = Transaksi::find($id);
    if($transaksi->faktur == "Penjualan"){
      $transaksi = Transaksi::join('penjualan as p', 'transaksi.id', '=', 'p.idTransaksi')
                              ->where('transaksi.id', '=', $id)
                              ->select('p.idTransaksi', 'transaksi.faktur', 'p.tanggal', 'p.id', 'p.namaSupplier', 'p.quantity', 'p.namaItem', 'p.harga', 'p.jenisPembayaran', 'p.keterangan')
                              ->first();
      return view('admin.editTransaksi', ['transaksi' => $transaksi]);
    } elseif ($transaksi->faktur == "Pembelian") {
      $transaksi = Transaksi::join('pembelian as p', 'transaksi.id', '=', 'p.idTransaksi')
                              ->where('transaksi.id', '=', $id)
                              ->select('p.idTransaksi', 'transaksi.faktur', 'p.tanggal', 'p.id', 'p.namaPenjual', 'p.quantity', 'p.namaItem', 'p.harga', 'p.keterangan')
                              ->first();
      return view('admin.editTransaksi', ['transaksi' => $transaksi]);
    }
  }

  public function updateTransaksi(Request $request, $id){
    $transaksi = Transaksi::find($id);
    if($transaksi->faktur == "Penjualan"){
      $penjualan = Penjualan::where('idTransaksi', '=', $id)->first();
      $penjualan->tanggal = $request->tanggal;
      $penjualan->namaSupplier = $request->namaSupplier;
      $penjualan->namaItem = $request->namaItem;
      $penjualan->quantity = $request->quantity;
      $penjualan->harga = $request->harga;
      $penjualan->jenisPembayaran = $request->jenisPembayaran;
      $penjualan->keterangan = $request->keterangan;

      $penjualan->save();
      return redirect('/transaksi')->with('status', 'Data perubahan telah disimpan');
    }elseif ($transaksi->faktur == "Pembelian") {
      $pembelian = Pembelian::where('idTransaksi', '=', $id)->first();
      $pembelian->tanggal = $request->tanggal;
      $pembelian->namaItem = $request->namaItem;
      $pembelian->namaPenjual = $request->namaPenjual;
      $pembelian->quantity = $request->quantity;
      $pembelian->harga = $request->harga;
      $pembelian->keterangan = $request->keterangan;

      $pembelian->save();
      return redirect('/transaksi')->with('status', 'Data perubahan telah disimpan');
    }
  }

  public function detailTransaksi($id){
    $transaksi = Transaksi::find($id);
    if($transaksi->faktur == "Penjualan"){
      $transaksi = Transaksi::join('penjualan as p', 'transaksi.id', '=', 'p.idTransaksi')
                              ->where('transaksi.id', '=', $id)
                              ->select('p.idTransaksi', 'transaksi.faktur', 'p.tanggal', 'p.id', 'p.namaSupplier', 'p.quantity', 'p.namaItem', 'p.harga', 'p.jenisPembayaran', 'p.keterangan')
                              ->first();
      return view('admin.detailTransaksi', ['transaksi' => $transaksi]);
    } elseif ($transaksi->faktur == "Pembelian") {
      $transaksi = Transaksi::join('pembelian as p', 'transaksi.id', '=', 'p.idTransaksi')
                              ->where('transaksi.id', '=', $id)
                              ->select('p.idTransaksi', 'transaksi.faktur', 'p.tanggal', 'p.id', 'p.namaPenjual', 'p.quantity', 'p.namaItem', 'p.harga', 'p.keterangan')
                              ->first();
      return view('admin.detailTransaksi', ['transaksi' => $transaksi]);
    }
  }

  public function stok(){
    $stok = Stok::orderBy('id', 'Desc')->get();
    return view('admin.stok', ['stok' =>$stok]);
  }

  public function detailStok($id){
    $stok = Stok::find($id);
    return view('admin.detailstok', ['stok' =>$stok]);
  }

  public function searchStok(Request $request){
    if($request->has('cari')){
      $stok = Stok::where([['tanggal','LIKE','%'.$request->cari.'%']])
              ->orderBy('id', 'Desc')
              ->get();
      return view('admin.stok', ['stok' =>$stok]);
    }else {
      $stok = Stok::orderBy('id', 'Desc')->get();
      return view('admin.stok', ['stok' =>$stok]);
    }
  }

  public function createStok(Request $request){
    $request->validate([
        'tanggal' => 'required',
        'keMasA' => 'required',
        'keMasB' => 'required',
        'keMasC' => 'required',
    ]);

    $stokKel = Stok::orderBy('id', 'Desc')->first();
    $stA = $stokKel->stokA;
    $rqA = $request->keMasA;
    $jumlahA = $stA+$rqA;
    $stB = $stokKel->stokB;
    $rqB = $request->keMasB;
    $jumlahB = $stB+$rqB;
    $stC = $stokKel->stokC;
    $rqC = $request->keMasC;
    $jumlahC = $stC+$rqC;

    $stok = new Stok;
    $stok->idUser = 9;
    $stok->tanggal = $request->tanggal;
    $stok->keMasA = $request->keMasA;
    $stok->keMasB = $request->keMasB;
    $stok->keMasC = $request->keMasC;
    $stok->keKelA = 0;
    $stok->keKelB = 0;
    $stok->keKelC = 0;
    $stok->stokA = $jumlahA;
    $stok->stokB = $jumlahB;
    $stok->stokC = $jumlahC;

    $stok->save();
    return redirect('/stok')->with('status', 'data telah ditambahkan');
  }

  public function editStok($id){
    $stok = Stok::find($id);
    return view('admin.editStok', ['stok' => $stok]);
  }

  public function updateStok(Request $request, $id){
    $stok = Stok::find($id);
    $stok->created_at = $request->created_at;
    $stok->keMasA = $request->keMasA;
    $stok->keMasB = $request->keMasB;
    $stok->keMasC = $request->keMasC;
    $stok->keKelA = $request->keKelA;
    $stok->keKelB = $request->keKelB;
    $stok->keKelC = $request->keKelC;
    $stok->stokA = $request->stokA;
    $stok->stokB = $request->stokB;
    $stok->stokC = $request->stokC;
    $stok->save();
    return redirect('/stok')->with('status', 'Data perubahan telah disimpan');
  }

  public function deleteStok($id){
    $stok = stok::find($id);
    $stok->delete($stok);
    return redirect('/stok')->with('status', 'Data Berhasil Dihapus');
  }
}
