<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AksesoriResource\Pages;
use App\Models\Aksesori;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;

class AksesoriResource extends Resource
{
    protected static ?string $model = Aksesori::class;

    protected static ?string $navigationIcon = 'heroicon-o-cube';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nama_aksesoris')
                    ->label('Nama Aksesori')
                    ->placeholder('Contoh: Controller DualShock')
                    ->required()
                    ->maxLength(100),

                TextInput::make('deskripsi')
                    ->label('Deskripsi')
                    ->placeholder('Contoh: Aksesori tambahan untuk PlayStation')
                    ->required(),

                TextInput::make('harga')
                    ->label('Harga')
                    ->placeholder('Contoh: 250000')
                    ->required()
                    ->numeric(),

                TextInput::make('stok')
                    ->label('Stok')
                    ->placeholder('Contoh: 10')
                    ->required()
                    ->numeric(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama_aksesoris')
                    ->label('Nama Aksesori')
                    ->limit(50),

                TextColumn::make('deskripsi')
                    ->label('Deskripsi')
                    ->limit(100),

                TextColumn::make('harga')
                    ->label('Harga')
                    ->getStateUsing(fn (Aksesori $record): string => number_format($record->harga, 0, ',', '.')),

                TextColumn::make('stok')
                    ->label('Stok'),
            ])
            ->filters([
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAksesoris::route('/'),
            'create' => Pages\CreateAksesori::route('/create'),
            'edit' => Pages\EditAksesori::route('/{record}/edit'),
        ];
    }
}
