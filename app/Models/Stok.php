<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stok extends Model
{
    use HasFactory;
    protected $fillable = [
        'produksi_id',
        'jumlah_produksi',
        'permintaan_id',
        'stok',
    ];

    public function produksi()
    {
        return $this->belongsTo(Produksi::class);
    }

    public function permintaan()
    {
        return $this->belongsTo(Permintaan::class);
    }
}
