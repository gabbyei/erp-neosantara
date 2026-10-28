<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'code',
        'name',
        'category',
        'unit',
        'stock',
        'minimum_stock',
        'warehouse_location',
    ];

    protected function casts(): array
    {
        return [
            'stock' => 'integer',
            'minimum_stock' => 'integer',
        ];
    }

    public function getStockStatusAttribute(): string
    {
        return $this->stock <= $this->minimum_stock
            ? 'Menipis'
            : 'Aman';
    }
}
