<?php

namespace App\Http\Controllers\Dokter;

use App\Http\Controllers\Controller;
use App\Models\Periksa;
use App\Models\JanjiPeriksa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PeriksaController extends Controller
{
    // Tampilkan daftar periksa milik dokter
    public function index()
    {
        $janjiPeriksas = \App\Models\JanjiPeriksa::with(['pasien', 'periksa'])->get();
        return view('dokter.periksa.index', compact('janjiPeriksas'));
    }

    // Tampilkan form create periksa
    public function create(Request $request)
    {
        $id_janji_periksa = $request->id_janji_periksa;
        $janji = \App\Models\JanjiPeriksa::with(['pasien', 'jadwalPeriksa'])->findOrFail($id_janji_periksa);
        // Ambil jadwal periksa dokter yang aktif (status=1)
        $jadwal_aktif = \App\Models\JadwalPeriksa::where('id_dokter', auth()->id())
            ->where('status', 1)
            ->get();
            

        $obats = \App\Models\Obat::all();
        return view('dokter.periksa.create', compact('janji', 'jadwal_aktif', 'obats'));
    }

    // Simpan data periksa baru
    public function store(Request $request)
    {
        $request->validate([
            'id_janji_periksa' => 'required|exists:janji_periksas,id',
            'tgl_periksa' => 'required|date',
            'catatan' => 'required|string',
            'biaya_periksa' => 'required',
        ]);

        try {
            $periksa = \App\Models\Periksa::create([
                'id_janji_periksa' => $request->id_janji_periksa,
                'tgl_periksa' => $request->tgl_periksa,
                'catatan' => $request->catatan,
                'biaya_periksa' => str_replace('.', '', $request->biaya_periksa),
            ]);
            // Jika ada relasi obat, simpan ke pivot (opsional)
            // $periksa->obats()->sync($request->obat_id ?? []);
            return redirect()->route('dokter.periksa.index')->with('success', 'Data periksa berhasil disimpan!');
        } catch (\Exception $e) {
            return back()->withErrors(['msg' => 'Gagal menyimpan: ' . $e->getMessage()]);
        }
    }

    // Tampilkan form edit periksa
    public function edit($id)
    {
        $periksa = \App\Models\Periksa::with(['janjiPeriksa.pasien', 'obats'])->findOrFail($id);
        $obats = \App\Models\Obat::all();
        $jadwal_aktif = \App\Models\JadwalPeriksa::where('id_dokter', auth()->id())
            ->where('status', 1)
            ->get();
        return view('dokter.periksa.edit', compact('periksa', 'obats', 'jadwal_aktif'));
    }

    // Update data periksa
    public function update(Request $request, $id)
    {
        $request->validate([
            'tgl_periksa' => 'required|date',
            'jam_periksa' => 'required|string',
            'catatan' => 'required|string',
            'biaya_periksa' => 'required',
        ]);

        DB::beginTransaction();
        try {
            $periksa = \App\Models\Periksa::findOrFail($id);
            $periksa->update([
                'tgl_periksa' => $request->tgl_periksa,
                'jam_periksa' => $request->jam_periksa,
                'catatan' => $request->catatan,
                'biaya_periksa' => str_replace('.', '', $request->biaya_periksa),
            ]);
            // Sync obat ke pivot table jika ada
            if ($request->has('obat_id')) {
                $periksa->obats()->sync($request->obat_id);
            } else {
                $periksa->obats()->sync([]); // kosongkan jika tidak ada yang dipilih
            }
            DB::commit();
            return redirect()->route('dokter.periksa.index')->with('success', 'Data periksa berhasil diupdate!');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Gagal update data periksa: ' . $e->getMessage());
        }
    }
}