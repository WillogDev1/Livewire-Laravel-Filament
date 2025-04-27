<?php

namespace App\Filament\Resources\ShieldResource\Pages;

use App\Filament\Resources\ShieldResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListShields extends ListRecords
{
    protected static string $resource = ShieldResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
