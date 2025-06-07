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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',
<<<<<<< HEAD
            // Tambahkan validasi role jika ingin memilih role saat register
            // 'role' => 'required|in:dokter,pasien',
        ]);

=======
            'role' => 'required|in:dokter,pasien',
            'dokter_password' => 'required_if:role,dokter',
        ], [
            'dokter_password.required_if' => 'Password dokter wajib diisi jika memilih role dokter.',
        ]);

        // Jika role dokter, cek password khusus
        if ($request->role === 'dokter' && $request->dokter_password !== 'dokter123') {
            return back()->withInput()->withErrors(['dokter_password' => 'Password dokter salah!']);
        }

>>>>>>> 3f95e6d (update welcome, and autentication pasien)
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
<<<<<<< HEAD
            'role' => 'pasien', // Atau $request->role jika ingin memilih role saat register
=======
            'role' => $request->role,
>>>>>>> 3f95e6d (update welcome, and autentication pasien)
        ]);

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
<<<<<<< HEAD
}
=======
}
>>>>>>> 3f95e6d (update welcome, and autentication pasien)
