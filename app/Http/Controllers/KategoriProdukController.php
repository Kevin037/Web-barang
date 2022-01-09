<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KategoriProduk;
use App\Models\Produk;

class KategoriProdukController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(){
        $kategori = KategoriProduk::all();
        return view ('kategoriproduk',compact('kategori'));
    }

    public function tambah(Request $request){
        $kategori = new KategoriProduk;
        $kategori->nama_kategori = $request->nama_kategori;
        $kategori->save(); 
        return redirect('/kategori-produk')->with('toast_success', 'User berhasil ditambahkan');
    }    

    public function edit($id)
    {
        $kategori = KategoriProduk::where('id',$id)->get();

        return view('form-edit-kategori',compact('kategori'));
    }

    public function update(Request $request, $id)
    {
        $ubah_kategori=KategoriProduk::where('id',$id)
        ->update([
            'nama_kategori' => $request->nama_kategori,
        ]);
        
        return redirect('/kategori-produk')->with('toast_success', 'Kategori berhasil diperbarui');
    }

    public function hapus($id){
            
        $produk=Produk::where('kategori_produk_id',$id)->count();

        if ($produk == 0) {
            $kategori=KategoriProduk::find($id);
            $kategori->delete();
            return back()->with('toast_success', 'Kategori berhasil dihapus');
        }
        toast('Kategori sedang digunakan,
                Hapus data gagal!','error');
        return back();   
    }

    public function json_kategori(){
            $kategori = KategoriProduk::all();
            return response()->json($kategori);
    }
}
