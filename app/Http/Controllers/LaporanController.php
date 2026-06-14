<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use App\Models\Administrasi;
use App\Models\Keuangan;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LaporanController extends Controller
{
    /**
     * Display laporan page
     */
    public function index()
    {
        return view('admin.laporan.index');
    }

    /**
     * Export kegiatan report to PDF
     */
    public function exportKegiatan(Request $request)
    {
        $query = Kegiatan::query();

        if ($request->filled('mulai') && $request->filled('sampai')) {
            $query->whereBetween('tanggal', [$request->mulai, $request->sampai]);
        } elseif ($request->filled('mulai')) {
            $query->where('tanggal', '>=', $request->mulai);
        } elseif ($request->filled('sampai')) {
            $query->where('tanggal', '<=', $request->sampai);
        }

        $kegiatan = $query->orderBy('tanggal', 'desc')->get();

        $pdf = Pdf::loadView('admin.laporan.pdf.kegiatan', [
            'kegiatan' => $kegiatan,
            'mulai' => $request->mulai,
            'sampai' => $request->sampai,
        ]);

        $pdf->setPaper('A4', 'landscape');

        return $pdf->stream('laporan-kegiatan.pdf');
    }

    /**
     * Export administrasi report to PDF
     */
    public function exportAdministrasi(Request $request)
    {
        $query = Administrasi::query();

        if ($request->filled('mulai') && $request->filled('sampai')) {
            $query->whereBetween('tanggal_surat', [$request->mulai, $request->sampai]);
        } elseif ($request->filled('mulai')) {
            $query->where('tanggal_surat', '>=', $request->mulai);
        } elseif ($request->filled('sampai')) {
            $query->where('tanggal_surat', '<=', $request->sampai);
        }

        $administrasi = $query->orderBy('tanggal_surat', 'desc')->get();

        $pdf = Pdf::loadView('admin.laporan.pdf.administrasi', [
            'administrasi' => $administrasi,
            'mulai' => $request->mulai,
            'sampai' => $request->sampai,
        ]);

        $pdf->setPaper('A4', 'landscape');

        return $pdf->stream('laporan-administrasi.pdf');
    }

    /**
     * Export keuangan report to PDF
     */
    public function exportKeuangan(Request $request)
    {
        $query = Keuangan::query();

        if ($request->filled('mulai') && $request->filled('sampai')) {
            $query->whereBetween('tanggal', [$request->mulai, $request->sampai]);
        } elseif ($request->filled('mulai')) {
            $query->where('tanggal', '>=', $request->mulai);
        } elseif ($request->filled('sampai')) {
            $query->where('tanggal', '<=', $request->sampai);
        }

        $keuangan = $query->orderBy('tanggal', 'desc')->get();

        // Calculate totals
        $totalDebit = $keuangan->sum('debit');
        $totalKredit = $keuangan->sum('kredit');
        $saldoAkhir = $totalDebit - $totalKredit;

        $pdf = Pdf::loadView('admin.laporan.pdf.keuangan', [
            'keuangan' => $keuangan,
            'mulai' => $request->mulai,
            'sampai' => $request->sampai,
            'totalDebit' => $totalDebit,
            'totalKredit' => $totalKredit,
            'saldoAkhir' => $saldoAkhir,
        ]);

        $pdf->setPaper('A4', 'landscape');

        return $pdf->stream('laporan-keuangan.pdf');
    }

    /**
     * Export anggota report to PDF
     */
    public function exportAnggota()
    {
        $anggota = DB::table('anggota')
            ->join('users', 'anggota.user_id', '=', 'users.id')
            ->select('anggota.*', 'users.name as user_name')
            ->orderBy('anggota.nama', 'asc')
            ->get();

        $pdf = Pdf::loadView('admin.laporan.pdf.anggota', [
            'anggota' => $anggota,
        ]);

        $pdf->setPaper('A4', 'landscape');

        return $pdf->stream('laporan-anggota.pdf');
    }

    /**
     * Export pengurus report to PDF
     */
    public function exportPengurus()
    {
        $pengurus = DB::table('pengurus')
            ->join('anggota', 'pengurus.anggota_id', '=', 'anggota.id')
            ->select('pengurus.*', 'anggota.nama', 'anggota.nim', 'anggota.telp')
            ->orderBy('pengurus.jabatan', 'asc')
            ->get();

        $pdf = Pdf::loadView('admin.laporan.pdf.pengurus', [
            'pengurus' => $pengurus,
        ]);

        $pdf->setPaper('A4', 'landscape');

        return $pdf->stream('laporan-pengurus.pdf');
    }
}
