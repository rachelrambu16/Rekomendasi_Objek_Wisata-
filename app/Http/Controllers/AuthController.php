<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Menampilkan halaman registrasi
    public function showRegistrasi()
    {
        return view('auth.registrasi');
    }

    // Memproses registrasi pengguna
    public function registrasi(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Membuat akun baru dengan role User
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => $validated['password'],
            'role' => 'user',
        ]);

        // Login otomatis setelah registrasi
        Auth::login($user);

        $request->session()->regenerate();

        // User baru langsung mengisi preferensi
        return redirect()->route('preferensi.create')->with(
            'success',
            'Registrasi berhasil! Silakan pilih preferensi wisata kamu.'
        );
    }

    // Menampilkan halaman login
    public function showLogin()
    {
        return view('auth.login');
    }

    // Memproses login pengguna
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        // Memeriksa email dan password
        if (Auth::attempt($credentials)) {

            // Memperbarui session setelah login
            $request->session()->regenerate();

            $user = Auth::user();

            // Jika akun Admin
            if ($user->role === 'admin') {
                return redirect()->route('dashboard')->with(
                    'success',
                    'Login Admin berhasil!'
                );
            }

            // Jika User belum memiliki preferensi
            if (!$user->preferensis()->exists()) {
                return redirect()->route('preferensi.create')->with(
                    'success',
                    'Silakan lengkapi preferensi wisata kamu terlebih dahulu.'
                );
            }

            // Jika User sudah memiliki preferensi
            return redirect()->route('dashboard')->with(
                'success',
                'Login berhasil! Selamat datang kembali di Jelajah Jogja.'
            );
        }

        // Jika login gagal
        return back()->withErrors([
            'email' => 'Email atau password yang dimasukkan salah.',
        ])->onlyInput('email');
    }

    // Memproses logout pengguna
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with(
            'success',
            'Kamu berhasil logout.'
        );
    }
}
