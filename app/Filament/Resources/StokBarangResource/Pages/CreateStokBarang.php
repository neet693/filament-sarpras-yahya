<?php

namespace App\Filament\Resources\StokBarangResource\Pages;

use App\Filament\Resources\StokBarangResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateStokBarang extends CreateRecord
{
    protected static string $resource = StokBarangResource::class;


    protected function getCreatedNotificationMessage(): ?string
    {
        return 'Berhasil Menambahkan Barang';
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
