<?php

namespace App\Http\Controllers\Dokter;

use App\Http\Controllers\Controller;
use App\Models\Periksa;
use App\Models\Pasien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PeriksaController extends Controller
{
    // Dashboard daftar periksa untuk dokter
    public function index()
    {
        // Ambil daftar periksa milik dokter yang login, join dengan pasien
        $periksas = Periksa::with('pasien')
            ->where('id_dokter', Auth::user()->id)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('dokter.periksa.index', compact('periksas'));
    }

    // Tampilkan form create periksa
    public function create($id_pasien)
    {
        $pasien = Pasien::findOrFail($id_pasien);
        return view('dokter.periksa.create', compact('pasien'));
    }

    // Simpan data periksa baru
    public function store(Request $request)
    {
        $request->validate([
            'id_pasien' => 'required|exists:pasiens,id',
            'keluhan' => 'required|string|max:255',
            // tambahkan validasi lain sesuai kebutuhan
        ]);

        DB::beginTransaction();
        try {
            Periksa::create([
                'id_dokter' => Auth::user()->id,
                'id_pasien' => $request->id_pasien,
                'keluhan' => $request->keluhan,
                // tambahkan field lain sesuai kebutuhan
            ]);
            DB::commit();
            return redirect()->route('dokter.periksa.index')->with('success', 'Data periksa berhasil ditambahkan!');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Gagal menambah data periksa: ' . $e->getMessage());
        }
    }

    // Tampilkan form edit periksa
    public function edit($id)
    {
        $periksa = Periksa::where('id', $id)
            ->where('id_dokter', Auth::user()->id)
            ->firstOrFail();
        $pasien = $periksa->pasien;
        return view('dokter.periksa.edit', compact('periksa', 'pasien'));
    }

    // Update data periksa
    public function update(Request $request, $id)
    {
        $request->validate([
            'keluhan' => 'required|string|max:255',
            // tambahkan validasi lain sesuai kebutuhan
        ]);

        DB::beginTransaction();
        try {
            $periksa = Periksa::where('id', $id)
                ->where('id_dokter', Auth::user()->id)
                ->firstOrFail();

            $periksa->update([
                'keluhan' => $request->keluhan,
                // tambahkan field lain sesuai kebutuhan
            ]);
            DB::commit();
            return redirect()->route('dokter.periksa.index')->with('success', 'Data periksa berhasil diupdate!');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Gagal update data periksa: ' . $e->getMessage());
        }
    }
}