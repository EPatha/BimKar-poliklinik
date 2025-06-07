<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
abstract class Controller
{
    //
=======
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\YourModel;

abstract class Controller
{
    //
    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            // Validasi data jika perlu
            // $request->validate([...]);

            $data = YourModel::create($request->all());

            DB::commit();
            return response()->json(['message' => 'Data berhasil disimpan', 'data' => $data]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['message' => 'Error: ' . $e->getMessage()], 500);
        }
    }
>>>>>>> 3f95e6d (update welcome, and autentication pasien)
}
