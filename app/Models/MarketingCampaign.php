<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MarketingCampaign extends Model
{
    protected $fillable = [
        'kode_kampanye',
        'nama_kampanye',
        'jenis_promosi',
        'deskripsi',
        'tanggal_mulai',
        'tanggal_selesai',
        'anggaran',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'tanggal_mulai' => 'date',
            'tanggal_selesai' => 'date',
            'anggaran' => 'decimal:2',
        ];
    }
}