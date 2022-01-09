<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KategoriProduk;
use App\Models\Produk;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $produk = Produk::all();
        $kategori = KategoriProduk::pluck('nama_kategori','id');
        return view('home',compact('produk','kategori'));
    }

    public function kategori($id){
        $produk = Produk::where('kategori_produk_id',$id)->get();
        $kategori = KategoriProduk::pluck('nama_kategori','id');
        return view('home',compact('produk','kategori'));
    }

    public function tampil_cv(){
        return view('tampil-cv');
    }
}
