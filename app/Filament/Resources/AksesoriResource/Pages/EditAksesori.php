<?php

namespace App\Filament\Resources\AksesoriResource\Pages;

use App\Filament\Resources\AksesoriResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAksesori extends EditRecord
{
    protected static string $resource = AksesoriResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
