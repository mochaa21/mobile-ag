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
use Illuminate\Validation\ValidationException;
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
     * @throws ValidationException
     */
    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        // 1. Validasi inputan form dasar
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'nim' => ['required', 'string', 'max:50', 'unique:'.\App\Models\User::class], // Pastikan 1 NIM cuma bisa bikin 1 akun
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.\App\Models\User::class],
            'password' => ['required', 'confirmed', \Illuminate\Validation\Rules\Password::defaults()],
        ]);

        // 2. Cek apakah NIM ada di tabel master mahasiswa
        $mahasiswaMaster = \App\Models\Mahasiswa::where('nim', $request->nim)->first();

        if (!$mahasiswaMaster) {
            return back()->withInput()->withErrors(['nim' => 'Pendaftaran Gagal: NIM belum terdaftar di Data Master. Silakan hubungi Admin.']);
        }

        // 3. Cek apakah Nama di form cocok dengan Nama di tabel master
        if (strtolower($mahasiswaMaster->nama_lengkap) !== strtolower($request->name)) {
            return back()->withInput()->withErrors(['name' => 'Pendaftaran Gagal: Nama tidak cocok dengan data NIM di sistem.']);
        }

        // 4. Kalau semua aman, buatkan akun loginnya
        $user = \App\Models\User::create([
            'name' => $request->name,
            'email' => $request->email,
            'nim' => $request->nim,
            'password' => \Illuminate\Support\Facades\Hash::make($request->password),
            'role' => 'mahasiswa',
        ]);

        \Illuminate\Support\Facades\Auth::login($user);

        return redirect(route('data-riwayat', absolute: false));
    }
}
