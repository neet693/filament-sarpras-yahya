<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KondisiResource\Pages;
use App\Filament\Resources\KondisiResource\RelationManagers;
use App\Models\Kondisi;
use Closure;
use Illuminate\Support\Str;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;



class KondisiResource extends Resource
{
    protected static ?string $model = Kondisi::class;
    protected static ?string $navigationIcon = 'heroicon-o-collection';
    protected static ?string $navigationGroup = 'Data Master';
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
                                TextInput::make('nama_kondisi')
                                    ->reactive()
                                    ->afterStateUpdated(function (Closure $set, $state) {
                                        $set('slug', Str::slug($state));
                                    })
                                    ->required()
                                    ->different('nama_kondisi')
                                    ->helperText('Nama Kondisi Tidak Boleh Double'),
                                TextInput::make('slug')->required()->helperText('Field akan Otomatis Terisi'),
                            ])
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama_kondisi')->sortable()->searchable(),
                TextColumn::make('slug')->sortable()->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListKondisis::route('/'),
            'create' => Pages\CreateKondisi::route('/create'),
            'edit' => Pages\EditKondisi::route('/{record:slug}/edit'),
        ];
    }
}
