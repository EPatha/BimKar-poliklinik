<?php
// filepath: [RiwayatController.php](http://_vscodecontentref_/0)
namespace App\Http\Controllers\Pasien;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class RiwayatController extends Controller
{
    public function index()
    {
        // Ambil semua data periksa milik pasien yang sedang login, beserta relasi janjiPeriksa dan obats
        $riwayats = \App\Models\Periksa::with(['janjiPeriksa', 'obats'])
            ->whereHas('janjiPeriksa', function($q) {
                $q->where('id_pasien', auth()->id());
            })
            ->orderByDesc('tgl_periksa')
            ->get();

        return view('pasien.riwayat.index', compact('riwayats'));
    }
}