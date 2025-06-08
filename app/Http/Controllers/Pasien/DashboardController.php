<?php

namespace App\Http\Controllers\Pasien;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        return view('pasien.dashboard');
    }
}