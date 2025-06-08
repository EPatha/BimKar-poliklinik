<?php

namespace App\Http\Controllers\Pasien;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JanjiPeriksa;
use App\Models\JadwalPeriksa;
use Illuminate\Support\Facades\Auth;

class JanjiPeriksaController extends Controller
{
    public function index()
    {
        $janji = JanjiPeriksa::where('id_pasien', Auth::id())->with('jadwalPeriksa')->get();
        return view('pasien.janji.index', compact('janji'));
    }

    public function create()
    {
        $jadwal = JadwalPeriksa::all();
        return view('pasien.janji.create', compact('jadwal'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_jadwal_periksa' => 'required|exists:jadwal_periksas,id',
            'keluhan' => 'required|string|max:255',
        ]);

        $no_antrian = JanjiPeriksa::where('id_jadwal_periksa', $request->id_jadwal_periksa)->count() + 1;

        JanjiPeriksa::create([
            'id_pasien' => Auth::id(),
            'id_jadwal_periksa' => $request->id_jadwal_periksa,
            'keluhan' => $request->keluhan,
            'no_antrian' => $no_antrian,
        ]);

        return redirect()->route('pasien.janji.index')->with('success', 'Janji periksa berhasil dibuat.');
    }

    public function edit($id)
    {
        $janji = JanjiPeriksa::where('id', $id)->where('id_pasien', Auth::id())->firstOrFail();
        $jadwal = JadwalPeriksa::all();
        return view('pasien.janji.edit', compact('janji', 'jadwal'));
    }

    public function update(Request $request, $id)
    {
        $janji = JanjiPeriksa::where('id', $id)->where('id_pasien', Auth::id())->firstOrFail();

        $request->validate([
            'id_jadwal_periksa' => 'required|exists:jadwal_periksas,id',
            'keluhan' => 'required|string|max:255',
        ]);

        $janji->update([
            'id_jadwal_periksa' => $request->id_jadwal_periksa,
            'keluhan' => $request->keluhan,
        ]);

        return redirect()->route('pasien.janji.index')->with('success', 'Janji periksa berhasil diubah.');
    }

    public function destroy($id)
    {
        $janji = JanjiPeriksa::where('id', $id)->where('id_pasien', Auth::id())->firstOrFail();
        $janji->delete();

        return redirect()->route('pasien.janji.index')->with('success', 'Janji periksa berhasil dihapus.');
    }
}