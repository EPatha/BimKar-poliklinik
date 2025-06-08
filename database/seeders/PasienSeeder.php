<?php

namespace Database\Seeders;

use App\Models\Pasien;
use Illuminate\Database\Seeder;

class PasienSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pasiens = [
            [
                'nama' => 'Andi Saputra',
                'no_ktp' => '3175062505801001',
                'no_hp' => '081234567801',
                'alamat' => 'Jl. Merpati No. 1, Jakarta Selatan',
                'tanggal_lahir' => '1990-05-25',
                'jenis_kelamin' => 'Laki-laki',
            ],
            [
                'nama' => 'Siti Aminah',
                'no_ktp' => '3175062505801002',
                'no_hp' => '081234567802',
                'alamat' => 'Jl. Kenari No. 2, Jakarta Timur',
                'tanggal_lahir' => '1985-08-12',
                'jenis_kelamin' => 'Perempuan',
            ],
            [
                'nama' => 'Budi Hartono',
                'no_ktp' => '3175062505801003',
                'no_hp' => '081234567803',
                'alamat' => 'Jl. Melati No. 3, Jakarta Barat',
                'tanggal_lahir' => '1978-11-30',
                'jenis_kelamin' => 'Laki-laki',
            ],
        ];

        foreach ($pasiens as $pasien) {
            Pasien::create($pasien);
        }
    }
}