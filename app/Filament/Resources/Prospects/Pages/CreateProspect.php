<?php

namespace App\Filament\Resources\Prospects\Pages;

use App\Filament\Resources\Prospects\ProspectResource;
use Filament\Resources\Pages\CreateRecord;

class CreateProspect extends CreateRecord
{
    protected static string $resource = ProspectResource::class;

    protected static ?string $title = 'Tambah Prospek Pelanggan';

    protected function getCreatedNotificationTitle(): ?string
    {
        return 'Prospek pelanggan berhasil ditambahkan';
    }
}