<?php

namespace App\Filament\Resources\Prospects\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ProspectForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informasi Prospek')
                    ->schema([
                        TextInput::make('company_name')
                            ->label('Nama Perusahaan')
                            ->required()
                            ->maxLength(255),

                        TextInput::make('contact_name')
                            ->label('Nama Kontak')
                            ->required()
                            ->maxLength(255),

                        TextInput::make('email')
                            ->label('Email')
                            ->email()
                            ->maxLength(255),

                        TextInput::make('phone')
                            ->label('Nomor Telepon')
                            ->tel()
                            ->maxLength(30),

                        Select::make('source')
                            ->label('Sumber Prospek')
                            ->options([
                                'website' => 'Website',
                                'sosial_media' => 'Media Sosial',
                                'referensi' => 'Referensi',
                                'telepon' => 'Telepon',
                                'lainnya' => 'Lainnya',
                            ])
                            ->searchable(),

                        Select::make('status')
                            ->label('Status')
                            ->options([
                                'baru' => 'Baru',
                                'dihubungi' => 'Dihubungi',
                                'negosiasi' => 'Negosiasi',
                                'berhasil' => 'Berhasil',
                                'gagal' => 'Gagal',
                            ])
                            ->default('baru')
                            ->required(),

                        DatePicker::make('follow_up_date')
                            ->label('Tanggal Tindak Lanjut'),

                        TextInput::make('potential_value')
                            ->label('Nilai Potensial')
                            ->numeric()
                            ->prefix('Rp')
                            ->minValue(0),

                        Textarea::make('notes')
                            ->label('Catatan')
                            ->rows(4)
                            ->columnSpanFull(),
                    ])
                    ->columns(2),
            ]);
    }
}