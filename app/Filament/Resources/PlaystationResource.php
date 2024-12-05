<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PlaystationResource\Pages;
use App\Models\Playstation;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PlaystationResource extends Resource
{
    protected static ?string $model = Playstation::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('Jenis')
                    ->label('jenis')
                    ->placeholder('Contoh: PS5')
                    ->required(),

                TextInput::make('Spesifikasi')
                    ->label('Spesifikasi')
                    ->placeholder('Contoh: RAM 16GB, 1TB Storage')
                    ->required(),

                TextInput::make('TarifHarian')
                    ->label('Tarif Harian')
                    ->placeholder('Contoh: 100000')
                    ->required()
                    ->numeric(),

                Forms\Components\FileUpload::make('Foto')
                    ->label('Foto PlayStation')
                    ->image()
                    ->directory('uploads/playstations')
                    ->required(),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('Foto')
                    ->label('Foto')
                    ->rounded(),

                TextColumn::make('Jenis')
                    ->label('jenis')
                    ->limit(100)
                    ->searchable(),


                TextColumn::make('spesifikasi')
                    ->limit(1000)
                    ->searchable(),

                TextColumn::make('TarifHarian')
                    ->label('Tarif Harian')
                    ->getStateUsing(fn(Playstation $record) => number_format($record->TarifHarian, 0, ',', '.'))
            ])
            ->filters([ //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListPlaystations::route('/'),
            'create' => Pages\CreatePlaystation::route('/create'),
            'edit' => Pages\EditPlaystation::route('/{record}/edit'),
        ];
    }
}
