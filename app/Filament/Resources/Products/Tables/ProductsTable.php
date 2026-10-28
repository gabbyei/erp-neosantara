<?php

namespace App\Filament\Resources\Products\Tables;

//use App\Models\Product;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ProductsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('code')
                    ->label('Kode Barang')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('name')
                    ->label('Nama Barang')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('category')
                    ->label('Kategori')
                    ->searchable(),

                TextColumn::make('stock')
                    ->label('Stok')
                    ->numeric()
                    ->sortable(),

                TextColumn::make('unit')
                    ->label('Satuan'),

                TextColumn::make('minimum_stock')
                    ->label('Stok Minimum'),

                TextColumn::make('warehouse_location')
                    ->label('Lokasi Gudang')
                    ->placeholder('-'),

                TextColumn::make('stock_status')
                    ->label('Status Stok')
                    ->badge()
                    ->color(fn (string $state): string =>
                        $state === 'Menipis' ? 'danger' : 'success'
                    ),
            ])
            ->defaultSort('name')
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([]);
    }
}
