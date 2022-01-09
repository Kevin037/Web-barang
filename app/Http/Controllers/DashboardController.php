<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KategoriProduk;
use App\Models\Produk;
use App\Models\TipeUser;
use App\Models\User;

class DashboardController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index(){
        $tipeuser = TipeUser::all()->count();
        $user = User::all()->count();
        $kategori = KategoriProduk::all()->count();
        $produk = Produk::all()->count();
        
        return view ('dashboard',compact('tipeuser','user','kategori','produk'));
    }
}
