<?php

namespace App\Filament\Resources\StokBarangResource\Pages;

use App\Filament\Resources\StokBarangResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;

class ListStokBarangs extends ListRecords
{
    protected static string $resource = StokBarangResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
    public function getTableBulkAction()
    {
        return  [
            ExportBulkAction::make()
        ];
    }
    protected function getHeaderWidgets(): array
    {
        return [
            StokBarangResource\Widgets\StokBarangOverview::class,
        ];
    }
}
