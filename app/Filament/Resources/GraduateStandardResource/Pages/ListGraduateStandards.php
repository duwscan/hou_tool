<?php

namespace App\Filament\Resources\GraduateStandardResource\Pages;

use App\Filament\HasParentResource;
use App\Filament\Resources\GraduateStandardResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListGraduateStandards extends ListRecords
{
    protected static string $resource = GraduateStandardResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    public function getBreadcrumb(): ?string
    {
        return 'Danh sách';
    }

}
