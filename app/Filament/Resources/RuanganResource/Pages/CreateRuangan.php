<?php

namespace App\Filament\Resources\RuanganResource\Pages;

use App\Filament\Resources\RuanganResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateRuangan extends CreateRecord
{
    protected static string $resource = RuanganResource::class;

    protected function getCreatedNotificationMessage(): ?string
    {
        return 'Berhasil Menambahkan Ruangan';
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
