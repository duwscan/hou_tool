<?php

namespace App\Filament\Clusters\Faculty\Resources\GraduateStandardResource\Pages;

use App\Filament\Clusters\Faculty\Resources\GraduateStandardResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListGraduateStandards extends ListRecords
{
    protected static string $resource = GraduateStandardResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label('Thêm chuẩn đầu ra'),
        ];
    }

    public function getBreadcrumb(): ?string
    {
        return 'Danh sách';
    }
}
