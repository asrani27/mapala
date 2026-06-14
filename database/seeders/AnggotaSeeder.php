<?php

namespace Database\Seeders;

use App\Models\Anggota;
use App\Models\User;
use Illuminate\Database\Seeder;

class AnggotaSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'nim' => '20241001',
                'nama' => 'Aditya Nugraha',
                'jurusan' => 'Teknik Informatika',
                'angkatan' => '2024',
                'alamat' => 'Jl. Merbabu No. 12, Bandung',
                'telp' => '081234567891',
                'status' => 'Aktif',
                'tanggal_daftar' => '2024-09-01',
            ],
            [
                'nim' => '20241002',
                'nama' => 'Bella Safitri',
                'jurusan' => 'Biologi',
                'angkatan' => '2024',
                'alamat' => 'Jl. Krakatau No. 45, Malang',
                'telp' => '081234567892',
                'status' => 'Aktif',
                'tanggal_daftar' => '2024-09-02',
            ],
            [
                'nim' => '20231003',
                'nama' => 'Candra Wirawan',
                'jurusan' => 'Geografi',
                'angkatan' => '2023',
                'alamat' => 'Jl. Rinjani Gg. 3, Lombok',
                'telp' => '081234567893',
                'status' => 'Aktif',
                'tanggal_daftar' => '2023-09-05',
            ],
            [
                'nim' => '20231004',
                'nama' => 'Dewi Lestari',
                'jurusan' => 'Ilmu Lingkungan',
                'angkatan' => '2023',
                'alamat' => 'Jl. Semeru No. 78, Yogyakarta',
                'telp' => '081234567894',
                'status' => 'Aktif',
                'tanggal_daftar' => '2023-09-07',
            ],
            [
                'nim' => '20222005',
                'nama' => 'Eko Prasetyo',
                'jurusan' => 'Teknik Sipil',
                'angkatan' => '2022',
                'alamat' => 'Perum Bromo Indah Blok A5, Surabaya',
                'telp' => '081234567895',
                'status' => 'Aktif',
                'tanggal_daftar' => '2022-09-10',
            ],
            [
                'nim' => '20222006',
                'nama' => 'Fitri Handayani',
                'jurusan' => 'Kedokteran',
                'angkatan' => '2022',
                'alamat' => 'Jl. Agung No. 23, Denpasar',
                'telp' => '081234567896',
                'status' => 'Nonaktif',
                'tanggal_daftar' => '2022-09-12',
            ],
            [
                'nim' => '20212007',
                'nama' => 'Gilang Ramadhan',
                'jurusan' => 'Manajemen',
                'angkatan' => '2021',
                'alamat' => 'Jl. Kerinci No. 56, Padang',
                'telp' => '081234567897',
                'status' => 'Alumni',
                'tanggal_daftar' => '2021-09-15',
            ],
            [
                'nim' => '20212008',
                'nama' => 'Hani Nurjanah',
                'jurusan' => 'Pendidikan Biologi',
                'angkatan' => '2021',
                'alamat' => 'Jl. Lawu No. 89, Solo',
                'telp' => '081234567898',
                'status' => 'Alumni',
                'tanggal_daftar' => '2021-09-18',
            ],
            [
                'nim' => '20241009',
                'nama' => 'Irfan Hakim',
                'jurusan' => 'Teknik Mesin',
                'angkatan' => '2024',
                'alamat' => 'Jl. Pangrango No. 34, Bogor',
                'telp' => '081234567899',
                'status' => 'Aktif',
                'tanggal_daftar' => '2024-09-20',
            ],
            [
                'nim' => '20231010',
                'nama' => 'Jasmine Putri',
                'jurusan' => 'Arsitektur',
                'angkatan' => '2023',
                'alamat' => 'Jl. Sumbing No. 67, Semarang',
                'telp' => '081234567800',
                'status' => 'Aktif',
                'tanggal_daftar' => '2023-09-25',
            ],
        ];

        foreach ($data as $item) {
            $user = User::create([
                'name' => $item['nama'],
                'username' => $item['nim'],
                'email' => $item['nim'] . '@mapala.com',
                'password' => bcrypt($item['nim']),
                'role' => 'Anggota',
            ]);

            $item['user_id'] = $user->id;
            Anggota::create($item);
        }
    }
}
