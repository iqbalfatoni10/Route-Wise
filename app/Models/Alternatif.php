<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alternatif extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_alternatif',
        'waktu_tempuh',
        'jarak',
    ];

    public function permintaan()
    {
        return $this->hasMany(Permintaan::class);
    }

    public function rute()
    {
        return $this->hasMany(Rute::class);
    }
}
