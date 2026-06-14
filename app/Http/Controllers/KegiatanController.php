<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;

class KegiatanController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $status = $request->input('status');

        $kegiatan = Kegiatan::with('user')
            ->when($search, function ($query, $search) {
                return $query->where(function ($q) use ($search) {
                    $q->where('judul', 'like', "%{$search}%")
                        ->orWhere('lokasi', 'like', "%{$search}%")
                        ->orWhere('penanggung_jawab', 'like', "%{$search}%");
                });
            })
            ->when($status, function ($query, $status) {
                return $query->where('status', $status);
            })
            ->latest()
            ->paginate(10);

        return view('admin.kegiatan.index', compact('kegiatan', 'search', 'status'));
    }

    public function create()
    {
        return view('admin.kegiatan.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => ['required', 'string', 'max:200'],
            'tanggal' => ['required', 'date'],
            'lokasi' => ['required', 'string', 'max:200'],
            'penanggung_jawab' => ['required', 'string', 'max:100'],
            'deskripsi' => ['nullable', 'string'],
            'foto' => ['nullable', 'image', 'max:2048'],
            'status' => ['required', Rule::in(['Aktif', 'Selesai', 'Batal'])],
        ]);

        $validated['user_id'] = auth()->id();

        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('foto/kegiatan', 'public');
        }

        Kegiatan::create($validated);

        return redirect()->route('admin.kegiatan.index')->with('success', 'Kegiatan berhasil ditambahkan.');
    }

    public function show(Kegiatan $kegiatan)
    {
        $kegiatan->load('user');
        return view('admin.kegiatan.show', compact('kegiatan'));
    }

    public function edit(Kegiatan $kegiatan)
    {
        return view('admin.kegiatan.edit', compact('kegiatan'));
    }

    public function update(Request $request, Kegiatan $kegiatan)
    {
        $validated = $request->validate([
            'judul' => ['required', 'string', 'max:200'],
            'tanggal' => ['required', 'date'],
            'lokasi' => ['required', 'string', 'max:200'],
            'penanggung_jawab' => ['required', 'string', 'max:100'],
            'deskripsi' => ['nullable', 'string'],
            'foto' => ['nullable', 'image', 'max:2048'],
            'status' => ['required', Rule::in(['Aktif', 'Selesai', 'Batal'])],
        ]);

        if ($request->hasFile('foto')) {
            if ($kegiatan->foto && Storage::disk('public')->exists($kegiatan->foto)) {
                Storage::disk('public')->delete($kegiatan->foto);
            }
            $validated['foto'] = $request->file('foto')->store('foto/kegiatan', 'public');
        }

        $kegiatan->update($validated);

        return redirect()->route('admin.kegiatan.index')->with('success', 'Kegiatan berhasil diperbarui.');
    }

    public function destroy(Kegiatan $kegiatan)
    {
        $kegiatan->delete();
        return redirect()->route('admin.kegiatan.index')->with('success', 'Kegiatan berhasil dihapus.');
    }
}