<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\KategoriProduk;

class Produk extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'kategori_produk_id',
        'harga',
        'gambar',
        'user_id',
    ];

    public function kategori_produk()
    {
        return $this->belongsTo(KategoriProduk::class);
    }
}
