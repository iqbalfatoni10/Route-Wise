<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rute extends Model
{
    use HasFactory;
    protected $fillable = [
        'alternatif_id',
        'waktu_tempuh',
        'jumlah_permintaan',
        'biaya',
        'jarak_tempuh',
    ];

    public function alternatif()
    {
        return $this->belongsTo(Alternatif::class);
    }
}
