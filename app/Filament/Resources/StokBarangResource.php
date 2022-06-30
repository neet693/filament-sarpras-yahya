<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StokBarangResource\Pages;
use App\Filament\Resources\StokBarangResource\RelationManagers;
use App\Models\StokBarang;
use Closure;
use Illuminate\Support\Str;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
// use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;
use pxlrbt\FilamentExcel\Actions\ExportAction;
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;

class StokBarangResource extends Resource
{
    protected static ?string $model = StokBarang::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $recordRouteKeyName = 'slug';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make()
                    ->schema([
                        Card::make()
                            ->columns(2)
                            ->schema([
                                TextInput::make('nama_barang')
                                    ->reactive()
                                    ->afterStateUpdated(function (Closure $set, $state) {
                                        $set('slug', Str::slug($state));
                                    })
                                    ->required()
                                    ->helperText('Data Tidak Boleh Double'),
                                TextInput::make('slug')->required()->helperText('Field akan Otomatis Terisi'),
                                Select::make('ruangan_id')
                                    ->relationship('ruangan', 'nama_ruangan'),
                                TextInput::make('jumlah_barang')->mask(fn (TextInput\Mask $mask) => $mask->numeric())->required(),
                                Select::make('kondisi_awal')
                                    ->options([
                                        'Baik' => 'Baik',
                                        'Cacat' => 'Cacat',
                                        'Rusak' => 'Rusak',
                                    ]),
                                Select::make('kondisi_id')
                                    ->relationship('kondisi', 'nama_kondisi'),
                                RichEditor::make('keterangan')
                            ])
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama_barang')->sortable()->searchable(),
                TextColumn::make('kondisi_awal')->sortable()->searchable(),
                TextColumn::make('kondisi.nama_kondisi')->label('Kondisi Akhir')->sortable()->searchable(),
                TextColumn::make('jumlah_barang')->sortable()->searchable(),
                TextColumn::make('ruangan.nama_ruangan')->sortable()->searchable(),
                TextColumn::make('keterangan')->sortable()->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
                ExportBulkAction::make()
                    ->label('Export Data')
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListStokBarangs::route('/'),
            'create' => Pages\CreateStokBarang::route('/create'),
            'edit' => Pages\EditStokBarang::route('/{record:slug}/edit'),
        ];
    }

    public static function getWidgets(): array
    {
        return [
            Widgets\StokBarangOverview::class,
        ];
    }
}
