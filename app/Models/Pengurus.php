<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pengurus extends Model
{
    protected $table = 'pengurus';

    protected $fillable = [
        'anggota_id', 'jabatan', 'periode', 'status', 'foto',
    ];

    public function anggota(): BelongsTo
    {
        return $this->belongsTo(Anggota::class);
    }
}