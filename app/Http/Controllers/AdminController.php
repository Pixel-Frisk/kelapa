<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Transaksi;
use App\Pemasukan;
use App\Pengeluaran;
use App\Stok;
use App\PB;
use App\Sopir;
use App\Kendaraan;
use App\Penyaluran;
use PDF;

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
    $pemasukan = Pemasukan::join('transaksi as t', 't.id', '=', 'pemasukan.idTransaksi')
                ->select('pemasukan.tanggal', 'pemasukan.id', 'pemasukan.idTransaksi', 'pemasukan.namaItem', 'pemasukan.harga', 't.saldo')
                ->get();
    $pengeluaran = Pengeluaran::join('transaksi as t', 't.id', '=', 'pengeluaran.idTransaksi')
                ->select('pengeluaran.tanggal', 'pengeluaran.id', 'pengeluaran.idTransaksi', 'pengeluaran.namaItem', 'pengeluaran.harga', 't.saldo')
                ->get();
    return view('admin.transaksi', ['pemasukan' =>$pemasukan], ['pengeluaran' =>$pengeluaran]);
  }

  public function deleteTransaksi($id){
    $trans = Transaksi::find($id);
    if($trans->faktur == "Pengeluaran"){
      $pengeluaran = Pengeluaran::where('idTransaksi', '=', $id);
      $pengeluaran->delete($pengeluaran);
      $transaksi = Transaksi::find($id);
      $transaksi->delete($transaksi);
      return redirect('/transaksi')->with('status', 'Data Berhasil Dihapus');
    }elseif($trans->faktur == "Pemasukan"){
      $pemasukan = Pemasukan::where('idTransaksi', '=', $id);
      $pemasukan->delete($pemasukan);
      $transaksi = Transaksi::find($id);
      $transaksi->delete($transaksi);
      return redirect('/transaksi')->with('status', 'Data Berhasil Dihapus');
    }
  }

  public function searchTransaksi(Request $request){
    if($request->has('cari')){
      $pemasukan = Pemasukan::join('transaksi as t', 't.id', '=', 'pemasukan.idTransaksi')
                  ->where([['pemasukan.tanggal','LIKE','%'.$request->cari.'%']])
                  ->select('pemasukan.tanggal', 'pemasukan.id', 'pemasukan.namaItem', 'pemasukan.harga', 't.saldo')
                  ->get();
      $pengeluaran = Pengeluaran::join('transaksi as t', 't.id', '=', 'pengeluaran.idTransaksi')
                  ->where([['pengeluaran.tanggal','LIKE','%'.$request->cari.'%']])
                  ->select('pengeluaran.tanggal', 'pengeluaran.id', 'pengeluaran.namaItem', 'pengeluaran.harga', 't.saldo')
                  ->get();
      return view('admin.transaksi', ['pemasukan' =>$pemasukan], ['pengeluaran' =>$pengeluaran]);
    }else {
      $pemasukan = Pemasukan::join('transaksi as t', 't.id', '=', 'pemasukan.idTransaksi')
                  ->select('pemasukan.tanggal', 'pemasukan.id', 'pemasukan.namaItem', 'pemasukan.harga', 't.saldo')
                  ->get();
      $pengeluaran = Pengeluaran::join('transaksi as t', 't.id', '=', 'pengeluaran.idTransaksi')
                  ->select('pengeluaran.tanggal', 'pengeluaran.id', 'pengeluaran.namaItem', 'pengeluaran.harga', 't.saldo')
                  ->get();
      return view('admin.transaksi', ['pemasukan' =>$pemasukan], ['pengeluaran' =>$pengeluaran]);
    }
  }

  public function createTransaksi(Request $request){
    if ($request->faktur=="Pemasukan") {
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

      $pemasukan = new Pemasukan;
      $pemasukan->idTransaksi = $tra->id;
      $pemasukan->id = $request->id;
      $pemasukan->tanggal = $request->tanggal;
      $pemasukan->namaSupplier = $request->namaSupplier;
      $pemasukan->namaItem = $request->namaItem;
      $pemasukan->quantity = $request->quantity;
      $pemasukan->harga = $request->harga;
      $pemasukan->jenisPembayaran = $request->jenisPembayaran;
      $pemasukan->keterangan = $request->keterangan;

      $pemasukan->save();

      $stokKel = Stok::orderBy('id', 'Desc')->first();
      $penj = Pemasukan::orderBy('id', 'Desc')->first();
      if ($request->namaItem=="Kelapa A") {
        $st = $stokKel->stokA;
        $rq = $request->quantity;
        $jumlah = $st-$rq;
        $stok = new Stok;
        $stok->idUser = 9;
        $stok->id = $penj->id;
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
        $stok->id = $penj->id;
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
        $stok->id = $penj->id;
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
    }elseif ($request->faktur=="Pengeluaran") {
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
      if($sal>=0){
        $transaksi = new Transaksi;
        $transaksi->idUser = 9;
        $transaksi->faktur = $request->faktur;
        $transaksi->saldo = $sal;
        $transaksi->save();

        $tra = Transaksi::orderBy('id', 'Desc')->first();

        $pengeluaran = new Pengeluaran;
        $pengeluaran->idTransaksi = $tra->id;
        $pengeluaran->id = $request->id;
        $pengeluaran->tanggal = $request->tanggal;
        $pengeluaran->namaItem = $request->namaItem;
        $pengeluaran->namaPenjual = $request->namaPenjual;
        $pengeluaran->quantity = $request->quantity;
        $pengeluaran->harga = $request->harga;
        $pengeluaran->keterangan = $request->keterangan;

        $pengeluaran->save();
        return redirect('/transaksi')->with('status', 'data telah ditambahkan');
      }else {
        return redirect('/transaksi')->with('stok', 'saldo tidak cukup');
      }
    }
  }

  public function editTransaksi($id){
    $transaksi = Transaksi::find($id);
    if($transaksi->faktur == "Pemasukan"){
      $transaksi = Transaksi::join('pemasukan as p', 'transaksi.id', '=', 'p.idTransaksi')
                              ->where('transaksi.id', '=', $id)
                              ->select('p.idTransaksi', 'transaksi.faktur', 'p.tanggal', 'p.id', 'p.namaSupplier', 'p.quantity', 'p.namaItem', 'p.harga', 'p.jenisPembayaran', 'p.keterangan')
                              ->first();
      return view('admin.editTransaksi', ['transaksi' => $transaksi]);
    } elseif ($transaksi->faktur == "Pengeluaran") {
      $transaksi = Transaksi::join('pengeluaran as p', 'transaksi.id', '=', 'p.idTransaksi')
                              ->where('transaksi.id', '=', $id)
                              ->select('p.idTransaksi', 'transaksi.faktur', 'p.tanggal', 'p.id', 'p.namaPenjual', 'p.quantity', 'p.namaItem', 'p.harga', 'p.keterangan')
                              ->first();
      return view('admin.editTransaksi', ['transaksi' => $transaksi]);
    }
  }

  public function updateTransaksi(Request $request, $id){
    $transaksi = Transaksi::find($id);
    if($transaksi->faktur == "Pemasukan"){
      $pemasukan = Pemasukan::where('idTransaksi', '=', $id)->first();
      $pemasukan->tanggal = $request->tanggal;
      $pemasukan->namaSupplier = $request->namaSupplier;
      $pemasukan->namaItem = $request->namaItem;
      $pemasukan->quantity = $request->quantity;
      $pemasukan->harga = $request->harga;
      $pemasukan->jenisPembayaran = $request->jenisPembayaran;
      $pemasukan->keterangan = $request->keterangan;

      $pemasukan->save();
      return redirect('/transaksi')->with('status', 'Data perubahan telah disimpan');
    }elseif ($transaksi->faktur == "Pengeluaran") {
      $pengeluaran = Pengeluaran::where('idTransaksi', '=', $id)->first();
      $pengeluaran->tanggal = $request->tanggal;
      $pengeluaran->namaItem = $request->namaItem;
      $pengeluaran->namaPenjual = $request->namaPenjual;
      $pengeluaran->quantity = $request->quantity;
      $pengeluaran->harga = $request->harga;
      $pengeluaran->keterangan = $request->keterangan;

      $pengeluaran->save();
      return redirect('/transaksi')->with('status', 'Data perubahan telah disimpan');
    }
  }

  public function detailTransaksi($id){
    $transaksi = Transaksi::find($id);
    if($transaksi->faktur == "Pemasukan"){
      $transaksi = Transaksi::join('pemasukan as p', 'transaksi.id', '=', 'p.idTransaksi')
                              ->where('transaksi.id', '=', $id)
                              ->select('p.idTransaksi', 'transaksi.faktur', 'p.tanggal', 'p.id', 'p.namaSupplier', 'p.quantity', 'p.namaItem', 'p.harga', 'p.jenisPembayaran', 'p.keterangan')
                              ->first();
      return view('admin.detailTransaksi', ['transaksi' => $transaksi]);
    } elseif ($transaksi->faktur == "Pengeluaran") {
      $transaksi = Transaksi::join('pengeluaran as p', 'transaksi.id', '=', 'p.idTransaksi')
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

  // Method untuk Sprint 3

  public function kendaraan(){
    $kendaraan = Kendaraan::get();
    return view('admin.kendaraan', ['kendaraan' => $kendaraan]);
  }

  public function createKendaraan(Request $request){
    $request->validate([
      'id_kendaraan' => 'required',
      'nama' => 'required',
      'keterangan' => 'required',
    ]);
    $kendaraan = new Kendaraan;
    $kendaraan->id_kendaraan = $request->id_kendaraan;
    $kendaraan->nama = $request->nama;
    $kendaraan->keterangan = $request->keterangan;

    $kendaraan->save();
    return redirect('/kendaraan')->with('status', 'data telah ditambahkan');
  }

  public function editKendaraan($id){
    $kendaraan = Kendaraan::find($id);
    return view('admin.editKendaraan', ['kendaraan' => $kendaraan]);
  }

  public function updateKendaraan(Request $request, $id){
    $kendaraan = Kendaraan::find($id);
    $kendaraan->id_kendaraan = $request->id_kendaraan;
    $kendaraan->nama = $request->nama;
    $kendaraan->keterangan = $request->keterangan;
    $kendaraan->save();
    return redirect('/kendaraan')->with('status', 'Data perubahan telah disimpan');
  }

  public function penyaluran(){
    $user = User::get();
    $penyaluran = Penyaluran::join('users as u', 'penyaluran.id_pb', '=', 'u.id')
                            ->join('kendaraan as k', 'penyaluran.id_kendaraan', '=', 'k.id')
                            ->select('penyaluran.id', 'penyaluran.tanggalKirim', 'penyaluran.tanggalTerima', 'k.id_kendaraan', 'u.nama', 'penyaluran.id_penjualan', 'penyaluran.status')
                            ->get();
    return view('admin.penyaluran', ['user' => $user], ['penyaluran' => $penyaluran]);
  }

  public function searchPenyaluran(Request $request){
    if($request->has('cari')){
      $user = User::get();
      $penyaluran = Penyaluran::join('users as u', 'penyaluran.id_pb', '=', 'u.id')
                              ->join('kendaraan as k', 'penyaluran.id_kendaraan', '=', 'k.id')
                              ->where([['penyaluran.tanggalKirim','LIKE','%'.$request->cari.'%']])
                              ->select('penyaluran.id', 'penyaluran.tanggalKirim', 'penyaluran.tanggalTerima', 'k.id_kendaraan', 'u.nama', 'penyaluran.id_penjualan', 'penyaluran.status')
                              ->get();
      return view('admin.penyaluran', ['user' => $user], ['penyaluran' => $penyaluran]);
    }else {
      return redirect('/penyaluran');
    }
  }

  public function createPenyaluran(Request $request){
    $request->validate([
      'tanggalKirim' => 'required',
      'tanggalTerima' => 'required',
      'id_sopir' => 'required',
      'id_pb' => 'required',
      'id_kendaraan' => 'required',
      'id_penjualan' => 'required',
      'status' => 'required',
    ]);
    $kendaraan = Kendaraan::where('id_kendaraan', '=', $request->id_kendaraan)->first();
    $pemasukan = Pemasukan::where('id', '=' , $request->id_penjualan)->first();
    if ($pemasukan->namaItem == "Kelapa A") {
      $penyaluran= new penyaluran;
      $penyaluran->tanggalKirim = $request->tanggalKirim;
      $penyaluran->tanggalTerima = $request->tanggalTerima;
      $penyaluran->id_sopir = $request->id_sopir;
      $penyaluran->id_pb = $request->id_pb;
      $penyaluran->id_kendaraan = $kendaraan->id;
      $penyaluran->id_penjualan = $request->id_penjualan;
      $penyaluran->status = $request->status;

      $penyaluran->save();
      return redirect('/penyaluran')->with('status', 'data telah ditambahkan');
    } elseif ($pemasukan->namaItem == "Kelapa B") {
      $penyaluran= new penyaluran;
      $penyaluran->tanggalKirim = $request->tanggalKirim;
      $penyaluran->tanggalTerima = $request->tanggalTerima;
      $penyaluran->id_sopir = $request->id_sopir;
      $penyaluran->id_pb = $request->id_pb;
      $penyaluran->id_kendaraan = $kendaraan->id;
      $penyaluran->id_penjualan = $request->id_penjualan;
      $penyaluran->status = $request->status;

      $penyaluran->save();
      return redirect('/penyaluran')->with('status', 'data telah ditambahkan');
    } elseif ($pemasukan->namaItem == "Kelapa C") {
      $penyaluran= new penyaluran;
      $penyaluran->tanggalKirim = $request->tanggalKirim;
      $penyaluran->tanggalTerima = $request->tanggalTerima;
      $penyaluran->id_sopir = $request->id_sopir;
      $penyaluran->id_pb = $request->id_pb;
      $penyaluran->id_kendaraan = $kendaraan->id;
      $penyaluran->id_penjualan = $request->id_penjualan;
      $penyaluran->status = $request->status;

      $penyaluran->save();
      return redirect('/penyaluran')->with('status', 'data telah ditambahkan');
    } else {
      return redirect('/penyaluran')->with('gagal', 'masukan data yang sesuai');
    }
  }

  public function editPenyaluran($id){
    // $penyaluran = Penyaluran::find($id);
    $penyaluran = Penyaluran::join('kendaraan as k', 'penyaluran.id_kendaraan', '=', 'k.id')
                            ->where('penyaluran.id', '=', $id)
                            ->select('penyaluran.id', 'penyaluran.tanggalKirim', 'penyaluran.tanggalTerima', 'k.id_kendaraan', 'penyaluran.id_sopir', 'penyaluran.id_pb', 'penyaluran.id_penjualan', 'penyaluran.status')
                            ->first();
    $user = User::get();
    return view('admin.editPenyaluran', ['penyaluran' => $penyaluran], ['user' => $user]);
  }

  public function updatePenyaluran(Request $request, $id){
    $kendaraan = Kendaraan::where('id_kendaraan', '=', $request->id_kendaraan)->first();
    $pemasukan = Pemasukan::where('id', '=' , $request->id_penjualan)->first();
    if ($pemasukan->namaItem == "Kelapa A") {
      $penyaluran= penyaluran::find($id);
      $penyaluran->tanggalKirim = $request->tanggalKirim;
      $penyaluran->tanggalTerima = $request->tanggalTerima;
      $penyaluran->id_sopir = $request->id_sopir;
      $penyaluran->id_pb = $request->id_pb;
      $penyaluran->id_kendaraan = $kendaraan->id;
      $penyaluran->id_penjualan = $request->id_penjualan;
      $penyaluran->status = $request->status;

      $penyaluran->save();
      return redirect('/penyaluran')->with('status', 'Data berhasil diperbaharui');
    } elseif ($pemasukan->namaItem == "Kelapa B") {
      $penyaluran= penyaluran::find($id);
      $penyaluran->tanggalKirim = $request->tanggalKirim;
      $penyaluran->tanggalTerima = $request->tanggalTerima;
      $penyaluran->id_sopir = $request->id_sopir;
      $penyaluran->id_pb = $request->id_pb;
      $penyaluran->id_kendaraan = $kendaraan->id;
      $penyaluran->id_penjualan = $request->id_penjualan;
      $penyaluran->status = $request->status;

      $penyaluran->save();
      return redirect('/penyaluran')->with('status', 'Data berhasil diperbaharui');
    } elseif ($pemasukan->namaItem == "Kelapa C") {
      $penyaluran= penyaluran::find($id);
      $penyaluran->tanggalKirim = $request->tanggalKirim;
      $penyaluran->tanggalTerima = $request->tanggalTerima;
      $penyaluran->id_sopir = $request->id_sopir;
      $penyaluran->id_pb = $request->id_pb;
      $penyaluran->id_kendaraan = $kendaraan->id;
      $penyaluran->id_penjualan = $request->id_penjualan;
      $penyaluran->status = $request->status;

      $penyaluran->save();
      return redirect('/penyaluran')->with('status', 'Data berhasil diperbaharui');
    }else {
      return redirect('/penyaluran')->with('gagal', 'masukan data yang sesuai');
    }
  }

  public function deletePenyaluran($id){
    $penyaluran = Penyaluran::find($id);
    $penyaluran->delete($penyaluran);
    return redirect('/penyaluran')->with('status', 'Data Berhasil Dihapus');
  }

  public function rekap(){
    $bulan = date('m');
    $tahun = date('Y');
    $pengeluaran = Transaksi::join('pengeluaran as p', 'transaksi.id', '=', 'p.idTransaksi')
                            ->whereMonth('p.tanggal', $bulan)
                            ->whereYear('p.tanggal', $tahun)
                            ->select('p.tanggal', 'transaksi.faktur', 'p.harga', 'transaksi.saldo')
                            ->get();
    $pemasukan = Transaksi::join('pemasukan as p', 'transaksi.id', '=', 'p.idTransaksi')
                            ->whereMonth('p.tanggal', $bulan)
                            ->whereYear('p.tanggal', $tahun)
                            ->select('p.tanggal', 'transaksi.faktur', 'p.harga', 'transaksi.saldo')
                            ->get();
    return view('admin.rekap', ['pengeluaran' => $pengeluaran], ['pemasukan' => $pemasukan]);
  }

  public function cetakPDF(){
    $bulan = date('m');
    $tahun = date('Y');
    $pengeluaran = Transaksi::join('pengeluaran as p', 'transaksi.id', '=', 'p.idTransaksi')
                            ->whereMonth('p.tanggal', $bulan)
                            ->whereYear('p.tanggal', $tahun)
                            ->select('p.tanggal', 'transaksi.faktur', 'p.harga', 'transaksi.saldo')
                            ->get();
    $pemasukan = Transaksi::join('pemasukan as p', 'transaksi.id', '=', 'p.idTransaksi')
                            ->whereMonth('p.tanggal', $bulan)
                            ->whereYear('p.tanggal', $tahun)
                            ->select('p.tanggal', 'transaksi.faktur', 'p.harga', 'transaksi.saldo')
                            ->get();

  	$pdf = PDF::loadview('admin.rekapPDF',['pengeluaran' => $pengeluaran], ['pemasukan' => $pemasukan]);
  	return $pdf->download('rekap.pdf');
  }
}
