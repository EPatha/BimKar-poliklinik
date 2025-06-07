<?php

namespace App\Http\Controllers\Dokter;

use App\Http\Controllers\Controller;
use App\Models\Obat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ObatController extends Controller
{
    // Tampilkan semua obat
    public function index()
    {
        $obats = Obat::all();
        return view('dokter.obat.index', compact('obats'));
    }

    // Tampilkan form tambah obat
    public function create()
    {
        return view('dokter.obat.create');
    }

    // Simpan obat baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'nama_obat' => 'required|string|max:100',
            'kemasan' => 'required|string|max:100',
            'harga' => 'required|numeric',
        ]);

        DB::beginTransaction();
        try {
            $obat = Obat::create($request->all());
            DB::commit();
            return redirect()->route('dokter.obat.index')->with('success', 'Obat berhasil disimpan!');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Gagal menyimpan: ' . $e->getMessage());
        }
    }

    // Tampilkan form edit obat
    public function edit($id)
    {
        $obat = Obat::findOrFail($id);
        return view('dokter.obat.edit', compact('obat'));
    }

    // Update data obat
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_obat' => 'required|string|max:100',
            'kemasan' => 'required|string|max:100',
            'harga' => 'required|numeric',
        ]);

        DB::beginTransaction();
        try {
            $obat = Obat::findOrFail($id);
            $obat->update($request->all());
            DB::commit();
            return redirect()->route('dokter.obat.index')->with('success', 'Obat berhasil diupdate!');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Gagal update: ' . $e->getMessage());
        }
    }

    // Hapus obat
    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            $obat = Obat::findOrFail($id);
            $obat->delete();
            DB::commit();
            return redirect()->route('dokter.obat.index')->with('success', 'Obat berhasil dihapus!');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Gagal hapus: ' . $e->getMessage());
        }
    }
}
