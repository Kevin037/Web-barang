<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\KategoriProduk;

class ProdukController extends Controller
{   
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $produk = Produk::all();
        $kategori = KategoriProduk::pluck('nama_kategori','id');
        return view ('produk',compact('produk','kategori'));
    }

    public function tambah(Request $request){

        $id_max=Produk::max('id');
        $id_new=$id_max+1;
        $kode='#IT'.$id_new;
        $request->validate([
            'bill' => 'image|mimes:jpg,jpeg,png|max:900'
        ]);
        $image = $request->file('bill');
        $nama_gambar = $image->getClientOriginalName();
        $image->move('img/produk/',$nama_gambar);

        $produk = new Produk;
        $produk->kode_produk = $kode;
        $produk->nama = $request->nama;
        $produk->kategori_produk_id = $request->kategori_id;
        $produk->harga = $request->harga;
        $produk->user_id = '1';
        $produk->gambar = $nama_gambar;
        $produk->save(); 

        return redirect('/produk')->with('toast_success', 'Produk berhasil ditambahkan');
    }    

    public function edit($id)
    {
        $produk = Produk::where('id',$id)->get();
        $kategori = KategoriProduk::pluck('nama_kategori','id');
        return view('form-edit-produk',compact('produk','kategori'));
    }

    public function update(Request $request, $id)
    {
        $id_max=Produk::max('id');
        $id_new=$id_max+1;
        $kode='#IT'.$id_new;


        if ($request->file('bill')) {
            $request->validate([
                'bill' => 'image|mimes:jpg,jpeg,png|max:900'
            ]);
            $image = $request->file('bill');
            $nama_gambar = $image->getClientOriginalName();
            $image->move('img/produk/',$nama_gambar);

            if ($request->kategori_id) {
                $ubah_produk=Produk::where('id',$id)
                ->update([
                'nama' => $request->nama,
                'kategori_produk_id' => $request->kategori_id,
                'harga' => $request->harga,
                'gambar' => $nama_gambar,
                'user_id' => '1',
            ]);
            }else{
                $ubah_produk=Produk::where('id',$id)
                ->update([
                'nama' => $request->nama,
                'harga' => $request->harga,
                'gambar' => $nama_gambar,
                'user_id' => '1',
            ]);
            }
        }
        if ($request->kategori_id) {
            $ubah_produk=Produk::where('id',$id)
            ->update([
                'nama' => $request->nama,
                'kategori_produk_id' => $request->kategori_id,
                'harga' => $request->harga,
                'user_id' => '1',
            ]);
        }
        else {
            $ubah_produk=Produk::where('id',$id)
            ->update([
                'nama' => $request->nama,
                'harga' => $request->harga,
                'user_id' => '1',
            ]);
        }
        
        return redirect('/produk')->with('toast_success', 'Produk berhasil diperbarui');
    }

    public function hapus($id){
            
            $produk=Produk::find($id);
            $produk->delete();
            return back()->with('toast_success', 'Produk berhasil dihapus');
    }
}

