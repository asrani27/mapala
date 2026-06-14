<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Anggota extends Model
{
    protected $table = 'anggota';

    protected $fillable = [
        'nim', 'nama', 'jurusan', 'angkatan',
        'alamat', 'foto', 'telp', 'status', 'tanggal_daftar', 'user_id',
    ];

    protected function casts(): array
    {
        return [
            'tanggal_daftar' => 'date',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
