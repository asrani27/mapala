<?php

namespace App\Http\Controllers;

use App\Models\Keuangan;
use Illuminate\Http\Request;

class KeuanganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->get('search');

        // Get all data first to calculate proper running saldo (newest first)
        $allKeuangan = Keuangan::orderBy('tanggal', 'desc')
            ->orderBy('id', 'desc')
            ->when($search, function ($query) use ($search) {
                $query->where('keterangan', 'like', '%' . $search . '%');
            })
            ->get();

        // Calculate running saldo for ALL transactions (ascending to get cumulative)
        // Then we'll display in descending order but use ascending saldo
        $runningSaldo = 0;
        $saldoMap = [];
        $ascendingData = $allKeuangan->sortBy(function ($item) {
            return [$item->tanggal, $item->id];
        });
        foreach ($ascendingData as $item) {
            $runningSaldo += $item->debit - $item->kredit;
            $saldoMap[$item->id] = $runningSaldo;
        }
        $currentSaldo = $runningSaldo; // This is the latest balance

        // Get total count before pagination
        $total = $allKeuangan->count();

        // Paginate the data
        $perPage = 10;
        $currentPage = $request->get('page', 1);
        
        // Get items for current page
        $itemsForPage = $allKeuangan->forPage($currentPage, $perPage);
        
        // Map to plain objects with saldo to avoid Eloquent overriding the attribute
        $mappedItems = $itemsForPage->map(function ($item) use ($saldoMap) {
            return (object) [
                'id' => $item->id,
                'tanggal' => $item->tanggal,
                'keterangan' => $item->keterangan,
                'debit' => $item->debit,
                'kredit' => $item->kredit,
                'saldo' => $saldoMap[$item->id] ?? 0,
            ];
        });

        // Create paginator with mapped items
        $keuangans = new \Illuminate\Pagination\LengthAwarePaginator(
            $mappedItems,
            $total,
            $perPage,
            $currentPage,
            ['path' => url()->current()]
        );

        return view('admin.keuangan.index', compact('keuangans', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.keuangan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'tanggal' => 'required|date',
            'keterangan' => 'required|string|max:255',
            'debit' => 'nullable|numeric|min:0',
            'kredit' => 'nullable|numeric|min:0',
        ]);

        // Ensure at least one of debit or kredit has value
        if (empty($validated['debit']) && empty($validated['kredit'])) {
            return back()->withErrors(['general' => 'Debit atau Kredit harus diisi.'])->withInput();
        }

        // Set default to 0 if empty
        $validated['debit'] = $validated['debit'] ?? 0;
        $validated['kredit'] = $validated['kredit'] ?? 0;

        Keuangan::create($validated);

        return redirect()->route('admin.keuangan.index')
            ->with('success', 'Data keuangan berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Keuangan $keuangan)
    {
        // Calculate saldo up to this record
        $saldo = Keuangan::where('tanggal', '<', $keuangan->tanggal)
            ->orWhere(function ($query) use ($keuangan) {
                $query->where('tanggal', '=', $keuangan->tanggal)
                    ->where('id', '<', $keuangan->id);
            })
            ->selectRaw('COALESCE(SUM(debit), 0) - COALESCE(SUM(kredit), 0) as saldo')
            ->value('saldo');

        $saldo += $keuangan->debit - $keuangan->kredit;
        $keuangan->saldo = $saldo;

        return view('admin.keuangan.show', compact('keuangan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Keuangan $keuangan)
    {
        return view('admin.keuangan.edit', compact('keuangan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Keuangan $keuangan)
    {
        $validated = $request->validate([
            'tanggal' => 'required|date',
            'keterangan' => 'required|string|max:255',
            'debit' => 'nullable|numeric|min:0',
            'kredit' => 'nullable|numeric|min:0',
        ]);

        // Ensure at least one of debit or kredit has value
        if (empty($validated['debit']) && empty($validated['kredit'])) {
            return back()->withErrors(['general' => 'Debit atau Kredit harus diisi.'])->withInput();
        }

        // Set default to 0 if empty
        $validated['debit'] = $validated['debit'] ?? 0;
        $validated['kredit'] = $validated['kredit'] ?? 0;

        $keuangan->update($validated);

        return redirect()->route('admin.keuangan.index')
            ->with('success', 'Data keuangan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Keuangan $keuangan)
    {
        $keuangan->delete();

        return redirect()->route('admin.keuangan.index')
            ->with('success', 'Data keuangan berhasil dihapus.');
    }
}