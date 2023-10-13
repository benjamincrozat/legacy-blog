<?php

namespace App\Filament\Resources\OpeningResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\OpeningResource;

class ListOpenings extends ListRecords
{
    protected static string $resource = OpeningResource::class;

    protected function getHeaderActions() : array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
