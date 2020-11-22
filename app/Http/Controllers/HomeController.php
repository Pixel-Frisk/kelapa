<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;

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
      $users = User::join('transactions  as t', 'users.id', '=', 't.id_sopir')
                  ->join('users as us', 't.id_pb', '=', 'us.id')
                  ->select('users.name', 'us.alamat', 't.created_at', 't.updated_at')
                  ->get();
      return view('dashboard', ['users' => $users]);
    }

    public function profile($id){
      $user = User::find($id);
      return view('profile', ['users' => $user]);
    }
}
