<?php

namespace App\Http\Controllers\Dokter;

use App\Http\Controllers\Controller;
use App\Models\Obat;
use Illuminate\Http\Request;

class ObatController extends Controller
{
    public function index()
    {
        $obats = Obat::all();
        return view('dokter.obat.index', compact('obats'));
    }

    public function create()
    {
        return view('dokter.obat.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_obat' => 'required|string|max:100',
            'kemasan' => 'required|string|max:100',
            'harga' => 'required|numeric',
        ]);

        Obat::create($request->all());

        return redirect()->route('dokter.obat.index')->with('success', 'Obat berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $obat = Obat::findOrFail($id);
        return view('dokter.obat.edit', compact('obat'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_obat' => 'required|string|max:100',
            'kemasan' => 'required|string|max:100',
            'harga' => 'required|numeric',
        ]);

        $obat = Obat::findOrFail($id);
        $obat->update($request->all());

        return redirect()->route('dokter.obat.index')->with('success', 'Obat berhasil diupdate!');
    }

    public function destroy($id)
    {
        $obat = Obat::findOrFail($id);
        $obat->delete();

        return redirect()->route('dokter.obat.index')->with('success', 'Obat berhasil dihapus!');
    }
}
