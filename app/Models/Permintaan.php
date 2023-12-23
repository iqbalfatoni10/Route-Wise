<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permintaan extends Model
{
    use HasFactory;
    protected $fillable = [
        'alternatif_id',
        'produksi_id',
        'jumlah_permintaan',
        'jumlah_dikirim',
        'biaya',
    ];

    public function alternatif()
    {
        return $this->belongsTo(Alternatif::class);
    }

    public function produksi()
    {
        return $this->belongsTo(Produksi::class);
    }

    public function stok()
    {
        return $this->hasMany(Stok::class);
    }
}
