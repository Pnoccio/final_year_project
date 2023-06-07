<?php

namespace App\Filament\Resources\FireMitigationActivitiesResource\Pages;

use App\Filament\Resources\FireMitigationActivitiesResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditFireMitigationActivities extends EditRecord
{
    protected static string $resource = FireMitigationActivitiesResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
