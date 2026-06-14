<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Administrasi extends Model
{
    protected $table = 'administrasi';

    protected $fillable = [
        'nomor_surat', 'jenis_surat', 'tanggal_surat', 'perihal', 'keterangan', 'file', 'user_id',
    ];

    protected function casts(): array
    {
        return [
            'tanggal_surat' => 'date',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
