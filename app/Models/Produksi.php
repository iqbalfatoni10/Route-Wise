<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produksi extends Model
{
    use HasFactory;
    protected $fillable = [
        'jenis_produksi',
        'jumlah_produksi',
        'waktu_produksi',
    ];

    public function permintaan()
    {
        return $this->hasMany(Permintaan::class);
    }

    public function stok()
    {
        return $this->hasMany(Stok::class);
    }
}
