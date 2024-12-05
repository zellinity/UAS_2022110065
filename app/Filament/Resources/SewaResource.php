<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SewaResource\Pages;
use App\Filament\Resources\SewaResource\RelationManagers;
use App\Models\Sewa;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SewaResource extends Resource
{
    protected static ?string $model = Sewa::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('pelanggan_id')
                ->relationship('pelanggan', 'nama_pelanggan')
                ->required(),

            Forms\Components\Select::make('playstation_id')
                ->relationship('playstation', 'jenis')
                ->required(),

            Forms\Components\Select::make('kurir_id')
                ->relationship('kurir', 'nama_kurir'),

            Forms\Components\DatePicker::make('tanggal_sewa')->required(),
            Forms\Components\DatePicker::make('tanggal_kembali'),
            Forms\Components\TextInput::make('total_harga')->numeric()->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('pelanggan.nama_pelanggan'),
                Tables\Columns\TextColumn::make('playstation.jenis'),
                Tables\Columns\TextColumn::make('kurir.nama_kurir')->sortable(),
                Tables\Columns\TextColumn::make('tanggal_sewa')->date(),
                Tables\Columns\TextColumn::make('total_harga')->money('IDR'),            ])
            ->filters([
                //
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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSewas::route('/'),
            'create' => Pages\CreateSewa::route('/create'),
            'edit' => Pages\EditSewa::route('/{record}/edit'),
        ];
    }
}
