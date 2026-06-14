<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('kegiatan', function (Blueprint $table) {
            $table->id();
            $table->string('judul', 200);
            $table->date('tanggal');
            $table->string('lokasi', 200);
            $table->string('penanggung_jawab', 100);
            $table->text('deskripsi')->nullable();
            $table->enum('status', ['Aktif', 'Selesai', 'Batal'])->default('Aktif');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kegiatan');
    }
};