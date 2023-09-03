<?php

namespace App\Filament\Resources\UserResource\Pages;

use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\ActivityResource;

class ListActivities extends ListRecords
{
    protected static string $resource = ActivityResource::class;
}
