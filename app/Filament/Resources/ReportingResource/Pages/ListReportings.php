<?php

namespace App\Filament\Resources\ReportingResource\Pages;

use App\Filament\Resources\ReportingResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListReportings extends ListRecords
{
    protected static string $resource = ReportingResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
