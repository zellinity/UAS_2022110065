<?php

namespace App\Filament\Resources\AksesoriResource\Pages;

use App\Filament\Resources\AksesoriResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAksesoris extends ListRecords
{
    protected static string $resource = AksesoriResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
