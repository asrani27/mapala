<?php

namespace App\Http\Controllers;

use App\Models\Administrasi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;

class AdministrasiController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $administrasi = Administrasi::with('user')
            ->when($search, function ($query, $search) {
                return $query->where(function ($q) use ($search) {
                    $q->where('nomor_surat', 'like', "%{$search}%")
                        ->orWhere('jenis_surat', 'like', "%{$search}%")
                        ->orWhere('perihal', 'like', "%{$search}%")
                        ->orWhere('keterangan', 'like', "%{$search}%");
                });
            })
            ->latest()
            ->paginate(10);

        return view('admin.administrasi.index', compact('administrasi', 'search'));
    }

    public function create()
    {
        return view('admin.administrasi.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nomor_surat' => ['required', 'string', 'max:50', 'unique:administrasi,nomor_surat'],
            'jenis_surat' => ['required', 'string', 'max:100'],
            'tanggal_surat' => ['required', 'date'],
            'perihal' => ['required', 'string', 'max:255'],
            'keterangan' => ['nullable', 'string'],
            'file' => ['nullable', 'file', 'max:10240'],
        ]);

        $validated['user_id'] = auth()->id();

        if ($request->hasFile('file')) {
            $validated['file'] = $request->file('file')->store('file/administrasi', 'public');
        }

        Administrasi::create($validated);

        return redirect()->route('admin.administrasi.index')->with('success', 'Data administrasi berhasil ditambahkan.');
    }

    public function show(Administrasi $administrasi)
    {
        $administrasi->load('user');
        return view('admin.administrasi.show', compact('administrasi'));
    }

    public function edit(Administrasi $administrasi)
    {
        return view('admin.administrasi.edit', compact('administrasi'));
    }

    public function update(Request $request, Administrasi $administrasi)
    {
        $validated = $request->validate([
            'nomor_surat' => ['required', 'string', 'max:50', Rule::unique('administrasi', 'nomor_surat')->ignore($administrasi->id)],
            'jenis_surat' => ['required', 'string', 'max:100'],
            'tanggal_surat' => ['required', 'date'],
            'perihal' => ['required', 'string', 'max:255'],
            'keterangan' => ['nullable', 'string'],
            'file' => ['nullable', 'file', 'max:10240'],
        ]);

        if ($request->hasFile('file')) {
            if ($administrasi->file && Storage::disk('public')->exists($administrasi->file)) {
                Storage::disk('public')->delete($administrasi->file);
            }
            $validated['file'] = $request->file('file')->store('file/administrasi', 'public');
        }

        $administrasi->update($validated);

        return redirect()->route('admin.administrasi.index')->with('success', 'Data administrasi berhasil diperbarui.');
    }

    public function destroy(Administrasi $administrasi)
    {
        if ($administrasi->file && Storage::disk('public')->exists($administrasi->file)) {
            Storage::disk('public')->delete($administrasi->file);
        }
        
        $administrasi->delete();
        return redirect()->route('admin.administrasi.index')->with('success', 'Data administrasi berhasil dihapus.');
    }
}
