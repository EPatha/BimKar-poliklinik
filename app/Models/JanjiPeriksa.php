<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class JanjiPeriksa extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_pasien',
        'id_jadwal_periksa',
        'keluhan',
        'no_antrian',
    ];

    public function pasien()
    {
        return $this->belongsTo(\App\Models\User::class, 'id_pasien');
    }

    public function jadwalPeriksa():BelongsTo
    {
        return $this->belongsTo(JadwalPeriksa::class, 'id_jadwal_periksa');
    }

    public function periksa():HasOne
    {
        return $this->hasOne(Periksa::class, 'id_janji_periksa');
    }
}
