<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Penjualan;
use App\Pembelian;
use App\Stok;

class AdminController extends Controller
{
  // public function profile($id){
  //   $user = User::find($id);
  //   return view('profile', ['users' => $user]);
  // }

  public function ListPb(){
    $data_users = User::where('status','pedagang')->get();
    return view('admin.pedagang', ['data_users' => $data_users]);
  }

  public function searchPB(Request $request){
    if($request->has('cari')){
      $data_users = User::where([['name','LIKE','%'.$request->cari.'%'],['status', '=', 'pedagang']])->get();
      return view('admin.pedagang', ['data_users' => $data_users]);
    }else{
      $data_users = User::where('status','pedagang')->get();
      return redirect('/pedagang', ['data_users' => $data_users]);
    }
  }

  public function createPb(Request $request){
    $request->validate([
        'name' => 'required',
        'email' => 'required',
        'password' => 'required',
        'hp' => 'required',
        'alamat' => 'required',
    ]);

    $user = new User;
    $user->name = $request->name;
    $user->email = $request->email;
    $user->password = bcrypt($request->password);
    $user->hp = $request->hp;
    $user->alamat = $request->alamat;
    $user->status = 'pedagang';
    $user->statusAcc = 'on';
    $user->remember_token = str_random(60);

    $user->save();
    return redirect('/pedagang')->with('status', 'data telah ditambahkan');
  }

  public function edit($id){
    $user = User::find($id);
    return view('admin.edit', ['users' => $user]);
  }

  public function detail($id){
    $user = User::find($id);
    return view('admin.detail', ['users' => $user]);
  }

  public function update(Request $request, $id){
    $user = User::find($id);
    $user->name = $request->name;
    $user->email = $request->email;
    $user->hp = $request->hp;
    $user->alamat = $request->alamat;
    $user->statusAcc = $request->statusAcc;
    $user->save();
    if($user->status == 'pedagang'){
      return redirect('/pedagang')->with('status', 'Data perubahan telah disimpan');
    } else if($user->status == 'sopir'){
      return redirect('/sopir')->with('status', 'Data perubahan telah disimpan');
    }

  }

  // public function delete($id){
  //   $user = User::find($id);
  //   $user->delete($user);
  //   return redirect('/pedagang')->with('status', 'Data Berhasil Dihapus');
  // }

  public function listSopir(Request $request){
    $data_users = User::where('status','sopir')->get();
    return view('admin.sopir', ['data_users' => $data_users]);
  }

  public function searchSopir(Request $request){
    if($request->has('cari')){
      $data_users = User::where([['name','LIKE','%'.$request->cari.'%'],['status', '=', 'sopir']])->get();
      return view('admin.sopir', ['data_users' => $data_users]);
    }else{
      $data_users = User::where('status','pedagang')->get();
      return redirect('/sopir', ['data_users' => $data_users]);
    }
  }

  public function createSopir(Request $request){
    $request->validate([
        'name' => 'required',
        'email' => 'required',
        'password' => 'required',
        'hp' => 'required',
        'alamat' => 'required',
    ]);

    $user = new User;
    $user->name = $request->name;
    $user->email = $request->email;
    $user->password = bcrypt($request->password);
    $user->hp = $request->hp;
    $user->alamat = $request->alamat;
    $user->status = 'sopir';
    $user->statusAcc = 'on';
    $user->remember_token = str_random(60);

    $user->save();
    return redirect('/sopir')->with('status', 'data telah ditambahkan');
  }

  public function transaksi(){
    $penjualan = Penjualan::orderBy('id', 'Desc')->get();
    $pembelian = Pembelian::orderBy('id', 'Desc')->get();
    return view('admin.transaksi', ['penjualan' =>$penjualan], ['pembelian' =>$pembelian]);
  }

  public function transaksiCreate(Request $request){
    $request->validate([
        'faktur' => 'required',
        'nama' => 'required',
        'namaItem' => 'required',
        'quantity' => 'required',
        'harga' => 'required',
        'jenisPembayaran' => 'required',
        'keterangan' => 'required',
    ]);
    $stokKel = Stok::orderBy('id', 'Desc')->first();
    if ($request->faktur=="Penjualan") {
      if ($request->namaItem=="Gaji Karyawan" or $request->namaItem=="Pemeliharaan" or $request->namaItem=="Bonus Karyawan") {
        return redirect('/transaksi')->with('item', 'item tidak sesuai dengan faktur');
      } else {
        if ($request->namaItem=="Kelapa A") {
          $st = $stokKel->stokA;
          $rq = $request->quantity;
          $jumlah = $st-$rq;
          $stok = new Stok;
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
          $st = $stokKel->stokA;
          $rq = $request->quantity;
          $jumlah = $st-$rq;
          $stok = new Stok;
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
          $st = $stokKel->stokA;
          $rq = $request->quantity;
          $jumlah = $st-$rq;
          $stok = new Stok;
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
        $penjualan = new Penjualan;
        $penjualan->faktur = $request->faktur;
        $penjualan->nama = $request->nama;
        $penjualan->namaItem = $request->namaItem;
        $penjualan->quantity = $request->quantity;
        $penjualan->harga = $request->harga;
        $penjualan->jenisPembayaran = $request->jenisPembayaran;
        $penjualan->keterangan = $request->keterangan;

        $penjualan->save();
        return redirect('/transaksi')->with('status', 'data telah ditambahkan');
      }
    }elseif ($request->faktur=="Pembelian") {
      if ($request->namaItem=="Tempurung Kelapa" or $request->namaItem=="Sabut Kelapa") {
        return redirect('/transaksi')->with('item', 'item tidak sesuai dengan faktur');
      } else {
        if ($request->namaItem=="Kelapa A") {
          $st = $stokKel->stokA;
          $rq = $request->quantity;
          $jumlah = $st + $rq;
          $stok = new Stok;
          $stok->keMasA = $request->quantity;
          $stok->keMasB = 0;
          $stok->keMasC = 0;
          $stok->keKelA = 0;
          $stok->keKelB = 0;
          $stok->keKelC = 0;
          $stok->stokA = $jumlah;
          $stok->stokB = $stokKel->stokB;
          $stok->stokC = $stokKel->stokC;
          $stok->save();
        } elseif ($request->namaItem=="Kelapa B") {
          $st = $stokKel->stokB;
          $rq = $request->quantity;
          $jumlah = $st+$rq;
          $stok = new Stok;
          $stok->keMasA = 0;
          $stok->keMasB = $request->quantity;
          $stok->keMasC = 0;
          $stok->keKelA = 0;
          $stok->keKelB = 0;
          $stok->keKelC = 0;
          $stok->stokA = $stokKel->stokA;
          $stok->stokB = $jumlah;
          $stok->stokC = $stokKel->stokC;
          $stok->save();
        }elseif ($request->namaItem=="Kelapa C") {
          $st = $stokKel->stokC;
          $rq = $request->quantity;
          $jumlah = $st+$rq;
          $stok = new Stok;
          $stok->keMasA = 0;
          $stok->keMasB = 0;
          $stok->keMasC = $request->quantity;
          $stok->keKelA = 0;
          $stok->keKelB = 0;
          $stok->keKelC = 0;
          $stok->stokA = $stokKel->stokA;
          $stok->stokB = $stokKel->stokB;
          $stok->stokC = $jumlah;
          $stok->save();
        }
        $pembelian = new Pembelian;
        $pembelian->faktur = $request->faktur;
        $pembelian->nama = $request->nama;
        $pembelian->namaItem = $request->namaItem;
        $pembelian->quantity = $request->quantity;
        $pembelian->harga = $request->harga;
        $pembelian->jenisPembayaran = $request->jenisPembayaran;
        $pembelian->keterangan = $request->keterangan;

        $pembelian->save();
        return redirect('/transaksi')->with('status', 'data telah ditambahkan');
      }
    }
  }

  public function editPenjualan($id){
    $penjualan = Penjualan::find($id);
    return view('admin.editPenjualan', ['penjualan' => $penjualan]);
  }

  public function editPembelian($id){
    $pembelian = Pembelian::find($id);
    return view('admin.editPembelian', ['pembelian' => $pembelian]);
  }

  public function updatePenjualan(Request $request, $id){
    $pembelian = Penjualan::find($id);
    $pembelian->namaItem = $request->namaItem;
    $pembelian->nama = $request->nama;
    $pembelian->quantity = $request->quantity;
    $pembelian->harga = $request->harga;
    $pembelian->jenisPembayaran = $request->jenisPembayaran;
    $pembelian->keterangan = $request->keterangan;
    $pembelian->save();
    return redirect('/transaksi')->with('status', 'Data perubahan telah disimpan');
  }

  public function updatePembelian(Request $request, $id){
    $pembelian = Pembelian::find($id);
    $pembelian->namaItem = $request->namaItem;
    $pembelian->nama = $request->nama;
    $pembelian->quantity = $request->quantity;
    $pembelian->harga = $request->harga;
    $pembelian->jenisPembayaran = $request->jenisPembayaran;
    $pembelian->keterangan = $request->keterangan;
    $pembelian->save();
    return redirect('/transaksi')->with('status', 'Data perubahan telah disimpan');
  }

  public function stok(){
    $stok = Stok::orderBy('id', 'Desc')->get();
    return view('admin.stok', ['stok' =>$stok]);
  }

  public function editStok($id){
    $stok = Stok::find($id);
    return view('admin.editStok', ['stok' => $stok]);
  }

  public function updateStok(Request $request, $id){
    $stok = Stok::find($id);
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
}
