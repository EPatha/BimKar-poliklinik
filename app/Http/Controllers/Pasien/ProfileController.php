<?php

namespace App\Http\Controllers\Pasien;

use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    public function index()
    {
        return view('pasien.profil');
    }
}