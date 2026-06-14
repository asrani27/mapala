<?php

namespace Database\Seeders;

use App\Models\Administrasi;
use App\Models\User;
use Illuminate\Database\Seeder;

class AdministrasiSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::where('role', 'Admin')->first();

        if (!$admin) {
            $admin = User::first();
        }

        $data = [
            [
                'nomor_surat' => '001/MAPALA/VI/2026',
                'jenis_surat' => 'Surat Undangan',
                'tanggal_surat' => '2026-06-01',
                'perihal' => 'Undangan Rapat Bulanan',
                'keterangan' => 'Undangan rapat untuk membahas program kerja bulan Juni 2026',
                'user_id' => $admin->id,
            ],
            [
                'nomor_surat' => '002/MAPALA/VI/2026',
                'jenis_surat' => 'Surat Keterangan',
                'tanggal_surat' => '2026-06-03',
                'perihal' => 'Keterangan Aktif Organisasi',
                'keterangan' => 'Surat keterangan bahwa MAPALA merupakan organisasi resmi di lingkungan kampus',
                'user_id' => $admin->id,
            ],
            [
                'nomor_surat' => '003/MAPALA/VI/2026',
                'jenis_surat' => 'Surat Permohonan',
                'tanggal_surat' => '2026-06-05',
                'perihal' => 'Permohonan Izin Kegiatan Pendakian',
                'keterangan' => 'Permohonan izin untuk kegiatan pendakian Gunung Rinjani pada tanggal 15-17 Juni 2026',
                'user_id' => $admin->id,
            ],
            [
                'nomor_surat' => '004/MAPALA/VI/2026',
                'jenis_surat' => 'Surat Undangan',
                'tanggal_surat' => '2026-06-08',
                'perihal' => 'Undangan Pelantikan Pengurus Baru',
                'keterangan' => 'Undangan pelantikan pengurus MAPALA periode 2026-2028',
                'user_id' => $admin->id,
            ],
            [
                'nomor_surat' => '005/MAPALA/VI/2026',
                'jenis_surat' => 'Surat Pemberitahuan',
                'tanggal_surat' => '2026-06-10',
                'perihal' => 'Pemberitahuan Pendaftaran Anggota Baru',
                'keterangan' => 'Pemberitahuan pembukaan pendaftaran anggota baru MAPALA semester ganjil 2026',
                'user_id' => $admin->id,
            ],
            [
                'nomor_surat' => '006/MAPALA/VI/2026',
                'jenis_surat' => 'Surat Rekomendasi',
                'tanggal_surat' => '2026-06-12',
                'perihal' => 'Rekomendasi Kegiatan Ekspedisi',
                'keterangan' => 'Rekomendasi untuk kegiatan ekspedisi pendakian Gunung Tambora',
                'user_id' => $admin->id,
            ],
            [
                'nomor_surat' => '007/MAPALA/VI/2026',
                'jenis_surat' => 'Surat Permohonan',
                'tanggal_surat' => '2026-06-14',
                'perihal' => 'Permohonan Dana Kegiatan',
                'keterangan' => 'Permohonan dana untuk kegiatan latihan rutin bulanan',
                'user_id' => $admin->id,
            ],
            [
                'nomor_surat' => '008/MAPALA/VI/2026',
                'jenis_surat' => 'Surat Keterangan',
                'tanggal_surat' => '2026-06-15',
                'perihal' => 'Keterangan Kepengurusan',
                'keterangan' => 'Keterangan daftar kepengurusan MAPALA untuk keperluan administrasi kampus',
                'user_id' => $admin->id,
            ],
            [
                'nomor_surat' => '009/MAPALA/VI/2026',
                'jenis_surat' => 'Surat Undangan',
                'tanggal_surat' => '2026-06-18',
                'perihal' => 'Undangan Seminar Pendakian',
                'keterangan' => 'Undangan seminar tentang keamanan pendakian dan penyelamatan di gunung',
                'user_id' => $admin->id,
            ],
            [
                'nomor_surat' => '010/MAPALA/VI/2026',
                'jenis_surat' => 'Surat Pemberitahuan',
                'tanggal_surat' => '2026-06-20',
                'perihal' => 'Pemberitahuan Jadwal Latihan',
                'keterangan' => 'Pemberitahuan jadwal latihan rutin setiap hari Sabtu minggu pertama',
                'user_id' => $admin->id,
            ],
        ];

        foreach ($data as $item) {
            Administrasi::create($item);
        }
    }
}
