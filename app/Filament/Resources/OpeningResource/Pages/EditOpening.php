<?php

namespace App\Filament\Resources\OpeningResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\OpeningResource;

class EditOpening extends EditRecord
{
    protected static string $resource = OpeningResource::class;

    protected function getHeaderActions() : array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
