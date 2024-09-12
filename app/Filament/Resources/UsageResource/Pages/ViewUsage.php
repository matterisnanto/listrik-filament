<?php

namespace App\Filament\Resources\UsageResource\Pages;

use App\Filament\Resources\UsageResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewUsage extends ViewRecord
{
    protected static string $resource = UsageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
