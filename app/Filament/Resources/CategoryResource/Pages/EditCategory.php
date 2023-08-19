<?php

namespace App\Filament\Resources\CategoryResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\CategoryResource;

class EditCategory extends EditRecord
{
    protected static string $resource = CategoryResource::class;

    protected function getHeaderActions() : array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function mutateFormDataBeforeFill(array $data) : array
    {
        $data['description'] = $this->record->getRawOriginal('description');
        $data['long_description'] = $this->record->getRawOriginal('long_description');
        $data['content'] = $this->record->getRawOriginal('content');

        return $data;
    }
}
