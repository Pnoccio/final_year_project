<?php

namespace App\Filament\Resources\FireMitigationActivitiesResource\Pages;

use App\Filament\Resources\FireMitigationActivitiesResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListFireMitigationActivities extends ListRecords
{
    protected static string $resource = FireMitigationActivitiesResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
