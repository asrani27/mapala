<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Administrator',
            'username' => 'admin',
            'email' => 'admin@mapala.com',
            'password' => bcrypt('admin'),
            'role' => 'Admin',
        ]);

        $this->call([
            AnggotaSeeder::class,
            PengurusSeeder::class,
            KegiatanSeeder::class,
            AdministrasiSeeder::class,
            KeuanganSeeder::class,
        ]);
    }
}
