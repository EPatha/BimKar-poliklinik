<?php

namespace App\Http\Controllers\Dokter;

use App\Http\Controllers\Controller;
use App\Models\Obat;
use Illuminate\Http\Request;
<<<<<<< HEAD

class ObatController extends Controller
{
=======
use Illuminate\Support\Facades\DB;

class ObatController extends Controller
{
    // Tampilkan semua obat
>>>>>>> 3f95e6d (update welcome, and autentication pasien)
    public function index()
    {
        $obats = Obat::all();
        return view('dokter.obat.index', compact('obats'));
    }

<<<<<<< HEAD
=======
    // Tampilkan form tambah obat
>>>>>>> 3f95e6d (update welcome, and autentication pasien)
    public function create()
    {
        return view('dokter.obat.create');
    }

<<<<<<< HEAD
=======
    // Simpan obat baru ke database
>>>>>>> 3f95e6d (update welcome, and autentication pasien)
    public function store(Request $request)
    {
        $request->validate([
            'nama_obat' => 'required|string|max:100',
            'kemasan' => 'required|string|max:100',
            'harga' => 'required|numeric',
        ]);

<<<<<<< HEAD
        Obat::create($request->all());

        return redirect()->route('dokter.obat.index')->with('success', 'Obat berhasil ditambahkan!');
    }

=======
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
>>>>>>> 3f95e6d (update welcome, and autentication pasien)
    public function edit($id)
    {
        $obat = Obat::findOrFail($id);
        return view('dokter.obat.edit', compact('obat'));
    }

<<<<<<< HEAD
=======
    // Update data obat
>>>>>>> 3f95e6d (update welcome, and autentication pasien)
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_obat' => 'required|string|max:100',
            'kemasan' => 'required|string|max:100',
            'harga' => 'required|numeric',
        ]);

<<<<<<< HEAD
        $obat = Obat::findOrFail($id);
        $obat->update($request->all());

        return redirect()->route('dokter.obat.index')->with('success', 'Obat berhasil diupdate!');
    }

    public function destroy($id)
    {
        $obat = Obat::findOrFail($id);
        $obat->delete();

        return redirect()->route('dokter.obat.index')->with('success', 'Obat berhasil dihapus!');
=======
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
>>>>>>> 3f95e6d (update welcome, and autentication pasien)
    }
}
