<?php

namespace App\Filament\Widgets;

use App\Models\Product;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StockOverview extends BaseWidget
{
    protected static ?int $sort = 1;

    protected function getStats(): array
    {
        return [
            Stat::make('Total Jenis Barang', Product::count())
                ->description('Barang terdaftar di gudang')
                ->descriptionIcon('heroicon-m-archive-box')
                ->color('primary'),

            Stat::make(
                'Total Unit Stok',
                number_format((int) Product::sum('stock'))
            )
                ->description('Jumlah seluruh unit barang')
                ->descriptionIcon('heroicon-m-cube')
                ->color('success'),

            Stat::make(
                'Stok Menipis',
                Product::whereColumn(
                    'stock',
                    '<=',
                    'minimum_stock'
                )->count()
            )
                ->description('Barang yang perlu diperiksa')
                ->descriptionIcon('heroicon-m-exclamation-triangle')
                ->color('danger'),
        ];
    }
}
