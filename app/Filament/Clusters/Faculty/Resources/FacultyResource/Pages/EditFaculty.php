<?php

namespace App\Filament\Clusters\Faculty\Resources\FacultyResource\Pages;

use App\Filament\Clusters\Faculty\Resources\FacultyResource;
use App\HandleCrudFilament;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditFaculty extends EditRecord
{
    use HandleCrudFilament;
    protected static string $resource = FacultyResource::class;
    protected ?string $heading="Chỉnh sửa khoa";

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }



    protected function getRedirectUrl(): string
    {
        return $this->previousUrl ?? $this->getResource()::getUrl('index');
    }

    protected function getSavedNotificationTitle(): ?string
    {
        return 'Sửa Khoa Thành Công';
    }

    public function getBreadcrumb(): string
    {
        return 'Sửa';
    }

}
