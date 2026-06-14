<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;

class AnggotaController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $anggota = Anggota::with('user')
            ->when($search, function ($query, $search) {
                return $query->where('nim', 'like', "%{$search}%")
                    ->orWhere('nama', 'like', "%{$search}%")
                    ->orWhere('jurusan', 'like', "%{$search}%");
            })
            ->latest()
            ->paginate(10);

        return view('admin.anggota.index', compact('anggota', 'search'));
    }

    public function create()
    {
        $usersWithoutAnggota = User::where('role', 'Anggota')
            ->whereDoesntHave('anggota')
            ->get();

        return view('admin.anggota.create', compact('usersWithoutAnggota'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nim' => ['required', 'string', 'max:20', 'unique:anggota,nim'],
            'nama' => ['required', 'string', 'max:100'],
            'jurusan' => ['required', 'string', 'max:100'],
            'angkatan' => ['required', 'string', 'max:10'],
            'alamat' => ['nullable', 'string'],
            'foto' => ['nullable', 'image', 'max:2048'],
            'telp' => ['nullable', 'string', 'max:20'],
            'status' => ['required', Rule::in(['Aktif', 'Nonaktif', 'Alumni'])],
            'tanggal_daftar' => ['required', 'date'],
            'user_id' => ['nullable', 'exists:users,id'],
        ]);

        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('foto/anggota', 'public');
        }

        Anggota::create($validated);

        return redirect()->route('admin.anggota.index')->with('success', 'Anggota berhasil ditambahkan.');
    }

    public function show(Anggota $anggota)
    {
        $anggota->load('user');
        return view('admin.anggota.show', compact('anggota'));
    }

    public function edit(Anggota $anggota)
    {
        $usersWithoutAnggota = User::where('role', 'Anggota')
            ->whereDoesntHave('anggota')
            ->orWhere('id', $anggota->user_id)
            ->get();

        return view('admin.anggota.edit', compact('anggota', 'usersWithoutAnggota'));
    }

    public function update(Request $request, Anggota $anggota)
    {
        $validated = $request->validate([
            'nim' => ['required', 'string', 'max:20', Rule::unique('anggota', 'nim')->ignore($anggota->id)],
            'nama' => ['required', 'string', 'max:100'],
            'jurusan' => ['required', 'string', 'max:100'],
            'angkatan' => ['required', 'string', 'max:10'],
            'alamat' => ['nullable', 'string'],
            'foto' => ['nullable', 'image', 'max:2048'],
            'telp' => ['nullable', 'string', 'max:20'],
            'status' => ['required', Rule::in(['Aktif', 'Nonaktif', 'Alumni'])],
            'tanggal_daftar' => ['required', 'date'],
            'user_id' => ['nullable', 'exists:users,id'],
        ]);

        if ($request->hasFile('foto')) {
            // Delete old foto if exists
            if ($anggota->foto && \Storage::disk('public')->exists($anggota->foto)) {
                \Storage::disk('public')->delete($anggota->foto);
            }
            $validated['foto'] = $request->file('foto')->store('foto/anggota', 'public');
        }

        $anggota->update($validated);

        return redirect()->route('admin.anggota.index')->with('success', 'Anggota berhasil diperbarui.');
    }

    public function destroy(Anggota $anggota)
    {
        $anggota->delete();
        return redirect()->route('admin.anggota.index')->with('success', 'Anggota berhasil dihapus.');
    }

    public function createUser(Anggota $anggota)
    {
        $user = User::create([
            'name' => $anggota->nama,
            'username' => $anggota->nim,
            'email' => $anggota->nim . '@mapala.com',
            'password' => bcrypt($anggota->nim),
            'role' => 'Anggota',
        ]);

        $anggota->update(['user_id' => $user->id]);

        return redirect()->route('admin.anggota.index')
            ->with('success', "Akun user berhasil dibuat (username: {$user->username}, password: {$anggota->nim}).");
    }

    public function resetPassword(Anggota $anggota)
    {
        $anggota->load('user');

        if (!$anggota->user) {
            return back()->withErrors(['msg' => 'Anggota ini belum memiliki akun user.']);
        }

        $anggota->user->update([
            'password' => bcrypt($anggota->nim),
        ]);

        return redirect()->route('admin.anggota.index')
            ->with('success', "Password berhasil direset (password: {$anggota->nim}).");
    }
}
