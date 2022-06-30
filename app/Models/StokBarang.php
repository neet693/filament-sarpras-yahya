<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StokBarang extends Model
{
    use HasFactory;

    protected $fillable = ['nama_barang', 'slug', 'ruangan_id', 'jumlah_barang', 'kondisi_awal', 'kondisi_id', 'keterangan'];


    public function kondisi()
    {
        return $this->belongsTo(Kondisi::class, 'kondisi_id');
    }

    public function ruangan()
    {
        return $this->belongsTo(Ruangan::class, 'ruangan_id');
    }
}
