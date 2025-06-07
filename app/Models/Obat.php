<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Obat extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_obat',
        'kemasan',
        'harga',
    ];

<<<<<<< HEAD
    public function detailPeriksas():HasMany
=======
    public function detailPeriksas(): HasMany
>>>>>>> 3f95e6d (update welcome, and autentication pasien)
    {
        return $this->hasMany(DetailPeriksa::class, 'id_obat');
    }
}
