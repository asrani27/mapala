<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
            } elseif ($user->role === 'Anggota') {
                return redirect()->intended('/anggota/dashboard');
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

    public function anggotaDashboard()
    {
        $totalKegiatan = \App\Models\Kegiatan::count();
        $totalAnggota = \App\Models\Anggota::count();
        $totalPengurus = \App\Models\Pengurus::count();
        $kegiatan = \App\Models\Kegiatan::latest()->take(5)->get();

        return view('anggota.dashboard', compact(
            'totalKegiatan', 'totalAnggota', 'totalPengurus', 'kegiatan'
        ));
    }

    public function profil()
    {
        return view('anggota.profil');
    }

    public function editProfil()
    {
        $user = auth()->user();
        $anggota = $user->anggota;
        
        return view('anggota.edit-profil', compact('user', 'anggota'));
    }

    public function updateProfil(Request $request)
    {
        $user = auth()->user();
        $anggota = $user->anggota;

        $validated = $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'alamat' => ['nullable', 'string', 'max:500'],
            'telp' => ['nullable', 'string', 'max:20'],
            'foto' => ['nullable', 'image', 'max:2048'],
        ]);

        // Update Anggota data
        $anggota->update([
            'nama' => $validated['nama'],
            'alamat' => $validated['alamat'] ?? null,
            'telp' => $validated['telp'] ?? null,
        ]);

        // Handle foto upload
        if ($request->hasFile('foto')) {
            // Delete old foto if exists
            if ($anggota->foto && \Storage::exists($anggota->foto)) {
                \Storage::delete($anggota->foto);
            }
            $anggota->foto = $request->file('foto')->store('foto-anggota', 'public');
            $anggota->save();
        }

        // Update user's name
        $user->name = $validated['nama'];
        $user->save();

        return redirect()->route('anggota.profil')->with('success', 'Profil berhasil diperbarui.');
    }

    public function informasiKegiatan()
    {
        $kegiatan = \App\Models\Kegiatan::latest()->get();
        return view('anggota.informasi-kegiatan', compact('kegiatan'));
    }
}
