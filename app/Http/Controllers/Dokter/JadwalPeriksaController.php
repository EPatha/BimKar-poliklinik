<?php

namespace App\Http\Controllers\Dokter;

use App\Http\Controllers\Controller;
use App\Models\JadwalPeriksa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;

class JadwalPeriksaController extends Controller
{
    public function index(): View
    {
        $jadwalPeriksa = JadwalPeriksa::where('id_dokter', Auth::user()->id)->get();

        return view('dokter.jadwal-periksa.index', compact('jadwalPeriksa'));
    }

    public function create(): View
    {
        return view('dokter.jadwal-periksa.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'hari' => 'required|string|max:20',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
            'status' => 'required',
        ]);

        JadwalPeriksa::create([
            'id_dokter' => Auth::user()->id,
            'hari' => $request->hari,
            'jam_mulai' => $request->jam_mulai,
            'jam_selesai' => $request->jam_selesai,
            'status' => $request->status,
        ]);

        return redirect()->route('jadwal-periksa')->with('success', 'Jadwal berhasil ditambahkan!');
    }
}