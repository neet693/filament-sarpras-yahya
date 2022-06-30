<?php

namespace App\Filament\Resources\KondisiResource\Pages;

use App\Filament\Resources\KondisiResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateKondisi extends CreateRecord
{
    protected static string $resource = KondisiResource::class;


    protected function getCreatedNotificationMessage(): ?string
    {
        return 'Berhasil Menambahkan Kondisi';
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
