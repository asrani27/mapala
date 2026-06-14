<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('anggota', function (Blueprint $table) {
            $table->id();
            $table->string('nim', 20)->unique();
            $table->string('nama', 100);
            $table->string('jurusan', 100);
            $table->string('angkatan', 10);
            $table->text('alamat')->nullable();
            $table->string('telp', 20)->nullable();
            $table->enum('status', ['Aktif', 'Nonaktif', 'Alumni'])->default('Aktif');
            $table->date('tanggal_daftar');
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('anggota');
    }
};
