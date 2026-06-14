<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required', 'string'],
            'password' => ['required', 'string'],
        ]);

        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();

            $user = Auth::user();

            if ($user->role === 'Admin') {
                return redirect()->intended('/admin/dashboard');
            }

            return redirect()->intended('/');
        }

        return back()->withErrors([
            'username' => 'Username atau kata sandi salah.',
        ])->onlyInput('username');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function dashboard()
    {
        $totalAnggota = \App\Models\Anggota::count();
        $totalAdmin = \App\Models\User::where('role', 'Admin')->count();
        $totalKegiatan = \App\Models\Kegiatan::count();
        $totalAdministrasi = \App\Models\Administrasi::count();
        $recentAnggota = \App\Models\Anggota::latest()->take(5)->get();
        $recentKegiatan = \App\Models\Kegiatan::latest()->take(5)->get();

        return view('admin.dashboard', compact(
            'totalAnggota', 'totalAdmin', 'totalKegiatan', 'totalAdministrasi',
            'recentAnggota', 'recentKegiatan'
        ));
    }
}
