<?php

namespace Database\Seeders;

use App\Models\Kegiatan;
use App\Models\User;
use Illuminate\Database\Seeder;

class KegiatanSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::where('role', 'Admin')->first();

        if (!$admin) {
            $admin = User::first();
        }

        $data = [
            [
                'judul' => 'Pendakian Gunung Rinjani',
                'tanggal' => '2026-07-15',
                'lokasi' => 'Gunung Rinjani, Lombok, NTB',
                'penanggung_jawab' => 'Aditya Nugraha',
                'deskripsi' => 'Pendakian Gunung Rinjani dengan tujuan mencapai puncak.活动包括 sensibilisasi lingkungan dan pengamatan flora fauna.',
                'status' => 'Aktif',
                'user_id' => $admin->id,
            ],
            [
                'judul' => 'Seminar Konservasi Alam',
                'tanggal' => '2026-06-20',
                'lokasi' => 'Aula Utama Universitas',
                'penanggung_jawab' => 'Bella Safitri',
                'deskripsi' => 'Seminar tentang konservasi alam dan pelestarian lingkungan untuk mahasiswa.',
                'status' => 'Selesai',
                'user_id' => $admin->id,
            ],
            [
                'judul' => 'Gotong Royong Pantai',
                'tanggal' => '2026-08-10',
                'lokasi' => 'Pantai Kuta, Bali',
                'penanggung_jawab' => 'Candra Wirawan',
                'deskripsi' => 'Kegiatan bersih-bersih pantai dan edukasi tentang sampah plastik kepada pengunjung.',
                'status' => 'Aktif',
                'user_id' => $admin->id,
            ],
            [
                'judul' => 'Pelatihan Navigasi Darat',
                'tanggal' => '2026-06-25',
                'lokasi' => 'Hutan Lindung',
                'penanggung_jawab' => 'Dewi Lestari',
                'deskripsi' => 'Pelatihan navigasi menggunakan kompas dan peta untuk anggota MAPALA.',
                'status' => 'Selesai',
                'user_id' => $admin->id,
            ],
            [
                'judul' => 'Tree Planting Day',
                'tanggal' => '2026-09-05',
                'lokasi' => 'Gunung Bromo, Jawa Timur',
                'penanggung_jawab' => 'Eko Prasetyo',
                'deskripsi' => 'Penanaman 500 pohon endemic di kawasan Gunung Bromo.',
                'status' => 'Aktif',
                'user_id' => $admin->id,
            ],
            [
                'judul' => 'Workshop Fotografi Alam',
                'tanggal' => '2026-07-01',
                'lokasi' => 'Studio Kreatif Universitas',
                'penanggung_jawab' => 'Fitri Handayani',
                'deskripsi' => 'Workshop fotografi alam untuk dokumentasi kegiatan mountaineering.',
                'status' => 'Selesai',
                'user_id' => $admin->id,
            ],
            [
                'judul' => 'Rapat Koordinasi Anggota',
                'tanggal' => '2026-06-18',
                'lokasi' => 'Ruang Serbaguna MAPALA',
                'penanggung_jawab' => 'Aditya Nugraha',
                'deskripsi' => 'Rapat koordinasi untuk persiapan kegiatan semester berikutnya.',
                'status' => 'Batal',
                'user_id' => $admin->id,
            ],
            [
                'judul' => 'Ekspedisi Sumbing',
                'tanggal' => '2026-08-25',
                'lokasi' => 'Gunung Sumbing, Jawa Tengah',
                'penanggung_jawab' => 'Gilang Ramadhan',
                'deskripsi' => 'Ekspedisi mountaineering ke Gunung Sumbing dengan melewati jalur via Krasak.',
                'status' => 'Aktif',
                'user_id' => $admin->id,
            ],
            [
                'judul' => 'Sosialisasi Safety climbing',
                'tanggal' => '2026-07-10',
                'lokasi' => 'Lab Olahraga Universitas',
                'penanggung_jawab' => 'Hani Nurjanah',
                'deskripsi' => 'Sosialisasi dan simulasi safety climbing untuk pemula.',
                'status' => 'Selesai',
                'user_id' => $admin->id,
            ],
            [
                'judul' => 'Rapat Umum Tahunan',
                'tanggal' => '2026-12-15',
                'lokasi' => 'Aula Barat Universitas',
                'penanggung_jawab' => 'Aditya Nugraha',
                'deskripsi' => 'Rapat umum tahunan MAPALA untuk evaluasi dan perencanaan tahun depan.',
                'status' => 'Aktif',
                'user_id' => $admin->id,
            ],
            [
                'judul' => 'Kunjungan Wisata Alam',
                'tanggal' => '2026-10-20',
                'lokasi' => 'Taman Nasional Bromo Tengger Semeru',
                'penanggung_jawab' => 'Irfan Hakim',
                'deskripsi' => 'Kunjungan edukasi ke Taman Nasional untuk study comparative flora.',
                'status' => 'Aktif',
                'user_id' => $admin->id,
            ],
            [
                'judul' => 'Latihan Dasar Kepemimpinan',
                'tanggal' => '2026-11-05',
                'lokasi' => 'Camp MAPALA',
                'penanggung_jawab' => 'Jasmine Putri',
                'deskripsi' => 'Latihan dasar kepemimpinan outdoor untuk calon pengurus baru.',
                'status' => 'Aktif',
                'user_id' => $admin->id,
            ],
        ];

        foreach ($data as $item) {
            Kegiatan::create($item);
        }
    }
}