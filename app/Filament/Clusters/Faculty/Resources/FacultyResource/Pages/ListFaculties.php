<?php

namespace App\Filament\Clusters\Faculty\Resources\FacultyResource\Pages;

use App\Filament\Clusters\Faculty\Resources\FacultyResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListFaculties extends ListRecords
{
    protected static string $resource = FacultyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label('Thêm Khoa'),
        ];
    }

    public function getBreadcrumb(): ?string
    {
        return 'Danh sách';
    }
}
