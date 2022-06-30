<?php

namespace App\Filament\Resources\KondisiResource\Pages;

use App\Filament\Resources\KondisiResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditKondisi extends EditRecord
{
    protected static string $resource = KondisiResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function getCreatedNotificationMessage(): ?string
    {
        return 'Berhasil Mengedit Kondisi';
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
