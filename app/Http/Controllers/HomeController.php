<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Penyaluran;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function dashboard()
    {
      $penyaluran = Penyaluran::join('users as u', 'penyaluran.id_pb', '=', 'u.id')
                              ->join('kendaraan as k', 'penyaluran.id_kendaraan', '=', 'k.id')
                              ->where('penyaluran.status', '=', 'sedang dalam perjalanan')
                              ->orWhere('penyaluran.status', '=', 'sedang dikemas')
                              ->select('penyaluran.id', 'penyaluran.tanggalKirim', 'penyaluran.tanggalTerima', 'k.id_kendaraan', 'u.nama', 'penyaluran.id_penjualan', 'penyaluran.status')
                              ->get();
      return view('dashboard', ['penyaluran' => $penyaluran]);
    }

    public function profile($id){
      $user = User::find($id);
      return view('profile', ['users' => $user]);
    }
}
