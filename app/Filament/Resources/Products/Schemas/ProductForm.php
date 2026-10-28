<?php

namespace App\Filament\Resources\Products\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ProductForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            TextInput::make('code')
                ->label('Kode Barang')
                ->required()
                ->unique(ignoreRecord: true),

            TextInput::make('name')
                ->label('Nama Barang')
                ->required(),

            TextInput::make('category')
                ->label('Kategori')
                ->required(),

            TextInput::make('unit')
                ->label('Satuan')
                ->required()
                ->default('pcs'),

            TextInput::make('stock')
                ->label('Stok Awal')
                ->numeric()
                ->integer()
                ->minValue(0)
                ->required()
                ->default(0),

            TextInput::make('minimum_stock')
                ->label('Stok Minimum')
                ->numeric()
                ->integer()
                ->minValue(0)
                ->required()
                ->default(10),

            TextInput::make('warehouse_location')
                ->label('Lokasi Gudang')
                ->placeholder('Contoh: Rak A-01'),
        ]);
    }
}
