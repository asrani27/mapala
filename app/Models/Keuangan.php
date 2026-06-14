<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keuangan extends Model
{
    use HasFactory;

    protected $fillable = [
        'tanggal',
        'keterangan',
        'debit',
        'kredit',
    ];

    protected $casts = [
        'tanggal' => 'date',
        'debit' => 'decimal:2',
        'kredit' => 'decimal:2',
    ];

    public function getSaldoAttribute()
    {
        return $this->debit - $this->kredit;
    }
}
