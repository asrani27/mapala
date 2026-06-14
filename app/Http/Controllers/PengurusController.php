<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Pengurus;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;

class PengurusController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $pengurus = Pengurus::with('anggota')
            ->when($search, function ($query, $search) {
                return $query->whereHas('anggota', function ($q) use ($search) {
                    $q->where('nama', 'like', "%{$search}%")
                        ->orWhere('nim', 'like', "%{$search}%");
                })
                    ->orWhere('jabatan', 'like', "%{$search}%")
                    ->orWhere('periode', 'like', "%{$search}%");
            })
            ->latest()
            ->paginate(10);

        return view('admin.pengurus.index', compact('pengurus', 'search'));
    }

    public function create()
    {
        $anggota = Anggota::where('status', 'Aktif')->get();
        return view('admin.pengurus.create', compact('anggota'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'anggota_id' => ['required', 'exists:anggota,id'],
            'jabatan' => ['required', 'string', 'max:100'],
            'periode' => ['required', 'string', 'max:50'],
            'status' => ['required', Rule::in(['aktif', 'nonaktif'])],
            'foto' => ['nullable', 'image', 'max:2048'],
        ]);

        // Check if anggota already has a position in the same periode
        $existing = Pengurus::where('anggota_id', $validated['anggota_id'])
            ->where('periode', $validated['periode'])
            ->first();

        if ($existing) {
            return back()->withErrors(['anggota_id' => 'Anggota ini sudah menjadi pengurus pada periode tersebut.'])->withInput();
        }

        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('foto/pengurus', 'public');
        }

        Pengurus::create($validated);

        return redirect()->route('admin.pengurus.index')->with('success', 'Pengurus berhasil ditambahkan.');
    }

    public function show(Pengurus $pengurus)
    {
        $pengurus->load('anggota');
        return view('admin.pengurus.show', compact('pengurus'));
    }

    public function edit(Pengurus $pengurus)
    {
        $anggota = Anggota::where('status', 'Aktif')->get();
        return view('admin.pengurus.edit', compact('pengurus', 'anggota'));
    }

    public function update(Request $request, Pengurus $pengurus)
    {
        $validated = $request->validate([
            'anggota_id' => ['required', 'exists:anggota,id'],
            'jabatan' => ['required', 'string', 'max:100'],
            'periode' => ['required', 'string', 'max:50'],
            'status' => ['required', Rule::in(['aktif', 'nonaktif'])],
            'foto' => ['nullable', 'image', 'max:2048'],
        ]);

        // Check if anggota already has a position in the same periode (exclude current record)
        $existing = Pengurus::where('anggota_id', $validated['anggota_id'])
            ->where('periode', $validated['periode'])
            ->where('id', '!=', $pengurus->id)
            ->first();

        if ($existing) {
            return back()->withErrors(['anggota_id' => 'Anggota ini sudah menjadi pengurus pada periode tersebut.'])->withInput();
        }

        if ($request->hasFile('foto')) {
            if ($pengurus->foto && Storage::disk('public')->exists($pengurus->foto)) {
                Storage::disk('public')->delete($pengurus->foto);
            }
            $validated['foto'] = $request->file('foto')->store('foto/pengurus', 'public');
        }

        $pengurus->update($validated);

        return redirect()->route('admin.pengurus.index')->with('success', 'Pengurus berhasil diperbarui.');
    }

    public function destroy(Pengurus $pengurus)
    {
        $pengurus->delete();
        return redirect()->route('admin.pengurus.index')->with('success', 'Pengurus berhasil dihapus.');
    }
}
