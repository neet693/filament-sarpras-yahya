<?php

namespace App\Filament\Resources\StokBarangResource\Pages;

use App\Filament\Resources\StokBarangResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditStokBarang extends EditRecord
{
    protected static string $resource = StokBarangResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
    protected function getCreatedNotificationMessage(): ?string
    {
        return 'Berhasil Mengedit Barang';
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
