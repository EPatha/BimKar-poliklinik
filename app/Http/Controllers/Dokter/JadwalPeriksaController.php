<?php

namespace App\Http\Controllers\Dokter;

use App\Http\Controllers\Controller;
use App\Models\JadwalPeriksa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
<<<<<<< HEAD
use Illuminate\Support\Facades\Log;
=======
use Illuminate\Support\Facades\DB;
>>>>>>> 3f95e6d (update welcome, and autentication pasien)
use Illuminate\View\View;

class JadwalPeriksaController extends Controller
{
    public function index(): View
    {
        $jadwalPeriksa = JadwalPeriksa::where('id_dokter', Auth::user()->id)->get();
<<<<<<< HEAD

=======
>>>>>>> 3f95e6d (update welcome, and autentication pasien)
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

<<<<<<< HEAD
        JadwalPeriksa::create([
            'id_dokter' => Auth::user()->id,
            'hari' => $request->hari,
            'jam_mulai' => $request->jam_mulai,
            'jam_selesai' => $request->jam_selesai,
            'status' => $request->status,
        ]);

        return redirect()->route('jadwal-periksa')->with('success', 'Jadwal berhasil ditambahkan!');
=======
        DB::beginTransaction();
        try {
            JadwalPeriksa::create([
                'id_dokter' => Auth::user()->id,
                'hari' => $request->hari,
                'jam_mulai' => $request->jam_mulai,
                'jam_selesai' => $request->jam_selesai,
                'status' => $request->status,
            ]);
            DB::commit();
            return redirect()->route('jadwal-periksa')->with('success', 'Jadwal berhasil ditambahkan!');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Gagal menambah jadwal: ' . $e->getMessage());
        }
>>>>>>> 3f95e6d (update welcome, and autentication pasien)
    }

    public function toggleStatus($id)
    {
        $jadwal = JadwalPeriksa::where('id', $id)
            ->where('id_dokter', Auth::user()->id)
            ->firstOrFail();

        $jadwal->status = !$jadwal->status;
        $jadwal->save();

        return redirect()->route('jadwal-periksa')->with('success', 'Status jadwal berhasil diubah.');
    }

    public function edit($id)
    {
        $jadwal = JadwalPeriksa::where('id', $id)
            ->where('id_dokter', Auth::user()->id)
            ->firstOrFail();

        return view('dokter.jadwal-periksa.edit', compact('jadwal'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'hari' => 'required|string|max:20',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
            'status' => 'required',
        ]);

<<<<<<< HEAD
        $jadwal = JadwalPeriksa::where('id', $id)
            ->where('id_dokter', Auth::user()->id)
            ->firstOrFail();

        $jadwal->update([
            'hari' => $request->hari,
            'jam_mulai' => $request->jam_mulai,
            'jam_selesai' => $request->jam_selesai,
            'status' => $request->status,
        ]);

        return redirect()->route('jadwal-periksa')->with('success', 'Jadwal berhasil diupdate!');
=======
        DB::beginTransaction();
        try {
            $jadwal = JadwalPeriksa::where('id', $id)
                ->where('id_dokter', Auth::user()->id)
                ->firstOrFail();

            $jadwal->update([
                'hari' => $request->hari,
                'jam_mulai' => $request->jam_mulai,
                'jam_selesai' => $request->jam_selesai,
                'status' => $request->status,
            ]);
            DB::commit();
            return redirect()->route('jadwal-periksa')->with('success', 'Jadwal berhasil diupdate!');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Gagal update: ' . $e->getMessage());
        }
>>>>>>> 3f95e6d (update welcome, and autentication pasien)
    }

    public function destroy($id)
    {
<<<<<<< HEAD
        $jadwal = JadwalPeriksa::where('id', $id)
            ->where('id_dokter', Auth::user()->id)
            ->firstOrFail();

        $jadwal->delete();

        return redirect()->route('jadwal-periksa')->with('success', 'Jadwal berhasil dihapus.');
=======
        DB::beginTransaction();
        try {
            $jadwal = JadwalPeriksa::where('id', $id)
                ->where('id_dokter', Auth::user()->id)
                ->firstOrFail();

            $jadwal->delete();
            DB::commit();
            return redirect()->route('jadwal-periksa')->with('success', 'Jadwal berhasil dihapus.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Gagal hapus: ' . $e->getMessage());
        }
>>>>>>> 3f95e6d (update welcome, and autentication pasien)
    }
}