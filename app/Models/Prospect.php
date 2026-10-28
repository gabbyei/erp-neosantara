<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prospect extends Model
{
    protected $fillable = [
        'company_name',
        'contact_name',
        'email',
        'phone',
        'source',
        'status',
        'follow_up_date',
        'notes',
        'potential_value',
    ];

    protected function casts(): array
    {
        return [
            'follow_up_date' => 'date',
            'potential_value' => 'decimal:2',
        ];
    }
}