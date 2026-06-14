<?php

namespace Database\Seeders;

use App\Models\Pengurus;
use Illuminate\Database\Seeder;

class PengurusSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'anggota_id' => 1,
                'jabatan' => 'Ketua Umum',
                'periode' => '2024-2026',
                'status' => 'aktif',
            ],
            [
                'anggota_id' => 2,
                'jabatan' => 'Sekretaris',
                'periode' => '2024-2026',
                'status' => 'aktif',
            ],
            [
                'anggota_id' => 3,
                'jabatan' => 'Bendahara',
                'periode' => '2024-2026',
                'status' => 'aktif',
            ],
            [
                'anggota_id' => 4,
                'jabatan' => 'Koordinator Divisi Pendakian',
                'periode' => '2024-2026',
                'status' => 'aktif',
            ],
            [
                'anggota_id' => 5,
                'jabatan' => 'Koordinator Divisi Lingkungan',
                'periode' => '2024-2026',
                'status' => 'nonaktif',
            ],
        ];

        foreach ($data as $item) {
            Pengurus::create($item);
        }
    }
}