<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KurirResource\Pages;
use App\Models\Kurir;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;

class KurirResource extends Resource
{
    protected static ?string $model = Kurir::class;

    protected static ?string $navigationIcon = 'heroicon-o-truck';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nama_kurir')
                    ->label('Nama Kurir')
                    ->placeholder('Contoh: John Courier')
                    ->required()
                    ->maxLength(100), // Menambahkan validasi panjang maksimum untuk nama kurir

                TextInput::make('email')
                    ->label('Email')
                    ->email() // Menegaskan tipe data sebagai email
                    ->placeholder('Contoh: kurir@example.com')
                    ->required()
                    ->maxLength(150), // Validasi panjang email

                TextInput::make('nomor_telepon')
                    ->label('Nomor Telepon')
                    ->placeholder('Contoh: 081234567890')
                    ->required()
                    ->maxLength(20) // Validasi panjang nomor telepon
                    ->tel(), // Menggunakan tipe tel untuk membantu validasi browser

                TextInput::make('alamat')
                    ->label('Alamat')
                    ->placeholder('Contoh: Jl. Merdeka No. 5, Bandung')
                    ->required() // Menjadikan field alamat sebagai wajib
                    ->maxLength(255), // Validasi panjang maksimum untuk alamat
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama_kurir')
                    ->label('Nama Kurir')
                    ->limit(50)
                    ->sortable()
                    ->searchable(),
                TextColumn::make('email')
                    ->label('Email')
                    ->sortable()
                    ->searchable()
                    ->formatStateUsing(fn(string $state): string => strtolower($state)),
                TextColumn::make('nomor_telepon')
                    ->label('Nomor Telepon')
                    ->limit(20)
                    ->sortable()
                    ->formatStateUsing(fn(string $state): string => "+62 " . substr($state, 1)),
                TextColumn::make('alamat')
                    ->label('Alamat')
                    ->limit(100)
                    ->sortable()
                    ->searchable(),
            ])
            ->filters([
                //
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
            'index' => Pages\ListKurirs::route('/'),
            'create' => Pages\CreateKurir::route('/create'),
            'edit' => Pages\EditKurir::route('/{record}/edit'),
        ];
    }
}
