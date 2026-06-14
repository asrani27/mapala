<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('anggota', function (Blueprint $table) {
            $table->string('foto', 255)->nullable()->after('alamat');
        });

        Schema::table('pengurus', function (Blueprint $table) {
            $table->string('foto', 255)->nullable()->after('status');
        });

        Schema::table('kegiatan', function (Blueprint $table) {
            $table->string('foto', 255)->nullable()->after('deskripsi');
        });
    }

    public function down(): void
    {
        Schema::table('anggota', function (Blueprint $table) {
            $table->dropColumn('foto');
        });

        Schema::table('pengurus', function (Blueprint $table) {
            $table->dropColumn('foto');
        });

        Schema::table('kegiatan', function (Blueprint $table) {
            $table->dropColumn('foto');
        });
    }
};
