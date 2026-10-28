<?php

namespace App\Filament\Resources\MarketingCampaigns\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class MarketingCampaignForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('kode_kampanye')
                    ->label('Kode Kampanye')
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->maxLength(255),

                TextInput::make('nama_kampanye')
                    ->label('Nama Kampanye')
                    ->required()
                    ->maxLength(255),

                Select::make('jenis_promosi')
                    ->label('Jenis Promosi')
                    ->options([
                        'Diskon' => 'Diskon',
                        'Bundling' => 'Bundling',
                        'Iklan' => 'Iklan',
                        'Event' => 'Event',
                        'Lainnya' => 'Lainnya',
                    ])
                    ->required(),

                Textarea::make('deskripsi')
                    ->label('Deskripsi Kampanye')
                    ->rows(3)
                    ->columnSpanFull(),

                DatePicker::make('tanggal_mulai')
                    ->label('Tanggal Mulai')
                    ->required(),

                DatePicker::make('tanggal_selesai')
                    ->label('Tanggal Selesai')
                    ->afterOrEqual('tanggal_mulai'),

                TextInput::make('anggaran')
                    ->label('Anggaran (Rp)')
                    ->numeric()
                    ->minValue(0)
                    ->default(0)
                    ->required(),

                Select::make('status')
                    ->label('Status Kampanye')
                    ->options([
                        'direncanakan' => 'Direncanakan',
                        'aktif' => 'Aktif',
                        'selesai' => 'Selesai',
                        'dibatalkan' => 'Dibatalkan',
                    ])
                    ->default('direncanakan')
                    ->required(),
            ]);
    }
}