<?php

namespace App\Filament\Resources\ShieldResource\Pages;

use App\Filament\Resources\ShieldResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditShield extends EditRecord
{
    protected static string $resource = ShieldResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
