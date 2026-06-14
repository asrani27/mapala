<?php

namespace Database\Seeders;

use App\Models\Keuangan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KeuanganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'tanggal' => '2026-01-05',
                'keterangan' => 'Pendaftaran Anggota Baru',
                'debit' => 500000,
                'kredit' => 0,
            ],
            [
                'tanggal' => '2026-01-15',
                'keterangan' => 'Iuran Bulanan Anggota',
                'debit' => 1200000,
                'kredit' => 0,
            ],
            [
                'tanggal' => '2026-01-20',
                'keterangan' => 'Sumbangan Sponsor',
                'debit' => 2000000,
                'kredit' => 0,
            ],
            [
                'tanggal' => '2026-02-10',
                'keterangan' => 'Pembelian Peralatan Pendakian',
                'debit' => 0,
                'kredit' => 750000,
            ],
            [
                'tanggal' => '2026-02-20',
                'keterangan' => 'Biaya Transportasi Kegiatan',
                'debit' => 0,
                'kredit' => 350000,
            ],
        ];

        foreach ($data as $item) {
            Keuangan::create($item);
        }
    }
}