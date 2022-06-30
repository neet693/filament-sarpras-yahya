<?php

namespace App\Filament\Resources\StokBarangResource\Widgets;

use App\Models\Ruangan;
use App\Models\StokBarang;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class StokBarangOverview extends BaseWidget
{
    protected function getCards(): array
    {
        return [
            Card::make('Jumlah Ruangan', Ruangan::count())
                ->color('info')
                ->chart([7, 19, 10, 15, 4, 17, 4]),
            Card::make('Jumlah Barang Terinput', StokBarang::count())
                ->color('danger')
                ->chart([7, 19, 10, 3, 15, 4, 17]),
            Card::make('Jumlah Total Barang', StokBarang::sum('jumlah_barang'))
                ->color('success')
                ->chart([7, 10, 30, 15, 4, 17, 4]),

        ];
    }
}
