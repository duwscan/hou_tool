<?php

namespace App\Filament\Clusters\Faculty\Resources\ProgramResource\Pages;

use App\Filament\Clusters\Faculty\Resources\ProgramResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Contracts\View\View;

class ListPrograms extends ListRecords
{
    protected static string $resource = ProgramResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label('Thêm Chương Trình Đào Tạo'),
        ];
    }

    public function getBreadcrumb(): ?string
    {
        return 'Danh sách';
    }

}
