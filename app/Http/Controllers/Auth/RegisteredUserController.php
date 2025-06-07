<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',
            'role' => 'required|in:dokter,pasien',
            'alamat' => 'required|string|max:255',
            'no_ktp' => 'required|string|max:255',
            'no_hp' => 'required|string|max:50',
            'poli' => 'required_if:role,dokter',
            'dokter_password' => 'required_if:role,dokter',
        ], [
            'dokter_password.required_if' => 'Password dokter wajib diisi jika memilih role dokter.',
            'poli.required_if' => 'Poli wajib diisi jika memilih role dokter.',
        ]);

        // Jika role dokter, cek password khusus
        if ($request->role === 'dokter' && $request->dokter_password !== 'dokter123') {
            return back()->withInput()->withErrors(['dokter_password' => 'Password dokter salah!']);
        }

        User::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'alamat' => $request->alamat,
            'no_ktp' => $request->no_ktp,
            'no_hp' => $request->no_hp,
            'poli' => $request->role === 'dokter' ? $request->poli : null,
            // 'no_rm' => null, // boleh dikosongkan, nullable
        ]);

        // Jangan login otomatis, cukup redirect ke welcome dengan flash message
        return redirect('/')->with('success', 'Register sudah dibuat');
    }
}
